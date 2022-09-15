@extends('layouts.deshboard_master')
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>
    <div class="sl-pagebody">
      <div class="row row-sm">

    <div class=" col-md-6 m-auto">
    <div class="card">
    <h5 class="card-header">Update Name</h5>
    <div class="card-body">

      <span class="text-success">
      {{ session('success_message') }}
      </span>

      <form action="{{ url('profile/post') }}" method="post">
                  @csrf
        <div class="form-group">
          <label>update  name</label>
          <input type="text" class="form-control"name="update_category_name_input">
        </div>
        <div class="">
          @error ('upate_category_name_input')
          <span class="text-danger">
              {{ $message }}
          </span>
          @enderror
        </div>
         <button type="submit" class="btn btn-primary" name="button">Update name</button>
      </form>
    </div>
  </div>
</div>

{{-- password change --}}
<div class="col-md-6 m-auto">
    <div class="card">
    <h5 class="card-header"> change password</h5>
    <div class="card-body">
        @if(session('same'))
          <span class=" text-danger">
          {{ session('same') }}
          </span>
        @endif
        @if(session('notmatch'))
          <span class=" text-danger">
          {{ session('notmatch') }}
          </span>
        @endif
        @if(session('passchange'))
          <span class=" text-success">
          {{ session('passchange') }}
          </span>
        @endif

      <form action="{{ url('password/post') }}" method="post">
                  @csrf
        <div class="form-group">
          <label>old password</label>
          <input type="text" placeholder="Old password"class="form-control" name="old_password">
        </div>
        <div class="">
          @error ('old_password')
          <span class="text-danger">
              {{ $message }}
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>New password</label>
          <input type="text" placeholder="New password"class="form-control" name="password">
        </div>
        <div class="">
          @error ('password')
          <span class="text-danger">
              {{ $message }}
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label>confirm password</label>
          <input type="text" placeholder="Confirm Password"class="form-control" name="password_confirmation">
        </div>
        <div class="">
          @error ('password_confirmation')
          <span class="text-danger">
              {{ $message }}
          </span>
          @enderror
        </div>
         <button type="submit" class="btn btn-primary" name="button">change password</button>
      </form>
    </div>
   </div>
  </div>
</div>
  </div>
  </div>
@endsection
