<?php
class JobCommand extends CConsoleCommand {

    public function check(){
        $arg = strtolower(trim(fgets(STDIN)));
        if((preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1]).(0[1-9]|1[0-2]).([0-9]{4})$/", $arg)))
            return $arg;
        else{
            print_r("Incorrect date format\n");
            self::check();
        }
        
    }

    public function run($args) {
        print_r("Input the city name:\n");    
        $city_name = trim(fgets(STDIN));
        $city_name1 = str_replace(" ", "%20", $city_name);
    	print_r("Input start date(Use this template - dd.mm.yyyy):\n");
        $start = self::check();
        print_r("Input end date(Use this template - dd.mm.yyyy):\n");
        $end = self::check();
        $map_url = "http://ctbsoft.md/forecast/api/getForecast?start=".$start."&end=".$end."&city=".$city_name1;
        // $map_url = Yii::app()->baseUrl."/getForecast.xml";
		$response_xml_data = file_get_contents($map_url);
		if($response_xml_data){
		     print_r("Read data from xml\n");
		 }

        $connection = Yii::app()->db; 
		$data = simplexml_load_string($response_xml_data);
        $sql_city_id = "Select `id` from cities where `name`='".$city_name."'";
        $command_select_city_id = $connection->createCommand($sql_city_id);
        $city_id = $command_select_city_id->queryRow();
        $finalInsertValues = '';
        $i = 0;
            foreach ($data as $key => $value) {
                $sql_select = "Select * from forecast where `city_id`='".$city_id['id']."' and `when_created`='".$value->ts."'";
                $command_select = $connection->createCommand($sql_select);
                if(count($command_select->queryAll()) == 0){
                    // $finalInsertValues .= "('".$city_id['id']."', '".$value->temperature."', '".$value->ts."'),";
                    if($i==0){
                        $finalInsertValues = "Insert into forecast (`city_id`, `temperature`, `when_created`) Select ".$city_id['id']." as `city_id`, ".$value->temperature." as `temperature`, ".$value->ts." as `when_created`";
                    }
                    elseif ($i<=500) {
                        $finalInsertValues .= " Union Select ".$city_id['id'].", ".$value->temperature.", ".$value->ts;
                    }
                    // $finalInsertValues .= " Union Select ".$city_id['id'].", ".$value->temperature.", ".$value->ts;
                    $i++;
                }
                if($i==500){
                    if($finalInsertValues != ''){
                        $command = $connection->createCommand($finalInsertValues); 
                        $command->execute();
                    }
                    print_r("Inserted ".$i." rows\n");
                    $i=0;
                }

            }
            // $finalInsertValues = substr($finalInsertValues, 0, -1);
            // die(var_dump($finalInsertValues));
        //     if($finalInsertValues != ''){
        //         // $sql_insert = "Insert into forecast (`city_id`, `temperature`, `when_created`) values ".$finalInsertValues;

        //         // $command = $connection->createCommand($sql_insert); 
        //         $command = $connection->createCommand($finalInsertValues); 
        //         $command->execute();
        //     }
        // print_r("Inserted ".$i." rows\n");
    }
}