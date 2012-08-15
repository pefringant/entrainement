<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
/**
 * Display field
 * @var string
 */
	public $displayField = 'short_name';

	public $virtualFields = array(
		'full_name' => 'CONCAT(User.first_name, " ", User.last_name)',
	);

/**
 * hasMany associations
 * @var array
 */
	public $hasMany = array(
		'Program',
	);

/**
 * Behaviors
 * @var array
 */
	public $actsAs = array(
		'Upload.Upload' => array(
			'photo' => array(
				 'fields' => array(
					'dir' => 'photo_dir'
				),
				'thumbnailSizes' => array(
					'large' => '1024x768',
					'medium' => '640x480',
					'thumb' => '80x80',
					'tiny' => '24x24'
				),
				'thumbnailMethod' => 'php',
			),
		),
	);

/**
 * List of all users who have at least one program on $date
 * 
 * @param  string $date Date
 * @return array Users with programs that day
 */
	public function findDaily($date) {
		$users = $this->find('all', array(
			'fields' => array(
				'User.id',
			),
			'recursive' => -1,
			'joins' => array(
				array(
					'table' => 'programs',
					'alias' => 'Program',
					'type' => 'INNER',
					'conditions' => array(
						'Program.effective_date' => $date,
						'Program.user_id = User.id',
					),
				),
			),
			'group' => 'User.id',
		));

		if (empty($users)) {
			return false;
		}

		$users_ids = Set::extract('/User/id', $users);

		$results = $this->find('all', array(
			'conditions' => array(
				'User.id' => $users_ids,
			),
			'contain' => array(
				'Program' => array(
					'conditions' => array(
						'Program.effective_date' => $date,
					),
					'order' => 'Program.id ASC',
					'Exercise',
				),
			),
			'order' => 'User.short_name',
		));

		return $results;
	}

/**
 * Find one user and his program on one date
 * 
 * @param  string $date Date
 * @param  int $user_id User id
 * @return array User and his programs that day
 */
	public function findUserDaily($date, $user_id) {
		return $this->find('first', array(
			'conditions' => array(
				'User.id' => $user_id,
			),
			'contain' => array(
				'Program' => array(
					'conditions' => array(
						'Program.effective_date' => $date,
					),
					'order' => 'Program.id ASC',
					'Exercise',
				),
			),
		));
	}

/**
 * Return the list of user names for quick search form and Twitter Bootstrap Typeahead input
 * 
 * @return array Users list ready for bootstrap-typeahead.js
 */
	public function findTypeaheadSource() {
		$data = $this->find('all', array(
			'fields' => array('first_name', 'last_name', 'short_name'),
			'recursive' => -1,
		));

		if (empty($data)) {
			return false;
		}

		$results = array();
		foreach ($data as $row) {
			$name = $row['User']['first_name']." ".$row['User']['last_name'];
			if (!empty($row['User']['short_name'])) {
				$name .= ' ('.$row['User']['short_name'].')';
			}
			$results[] = '"'.$name.'"';
		}

		return '['.join(',', $results).']';
	}

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		/*'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => true,
				'message' => "Vous devez renseigner le login",
			),
		),
		'password' => array(
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
		'first_name' => array(
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
				'allowEmpty' => false,
				'required' => true,
				'message' => "Vous devez renseigner le surnom ou le nom abrégé pour l'affichage",
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => "Ce surnom est déjà donné à quelqu'un d'autre.",
			),
		),
	);
}
