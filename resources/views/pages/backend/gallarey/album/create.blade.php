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
                        <span>Create Album</span>
                        <a href="{{ route("admin.albums.index") }}" class="btn btn-primary btn-sm">All Albums</a>
                    </h4>
                    <div class="card-body">
                        <form action="{{ route("admin.album.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="title">Album Title</label>
                                <input type="text" id="title" placeholder="Album Title" class="form-control" name="album_name" value="{{ old("album_name") }}">
                                @error("album_name")
                                    <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="description">Album Description</label>
                                <textarea type="text" rows="3" cols="3" id="description" placeholder="Album Description" class="form-control" name="album_description" value="{{ old("album_description") }}"></textarea>
                                @error("album_description")
                                    <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="photo">Album Photo</label>
                                <input type="file" id="photo" class="form-control" name="album_photo">
                                @error("album_photo")
                                    <span class="text-danger">{{ $message  }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn mt-3 btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection