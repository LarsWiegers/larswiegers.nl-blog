<?php

namespace App\Modules\Blog\Domain\ViewComposers;

use App\Modules\Blog\Domain\Category;
use App\Modules\Blog\Domain\Post;
use Illuminate\View\View;

class PostComposer
{

	/**
	 * Create a new profile composer.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$categories = Category::all();
		$posts = Post::getLatest(15);

		$view->with('posts', $posts);
		$view->with('categories', $categories);
	}
}