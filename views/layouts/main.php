<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="<?php echo (P3Page::getActivePage())?P3Page::getActivePage()->t('description'):'' ?>">
    <meta name="keywords" content="<?php echo (P3Page::getActivePage())?P3Page::getActivePage()->t('keywords'):'' ?>">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php
    $cs = Yii::app()->getClientScript();
    $cs->registerMetaTag('width=device-width, initial-scale=1.0', 'viewport');
    $cs->registerLinkTag('shortcut icon', NULL, Yii::app()->theme->baseUrl . '/img/favicon.ico', NULL, NULL);

    // CSS files
    if (Yii::app()->hasComponent('less')) {
        Yii::app()->less->files = array('themes/'.Yii::app()->theme->name.'/less/p3.less' => 'themes/'.Yii::app()->theme->name.'/css/p3.css');
        Yii::app()->less->register();
    }
    else {
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/p3.css');
    }
    ?>
</head>

<body>

<?php $this->renderFile(Yii::getPathOfAlias('application.themes.frontend.views.layouts') . DIRECTORY_SEPARATOR . '_menu.php') ?>

<div class="container">
    <div class="subwrapper">
        <?php echo $content; ?>
    </div>
    <hr>
    <footer>
        Powered by <a href="http://phundament.com">Phundament</a>
    </footer>
</div>
<!-- /container -->
</body>
</html>