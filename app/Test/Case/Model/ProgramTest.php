<?php
App::uses('Program', 'Model');

/**
 * Program Test Case
 *
 */
class ProgramTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.program',
		'app.exercise',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Program = ClassRegistry::init('Program');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Program);

		parent::tearDown();
	}

}
