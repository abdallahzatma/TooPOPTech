<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate();

        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::all();

        return view('dashboard.categories.create',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
'name' => 'required',
'image'=> 'required',


        ]);
        $data = $request->except('image');
if($request->hasFile('image')){
   $file = $request->file('image');

    $path= $file->store('',[
        'disk' => 'uploads'
]);

    $data['image']= $path;
}
Category::create($data);
return redirect()->route('dashboard.categories.index')->with('success','insert done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $id = $category->id;
        $parents = Category::where('id', '<>', $category->id)
        ->where(function($query) use ($id) {
            $query->whereNull('parent_id')
                  ->orWhere('parent_id', '<>', $id);
        });
        return view('dashboard.categories.edit',compact('category','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => 'required',



                    ]);
                    $data = $request->except('image');
                    $old_image = $category->image;
                    if($request->hasFile('image')){
                        $file = $request->file('image');

                         $path= $file->store('',[
                             'disk' => 'uploads'
                     ]);
                     if($old_image){
                        Storage::disk('uploads')->delete($old_image);


                                }
                         $data['image']= $path;
                     }else{
                        $data['image']= $old_image;

                     }

                     $category->update($data);
                     return redirect()->route('dashboard.categories.index')->with('success','Update done!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->image){
Storage::disk('uploads')->delete($category->image);


        }
        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success','Delete done!');

    }
}