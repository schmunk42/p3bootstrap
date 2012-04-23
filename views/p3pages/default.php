<?php
$this->pageTitle = Yii::app()->name . ' - ' . $this->pageTitle;
$this->breadcrumbs = array(
	$this->pageTitle,
);
?>
<div class="row">
    <div class="span4">
        <?php #$this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'left')) ?>
        <a href="/<?php echo Yii::app()->language ?>">
            <img class="riad-du-rabbin-logo" src="<?php echo Yii::app()->baseUrl."/images/riad-du-rabbin-logo.png" ?>" width="246" height="147" />
        </a>
    </div>
    <div class="span8">
        <div class="navi">
            <?php
            Yii::import('p3pages.modules.*');

            $rootNode = P3Page::model()->findByAttributes(array('layout' => '_BootMenu'));
            $this->widget('ext.crisu83.yii-bootstrap.widgets.BootNavbar', array(
                'collapse' => false,
                'brand'=> false,
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.BootMenu',
                        'items' => P3Page::getMenuItems($rootNode)
                    ),
                    ))
            );
            ?>
        </div>
        <div class="clearfix"></div>
        <div class="main-content">
            <?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'main', 'varyByRequestParam' => P3Page::PAGE_ID_KEY)) ?>
        </div>
    </div>
</div>