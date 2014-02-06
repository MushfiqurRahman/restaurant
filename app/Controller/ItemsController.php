<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Item->recursive = 0;
		$this->set('items', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
		$this->set('item', $this->Item->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) { //pr($this->data);exit;
			
			$response = $this->Item->moveFile($this->request->data['Item']['img']);
			if($response[0]['success']) {
				$this->request->data['Item']['img'] = $response[0]['message'];
                                $this->request->data['Item']['thumb_img'] = $response[1]['message'];
				$this->Item->create();
				if ($this->Item->save($this->request->data)) {
					$this->Session->setFlash(__('The Item has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The Item could not be saved. Please, try again.'));
				}
			}

		}
//		$subcategories = $this->Item->Subcategory->find('list');
//		$this->set(compact('subcategories'));
                $categories = $this->Item->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this->request->is('post') || $this->request->is('put')) { 
                    $fieldList = array('category_id', 'title','descr','ingredients','price','discount','is_featured');
			
			if(!$this->request->data['Item']['img']) {
				unset($this->request->data['Item']['img']);
			}else {
				$response = $this->Item->moveFile($this->request->data['Item']['img']);	
				if($response[0]['success']) {
					$this->request->data['Item']['img'] = $response[0]['message'];
                                        $this->request->data['Item']['thumb_img'] = $response[1]['message'];
                                        $fieldList[] = 'img';
                                        $fieldList[] = 'thumb_img';
				}else{
                                    $this->Session->setFlash(__('The Item could not be saved! Please try again.'));
                                }
			}                        
                        if ($this->Item->save($this->request->data, true, $fieldList)) {
                                $this->Session->setFlash(__('The Item has been saved'));
                                $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The Item could not be saved. Please, try again.'));
                        }
		} else {
			$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
			$this->request->data = $this->Item->find('first', $options);
		}
//		$subcategories = $this->Item->Subcategory->find('list');
//		$this->set(compact('subcategories'));
                $categories = $this->Item->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Item->delete()) {
			$this->Session->setFlash(__('Item deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Item was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
