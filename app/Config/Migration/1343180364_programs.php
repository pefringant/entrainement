<?php
class Programs extends CakeMigration {

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
			'create_table' => array(
				'programs' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
					'exercise_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'after' => 'id'),
					'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index', 'after' => 'exercise_id'),
					'effective_date' => array('type' => 'date', 'null' => false, 'default' => NULL, 'after' => 'user_id'),
					'sets' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'after' => 'effective_date'),
					'reps' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'after' => 'sets'),
					'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'after' => 'reps'),
					'stop' => array('type' => 'boolean', 'null' => true, 'default' => NULL, 'after' => 'weight'),
					'break' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'after' => 'stop'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'after' => 'break'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'user_id' => array('column' => 'user_id', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'programs'
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
