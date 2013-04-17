<?php
Yii::import('p3pages.modules.*');

$rootNode = P3Page::model()->findByAttributes(array('layout' => '_TbNavbar'));
$page     = P3Page::getActivePage();
if ($page !== null) {
    $translation = $page->getTranslationModel();
}
else {
    $translation = null;
}

$this->widget(
    'TbNavbar',
    array(
         //'fluid' => true,
         'collapse' => true,
         'items'    => array(
             array(
                 'class' => 'TbMenu',
                 'items' => P3Page::getMenuItems($rootNode)
             ),
             //'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
             array(
                 'class'       => 'TbMenu',
                 'htmlOptions' => array('class' => 'pull-right'),
                 'items'       => array(
                     array(
                         'label' => Yii::app()->language,
                         'icon'  => 'globe white',
                         'url'   => '#',
                         'items' => array(
                             array('label' => 'Choose Language'),
                             array('label' => 'English',
                                   'url'   => array_merge(array(''), $_GET, array('lang' => 'en'))),
                             array('label' => 'Deutsch',
                                   'url'   => array_merge(array(''), $_GET, array('lang' => 'de'))),
                         ),
                     )
                 )
             ),
             array(
                 'class'       => 'TbMenu',
                 'htmlOptions' => array('class' => 'pull-right'),
                 'items'       => array(
                     array('url'     => '#',
                           'visible' => Yii::app()->user->checkAccess('Editor'),
                           'icon'    => 'folder-open white',
                           'items'   => array(
                               array('label' => 'Media'),
                               array('label'   => 'Upload',
                                     'icon'    => 'circle-arrow-up',
                                     'url'     => array('/p3media/import/upload'),
                                     'visible' => Yii::app()->user->checkAccess('P3media.Import.*')),
                               array('label'   => 'Browse',
                                     'icon'    => 'th',
                                     'url'     => array('/p3media'),
                                     'visible' => Yii::app()->user->checkAccess('P3media.Default.*')),
                               '---',
                               array('label' => 'Pages'),
                               array('label'   => 'Translation',
                                     'icon'    => 'pencil',
                                     'url'     => array(
                                         '/p3pages/p3PageTranslation/create',
                                         'returnUrl'         => getenv('REQUEST_URI'),
                                         'P3PageTranslation' => array(
                                             'p3_page_id' => ($page) ? $page->id : null,
                                             'language'   => Yii::app()->language
                                         )
                                     ),
                                     'visible' => Yii::app()->user->checkAccess('P3pages.P3PageTranslation.*') && $page && !$translation),
                               array('label'   => 'Translation',
                                     'icon'    => 'pencil',
                                     'url'     => array(
                                         '/p3pages/p3PageTranslation/update',
                                         'returnUrl' => getenv('REQUEST_URI'),
                                         'id'        => ($translation) ? $translation->id : null
                                     ),

                                     'visible' => Yii::app()->user->checkAccess('P3pages.P3PageTranslation.*') && $page && $translation),
                               array('label'   => 'Template',
                                     'icon'    => 'wrench',
                                     'url'     => array(
                                         '/p3pages/p3Page/update',
                                         'id'        => ($page) ? $page->id : null,
                                         'returnUrl' => getenv('REQUEST_URI')),
                                     'visible' => Yii::app()->user->checkAccess('P3pages.P3PageTranslation.*') && $page),
                               array('label'   => 'Append Child Page',
                                     'icon'    => 'plus',
                                     'url'     => array(
                                         '/p3pages/p3Page/createChild',
                                         'returnUrl'  => getenv('REQUEST_URI'),
                                         'P3PageMeta' => array(
                                             'treeParent_id' => ($page) ? $page->id : null,
                                         )
                                     ),
                                     'visible' => Yii::app()->user->checkAccess('P3pages.P3Page.*') && $page),
                               array('label'   => 'Append Sibling Page',
                                     'icon'    => 'plus-sign',
                                     'url'     => array(
                                         '/p3pages/p3Page/createChild',
                                         'returnUrl'  => getenv('REQUEST_URI'),
                                         'P3PageMeta' => array(
                                             'treeParent_id' => ($page && $page->getParent()) ? $page->getParent()->id :
                                                 null
                                         )
                                     ),
                                     'visible' => Yii::app()->user->checkAccess('P3pages.P3Page.*') && $page),
                               array('label'   => 'Sitemap',
                                     'icon'    => 'list',
                                     'url'     => array('/p3pages'),
                                     'visible' => Yii::app()->user->checkAccess('P3pages.Default.*')),
                               '---',
                               array('label' => 'Widgets'),
                               array('label'   => 'Manage',
                                     'icon'    => 'list-alt',
                                     'url'     => array('/p3widgets'),
                                     'visible' => Yii::app()->user->checkAccess('P3widgets.Default.*')),
                               '---',
                               array('label' => 'Application'),
                               array('label'   => 'Overview',
                                     'icon'    => 'list-alt',
                                     'url'     => array('/p3admin'),
                                     'visible' => Yii::app()->user->checkAccess('Editor')),
                           )
                     ),
                     array('url'     => '#',
                           'visible' => Yii::app()->user->checkAccess('Admin'),
                           'icon'    => 'cog white',
                           'items'   => array(
                               array('label' => 'Application'),
                               array('label'   => 'Users',
                                     'icon'    => 'user',
                                     'url'     => array('/user/admin/admin'),
                                     'visible' => Yii::app()->user->checkAccess('Admin')),
                               array('label'   => 'Rights',
                                     'icon'    => 'briefcase',
                                     'url'     => array('/rights'),
                                     'visible' => Yii::app()->user->checkAccess('Admin')),
                               '---',
                               array('label'   => 'Settings',
                                     'icon'    => 'certificate',
                                     'url'     => array('/p3admin/default/settings'),
                                     'visible' => Yii::app()->user->checkAccess('Admin')),
                           )
                     ),
                     array('label'   => ucfirst(Yii::app()->user->name),
                           'visible' => !Yii::app()->user->isGuest,
                           'icon'    => Yii::app()->user->checkAccess('Superuser') ?
                               'warning-sign white' :
                               'user white',
                           'items'   => array(
                               array('label' => 'User'),
                               array('label'   => 'Profile',
                                     'icon'    => 'tasks',
                                     'url'     => array('/user/profile'),
                                     'visible' => !Yii::app()->user->isGuest),
                               array('label'   => 'List',
                                     'icon'    => 'list',
                                     'url'     => array('/user'),
                                     'visible' => !Yii::app()->user->isGuest),
                               '---',
                               array('label'   => 'Logout',
                                     'icon'    => 'lock',
                                     'url'     => array('/site/logout'),
                                     'visible' => !Yii::app()->user->isGuest),
                           )),
                     array('label'   => 'Login',
                           'url'     => Yii::app()->user->loginUrl,
                           'visible' => Yii::app()->user->isGuest,
                           'icon'    => 'lock white'),
                 ),
             ),
             array(
                 'class'       => 'TbMenu',
                 'htmlOptions' => array('class' => 'pull-right'),
                 'items'       => array(
                     array(
                         'icon'        => 'edit white',
                         'url'         => '#',
                         'visible'     => Yii::app()->user->checkAccess('Editor'),
                         'itemOptions' => array(
                             "id"      => "P3WidgetContainerShowControls",
                             'class'   => 'edit',
                             'onclick' => "$('i',this).toggleClass('icon-edit icon-eye-open'); $(this).toggleClass('edit view');",
                         )
                     )
                 )
             ),
         )
    )
);
?>