<?php
Yii::import('p3pages.modules.*');

$rootNode = P3Page::model()->findByAttributes(array('layout' => '_BootMenu'));
$this->widget('TbNavbar', array(
                               //'fluid' => true,
                               'collapse' => true,
                               'items' => array(
                                   array(
                                       'class' => 'TbMenu',
                                       /* 'items' => array(
                                         array('label' => 'Home', 'url' => array('/site/index')),
                                         array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                                         array('label' => 'Contact', 'url' => array('/site/contact')),
                                         array('label' => 'Wiki', 'url' => array('/wiki')),
                                         array('label' => 'Widget Demo', 'url' => array('/site/page', 'view' => 'widgets')),
                                         ), */
                                       'items' => P3Page::getMenuItems($rootNode)
                                   ),
                                   //'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
                                   array(
                                       'class' => 'TbMenu',
                                       'htmlOptions' => array('class' => 'pull-right'),
                                       'items' => array(
                                           array(
                                               'label' => Yii::app()->language, 'url' => '#',
                                               'items' => array(
                                                   array('label' => 'Choose Language'),
                                                   array('label' => 'English', 'url' => array_merge(array(''), $_GET, array('lang' => 'en'))),
                                                   array('label' => 'Deutsch', 'url' => array_merge(array(''), $_GET, array('lang' => 'de'))),
                                                   array('label' => 'Français', 'url' => array_merge(array(''), $_GET, array('lang' => 'fr'))),
                                                   array('label' => 'Русский', 'url' => array_merge(array(''), $_GET, array('lang' => 'ru'))),
                                               ),
                                           )
                                       )
                                   ),
                                   array(
                                       'class' => 'TbMenu',
                                       'htmlOptions' => array('class' => 'pull-right'),
                                       'items' => array(
                                           array('label' => 'Phundament 3', 'url' => '#', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                               array('label' => 'Upload Media', 'url' => array('/p3media/import/upload'), 'visible' => Yii::app()->user->checkAccess('P3media.Import.*')),
                                               array('label' => 'Edit Page Translation', 'url' => array('/p3pages/p3PageTranslation/update', 'id' => (P3Page::getActivePage()->getTranslationModel()) ? P3Page::getActivePage()->getTranslationModel()->id : null), 'visible' => Yii::app()->user->checkAccess('P3pages.P3PageTranslation.*') && P3Page::getActivePage()->getTranslationModel()),
                                               array('label' => 'Create Page Translation', 'url' => array('/p3pages/p3PageTranslation/create', 'P3PageTranslation' => array('p3_page_id' => P3Page::getActivePage()->id)), 'visible' => Yii::app()->user->checkAccess('P3pages.P3PageTranslation.*') && !P3Page::getActivePage()->getTranslationModel() && !P3Page::getActivePage()->isNewRecord),
                                               '---',
                                               array('label' => 'Media', 'url' => array('/p3media'), 'visible' => Yii::app()->user->checkAccess('P3media.Import.*')),
                                               array('label' => 'Pages', 'url' => array('/p3pages'), 'visible' => Yii::app()->user->checkAccess('P3media.Import.*')),
                                               array('label' => 'Widgets', 'url' => array('/p3widgets'), 'visible' => Yii::app()->user->checkAccess('P3media.Import.*')),
                                               '---',
                                               array('label' => 'Users', 'url' => array('/user'), 'visible' => !Yii::app()->user->isGuest),
                                               array('label' => 'Rights', 'url' => array('/rights'), 'visible' => Yii::app()->user->checkAccess('Admin')),
                                               array('label' => 'Administration', 'url' => array('/p3admin'), 'visible' => Yii::app()->user->checkAccess('Admin')),
                                               '---',
                                               array('label' => 'Visit Phundament Website', 'url' => 'http://phundament.com'),
                                           )),
                                           array('label' => ucfirst(Yii::app()->user->name), 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                               array('label' => 'User Settings'),
                                               array('label' => 'Profile', 'url' => array('/user/profile'), 'visible' => !Yii::app()->user->isGuest),
                                               '---',
                                               array('label' => 'Logout', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                           )),
                                           array('label' => 'Login', 'url' => Yii::app()->user->loginUrl, 'visible' => Yii::app()->user->isGuest),
                                       ),
                                   ),
                               ))
);
?>