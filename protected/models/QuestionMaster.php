<?php

/**
 * This is the model class for table "question_master".
 *
 * The followings are the available columns in table 'question_master':
 * @property integer $QUES_ID
 * @property string $QUES_DESC
 * @property string $QUES_OPT_CDE_1
 * @property string $QUES_OPT_1
 * @property string $QUES_OPT_CDE_2
 * @property string $QUES_OPT_2
 * @property string $QUES_OPT_CDE_3
 * @property string $QUES_OPT_3
 * @property string $QUES_OPT_CDE_4
 * @property string $QUES_OPT_4
 * @property string $QUES_OPT_CDE_5
 * @property string $QUES_OPT_5
 * @property string $QUES_OPT_CDE_6
 * @property string $QUES_OPT_6
 * @property string $QUES_ANS_OPT_CDE
 * @property string $QUES_ANS_OPT
 *
 * The followings are the available model relations:
 * @property CandidateTest[] $candidateTests
 * @property EmployerJobPostLevel2[] $employerJobPostLevel2s
 * @property MapQuesMaster[] $mapQuesMasters
 */
class QuestionMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return QuestionMaster the static model class
	 */
    public $showerror;
    public $xmlFile;
   
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'question_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
          if(Yii::app()->controller->action->id=='upload') 
          {
             return array(
			
                         array('xmlFile', 'file', 'allowEmpty' => false, 'types' => 'xls,xlsx'),        
                         array('xmlFile', 'ext.validators.fileUploadErrorValidator'),
		); 
          }
         else 
         {
             return array(
			array('QUES_DESC, QUES_ANS_OPT_CDE,QUES_INIT_JOB,QUES_INIT_ROLE,QUES_INIT_SKILL,QUES_TYPE', 'required'),
			array('QUES_DESC', 'length', 'max'=>2000),
                 	array('QUES_OPT_1,QUES_OPT_2,QUES_OPT_3,QUES_OPT_4, QUES_OPT_CDE_5, QUES_OPT_5, QUES_OPT_6, QUES_ANS_OPT', 'length', 'max'=>500),
                        array('QUES_INIT_JOB,QUES_INIT_SKILL,QUES_INIT_ROLE', 'length', 'max'=>240),
			array('QUES_OPT_CDE_1,QUES_OPT_CDE_2,QUES_OPT_CDE_3,QUES_OPT_CDE_4,QUES_OPT_CDE_5, QUES_OPT_CDE_6,QUES_ANS_OPT_CDE', 'length', 'max'=>45),
			array('QUES_ID, QUES_DESC, QUES_OPT_CDE_1, QUES_OPT_1, QUES_OPT_CDE_2, QUES_OPT_2, QUES_OPT_CDE_3, QUES_OPT_3, QUES_OPT_CDE_4, QUES_OPT_4, QUES_OPT_CDE_5, QUES_OPT_5, QUES_OPT_CDE_6, QUES_OPT_6, QUES_ANS_OPT_CDE, QUES_ANS_OPT,QUES_INIT_JOB,QUES_INIT_SKILL,QUES_INIT_ROLE,QUES_TYPE', 'safe', 'on'=>'search'),
		        );
         }
		
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'candidateTests' => array(self::HAS_MANY, 'CandidateTest', 'CAND_TEST_QUES_ID'),
			'employerJobPostLevel2s' => array(self::HAS_MANY, 'EmployerJobPostLevel2', 'EJPL2_QUES_ID'),
			'mapQuesMasters' => array(self::HAS_MANY, 'MapQuesMaster', 'MAP_QUES_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'QUES_ID' => 'Question Id',
			'QUES_DESC' => 'Description',
			'QUES_OPT_CDE_1' => 'Option Code 1',
			'QUES_OPT_1' => 'Option 1',
			'QUES_OPT_CDE_2' => 'Option Code 2',
			'QUES_OPT_2' => 'Option 2',
			'QUES_OPT_CDE_3' => 'Option Code 3',
			'QUES_OPT_3' => 'Option 3',
			'QUES_OPT_CDE_4' => 'Option Code 4',
			'QUES_OPT_4' => 'Option 4',
			'QUES_OPT_CDE_5' => 'Option Code 5',
			'QUES_OPT_5' => 'Option 5',
			'QUES_OPT_CDE_6' => 'Option Code 6',
			'QUES_OPT_6' => 'Option 6',
			'QUES_ANS_OPT_CDE' =>'Answer Option Code',
			'QUES_ANS_OPT' => 'Answer Option',
                    'QUES_INIT_JOB' => 'Initial Job',
                    'QUES_INIT_SKILL' => 'Initial Skill',
                    'QUES_INIT_ROLE' => 'Initial Role',
                            
                    
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

		$criteria->compare('QUES_ID',$this->QUES_ID);
		$criteria->compare('QUES_DESC',$this->QUES_DESC,true);
                $criteria->compare('QUES_OPT_CDE_1',$this->QUES_OPT_CDE_1,true);
		$criteria->compare('QUES_OPT_1',$this->QUES_OPT_1,true);
		$criteria->compare('QUES_OPT_CDE_2',$this->QUES_OPT_CDE_2,true);
		$criteria->compare('QUES_OPT_2',$this->QUES_OPT_2,true);
		$criteria->compare('QUES_OPT_CDE_3',$this->QUES_OPT_CDE_3,true);
		$criteria->compare('QUES_OPT_3',$this->QUES_OPT_3,true);
		$criteria->compare('QUES_OPT_CDE_4',$this->QUES_OPT_CDE_4,true);
		$criteria->compare('QUES_OPT_4',$this->QUES_OPT_4,true);
		$criteria->compare('QUES_OPT_CDE_5',$this->QUES_OPT_CDE_5,true);
		$criteria->compare('QUES_OPT_5',$this->QUES_OPT_5,true);
		$criteria->compare('QUES_OPT_CDE_6',$this->QUES_OPT_CDE_6,true);
		$criteria->compare('QUES_OPT_6',$this->QUES_OPT_6,true);
		$criteria->compare('QUES_ANS_OPT_CDE',$this->QUES_ANS_OPT_CDE,true);
		$criteria->compare('QUES_ANS_OPT',$this->QUES_ANS_OPT,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}