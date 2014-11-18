<?php
/* @var $this ForecastController */
/* @var $data Forecast */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temperature')); ?>:</b>
	<?php echo CHtml::encode($data->temperature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('when_created')); ?>:</b>
	<?php echo CHtml::encode($data->when_created); ?>
	<br />


</div>