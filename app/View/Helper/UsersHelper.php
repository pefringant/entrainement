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
	public $helpers = array('Html', 'TB');

/**
 * Return User photo <img>
 * 
 * @param  array $user User record
 * @param  string $size Photo size
 * @return <img> for User photo
 */
	public function photo($user, $size = '') {
		$default = false;

		if ($size == 'tiny') {
			$default = $this->Html->tag('div', $this->TB->icon('user', 'white'), array(
				'class' => 'user-photo-default'
			));
			$default = $this->wrap($default);
		}

		if (!isset($user['User']['photo']) || !isset($user['User']['photo_dir'])) {
			return $default;
		}

		if ($size) {
			$file = $size . '_' . $user['User']['photo'];
		} else {
			$file = $user['User']['photo'];
		}

		$path = 'files/user/photo/'.$user['User']['photo_dir'].'/'.$file;

		if (!is_file($path)) {
			return $default;
		}

		return $this->wrap($this->Html->image('/'.$path));
	}

	private function wrap($img) {
		return $this->Html->tag('div', $img, array('class' => 'user-photo'));
	}
}