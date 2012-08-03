<?php
/**
 * ProgramFixture
 *
 */
class ProgramFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'exercise_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'effective_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'sets' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'reps' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => null),
		'break' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'exercise_id' => 1,
			'user_id' => 1,
			'effective_date' => '2012-07-25',
			'sets' => 4,
			'reps' => 15,
			'weight' => null,
			'break' => null,
			'created' => '2012-07-25 01:38:52'
		),
		array(
			'id' => 2,
			'exercise_id' => 2,
			'user_id' => 1,
			'effective_date' => '2012-07-25',
			'sets' => 4,
			'reps' => 10,
			'weight' => 85,
			'break' => 360,
			'created' => '2012-07-24 01:38:52'
		),
		array(
			'id' => 3,
			'exercise_id' => 2,
			'user_id' => 1,
			'effective_date' => '2012-07-22',
			'sets' => 4,
			'reps' => 10,
			'weight' => 90,
			'break' => null,
			'created' => '2012-07-25 01:38:52'
		),
	);

}
