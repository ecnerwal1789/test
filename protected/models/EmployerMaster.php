<?php

/**
 * This is the model class for table "employer_master".
 *
 * The followings are the available columns in table 'employer_master':
 * @property integer $EMP_ID
 * @property string $EMP_COMP_NAME
 * @property string $EMP_STREET
 * @property integer $EMP_CITY_ID
 * @property integer $EMP_STATE_ID
 * @property integer $EMP_COUNTRY_ID
 * @property integer $EMP_ZIP_CODE
 * @property integer $EMP_PHONE_NO
 * @property string $EMP_EMAIL_ID
 * @property string $EMP_FIRST_NAME
 * @property string $EMP_LAST_NAME
 * @property string $EMP_REG_DATE
 * @property string $EMP_LOGIN_ID
 * @property string $EMP_PASSWORD
 * @property integer $EMP_STATUS
 * @property string $EMP_COMP_URL
 * @property string $UPDATED_DATE
 * @property string $UPDATED_USER
 * @property integer $EMP_MAIL_AS_LOGIN
 *
 * The followings are the available model relations:
 * @property EmployerJobPosting[] $employerJobPostings
 * @property CountryMaster $eMPCOUNTRY
 * @property StateMaster $eMPSTATE
 * @property CityMaster $eMPCITY
 */
class EmployerMaster extends CActiveRecord
{       
        public $Old_Password;
        public $New_Password;
        public $Confirm_Password;
        public $Login;
        public $Forget_Login_Id;
        public $errmsg1;
        
        public $login_id;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployerMaster the static model class
	 */
        
