<?php
	/**
	* 
  * @author Banchikov Igor Vladimirovich
  * @todo The class describes the nature of the employee
  * @property integer $id (autoincrement)
  * @property string $firstName The first name of employee
  * @property string $secondName The second name of employee
  * @property string $middleName The middle name of employee
  * @property string $jobTitle The title of the employee post
  * @property integer $phone The phone number of employee
  * 
  */
	class UserModel extends FileModel {
            
		public $firstName = '';
		public $jobTitle = '';
		public $login = '';
                public $phone = 0000;
                
                /* Список пользователей */
                public $userList = array();
		
    /**
    * @todo The method assigns the value of construct parameters to the class properties
    */
		function __construct ($id = 0000,
                                        $firstName = "guess",
					$secondName = "",
					$middleName = "",
					$jobTitle = "",
					$login = "guess",
					$phone = 0000)
		{
                        $this->id                = UtilClass::clearData($id, 'i');
			$this->firstName  	 = UtilClass::clearData($firstName);
			$this->secondName 	 = UtilClass::clearData($secondName);
			$this->middleName 	 = UtilClass::clearData($middleName);
			$this->jobTitle   	 = UtilClass::clearData($jobTitle);
			$this->login	  	 = UtilClass::clearData($login);
			$this->phone             = UtilClass::clearData($phone,'i');
		}
                
                public function getUser() {
                    return $this;
                }

                public function setUser($id, $firstName, $secondName, $middleName, $jobTitle, $login, $phone) {
                    $this->id                = UtilClass::clearData($id, 'i');
                    $this->firstName         = UtilClass::clearData($firstName);
                    $this->secondName        = UtilClass::clearData($secondName);
                    $this->middleName        = UtilClass::clearData($middleName);
                    $this->jobTitle          = UtilClass::clearData($jobTitle);
                    $this->login             = UtilClass::clearData($login);
                    $this->phone             = UtilClass::clearData($phone,'i');
                }
	}
?>