<?php
App::uses('AppModel', 'Model');
/**
 * TrainingPlan Model
 *
 */
class TrainingPlan extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * hasMany associations
 * @var array
 */
 	public $hasMany = array(
 		'ExercisesTrainingPlan',
 	);

/**
 * Validation rules
 *
 * @var array
 */
 	public $validate = array(
 		'title' => array(
 			'rule' => 'notEmpty',
 			'required' => true,
 			'allowEmpty' => false,
 			'message' => "Vous devez donner un titre à ce programme type"
 		),
 	);

/**
 * Return all training plans and their exercises
 * 
 * @return array Training plans
 */
 	public function findPlans() {
 		return $this->find('all', array(
 			'order' => 'TrainingPlan.id ASC',
 			'contain' => array('ExercisesTrainingPlan' => 'Exercise')
 		));
 	}
}