       // const SCENARIO_CHANGE_PASSWORD = 'EmpLogin';
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employer_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
      
//           if((Yii::app()->controller->action->id=='update')||(Yii::app()->controller->action->id=='create'))
//           {
            
            
                        return array(
                            
			array('EMP_COMP_NAME, EMP_STREET, EMP_CITY_ID, EMP_STATE_ID, EMP_COUNTRY_ID, EMP_ZIP_CODE, EMP_PHONE_NO, EMP_EMAIL_ID, EMP_FIRST_NAME, EMP_LOGIN_ID, EMP_PASSWORD, EMP_COMP_URL', 'required'),
			array('EMP_STATE_ID, EMP_COUNTRY_ID, EMP_ZIP_CODE, EMP_PHONE_NO, EMP_STATUS, EMP_MAIL_AS_LOGIN', 'numerical', 'integerOnly'=>true),
			array('EMP_COMP_NAME, EMP_STREET, EMP_EMAIL_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_COMP_URL, UPDATED_USER', 'length', 'max'=>240),
			array('EMP_LOGIN_ID', 'length', 'max'=>45),
			array('EMP_REG_DATE, UPDATED_DATE', 'safe'),
                        array('EMP_EMAIL_ID, EMP_LOGIN_ID','unique','message'=>'Id already exists'),
                        array('EMP_EMAIL_ID','email'),
                        array('EMP_COMP_URL','url','defaultScheme' => 'http'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EMP_ID, EMP_COMP_NAME, EMP_STREET, EMP_CITY_ID, EMP_STATE_ID, EMP_COUNTRY_ID, EMP_ZIP_CODE, EMP_PHONE_NO, EMP_EMAIL_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_REG_DATE, EMP_LOGIN_ID, EMP_PASSWORD, EMP_STATUS, EMP_COMP_URL, UPDATED_DATE, UPDATED_USER, EMP_MAIL_AS_LOGIN, EMP_CODE, EMP_REFERRED_BY', 'safe', 'on'=>'search'),
		);
                        
//                        return array(
//                            array('EMP_LOGIN_ID, EMP_PASSWORD', 'required','on' => self::SCENARIO_CHANGE_PASSWORD),
//                        );
//           }
//           else
//           {
//               
//               
//		   return array(
//			// username and password are required
//			array('EMP_LOGIN_ID, EMP_PASSWORD', 'required,'on' => self::SCENARIO_CHANGE_PASSWORD'),
//			// rememberMe needs to be a boolean
//						// password needs to be authenticated
//			//array('password', 'authenticate'),
//		);
      
            
          // }
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'employerJobPostings' => array(self::HAS_MANY, 'EmployerJobPosting', 'EJP_EMP_ID'),
			'COUNTRY' => array(self::BELONGS_TO, 'CountryMaster', 'EMP_COUNTRY_ID'),
			'STATE' => array(self::BELONGS_TO, 'StateMaster', 'EMP_STATE_ID'),
			'CITY' => array(self::BELONGS_TO, 'CityMaster', 'EMP_CITY_ID'),
		);
	}
        public function Disp_Emp()
        {       
               
                $criteria=new CDbCriteria;
                $Employee=EmployerMaster::model()->findByAttributes(array('EMP_ID'=>yii::app()->session['Emp_Id']));
		$criteria->compare('EMP_COMP_NAME',$Employee->EMP_COMP_NAME);
                $criteria->compare('EMP_CODE',$Employee->EMP_CODE,true);
		$criteria->compare('EMP_PHONE_NO',$Employee->EMP_PHONE_NO);
		$criteria->compare('EMP_EMAIL_ID',$Employee->EMP_EMAIL_ID,true);
		$criteria->compare('EMP_FIRST_NAME',$Employee->EMP_FIRST_NAME,true);
                $criteria->compare('EMP_REFERRED_BY',$Employee->EMP_REFERRED_BY);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EMP_ID' => 'Employer Id',
			'EMP_COMP_NAME' => 'Company Name',
                        'EMP_CODE'=>'Employer Code',
			'EMP_STREET' => 'Street',
			'EMP_CITY_ID' => 'City',
			'EMP_STATE_ID' => 'State',
			'EMP_COUNTRY_ID' => 'Country',
			'EMP_ZIP_CODE' => 'Zip Code',
			'EMP_PHONE_NO' => 'Phone No',
			'EMP_EMAIL_ID' => 'Email',
			'EMP_FIRST_NAME' => 'First Name',
			'EMP_LAST_NAME' => 'Last Name',
			'EMP_REG_DATE' => 'Reg Date',
			'EMP_LOGIN_ID' => 'Login Id',
			'EMP_PASSWORD' => 'Password',
			'EMP_STATUS' => 'Status',
			'EMP_COMP_URL' => 'Company Website',
			'UPDATED_DATE' => 'Updated Date',
			'UPDATED_USER' => 'Updated User',
			'EMP_MAIL_AS_LOGIN' => 'Mailid As Login',
                        'EMP_REFERRED_BY'=>'Referred By',
                        'Login'=>'Enter Your Email ID',
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
		$criteria->compare('EMP_ID',$this->EMP_ID);
		$criteria->compare('EMP_COMP_NAME',$this->EMP_COMP_NAME,true);
                $criteria->compare('EMP_CODE',$this->EMP_CODE,true);
		$criteria->compare('EMP_STREET',$this->EMP_STREET,true);
		$criteria->compare('EMP_CITY_ID',$this->EMP_CITY_ID);
		$criteria->compare('EMP_STATE_ID',$this->EMP_STATE_ID);
		$criteria->compare('EMP_COUNTRY_ID',$this->EMP_COUNTRY_ID);
		$criteria->compare('EMP_ZIP_CODE',$this->EMP_ZIP_CODE);
		$criteria->compare('EMP_PHONE_NO',$this->EMP_PHONE_NO);
		$criteria->compare('EMP_EMAIL_ID',$this->EMP_EMAIL_ID,true);
		$criteria->compare('EMP_FIRST_NAME',$this->EMP_FIRST_NAME,true);
		$criteria->compare('EMP_LAST_NAME',$this->EMP_LAST_NAME,true);
		$criteria->compare('EMP_REG_DATE',$this->EMP_REG_DATE,true);
		$criteria->compare('EMP_LOGIN_ID',$this->EMP_LOGIN_ID,true);
		$criteria->compare('EMP_PASSWORD',$this->EMP_PASSWORD,true);
		$criteria->compare('EMP_STATUS',$this->EMP_STATUS);
		$criteria->compare('EMP_COMP_URL',$this->EMP_COMP_URL,true);
		$criteria->compare('UPDATED_DATE',$this->UPDATED_DATE,true);
		$criteria->compare('UPDATED_USER',$this->UPDATED_USER,true);
                $criteria->compare('EMP_REFERRED_BY',$this->EMP_REFERRED_BY);
		$criteria->compare('EMP_MAIL_AS_LOGIN',$this->EMP_MAIL_AS_LOGIN);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}