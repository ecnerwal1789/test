<?php

/**
 * This is the model class for table "employer_post_edits".
 *
 * The followings are the available columns in table 'employer_post_edits':
 * @property integer $EPE_ID
 * @property integer $EPE_EJP_ID
 * @property string $EPE_START_DATE
 * @property string $EPE_END_DATE
 * @property string $EPE_MAIL_LIST
 * @property integer $EPE_MAIL_SENT_COUNT
 * @property integer $EPE_CAND_ACTIVE_DAYS
 *
 * The followings are the available model relations:
 * @property EmployerJobPosting $ePEEJP
 */
class JobPostEdit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return JobPostEdit the static model class
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
		return 'employer_post_edits';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EPE_EJP_ID, EPE_CAND_ACTIVE_DAYS,EPE_TEST_DUE_DATE,EPE_TEST_DURATION,EPE_NO_QUES,CREATED_DATE,UPDATED_DATE', 'required'),
			array('EPE_EJP_ID, EPE_MAIL_SENT_COUNT, EPE_CAND_ACTIVE_DAYS,EPE_TEST_DURATION,EPE_NO_QUES', 'numerical', 'integerOnly'=>true),
			array('EPE_MAIL_LIST', 'length', 'max'=>2000),
			array('EPE_START_DATE, EPE_END_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EPE_ID, EPE_EJP_ID, EPE_START_DATE, EPE_END_DATE, EPE_MAIL_LIST, EPE_MAIL_SENT_COUNT,EPE_VIDEO_Y_N, EPE_CAND_ACTIVE_DAYS,EPE_TEST_DUE_DATE,EPE_TEST_DURATION,EPE_NO_QUES,CREATED_DATE,UPDATED_DATE', 'safe', 'on'=>'search'),
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
			'ePEEJP' => array(self::BELONGS_TO, 'EmployerJobPosting', 'EPE_EJP_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EPE_ID' => 'Epe',
			'EPE_EJP_ID' => 'Ejp',
			'EPE_START_DATE' => 'Start Date',
			'EPE_END_DATE' => 'End Date',
			'EPE_MAIL_LIST' => 'Mail List',
			'EPE_MAIL_SENT_COUNT' => 'Mail Sent Count',
			'EPE_CAND_ACTIVE_DAYS' => 'Candidate Active Days',
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

		$criteria->compare('EPE_ID',$this->EPE_ID);
		$criteria->compare('EPE_EJP_ID',$this->EPE_EJP_ID);
		$criteria->compare('EPE_START_DATE',$this->EPE_START_DATE,true);
		$criteria->compare('EPE_END_DATE',$this->EPE_END_DATE,true);
		$criteria->compare('EPE_MAIL_LIST',$this->EPE_MAIL_LIST,true);
		$criteria->compare('EPE_MAIL_SENT_COUNT',$this->EPE_MAIL_SENT_COUNT);
		$criteria->compare('EPE_CAND_ACTIVE_DAYS',$this->EPE_CAND_ACTIVE_DAYS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}