<?php
App::uses('TrainingPlan', 'Model');

/**
 * TrainingPlan Test Case
 *
 */
class TrainingPlanTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.training_plan'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TrainingPlan = ClassRegistry::init('TrainingPlan');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TrainingPlan);

		parent::tearDown();
	}

}
