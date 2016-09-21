<?php
App::uses('AppController', 'Controller');
/**
 * FoodItems Controller
 *
 * @property FoodItem $FoodItem
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class FoodItemsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public function beforeRender() {
		if(!$this->Session->read("admin")) {
			$this->redirect(array("controller" => "admins","action" => "login"));
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FoodItem->recursive = 0;

		//array("conditions" => array("FoodItem.admin_id" => $this->Session->read("admin.Admin.id")))
		$this->set('foodItems', $this->Paginator->paginate(array("FoodItem.admin_id" => $this->Session->read("admin.Admin.id"))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FoodItem->exists($id)) {
			throw new NotFoundException(__('Invalid food item'));
		}
		$options = array('conditions' => array('FoodItem.' . $this->FoodItem->primaryKey => $id));
		$this->set('foodItem', $this->FoodItem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FoodItem->create();
			if ($this->FoodItem->save($this->request->data)) {
				$this->Flash->success(__('The food item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The food item could not be saved. Please, try again.'));
			}
		}
		$admins = $this->FoodItem->Admin->find('list');
		$this->set(compact('admins'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FoodItem->exists($id)) {
			throw new NotFoundException(__('Invalid food item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FoodItem->save($this->request->data)) {
				$this->Flash->success(__('The food item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The food item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FoodItem.' . $this->FoodItem->primaryKey => $id));
			$this->request->data = $this->FoodItem->find('first', $options);
		}
		$admins = $this->FoodItem->Admin->find('list');
		$this->set(compact('admins'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FoodItem->id = $id;
		if (!$this->FoodItem->exists()) {
			throw new NotFoundException(__('Invalid food item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FoodItem->delete()) {
			$this->Flash->success(__('The food item has been deleted.'));
		} else {
			$this->Flash->error(__('The food item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
