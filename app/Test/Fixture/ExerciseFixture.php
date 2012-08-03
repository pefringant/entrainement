<?php
/**
 * ExerciseFixture
 *
 */
class ExerciseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'full_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'short_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'full_name' => 'Développé couché',
			'short_name' => 'DC',
			'description' => 'Desc DC',
			'created' => '2012-07-25 00:35:24'
		),
		array(
			'id' => 2,
			'full_name' => 'Squat',
			'short_name' => 'Flex',
			'description' => 'Desc Squat',
			'created' => '2012-07-25 00:35:24'
		),
		array(
			'id' => 3,
			'full_name' => 'Soulevé de terre',
			'short_name' => 'SdT',
			'description' => 'Desc SdT',
			'created' => '2012-07-25 00:35:24'
		),
	);

}
