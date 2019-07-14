<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FamilyGallery;
class familyImages extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = FamilyGallery::get();
        //dd($images);
        return view('family.family_image',compact('images'));
    }

    public function upload(Request $request)
    {
    	$this->validate($request, [    		
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['family_image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['family_image']);


        
        FamilyGallery::create($input);


    	return back()
    		->with('success','Image Uploaded successfully.');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	FamilyGallery::find($id)->delete();
    	return back()
    		->with('success','Image removed successfully.');	
    }
}
