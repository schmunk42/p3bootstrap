
<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'hero')) ?>

<!-- Example row of columns -->
<div class="row">
	<div class="span4">
		<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'left')) ?>
	</div>
	<div class="span4">
		<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'middle')) ?>
	</div>
	<div class="span4">
		<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'right')) ?>
	</div>
</div>

<div class="row">
	<div class="span12">
		<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'main')) ?>
	</div>
</div>
