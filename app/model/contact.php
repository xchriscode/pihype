<?php
class Contact extends AppModel
{
	function send()
	{
		$post = post::all();

		$login = db::get();
		return $post->fullname;
	}
}