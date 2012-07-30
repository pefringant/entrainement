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
				'message' => "Vous devez renseigner le nom complet de l'exercice",
			),
		),
	);
}
