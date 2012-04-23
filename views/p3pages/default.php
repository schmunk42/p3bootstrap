<?php
$this->pageTitle = Yii::app()->name . ' - ' . $this->pageTitle;
$this->breadcrumbs = array(
	$this->pageTitle,
);
?>
<div class="row">
	<div class="span12">
		<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'top', 'varyByRequestParam' => P3Page::PAGE_ID_KEY)) ?>
	</div>
</div>

<div class="row">
	<div class="span8">	
		<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'main', 'varyByRequestParam' => P3Page::PAGE_ID_KEY)) ?>
	</div>
	<div class="span4">
		<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'sidebar', 'varyByRequestParam' => P3Page::PAGE_ID_KEY)) ?>
	</div>
</div>