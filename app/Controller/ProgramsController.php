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
		$this->set('users', $this->Program->User->find('list'));
		$this->set('exercises', $this->Program->Exercise->find('list'));
		$this->set('date', $this->passedArgs['date']);
		if (!empty($newUser)) {
			$this->set('user', $newUser);
		} elseif (!empty($this->passedArgs['user'])) {
			$this->Program->User->id = $this->passedArgs['user'];
			$this->Program->User->recursive = -1;
			$this->set('user', $this->Program->User->read());
		}
	}

	public function user_programs($user_id = null) {
		if ($this->request->is('post')) {
			$this->Program->create();
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash("Programme enregistré.", 'alert_success');
				$this->redirect(array($user_id));
			} else {
				$this->Session->setFlash("Veuillez corriger les erreurs.", 'alert_notice');
			}
		}

		$this->Program->User->id = $user_id;
		$this->set('user', $this->Program->User->read());
		$this->set('programs', $this->Program->findUserPrograms($user_id));
		$this->set('exercises', $this->Program->Exercise->find('list'));
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
					$this->redirect(array('action' => 'user_programs', $this->request->data['Program']['user_id']));
				}
			} else {
				$this->Session->setFlash("Veuillez corriger les erreurs.", 'alert_notice');
			}
		} else {
			$this->Program->contain(array('User'));
			$this->request->data = $this->Program->read(null, $id);
		}
		$this->set('exercises', $this->Program->Exercise->find('list'));
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
			$this->Session->setFlash("Impossible de supprimer l'exerice.", 'alert_error');
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
