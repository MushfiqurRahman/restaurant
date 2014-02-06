<?php
App::uses('AppController', 'Controller');
/**
 * Subcategories Controller
 *
 * @property Subcategory $Subcategory
 */
class SubcategoriesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Subcategory->recursive = 0;
		$this->set('subcategories', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Subcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		$options = array('conditions' => array('Subcategory.' . $this->Subcategory->primaryKey => $id));
		$this->set('subcategory', $this->Subcategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$response = $this->Subcategory->moveFile($this->request->data['Subcategory']['img']);
			if($response[0]['success']) {
				$this->request->data['Subcategory']['img'] = $response[0]['message'];
                                $this->request->data['Subcategory']['thumb_img'] = $response[1]['message'];
				$this->Subcategory->create();
				if ($this->Subcategory->save($this->request->data)) {
					$this->Session->setFlash(__('The Subcategory has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The Subcategory could not be saved. Please, try again.'));
				}
			}


		}
		$categories = $this->Subcategory->Category->find('list');
		$items = $this->Subcategory->Item->find('list');
		$this->set(compact('categories', 'items'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Subcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if(!$this->request->data['Subcategory']['img']) {
				unset($this->request->data['Subcategory']['img']);

			}else {
				$response = $this->Subcategory->moveFile($this->request->data['Subcategory']['img']);	
				if($response[0]['success']) {
					$this->request->data['Subcategory']['img'] = $response[0]['message'];
                                        $this->request->data['Subcategory']['thumb_img'] = $response[1]['message'];
					
					if ($this->Subcategory->save($this->request->data)) {
						$this->Session->setFlash(__('The Subcategory has been saved'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The Subcategory could not be saved. Please, try again.'));
					}
				}
			}


		} else {
			$options = array('conditions' => array('Subcategory.' . $this->Subcategory->primaryKey => $id));
			$this->request->data = $this->Subcategory->find('first', $options);
		}
		$categories = $this->Subcategory->Category->find('list');
		$items = $this->Subcategory->Item->find('list');
		$this->set(compact('categories', 'items'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Subcategory->id = $id;
		if (!$this->Subcategory->exists()) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Subcategory->delete()) {
			$this->Session->setFlash(__('Subcategory deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Subcategory was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
