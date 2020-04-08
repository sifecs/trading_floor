<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kalnoy\Nestedset\NodeTrait;
class CategoriesController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.categories.index', ['categorie'=>$categories]);
    }

    public  function create () {
        $categories =  Category:: all()-> toFlatTree();
        $parentCategory = ['null' => ''];
        foreach($categories as $category){
            if ($category-> isRoot()){
                $parentCategory[$category->id] = $category->title;
            }
        }
        return view('admin.categories.create',['categories' => $categories, 'parentCategory'=> $parentCategory ]);
    }

    public function store (Request $request) {
//        dd($request->ajax());
        $this->validate($request,[
            'title' =>'required',
        ]);

        $parent_id = Category::find($request->get('parent_id'));
        if ($request->get('parent_id') == 'null') {
            $all = $request->all();
            unset($all['parent_id']);
        } else {
            $all = $request->all();
        }
        $category = Category::create($all, $parent_id);
        return redirect()->route('categories.index');
    }

    public  function edit($id) {
        $category = Category::find($id);
        return view('admin.categories.edit', ['category'=>$category]);
    }

    public  function update(Request $request, $id) {
        $this->validate($request,[
            'title' =>'required',
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy($id) {
        Category::find($id)->delete();
        return redirect()->route('categories.index');
    }
    use NodeTrait;
}
