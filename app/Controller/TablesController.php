<?php
App::uses('AppController', 'Controller');
/**
 * Tables Controller
 *
 * @property Table $Table
 */
class TablesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Table->recursive = 0;
		$this->set('tables', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Table->exists($id)) {
			throw new NotFoundException(__('Invalid table'));
		}
		$options = array('conditions' => array('Table.' . $this->Table->primaryKey => $id));
		$this->set('table', $this->Table->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Table->create();
			if ($this->Table->save($this->request->data)) {
				$this->Session->setFlash(__('The table has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The table could not be saved. Please, try again.'));
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
		if (!$this->Table->exists($id)) {
			throw new NotFoundException(__('Invalid table'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Table->save($this->request->data)) {
				$this->Session->setFlash(__('The table has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Table.' . $this->Table->primaryKey => $id));
			$this->request->data = $this->Table->find('first', $options);
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
		$this->Table->id = $id;
		if (!$this->Table->exists()) {
			throw new NotFoundException(__('Invalid table'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Table->delete()) {
			$this->Session->setFlash(__('Table deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Table was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
