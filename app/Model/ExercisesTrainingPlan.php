<?php
App::uses('AppModel', 'Model');
/**
 * ExercisesTrainingPlan Model
 *
 */
class ExercisesTrainingPlan extends AppModel {
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Exercise',
		'TrainingPlan',
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'exercise_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => "Vous devez choisir un exercice."
			),
		),
		'training_plan_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => "Vous devez choisir un programme type."
			),
		),
	);
}
