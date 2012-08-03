<?php
class AddingIndexProgramsEffetiveDate extends CakeMigration {

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
			'alter_field' => array(
				'programs' => array(
					'effective_date' => array('type' => 'date', 'null' => false, 'default' => NULL, 'key' => 'index'),
				),
			),
			'create_field' => array(
				'programs' => array(
					'indexes' => array(
						'effective_date' => array('column' => 'effective_date', 'unique' => 0),
					),
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'programs' => array(
					'effective_date' => array('type' => 'date', 'null' => false, 'default' => NULL),
				),
			),
			'drop_field' => array(
				'programs' => array('', 'indexes' => array('effective_date')),
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
