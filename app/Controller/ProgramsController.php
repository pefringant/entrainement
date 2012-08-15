<?php
App::uses('AppController', 'Controller');
/**
 * Programs Controller
 *
 * @property Program $Program
 */
class ProgramsController extends AppController {
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Program->recursive = 0;
		$programs = $this->paginate();

		$this->set(compact('programs'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Program->id = $id;
		if (!$this->Program->exists()) {
			throw new NotFoundException(__('Invalid program'));
		}
		$this->set('program', $this->Program->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('ajax')) {
			$this->viewPath .= DS . 'ajax';
		}
		if ($this->request->is('post')) {
			$this->Program->create();
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash("Programme enregistré.", 'alert_success');
				if ($this->request->is('ajax')) {
					$this->Program->contain(array('Exercise'));
					$newProgram = $this->Program->read();
					$this->set('newProgram', $newProgram);
					$newUser = $this->Program->User->findUserDaily($newProgram['Program']['effective_date'], $newProgram['Program']['user_id']);
					if (count($newUser['Program']) == 1) {
						$this->set('newUser', $newUser);
					}
				} else {
					$this->redirect(array('action' => 'index', $this->passedArgs['date']));
				}
			} else {
				$this->Session->setFlash("Veuillez corriger les erreurs.", 'alert_notice');
			}
		}
		$this->set('users', $this->Program->User->find('list', array('order' => 'short_name')));
		$this->set('exercises', $this->Program->Exercise->find('list', array('order' => 'short_name')));
		$this->set('date', $this->passedArgs['date']);
		if (!empty($newUser)) {
			$this->set('user', $newUser);
		} elseif (!empty($this->passedArgs['user'])) {
			$this->Program->User->id = $this->passedArgs['user'];
			$this->Program->User->recursive = -1;
			$this->set('user', $this->Program->User->read());
		}
	}

/**
 * List of User's programs. Can also quickly add a new program
 * 
 * @param  int $user_id User Id
 * @return array List of user's programs
 */
	public function user_programs($user_id) {
		if ($this->request->is('post')) {
			$this->Program->create();
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash("Programme enregistré.", 'alert_success');
				$this->redirect(array($user_id, '#' => 'id-'.$this->Program->id));
			} else {
				$this->Session->setFlash("Veuillez corriger les erreurs.", 'alert_notice');
			}
		}

		$this->Program->User->id = $user_id;
		// User data must contain last created program date and exercise, to use as quick add form defaults
		$this->Program->User->contain(array(
			'Program' => array(
				'fields' => array('Program.effective_date', 'Program.exercise_id'),
				'conditions' => array('Program.effective_date >= CURDATE()'),
				'order' => 'Program.created DESC',
				'limit' => 1,
			)
		));
		$this->set('user', $this->Program->User->read());
		$programs = $this->Program->findFuture($user_id);
		$this->set('programs', $programs);
		$this->set('exercises', $this->Program->Exercise->find('list', array('order' => 'short_name')));
	}

/**
 * User's programs history.
 * 
 * @param  int $user_id User Id
 * @return array List of past user's programs
 */
	public function user_history($user_id) {
		$this->Program->User->id = $user_id;
		$this->Program->User->recursive = -1;
		$this->set('user', $this->Program->User->read());
		$programs = $this->Program->findHistory($user_id);
		$this->set('programs', $programs);
	}

/**
 * edit method
 *
 * @param int Program Id
 * @return void
 */
	public function edit($id = null) {
		if ($this->request->is('ajax')) {
			$this->viewPath .= DS . 'ajax';
		}
		$this->Program->id = $id;
		if (!$this->Program->exists()) {
			throw new NotFoundException("Programme introuvable");
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash("Modifications enregistrées.", 'alert_success');
				if ($this->request->is('ajax')) {
					$this->Program->contain(array('User', 'Exercise'));
					$updatedProgram = $this->Program->read();
					$this->set('updatedProgram', $updatedProgram);
				} else {
					$this->redirect(array('action' => 'user_programs', $this->request->data['Program']['user_id'], '#' => 'id-'.$this->Program->id));
				}
			} else {
				$this->Session->setFlash("Veuillez corriger les erreurs.", 'alert_notice');
			}
		} else {
			$this->Program->contain(array('User'));
			$this->request->data = $this->Program->read(null, $id);
		}
		$this->set('exercises', $this->Program->Exercise->find('list', array('order' => 'short_name')));
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
		$this->Program->id = $id;
		if (!$program = $this->Program->read()) {
			throw new NotFoundException(__('Invalid program'));
		}
		$date = $program['Program']['effective_date'];
		if ($this->Program->delete()) {
			if (!$this->request->is('ajax')) {
				$this->Session->setFlash("Exercice supprimé.", 'alert_success');
			}
		} else {
			$this->Session->setFlash("Impossible de supprimer l'exercice.", 'alert_error');
		}
		$this->redirect($this->referer());
	}

/**
 * Delete all user exercises on $date
 * 
 * @param  int $user_id User ID
 * @param  string $date Y-m-d date
 * @return void
 */
	public function delete_user($user_id, $date) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Program->deleteAll(array(
			'Program.user_id' => $user_id,
			'Program.effective_date' => $date
		));
		$this->redirect($this->referer());
	}
}
