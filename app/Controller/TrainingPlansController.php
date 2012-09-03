<?php
App::uses('AppController', 'Controller');
/**
 * TrainingPlans Controller
 *
 * @property TrainingPlan $TrainingPlan
 */
class TrainingPlansController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TrainingPlan->recursive = 0;
		$this->set('trainingPlans', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TrainingPlan->id = $id;
		if (!$this->TrainingPlan->exists()) {
			throw new NotFoundException("Programme type introuvable");
		}
		$this->set('trainingPlan', $this->TrainingPlan->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TrainingPlan->create();
			if ($this->TrainingPlan->save($this->request->data)) {
				$this->Session->setFlash("Programme type enregistré, vous pouvez ajouter ses exercices.", 'alert_success');
				$this->redirect(array('action' => 'edit', $this->TrainingPlan->id));
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
		$this->TrainingPlan->id = $id;
		if (!$this->TrainingPlan->exists()) {
			throw new NotFoundException("Programme type introuvable");
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TrainingPlan->save($this->request->data)) {
				$this->Session->setFlash("Programme type enregistré.", 'alert_success');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash("Veuillez corriger les erreurs.", 'alert_notice');
			}
		} else {
			$this->TrainingPlan->recursive = -1;
			$this->request->data = $this->TrainingPlan->read(null, $id);
		}

		$this->set('exercises', $this->TrainingPlan->ExercisesTrainingPlan->Exercise->find('list', array('order' => 'short_name')));
		$this->set('plans', $this->TrainingPlan->ExercisesTrainingPlan->find('all', array(
			'conditions' => array('ExercisesTrainingPlan.training_plan_id' => $id),
			'order' => 'ExercisesTrainingPlan.created ASC',
			'contain' => array('Exercise'),
		)));
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
		$this->TrainingPlan->id = $id;
		if (!$this->TrainingPlan->exists()) {
			throw new NotFoundException("Programme type introuvable");
		}
		if ($this->TrainingPlan->delete()) {
			$this->Session->setFlash(__('Training plan deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Training plan was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
