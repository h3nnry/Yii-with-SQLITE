<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-datetimepicker.min.css" />
	<?php 
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.10.2.min.js', CClientScript::POS_END);
    	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js', CClientScript::POS_END);
    	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/moment.js', CClientScript::POS_END);
    	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap-datetimepicker.min.js', CClientScript::POS_END);
	?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body style="background-color:#E6E6E6">

<div class="container" id="page">
	<div id="mainmenu">
	<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=Yii::app()->createUrl('/site/index');?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php if(Yii::app()->controller->id=='site' && Yii::app()->controller->action->id=='index') echo 'active';?>"><a href="<?=Yii::app()->createUrl('/site/index');?>">Home</a></li>
        <li class="<?php if(Yii::app()->controller->id=='countries' && Yii::app()->controller->action->id=='admin') echo 'active';?>"><a href="<?=Yii::app()->createUrl('/countries/admin');?>">Countries</a></li>
        <li class="<?php if(Yii::app()->controller->id=='cities' && Yii::app()->controller->action->id=='admin') echo 'active';?>"><a href="<?=Yii::app()->createUrl('/cities/admin');?>">Cities</a></li>
        <li class="<?php if(Yii::app()->controller->id=='forecast' && Yii::app()->controller->action->id=='admin') echo 'active';?>"><a href="<?=Yii::app()->createUrl('/forecast/admin');?>">Forecast</a></li>        
        <li class="<?php if(Yii::app()->controller->id=='site' && Yii::app()->controller->action->id=='page') echo 'active';?>"><a href="<?=Yii::app()->createUrl('/site/page', array('view'=>'about'));?>">About</a></li>
        <li class="<?php if(Yii::app()->controller->id=='site' && Yii::app()->controller->action->id=='contact') echo 'active';?>"><a href="<?=Yii::app()->createUrl('/site/contact');?>">Contact</a></li>
        <?php if(Yii::app()->user->isGuest):?>
        <li class="<?php if(Yii::app()->controller->id=='site' && Yii::app()->controller->action->id=='login') echo 'active';?>"><a href="<?=Yii::app()->createUrl('/site/login');?>">LogIn</a></li>
        <?php endif?>
        <?php if(!Yii::app()->user->isGuest):?>
        <li class="<?php if(Yii::app()->controller->id=='site' && Yii::app()->controller->action->id=='logout') echo 'active';?>"><a href="<?=Yii::app()->createUrl('/site/logout');?>">LogOut<?='('.Yii::app()->user->name.')';?></a></li>
        <?php endif?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
		
	</div><!-- mainmenu -->
	<div  class="breadcrumb">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
	</div>
	<?php echo $content; ?>

	<div class="clear"></div>

</div><!-- page -->