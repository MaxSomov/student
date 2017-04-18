<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $subjects Subject[] */

?>

<h1>Create Post</h1>

<?php //$this->renderPartial('_form', array('model' => $model)); ?>

<form action="<?= Yii::app()->createUrl('post/create') ?>" method="post">

    <div class="row">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
            <input class="mdl-textfield__input" type="text" id="Post_subject_id" readonly
                   tabIndex="-1" onchange="vis()">
            <label for="Post_subject_id" class="mdl-textfield__label">Предмет</label>
            <ul for="Post_subject_id" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                <?php
                foreach ($subjects as $subject) {
                    ?>
                    <li class="mdl-menu__item" data-val="<?= $subject->id; ?>"><?= $subject->name; ?></li>
                    <?php
                }
                ?>
                <li class="mdl-menu__item" data-val="-1">Другой</li>
            </ul>
        </div>
        <input type="hidden" name="Post[subject_id]" id="Subject_id">
    </div>

    <div class="row" id="hidden" style="display: none;">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="Subject_name" name="Subject_name">
            <label class="mdl-textfield__label" for="Subject_name">Название предмета</label>
        </div>
    </div>

    <div class="row">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="Post_head" name="Post[head]">
            <label class="mdl-textfield__label" for="Post_head">Заголовок</label>
        </div>
    </div>

    <div class="row">
        <textarea name="Post[body]" id="Post_body"></textarea>
    </div>

    <div class="row buttons">
        <input type="submit" name="yt0" value="Продолжить"
               class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
    </div>

</form>

<script>
    {
        'use strict';
        window.onload = function () {
            getmdlSelect.init('.getmdl-select');
            document.addEventListener("DOMNodeInserted", function (ev) {
                if (ev.relatedNode.querySelectorAll(".getmdl-select").length > 0) {
                    componentHandler.upgradeDom();
                }
            }, false);
        };

        var getmdlSelect = {
            defaultValue: {
                width: 300
            },
            addEventListeners: function (dropdown) {
                var input = dropdown.querySelector('input');
                var list = dropdown.querySelectorAll('li');
                var menu = dropdown.querySelector('.mdl-js-menu');

                //show menu on mouse down or mouse up
                input.onkeydown = function (event) {
                    if (event.keyCode == 38 || event.keyCode == 40) {
                        menu['MaterialMenu'].show();
                    }
                };

                //return focus to input
                menu.onkeydown = function (event) {
                    if (event.keyCode == 13) {
                        input.focus();
                    }
                };

                [].forEach.call(list, function (li) {
                    li.onclick = function () {
                        input.value = li.textContent;
                        dropdown.MaterialTextfield.change(li.textContent); // handles css class changes
                        setTimeout(function () {
                            dropdown.MaterialTextfield.updateClasses_(); //update css class
                        }, 250);

                        // update input with the "id" value
                        input.dataset.val = li.dataset.val || '';

                        if ("createEvent" in document) {
                            var evt = document.createEvent("HTMLEvents");
                            evt.initEvent("change", false, true);
                            menu['MaterialMenu'].hide();
                            input.dispatchEvent(evt);
                        } else {
                            input.fireEvent("onchange");
                        }
                    };
                });
            },
            init: function (selector, widthDef) {
                var dropdowns = document.querySelectorAll(selector);
                [].forEach.call(dropdowns, function (i) {
                    getmdlSelect.addEventListeners(i);
                    var width = widthDef ? widthDef : (i.querySelector('.mdl-menu').offsetWidth ? i.querySelector('.mdl-menu').offsetWidth : getmdlSelect.defaultValue.width);
                    i.style.width = width + 'px';
                });
            }
        };
    }

</script>

<script>
    function vis () {
        var i = document.getElementById('Post_subject_id').getAttribute('data-val');
        if(i==-1) document.getElementById('hidden').style.display = 'block';
        else document.getElementById('hidden').style.display = 'none';

        document.getElementById('Subject_id').value = i;
    }
</script>