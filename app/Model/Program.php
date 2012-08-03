<?php
App::uses('AppModel', 'Model');
/**
 * Program Model
 *
 * @property Exercise $Exercise
 * @property User $User
 */
class Program extends AppModel {
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
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => "Vous devez choisir un athlète."
			),
		),
		'effective_date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Exercise',
		'User',
	);

/**
 * List programs of one user
 * 
 * @param  int $user_id User Id
 * @param  array Additionnal conditions
 * @return array User's programs
 */
	public function findUserPrograms($user_id, $conditions = array()) {
		$conditions = array_merge(array(
			'Program.user_id' => $user_id,
		), $conditions);

		return $this->find('all', array(
			'conditions' => $conditions,
			'order' => 'Program.effective_date ASC',
			'contain' => array(
				'Exercise',
			),
		));
	}
}
