<?php
namespace content_m\group\edit;


class model
{
	public static function post()
	{
		$post =
		[
			'title'           => \dash\request::post('title'),
			'status'          => \dash\request::post('status'),
			'desc'            => \dash\request::post('desc'),
			'sort'            => \dash\request::post('sort'),
		];

		$file = \dash\app\file::upload_quick('file1');

		if($file)
		{
			$post['file'] = $file;
		}

		\lib\app\learngroup::edit($post, \dash\request::get('id'));

		if(\dash\engine\process::status())
		{
			\dash\redirect::to(\dash\url::this());
			// \dash\redirect::pwd();
		}

	}
}
?>