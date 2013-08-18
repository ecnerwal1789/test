<?php

/**
 * This is the model class for table "role_master".
 *
 * The followings are the available columns in table 'role_master':
 * @property integer $ROLE_ID
 * @property integer $ROLE_JOB_ID
 * @property string $ROLE_CODE
 * @property string $ROLE_NAME
 * @property string $CREATED_DATE
 * @property string $CREATED_USER
 * @property string $UPDATED_DATE
 * @property string $UPDATED_USER
 *
 * The followings are the available model relations:
 * @property EmployerJobPosting[] $employerJobPostings
 * @property JobMaster $rOLEJOB
 */
class RoleMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RoleMaster the static model class
	 */
    public $role_text;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'role_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ROLE_JOB_ID, ROLE_CODE', 'required'),
			array('ROLE_JOB_ID', 'numerical', 'integerOnly'=>true),
                    
                        /*array('ROLE_CODE','ext.validators.P3ArrayValidator', 
                          'min'=>1, 'allowEmpty'=>false, 'message' => 'You should select alteast one'
                        ),*/

                    
			array('ROLE_NAME, CREATED_USER, UPDATED_USER', 'length', 'max'=>240),
			array('CREATED_DATE, UPDATED_DATE,ROLE_CODE', 'safe'),
                        array('ROLE_CODE','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ROLE_ID, ROLE_JOB_ID, ROLE_CODE, ROLE_NAME, CREATED_DATE, CREATED_USER, UPDATED_DATE, UPDATED_USER', 'safe', 'on'=>'search'),
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
			'employerJobPostings' => array(self::HAS_MANY, 'EmployerJobPosting', 'EJP_ROLE_ID'),
			'rOLEJOB' => array(self::BELONGS_TO, 'JobMaster', 'ROLE_JOB_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ROLE_ID' => 'Role',
			'ROLE_JOB_ID' => 'Job Name',
			'ROLE_CODE' => 'Role Code',
			'ROLE_NAME' => 'Role Name',
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

		$criteria->compare('ROLE_ID',$this->ROLE_ID);
		$criteria->compare('ROLE_JOB_ID',$this->ROLE_JOB_ID);
		$criteria->compare('ROLE_CODE',$this->ROLE_CODE,true);
		$criteria->compare('ROLE_NAME',$this->ROLE_NAME,true);
		$criteria->compare('CREATED_DATE',$this->CREATED_DATE,true);
		$criteria->compare('CREATED_USER',$this->CREATED_USER,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}