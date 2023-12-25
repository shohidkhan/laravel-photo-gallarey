@extends('layouts.app')
@section("content")
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="">
                    <h4 class="card-header d-flex align-items-center justify-content-between">
                        <span>Albums</span>
                       <div>
                        <a href="{{ route("admin.albums.index") }}" class="btn btn-primary btn-sm">Back</a>
                        <a href="{{ route("admin.photo.create",["album_id"=>$album->id]) }}" class="btn btn-primary btn-sm">Add Photo</a>
                       </div>
                    </h4> 
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($albums as $album_photo)
                        <div class="col-lg-4">
                            <div class="card" >
                                <img src="{{ asset($album_photo->photo_thumbnail) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $album_photo->photo_name }}</h5>
                                  <p class="card-text">{{ $album_photo->album_description }}</p>
                                  <div class="d-flex justify-content-between">
                                    <form action="{{ route("admin.photo.delete",$album_photo->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete Photo</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div> 
          </div>
        </div>
      </div>
      <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @include('components.footer')
  </div>
@endsection
