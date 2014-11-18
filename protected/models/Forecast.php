<?php

/**
 * This is the model class for table "forecast".
 *
 * The followings are the available columns in table 'forecast':
 * @property integer $id
 * @property integer $city_id
 * @property double $temperature
 * @property string $when_created
 *
 * The followings are the available model relations:
 * @property Cities $city
 */
class Forecast extends CActiveRecord
{
	public $country;
	public $max_temperature;
	public $min_temperature;
	public $avg_temperature;
	public $start_date;
	public $end_date;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'forecast';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id', 'required'),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('temperature', 'numerical'),
			array('when_created, max_temperature, min_temperature, avg_temperature, start_date, end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, city_id, temperature, when_created, country, max_temperature, min_temperature, avg_temperature, start_date, end_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'city' => array(self::BELONGS_TO, 'Cities', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'city_id' => 'City',
			'temperature' => 'Temperature',
			'when_created' => 'When Created',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;	
        $criteria->with = array('city');
        $criteria->group="city_id";
        $criteria->select="when_created, max(temperature) as max_temperature, min(temperature) as min_temperature, avg(temperature) as avg_temperature";

		$criteria->compare('id',$this->id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('temperature',$this->temperature);

        if ($this->start_date != null) {
            $criteria->addCondition("when_created>=".strtotime($this->start_date));
		}
		if ($this->end_date != null) {
            $criteria->addCondition("when_created<=".strtotime($this->end_date));
		}
		if(($this->start_date != null) && ($this->end_date != null))			
			$criteria->compare('when_created',$this->when_created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Forecast the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function convertFahrenheitToCelsius($value)
	{
	    return (($value - 32) * 5) / 9;
	}
}
