<?php
App::uses('AppModel', 'Model');
/**
 * Menu Model
 *
 * @property Category $Category
 */
class Menu extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descr' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'img' => array(
			'notempty' => array(
				 'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
        public $hasMany = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'menu_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

//        public $hasAndBelongsToMany = array(
//		'Category' => array(
//			'className' => 'Category',
//			'joinTable' => 'categories_menus',
//			'foreignKey' => 'menu_id',
//			'associationForeignKey' => 'category_id',
//			'unique' => 'keepExisting',
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'finderQuery' => '',
//			'deleteQuery' => '',
//			'insertQuery' => ''
//		)
//	);
        
        /**
         * Get all the menus
         * 
         * @param type $recursive_level
         * @return type
         */
//        public function get_menus( $recursive_level = 0 ){            
//            return $this->find('all', array('fields' => 
//                array('id', 'title', 'descr', 'thumb_img'),
//                'recursive' => $recursive_level));
//        }

}
