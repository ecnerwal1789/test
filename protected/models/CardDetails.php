<?php

/**
 * This is the model class for table "card_details".
 *
 * The followings are the available columns in table 'card_details':
 * @property integer $cd_id
 * @property integer $cd_emp_id
 * @property string $cd_card_type
 * @property integer $cd_card_no
 * @property string $cd_security_code
 * @property string $cd_holder_name
 * @property string $cd_address1
 * @property string $cd_address2
 * @property string $cd_city
 * @property string $cd_state
 * @property string $cd_country
 * @property integer $cd_zipcode
 * @property integer $cd_contact_no
 * @property string $cd_email_id
 * @property string $cd_created_date
 */
class CardDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CardDetails the static model class
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
		return 'card_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cd_card_type, cd_card_no, cd_security_code, cd_holder_name, cd_address1, cd_city, cd_state, cd_country, cd_zipcode, cd_contact_no, cd_email_id', 'required'),
			array('cd_emp_id, cd_card_no, cd_zipcode, cd_contact_no', 'numerical', 'integerOnly'=>true),
			array('cd_card_type, cd_holder_name, cd_address1, cd_address2, cd_city, cd_state, cd_country, cd_email_id', 'length', 'max'=>240),
			array('cd_security_code', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cd_id, cd_emp_id, cd_card_type, cd_card_no, cd_security_code, cd_holder_name, cd_address1, cd_address2, cd_city, cd_state, cd_country, cd_zipcode, cd_contact_no, cd_email_id, cd_created_date', 'safe', 'on'=>'search'),
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
			'cd_id' => 'Cd',
			'cd_emp_id' => 'Cd Emp',
			'cd_card_type' => 'Card Type',
			'cd_card_no' => 'Card Number',
			'cd_security_code' => 'Security Code',
			'cd_holder_name' => 'Name on Card',
			'cd_address1' => 'Billing Address1',
			'cd_address2' => 'Billing Address2',
			'cd_city' => 'City',
			'cd_state' => 'State',
			'cd_country' => 'Country',
			'cd_zipcode' => 'Zip Code',
			'cd_contact_no' => 'Contact Number',
			'cd_email_id' => 'Email',
			'cd_created_date' => 'Cd Created Date',
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

		$criteria->compare('cd_id',$this->cd_id);
		$criteria->compare('cd_emp_id',$this->cd_emp_id);
		$criteria->compare('cd_card_type',$this->cd_card_type,true);
		$criteria->compare('cd_card_no',$this->cd_card_no);
		$criteria->compare('cd_security_code',$this->cd_security_code,true);
		$criteria->compare('cd_holder_name',$this->cd_holder_name,true);
		$criteria->compare('cd_address1',$this->cd_address1,true);
		$criteria->compare('cd_address2',$this->cd_address2,true);
		$criteria->compare('cd_city',$this->cd_city,true);
		$criteria->compare('cd_state',$this->cd_state,true);
		$criteria->compare('cd_country',$this->cd_country,true);
		$criteria->compare('cd_zipcode',$this->cd_zipcode);
		$criteria->compare('cd_contact_no',$this->cd_contact_no);
		$criteria->compare('cd_email_id',$this->cd_email_id,true);
		$criteria->compare('cd_created_date',$this->cd_created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}