<?php
$this->breadcrumbs = (P3Page::getActivePage())?P3Page::getActivePage()->getBreadcrumbs():$this->pageTitle;
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>

<div class="row">
	<div class="span12">
		<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'top', 'varyByRequestParam' => P3Page::PAGE_ID_KEY)) ?>
	</div>
</div>

<div class="row">
	<div class="span12">	
		<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'main', 'varyByRequestParam' => P3Page::PAGE_ID_KEY)) ?>
	</div>
</div>