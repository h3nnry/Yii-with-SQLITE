<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'forecast-grid',
	'dataProvider'=>$model->search(),
	'ajaxUpdate'=>true,
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		array(
			'name'=>'country',
			'header'=>'Country',
			'value'=>'CHtml::value($data,\'city.country.name\',\'\')',
			),
		array(
			'name'=>'city_id',
			'value'=>'CHtml::value($data,\'city.name\',\'\')',
			),
		array(
			'name'=>'max_temperature',
			'header'=>'Max Temperature',
			'value'=> function($data){
				return floor(((CHtml::value($data, max_temperature,"") - 32) * 5) / 9)." ℃";
			},
			),
		array(
			'name'=>'min_temperature',
			'header'=>'Min Temperature',
			'value'=>function($data){
				return floor(((CHtml::value($data, min_temperature,"") - 32) * 5) / 9)." ℃";
			},
			),
		array(
			'name'=>'avg_temperature',
			'header'=>'Avg Temperature',
			'value'=>function($data){
				return floor(((CHtml::value($data, avg_temperature,"") - 32) * 5) / 9)." ℃";
			},
			),
		// array(
		// 	'name'=>'when_created',
		// 	'header'=>'Created',
		// 	'value'=>function($data){
		// 		return date('D.M.Y', $data->when_created);
		// 	},
		// 	),
		array(
			'header'=>'Actions',
			'value'=>function($data){
				echo '<div class="dropdown">
						  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
						    Action
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						    <li role="presentation"><a role="menuitem" tabindex="-1" href="'.Yii::app()->createUrl('/forecast/history', array('id'=>CHtml::value($data, 'city.id'))).'">History</a></li>
						  </ul>
						</div>';
			},
			),
	),
)); ?>	