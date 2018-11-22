<?php

namespace App\Modules\Blog\Application\Controllers;

use App\Modules\Blog\Domain\Category;
use App\Modules\Blog\Domain\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ApiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
	    $categories = Category::public()->get();
	    foreach($categories as $category) {
	    	$category->makeHidden('public');
	    }
	    return $categories;
    }

	/**
	 * Display the specified resource.
	 *
	 * @param $slug
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function show($slug)
    {
    	if($slug == 'all') {
    		return redirect(route('blog.api.categories.index'));
	    }
	    $category = Category::where('slug', '=', $slug)->public()->get()->first();
	    if(!$category) {
		    return response()->json([ 'error' => 404, 'message' => 'Not found']);
	    }
        return $category->makeHidden('public');
    }
}
