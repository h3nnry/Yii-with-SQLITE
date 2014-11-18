<?php
/* @var $this ForecastController */
/* @var $model Forecast */

$this->breadcrumbs=array(
	'Forecasts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Forecast', 'url'=>array('index')),
	array('label'=>'Create Forecast', 'url'=>array('create')),
	array('label'=>'Update Forecast', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Forecast', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Forecast', 'url'=>array('admin')),
);
?>

<h1>View Forecast #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'city_id',
		'temperature',
		'when_created',
	),
)); ?>
