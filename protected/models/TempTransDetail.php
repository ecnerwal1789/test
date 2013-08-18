<?php

/**
 * This is the model class for table "temp_trans_detail".
 *
 * The followings are the available columns in table 'temp_trans_detail':
 * @property integer $ttd_id
 * @property integer $ttd_emp_id
 * @property string $ttd_session_id
 * @property integer $ttd_sub_id
 * @property integer $ttd_status
 * @property string $ttd_creates_date
 */
class TempTransDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TempTransDetail the static model class
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
		return 'temp_trans_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ttd_emp_id, ttd_session_id, ttd_sub_id, ttd_status, ttd_creates_date', 'required'),
			array('ttd_emp_id, ttd_sub_id, ttd_status', 'numerical', 'integerOnly'=>true),
			array('ttd_session_id', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ttd_id, ttd_emp_id, ttd_session_id, ttd_sub_id, ttd_status, ttd_creates_date,ttd_td_id', 'safe', 'on'=>'search'),
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
			'ttd_id' => 'Ttd',
			'ttd_emp_id' => 'Ttd Emp',
			'ttd_session_id' => 'Ttd Session',
			'ttd_sub_id' => 'Ttd Sub',
			'ttd_status' => 'Ttd Status',
			'ttd_creates_date' => 'Ttd Creates Date',
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

		$criteria->compare('ttd_id',$this->ttd_id);
		$criteria->compare('ttd_emp_id',$this->ttd_emp_id);
		$criteria->compare('ttd_session_id',$this->ttd_session_id,true);
		$criteria->compare('ttd_sub_id',$this->ttd_sub_id);
		$criteria->compare('ttd_status',$this->ttd_status);
		$criteria->compare('ttd_creates_date',$this->ttd_creates_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}