<?php
App::uses('AppHelper', 'View/Helper');

/**
 * TimePaginator Helper
 *
 * Format dates and generates buttons for previous and next day
 */
class TimePaginatorHelper extends AppHelper {
/**
 * Helpers required
 * 
 * @var array
 */
	public $helpers = array('Html');

/**
 * URL date pattern, date() compatible
 * 
 * @var string
 */
	public $urlPattern = 'Y-m-d';

/**
 * Display pattern, strftime() compatible
 * 
 * @var string
 */
	public $displayPattern = '%A %d %B %Y';

/**
 * Display a date
 * 
 * @param  string $date Y-m-d date
 * @return "today", "yesterday", "tomorrow" or classic date
 */
	public function formatDate($date) {
		switch ($date) {
			case date($this->urlPattern):
				$output = "aujourd'hui";
				break;
			case date($this->urlPattern, strtotime('-1 day')):
				$output = "hier";
				break;
			case date($this->urlPattern, strtotime('+1 day')):
				$output = "demain";
				break;
			default:
				$output = strftime($this->displayPattern, strtotime($date));

		}

		return $output;
	}

/**
 * Display a link to the day after $currentDate
 * 
 * @param  string $currentDate Y-m-d current date
 * @return string Link to the day after $currentDate
 */
	public function next($currentDate) {
		$nextDay = date($this->urlPattern, strtotime($currentDate . ' +1 day'));
		$label = ucfirst($this->formatDate($nextDay)) . " &rarr;";
		return $this->Html->link($label, array($nextDay), array('escape' => false));
	}

/**
 * Display a link to the day before $currentDate
 * 
 * @param  string $currentDate Y-m-d current date
 * @return string Link to the day before $currentDate
 */
	public function previous($currentDate) {
		$previousDay = date($this->urlPattern, strtotime($currentDate . ' -1 day'));
		$label = "&larr; " . ucfirst($this->formatDate($previousDay));
		return $this->Html->link($label, array($previousDay), array('escape' => false));
	}
}