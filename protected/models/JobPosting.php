<?php

/**
 * This is the model class for table "employer_job_posting".
 *
 * The followings are the available columns in table 'employer_job_posting':
 * @property integer $EJP_ID
 * @property string $EJP_NAME
 * @property integer $EJP_EMP_ID
 * @property integer $EJP_JOB_ID
 * @property integer $EJP_ROLE_ID
 * @property integer $EJP_SUBSCR_ID
 * @property string $EJP_DATE
 * @property string $EJP_PRIMARY_SKILL_CATG
 * @property string $EJP_SEC_SKILL_CATG
 * @property string $EJP_CAND_EMAIL_ID
 * @property string $EJP_POST_START_DATE
 * @property string $EJP_POST_END_DATE
 * @property string $EJP_LAST_UPDATE_DATE
 * @property integer $EJP_FLAG_UPLOAD_QUES
 * @property integer $EJP_POST_STATUS
 * @property integer $EJP_EMAIL_SENT_COUNT
 * @property integer $EJP_TEST_TAKEN_COUNT
 * @property integer $EJP_VIDEO_Y_N
 * @property integer $EJP_CAND_ACTIVE_DAYS
 *
 * The followings are the available model relations:
 * @property CandidateTest[] $candidateTests
 * @property CandidateMaster[] $candidateMasters
 * @property CandidateUploadTest[] $candidateUploadTests
 * @property EmpJobPostResult[] $empJobPostResults
 * @property EmployerMaster[] $employerMasters
 * @property EmployerJobPostLevel1[] $employerJobPostLevel1s
 * @property EmployerJobPostLevel2[] $employerJobPostLevel2s
 * @property EmployerMaster $eJPEMP
 * @property JobMaster $eJPJOB
 * @property RoleMaster $eJPROLE
 * @property SubscriptionMaster $eJPSUBSCR
 * @property EmployerPostEdits[] $employerPostEdits
 * @property EmployerQuesUpload[] $employerQuesUploads
 */
class JobPosting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployerJobPosting the static model class
	 */
    public $email_count;
    public $post_dur;
    public $xmlFile;
    public $JOB_POST_ID;
    public $JOB_POST_NAME;
    public $JOB_POST_EMP_ID;
    public $JOB_POST_JOB_ID;
    public $JOB_POST_ROLE_ID;
    public $JOB_RESPONSE;
    public $EJP_PRIMARY_SKILL_CATG1;
    public $JOB_POST_SUB_ID;
