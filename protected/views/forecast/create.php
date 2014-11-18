<?php
/* @var $this ForecastController */
/* @var $model Forecast */

$this->breadcrumbs=array(
	'Forecasts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Forecast', 'url'=>array('index')),
	array('label'=>'Manage Forecast', 'url'=>array('admin')),
);
?>

<h1>Create Forecast</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>