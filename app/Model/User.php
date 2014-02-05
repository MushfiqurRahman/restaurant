<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Invalid email',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
                        'isunique' => array(
                            'rule' => array('isunique'),
                            'message' => 'This email already taken!'
                        )
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
                        'confirm_password' => array(
                            'rule' => array('confirm_password'),
                            'message' => 'Password and confirm password mismatched',
                            
                        )
		),
	);
        
        /**
         * Checks password and confirm password
         * @return boolean
         */
        public function confirm_password(){
            if($this->data['User']['password']!=$this->data['User']['confirm_password']){
                return false;
            }
            return true;
        }
        
        /**
         * Encrypting password and removing the confirm_password field 
         * @param type $options
         * @return boolean
         */
        public function beforeSave($options = array()){
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            unset($this->data['User']['confirm_password']);
            return true;
        }
}
