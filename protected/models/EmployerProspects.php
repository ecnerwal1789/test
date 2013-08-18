<?php

/**
 * This is the model class for table "employer_prospects".
 *
 * The followings are the available columns in table 'employer_prospects':
 * @property integer $PROS_ID
 * @property integer $PROS_EMP_ID
 * @property string $PROS_MAIL_LIST
 * @property integer $PROS_MAIL_COUNT
 * @property string $PROS_INIT_DATE
 *
 * The followings are the available model relations:
 * @property EmployerMaster $pROSEMP
 */
class EmployerProspects extends CActiveRecord
{       
    public $Receipents;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployerProspects the static model class
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
		return 'employer_prospects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PROS_MAIL_LIST, PROS_MAIL_COUNT', 'required'),
			array('PROS_MAIL_COUNT', 'numerical', 'integerOnly'=>true),
			array('PROS_MAIL_LIST', 'length', 'max'=>2000),
//                        array('PROS_MAIL_LIST','email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PROS_MAIL_LIST, PROS_MAIL_COUNT, PROS_INIT_DATE', 'safe', 'on'=>'search'),
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
			'pROSEMP' => array(self::BELONGS_TO, 'EmployerMaster', 'PROS_EMP_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PROS_ID' => 'Pros',
			'PROS_EMP_ID' => 'Pros Emp',
			'PROS_MAIL_LIST' => 'Pros Mail List',
			'PROS_MAIL_COUNT' => 'Pros Mail Count',
			'PROS_INIT_DATE' => 'Pros Init Date',
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
		$criteria->compare('PROS_ID',$this->PROS_ID);
		$criteria->compare('PROS_EMP_ID',$this->PROS_EMP_ID);
		$criteria->compare('PROS_MAIL_LIST',$this->PROS_MAIL_LIST,true);
		$criteria->compare('PROS_MAIL_COUNT',$this->PROS_MAIL_COUNT);
		$criteria->compare('PROS_INIT_DATE',$this->PROS_INIT_DATE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}