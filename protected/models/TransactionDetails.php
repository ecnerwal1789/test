<?php

/**
 * This is the model class for table "transaction_details".
 *
 * The followings are the available columns in table 'transaction_details':
 * @property integer $td_id
 * @property integer $td_emp_id
 * @property string $td_session_id
 * @property string $td_trans_id
 * @property string $td_status
 * @property string $td_amount
 * @property string $td_created_date
 */
class TransactionDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TransactionDetails the static model class
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
		return 'transaction_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('td_emp_id, td_session_id, td_status, td_amount, td_created_date', 'required'),
			array('td_emp_id', 'numerical', 'integerOnly'=>true),
			array('td_session_id, td_trans_id, td_status', 'length', 'max'=>240),
			array('td_amount', 'length', 'max'=>10),
                        array('td_trans_id','required','on'=>'update'),
                    
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('td_id, td_emp_id, td_session_id, td_trans_id, td_status, td_amount, td_created_date', 'safe', 'on'=>'search'),
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
			'td_id' => 'Td',
			'td_emp_id' => 'Td Emp',
			'td_session_id' => 'Td Session',
			'td_trans_id' => 'Td Trans',
			'td_status' => 'Td Status',
			'td_amount' => 'Td Amount',
			'td_created_date' => 'Td Created Date',
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

		$criteria->compare('td_id',$this->td_id);
		$criteria->compare('td_emp_id',$this->td_emp_id);
		$criteria->compare('td_session_id',$this->td_session_id,true);
		$criteria->compare('td_trans_id',$this->td_trans_id,true);
		$criteria->compare('td_status',$this->td_status,true);
		$criteria->compare('td_amount',$this->td_amount,true);
		$criteria->compare('td_created_date',$this->td_created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}