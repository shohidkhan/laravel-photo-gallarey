<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    //

    public function create(){
        return view("pages.backend.gallarey.photo.create");
    }

    public function store(Request $request){
       
        //validation
        $this->validate($request,[
           "photo_name"=>"required|max:50|string",
           "photo_description"=>"nullable|string|max:255",
           "photo_thumbnail"=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:10000",
        ]);

        //Photo Processiong
        if($request->hasFile("photo_thumbnail")){
            $image=$request->file("photo_thumbnail");
            $fileNameToStore="photo_thumbnail".md5(uniqid()).time().".".$image->getClientOriginalExtension();
            $image->move(public_path("assets/backend/uploads/gallarey/photos"),$fileNameToStore);
        }

        //Data Store
        DB::table("photos")->insert([
            "photo_name"=>$request->photo_name,
            "photo_description"=>$request->photo_description,
            "photo_thumbnail"=>"assets/backend/uploads/gallarey/photos/".$fileNameToStore,
            "album_id"=>$request->album_id
        ]);

        return redirect()->back()->with("success","Photo Added Successfully");
    }

    public function destroy($id){
        $photo=DB::table("photos")->where("id",$id)->first();
        // dd($photo);
        $removed_file=unlink(public_path($photo->photo_thumbnail));
        if($removed_file){
            DB::table("photos")->where("id",$id)->delete();
            return redirect()->back()->with("success","Photo Deleted Successfully");
        }
        return redirect()->back()->with("error","Photo Not Deleted Successfully");
        
    }
}
