<?php
App::uses('ExercisesTrainingPlan', 'Model');

/**
 * ExercisesTrainingPlan Test Case
 *
 */
class ExercisesTrainingPlanTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.exercises_training_plan'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ExercisesTrainingPlan = ClassRegistry::init('ExercisesTrainingPlan');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ExercisesTrainingPlan);

		parent::tearDown();
	}

}
