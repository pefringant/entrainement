<?php
App::uses('AppController', 'Controller');
/**
 * Exercises Controller
 *
 * @property Exercise $Exercise
 */
class ExercisesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Exercise->recursive = 0;
		$this->set('exercises', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Exercise->id = $id;
		if (!$this->Exercise->exists()) {
			throw new NotFoundException(__('Invalid exercise'));
		}
		$this->set('exercise', $this->Exercise->read(null, $id));
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
				$this->Session->setFlash(__('The exercise has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The exercise could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid exercise'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Exercise->save($this->request->data)) {
				$this->Session->setFlash(__('The exercise has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The exercise could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid exercise'));
		}
		if ($this->Exercise->delete()) {
			$this->Session->setFlash(__('Exercise deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Exercise was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
