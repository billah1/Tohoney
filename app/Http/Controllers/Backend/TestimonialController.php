<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use App\Http\Requests\testimonialStoreRequest;
use App\Http\Requests\testimonialUpdateRequest;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials =Testimonial::latest('id')->select(['id','client_name','client_name_slug','client_designation','client_message','client_image','updated_at'])->paginate(5);
        // return $testimonials;
        return view('Backend.pages.Testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.Testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(testimonialStoreRequest $request)
    {
        // dd($request->all());
        $testimonial = Testimonial::create([
            'client_name' =>$request->client_name,
            'client_name_slug'=>Str::slug($request->client_name),
            'client_designation' =>$request->client_designation,
            'client_message' =>$request->client_message,
        ]);
        $this->image_upload($request,$testimonial->id);
        Toastr::success('Datas Stored Successfully!');
        return redirect()->route('testimonial.index');
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
    public function edit($client_name_slug)
    {
        $testimonial = Testimonial::whereClientSlug($client_name_slug)->first();
        return view('Backend.pages.Category.edit',compact('testimonial'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(testimonialUpdateRequest $request, $client_name_slug)
    {
        $testimonial = Testimonial::whereSlug($client_name_slug)->first();
        $testimonial->update([
            'client_name' =>$request->client_name,
            'client_name_slug'=>Str::slug($request->client_name),
            'client_designation' =>$request->client_designation,
            'client_message' =>$request->client_message,
        ]);
        $this->image_upload($request,$testimonial->id);
        Toastr::success('Data Updated Syccessfullt');
        return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($client_name_slug)
    {
        $testimonial = Testimonial::whereSlug($client_name_slug)->first()->delete();
        Toastr::success('Data Deleted Syccessfullt');
        return redirect()->route('testimonial.index');
    }

    public function image_upload($request, $item_id){

        $testimonial = Testimonial::findorfail($item_id);

        if($request->hasfile('client_image')){

            if($testimonial->client_image != 'default-client.jpg'){

                $photo_location = 'public/Uploads/testmonials/';
                $old_photo_location =$photo_location . $testimonial->client_image;
                unlink(base_path($old_photo_location));
            }
            $photo_location = 'public/Uploads/testmonials/';
            $uploaded_photo = $request->file('client_image');
            $new_photo_name =$testimonial->id.'.'.
            $uploaded_photo ->getClientOriginalExtension();
            $new_photo_location = $photo_location .$new_photo_name;
            Image::make($uploaded_photo)->resize(105,105)->save(base_path($new_photo_location),40);
            $check = $testimonial->update([
                'client_image' =>$new_photo_name,
            ]);
        }
    }
}
