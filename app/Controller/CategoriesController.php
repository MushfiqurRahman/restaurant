<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
            //pr($this->paginate());exit;
		$this->set('categories', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
                //pr( $this->Category->find('first', $options));
		$this->set('category', $this->Category->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) { //pr($this->data);exit;
			$response = $this->Category->moveFile($this->request->data['Category']['img']);
			if($response[0]['success']) {
				$this->request->data['Category']['img'] = $response[0]['message'];
                                $this->request->data['Category']['thumb_img'] = $response[1]['message'];
				
                                $this->Category->create();
				if ($this->Category->save($this->request->data)) {
					$this->Session->setFlash(__('The Category has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
				}
			}
		}
		$menus = $this->Category->Menu->find('list');
		$this->set(compact('menus'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if($this->request->data['Category']['img']['error']==4) {
				unset($this->request->data['Category']['img']);

			}else {
				$response = $this->Category->moveFile($this->request->data['Category']['img']);	
				if($response[0]['success']) {
					$this->request->data['Category']['img'] = $response[0]['message'];
                                        $this->request->data['Category']['thumb_img'] = $response[1]['message'];					
				}
			}                        
                        if ($this->Category->save($this->request->data)) {
                                $this->Session->setFlash(__('The Category has been saved'));
                                $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
                        }


		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		$menus = $this->Category->Menu->find('list');
		$this->set(compact('menus'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('Category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
