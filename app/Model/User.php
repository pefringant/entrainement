<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'short_name';

/**
 * hasMany associations
 * 
 * @var array
 */
	public $hasMany = array(
		'Program'
	);

	public function findDaily($date) {
		$users = $this->find('all', array(
			'fields' => array('User.id'),
			'conditions' => array(
				'Program.effective_date' => $date,
			),
			'joins' => array(
				array(
					'table' => 'programs',
					'alias' => 'Program',
					'type' => 'LEFT',
					'conditions' => array('Program.user_id = User.id'),
				)
			),
			'recursive' => -1
		));

		if (empty($users)) return false;

		$users_ids = array_unique(Set::extract('/User/id', $users));

		$results = $this->find('all', array(
			'conditions' => array(
				'User.id' => $users_ids,
			),
			'contain' => array(
				'Program' => array(
					'conditions' => array('Program.effective_date' => $date),
					'Exercise'
				)
			),
			'order' => 'User.' . $this->displayField,
		));

		return $results;
	}

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => true,
				'message' => "Vous devez renseigner le login",
			),
		),
		/*'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),*/
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'allowEmpty' => true,
				'required' => false,
				'message' => "Vous devez fournir une adresse email valide",
			),
		),
		'fisrt_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => true,
				'required' => false,
				'message' => "Vous devez renseigner le prénom",
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => true,
				'required' => false,
				'message' => "Vous devez renseigner le nom",
			),
		),
		'short_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => true,
				'required' => false,
				'message' => "Vous devez renseigner le nom court ou le surnom pour l'affichage",
			),
		),
	);
}
