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
 * List future programs of one user
 * 
 * @param  int $user_id User Id
 * @return array User's future programs
 */
	public function findFuture($user_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Program.effective_date >= CURDATE()',
				'Program.user_id' => $user_id,
			),
			'order' => 'Program.effective_date ASC, Program.id ASC',
			'contain' => array('Exercise'),
		));
	}

/**
 * List past programs of one user
 * 
 * @param  int $user_id User Id
 * @return array User's past programs
 */
	public function findHistory($user_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Program.effective_date < CURDATE()',
				'Program.user_id' => $user_id,
			),
			'order' => 'Program.effective_date DESC, Program.id ASC',
			'contain' => array('Exercise'),
		));
	}
}
