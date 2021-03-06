<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property string $email
 * @property string $phone
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Action[] $actions
 * @property Help[] $helps
 * @property Post[] $posts
 */
class User extends CActiveRecord
{
	const USER_ROLE_VOLONTER = 'volonter';
	const USER_ROLE_POKRETAC = 'pokretac';
	const USER_ROLE_KOMPLETAN = 'kompletan';
	const USER_ROLE_ADMIN = 'admin';

	public $passwordRepeat;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password, passwordRepeat', 'required', 'on'=>'create'),
			array('email', 'unique','className'=>'User','attributeName'=>'email','message'=>"Već ste registrovani sa ovom adresom"),
			array('name, type, phone, password', 'length', 'max'=>45),
			array('email', 'length', 'max'=>120),
			array('passwordRepeat', 'compare', 'compareAttribute'=>'password' ,'on'=>'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, last_name, type, email, phone, password', 'safe', 'on'=>'search'),
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
			'actions' => array(self::HAS_MANY, 'Action', 'user_id'),
			'helps' => array(self::HAS_MANY, 'Help', 'user_id'),
			'posts' => array(self::HAS_MANY, 'Post', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Ime i prezime',
			'type' => 'Tip',
			'email' => 'Email adresa',
			'phone' => 'Broj telefona',
			'password' => 'Lozinka',
			'passwordRepeat' => 'Ponovite lozinku',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getUser($email, $password)
	{
		return $this->findByAttributes(
			array(
				"email" => $email,
				"password" => md5($password),
			));
	}
}
