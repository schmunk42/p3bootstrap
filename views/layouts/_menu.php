<div id="frontend-navbar">
    <?php
    Yii::import('p3pages.modules.*');

    $rootNode = P3Page::model()->findByAttributes(array('name_id' => 'Navbar'));
    $page = P3Page::getActivePage();
    if ($page !== null) {
        $translation = $page->getTranslationModel();
    } else {
        $translation = null;
    }

    $this->widget(
        'TbNavbar',
        array(
             //'fluid' => true,
             'collapse' => true,
             'fixed'    => false,
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
                             'items' => Controller::getLanguageMenuItems()
                         )
                     )
                 ),
                 array(
                     'class'       => 'TbMenu',
                     'htmlOptions' => array('class' => 'pull-right'),
                     'items'       => array(
                         array(
                             'label'   => ucfirst(Yii::app()->user->name),
                             'visible' => !Yii::app()->user->isGuest,
                             'icon'    => Yii::app()->user->checkAccess('Superuser') ?
                                 'warning-sign white' :
                                 'user white',
                             'items'   => array(
                                 array('label' => Yii::t('app', 'User')),
                                 array(
                                     'label'   => Yii::t('app', 'Profile'),
                                     'icon'    => 'tasks',
                                     'url'     => array('/user/profile'),
                                     'visible' => !Yii::app()->user->isGuest
                                 ),
                                 array(
                                     'label'   => Yii::t('app', 'List'),
                                     'icon'    => 'list',
                                     'url'     => array('/user'),
                                     'visible' => !Yii::app()->user->isGuest
                                 ),
                                 '---',
                                 array(
                                     'label'   => Yii::t('app', 'Logout'),
                                     'icon'    => 'lock',
                                     'url'     => array('/site/logout'),
                                     'visible' => !Yii::app()->user->isGuest
                                 ),
                             )
                         ),
                         array(
                             'label'   => Yii::t('app', 'Login'),
                             'url'     => Yii::app()->user->loginUrl,
                             'visible' => Yii::app()->user->isGuest,
                             'icon'    => 'lock white'
                         ),
                     ),
                 ),
             )
        )
    );
    ?>
</div>