<?php

/**
 * This is the model class for table "subscription_master".
 *
 * The followings are the available columns in table 'subscription_master':
 * @property integer $SUBSCRS_ID
 * @property string $SUBSCR_CODE
 * @property string $SUBSCR_DESC
 * @property double $SUBSCR_RATE
 * @property string $SUBSCR_RATE_WVID
 * @property string $SUBSCR_CURR_CODE
 * @property string $CREATED_DATE
 * @property string $CREATED_USER
 * @property string $UPDATED_DATE
 * @property string $UPDATED_USER
 *
 * The followings are the available model relations:
 * @property EmployerJobPosting[] $employerJobPostings
 */
class SubscriptionMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SubscriptionMaster the static model class
	 */
    
    public $SUBSCR_CHAR;
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subscription_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SUBSCR_CODE, SUBSCR_DESC, SUBSCR_RATE,SUBSCRS_CAND_COUNT,SUBSCRS_ACTIVE_DURATION,SUBSCRS_POST_DURATION', 'required'),
			array('SUBSCR_RATE', 'numerical'),
			array('SUBSCR_CODE', 'length', 'max'=>20),
			array('SUBSCR_DESC, CREATED_USER, UPDATED_USER', 'length', 'max'=>240),
			array('SUBSCR_RATE_WVID, SUBSCR_CURR_CODE', 'length', 'max'=>45),
                        array('SUBSCR_CODE','unique','message'=>'Subscription Code already exists!'),
                        array('SUBSCR_DESC','unique','message'=>'Subscription Description already exists!'),
                    	array('SUBSCRS_CAND_COUNT,SUBSCRS_ACTIVE_DURATION,SUBSCRS_POST_DURATION', 'numerical', 'integerOnly'=>true),
			array('CREATED_DATE, UPDATED_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('SUBSCRS_ID, SUBSCR_CODE, SUBSCR_DESC, SUBSCR_RATE, SUBSCR_RATE_WVID, SUBSCRS_VIDEO_Y_N, SUBSCR_CURR_CODE, CREATED_DATE, CREATED_USER, UPDATED_DATE, UPDATED_USER', 'safe', 'on'=>'search'),
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
			'employerJobPostings' => array(self::HAS_MANY, 'EmployerJobPosting', 'EJP_SUBSCR_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'SUBSCRS_ID' => 'Subscription Id',
			'SUBSCR_CODE' => 'Code',
			'SUBSCR_DESC' => 'Description',
			'SUBSCR_RATE' => 'Rate',
			'SUBSCR_RATE_WVID' => 'Rate With Video',
			'SUBSCR_CURR_CODE' => 'Currency Code',
                        'SUBSCRS_CAND_COUNT'=>'Candidate Count',
                        'SUBSCRS_ACTIVE_DURATION'=>'Active Duration',
                        'SUBSCRS_POST_DURATION'=>'Posting Duration',
			'CREATED_DATE' => 'Created Date',
			'CREATED_USER' => 'Created User',
			'UPDATED_DATE' => 'Updated Date',
			'UPDATED_USER' => 'Updated User',
                        'SUBSCRS_VIDEO_Y_N'=>'Video Yes/No',
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
		$criteria->compare('SUBSCRS_ID',$this->SUBSCRS_ID);
		$criteria->compare('SUBSCR_CODE',$this->SUBSCR_CODE,true);
		$criteria->compare('SUBSCR_DESC',$this->SUBSCR_DESC,true);
		$criteria->compare('SUBSCR_RATE',$this->SUBSCR_RATE);
		$criteria->compare('SUBSCR_RATE_WVID',$this->SUBSCR_RATE_WVID,true);
		$criteria->compare('SUBSCR_CURR_CODE',$this->SUBSCR_CURR_CODE,true);
		$criteria->compare('CREATED_DATE',$this->CREATED_DATE,true);
		$criteria->compare('CREATED_USER',$this->CREATED_USER,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);
                $criteria->compare('SUBSCRS_VIDEO_Y_N',$this->SUBSCRS_VIDEO_Y_N,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function Sub_search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $criteria->condition='SUBSCRS_ID<>19';
		$criteria->compare('SUBSCRS_ID',$this->SUBSCRS_ID);
		$criteria->compare('SUBSCR_CODE',$this->SUBSCR_CODE,true);
		$criteria->compare('SUBSCR_DESC',$this->SUBSCR_DESC,true);
		$criteria->compare('SUBSCR_RATE',$this->SUBSCR_RATE);
		$criteria->compare('SUBSCR_RATE_WVID',$this->SUBSCR_RATE_WVID,true);
		$criteria->compare('SUBSCR_CURR_CODE',$this->SUBSCR_CURR_CODE,true);
		$criteria->compare('CREATED_DATE',$this->CREATED_DATE,true);
		$criteria->compare('CREATED_USER',$this->CREATED_USER,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);
                $criteria->compare('SUBSCRS_VIDEO_Y_N',$this->SUBSCRS_VIDEO_Y_N,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}