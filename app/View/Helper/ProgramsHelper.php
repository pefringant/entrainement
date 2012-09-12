<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Programs Helper
 */
class ProgramsHelper extends AppHelper {
/**
 * Possible break times for form select
 * @var array (nb of seconds => human readable break time)
 */
	public $breakOptions = array(
		'0' => "0",
		'30' => "30 sec",
		'60' => "1 min",
		'90' => "1 min 30",
		'120' => "2 min",
		'180' => "3 min",
		'240' => "4 min",
		'300' => "5 min",
		'360' => "6 min",
		'420' => "7 min",
		'480' => "8 min",
		'540' => "9 min",
		'600' => "10 min",
		'660' => "11 min",
		'720' => "12 min",
		'780' => "13 min",
		'840' => "14 min",
		'900' => "15 min",
	);

/**
 * Display break time
 * 
 * @param  mixed $break Break time (0, null or number of seconds)
 * @return string Human readable break time
 */
	public function breakTime($break) {
		if (is_null($break)) {
			return "&nbsp;";
		}

		if (isset($this->breakOptions[$break])) {
			return $this->breakOptions[$break];
		}

		if ($break < 60) {
			return $break . " sec";
		}

		return ($break / 60) . " min";
	}
}