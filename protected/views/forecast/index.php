<?php
/* @var $this ForecastController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Forecasts',
);

$this->menu=array(
	array('label'=>'Create Forecast', 'url'=>array('create')),
	array('label'=>'Manage Forecast', 'url'=>array('admin')),
);
?>

<h1>Forecasts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
