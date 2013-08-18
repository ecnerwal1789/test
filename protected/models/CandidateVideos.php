<?php

/**
 * This is the model class for table "candidate_videos".
 *
 * The followings are the available columns in table 'candidate_videos':
 * @property integer $cv_id
 * @property integer $cv_ejp_id
 * @property integer $cv_cand_id
 * @property string $cv_video_url
 */
class CandidateVideos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CandidateVideos the static model class
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
		return 'candidate_videos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cv_ejp_id, cv_cand_id, cv_video_url', 'required'),
			array('cv_ejp_id, cv_cand_id', 'numerical', 'integerOnly'=>true),
			array('cv_video_url', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cv_id, cv_ejp_id, cv_cand_id, cv_video_url', 'safe', 'on'=>'search'),
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
			'cv_id' => 'Cv',
			'cv_ejp_id' => 'Cv Ejp',
			'cv_cand_id' => 'Cv Cand',
			'cv_video_url' => 'Cv Video Url',
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

		$criteria->compare('cv_id',$this->cv_id);
		$criteria->compare('cv_ejp_id',$this->cv_ejp_id);
		$criteria->compare('cv_cand_id',$this->cv_cand_id);
		$criteria->compare('cv_video_url',$this->cv_video_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}