<?php

class DefaultController extends Controller
{
    public $layout = '//../modules/moderator/views/layouts/main';
	public function actionIndex()
	{
		$this->render('index');
	}
}