<?php
App::uses('AppController', 'Controller');
/**
 * ExercisesTrainingPlans Controller
 *
 * @property ExercisesTrainingPlan $ExercisesTrainingPlan
 */
class ExercisesTrainingPlansController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ExercisesTrainingPlan->recursive = 0;
		$this->set('exercisesTrainingPlans', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ExercisesTrainingPlan->id = $id;
		if (!$this->ExercisesTrainingPlan->exists()) {
			throw new NotFoundException(__('Invalid exercises training plan'));
		}
		$this->set('exercisesTrainingPlan', $this->ExercisesTrainingPlan->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ExercisesTrainingPlan->create();
			if (!$this->ExercisesTrainingPlan->save($this->request->data)) {
				$this->Session->setFlash("Vous devez sélectionner un exercice dans la liste.", 'alert_error');
			}
			$this->redirect(array(
				'controller' => 'training_plans', 
				'action' => 'edit', 
				$this->request->data['ExercisesTrainingPlan']['training_plan_id'],
				'#' => 'id-'.$this->ExercisesTrainingPlan->id,
			));
		} else {
			$this->redirect(array('controller' => 'training_plans', 'action' => 'index'));
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
		$this->ExercisesTrainingPlan->id = $id;
		if (!$this->ExercisesTrainingPlan->exists()) {
			throw new NotFoundException(__('Invalid exercises training plan'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if (!$this->ExercisesTrainingPlan->save($this->request->data)) {
				$this->Session->setFlash("Vous devez sélectionner un exercice dans la liste.", 'alert_error');
			}
			$this->redirect(array(
				'controller' => 'training_plans', 
				'action' => 'edit', 
				$this->request->data['ExercisesTrainingPlan']['training_plan_id'],
				'#' => 'id-'.$this->ExercisesTrainingPlan->id,
			));
		} else {
			$this->request->data = $this->ExercisesTrainingPlan->read(null, $id);
		}
		$this->set('exercises', $this->ExercisesTrainingPlan->Exercise->find('list'));
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
		$this->ExercisesTrainingPlan->id = $id;
		if (!$this->ExercisesTrainingPlan->read()) {
			throw new NotFoundException("Exercice introuvable");
		}
		if ($this->ExercisesTrainingPlan->delete()) {
			$this->Session->setFlash("Exercice supprimé du programme.", 'alert_success');
		} else {
			$this->Session->setFlash("Impossible de supprimer l'exercice.", 'alert_error');
		}
		$this->redirect($this->referer());
	}
}
