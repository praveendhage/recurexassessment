<?php
App::uses('FoodItem', 'Model');

/**
 * FoodItem Test Case
 */
class FoodItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.food_item',
		'app.admin',
		'app.order_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FoodItem = ClassRegistry::init('FoodItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FoodItem);

		parent::tearDown();
	}

}
