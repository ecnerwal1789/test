<?php

/**
 * This is the model class for table "country_master".
 *
 * The followings are the available columns in table 'country_master':
 * @property integer $COUNTRY_ID
 * @property string $COUNTRY_CODE
 * @property string $COUNTRY_NAME
 * @property integer $COUNTRY_STATUS
 * @property string $CREATED_DATE
 * @property string $CREATED_USER
 * @property string $UPDATED_DATE
 * @property string $UPDATE_USER
 *
 * The followings are the available model relations:
 * @property CityMaster[] $cityMasters
 * @property StateMaster[] $stateMasters
 */
class CountryMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CountryMaster the static model class
	 */
	
         public $COUNTRY_CHAR;
          
         
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'country_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COUNTRY_CODE, COUNTRY_NAME', 'required'),
			array('COUNTRY_STATUS', 'numerical', 'integerOnly'=>true),
			array('COUNTRY_CODE', 'length', 'max'=>45),
			array('COUNTRY_NAME, CREATED_USER, UPDATED_USER', 'length', 'max'=>240),
			array('CREATED_DATE, UPDATED_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COUNTRY_ID, COUNTRY_CODE, COUNTRY_NAME, COUNTRY_STATUS, CREATED_DATE, CREATED_USER, UPDATED_DATE, UPDATED_USER', 'safe', 'on'=>'search'),
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
			'cityMasters' => array(self::HAS_MANY, 'CityMaster', 'CITY_COUNTRY_ID'),
			'stateMasters' => array(self::HAS_MANY, 'StateMaster', 'STATE_COUNTRY_ID'),
		);
                
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'COUNTRY_ID' => 'Country',
			'COUNTRY_CODE' => 'Country Code',
			'COUNTRY_NAME' => 'Country Name',
			'COUNTRY_STATUS' => 'Country Status',
			'CREATED_DATE' => 'Created Date',
			'CREATED_USER' => 'Created User',
			'UPDATED_DATE' => 'Updated Date',
			'UPDATED_USER' => 'Updated User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('COUNTRY_ID',$this->COUNTRY_ID);
		$criteria->compare('COUNTRY_CODE',$this->COUNTRY_CODE,true);
		$criteria->compare('COUNTRY_NAME',$this->COUNTRY_NAME,true);
		$criteria->compare('COUNTRY_STATUS',$this->COUNTRY_STATUS);
		$criteria->compare('CREATED_DATE',$this->CREATED_DATE,true);
		$criteria->compare('CREATED_USER',$this->CREATED_USER,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}