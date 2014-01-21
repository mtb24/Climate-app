<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $readings = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'YearMonthDay' => array('type' => 'date', 'null' => true, 'default' => null),
		'Tmax' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'Tmin' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'Tavg' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

}
