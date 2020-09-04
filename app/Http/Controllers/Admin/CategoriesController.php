<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index')
        ->with('categories', Category::orderBy('updated_at')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store category
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        if(request()->has('image'))
        {
            $image = $request->image->store('categoryImage');
        }

        $data = Category::create([
            'name' => strtolower($request->name),
            'slug' => str_slug($request->name),
            'image' => $image,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $data->save();

        session()->flash('success', 'Category Created Successfully');
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.create', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //update category
        $this->validate($request, [
            'name' => 'required',
            // 'image' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        if($request->has('image'))
        {
            if(($category->image == 'categoryImage/g1.jpg') || ($category->image == 'categoryImage/g2.jpg') || ($category->image == 'categoryImage/g3.jpg'))
            {
                $image = $request->image->store('categoryImage');
            }
            else
            {
                $image = $request->image->store('categoryImage');
                $category->deleteImage();
            }
        }
        else
        {
            $image = $category->image;
        }

        $category->update([
            'name' => strtolower($request->name),
            'slug' => str_slug($request->name),
            'image' => $image,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        session()->flash('success', 'Category Updated Successfully');
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {   
        //if category count is greater than 0 prevent delete
        if($category->courses->count() > 0)
        {
            session()->flash('warning', 'Category Cannot be Deleted Because It is Associated with some Courses!!!');
            return redirect()->back();
        }
        //else if category count is equal to 0 then you can delete category
        else
        {
            if($category->image == (('categoryImage/g1.jpg') || ('categoryImage/g2.jpg') || ('categoryImage/g3.jpg')) )
            {
                
                $category->delete();
                session()->flash('success', 'Category Deleted Successfully');
                return redirect()->back();
                
            }
            else
            {
                $category->delete();
                $category->deleteImage();

                session()->flash('success', 'Category Deleted Successfully');
                return redirect()->back();
            }
        }
    }
}
