<?php

/**
 * This is the model class for table "list_of_roles".
 *
 * The followings are the available columns in table 'list_of_roles':
 * @property integer $LOR_ID
 * @property string $LOR_CODE
 * @property string $LOR_NAME
 * @property string $CREATED_DATE
 * @property string $CREATED_USER
 * @property string $UPDATED_DATE
 * @property string $UPDATED_USER
 */
class ListOfRoles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ListOfRoles the static model class
	 */
    
    public $LOR_CHAR;
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'list_of_roles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LOR_CODE, LOR_NAME', 'required'),
			array('LOR_CODE', 'length', 'max'=>4),
			array('LOR_NAME, CREATED_USER, UPDATED_USER', 'length', 'max'=>240),
                        array('LOR_CODE','unique','message'=>'Role Code already exists!'),
                        array('LOR_NAME','unique','message'=>'Role Name already exists!'),
			array('CREATED_DATE, UPDATED_DATE', 'safe'),
                        array('LOR_NAME', 'ext.validators.alpha', 'extra' => array('_')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('LOR_ID, LOR_CODE, LOR_NAME, CREATED_DATE, CREATED_USER, UPDATED_DATE, UPDATED_USER', 'safe', 'on'=>'search'),
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
			'LOR_ID' => 'Lor',
			'LOR_CODE' => 'Role Code',
			'LOR_NAME' => 'Role Name',
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

		$criteria->compare('LOR_ID',$this->LOR_ID);
		$criteria->compare('LOR_CODE',$this->LOR_CODE,true);
		$criteria->compare('LOR_NAME',$this->LOR_NAME,true);
		$criteria->compare('CREATED_DATE',$this->CREATED_DATE,true);
		$criteria->compare('CREATED_USER',$this->CREATED_USER,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}