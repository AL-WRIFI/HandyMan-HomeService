<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $service = Service::filter($request->query())
        ->with('Category:id,name')
        ->paginate();

        return Response::json($service);
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
            'category_id'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);
        $service = Service::create($request->all());
        return response()->json([$service,
            'message'=>'Service Createed Successflly'
        ], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Service::with('Category:id,name')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'sometimes|required',
            'category_id'=>'sometimes|required',
            'description'=>'sometimes|required',
            'price'=>'sometimes|required'
        ]);
        $service = Service::where('id',$id)
        ->update($request->all());
        
        return response()->json([
            'message'=>'Service Updated Successflly'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::destroy($id);
        return response()->json([
            'message'=>'Service Deleted Successflly'
        ], 201);
    }
}
