@extends('layouts.deshboard_master')
@section('product')
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
     @if (session('update'))
      <div class="col-md-12">
        <div class="alert alert-success">
            {{ session('update') }}
        </div>
      </div>
        @endif
         {{-- delete massage show --}}
     @if (session('delete_sms'))
      <div class="col-md-12">
        <div class="alert alert-success">
            {{ session('delete_sms') }}
        </div>
      </div>
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
                  <th>product_name</th>
                  <th>category_id</th>
                  <th>product_price</th>
                  <th>product_quantity</th>
                  <th>product_thumbnail_photo</th>
                  <th>product_short_description</th>
                  <th>product_long_description</th>
                  <th>time</th>
                  <th>action</th>
                </tr>

              @forelse ($products as $product)
                <tr>
                  <th>{{ $loop->index + 1 }}</th>
                  <td>{{ $product->product_name }}</td>
                  {{-- 2 line same working --}}
                  <td>{{ $product->relationaltocategorytable->category_name }}</td>
                  {{-- <td>{{ App\Category::find($product->category_id)->category_name }}</td> --}}

                  <td>{{ $product->product_price }}</td>
                  <td>{{ $product->product_quantity }}</td>
                  <td>
                    <img src="{{ asset('/upload/product_photo/') }}/{{ $product->product_thumbnail_photo }}" height="80"width="150" alt="no photo show">
                  </td>
                  <td>{{ $product->product_short_description }}</td>
                  <td>{{ $product->product_long_description }}</td>


                 <td>
                    @if ($product->created_at)
                      {{ $product->created_at->diffForHumans() }}
                    @else
                      no time to show
                    @endif
                  </td>

                  <td>
                      <a href="{{url('#')}}/{{ $product->id  }}" type="button" class="btn btn-danger">Delete</a>
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
          <div class=" col-md-12">
              <div class="card">
              <h5 class="card-header">Add Product</h5>
              <div class="card-body">

              @if (session('message'))
                <span class="alert alert-success">
                {{ session('message') }}
                </span>
              @endif

                <form action="{{ url('/add/product/post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" placeholder="enter product_name" name="product_name">
                  </div>
                  <div class="">
                    @error ('product_name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Category Name</label>
                    <select class="form-control" name="category_id">
                        <option value="">select one</option>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name  }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="">
                    @error ('category_id')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" class="form-control" placeholder="enter product_price" name="product_price">
                  </div>
                  <div class="">
                    @error ('product_price')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Product Quantity</label>
                    <input type="text" class="form-control" placeholder="enter product_quantity" name="product_quantity">
                  </div>
                  <div class="">
                    @error ('product_quantity')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label>Product Short Description</label>
                    <textarea class="form-control"  placeholder="enter product_short_description" name="product_short_description" rows="4"></textarea>
                  </div>
                  <div class="">
                    @error ('product_short_description')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Product Long Description</label>
                    <textarea class="form-control"  placeholder="enter product_long_description"  name="product_long_description" rows="4"></textarea>
                  </div>
                  <div class="">
                    @error ('product_long_description')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Product Thumbnail Photo</label>
                    <input type="file" class="form-control" placeholder="enter product_thumbnail_photo" name="product_thumbnail_photo">
                  </div>
                  <div class="">
                    @error ('product_thumbnail_photo')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Product Multipule Photos</label>
                    <input type="file" class="form-control" placeholder="enter product_multipule_photo" name="product_multiple_photos[]" multiple>
                  </div>
                  <div class="">
                    @error ('product_multiple_photos')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>

                   <button type="submit" class="btn btn-primary" name="button">add product</button>
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
