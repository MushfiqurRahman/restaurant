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
    
    public $uses = array('Waiter', 'Menu', 'Category');
    
    public function beforeFilter(){
        parent::beforeFilter();
        $this->layout = $this->autoRender = false;
        $this->Auth->allow('waiter_login');
    }
    
    /**
     * 
     */
    public function waiter_login(){
        $this->loadModel('Waiter');
        $waiterId = $this->Waiter->find('first', array('conditions' => array('Waiter.password' => 
            $this->request->data['password'])));
        
        if( $waiterId ){
            $response['success'] = true;
            $response['waiter_id'] = $waiter['Waiter']['id'];
            $response['Menu'] = $this->_menus(0);
        }else{
            $response['success'] = false;
            $response['message'] = 'Login Failed! Invaid Waiter Password.';
        }
        echo $response;
    }
    
    protected function _menus( $recursive_level = 0){
        $this->loadModel('Menu');
        return $this->Menu->get_menus($recursive_level);
    }
    
    
    public function get_menu(){
        $menus = $this->_menus(0);
        $this->log(print_r($menus, true),'error');
        echo json_encode($menus);
    }
    
    public function get_category(){
        $this->loadModel('Category');
        $categoryIds = $this->Category->query('select category_id FROM categories_menus '
                . 'WHERE menu_id='.$this->request->data['menu_id']);
        
        $this->log(print_r($categoryIds, true),'error');
        
        $categories = $this->Category->find('all', array('fields' => 
            array('id', 'title', 'descr', 'thumb_img'),
            'conditions' => array('')));
        
        echo json_encode($categories);
    }
    
    public function get_subcategory(){
        $this->loadModel('Subcategory');
        $this->Subcategory->recursive = 0;
        $subcategories = $this->Subcategory->find('all', array('fields' => array(
            'id', 'title','descr', 'thumb_img'), 'recursive' => 0));
        echo json_encode($subcategories);
        
        $this->log(print_r($subcategories, true), 'error');
    }
    
    public function get_items(){
        $this->loadModel('Item');
        $items = $this->Item->find('all', array('conditions' => array(
            'subcategory_id' => $this->request->data['subcategory_id']),
            'recursive' => 0));
        echo json_encode($items);
    }
    
    public function make_order(){
        
    }    
    
    public function get_all_data(){
        
    }
}
