<?php

/**
 * This is the model class for table "employer_job_post_level_2".
 *
 * The followings are the available columns in table 'employer_job_post_level_2':
 * @property integer $EJPL2_ID
 * @property integer $EJPL2_EJP_ID
 * @property integer $EJPL2_SKILL_ID
 * @property integer $EJPL2_QUES_ID
 *
 * The followings are the available model relations:
 * @property QuestionMaster $eJPL2QUES
 * @property EmployerJobPosting $eJPL2EJP
 * @property SkillMaster $eJPL2SKILL
 */
class JobPostLevel_2 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return JobPostLevel_2 the static model class
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
		return 'employer_job_post_level_2';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EJPL2_EJP_ID, EJPL2_SKILL_ID, EJPL2_QUES_ID', 'required'),
			array('EJPL2_EJP_ID, EJPL2_SKILL_ID, EJPL2_QUES_ID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EJPL2_ID, EJPL2_EJP_ID, EJPL2_SKILL_ID, EJPL2_QUES_ID', 'safe', 'on'=>'search'),
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
			'eJPL2QUES' => array(self::BELONGS_TO, 'QuestionMaster', 'EJPL2_QUES_ID'),
			'eJPL2EJP' => array(self::BELONGS_TO, 'EmployerJobPosting', 'EJPL2_EJP_ID'),
			'eJPL2SKILL' => array(self::BELONGS_TO, 'SkillMaster', 'EJPL2_SKILL_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EJPL2_ID' => 'Ejpl2',
			'EJPL2_EJP_ID' => 'Ejpl2 Ejp',
			'EJPL2_SKILL_ID' => 'Ejpl2 Skill',
			'EJPL2_QUES_ID' => 'Ejpl2 Ques',
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

		$criteria->compare('EJPL2_ID',$this->EJPL2_ID);
		$criteria->compare('EJPL2_EJP_ID',$this->EJPL2_EJP_ID);
		$criteria->compare('EJPL2_SKILL_ID',$this->EJPL2_SKILL_ID);
		$criteria->compare('EJPL2_QUES_ID',$this->EJPL2_QUES_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}