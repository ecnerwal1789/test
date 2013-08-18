<?php

/**
 * This is the model class for table "state_master".
 *
 * The followings are the available columns in table 'state_master':
 * @property integer $STATE_ID
 * @property integer $STATE_COUNTRY_ID
 * @property string $STATE_CODE
 * @property string $STATE_NAME
 * @property integer $STATE_STATUS
 * @property string $CREATED_DATE
 * @property string $CREATED_USER
 * @property string $UPDATED_DATE
 * @property string $UPDATE_USER
 *
 * The followings are the available model relations:
 * @property CityMaster[] $cityMasters
 * @property EmployerMaster[] $employerMasters
 * @property CountryMaster $sTATECOUNTRY
 */
class StateMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StateMaster the static model class
	 */
    public $STATE_CHAR;
    public $STATE_COUNTRY_SEARCH;
    
   
  
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'state_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('STATE_COUNTRY_ID, STATE_CODE, STATE_NAME', 'required'),
                        array('STATE_CODE','unique','message'=>'State Code already exists!'),
                        //array('STATE_NAME','unique','message'=>'State Name already exists!'),
                    array('STATE_COUNTRY_ID+STATE_NAME', 'ext.uniqueMultiColumnValidator','on'=>array('insert','update'), 'caseSensitive' => true),
			array('STATE_COUNTRY_ID, STATE_STATUS', 'numerical', 'integerOnly'=>true),
			array('STATE_CODE', 'length', 'max'=>45),
			array('STATE_NAME, CREATED_USER, UPDATED_USER', 'length', 'max'=>240),
			array('CREATED_DATE, UPDATED_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('STATE_ID, STATE_COUNTRY_ID, STATE_CODE, STATE_NAME, STATE_STATUS, CREATED_DATE, CREATED_USER, UPDATED_DATE, UPDATED_USER, STATE_COUNTRY_SEARCH', 'safe', 'on'=>'search'),
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
			'cityMasters' => array(self::HAS_MANY, 'CityMaster', 'CITY_STATE_ID'),
			'employerMasters' => array(self::HAS_MANY, 'EmployerMaster', 'EMP_STATE_ID'),
			'sTATECOUNTRY' => array(self::BELONGS_TO, 'CountryMaster', 'STATE_COUNTRY_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'STATE_ID' => 'State',
			'STATE_COUNTRY_ID' => 'Country Name',
			'STATE_CODE' => 'State Code',
			'STATE_NAME' => 'State Name',
			'STATE_STATUS' => 'State Status',
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

		$criteria->compare('STATE_ID',$this->STATE_ID);
		$criteria->compare('STATE_COUNTRY_ID',$this->STATE_COUNTRY_ID);
                $criteria->with = array( 'sTATECOUNTRY' );
                $criteria->compare('sTATECOUNTRY.COUNTRY_NAME', $this->STATE_COUNTRY_SEARCH, true );
		$criteria->compare('STATE_CODE',$this->STATE_CODE,true);
		$criteria->compare('STATE_NAME',$this->STATE_NAME,true);
		$criteria->compare('STATE_STATUS',$this->STATE_STATUS);
		$criteria->compare('CREATED_DATE',$this->CREATED_DATE,true);
		$criteria->compare('CREATED_USER',$this->CREATED_USER,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}