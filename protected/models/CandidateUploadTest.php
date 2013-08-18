<?php

/**
 * This is the model class for table "candidate_upload_test".
 *
 * The followings are the available columns in table 'candidate_upload_test':
 * @property integer $CAND_UT_QUES_ID
 * @property integer $CAND_UT_EJP_ID
 * @property integer $CAND_UT_CAND_ID
 * @property string $CAND_UT_CAND_ANS_OPT
 * @property string $CAND_UT_ANS_FLAG
 *
 * The followings are the available model relations:
 * @property CandidateMaster $cANDUTCAND
 * @property EmployerJobPosting $cANDUTEJP
 * @property MapQuesMaster $cANDUTQUES
 */
class CandidateUploadTest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CandidateUploadTest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'candidate_upload_test';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CAND_UT_QUES_ID, CAND_UT_EJP_ID, CAND_UT_CAND_ID, CAND_UT_ANS_FLAG,CREATED_DATE,UPDATED_DATE', 'required'),
			array('CAND_UT_QUES_ID, CAND_UT_EJP_ID, CAND_UT_CAND_ID', 'numerical', 'integerOnly'=>true),
			array('CAND_UT_CAND_ANS_OPT, CAND_UT_ANS_FLAG', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CAND_UT_QUES_ID, CAND_UT_EJP_ID, CAND_UT_CAND_ID, CAND_UT_CAND_ANS_OPT, CAND_UT_ANS_FLAG,CREATED_DATE,UPDATED_DATE', 'safe', 'on'=>'search'),
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
			'cANDUTCAND' => array(self::BELONGS_TO, 'CandidateMaster', 'CAND_UT_CAND_ID'),
			'cANDUTEJP' => array(self::BELONGS_TO, 'EmployerJobPosting', 'CAND_UT_EJP_ID'),
			'cANDUTQUES' => array(self::BELONGS_TO, 'MapQuesMaster', 'CAND_UT_QUES_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CAND_UT_QUES_ID' => 'Cand Ut Ques',
			'CAND_UT_EJP_ID' => 'Cand Ut Ejp',
			'CAND_UT_CAND_ID' => 'Cand Ut Cand',
			'CAND_UT_CAND_ANS_OPT' => 'Cand Ut Cand Ans Opt',
			'CAND_UT_ANS_FLAG' => 'Cand Ut Ans Flag',
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

		$criteria->compare('CAND_UT_QUES_ID',$this->CAND_UT_QUES_ID);
		$criteria->compare('CAND_UT_EJP_ID',$this->CAND_UT_EJP_ID);
		$criteria->compare('CAND_UT_CAND_ID',$this->CAND_UT_CAND_ID);
		$criteria->compare('CAND_UT_CAND_ANS_OPT',$this->CAND_UT_CAND_ANS_OPT,true);
		$criteria->compare('CAND_UT_ANS_FLAG',$this->CAND_UT_ANS_FLAG,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}