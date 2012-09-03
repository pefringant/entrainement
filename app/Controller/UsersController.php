<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
/**
 * Pagination options
 * @var array
 */
	public $paginate = array(
		'order' => 'User.short_name ASC',
		'limit' => 10,
		'recursive' => -1,
	);

/**
 * Users with at least one program on that day
 * 
 * @param  string $date Y-m-d Date
 * @return array Users and their program for that day
 */
	public function daily($date = null) {
		// PRG redirect
		if ($this->request->is('post')) {
			if (!empty($this->request->data['date'])) {
				$date = $this->request->data['date'];
			} else {
				$date = date('Y-m-d');
			}
			$this->redirect(array($date));
		}

		if (empty($date) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
			$date = date('Y-m-d');
		}
		$this->set('date', $date);
		$users = $this->User->findDaily($date);
		$this->set('users', $users);
		$this->set('trainingPlans', ClassRegistry::init('TrainingPlan')->findPlans());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->is('post')) {
			$this->paginate['conditions'] = array('User.full_name' => $this->request->data['User']['query']);
		}

		$this->set('names', $this->User->find('list', array('fields' => 'full_name')));
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException("Athlète introuvable");
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash("Athlète enregistré.", 'alert_success');
				$this->redirect(array('action' => 'index', '#' => 'id-'.$this->User->id));
			} else {
				$this->Session->setFlash("Veuillez corriger les erreurs.", 'alert_notice');
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException("Athlète introuvable");
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash("Athlète modifié.", 'alert_success');
				$this->redirect(array('action' => 'index', '#' => 'id-'.$this->User->id));
			} else {
				$this->Session->setFlash("Veuillez corriger les erreurs.", 'alert_notice');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException("Athlète introuvable");
		}
		if ($this->User->delete()) {
			$this->Session->setFlash("Athlète supprimé.", 'alert_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash("Impossible de supprimer cet athlète.", 'alert_error');
		$this->redirect(array('action' => 'index'));
	}
}
