<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.program',
		'app.exercise'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

	public function testFindUserDaily() {
		$result = $this->User->findUserDaily('2012-07-25', 1);

		$expectedUser = array(0 => 1);
		$this->assertEqual(Set::extract('/User/id', $result), $expectedUser, "User is present");

		$expectedPrograms = array(0 => 1, 1 => 2);
		$this->assertEqual(Set::extract('/Program/id', $result), $expectedPrograms, "Programs are present");

		$expectedExercises = array(0 => 1, 1 => 2);
		$this->assertEqual(Set::extract('/Program/Exercise/id', $result), $expectedExercises, "Exercises are present");
	}
}
