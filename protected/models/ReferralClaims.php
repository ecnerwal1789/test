<?php

/**
 * This is the model class for table "emp_referral_claims".
 *
 * The followings are the available columns in table 'emp_referral_claims':
 * @property integer $ERC_EMP_ID
 * @property integer $ERC_EJP_ID
 * @property string $ERC_DATE
 */
class ReferralClaims extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ReferralClaims the static model class
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
		return 'emp_referral_claims';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ERC_EMP_ID, ERC_EJP_ID, ERC_DATE', 'required'),
			array('ERC_EMP_ID, ERC_EJP_ID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ERC_EMP_ID, ERC_EJP_ID, ERC_DATE', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ERC_EMP_ID' => 'Erc Emp',
			'ERC_EJP_ID' => 'Erc Ejp',
			'ERC_DATE' => 'Erc Date',
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

		$criteria->compare('ERC_EMP_ID',$this->ERC_EMP_ID);
		$criteria->compare('ERC_EJP_ID',$this->ERC_EJP_ID);
		$criteria->compare('ERC_DATE',$this->ERC_DATE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}