<?php

/**
 * This is the model class for table "candidate_test_summary".
 *
 * The followings are the available columns in table 'candidate_test_summary':
 * @property integer $CAND_TS_ID
 * @property integer $CAND_TS_EJP_ID
 * @property integer $CAND_TS_CAND_ID
 * @property integer $CAND_TS_SCORE
 * @property string $CAND_TS_TEST_DATE
 * @property string $CAND_TS_ST
 * @property string $CAND_TS_ET
 *
 * The followings are the available model relations:
 * @property EmployerJobPosting $cANDTSEJP
 * @property CandidateMaster $cANDTSCAND
 */
class TestSummary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TestSummary the static model class
	 */
    public $Ques_Asked;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'candidate_test_summary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CAND_TS_EJP_ID, CAND_TS_CAND_ID,CREATED_DATE,UPDATED_DATE', 'required'),
			array('CAND_TS_EJP_ID, CAND_TS_CAND_ID, CAND_TS_SCORE', 'numerical', 'integerOnly'=>true),
			array('CAND_TS_ST, CAND_TS_ET', 'length', 'max'=>500),
			array('CAND_TS_TEST_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CAND_TS_ID, CAND_TS_EJP_ID, CAND_TS_CAND_ID, CAND_TS_SCORE, CAND_TS_TEST_DATE, CAND_TS_ST, CAND_TS_ET,CAND_TS_STATUS,CREATED_DATE,UPDATED_DATE', 'safe', 'on'=>'search'),
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
			'cANDTSEJP' => array(self::BELONGS_TO, 'EmployerJobPosting', 'CAND_TS_EJP_ID'),
			'cANDTSCAND' => array(self::BELONGS_TO, 'CandidateMaster', 'CAND_TS_CAND_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CAND_TS_ID' => 'Cand Ts',
			'CAND_TS_EJP_ID' => 'Cand Ts Ejp',
			'CAND_TS_CAND_ID' => 'Cand Ts Cand',
			'CAND_TS_SCORE' => 'Cand Ts Score',
			'CAND_TS_TEST_DATE' => 'Test Date',
			'CAND_TS_ST' => 'Cand Ts St',
			'CAND_TS_ET' => 'Cand Ts Et',
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
             
		$criteria->compare('CAND_TS_ID',$this->CAND_TS_ID);
		$criteria->compare('CAND_TS_EJP_ID',$this->CAND_TS_EJP_ID);
		$criteria->compare('CAND_TS_CAND_ID',$this->CAND_TS_CAND_ID);
		$criteria->compare('CAND_TS_SCORE',$this->CAND_TS_SCORE);
		$criteria->compare('CAND_TS_TEST_DATE',$this->CAND_TS_TEST_DATE,true);
		$criteria->compare('CAND_TS_ST',$this->CAND_TS_ST,true);
		$criteria->compare('CAND_TS_ET',$this->CAND_TS_ET,true);
                $criteria->with = array('cANDTSCAND' );
		
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                       // 'sort'=> array('defaultOrder'=>'CAND_TS_TEST_DATE DESC')
		));
	}
        public function selectrank($Cand_Id,$ejp_id)
        {
            $connection=yii::app()->db;
            $Get_Rank="select a.rank from (select @R := @R +1 AS rank,
                        CAND_TS_CAND_ID,
                        CAND_TS_SCORE,
                        CAND_TS_EJP_ID  from candidate_test_summary,
                        (select @R:=0)r 
                        where CAND_TS_EJP_ID=".$ejp_id.
                        " order by CAND_TS_SCORE DESC)a
                        where a.CAND_TS_CAND_ID=".$Cand_Id;

             return  $Rank=$connection->createCommand($Get_Rank)->queryScalar();
        }
        
        public function quesasked($Cand_Id,$ejp_id)
       {
            $connection=Yii::app()->db;
            $Count_Query="select EJP_FLAG_UPLOAD_QUES from employer_job_posting where EJP_ID=".$ejp_id;
            $Test_Taken=$connection->createCommand($Count_Query)->queryAll();
            $EJP_FLAG_UPLOAD_QUES=$Test_Taken[0]['EJP_FLAG_UPLOAD_QUES'];
              if($EJP_FLAG_UPLOAD_QUES==0) 
              {
                $sql= "SELECT * from candidate_test where CAND_TEST_CAND_ID=$Cand_Id and CAND_TEST_EJP_ID=$ejp_id";
                $Ques_Asked_SQL=$connection->createCommand($sql)->queryAll();
              }
              else
              {
                $sql= "SELECT * from candidate_upload_test where CAND_UT_CAND_ID=$Cand_Id and CAND_UT_EJP_ID=$ejp_id";
                $Ques_Asked_SQL=$connection->createCommand($sql)->queryAll();
              }
            return $Ques_Asked= count($Ques_Asked_SQL);
           
      }
      

            
         public function video_enable($Cand_Id,$ejp_id)
       {
            $connection=Yii::app()->db;
             $sql= "SELECT CAND_EMAIL_ID from candidate_master where CAND_ID=$Cand_Id";
             $query=$connection->createCommand($sql)->queryScalar();
             $sql = "select EPE_VIDEO_Y_N from  employer_post_edits WHERE EPE_EJP_ID=$ejp_id and  EPE_MAIL_LIST  LIKE '%$query%'";
             return  $connection->createCommand($sql)->queryScalar(); 
//             $sql= "SELECT EPE_VIDEO_Y_N from employer_post_edits where  EPE_EJP_ID=$ejp_id";
//            return $EPE_VIDEO_Y_N=$connection->createCommand($sql)->queryScalar();
           
      }
         public function questionemp($ejp_id)
       {
            $connection=Yii::app()->db;
            $Count_Query="select EJP_FLAG_UPLOAD_QUES from employer_job_posting where EJP_ID=".$ejp_id;
            $Test_Taken=$connection->createCommand($Count_Query)->queryAll();
            $EJP_FLAG_UPLOAD_QUES=$Test_Taken[0]['EJP_FLAG_UPLOAD_QUES'];
             return  $EJP_FLAG_UPLOAD_QUES;

           
      }
      
}