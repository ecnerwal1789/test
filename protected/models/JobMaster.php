<?php

/**
 * This is the model class for table "job_master".
 *
 * The followings are the available columns in table 'job_master':
 * @property integer $JOB_ID
 * @property string $JOB_CODE
 * @property string $JOB_NAME
 * @property string $CREATED_DATE
 * @property string $CREATED_USER
 * @property string $UPDATED_DATE
 * @property string $UPDATED_USER
 *
 * The followings are the available model relations:
 * @property RoleMaster[] $roleMasters
 * @property SkillMaster[] $skillMasters
 */
class JobMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return JobMaster the static model class
	 */
        public $JOB_CHAR;
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'job_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('JOB_CODE,JOB_NAME' , 'required'),
			array('JOB_CODE', 'length', 'max'=>4),
                        array('JOB_CODE','unique','message'=>'Job Code already exists!'),
                        array('JOB_NAME','unique','message'=>'Job Name already exists!'),
                        //array('JOB_NAME', 'customValidation'),

			array('JOB_NAME, CREATED_USER, UPDATED_USER', 'length', 'max'=>240),
			array('CREATED_DATE, UPDATED_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
                     
			array('JOB_ID, JOB_CODE, JOB_NAME, CREATED_DATE, CREATED_USER, UPDATED_DATE, UPDATED_USER', 'safe', 'on'=>'search'),
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
			'roleMasters' => array(self::HAS_MANY, 'RoleMaster', 'ROLE_JOB_ID'),
			'skillMasters' => array(self::HAS_MANY, 'SkillMaster', 'SKILL_JOB_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'JOB_ID' => 'Job',
			'JOB_CODE' => 'Job Code',
			'JOB_NAME' => 'Job Name',
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

		$criteria->compare('JOB_ID',$this->JOB_ID);
		$criteria->compare('JOB_CODE',$this->JOB_CODE,true);
		$criteria->compare('JOB_NAME',$this->JOB_NAME,true);
		$criteria->compare('CREATED_DATE',$this->CREATED_DATE,true);
		$criteria->compare('CREATED_USER',$this->CREATED_USER,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function search1()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('JOB_ID',$this->JOB_ID);
		$criteria->compare('JOB_CODE',$this->JOB_CODE,true);
		$criteria->compare('JOB_NAME',$this->JOB_NAME,true);
		$criteria->compare('CREATED_DATE',$this->CREATED_DATE,true);
		$criteria->compare('CREATED_USER',$this->CREATED_USER,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>false
		));
	}
//        public function customValidation($attribute,$params)
//{
//   if (!empty($this->$attribute))
//   {
//      // Checks for only when there is a value
//
//      // @todo Add additional error checking here
//      $this->addError($attribute, 'You supplied a value but there was an error.');
//
//   }
//}
        
}