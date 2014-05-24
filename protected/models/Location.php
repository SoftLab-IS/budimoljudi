<?php

/**
 * This is the model class for table "location".
 *
 * The followings are the available columns in table 'location':
 * @property integer $id
 * @property integer $state_id
 * @property integer $region_id
 * @property integer $city_ptt
 *
 * The followings are the available model relations:
 * @property Action[] $actions
 * @property Help[] $helps
 * @property State $state
 * @property Region $region
 * @property City $cityPtt
 */
class Location extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'location';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('state_id', 'required', 'on'=>'help'),
			array('state_id, region_id, city_ptt', 'required', 'on'=>'action'),
			array('state_id, region_id, city_ptt', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, state_id, region_id, city_ptt', 'safe', 'on'=>'search'),
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
			'actions' => array(self::HAS_MANY, 'Action', 'Location_id'),
			'helps' => array(self::HAS_MANY, 'Help', 'Location_id'),
			'state' => array(self::BELONGS_TO, 'State', 'state_id'),
			'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
			'cityPtt' => array(self::BELONGS_TO, 'City', 'city_ptt'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'state_id' => 'Država',
			'region_id' => 'Regija',
			'city_ptt' => 'Grad',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('city_ptt',$this->city_ptt);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Location the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
