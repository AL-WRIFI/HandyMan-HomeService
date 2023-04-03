<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
    public function index()
    {
        $request = request();
        $request->validate([
            'status' => 'in:active,inactive,all',
        ]);
        $search= $request->has('search') ? $request['search'] :'';
        $status = $request->has('status') ? $request['status'] : 'all';
        $query_param = ['search' => $search, 'status' => $status];

        $categories = Category::withCount('services')->when( $request->has('search') , function ($query) use ($request){
            $keys = explode(' ', $request['search']);
            foreach($keys as $key){
                $query->orWhere('name', 'LIKE', '%' . $key . '%');

            }
        })
        ->when( $status !='all', function($query) use ($request){
            if ($request['status'] == 'active') {
                return $query->where(['status' => 1]);
            } else {
                return $query->where(['status' => 0]);
            }
           //$query->ofStatus( $status == 'active' ? 1 : 0 );
        })->paginate(10)->appends($query_param);

        return view('admin.Category.list', compact('categories','search','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Category.create');
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
            'name'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);

        $data =$request->except('image');
        $data['image'] = $this->uploadImgae($request);

        Category::create($data);
        return redirect()->route('categories.index')
        ->with('success', 'Create Category Successflly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);

        $data = $request->except('image'); 

        $old_image = $category->image;
        $new_image = $this->uploadImgae($request);

        if($new_image){
            $data['image'] = $new_image;
        }

  
        // Category::update([
        //     'name' => $request->name,
        // ])->where('id', $this->$category->id);
        $category->update($data);

        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('categories.index')
        ->with('success', 'Update Category Successflly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();


        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        return redirect()->route('categories.index')->with('success','Delete Category Successflly');
    }

    protected function uploadImgae(Request $request){
     
        if(!$request->hasFile('image')){
            return;
        }
        $file =$request->file('image');

        $path = $file->store('uploads', [
            'disk' => 'public'
        ]);
        return $path;
    }
}
