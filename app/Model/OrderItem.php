<?php
App::uses('AppModel', 'Model');
/**
 * OrderItem Model
 *
 * @property Order $Order
 * @property FoodItem $FoodItem
 */
class OrderItem extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FoodItem' => array(
			'className' => 'FoodItem',
			'foreignKey' => 'food_item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
