<?php

/**
 * This is the model class for table "map_ques_master".
 *
 * The followings are the available columns in table 'map_ques_master':
 * @property integer $MAP_QUES_ID
 * @property integer $MAP_JOB_ID
 * @property integer $MAP_SKILL_ID
 * @property string $MAP_RFLAG_DFDSFDSFSD
 * @property string $MAP_RFLAG_ARCHITECT
 * @property string $MAP_RFLAG_DEVELOPER
 * @property string $MAP_RFLAG_ADMIN
 * @property string $MAP_RFLAG_SR_DEVELOPER
 * @property string $MAP_RFLAG_LEAD
 * @property string $MAP_RFLAG_DBA
 * @property integer $MAP_FLAG_PREVIEW
 * @property string $MAP_TOUGHNESS_IDNX_PERSKILL
 * @property string $CREATED_DATE
 * @property string $CREATED_USER
 * @property string $UPDATED_DATE
 * @property string $UPDATED_USER
 * @property integer $MAP_QUES_STATUS
 *
 * The followings are the available model relations:
 * @property CandidateUploadTest[] $candidateUploadTests
 * @property QuestionMaster $mAPQUES
 * @property JobMaster $mAPJOB
 * @property SkillMaster $mAPSKILL
 */
class MapQuesMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MapQuesMaster the static model class
	 */
    public $JOB_SEARCH;
    public $SKILL_SEARCH;
    public $ROLE_SEARCH;
    public $Ques_From;
    public $Ques_To  ;
    public $QUES_ID;
    public $showerror;
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'map_ques_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    // array('MAP_QUES_ID+MAP_JOB_ID+MAP_SKILL_ID', 'ext.uniqueMultiColumnValidator','on'=>array('insert'), 'caseSensitive' => true),
//                        array('Ques_From,Ques_To','required','message'=>'enter Both'),
//			array('MAP_QUES_ID, MAP_JOB_ID, MAP_SKILL_ID, MAP_RFLAG_DFDSFDSFSD, MAP_QUES_STATUS', 'required'),
//                        array('JOB_SEARCH,SKILL_SEARCH,ROLE_SEARCH','required'),
//			array('MAP_QUES_ID, MAP_JOB_ID, MAP_SKILL_ID, MAP_FLAG_PREVIEW, MAP_QUES_STATUS', 'numerical', 'integerOnly'=>true),
			//array('MAP_RFLAG_DFDSFDSFSD', 'length', 'max'=>255),
//			array('MAP_RFLAG_ARCHITECT, MAP_RFLAG_DEVELOPER, MAP_RFLAG_ADMIN, MAP_RFLAG_SR_DEVELOPER, MAP_RFLAG_LEAD, MAP_RFLAG_DBA, MAP_TOUGHNESS_IDNX_PERSKILL', 'length', 'max'=>45),
//			array('CREATED_USER, UPDATED_USER', 'length', 'max'=>240),
//			array('CREATED_DATE, UPDATED_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
//			array('MAP_QUES_ID, MAP_JOB_ID, MAP_SKILL_ID, MAP_RFLAG_DFDSFDSFSD, MAP_RFLAG_ARCHITECT, MAP_RFLAG_DEVELOPER, MAP_RFLAG_ADMIN, MAP_RFLAG_SR_DEVELOPER, MAP_RFLAG_LEAD, MAP_RFLAG_DBA, MAP_FLAG_PREVIEW, MAP_TOUGHNESS_IDNX_PERSKILL, CREATED_DATE, CREATED_USER, UPDATED_DATE, UPDATED_USER, MAP_QUES_STATUS', 'safe', 'on'=>'search'),
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
			'candidateUploadTests' => array(self::HAS_MANY, 'CandidateUploadTest', 'CAND_UT_QUES_ID'),
			'mAPQUES' => array(self::BELONGS_TO, 'QuestionMaster', 'MAP_QUES_ID'),
			'mAPJOB' => array(self::BELONGS_TO, 'JobMaster', 'MAP_JOB_ID'),
			'mAPSKILL' => array(self::BELONGS_TO, 'SkillMaster', 'MAP_SKILL_ID'),
                   
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
                        'Ques_From'=>'Question From',
                        'Ques_To'=>'Question To',
                        'Job_Init'=>'Job',   
                        'Skill_Init'=>'Skill',
                        'Role_Init'=>'Role',
			'MAP_QUES_ID' => 'Map Ques',
			'MAP_JOB_ID' => 'Map Job',
			'MAP_SKILL_ID' => 'Map Skill',
			'MAP_RFLAG_ARCHITECT' => 'Map Rflag Architect',
			'MAP_RFLAG_DEVELOPER' => 'Map Rflag Developer',
			'MAP_RFLAG_ADMIN' => 'Map Rflag Admin',
			'MAP_RFLAG_SR_DEVELOPER' => 'Map Rflag Sr Developer',
			'MAP_RFLAG_LEAD' => 'Map Rflag Lead',
			'MAP_RFLAG_DBA' => 'Map Rflag Dba',
			'MAP_FLAG_PREVIEW' => 'Map Flag Preview',
			'MAP_TOUGHNESS_IDNX_PERSKILL' => 'Map Toughness Idnx Perskill',
			'CREATED_DATE' => 'Created Date',
			'CREATED_USER' => 'Created User',
			'UPDATED_DATE' => 'Updated Date',
			'UPDATED_USER' => 'Updated User',
			'MAP_QUES_STATUS' => 'Map Ques Status',
                     'JOB_SEARCH'=>'JOB SEARCH',
                    'SKILL_SEARCH'=>'SKILL SEARCH',
                    'ROLE_SEARCH'=>'ROLE SEARCH',
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

		$criteria->compare('MAP_QUES_ID',$this->MAP_QUES_ID);
		$criteria->compare('MAP_JOB_ID',$this->MAP_JOB_ID);
		$criteria->compare('MAP_SKILL_ID',$this->MAP_SKILL_ID);
		//$criteria->compare('MAP_RFLAG_DFDSFDSFSD',$this->MAP_RFLAG_DFDSFDSFSD,true);
//		$criteria->compare('MAP_RFLAG_ARCHITECT',$this->MAP_RFLAG_ARCHITECT,true);
//		$criteria->compare('MAP_RFLAG_DEVELOPER',$this->MAP_RFLAG_DEVELOPER,true);
//		$criteria->compare('MAP_RFLAG_ADMIN',$this->MAP_RFLAG_ADMIN,true);
//		$criteria->compare('MAP_RFLAG_SR_DEVELOPER',$this->MAP_RFLAG_SR_DEVELOPER,true);
//		$criteria->compare('MAP_RFLAG_LEAD',$this->MAP_RFLAG_LEAD,true);
//		$criteria->compare('MAP_RFLAG_DBA',$this->MAP_RFLAG_DBA,true);
		$criteria->compare('MAP_FLAG_PREVIEW',$this->MAP_FLAG_PREVIEW);
//		$criteria->compare('MAP_TOUGHNESS_IDNX_PERSKILL',$this->MAP_TOUGHNESS_IDNX_PERSKILL,true);
//		$criteria->compare('CREATED_DATE',$this->CREATED_DATE,true);
//		$criteria->compare('CREATED_USER',$this->CREATED_USER,true);
//		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
//		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);
		$criteria->compare('MAP_QUES_STATUS',$this->MAP_QUES_STATUS);
                

              
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
      
}