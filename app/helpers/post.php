<?php
class Post extends AppModel
{
	static function get($var)
	{
		$var = htmlentities(strip_tags(stripslashes($_POST[$var])));
		return $var;
	}

	static function all()
	{
		$new_post = [];

		// now lets loop through
		foreach($_POST as $key => $value)
		{
			$new_post[$key] = htmlentities(strip_tags(stripslashes($value)));
		}

		return (object) $new_post;
	}
}