<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Android</title>

    <!-- Page styles -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.red-indigo.min.css" />
    <link rel="stylesheet" href="/mdl/styles.css">
<!--    <link rel="stylesheet" href="/mdl/material.css">-->
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header has-drawer is-upgraded">

    <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="/mdl/images/android-logo.png">
          </span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="android-header-spacer mdl-layout-spacer"></div>
            <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search-field">
                </div>
            </div>
            <!-- Navigation -->
            <div class="android-navigation-container">
                <nav class="android-navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase"
                       href="<?= Yii::app()->createUrl('site/index'); ?>">Главная</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase"
                       href="<?= Yii::app()->createUrl('subject/index'); ?>">Предметы</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase"
                       href="<?= Yii::app()->createUrl('post/index') ?>">Статьи</a>
                    <?php if (Yii::app()->user->isGuest) {
                        ?>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase"
                           href="<?= Yii::app()->createUrl('site/login'); ?>">Вход</a>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase"
                           href="<?= Yii::app()->createUrl('user/create'); ?>">Регистрация</a>
                        <?php
                    } else {
                        ?>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase"
                           href="#"><?= Yii::app()->user->name; ?></a>
                        <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"
                                id="more-button">
                            <i class="material-icons">more_vert</i>
                        </button>
                        <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                            <a href="<?= Yii::app()->createUrl('user/update', array('id'=>Yii::app()->user->getId())) ?>"> <li class="mdl-menu__item">Редактировать</li></a>
                            <a href="<?= Yii::app()->createUrl('post/create'); ?>"><li class="mdl-menu__item">Новая статья</li></a>
                            <a href="<?= Yii::app()->createUrl('site/logout'); ?>"><li class="mdl-menu__item">Выход
                                </li></a>
                        </ul>
                        <?php
                    } ?>
                </nav>
            </div>
            <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="/mdl/images/android-logo.png">
          </span>

        </div>
    </div>

<!--    <div class="android-drawer mdl-layout__drawer">-->
<!--        <span class="mdl-layout-title">-->
<!--          <img class="android-logo-image" src="/mdl/images/android-logo-white.png">-->
<!--        </span>-->
<!--        <nav class="mdl-navigation">-->
<!--            <a class="mdl-navigation__link" href="">Phones</a>-->
<!--            <a class="mdl-navigation__link" href="">Tablets</a>-->
<!--            <a class="mdl-navigation__link" href="">Wear</a>-->
<!--            <a class="mdl-navigation__link" href="">TV</a>-->
<!--            <a class="mdl-navigation__link" href="">Auto</a>-->
<!--            <a class="mdl-navigation__link" href="">One</a>-->
<!--            <a class="mdl-navigation__link" href="">Play</a>-->
<!--            <div class="android-drawer-separator"></div>-->
<!--            <span class="mdl-navigation__link" href="">Versions</span>-->
<!--            <a class="mdl-navigation__link" href="">Lollipop 5.0</a>-->
<!--            <a class="mdl-navigation__link" href="">KitKat 4.4</a>-->
<!--            <a class="mdl-navigation__link" href="">Jelly Bean 4.3</a>-->
<!--            <a class="mdl-navigation__link" href="">Android history</a>-->
<!--            <div class="android-drawer-separator"></div>-->
<!--            <span class="mdl-navigation__link" href="">Resources</span>-->
<!--            <a class="mdl-navigation__link" href="">Official blog</a>-->
<!--            <a class="mdl-navigation__link" href="">Android on Google+</a>-->
<!--            <a class="mdl-navigation__link" href="">Android on Twitter</a>-->
<!--            <div class="android-drawer-separator"></div>-->
<!--            <span class="mdl-navigation__link" href="">For developers</span>-->
<!--            <a class="mdl-navigation__link" href="">App developer resources</a>-->
<!--            <a class="mdl-navigation__link" href="">Android Open Source Project</a>-->
<!--            <a class="mdl-navigation__link" href="">Android SDK</a>-->
<!--        </nav>-->
<!--    </div>-->
<!--    @TODO: ЗАПИХАТЬ ФОН В CSS -->
    <div class="android-content mdl-layout__content" style="background: #EEEEEE">
        <div class="content" style="padding-left: 10%; padding-right: 10%;">
            <?= $content; ?>
        </div>
    </div>

<!--<footer class="android-footer mdl-mega-footer">-->
<!--    <div class="mdl-mega-footer--top-section">-->
<!--        <div class="mdl-mega-footer--left-section">-->
<!--            <button class="mdl-mega-footer--social-btn"></button>-->
<!--            &nbsp;-->
<!--            <button class="mdl-mega-footer--social-btn"></button>-->
<!--            &nbsp;-->
<!--            <button class="mdl-mega-footer--social-btn"></button>-->
<!--        </div>-->
<!--        <div class="mdl-mega-footer--right-section">-->
<!--            <a class="mdl-typography--font-light" href="#top">-->
<!--                Back to Top-->
<!--                <i class="material-icons">expand_less</i>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="mdl-mega-footer--middle-section">-->
<!--        <p class="mdl-typography--font-light">Satellite imagery: © 2014 Astrium, DigitalGlobe</p>-->
<!--        <p class="mdl-typography--font-light">Some features and devices may not be available in all areas</p>-->
<!--    </div>-->
<!---->
<!--    <div class="mdl-mega-footer--bottom-section">-->
<!--        <a class="android-link android-link-menu mdl-typography--font-light" id="version-dropdown">-->
<!--            Versions-->
<!--            <i class="material-icons">arrow_drop_up</i>-->
<!--        </a>-->
<!--        <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="version-dropdown">-->
<!--            <li class="mdl-menu__item">5.0 Lollipop</li>-->
<!--            <li class="mdl-menu__item">4.4 KitKat</li>-->
<!--            <li class="mdl-menu__item">4.3 Jelly Bean</li>-->
<!--            <li class="mdl-menu__item">Android History</li>-->
<!--        </ul>-->
<!--        <a class="android-link android-link-menu mdl-typography--font-light" id="developers-dropdown">-->
<!--            For Developers-->
<!--            <i class="material-icons">arrow_drop_up</i>-->
<!--        </a>-->
<!--        <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="developers-dropdown">-->
<!--            <li class="mdl-menu__item">App developer resources</li>-->
<!--            <li class="mdl-menu__item">Android Open Source Project</li>-->
<!--            <li class="mdl-menu__item">Android SDK</li>-->
<!--            <li class="mdl-menu__item">Android for Work</li>-->
<!--        </ul>-->
<!--        <a class="android-link mdl-typography--font-light" href="">Blog</a>-->
<!--        <a class="android-link mdl-typography--font-light" href="">Privacy Policy</a>-->
<!--    </div>-->
<!---->
<!--</footer>-->
</div>


<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
