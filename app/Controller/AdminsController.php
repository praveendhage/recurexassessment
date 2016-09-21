<?php
App::uses('AppController', 'Controller');
/**
 * Admins Controller
 *
 * @property Admin $Admin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class AdminsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public function beforeRender() {
		if($this->action == "login" || $this->action == "register") {

		}
		else if(!$this->Session->read("admin")) {
			$this->redirect(array("action" => "login"));
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Admin->recursive = 0;
		$this->set('admins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Admin->exists($id)) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
		$this->set('admin', $this->Admin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Admin->create();
			if ($this->Admin->save($this->request->data)) {
				$this->Flash->success(__('The admin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The admin could not be saved. Please, try again.'));
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
		if (!$this->Admin->exists($id)) {
			throw new NotFoundException(__('Invalid admin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Admin->save($this->request->data)) {
				$this->Flash->success(__('The admin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The admin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
			$this->request->data = $this->Admin->find('first', $options);
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
		$this->Admin->id = $id;
		if (!$this->Admin->exists()) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Admin->delete()) {
			$this->Flash->success(__('The admin has been deleted.'));
		} else {
			$this->Flash->error(__('The admin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function login() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$checkAdmin = $this->Admin->find("first", array("conditions" => array("Admin.email" => $data["Admin"]["email"], "Admin.password" => md5($data["Admin"]["password"])), "recursive" =>-1));
			if($checkAdmin) {
				$this->Session->write("admin", $checkAdmin);
				$this->redirect(array("controller" => "food_items","action" => "index"));
			}
			else {
				$this->Flash->set("Not a valid login details");
			}
		}
	}

	public function register() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			if(isset($data["Admin"]["firstname"]) && $data["Admin"]["firstname"]!="" && isset($data["Admin"]["lastname"]) && $data["Admin"]["lastname"]!="" && isset($data["Admin"]["email"]) && $data["Admin"]["email"]!="" && isset($data["Admin"]["password"]) && $data["Admin"]["password"]!="" && isset($data["Admin"]["confirm_password"]) && $data["Admin"]["confirm_password"]!="" && isset($data["Admin"]["mobile"]) && $data["Admin"]["mobile"]!="") {
				$checkAdmin = $this->Admin->find("first", array("conditions" => array("Admin.email" => $data["Admin"]["email"]), "recursive" => -1));
				if($checkAdmin) {
					$this->Flash->set("Email already exists");
				}
				else {
					if($data["Admin"]["password"] != $data["Admin"]["confirm_password"]) {
						$this->Flash->set("Password and Confirm Password should be same");
					}
					else {
						if(isset($data["Admin"]["profile_pic"]["name"]) && $data["Admin"]["profile_pic"]["name"]!="") {
							$name = strtotime("now").str_replace(" ", "_", $data["Admin"]["profile_pic"]["name"]);
							if(move_uploaded_file($data["Admin"]["profile_pic"]["tmp_name"], "pics/".$name)) {
								$data["Admin"]["profile_pic"] = $name;
							}
							else {
								unset($data["Admin"]["profile_pic"]);	
							}
						}
						else {
							unset($data["Admin"]["profile_pic"]);
						}
						$data["Admin"]["password"] = md5($data["Admin"]["password"]);
						$this->Admin->create();
						if($this->Admin->save($data)) {
							$this->Flash->set("You are successfully registered. Login now.");
							$this->redirect(array("action" => "login"));
						}
						else {
							$this->Flash->set("Something is wrong. Please try after sometime");
						}
					}
				}
			}
			else {
				$this->Flash->set("All fields are mandatory");
			}
		}
	}
}
