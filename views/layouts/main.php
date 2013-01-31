<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="description" content="">
        <meta name="author" content="">

        <style type="text/css">
            @media (min-width: 989px) {
                body {
                    margin-top: 60px;
                    padding-bottom: 40px;
                }
            }
        </style>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php
        $cs = Yii::app()->getClientScript();
        $cs->registerMetaTag('width=device-width, initial-scale=1.0', 'viewport');
        $cs->registerLinkTag('shortcut icon', NULL, Yii::app()->theme->baseUrl.'/img/favicon.ico', NULL, NULL);

        $cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/p3.css');
        // if you've installed crisu83/yii-less as a application component, comment line above and uncomment line below
        //Yii::app()->less->register();
        ?>
    </head>

    <body>

    <?php $this->renderFile(Yii::getPathOfAlias('application.themes.frontend.views.layouts').DIRECTORY_SEPARATOR.'_menu.php') ?>

        <div class="container">
            <div class="subwrapper">
                <?php echo $content; ?>
            </div>
            <hr>
            <footer>
                <?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'footer')) ?>
            </footer>
        </div> <!-- /container -->
    </body>
</html>