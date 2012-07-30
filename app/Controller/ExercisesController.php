<?php
App::uses('AppController', 'Controller');
/**
 * Exercises Controller
 *
 * @property Exercise $Exercise
 */
class ExercisesController extends AppController {
/**
 * Pagination options
 * @var array
 */
	public $paginate = array(
		'order' => 'Exercise.short_name ASC',
		'limit' => 20,
		'recursive' => -1,
	);
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('exercises', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Exercise->create();
			if ($this->Exercise->save($this->request->data)) {
				$this->Session->setFlash("Exercice enregistré.", 'alert_success');
				$this->redirect(array('action' => 'index'));
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
		$this->Exercise->id = $id;
		if (!$this->Exercise->exists()) {
			throw new NotFoundException("Exercice introuvable");
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Exercise->save($this->request->data)) {
				$this->Session->setFlash("Exercice modifié.", 'alert_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Veuillez corriger les erreurs.", 'alert_notice');
			}
		} else {
			$this->request->data = $this->Exercise->read(null, $id);
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
		$this->Exercise->id = $id;
		if (!$this->Exercise->exists()) {
			throw new NotFoundException("Exercice introuvable");
		}
		if ($this->Exercise->delete()) {
			$this->Session->setFlash("Exercice supprimé.", 'alert_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash("Impossible de supprimer cet exercice.", 'alert_error');
		$this->redirect(array('action' => 'index'));
	}
}
