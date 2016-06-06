<?php

namespace App\Helpers;

class Notify{

	public static function alert($message, $level = 'general'){
		session()->flash('alert', ['level' => $level, 'message' => $message]);
	}

}

?>