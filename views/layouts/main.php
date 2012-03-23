<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">



		<style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
			}
		</style>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php Yii::app()->assetManager->publish(Yii::app()->theme->basePath.DIRECTORY_SEPARATOR.'css') ?>
		<link href="<?php echo Yii::app()->assetManager->publish(Yii::app()->theme->basePath.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'blueprint-bootstrap.css') ?>" rel="stylesheet">

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	</head>

	<body>

		<?php
		
		Yii::import('p3pages.modules.*');
		
		$rootNode = P3Page::model()->findByAttributes(array('layout'=>'_BootMenu'));
		$this->widget('ext.yii-bootstrap.widgets.BootNavbar', array(
			//'fluid' => true,
			'collapse' => true,
			'items' => array(
				array(
					'class' => 'bootstrap.widgets.BootMenu',
					/*'items' => array(
						array('label' => 'Home', 'url' => array('/site/index')),
						array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
						array('label' => 'Contact', 'url' => array('/site/contact')),
						array('label' => 'Wiki', 'url' => array('/wiki')),
						array('label' => 'Widget Demo', 'url' => array('/site/page', 'view' => 'widgets')),
					),*/
					'items' => P3Page::getMenuItems($rootNode)
				),
//								'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',

				array(
					'class' => 'bootstrap.widgets.BootMenu',
					'htmlOptions' => array('class' => 'pull-right'),
					'items' => array(
						array(
							'label' => Yii::app()->language, 'url' => '#',
							'items' => array(
								array('label' => 'Choose Language'),
								array('label' => 'English', 'url' => array_merge(array(''), $_GET, array('lang' => 'en'))),
								array('label' => 'Deutsch', 'url' => array_merge(array(''), $_GET, array('lang' => 'de'))),
								array('label' => 'Français', 'url' => array_merge(array(''), $_GET, array('lang' => 'fr'))),
								array('label' => 'Русский', 'url' => array_merge(array(''), $_GET, array('lang' => 'ru'))),
							),
						)
					)
				),
				array(
					'class' => 'bootstrap.widgets.BootMenu',
					'htmlOptions' => array('class' => 'pull-right'),
					'items' => array(
						array('label' => 'Phundament 3', 'url' => '#', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
								array('label' => 'Phundament 3-0.3'),
								array('label' => 'Upload Media', 'url' => array('/p3media/import/upload'), 'visible' => Yii::app()->user->checkAccess('P3media.Import.*')),
								'---',
								array('label' => 'Media', 'url' => array('/p3media'), 'visible' => Yii::app()->user->checkAccess('P3media.Import.*')),
								array('label' => 'Pages', 'url' => array('/p3pages'), 'visible' => Yii::app()->user->checkAccess('P3media.Import.*')),
								array('label' => 'Widgets', 'url' => array('/p3widgets'), 'visible' => Yii::app()->user->checkAccess('P3media.Import.*')),
								'---',
								array('label' => 'Users', 'url' => array('/user'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Rights', 'url' => array('/rights'), 'visible' => Yii::app()->user->checkAccess('Admin')),
								array('label' => 'Administration', 'url' => array('/p3admin'), 'visible' => Yii::app()->user->checkAccess('Admin')),
								'---',
								array('label' => 'Visit Phundament Website', 'url' => 'http://phundament.com'),
						)),
						array('label' => ucfirst(Yii::app()->user->name), 'visible' => !Yii::app()->user->isGuest, 'items' => array(
								array('label' => 'User Settings'),
								array('label' => 'Profile', 'url' => array('/user/profile'), 'visible' => !Yii::app()->user->isGuest),
								'---',
								array('label' => 'Logout', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
						)),
						array('label' => 'Login', 'url' => Yii::app()->user->loginUrl, 'visible' => Yii::app()->user->isGuest),
					),
				),
			))
		);
		?>

		<div class="container">

			<div class="subwrapper">
				<?php echo $content; ?>
			</div>

			<script type="text/javascript">
				// blueprint to bootstrap hotfix
				
				// IE buggy with this - maybe not needed
				//$(':not(.subwrapper:has(.row))').addClass('row');
				//$('.subwrapper:has(.form:has(.row))').addClass('row');
				//$(':not(.subwrapper:has([class^=span-]))').removeClass('row');
				
				//////$('div:first-child[class^=span-]').addClass('first');
			</script>




			<hr>

			<footer>
				<?php $this->widget('p3widgets.components.P3WidgetContainer', array('id' => 'footer')) ?>
			</footer>

		</div> <!-- /container -->

	</body>
</html>