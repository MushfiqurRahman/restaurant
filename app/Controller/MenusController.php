<?php
App::uses('AppController', 'Controller');
/**
 * Menus Controller
 *
 * @property Menu $Menu
 */
class MenusController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Menu->recursive = 0;
		$this->set('menus', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
		$this->set('menu', $this->Menu->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			$response = $this->Menu->moveFile($this->request->data['Menu']['img']);
			if($response[0]['success']) {
				$this->request->data['Menu']['img'] = $response[0]['message'];
                                $this->request->data['Menu']['thumb_img'] = $response[1]['message'];
                                //pr($this->request->data);exit;
				$this->Menu->create();
				if ($this->Menu->save($this->request->data)) {
					$this->Session->setFlash(__('The Menu has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The Menu could not be saved. Please, try again.'));
				}
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
			// pr($this->request->data);
			if($this->request->data['Menu']['img']['error'] == 4) {
				unset($this->request->data['Menu']['img']);
			}else {
				$response = $this->Menu->moveFile($this->request->data['Menu']['img']);	

				if($response[0]['success']) {
					$this->request->data['Menu']['img'] = $response[0]['message'];	
                                        $this->request->data['Menu']['thumb_img'] = $response[1]['message'];	
					
				}else {
					$this->Session->setFlash(__('The Menu could not be saved. Please, try again.'));
				}
			}
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The Menu has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Menu could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
			$this->request->data = $this->Menu->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Menu->delete()) {
			$this->Session->setFlash(__('Menu deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Menu was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
