<?php

/**
 * This is the model class for table "action".
 *
 * The followings are the available columns in table 'action':
 * @property integer $id
 * @property string $title
 * @property string $time_start
 * @property string $description
 * @property integer $user_id
 * @property string $time_end
 * @property integer $city_ptt
 * @property integer $number_of_participants
 *
 * The followings are the available model relations:
 * @property User $user
 * @property City $cityPtt
 */
class Action extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'action';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, city_ptt', 'required'),
			array('user_id, city_ptt, number_of_participants', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('time_start, description, time_end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, time_start, description, user_id, time_end, city_ptt, number_of_participants', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
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
			'title' => 'Title',
			'time_start' => 'Time Start',
			'description' => 'Description',
			'user_id' => 'User',
			'time_end' => 'Time End',
			'city_ptt' => 'City Ptt',
			'number_of_participants' => 'Number Of Participants',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('time_start',$this->time_start,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('time_end',$this->time_end,true);
		$criteria->compare('city_ptt',$this->city_ptt);
		$criteria->compare('number_of_participants',$this->number_of_participants);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Action the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
