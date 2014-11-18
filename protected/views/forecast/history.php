<?php
/* @var $this ForecastController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'History',
);
?>
<ul class="list-group">
	<li class="list-group-item" style="background-color: #F5F5F5">History of 
		<?php 
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$city = Cities::model()->findByPk($id);
			echo CHtml::value($city, 'name').'( '.CHtml::value(Countries::model()->findByPk(CHtml::value($city, 'id')), 'name').' )';?>
	</li>
  	<li class="list-group-item">
	  	<div class="container" style="padding-left:0px;margin:0px">
			<?php
				$previous_day = 0;
				$i = 0;
				foreach($model as $key => $value){//die(var_dump($model[$key]['temperature']));
					if((date('d', $value['when_created']) != $previous_day) || ($previous_day==0)) {
						if($i == 0){
							// echo '<div class="row">';
							echo '<div class="col-md-3">';
							echo '<strong>'.date('d F, Y', $value['when_created']).'</strong><br />';
							echo date('H:i:s', $value['when_created']).' '.$value['temperature'].'<br />';
							$previous_day = date('d', $value['when_created']);
							$i++;	
						} else {
							echo '</div>';
							echo '<div class="col-md-3">';
							echo '<strong>'.date('d F, Y', $value['when_created']).'</strong><br />';
							echo date('H:i:s', $value['when_created']).' '.$value['temperature'].'<br />';
							$previous_day = date('d', $value['when_created']);
							$i = 0;
						}
						
						$i++;
					} elseif(date('d', $value['when_created']) == $previous_day){
						echo date('H:i:s', $value['when_created']).' '.ForecastController::convertFahrenheitToCelsius($value['temperature']).'<br />';
							$previous_day = date('d', $value['when_created']);
					}
					
					// if($i<4){		
					// 	echo '</div>';
					// 	echo '<div class="col-md-3">';
					// 	echo '<strong>'.date('d F, Y', $value['when_created']).'</strong><br />';
					// 	$previous_day = date('d', $value['when_created']);
					// 	echo $value['temperature'];$i++;
					// }
					// else{
					// 	echo '</div><br />';
					// 	$i = 0;
					// }


					// echo '<div class="col-md-3">';
					// // echo
					// echo date('d.m.y', $value['when_created'])."<br />";
				}
			?>
			</div>
		</div>
	</li>
</ul>