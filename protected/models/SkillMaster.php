<?php

/**
 * This is the model class for table "skill_master".
 *
 * The followings are the available columns in table 'skill_master':
 * @property integer $SKILL_ID
 * @property integer $SKILL_JOB_ID
 * @property string $SKILL_CATG
 * @property string $SKILL_SUB_CATG
 * @property string $CREATED_DATE
 * @property string $CREATED_USER
 * @property string $UPDATED_DATE
 * @property string $UPDATED_USER
 *
 * The followings are the available model relations:
 * @property JobMaster $sKILLJOB
 */
class SkillMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SkillMaster the static model class
	 */
         
          public $Job_search;
         
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'skill_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('SKILL_JOB_ID', 'required','message'=>'Select a Value For {attribute}'),
			array('SKILL_CATG', 'required','message'=>'Enter a Value For {attribute}'),
//                       array('SKILL_CATG', 'unique','message'=>'Skill already exists for this Job!'),
                         array('SKILL_JOB_ID+SKILL_CATG', 'ext.uniqueMultiColumnValidator','on'=>array('insert','update'), 'caseSensitive' => true),
			array('SKILL_JOB_ID', 'numerical', 'integerOnly'=>true,'on'=>'insert'),
			array('SKILL_CATG, SKILL_SUB_CATG, CREATED_USER, UPDATED_USER', 'length', 'max'=>240),
			array('CREATED_DATE, UPDATED_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('SKILL_ID, SKILL_JOB_ID, SKILL_CATG, SKILL_SUB_CATG, CREATED_DATE, CREATED_USER, UPDATED_DATE, UPDATED_USER, Job_search', 'safe', 'on'=>'search'),
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
//			'sKILLJOB' => array(self::BELONGS_TO, 'JobMaster', 'SKILL_JOB_ID'),
                    'Job' => array(self::BELONGS_TO, 'JobMaster', 'SKILL_JOB_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'SKILL_ID' => 'Skill Id',
			'SKILL_JOB_ID' => 'Job Name',
			'SKILL_CATG' => 'Skill Category',
			'SKILL_SUB_CATG' => 'Skill Sub Category',
			'CREATED_DATE' => 'Created Date',
			'CREATED_USER' => 'Created User',
			'UPDATED_DATE' => 'Updated Date',
			'UPDATED_USER' => 'Updated User',
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
                $criteria->alias = 'i';
		$criteria->compare('SKILL_ID',$this->SKILL_ID);
		$criteria->compare('SKILL_JOB_ID',$this->SKILL_JOB_ID);
		$criteria->compare('SKILL_CATG',$this->SKILL_CATG,true);
		$criteria->compare('SKILL_SUB_CATG',$this->SKILL_SUB_CATG,true);
		$criteria->compare('CREATED_DATE',$this->CREATED_DATE,true);
		$criteria->compare('CREATED_USER',$this->CREATED_USER,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);
                $criteria->with = array( 'Job' );
                $criteria->compare( 'Job.JOB_NAME', $this->Job_search, true );
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                    'sort'=>array(
        'attributes'=>array(
            'Job_search'=>array(
                'asc'=>'Job.JOB_NAME',
                'desc'=>'Job.JOB_NAME DESC',
            ),
            '*',
        ),
    ),
		));
	}
}