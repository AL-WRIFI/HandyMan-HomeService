<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Handyman;
use App\Models\City;
use App\Models\Zone;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HandymanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provider = new Handyman;
        $providers=$provider->all();
        $top_cards = [];
        $top_cards['total_providers'] = $provider->where(['accepted' => 1])->count();
        $top_cards['total_notaccepted_providers'] =$provider->where(['accepted' => 0])->count();
        $top_cards['total_active_providers'] = $provider->where(['status' => 1])->count();
        $top_cards['total_inactive_providers'] = $provider->where(['status' => 0])->count();
        
        return view('admin.Provider.index', compact('providers','top_cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $zones = Zone::all();
        $categories = Category::all();
        return view('admin.Provider.create', compact('categories','cities','zones'));
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
         'name' => ['required', 'string', 'max:255'],
         'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Handyman::class],
         'password' => ['required', Rules\Password::defaults()],
         'phone'=>['required','unique:'.Handyman::class],
         'confirm_password' => 'required|same:password',
         'image'=>'required',
         'city_id'=>'required',
         'zone_id'=>'required',
         'address_note'=>'required',
         'category_id'=>'required',
         'description'=>'required'
        ]);
        
        $image = $this->uploadImgae($request);
        Handyman::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password'=>Hash::make($request->password),
            'image' => $image,
            'category_id'=>$request->category_id,
            'city_id'=> $request->city_id,
            'zone_id'=>$request->zone_id,
            'address_note'=>$request->address_note,
            'description'=>$request->description,
        ]);
        // event(new Registered($user));

        return redirect()->route('handymans.index')
            ->with('success', 'Create Provider Successflly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Handyman $handyman)
    {
        $cities = City::all();
        $zones = Zone::all();
        $categories = Category::all();
        return view('admin.Provider.edit', compact('handyman','categories','cities','zones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $provider= Handyman::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Handyman::class],
            'password' => ['required'],
            'phone'=>['required','unique:'.Handyman::class],
            'confirm_password' => 'required|same:password',
            'image'=>'required',
            'city_id'=>'required',
            'zone_id'=>'required',
            'address_note'=>'required',
            'category_id'=>'required',
            'description'=>'required'
           ]);
        $old_image = $provider->image;
        $new_image = $this->uploadImgae($request);
        if($new_image){
            $image = $new_image;
        }
        Handyman::where('id',$id)->update([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'image' => $image,
            'category_id'=>$request->category_id,
            'city_id'=> $request->city_id,
            'zone_id'=>$request->zone_id,
            'address_note'=>$request->address_note,
            'description'=>$request->description,
        ]);

        dd(error());
        // $provider->update([
        //     'name'=> $request->name,
        //     'phone'=> $request->phone,
        //     'email'=> $request->email,
        //     'password'=>Hash::make($request->password),
        //     'image' => $image,
        //     'category_id'=>$request->category_id,
        //     'city_id'=> $request->city_id,
        //     'zone_id'=>$request->zone_id,
        //     'address_note'=>$request->address_note,
        //     'description'=>$request->description,
        // ]);
        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        } 
        return redirect()->route('handymans.index')
           ->with('success', 'Update Provider Successflly');
    }
    public function status_update($id): JsonResponse
    {
        $provider = new Provider;
        $provider->where('id', $id)->first();
        dd($provider);
        $provider->where('id', $id)->update(['status' => !$provider->status]);
        return response()->json(DEFAULT_STATUS_UPDATE_200, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Handyman $provider)
    {
        $provider->delete();
        if ($provider->image) {
            Storage::disk('public')->delete($provider->image);
        }
        return redirect()->route('handymans.index')
            ->with('success', 'Delete Provider Successflly');
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

