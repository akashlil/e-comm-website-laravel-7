@extends('layouts.deshboard_master')
@section('category')
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
        <div class="col-md-8">
            <div class="card">
        <h5 class="card-header">list category (Active)</h5>
        <div class="card-body">
            <h5 class="card-title">Table</h5>
        <table class="table table-bordered">

                <tr>
                  <th>ID</th>
                  <th>CATEGORY NAME</th>
                  <th>USER NAME</th>
                  <th>TIME</th>
                  <th>LAST UPDATE</th>
                  <th>CATEGORY PHOTO</th>
                  <th>ACTION</th>
                </tr>

              @forelse ($categories as $cat)
                <tr>
                  <th>{{ $loop->index + 1 }}</th>
                  <td>{{ $cat->category_name }}</td>
                  <td>{{ App\User::find($cat->user_id)->name }}</td>
                  <td>
                    {{-- time show created_at --}}
                    @if ($cat->created_at)
                      {{ $cat->created_at->diffForHumans() }}
                    @else
                      no time to show
                    @endif
                  </td>
                  {{-- lastupadte show time --}}
                  <td>
                    @if ($cat->updated_at)
                      {{ $cat->updated_at->diffForHumans() }}
                    @else
                      no time to show
                    @endif
                  </td>
                  <td>
                    <img src="{{ asset('/upload/category_photo/') }}/{{ $cat->category_photo }}" width="50" alt="no photo show">
                  </td>
                  <td>
                      <a href="{{url('/update/category')}}/{{ $cat->id  }}" type="button" class="btn btn-info">Update</a>
                  </td>

                  <td>
                      <a href="{{url('/delete/category')}}/{{ $cat->id  }}" type="button" class="btn btn-danger">Delete</a>
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
          <div class=" col-md-4">
              <div class="card">
              <h5 class="card-header">add category</h5>
              <div class="card-body">

                <span class="text-success">
                {{ session('success_message') }}
                </span>

                <form action="{{ url('add/category/post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                  <div class="form-group">
                    <label>Category</label>
                    <input type="text" class="form-control" placeholder="enter category name" name="category_name_input">
                  </div>
                  <div class="">
                    @error ('category_name_input')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label>Category photo</label>
                    <input type="file" class="form-control" placeholder="enter category name" name="category_photo_input">
                  </div>
                  <div class="">
                    @error ('category_photo_input')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  </div>
                   <button type="submit" class="btn btn-primary" name="button">add category</button>
                </form>
              </div>
            </div>
          </div>

        {{-- delete  list table --}}
        <div class=" col-md-8 mt-5">
            <div class="card">
        <h5 class="card-header">list category(Delete)</h5>
        <div class="card-body">
            <h5 class="card-title">Table</h5>
        <table class="table table-bordered">

                <tr>
                  <th>ID</th>
                  <th>CATEGORY NAME</th>
                  <th>USER NAME</th>
                  <th>TIME</th>
                  <th>LAST UPDATE</th>
                  <th>CATEGORY PHOTO</th>
                  <th>ACTION</th>
                </tr>

              @forelse ($delete_datas_recovery as $datas_recovery)
                <tr>
                  <th>{{$loop->index + 1 }}</th>
                  <td>{{ $datas_recovery->category_name }}</td>
                  <td>{{ App\User::find($datas_recovery->user_id)->name }}</td>
                  <td>
                    {{-- time show created_at --}}
                    @if ($datas_recovery->created_at)
                      {{ $datas_recovery->created_at->diffForHumans() }}
                    @else
                      no time to show
                    @endif
                  </td>
                  {{-- lastupadte show time --}}
                  <td>
                    @if ($datas_recovery->updated_at)
                      {{ $datas_recovery->updated_at->diffForHumans() }}
                    @else
                      no time to show
                    @endif
                  </td>
                  <td>
                    <img src="{{ asset('/upload/category_photo/') }}/{{ $datas_recovery->category_photo }}" width="50" alt="no photo show">
                  </td>
                  <td>
                      <a href="{{url('/restore/category')}}/{{ $datas_recovery->id  }}" type="button" class="btn btn-info">Restore</a>
                  </td>
                 <td>
                      <a href="{{url('/harddelete/category')}}/{{ $datas_recovery->id  }}" type="button" class="btn btn-danger">Har</a>
                 </td>

                </tr>
              @empty
                <span>no data to show</span>
              @endforelse
            </table>

        </div>
      </div>
    </div>



    </div>
  </div>
</div>
</div>
@endsection
