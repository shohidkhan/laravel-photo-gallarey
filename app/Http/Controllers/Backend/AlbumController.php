<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    //
    public function index(){
        $albums=DB::table("albums")->get();
        return view("pages.backend.gallarey.album.index",compact("albums"));
    }
    public function create(){
        return view("pages.backend.gallarey.album.create");
    }
    public function store(Request $request){
        //validation
        $request->validate([
           "album_name"=>"required|max:50|string",
           "album_description"=>"nullable|string|max:255",
           "album_photo"=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:10000",
        ]);
        // dd($request->all());
        //Photo Processiong
        if($request->hasFile("album_photo")){
            $image=$request->file("album_photo");
            $fileNameToStore="ablbum_image".md5(uniqid()).time().".".$image->getClientOriginalExtension();
            $image->move(public_path("assets/backend/uploads/gallarey/albums"),$fileNameToStore);
        }
        //Data Store
        DB::table("albums")->insert([
            "album_name"=>$request->album_name,
            "album_description"=>$request->album_description,
            "album_photo"=>"assets/backend/uploads/gallarey/albums/".$fileNameToStore,
        ]);

        return redirect()->back()->with("success","Album Created Successfully");
    }

    public function show($id){
        $album=DB::table("albums")->where("id",$id)->first();
        $albums=DB::table("albums")
                    ->leftJoin("photos","albums.id","=","photos.album_id")
                    ->where("album_id",$id)
                    ->get();
        return view("pages.backend.gallarey.photo.index",compact("album","albums"));
    }

    public function destroy($id){
        $album=DB::table("albums")->where("id",$id)->first();
        $removed_file=unlink(public_path($album->album_photo));
        if($removed_file){
            $photos=DB::table("photos")->where("album_id",$id)->get();
            foreach ($photos as $photo) {
                # code...
                unlink(public_path($photo->photo_thumbnail));
            }
            DB::table("albums")->where("id",$id)->delete();
            return redirect()->back()->with("success","Album Deleted Successfully");
        }
        return redirect()->back()->with("error","Album Not Deleted Successfully");
    }
}
