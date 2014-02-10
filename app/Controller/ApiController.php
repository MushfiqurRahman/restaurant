<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiController
 *
 * @author mushfique
 */
class ApiController extends AppController {
    
    public function beforeFilter(){
        parent::beforeFilter();
        $this->layout = $this->autoRender = false;
        $this->Auth->allow(array('waiter_login','get_menu','get_items','make_order','print_order'));
    }
    
    /**
     * 
     */
    public function waiter_login(){
        $this->loadModel('Waiter');
        $waiterId = $this->Waiter->field('id', array('Waiter.password' => $this->request->data['password']));
        
        if( $waiterId ){ 
            $response['success'] = true;
            $response['waiter_id'] = $waiterId;
            
            //bringing menu with category
            $response['menus'] = $this->_menus(2);
            $response['ads'] = $this->_ads();
            $response['settings'] = $this->_settings();
        }else{
            $response['success'] = false;
            $response['message'] = 'Login Failed! Invaid Waiter Password.';
        }
        //$this->log(print_r($response, true),'error');
        echo json_encode($response);
    }
    
    protected function _menus( $recursive_level = 0){
        $this->loadModel('Menu');
        $this->Menu->Behaviors->load('Containable');
        //return $this->Menu->find('all', array('recursive' => $recursive_level));
        return $this->Menu->find('all', array('contain' => array(
            'Category' => array(
                'fields' => array('id','title','descr','thumb_img'),
                'Item' => array(
                    'fields' => array('id','title','descr','ingredients','thumb_img','price','discount', 'is_featured'),
                )
            ),            
        ),'fields' => array('id','title'),));
    }
    
    protected function _ads() {
        $this->loadModel('Ad');
        return $this->Ad->get_random_add();
    }
    
    protected function _settings() {
        $this->loadModel('Setting');
        return $this->Setting->find('all');
    }
    
    
    public function get_menu(){
        $menus = $this->_menus(1);
        //$this->log(print_r($menus, true),'error');
        echo json_encode($menus);
    }
    
    public function get_items(){
        $this->loadModel('Item');
        $items = $this->Item->find('all', array('conditions' => array(
            'category_id' => $this->request->data['category_id']),
            'recursive' => 0));
        echo json_encode($items);
    }
    
    public function make_order(){
        $this->layout = false;
        $this->autoRender = false;
        
        $decoded = json_decode($this->request->data['order_details']);
        $this->log(print_r($this->request->data['order_details'],true),'error');
        
        //$this->log(print_r($decoded,true),'error');
        $this->loadModel('Order');
        $response = array();
        if( $this->Order->keepOrder($this->request->data) ){
            $response['success'] = true;
            $response['message'] = 'Order Accepted. Thanks for ordering.';
        }else{
            $response['success'] = false;
            $response['message'] = 'Order Failed! Please try again.';
        }
        echo json_encode($response);
    }
    
    public function print_order(){
        $this->loadModel('Order');
        //$this->Order->printOrder()
    }
}
