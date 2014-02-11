<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property Subcategory $Subcategory
 */
class Item extends AppModel {

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
		'ingredients' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_featured' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
        /**
 * belongsTo associations
 *
 * @var array
 */
//	public $belongsTo = array(
//		'Subcategory' => array(
//			'className' => 'Subcategory',
//			'foreignKey' => 'subcategory_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		)
//	);
        
        public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        /**
         * 
         * @param type $order
         */
        public function orderedItems( &$order) {
            $itemList = $this->find('list',array('fields' => array('id','title',)));
            
            foreach($order as $k => $v){
                $order[$k]['Order']['items'] = unserialize(base64_decode($order[$k]['Order']['items']));
                //$this->log(print_r($order[$k]['Order']['items'],true),'error');
                
                foreach($order[$k]['Order']['items'] as $i => $val){
                    $order[$k]['Order']['items'][$i]['title'] = $itemList[ $val['id'] ];
                }
            }
            //$this->log(print_r($order, true),'error');
        }
}
