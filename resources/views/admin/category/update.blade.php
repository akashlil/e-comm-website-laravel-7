@extends('layouts.deshboard_master')
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('add/category') }}">list category</a>
      <span class="breadcrumb-item active">{{ $category_name}}</span>
    </nav>
    <div class="sl-pagebody">
      <div class="row row-sm">

        <div class="card col-md-4 m-auto text-center">
          <form action="{{ url('/update/category/post') }}" method="post" enctype="multipart/form-data">
                      @csrf
            <div class="form-group">
              <label><h3>Update Category</h3></label>
              <input type="text" class="form-control" name="update_category_names" value="{{ $category_name }}">
              <input type="hidden" class="form-control" name="update_category_id" value="{{ $category_id}}">
            </div>
            <div class="form-group">
              @error ('update_category_names')
              <span class="text-danger">
                  {{ $message }}
              </span>
              @enderror
            </div>
            <div class="form-group">
              <img src="{{ asset('/upload/category_photo/') }}/{{ $category_photo }}" width="50" alt="no photo show">
            </div>

            <div class="form-group">
              <label>Category photo</label>
              <input type="file" class="form-control" placeholder="enter category name" name="category_photo_inputs">
            </div>
            <div class="form-group">
              @error ('category_photo_input')
              <span class="text-danger">
                  {{ $message }}
              </span>
              @enderror
            </div>
             <button type="submit" class="btn btn-primary" name="button">upadte category</button>
          </form>
        </div>
        </div>

      </div>
   </div>
 </div>
@endsection
