@extends('layouts.deshboard_master')
@section('slider')
  active
@endsection
@section('content')

  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">

        @if (session('delete_sms'))
          <span class="alert alert-success">
          {{ session('delete_sms') }}
          </span>
        @endif
        {{-- action list table --}}
        <div class="col-md-12">
            <div class="card">
        <h5 class="card-header">Product List</h5>
        <div class="card-body">
            <h5 class="card-title">Table</h5>
        <table class="table table-bordered">

                <tr>
                  <th>id</th>
                  <th>Slider Header</th>
                  <th>Slider Photo</th>
                  <th>Slider Paragraph</th>
                  <th>time</th>
                  <th>action</th>
                </tr>

              @forelse ($silders as $silder)
                <tr>
                  <th>{{ $loop->index + 1 }}</th>
                  <td>{{ $silder->slider_header }}</td>
                  <td>
                    <img src="{{ asset('/upload/slider_photo/') }}/{{ $silder->slider_photo }}" height="80"width="150" alt="no photo show">
                  </td>
                  <td>{{ $silder->slider_paragraph }}</td>
                 <td>
                    @if ($silder->created_at)
                      {{ $silder->created_at->diffForHumans() }}
                    @else
                      no time to show
                    @endif
                  </td>

                  <td>
                      <a href="{{url('/slider/deletes')}}/{{ $silder->id  }}" type="button" class="btn btn-danger">Delete</a>
                 </td>

                </tr>
              @empty
                <span>no data to show</span>
              @endforelse
            </table>
        </div>
      </div>
    </div>


          {{-- add slider table --}}
          <div class=" col-md-4 mt-5" >
              <div class="card">
              <h5 class="card-header">Add Slider</h5>
              <div class="card-body">

              @if (session('message'))
                <span class="alert alert-success">
                {{ session('message') }}
                </span>
              @endif

                <form action="{{ url('/slider/post') }}" method="post" enctype="multipart/form-data">
                            @csrf

                  <div class="form-group">
                    <label>Slider Header</label>
                    <input type="text" class="form-control" name="slider_header">
                  </div>
                  <div class="">
                    @error ('coupon_name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Slider Paragraph</label>
                    <textarea type="text" class="form-control" name="slider_paragraph" rows="4"></textarea>
                  </div>
                  <div class="">
                    @error ('slider_paragraph')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Slider Photo</label>
                    <input type="file" class="form-control" name="slider_photo">
                  </div>
                  <div class="">
                    @error ('slider_photo')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                   <button type="submit" class="btn btn-primary" name="button">Add Slider</button>
                </form>
              </div>
            </div>
          </div>
        </div>



    </div>
  </div>
  </div>
  </div>
@endsection
