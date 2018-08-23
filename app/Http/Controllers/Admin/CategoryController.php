<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
    	$rules = [
            'name' => 'required'
        ];

        $messages = [
            'name.required' => 'Es necesario ingresar el nombre de la categoría'
        ];

        $this->validate($request,$rules,$messages);
        Category::create($request->all());
        return back();
    }

    public function update(Request $request)
    {
    	$rules = [
            'name' => 'required'
        ];

        $messages = [
            'name.required' => 'Es necesario ingresar el nombre de la categoría'
        ];

        $this->validate($request,$rules,$messages);
        $category_id = $request->input('category_id');
        $category = Category::find($category_id);
        $category->name = $request->input('name');
        $category->save();
        return back();
    }

    public function delete($id)
    {
    	Category::find($id)->delete();
    	return back();
    }
}
