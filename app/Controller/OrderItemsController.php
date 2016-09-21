<?php
App::uses('AppController', 'Controller');
/**
 * OrderItems Controller
 *
 * @property OrderItem $OrderItem
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OrderItemsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrderItem->recursive = 0;
		$this->set('orderItems', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrderItem->exists($id)) {
			throw new NotFoundException(__('Invalid order item'));
		}
		$options = array('conditions' => array('OrderItem.' . $this->OrderItem->primaryKey => $id));
		$this->set('orderItem', $this->OrderItem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrderItem->create();
			if ($this->OrderItem->save($this->request->data)) {
				$this->Flash->success(__('The order item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order item could not be saved. Please, try again.'));
			}
		}
		$orders = $this->OrderItem->Order->find('list');
		$foodItems = $this->OrderItem->FoodItem->find('list');
		$this->set(compact('orders', 'foodItems'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrderItem->exists($id)) {
			throw new NotFoundException(__('Invalid order item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrderItem->save($this->request->data)) {
				$this->Flash->success(__('The order item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrderItem.' . $this->OrderItem->primaryKey => $id));
			$this->request->data = $this->OrderItem->find('first', $options);
		}
		$orders = $this->OrderItem->Order->find('list');
		$foodItems = $this->OrderItem->FoodItem->find('list');
		$this->set(compact('orders', 'foodItems'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OrderItem->id = $id;
		if (!$this->OrderItem->exists()) {
			throw new NotFoundException(__('Invalid order item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrderItem->delete()) {
			$this->Flash->success(__('The order item has been deleted.'));
		} else {
			$this->Flash->error(__('The order item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
