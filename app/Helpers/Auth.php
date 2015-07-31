<?php

namespace Helpers;

use Helpers\Session;
use Helpers\Url;

class Auth
{
	public static function only($level)
	{
		$sessionLogin = Session::get('loggedin');
		$sessionLevel = Session::get('level');
		if (!$sessionLogin or $sessionLevel !== $level)
			Url::redirect(DIR, true);
	}

	public static function any()
	{
		$sessionLogin = Session::get('loggedin');
		if (!$sessionLogin)
			Url::redirect(DIR, true);
	}

	public static function none($level)
	{
		$sessionLogin = Session::get('loggedin');
		if ($sessionLogin)
		{
			if ($level == 'student')
				Url::redirect(DIR, true);
			else Url::redirect(DIR . 'teacher', true);
		}
	}
}