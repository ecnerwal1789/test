<?php

/**
 * This is the model class for table "emp_job_post_result".
 *
 * The followings are the available columns in table 'emp_job_post_result':
 * @property integer $EJPR_EJP_ID
 * @property integer $EJPR_CAND_ID
 * @property integer $EJPR_SKILL_ID
 * @property integer $EJPR_QUES_ASKED
 * @property integer $EJPR_QUES_ANSWERED
 * @property integer $EJPR_QUES_SKIPPED
 *
 * The followings are the available model relations:
 * @property EmployerJobPosting $eJPREJP
 * @property CandidateMaster $eJPRCAND
 * @property SkillMaster $eJPRSKILL
 */
class EmpJobPostResult extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmpJobPostResult the static model class
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
		return 'emp_job_post_result';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EJPR_EJP_ID, EJPR_CAND_ID, EJPR_SKILL_ID,CREATED_DATE,UPDATED_DATE', 'required'),
			array('EJPR_EJP_ID, EJPR_CAND_ID, EJPR_SKILL_ID, EJPR_QUES_ASKED, EJPR_QUES_ANSWERED, EJPR_QUES_SKIPPED', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EJPR_EJP_ID, EJPR_CAND_ID, EJPR_SKILL_ID, EJPR_QUES_ASKED, EJPR_QUES_ANSWERED, EJPR_CORRECT_ANS, EJPR_QUES_SKIPPED,CREATED_DATE,UPDATED_DATE', 'safe', 'on'=>'search'),
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
			'eJPREJP' => array(self::BELONGS_TO, 'EmployerJobPosting', 'EJPR_EJP_ID'),
			'eJPRCAND' => array(self::BELONGS_TO, 'CandidateMaster', 'EJPR_CAND_ID'),
			'eJPRSKILL' => array(self::BELONGS_TO, 'SkillMaster', 'EJPR_SKILL_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EJPR_EJP_ID' => 'Job Post Result Id',
			'EJPR_CAND_ID' => 'Candidate',
			'EJPR_SKILL_ID' => 'Skill',
			'EJPR_QUES_ASKED' => 'Question Asked',
			'EJPR_QUES_ANSWERED' => 'Question Answered',
                    'EJPR_CORRECT_ANS' => 'Correct Answered',
			'EJPR_QUES_SKIPPED' => 'Question Skipped',
                          
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

		$criteria->compare('EJPR_EJP_ID',$this->EJPR_EJP_ID);
		$criteria->compare('EJPR_CAND_ID',$this->EJPR_CAND_ID);
		$criteria->compare('EJPR_SKILL_ID',$this->EJPR_SKILL_ID);
		$criteria->compare('EJPR_QUES_ASKED',$this->EJPR_QUES_ASKED);
		$criteria->compare('EJPR_QUES_ANSWERED',$this->EJPR_QUES_ANSWERED);
                $criteria->compare('EJPR_CORRECT_ANS',$this->EJPR_CORRECT_ANS);
		$criteria->compare('EJPR_QUES_SKIPPED',$this->EJPR_QUES_SKIPPED);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
//         public function Job_Result()
//        {       
//               
//                $criteria=new CDbCriteria;
//              $job_result=EmpJobPostResult::model()->findAllByAttributes(array('EJPR_CAND_ID'=>45));
//	
//             $criteria->compare('EJPR_EJP_ID',$job_result->EJPR_EJP_ID,true);
//		$criteria->compare('EJPR_CAND_ID',$job_result->EJPR_CAND_ID,true);
//		$criteria->compare('EJPR_SKILL_ID',$job_result->EJPR_SKILL_ID,true);
//		$criteria->compare('EJPR_QUES_ASKED',$job_result->EJPR_QUES_ASKED,true);
//		$criteria->compare('EJPR_QUES_ANSWERED',$job_result->EJPR_QUES_ANSWERED,true);
//		$criteria->compare('EJPR_QUES_SKIPPED',$job_result->EJPR_QUES_SKIPPED,true);
//
//		return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,
//		));
//        }
        
        
              public function percentage($ques_asked,$ques_answered)
       {
           $per=(100/intval($ques_asked) *$ques_answered);
          return ($per > 0 ? round($per,1).' %' : $per);
           //return $perc=round($per).'%';
           
           
      }

}