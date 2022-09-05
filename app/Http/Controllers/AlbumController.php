<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(){
        $albums = Album::get();
        return view('album.index' , compact('albums'));
    }

    public function create(){

        return view('album.create' );
    }

    public function store(AlbumRequest $request){
        $data = $request->all();
        Album::create($data);
        return redirect()->route('album.index');
    }

    public function edit($id){
        $album = Album::findOrfail($id);
        return view('album.edit' , compact('album'));
    }

    public function update(AlbumRequest $request , $id){
        $data = $request->all();
        $album = Album::findOrfail($id);
        $album->update($data);
        return redirect()->route('album.index');
    }

    public function destroy($id){
        $album = Album::findOrfail($id);
        $album->delete();
        return redirect()->route('album.index');
    }

    public function deleteAll($id){
        Image::where('album_id','=',$id)->delete();
        return redirect()->back();
    }


    public function move($id){
        $albums = Album::get();
        $image = Image::where('album_id','=',$id)->first();
        return view('image.move',compact('image','albums'));
    }

    public function moveTo(Request $request){

        $oldAlbum = $request->old_album;
        $newAlbum = $request->new_album;
        Image::where('album_id','=',$oldAlbum)->update([
            'album_id'=>$newAlbum
        ]);
        return redirect()->route('album.index');
    }
}
