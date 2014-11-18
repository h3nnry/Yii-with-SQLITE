<?php
/* @var $this ForecastController */
/* @var $model Forecast */
// Yii::app()->clientScript->scriptMap=array('jquery-1.10.1.min.js'=>false,'jquery-ui-1.11.0.js'=>false);
$this->breadcrumbs=array(
	'Forecasts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Forecast', 'url'=>array('index')),
	array('label'=>'Create Forecast', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#forecast-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'id'=>'search-by-date'
        ));
?>
<ul class="list-group">
	<li class="list-group-item" style="background-color: #F5F5F5">Search</li>
  	<li class="list-group-item">
	  	<div class="container" style="padding-left:0px;margin:0px">
			<div class="col-sm-10" style="margin:0px; padding:0px">
		    <div class='col-md-2 pull-left' style="margin:0px; padding:0px">Start</div>
		    <div class='col-md-2' style="margin:0px; padding:0px">End</div>
		    </div>
		    <div class="col-sm-5" style="margin:0px; padding:0px">
		       <div class='col-md-4 pull-left' style="margin:0px;padding-left:0px">
		                <div class='input-group date' id='datetimepicker9'>
		                    <?php echo $form->textField($model,'start_date', array('class'=>"form-control", "data-date-format"=>"DD.MM.YYYY")) ?>
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
		        </div>
		        <div class='col-md-4' style="margin:0px;padding-left:0px">
		                <div class='input-group date' id='datetimepicker10'>
		                    <?php echo $form->textField($model,'end_date', array('class'=>"form-control", "data-date-format"=>"DD.MM.YYYY")) ?>
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
		        </div>
			    <div class="row submit">
        			<?php echo CHtml::submitButton('Search', array('class'=>'btn btn-success btn-md')); ?>
    			</div> 
	    	</div>
		</div>		
	</li>
</ul>
<?php $this->endWidget();?>
<?php $this->renderPartial('grid', array('model'=>$model));?>
<script type="text/javascript">
	$(function () {
	    $('#datetimepicker9').datetimepicker();
	    $('#datetimepicker10').datetimepicker();
	    $("#datetimepicker9").on("dp.change",function (e) {
    	$('#datetimepicker10').data("DateTimePicker").setMinDate(e.date);
	    });
	    $("#datetimepicker10").on("dp.change",function (e) {
	    $('#datetimepicker9').data("DateTimePicker").setMaxDate(e.date);
	    });
	});
</script>
<?php
	Yii::app()->clientScript->registerScript('search', "
		$('#search-by-date').submit(function(){
		    $('#forecast-grid').yiiGridView('update', {
		        data: $(this).serialize()
		    });
		    return false;
		});
	");
?>