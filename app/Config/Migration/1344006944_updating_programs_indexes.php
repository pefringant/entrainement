<?php
class UpdatingProgramsIndexes extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'drop_field' => array(
				'programs' => array('', 'indexes' => array('user_id', 'effective_date')),
			),
			'create_field' => array(
				'programs' => array(
					'indexes' => array(
						'date_user' => array('column' => array('effective_date', 'user_id'), 'unique' => 0),
					),
				),
			),
		),
		'down' => array(
			'create_field' => array(
				'programs' => array(
					'indexes' => array(
						'user_id' => array('column' => 'user_id', 'unique' => 0),
						'effective_date' => array('column' => 'effective_date', 'unique' => 0),
					),
				),
			),
			'drop_field' => array(
				'programs' => array('', 'indexes' => array('date_user')),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
