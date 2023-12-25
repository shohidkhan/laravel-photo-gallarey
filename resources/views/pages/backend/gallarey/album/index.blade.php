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
                        <a href="{{ route("admin.album.create") }}" class="btn btn-primary btn-sm">Create Album</a>
                    </h4>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                      @foreach ($albums as $album )
                        
                     
                        <div class="col-lg-4">
                            <div class="card" >
                                <img src="{{ asset($album->album_photo) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $album->album_name }}</h5>
                                  <p class="card-text">{{ $album->album_description }}</p>

                                  <div class="d-flex justify-content-between">
                                    <a href="{{ route("admin.album.show",$album->id) }}" class="btn btn-primary">View</a>
                                    <form action="{{ route("admin.album.destroy",$album->id) }}">

                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete Album</button>
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
