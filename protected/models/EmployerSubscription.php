<?php

/**
 * This is the model class for table "employer_subscription".
 *
 * The followings are the available columns in table 'employer_subscription':
 * @property integer $ESUB_ID
 * @property integer $ESUB_EMP_ID
 * @property integer $ESUB_SUBSCRS_ID
 * @property string $ESUB_PURCHASE_DATE
 * @property integer $ESUB_PAYMENT_ID
 * @property integer $ESUB_STATUS
 * @property string $ESUB_EXPIRY_DATE
 * @property integer $ESUB_UTILIZED_COUNT
 * @property integer $ESUB_REMAIN_COUNT
 *
 * The followings are the available model relations:
 * @property EmployerMaster $eSUBEMP
 * @property SubscriptionMaster $eSUBSUBSCRS
 */
class EmployerSubscription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployerSubscription the static model class
	 */
    public $ExpireDate;
public $Payment_Rate;
public $Sub_Desc;
public $Remain_Count;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employer_subscription';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ESUB_EMP_ID, ESUB_SUBSCRS_ID, ESUB_STATUS,CREATED_DATE,UPDATED_DATE', 'required'),
			array('ESUB_ID, ESUB_EMP_ID, ESUB_SUBSCRS_ID, ESUB_PAYMENT_ID, ESUB_STATUS, ESUB_UTILIZED_COUNT, ESUB_REMAIN_COUNT', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
//                    array('ESUB_PURCHASE_DATE, ESUB_EXPIRY_DATE', 'safe'),
                    
			array('ESUB_ID, ESUB_EMP_ID, ESUB_SUBSCRS_ID, ESUB_PURCHASE_DATE, ESUB_PAYMENT_ID, ESUB_STATUS, ESUB_EXPIRY_DATE, ESUB_UTILIZED_COUNT, ESUB_REMAIN_COUNT,CREATED_DATE,UPDATED_DATE', 'safe', 'on'=>'search'),
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
			'eSUBEMP' => array(self::BELONGS_TO, 'EmployerMaster', 'ESUB_EMP_ID'),
			'eSUBSUBSCRS' => array(self::BELONGS_TO, 'SubscriptionMaster', 'ESUB_SUBSCRS_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ESUB_ID' => 'Esub',
			'ESUB_EMP_ID' => 'Employer Id',
			'ESUB_SUBSCRS_ID' => 'Subscription Name',
			'ESUB_PURCHASE_DATE' => 'Purchase Date',
			'ESUB_PAYMENT_ID' => 'Payment Amount',
			'ESUB_STATUS' => 'Status',
			'ESUB_EXPIRY_DATE' => 'Expiry Date',
			'ESUB_UTILIZED_COUNT' => 'Utilized Count',
			'ESUB_REMAIN_COUNT' => 'Remaining Count',
                    'Sub_Desc'=>'Subscription Name',
                    'Payment_Rate'=>'Payment Amount',
                    'Remain_Count'=>'Remain Count',
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
              
             
		$criteria->compare('ESUB_ID',$this->ESUB_ID);
		$criteria->compare('ESUB_EMP_ID',$this->ESUB_EMP_ID);
//		$criteria->compare('ESUB_SUBSCRS_ID',$this->ESUB_SUBSCRS_ID);
//                $criteria->together=true;
		
//		$criteria->compare('ESUB_PAYMENT_ID',$this->ESUB_PAYMENT_ID);
                $criteria->with = array( 'eSUBSUBSCRS' );
                $criteria->compare('eSUBSUBSCRS.SUBSCR_RATE', $this->ESUB_PAYMENT_ID,true);
                $criteria->compare('eSUBSUBSCRS.SUBSCR_DESC', $this->ESUB_SUBSCRS_ID,true);
		$criteria->compare('ESUB_STATUS',$this->ESUB_STATUS,true);
                $criteria->compare('ESUB_PURCHASE_DATE',$this->ESUB_PURCHASE_DATE,true);
		$criteria->compare('ESUB_EXPIRY_DATE',$this->ESUB_EXPIRY_DATE,true);
		$criteria->compare('ESUB_UTILIZED_COUNT',$this->ESUB_UTILIZED_COUNT,true);
		$criteria->compare('ESUB_REMAIN_COUNT',$this->ESUB_REMAIN_COUNT,true);
//                $criteria->compare('date(ESUB_PURCHASE_DATE)',$this->ESUB_PURCHASE_DATE,true);
////
//                $criteria->compare('date(ESUB_EXPIRY_DATE)',$this->ESUB_EXPIRY_DATE,true);
//                $criteria->compare("DATE_FORMAT(date,'%yy-%mm-%dd')",$this->ESUB_PURCHASE_DATE,true);
//                $criteria->compare("DATE_FORMAT(date,'%yy-%mm-%dd')",$this->ESUB_EXPIRY_DATE,true);
//                if($this->ESUB_SUBSCRS_ID)
//                {
//                $criteria->together  =  true;
//                $criteria->with = ( 'eSUBSUBSCRS' );
//                $criteria->compare('eSUBSUBSCRS.SUBSCR_DESC', $model->ESUB_SUBSCRS_ID,true);
//                }
//               if(strlen($this->ESUB_PURCHASE_DATE) && strlen($this->ESUB_EXPIRY_DATE)) {
//                        $criteria->params[':ESUB_PURCHASE_DATE'] = date('Y-m-d', strtotime($this->ESUB_PURCHASE_DATE));
//                        
//                        $criteria->params[':ESUB_EXPIRY_DATE'] = date('Y-m-d', strtotime($this->ESUB_EXPIRY_DATE));
////                                (strlen($this->ESUB_EXPIRY_DATE)) ? date('Y-m-d', strtotime($this->ESUB_EXPIRY_DATE)) : $criteria->params[':post_date'];
//                        $criteria->addCondition('DATE(ESUB_PURCHASE_DATE) BETWEEN :ESUB_PURCHASE_DATE AND :ESUB_EXPIRY_DATE');
//                }
        
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                    
		));
	}
        
               

}