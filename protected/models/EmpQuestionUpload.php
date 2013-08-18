<?php

/**
 * This is the model class for table "employer_ques_upload".
 *
 * The followings are the available columns in table 'employer_ques_upload':
 * @property integer $EQU_QUES_ID
 * @property integer $EQU_EJP_ID
 * @property string $EQU_QUES_DESC
 * @property string $EQU_OPT_CDE_1
 * @property string $EQU_OPT_1
 * @property string $EQU_OPT_CDE_2
 * @property string $EQU_OPT_2
 * @property string $EQU_OPT_CDE_3
 * @property string $EQU_OPT_3
 * @property string $EQU_OPT_CDE_4
 * @property string $EQU_OPT_4
 * @property string $EQU_OPT_CDE_5
 * @property string $EQU_OPT_5
 * @property string $EQU_OPT_CDE_6
 * @property string $EQU_OPT_6
 * @property string $EQU_ANS_OPT_CDE
 * @property string $EQU_ANS_OPT
 *
 * The followings are the available model relations:
 * @property EmployerJobPosting $eQUEJP
 */
class EmpQuestionUpload extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmpQuestionUpload the static model class
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
		return 'employer_ques_upload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EQU_EJP_ID,EQU_ANS_OPT_CDE,EQU_EPE_ID', 'required'),
			array('EQU_EJP_ID', 'numerical', 'integerOnly'=>true),
			array('EQU_QUES_DESC', 'length', 'max'=>2000),
			array('EQU_OPT_CDE_1, EQU_OPT_1, EQU_OPT_CDE_2, EQU_OPT_2, EQU_OPT_CDE_3, EQU_OPT_3, EQU_OPT_CDE_4, EQU_OPT_4, EQU_OPT_CDE_5, EQU_OPT_5, EQU_OPT_CDE_6, EQU_OPT_6, EQU_ANS_OPT_CDE, EQU_ANS_OPT', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EQU_QUES_ID, EQU_EJP_ID, EQU_QUES_DESC, EQU_OPT_CDE_1, EQU_OPT_1, EQU_OPT_CDE_2, EQU_OPT_2, EQU_OPT_CDE_3, EQU_OPT_3, EQU_OPT_CDE_4, EQU_OPT_4, EQU_OPT_CDE_5, EQU_OPT_5, EQU_OPT_CDE_6, EQU_OPT_6, EQU_ANS_OPT_CDE, EQU_ANS_OPT,EQU_EPE_ID', 'safe', 'on'=>'search'),
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
			'eQUEJP' => array(self::BELONGS_TO, 'EmployerJobPosting', 'EQU_EJP_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EQU_QUES_ID' => 'Equ Ques',
			'EQU_EJP_ID' => 'Equ Ejp',
			'EQU_QUES_DESC' => 'Equ Ques Desc',
			'EQU_OPT_CDE_1' => 'Equ Opt Cde 1',
			'EQU_OPT_1' => 'Equ Opt 1',
			'EQU_OPT_CDE_2' => 'Equ Opt Cde 2',
			'EQU_OPT_2' => 'Equ Opt 2',
			'EQU_OPT_CDE_3' => 'Equ Opt Cde 3',
			'EQU_OPT_3' => 'Equ Opt 3',
			'EQU_OPT_CDE_4' => 'Equ Opt Cde 4',
			'EQU_OPT_4' => 'Equ Opt 4',
			'EQU_OPT_CDE_5' => 'Equ Opt Cde 5',
			'EQU_OPT_5' => 'Equ Opt 5',
			'EQU_OPT_CDE_6' => 'Equ Opt Cde 6',
			'EQU_OPT_6' => 'Equ Opt 6',
			'EQU_ANS_OPT_CDE' => 'Equ Ans Opt Cde',
			'EQU_ANS_OPT' => 'Equ Ans Opt',
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

		$criteria->compare('EQU_QUES_ID',$this->EQU_QUES_ID);
		$criteria->compare('EQU_EJP_ID',$this->EQU_EJP_ID);
		$criteria->compare('EQU_QUES_DESC',$this->EQU_QUES_DESC,true);
		$criteria->compare('EQU_OPT_CDE_1',$this->EQU_OPT_CDE_1,true);
		$criteria->compare('EQU_OPT_1',$this->EQU_OPT_1,true);
		$criteria->compare('EQU_OPT_CDE_2',$this->EQU_OPT_CDE_2,true);
		$criteria->compare('EQU_OPT_2',$this->EQU_OPT_2,true);
		$criteria->compare('EQU_OPT_CDE_3',$this->EQU_OPT_CDE_3,true);
		$criteria->compare('EQU_OPT_3',$this->EQU_OPT_3,true);
		$criteria->compare('EQU_OPT_CDE_4',$this->EQU_OPT_CDE_4,true);
		$criteria->compare('EQU_OPT_4',$this->EQU_OPT_4,true);
		$criteria->compare('EQU_OPT_CDE_5',$this->EQU_OPT_CDE_5,true);
		$criteria->compare('EQU_OPT_5',$this->EQU_OPT_5,true);
		$criteria->compare('EQU_OPT_CDE_6',$this->EQU_OPT_CDE_6,true);
		$criteria->compare('EQU_OPT_6',$this->EQU_OPT_6,true);
		$criteria->compare('EQU_ANS_OPT_CDE',$this->EQU_ANS_OPT_CDE,true);
		$criteria->compare('EQU_ANS_OPT',$this->EQU_ANS_OPT,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}