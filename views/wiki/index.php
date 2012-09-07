
<div class="row">
	<?php
	$page = ((isset($_GET['page'])) ? $_GET['page'] : '');
	$this->layout = "//layouts/main";
	$this->breadcrumbs = array(
		'Wiki' => array('/wiki'),
		$page
	);
	?>
	<div class="span10 offset2">

		<?php
		$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links' => array($this->id => array('/wiki'), $page),
		));
		?>
	</div>
	<div class="span2">
		<?php
		$this->widget('bootstrap.widgets.TbMenu', array(
			'type' => 'list',
			'items' => array_merge(array(array('label' => 'WIKI PAGES')), $items)
		));
		?>
	</div>
	<div class="span10">
<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'wiki', 'varyByRequestParam' => 'page')) ?>
	</div>
</div>
