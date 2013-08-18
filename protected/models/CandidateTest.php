<?php

/**
 * This is the model class for table "candidate_test".
 *
 * The followings are the available columns in table 'candidate_test':
 * @property integer $CAND_TEST_QUES_ID
 * @property integer $CAND_TEST_EJP_ID
 * @property integer $CAND_TEST_CAND_ID
 * @property string $CAND_TEST_CAND_ANS_OPT
 * @property string $CAND_TEST_ANS_FLAG
 * @property integer $CAND_TEST_SKILL_ID
 *
 * The followings are the available model relations:
 * @property SkillMaster $cANDTESTSKILL
 * @property CandidateMaster $cANDTESTCAND
 * @property EmployerJobPosting $cANDTESTEJP
 * @property QuestionMaster $cANDTESTQUES
 */
class CandidateTest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CandidateTest the static model class
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
		return 'candidate_test';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CAND_TEST_QUES_ID, CAND_TEST_EJP_ID, CAND_TEST_CAND_ID, CAND_TEST_ANS_FLAG, CAND_TEST_SKILL_ID,CREATED_DATE,UPDATED_DATE', 'required'),
			array('CAND_TEST_QUES_ID, CAND_TEST_EJP_ID, CAND_TEST_CAND_ID, CAND_TEST_SKILL_ID', 'numerical', 'integerOnly'=>true),
			array('CAND_TEST_CAND_ANS_OPT, CAND_TEST_ANS_FLAG', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CAND_TEST_QUES_ID, CAND_TEST_EJP_ID, CAND_TEST_CAND_ID, CAND_TEST_CAND_ANS_OPT, CAND_TEST_ANS_FLAG, CAND_TEST_SKILL_ID,CREATED_DATE,UPDATED_DATE', 'safe', 'on'=>'search'),
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
			'cANDTESTSKILL' => array(self::BELONGS_TO, 'SkillMaster', 'CAND_TEST_SKILL_ID'),
			'cANDTESTCAND' => array(self::BELONGS_TO, 'CandidateMaster', 'CAND_TEST_CAND_ID'),
			'cANDTESTEJP' => array(self::BELONGS_TO, 'EmployerJobPosting', 'CAND_TEST_EJP_ID'),
			'cANDTESTQUES' => array(self::BELONGS_TO, 'QuestionMaster', 'CAND_TEST_QUES_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CAND_TEST_QUES_ID' => 'Cand Test Ques',
			'CAND_TEST_EJP_ID' => 'Cand Test Ejp',
			'CAND_TEST_CAND_ID' => 'Cand Test Cand',
			'CAND_TEST_CAND_ANS_OPT' => 'Cand Test Cand Ans Opt',
			'CAND_TEST_ANS_FLAG' => 'Cand Test Ans Flag',
			'CAND_TEST_SKILL_ID' => 'Cand Test Skill',
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

		$criteria->compare('CAND_TEST_QUES_ID',$this->CAND_TEST_QUES_ID);
		$criteria->compare('CAND_TEST_EJP_ID',$this->CAND_TEST_EJP_ID);
		$criteria->compare('CAND_TEST_CAND_ID',$this->CAND_TEST_CAND_ID);
		$criteria->compare('CAND_TEST_CAND_ANS_OPT',$this->CAND_TEST_CAND_ANS_OPT,true);
		$criteria->compare('CAND_TEST_ANS_FLAG',$this->CAND_TEST_ANS_FLAG,true);
		$criteria->compare('CAND_TEST_SKILL_ID',$this->CAND_TEST_SKILL_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}