@extends('layouts.deshboard_master')
@section('coupon')
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

      {{-- update mssage show --}}
     @if (session('success'))
      <div class="col-md-12">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      </div>
        @endif


        <div class="col-md-12">
            <div class="card">
        <h5 class="card-header">Add Coupon</h5>
        <div class="card-body">
            <h5 class="card-title">Table</h5>
        <table class="table table-bordered">

                <tr>
                  <th>id</th>
                  <th>Coupon Name</th>
                  <th>Discount Amount%</th>
                  <th>Validity Time</th>
                  <th>Validity Status</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>

              @forelse ($coupons as $coupon)
                <tr>
                  <th>{{ $loop->index + 1 }}</th>
                  <td>{{ $coupon->coupon_name }}</td>
                  <td>{{ $coupon->discount}}%</td>
                  <td>{{ $coupon->validity}}</td>
                  <td>
                    @if ($coupon->validity >= \Carbon\Carbon::now()->format('Y-m-d'))
                      <span class="badge badge-success">valid</span>
                    @else
                      <span class="badge badge-danger">invalid</span>
                    @endif
                  </td>

                 <td>
                    @if ($coupon->created_at)
                      {{ $coupon->created_at->diffForHumans() }}
                    @else
                      no time to show
                    @endif
                  </td>

                  <td>
                      <a href="{{url('coupon/delete')}}/{{ $coupon->id  }}" type="button" class="btn btn-danger">Delete</a>
                 </td>

                </tr>
              @empty
                <span>no data to show</span>
              @endforelse
            </table>
        </div>
      </div>
    </div>

          {{-- add category table --}}
          <div class=" col-md-4 mt-5" >
              <div class="card">
              <h5 class="card-header">Add Coupon</h5>
              <div class="card-body">

              @if (session('message'))
                <span class="alert alert-success">
                {{ session('message') }}
                </span>
              @endif

                <form action="{{ url('/add/coupon/post') }}" method="post">
                            @csrf

                  <div class="form-group">
                    <label>Coupon Name</label>
                    <input type="text" class="form-control" name="coupon_name">
                  </div>
                  <div class="">
                    @error ('coupon_name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Discount Amount%</label>
                    <input type="number" class="form-control" name="discount">
                  </div>
                  <div class="">
                    @error ('discount')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Validity Time</label>
                    <input type="date" class="form-control" name="validity">
                  </div>
                  <div class="">
                    @error ('validity')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                   <button type="submit" class="btn btn-primary" name="button">Add Coupon</button>
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
