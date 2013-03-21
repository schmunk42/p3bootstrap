<?php
Yii::import('p3pages.modules.*');

$rootNode = P3Page::model()->findByAttributes(array('layout' => '_TbNavbar'));
$this->widget('TbNavbar', array(
                               'fixed'=>false,
                               'fluid' => false,
                               'collapse' => true,
                               'items' => array(
                                   array(
                                       'class' => 'TbMenu',
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
                                                   array('label' => 'English',
                                                         'url' => array_merge(array(''), $_GET, array('lang' => 'en'))),
                                                   array('label' => 'Deutsch',
                                                         'url' => array_merge(array(''), $_GET, array('lang' => 'de'))),
                                               ),
                                           )
                                       )
                                   ),
                                   array(
                                       'class' => 'TbMenu',
                                       'htmlOptions' => array('class' => 'pull-right'),
                                       'items' => array(
                                           array('label' => 'Administration', 'url' => '#',
                                                 'visible' => !Yii::app()->user->isGuest, 'icon' => 'cog white',
                                                 'items' => array(
                                                     array('label' => 'Upload Media',
                                                           'url' => array('/p3media/import/upload'),
                                                           'visible' => Yii::app()->user->checkAccess('P3media.Import.*')),
                                                     array('label' => 'Edit Page Translation', 'url' => array(
                                                         '/p3pages/p3PageTranslation/update',
                                                         'id' => (P3Page::getActivePage()->getTranslationModel()) ?
                                                             P3Page::getActivePage()->getTranslationModel()->id : null,
                                                         'returnUrl' => $this->createUrl(null)),
                                                           'visible' => Yii::app()->user->checkAccess('P3pages.P3PageTranslation.*') && P3Page::getActivePage()
                                                               ->getTranslationModel()),
                                                     array('label' => 'Create Page Translation', 'url' => array(
                                                         '/p3pages/p3PageTranslation/create',
                                                         'returnUrl' => $this->createUrl(null),
                                                         'P3PageTranslation' => array('p3_page_id' => P3Page::getActivePage()->id,
                                                                                      'language' => Yii::app()->language)),
                                                           'visible' => Yii::app()->user->checkAccess('P3pages.P3PageTranslation.*') && !P3Page::getActivePage()
                                                               ->getTranslationModel() && !P3Page::getActivePage()->isNewRecord),
                                                     '---',
                                                     array('label' => 'Media', 'url' => array('/p3media'),
                                                           'visible' => Yii::app()->user->checkAccess('P3media.Default.*')),
                                                     array('label' => 'Pages', 'url' => array('/p3pages'),
                                                           'visible' => Yii::app()->user->checkAccess('P3pages.Default.*')),
                                                     array('label' => 'Widgets', 'url' => array('/p3widgets'),
                                                           'visible' => Yii::app()->user->checkAccess('P3widgets.Default.*')),
                                                     array('label' => 'Users', 'url' => array('/user/admin/admin'),
                                                           'visible' => Yii::app()->user->checkAccess('Admin')),
                                                     array('label' => 'Rights', 'url' => array('/rights'),
                                                           'visible' => Yii::app()->user->checkAccess('Admin')),
                                                     '---',
                                                     array('label' => 'Application', 'url' => array('/p3admin'),
                                                           'visible' => Yii::app()->user->checkAccess('Admin')),
                                                     '---',
                                                     array('label' => 'Visit Phundament 3 Website',
                                                           'url' => 'http://phundament.com'),
                                                 )),
                                           array('label' => ucfirst(Yii::app()->user->name),
                                                 'visible' => !Yii::app()->user->isGuest,
                                                 'icon' => Yii::app()->user->isSuperuser ? 'warning-sign white' :
                                                     'user white', 'items' => array(
                                               array('label' => 'User Settings'),
                                               array('label' => 'Profile', 'url' => array('/user/profile'),
                                                     'visible' => !Yii::app()->user->isGuest),
                                               array('label' => 'User List', 'url' => array('/user'),
                                                     'visible' => !Yii::app()->user->isGuest),
                                               '---',
                                               array('label' => 'Logout', 'url' => array('/site/logout'),
                                                     'visible' => !Yii::app()->user->isGuest),
                                           )),
                                           array('label' => 'Login', 'url' => Yii::app()->user->loginUrl,
                                                 'visible' => Yii::app()->user->isGuest, 'icon' => 'lock white'),
                                       ),
                                   ),
                               ))
);
?>