public $cbox;
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employer_job_posting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EJP_NAME, EJP_JOB_ID, EJP_ROLE_ID, EJP_SUBSCR_ID, EJP_PRIMARY_SKILL_CATG,EJP_CAND_EMAIL_ID,EJP_TEST_DUE_DATE,EJP_TEST_DURATION,EJP_NO_QUES,CREATED_DATE,UPDATED_DATE', 'required'),
			array('EJP_EMP_ID, EJP_ROLE_ID, EJP_SUBSCR_ID, EJP_FLAG_UPLOAD_QUES, EJP_POST_STATUS, EJP_EMAIL_SENT_COUNT, EJP_TEST_TAKEN_COUNT, EJP_VIDEO_Y_N', 'numerical', 'integerOnly'=>true),
			array('EJP_NAME, EJP_PRIMARY_SKILL_CATG, EJP_SEC_SKILL_CATG', 'length', 'max'=>240),
			array('EJP_CAND_EMAIL_ID', 'length', 'max'=>2000),
			array('EJP_POST_END_DATE, EJP_LAST_UPDATE_DATE', 'safe'),
                        array('EJP_TEST_DURATION','numerical', 'integerOnly'=>true, 'min'=>5,'max'=>120, 'tooSmall'=>'It should not be less than 5','tooBig'=>'It should not be greater than 120'),
                      array('EJP_NO_QUES','numerical', 'integerOnly'=>true, 'min'=>5,'max'=>200, 'tooSmall'=>'It should not be less than 5','tooBig'=>'It should not be greater than 200'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EJP_ID, EJP_NAME, EJP_EMP_ID, EJP_JOB_ID, EJP_ROLE_ID, EJP_SUBSCR_ID, EJP_DATE, EJP_PRIMARY_SKILL_CATG, EJP_SEC_SKILL_CATG, EJP_CAND_EMAIL_ID, EJP_POST_START_DATE, EJP_POST_END_DATE, EJP_LAST_UPDATE_DATE, EJP_FLAG_UPLOAD_QUES, EJP_POST_STATUS, EJP_EMAIL_SENT_COUNT, EJP_TEST_TAKEN_COUNT, EJP_VIDEO_Y_N, EJP_CAND_ACTIVE_DAYS, JOB_POST_JOB_ID, JOB_POST_ROLE_ID,EJP_TEST_DUE_DATE,EJP_TEST_DURATION,EJP_NO_QUES,CREATED_DATE,UPDATED_DATE', 'safe', 'on'=>'search'),
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
			'candidateTests' => array(self::HAS_MANY, 'CandidateTest', 'CAND_TEST_EJP_ID'),
			'candidateMasters' => array(self::MANY_MANY, 'CandidateMaster', 'candidate_test_summary(CAND_TS_EJP_ID, CAND_TS_CAND_ID)'),
			'candidateUploadTests' => array(self::HAS_MANY, 'CandidateUploadTest', 'CAND_UT_EJP_ID'),
			'empJobPostResults' => array(self::HAS_MANY, 'EmpJobPostResult', 'EJPR_EJP_ID'),
			'employerMasters' => array(self::MANY_MANY, 'EmployerMaster', 'emp_referral_claims(ERC_EJP_ID, ERC_EMP_ID)'),
			'employerJobPostLevel1s' => array(self::HAS_MANY, 'EmployerJobPostLevel1', 'EJPL1_EJP_ID'),
			'employerJobPostLevel2s' => array(self::HAS_MANY, 'EmployerJobPostLevel2', 'EJPL2_EJP_ID'),
			'eJPEMP' => array(self::BELONGS_TO, 'EmployerMaster', 'EJP_EMP_ID'),
			'eJPJOB' => array(self::BELONGS_TO, 'JobMaster', 'EJP_JOB_ID'),
			'eJPROLE' => array(self::BELONGS_TO, 'RoleMaster', 'EJP_ROLE_ID'),
			'eJPSUBSCR' => array(self::BELONGS_TO, 'EmployerSubscription', 'EJP_SUBSCR_ID'),
			'employerPostEdits' => array(self::HAS_MANY, 'EmployerPostEdits', 'EPE_EJP_ID'),
			'employerQuesUploads' => array(self::HAS_MANY, 'EmployerQuesUpload', 'EQU_EJP_ID'),
                    	'EJP_LAST_UPDATE_DATE' => array(self::HAS_MANY, 'EmployerQuesUpload', 'EJP_LAST_UPDATE_DATE', 'order'=>'column ASC'),

               
//                        'eJPSKILL1' => array(self::BELONGS_TO, 'SkillMaster', 'EJP_PRIMARY_SKILL_CATG'),
//                        'eJPSKILL2' => array(self::BELONGS_TO, 'SkillMaster', 'EJP_SEC_SKILL_CATG'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EJP_ID' => 'Job Posting Id',
			'EJP_NAME' => 'Job Title',
			'EJP_EMP_ID' => 'Employer Id',
			'EJP_JOB_ID' => 'Job Name',
			'EJP_ROLE_ID' => 'Role Name',
			'EJP_SUBSCR_ID' => 'Subscription Name',
			'EJP_DATE' => 'Date',
			'EJP_PRIMARY_SKILL_CATG' =>'Primary Skill',
			'EJP_SEC_SKILL_CATG' => 'Secondary Skill',
			'EJP_CAND_EMAIL_ID' => 'Candidate Email',
			'EJP_POST_START_DATE' => 'Posting Start Date',
			'EJP_POST_END_DATE' => 'Posting End Date',
			'EJP_LAST_UPDATE_DATE' => 'Last Posted Date',
			'EJP_FLAG_UPLOAD_QUES' => 'Do you want to upload your own questionnaire.?',
			'EJP_POST_STATUS' => 'Posting Status',
			'EJP_EMAIL_SENT_COUNT' => 'Email Sent Count',
			'EJP_TEST_TAKEN_COUNT' => 'Test Taken Count',
			'EJP_VIDEO_Y_N' => 'Video Yes/No',
			'EJP_CAND_ACTIVE_DAYS' => 'How soon do you need the test taken (days) ?',
                        'JOB_POST_ID'=>'Posting Id',
                        'JOB_POST_NAME'=>'Posting Name',
                        'JOB_POST_EMP_ID'=>'Employer Code',
                        'JOB_POST_JOB_ID'=>'Job Name',
                        'JOB_POST_ROLE_ID'=>'Role Name',
                        'JOB_RESPONSE'=>'Test Count #',
                         'JOB_POST_SUB_ID'=>'Sub Name',
                         'EJP_TEST_DUE_DATE'=>'Test Due Date',
                        'EJP_TEST_DURATION'=>'Test Duration (Mins)',
                        'EJP_NO_QUES'=>'No of Questions',       
                        
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
                $criteria->condition='EJP_EMP_ID='.yii::app()->session['Emp_Id'];
		$criteria->compare('EJP_ID',$this->EJP_ID);
		$criteria->compare('EJP_NAME',$this->EJP_NAME,true);
		$criteria->compare('EJP_EMP_ID',$this->EJP_EMP_ID);
		$criteria->compare('EJP_JOB_ID',$this->EJP_JOB_ID);
                $criteria->with = array( 'eJPJOB' );
                $criteria->compare('eJPJOB.JOB_NAME', $this->JOB_POST_JOB_ID, true );
		$criteria->compare('EJP_ROLE_ID',$this->EJP_ROLE_ID);
                $criteria->with = array( 'eJPROLE' );
                $criteria->compare('eJPROLE.ROLE_NAME', $this->JOB_POST_ROLE_ID, true );
		$criteria->compare('EJP_SUBSCR_ID',$this->EJP_SUBSCR_ID);
//                $criteria->with = array('eJPSUBSCR');
//                $criteria->compare('eJPSUBSCR.ESUB_ID', $this->JOB_POST_SUB_ID, true );
              
           
//                $criteria->with = ( 'eJPSUBSCR' );
//                $criteria->compare('eJPSUBSCR.SUBSCR_DESC', $this->ESUB_SUBSCRS_ID,true);
             
		$criteria->compare('EJP_DATE',$this->EJP_DATE,true);
		$criteria->compare('EJP_PRIMARY_SKILL_CATG',$this->EJP_PRIMARY_SKILL_CATG,true);
		$criteria->compare('EJP_SEC_SKILL_CATG',$this->EJP_SEC_SKILL_CATG,true);
		$criteria->compare('EJP_CAND_EMAIL_ID',$this->EJP_CAND_EMAIL_ID,true);
		$criteria->compare('EJP_POST_START_DATE',$this->EJP_POST_START_DATE,true);
		$criteria->compare('EJP_POST_END_DATE',$this->EJP_POST_END_DATE,true);
		$criteria->compare('EJP_LAST_UPDATE_DATE',$this->EJP_LAST_UPDATE_DATE,true);
		$criteria->compare('EJP_FLAG_UPLOAD_QUES',$this->EJP_FLAG_UPLOAD_QUES);
		$criteria->compare('EJP_POST_STATUS',$this->EJP_POST_STATUS);
		$criteria->compare('EJP_EMAIL_SENT_COUNT',$this->EJP_EMAIL_SENT_COUNT);
		$criteria->compare('EJP_TEST_TAKEN_COUNT',$this->EJP_TEST_TAKEN_COUNT);
		$criteria->compare('EJP_VIDEO_Y_N',$this->EJP_VIDEO_Y_N);
		$criteria->compare('EJP_CAND_ACTIVE_DAYS',$this->EJP_CAND_ACTIVE_DAYS);
                
                
                
              return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                         'sort'=> array('defaultOrder'=>'EJP_LAST_UPDATE_DATE DESC')

		));
	}
        
        public function search1()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
                
		$criteria->compare('EJP_ID',$this->EJP_ID);
		$criteria->compare('EJP_NAME',$this->EJP_NAME,true);
		
                
                
                
              return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
           public function quesasked($ejp_id)
       {
              // echo 'd';
            $connection=Yii::app()->db;
            $ejpcan_email="SELECT group_concat(EPE_MAIL_LIST) as ejp_can_email_id FROM employer_post_edits    WHERE EPE_EJP_ID=$ejp_id";
            $ejpcanarr=$connection->createCommand($ejpcan_email)->queryAll();
            $secarr=array();
            foreach($ejpcanarr as  $ejpcanarr1)
            {
               $secarr[]=  $ejpcanarr1['ejp_can_email_id'];
            }
                   $ejpcanarr=str_replace(";",",",$secarr);
                 return $canemailarr=implode(';',$ejpcanarr);
           // return $Ques_Asked= $Ques_Asked_SQL;
          
                 
      }
      
         
           public function emailtaken($ejp_id)
       { 
            /* Get test taken candidtate changed by pandi 18.7.13 */
            $connection=Yii::app()->db;
            $ejpcan="SELECT CAND_TS_CAND_ID FROM candidate_test_summary  WHERE CAND_TS_EJP_ID=$ejp_id";
            $ejpcanarr=$connection->createCommand($ejpcan)->queryAll();
            $emailarr=array();
            foreach($ejpcanarr as  $ejpcanarr1)
            {
             $CAND_TS_CAND_ID=   $ejpcanarr1['CAND_TS_CAND_ID'];
             $ejpcan_email="SELECT * FROM candidate_master  WHERE CAND_ID=$CAND_TS_CAND_ID";
              $ejpcanemailarr=$connection->createCommand($ejpcan_email)->queryAll();
           // $ejpcanemailarr[0]['CAND_EMAIL_ID'];
            $emailarr[]=  $ejpcanemailarr[0]['CAND_EMAIL_ID'];
            }
            return $canemailarr=implode(',',$emailarr);
           
      }
      
   
        
}