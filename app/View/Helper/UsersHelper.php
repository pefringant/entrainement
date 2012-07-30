<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Users Helper
 */
class UsersHelper extends AppHelper {
/**
 * Other helpers required
 * @var array
 */
	public $helpers = array('Html');

/**
 * Return User photo <img>
 * 
 * @param  array $user User record
 * @param  string $size Photo size
 * @return <img> for User photo
 */
	public function photo($user, $size = '') {
		if (!isset($user['User']['photo']) || !isset($user['User']['photo_dir'])) {
			return false;
		}

		if ($size) {
			$file = $size . '_' . $user['User']['photo'];
		} else {
			$file = $user['User']['photo'];
		}

		$path = 'files/user/photo/'.$user['User']['photo_dir'].'/'.$file;

		if (!is_file($path)) {
			return false;
		}

		return $this->Html->image('/'.$path);
	}
}