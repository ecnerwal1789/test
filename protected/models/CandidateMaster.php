<?php

/**
 * This is the model class for table "candidate_master".
 *
 * The followings are the available columns in table 'candidate_master':
 * @property integer $CAND_ID
 * @property string $CAND_FIRST_NAME
 * @property string $CAND_LAST_NAME
 * @property string $CAND_DOB
 * @property string $CAND_EMAIL_ID
 * @property integer $CAND_PHONE_NO
 * @property string $CAND_REG_DATE
 * @property string $UPDATED_DATE
 * @property string $UPDATED_USER
 * @property string $CAND_GENDER
 *
 * The followings are the available model relations:
 * @property CandidateTest[] $candidateTests
 * @property EmployerJobPosting[] $employerJobPostings
 * @property CandidateUploadTest[] $candidateUploadTests
 * @property EmpJobPostResult[] $empJobPostResults
 */
class CandidateMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CandidateMaster the static model class
	 */
       // public $test;
   

//   
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'candidate_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CAND_FIRST_NAME, CAND_DOB, CAND_EMAIL_ID, CAND_PHONE_NO, CAND_GENDER,CREATED_DATE,', 'required'),
			array('CAND_PHONE_NO', 'numerical', 'integerOnly'=>true),
                        array('CAND_STATUS', 'numerical', 'integerOnly'=>true),
                        array('CAND_EMAIL_ID','unique','message'=>'Email Id already exists!'),
                        array('CAND_EMAIL_ID','email'),
                        array('CAND_DOB', 'date', 'format'=>array('yyyy-mm-dd'), 'allowEmpty'=>true),
			array('CAND_FIRST_NAME, CAND_LAST_NAME, CAND_EMAIL_ID, UPDATED_USER', 'length', 'max'=>240),
			array('CAND_GENDER', 'length', 'max'=>20),
			array('CAND_REG_DATE, UPDATED_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CAND_ID, CAND_FIRST_NAME, CAND_LAST_NAME, CAND_DOB, CAND_EMAIL_ID, CAND_PHONE_NO, CAND_REG_DATE, UPDATED_DATE, UPDATED_USER, CAND_GENDER, CAND_STATUS,CREATED_DATE', 'safe', 'on'=>'search'),
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
			'candidateTests' => array(self::HAS_MANY, 'CandidateTest', 'CAND_TEST_CAND_ID'),
			'employerJobPostings' => array(self::MANY_MANY, 'EmployerJobPosting', 'candidate_test_summary(CAND_TS_CAND_ID, CAND_TS_EJP_ID)'),
			'candidateUploadTests' => array(self::HAS_MANY, 'CandidateUploadTest', 'CAND_UT_CAND_ID'),
			'empJobPostResults' => array(self::HAS_MANY, 'EmpJobPostResult', 'EJPR_CAND_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CAND_ID' => 'Cand',
			'CAND_FIRST_NAME' => 'First Name',
			'CAND_LAST_NAME' => 'Last Name',
			'CAND_DOB' => 'Date Of Birth',
			'CAND_EMAIL_ID' => 'Email',
			'CAND_PHONE_NO' => 'Phone No',
			'CAND_REG_DATE' => 'Cand Reg Date',
			'UPDATED_DATE' => 'Updated Date',
			'UPDATED_USER' => 'Updated User',
			'CAND_GENDER' => 'Cand Gender',
                        'CAND_STATUS' => 'Status',
                        
//                    
                       
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
                //$criteria->with = array('candidateTests');

                //$criteria->condition='CAND_TEST_EJP_ID='.yii::app()->session['Emp_Id'];
		$criteria->compare('CAND_ID',$this->CAND_ID);
               $criteria->condition='CAND_ID IN (SELECT DISTINCT a.cand_test_cand_id
FROM candidate_test a, employer_job_posting b WHERE b.ejp_emp_id ="'.yii::app()->session['Emp_Id'].'" AND a.cand_test_ejp_id = b.ejp_id)';
		$criteria->compare('CAND_FIRST_NAME',$this->CAND_FIRST_NAME,true);
		$criteria->compare('CAND_LAST_NAME',$this->CAND_LAST_NAME,true);
		$criteria->compare('CAND_DOB',$this->CAND_DOB,true);
		$criteria->compare('CAND_EMAIL_ID',$this->CAND_EMAIL_ID,true);
		$criteria->compare('CAND_PHONE_NO',$this->CAND_PHONE_NO);
		$criteria->compare('CAND_REG_DATE',$this->CAND_REG_DATE,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);
		$criteria->compare('CAND_GENDER',$this->CAND_GENDER,true);
                $criteria->compare('CAND_STATUS',$this->CAND_STATUS,true);
                
//		 
//               
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}