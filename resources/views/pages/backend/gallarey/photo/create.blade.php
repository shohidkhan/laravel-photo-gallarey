@extends('layouts.app')
@section("content")
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @if(session("success"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{ session("success") }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <div class="card">
                    <h4 class="card-header d-flex justify-content-between ">
                        <span>Add Photo</span>
                        <a href="{{route("admin.album.show",request("album_id"))}}" class="btn btn-primary btn-sm">Back</a>
                    </h4>
                    <div class="card-body">
                        <form action="{{ route("admin.photo.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="album_id" value="{{ request("album_id") }}">
                            <div class="form-group mt-2">
                                <label for="title">Photo Title</label>
                                <input type="text" id="title" placeholder="Photo Title" class="form-control" name="photo_name" value="{{ old("photo_name") }}">
                                @error("photo_name")
                                    <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="description">Photo Description</label>
                                <textarea type="text" rows="3" cols="3" id="description" placeholder="Photo Description" class="form-control" name="photo_description" value="{{ old("photo_description") }}"></textarea>
                                @error("photo_description")
                                    <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="photo"> Photo Thumbnail</label>
                                <input type="file" id="photo" class="form-control" name="photo_thumbnail">
                                @error("photo_thumbnail")
                                    <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn mt-3 btn-primary">Add Photo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection