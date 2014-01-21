<?php
/**
 * ReadingFixture
 *
 */
class ReadingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'WBAN' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'YearMonthDay' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 8),
		'Tmax' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'TmaxFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Tmin' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'TminFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Tavg' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'TavgFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Depart' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'DepartFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'DewPoint' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'DewPointFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'WetBulb' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'WetBulbFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Heat' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'HeatFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Cool' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'CoolFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Sunrise' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'SunriseFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Sunset' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'SunsetFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'CodeSum' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 9, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'CodeSumFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Depth' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'DepthFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Water1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Water1Flag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'SnowFall' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '2,1'),
		'SnowFallFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'PrecipTotal' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'PrecipTotalFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'StnPressure' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,2'),
		'StnPressureFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'SeaLevel' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,2'),
		'SeaLevelFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ResultSpeed' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '3,1'),
		'ResultSpeedFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ResultDir' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'ResultDirFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'AvgSpeed' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '3,1'),
		'AvgSpeedFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Max5Speed' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'Max5SpeedFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Max5Dir' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'Max5DirFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Max2Speed' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'Max2SpeedFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Max2Dir' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'Max2DirFlag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'WBAN' => 1,
			'YearMonthDay' => 1,
			'Tmax' => 1,
			'TmaxFlag' => 'Lorem ipsum dolor sit ame',
			'Tmin' => 1,
			'TminFlag' => 'Lorem ipsum dolor sit ame',
			'Tavg' => 1,
			'TavgFlag' => 'Lorem ipsum dolor sit ame',
			'Depart' => 1,
			'DepartFlag' => 'Lorem ipsum dolor sit ame',
			'DewPoint' => 1,
			'DewPointFlag' => 'Lorem ipsum dolor sit ame',
			'WetBulb' => 1,
			'WetBulbFlag' => 'Lorem ipsum dolor sit ame',
			'Heat' => 1,
			'HeatFlag' => 'Lorem ipsum dolor sit ame',
			'Cool' => 1,
			'CoolFlag' => 'Lorem ipsum dolor sit ame',
			'Sunrise' => 1,
			'SunriseFlag' => 'Lorem ipsum dolor sit ame',
			'Sunset' => 1,
			'SunsetFlag' => 'Lorem ipsum dolor sit ame',
			'CodeSum' => 'Lorem i',
			'CodeSumFlag' => 'Lorem ipsum dolor sit ame',
			'Depth' => 'Lorem ipsum dolor sit ame',
			'DepthFlag' => 'Lorem ipsum dolor sit ame',
			'Water1' => 'Lorem ipsum dolor sit ame',
			'Water1Flag' => 'Lorem ipsum dolor sit ame',
			'SnowFall' => 1,
			'SnowFallFlag' => 'Lorem ipsum dolor sit ame',
			'PrecipTotal' => 'L',
			'PrecipTotalFlag' => 'Lorem ipsum dolor sit ame',
			'StnPressure' => 1,
			'StnPressureFlag' => 'Lorem ipsum dolor sit ame',
			'SeaLevel' => 1,
			'SeaLevelFlag' => 'Lorem ipsum dolor sit ame',
			'ResultSpeed' => 1,
			'ResultSpeedFlag' => 'Lorem ipsum dolor sit ame',
			'ResultDir' => 1,
			'ResultDirFlag' => 'Lorem ipsum dolor sit ame',
			'AvgSpeed' => 1,
			'AvgSpeedFlag' => 'Lorem ipsum dolor sit ame',
			'Max5Speed' => 1,
			'Max5SpeedFlag' => 'Lorem ipsum dolor sit ame',
			'Max5Dir' => 1,
			'Max5DirFlag' => 'Lorem ipsum dolor sit ame',
			'Max2Speed' => 1,
			'Max2SpeedFlag' => 'Lorem ipsum dolor sit ame',
			'Max2Dir' => 1,
			'Max2DirFlag' => 'Lorem ipsum dolor sit ame',
			'created' => '2014-01-20 04:28:15',
			'updated' => '2014-01-20 04:28:15'
		),
	);

}
