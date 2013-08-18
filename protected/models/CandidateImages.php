<?php

/**
 * This is the model class for table "candidate_images".
 *
 * The followings are the available columns in table 'candidate_images':
 * @property integer $ci_id
 * @property integer $ci_ejp_id
 * @property integer $ci_cand_id
 * @property string $ci_img_url
 */
class CandidateImages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CandidateImages the static model class
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
		return 'candidate_images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ci_ejp_id, ci_cand_id, ci_img_url', 'required'),
			array('ci_ejp_id, ci_cand_id', 'numerical', 'integerOnly'=>true),
			array('ci_img_url', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ci_id, ci_ejp_id, ci_cand_id, ci_img_url', 'safe', 'on'=>'search'),
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
			'ci_id' => 'Ci',
			'ci_ejp_id' => 'Ci Ejp',
			'ci_cand_id' => 'Ci Cand',
			'ci_img_url' => 'Ci Img Url',
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

		$criteria->compare('ci_id',$this->ci_id);
		$criteria->compare('ci_ejp_id',$this->ci_ejp_id);
		$criteria->compare('ci_cand_id',$this->ci_cand_id);
		$criteria->compare('ci_img_url',$this->ci_img_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}