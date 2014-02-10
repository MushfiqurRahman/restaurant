<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 * @property Table $Table
 * @property Waiter $Waiter
 */
class Order extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'table_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
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
		),
		'waiter_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
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
		),
		'items' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_printed' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Table' => array(
			'className' => 'Table',
			'foreignKey' => 'table_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Waiter' => array(
			'className' => 'Waiter',
			'foreignKey' => 'waiter_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        /**
         * 
         * @param type $data
         */
        public function keepOrder($data){                        
            $decoded = json_decode($data['order_details']);
            $items = array();
            $i = 0;
            $totalPrice = 0;
            foreach($decoded as $itm){
                if( !empty($itm) ){
                    if( property_exists($itm, 'waiter_n_table') ){
                        $temp = $itm->waiter_n_table;
                        $order['Order']['waiter_id'] = $temp->waiter_id;
                        $order['Order']['table_id'] = $temp->table_id;
                    }else{
                        $items[$i]['id'] = $itm->id;
                        $items[$i]['ingredients'] = $itm->ingredients;
                        $items[$i]['quantity'] = $itm->quantity;
                        $totalPrice += ($items[$i]['quantity']*$itm->price);
                    }
                    $i++;
                }
            }
            $order['Order']['items'] = serialize($items);
            $order['Order']['grand_total'] = $totalPrice;
            $order['Order']['comment'] = '';
            
            $this->log(print_r($order,true),'error');
            
            if( $this->save($order) ){
                return true;
            }
            return false;
        }
}
