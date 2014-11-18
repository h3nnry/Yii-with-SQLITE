<?php
/* @var $this CountriesController */
/* @var $model Countries */

$this->breadcrumbs=array(
	'Countries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Countries', 'url'=>array('index')),
	array('label'=>'Create Countries', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#countries-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'countries-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'header'=>'Actions',
			'value'=>function($data){
				echo '<div class="dropdown">
						  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
						    Action
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						    <li role="presentation"><a role="menuitem" tabindex="-1" href="'.Yii::app()->createUrl('/countries/view', array('id'=>CHtml::value($data, 'id'))).'">View</a></li>
						    <li role="presentation"><a role="menuitem" tabindex="-2" href="'.Yii::app()->createUrl('/countries/update', array('id'=>CHtml::value($data, 'id'))).'">Update</a></li>
						    <li role="presentation"><a role="menuitem" tabindex="-3" href="'.Yii::app()->createUrl('/countries/delete', array('id'=>CHtml::value($data, 'id'))).'">Delete</a></li>
						  </ul>
						</div>';
			},
		),
	),
)); ?>
