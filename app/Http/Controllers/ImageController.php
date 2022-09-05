<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Support\Str;


class ImageController extends Controller
{
    public function index($id){

        $images =Image::where('album_id','=',$id)->get();
        return view('image.index',compact('images'));

    }

    public function create(){
        $albums = Album::get();

        return view('image.create' , compact('albums'));
    }

    public function store(ImageRequest $request){

        $file = $request->file('image');
        $filename=  Str::random(40).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images/') , $filename);
        $requestArray =  ['image' => $filename]+$request->all();
       $image = Image::create($requestArray);

        return redirect()->route('image.index',$image->album_id);

    }

    public function edit($id){
        $albums = Album::get();
        $image = Image::find($id);
        return view('image.edit' , compact('albums' , 'image'));
    }

    public function update(ImageRequest $request , $id){

        $requestArray = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $requestArray = ['image' => $filename] + $request->all();
        }
        $row = Image::findOrfail($id);
        $row->update($requestArray);
        return redirect()->route('image.index',$row->album_id);
    }

    public function destroy($id){
        $row = Image::find($id);
        unlink('images/'.$row->image);
        $row->delete();
        return redirect()->route('image.index');

    }

}
