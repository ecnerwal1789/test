<?php

/**
 * This is the model class for table "employer_referrals".
 *
 * The followings are the available columns in table 'employer_referrals':
 * @property integer $REF_EMP_ID
 * @property integer $REF_ACT_CREDITS
 * @property string $REF_ACT_EMP_IDS
 * @property string $REF_ACT_MAIL_LIST
 * @property integer $REF_TOT_CREDITS
 * @property string $REF_ALL_EMP_IDS
 * @property string $REF_ALL_MAIL_LIST
 * @property integer $REF_UTILIZED_CREDITS
 *
 * The followings are the available model relations:
 * @property EmployerMaster $rEFEMP
 */
class EmployerReferrals extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployerReferrals the static model class
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
		return 'employer_referrals';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('REF_EMP_ID', 'required'),
			array('REF_EMP_ID, REF_ACT_CREDITS, REF_TOT_CREDITS, REF_UTILIZED_CREDITS', 'numerical', 'integerOnly'=>true),
			array(' REF_ALL_EMP_IDS', 'length', 'max'=>1000),
			array(' REF_ALL_MAIL_LIST', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('REF_EMP_ID, REF_ACT_CREDITS,  REF_TOT_CREDITS, REF_ALL_EMP_IDS, REF_ALL_MAIL_LIST, REF_UTILIZED_CREDITS', 'safe', 'on'=>'search'),
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
			'rEFEMP' => array(self::BELONGS_TO, 'EmployerMaster', 'REF_EMP_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'REF_EMP_ID' => 'Ref Emp',
			'REF_ACT_CREDITS' => 'Ref Act Credits',
			'REF_ACT_EMP_IDS' => 'Ref Act Emp Ids',
			'REF_ACT_MAIL_LIST' => 'Ref Act Mail List',
			'REF_TOT_CREDITS' => 'Ref Tot Credits',
			'REF_ALL_EMP_IDS' => 'Ref All Emp Ids',
			'REF_ALL_MAIL_LIST' => 'Ref All Mail List',
			'REF_UTILIZED_CREDITS' => 'Ref Utilized Credits',
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

		$criteria->compare('REF_EMP_ID',$this->REF_EMP_ID);
		$criteria->compare('REF_ACT_CREDITS',$this->REF_ACT_CREDITS);
		$criteria->compare('REF_ACT_EMP_IDS',$this->REF_ACT_EMP_IDS,true);
		$criteria->compare('REF_ACT_MAIL_LIST',$this->REF_ACT_MAIL_LIST,true);
		$criteria->compare('REF_TOT_CREDITS',$this->REF_TOT_CREDITS);
		$criteria->compare('REF_ALL_EMP_IDS',$this->REF_ALL_EMP_IDS,true);
		$criteria->compare('REF_ALL_MAIL_LIST',$this->REF_ALL_MAIL_LIST,true);
		$criteria->compare('REF_UTILIZED_CREDITS',$this->REF_UTILIZED_CREDITS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}