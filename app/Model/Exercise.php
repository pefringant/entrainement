<?php
App::uses('AppModel', 'Model');
/**
 * Exercise Model
 *
 */
class Exercise extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'short_name';

/**
 * beforeSave callback : populate short_name with full_name if empty
 *
 * @param array Options
 * @return boolean True
 */
	public function beforeSave($options = array()) {
		parent::beforeSave($options);

		if (empty($this->data[$this->alias]['short_name'])) {
			$this->data[$this->alias]['short_name'] = $this->data[$this->alias]['full_name'];
		}

		return true;
	}

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'full_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'required' => true,
				'allowEmpty' => false,
				'message' => "Vous devez renseigner le nom complet de l'exercice.",
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => "Cet exercice existe déjà.",
			),
		),
	);
}
