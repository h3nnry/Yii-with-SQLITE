<?php
/* @var $this ForecastController */
/* @var $model Forecast */

$this->breadcrumbs=array(
	'Forecasts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Forecast', 'url'=>array('index')),
	array('label'=>'Create Forecast', 'url'=>array('create')),
	array('label'=>'View Forecast', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Forecast', 'url'=>array('admin')),
);
?>

<h1>Update Forecast <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>