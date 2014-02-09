<?php
App::uses('AppController', 'Controller');
/**
 * Ads Controller
 *
 * @property Ad $Ad
 */
class AdsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ad->recursive = 0;
		$this->set('ads', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ad->exists($id)) {
			throw new NotFoundException(__('Invalid ad'));
		}
		$options = array('conditions' => array('Ad.' . $this->Ad->primaryKey => $id));
		$this->set('ad', $this->Ad->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) { //pr($this->data);exit;
			$response = $this->Ad->moveFile($this->request->data['Ad']['img']);
			if($response[0]['success']) {
				$this->request->data['Ad']['img'] = $response[0]['message'];
                                $this->request->data['Ad']['thumb_img'] = $response[1]['message'];
				$this->Ad->create();
				if ($this->Ad->save($this->request->data)) {
					$this->Session->setFlash(__('The ad has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The ad could not be saved. Please, try again.'));
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
		if (!$this->Ad->exists($id)) {
			throw new NotFoundException(__('Invalid ad'));
		}
		if ($this->request->is('post') || $this->request->is('put')) { 
			if(!$this->request->data['Ad']['img']) {
				unset($this->request->data['Ad']['img']);

			}else {
				$response = $this->Ad->moveFile($this->request->data['Ad']['img']);	
				if($response[0]['success']) {
					$this->request->data['Ad']['img'] = $response[0]['message'];
                                        $this->request->data['Ad']['thumb_img'] = $response[1]['message'];
				}else{
                                    $this->Session->setFlash(__('The Ad could not be saved! Please try agian.'));
                                }
                        }
                        if ($this->Ad->save($this->request->data)) {
                                $this->Session->setFlash(__('The ad has been saved'));
                                $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The ad could not be saved. Please, try again.'));
                        }
		}else {
			$options = array('conditions' => array('Ad.' . $this->Ad->primaryKey => $id));
			$this->request->data = $this->Ad->find('first', $options);
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
		$this->Ad->id = $id;
		if (!$this->Ad->exists()) {
			throw new NotFoundException(__('Invalid ad'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ad->delete()) {
			$this->Session->setFlash(__('Ad deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ad was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
