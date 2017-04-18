<?php

class PostController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('addbookmark', 'deletebookmark', 'ratingplus', 'ratingminus', 'addcomment', 'create'),
                'users'=>array('@'),
            ),
		);
	}


    public function actionCreate()
    {
        $model=new Post;
        $subjects = Subject::model()->findAll();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Post']))
        {
            $model->attributes=$_POST['Post'];
            if($model->subject_id == -1){
                $subject = new Subject;
                $subject->name = $_POST['Subject_name'];
                $subject->save();

                $model->subject_id = $subject->id;
            }
            $model->user_id = Yii::app()->user->getId();
            $model->rating = 0;
            $model->date = time();
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create',array(
            'model'=>$model,
            'subjects'=>$subjects,
        ));
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	    if(!Yii::app()->user->isGuest){
            $bookmark = Bookmark::model()->findByAttributes(array('user_id'=>Yii::app()->user->getId(), 'post_id'=>$id));
            if(isset($bookmark)) $b = 1;
            else $b = 0;
        }
        else $b = -1;

	    $comments = Comment::model()->findAllByAttributes(array('post_id'=>$id));

	    $author = User::model()->findByPk(Post::model()->findByPk($id)->user_id);

	    $subject = Subject::model()->findByPk(Post::model()->findByPk($id)->subject_id);

        $this->render('view',array(
			'model'=>$this->loadModel($id),
            'bookmark'=>$b,
            'comments'=>$comments,
            'author'=>$author,
            'subject'=>$subject,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	    $posts = Post::model()->findAll(array('order'=>'id desc'));
		$dataProvider=new CActiveDataProvider('Post');
		$this->render('index',array(
		    'posts'=>$posts,
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Post::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAddbookmark($id){
	    $bookmark = new Bookmark;
	    $bookmark->user_id = Yii::app()->user->getId();
	    $bookmark->post_id = $id;
	    $bookmark->save();
	    $this->redirect(Yii::app()->createUrl('post/view', array('id'=>$id)));
    }

    public function actionDeletebookmark($id){
	    $bookmark = Bookmark::model()->findByAttributes(array('user_id'=>Yii::app()->user->getId(), 'post_id'=>$id));
	    $bookmark->delete();
        $this->redirect(Yii::app()->createUrl('post/view', array('id'=>$id)));
    }

//    @TODO: ЗАПРЕТИТЬ ГОЛОСОВАНИЕ НЕАВТОРИЗОВАННЫМ ПОЛЬЗОВАТЕЛЯМ

    public function actionRatingplus($id){
        $vote = Vote::model()->findByAttributes(array('user_id'=>Yii::app()->user->getId(), 'post_id'=>$id));
        $model = $this->loadModel($id);
        $user = User::model()->findByPk($model->user_id);
        if(!isset($vote)){
            $_vote = new Vote;
            $_vote->user_id = Yii::app()->user->getId();
            $_vote->post_id = $id;
            $_vote->value = 1;
            $_vote->save();

            $model->rating++;
            $model->save();

            $user->rating++;
            $user->save();
        }
        else{
            if($vote->value < 1) {
                $vote->value++;

                $model->rating++;

                $user->rating++;
            }
            $vote->save();
            $model->save();
            $user->save();
        }

        $this->redirect(Yii::app()->createUrl('post/view', array('id'=>$id)));
    }

    public function actionRatingminus($id){
        $model = $this->loadModel($id);
        $user = User::model()->findByPk($model->user_id);
        $vote = Vote::model()->findByAttributes(array('user_id'=>Yii::app()->user->getId(), 'post_id'=>$id));
        if(!isset($vote)){
            $_vote = new Vote;
            $_vote->user_id = Yii::app()->user->getId();
            $_vote->post_id = $id;
            $_vote->value = -1;
            $_vote->save();

            $model->rating--;
            $model->save();

            $user->rating--;
            $user->save();
        }
        else{
            if($vote->value > -1) {
                $model->rating--;

                $vote->value--;

                $user->rating--;
            }
            $vote->save();
            $model->save();
            $user->save();
        }
        $this->redirect(Yii::app()->createUrl('post/view', array('id'=>$id)));
    }

    public function actionAddcomment($id){
        $comment = new Comment;
        $comment->post_id = $id;
        $comment->user_id = Yii::app()->user->getId();
        $comment->content = $_POST['comment'];
        $comment->save();
        $this->redirect(Yii::app()->createUrl('post/view', array('id'=>$id)));
    }
}
