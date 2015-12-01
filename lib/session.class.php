<?php

CLass Session {

	protected static $flashMessage;

    public static function setFlash($message)
    {
        self::$flashMessage = $message;
    }

    public static function hasFlash()
    {
    	return !is_null(self::$flashMessage);
    }

    public static function flash()
    {
    	echo self::$flashMessage;
    	self::$flashMessage = null;
    }
}