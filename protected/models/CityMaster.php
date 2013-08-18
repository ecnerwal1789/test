<?php

/**
 * This is the model class for table "city_master".
 *
 * The followings are the available columns in table 'city_master':
 * @property integer $CITY_ID
 * @property integer $CITY_COUNTRY_ID
 * @property integer $CITY_STATE_ID
 * @property string $CITY_CODE
 * @property string $CITY_NAME
 * @property integer $CITY_STATUS
 * @property string $CREATED_DATE
 * @property string $CREATED_USER
 * @property string $UPDATED_DATE
 * @property string $UPDATED_USER
 *
 * The followings are the available model relations:
 * @property CountryMaster $cITYCOUNTRY
 * @property StateMaster $cITYSTATE
 * @property EmployerMaster[] $employerMasters
 */
class CityMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CityMaster the static model class
	 */
    public $CITY_CHAR;
    public $CITY_COUNTRY_SEARCH;
    public $CITY_STATE_SEARCH;
    
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'city_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		  array('CITY_COUNTRY_ID, CITY_STATE_ID, CITY_CODE, CITY_NAME', 'required'),
                  array('CITY_CODE','unique','message'=>'City Code already exists!'),
                  //array('CITY_NAME','unique','message'=>'City Name already exists!'),
                    array('CITY_STATE_ID+CITY_NAME', 'ext.uniqueMultiColumnValidator','on'=>array('insert','update'), 'caseSensitive' => true),
		  array('CITY_COUNTRY_ID, CITY_STATE_ID, CITY_STATUS', 'numerical', 'integerOnly'=>true),
			array('CITY_CODE', 'length', 'max'=>45),
			array('CITY_NAME, CREATED_USER, UPDATED_USER', 'length', 'max'=>240),
			array('CREATED_DATE, UPDATED_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CITY_ID, CITY_COUNTRY_ID, CITY_STATE_ID, CITY_CODE, CITY_NAME, CITY_STATUS, CREATED_DATE, CREATED_USER, UPDATED_DATE, UPDATED_USER, CITY_STATE_SEARCH, CITY_COUNTRY_SEARCH', 'safe', 'on'=>'search'),
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
			'cITYCOUNTRY' => array(self::BELONGS_TO, 'CountryMaster', 'CITY_COUNTRY_ID'),
			'cITYSTATE' => array(self::BELONGS_TO, 'StateMaster', 'CITY_STATE_ID'),
			'employerMasters' => array(self::HAS_MANY, 'EmployerMaster', 'EMP_CITY_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CITY_ID' => 'City',
			'CITY_COUNTRY_ID' => 'Country Name',
			'CITY_STATE_ID' => 'State Name',
			'CITY_CODE' => 'City Code',
			'CITY_NAME' => 'City Name',
			'CITY_STATUS' => 'City Status',
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

		$criteria->compare('CITY_ID',$this->CITY_ID);
		$criteria->compare('CITY_COUNTRY_ID',$this->CITY_COUNTRY_ID);
		$criteria->compare('CITY_STATE_ID',$this->CITY_STATE_ID);
                
                $criteria->with = array( 'cITYCOUNTRY','cITYSTATE' );
                $criteria->compare('cITYCOUNTRY.COUNTRY_NAME', $this->CITY_COUNTRY_SEARCH, true );
                
                $criteria->compare('cITYSTATE.STATE_NAME', $this->CITY_STATE_SEARCH, true );
                
		$criteria->compare('CITY_CODE',$this->CITY_CODE,true);
		$criteria->compare('CITY_NAME',$this->CITY_NAME,true);
		$criteria->compare('CITY_STATUS',$this->CITY_STATUS);
		$criteria->compare('CREATED_DATE',$this->CREATED_DATE,true);
		$criteria->compare('CREATED_USER',$this->CREATED_USER,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);
                
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}


               