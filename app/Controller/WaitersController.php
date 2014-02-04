<?php
App::uses('AppController', 'Controller');
/**
 * Waiters Controller
 *
 * @property Waiter $Waiter
 */
class WaitersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Waiter->recursive = 0;
		$this->set('waiters', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Waiter->exists($id)) {
			throw new NotFoundException(__('Invalid waiter'));
		}
		$options = array('conditions' => array('Waiter.' . $this->Waiter->primaryKey => $id));
		$this->set('waiter', $this->Waiter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Waiter->create();
			if ($this->Waiter->save($this->request->data)) {
				$this->Session->setFlash(__('The waiter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The waiter could not be saved. Please, try again.'));
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
		if (!$this->Waiter->exists($id)) {
			throw new NotFoundException(__('Invalid waiter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Waiter->save($this->request->data)) {
				$this->Session->setFlash(__('The waiter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The waiter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Waiter.' . $this->Waiter->primaryKey => $id));
			$this->request->data = $this->Waiter->find('first', $options);
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
		$this->Waiter->id = $id;
		if (!$this->Waiter->exists()) {
			throw new NotFoundException(__('Invalid waiter'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Waiter->delete()) {
			$this->Session->setFlash(__('Waiter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Waiter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
