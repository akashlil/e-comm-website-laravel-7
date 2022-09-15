
@extends('layouts.deshboard_master')
@section('home')
  active
@endsection
@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">wellcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <h1>welcome:{{ Auth::user()->name }}</h1>
                  <h1>email: {{ Auth::user()->email }}</h1>
                  <h1>Created :{{ Auth::user()->created_at }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-danger">
            User List
            <h1>Total user:{{ $total_user }}</h1>
          </div>
          <div class="card-body">
    <table class="table table-bordered">
       <tr>
          <th>serial id</th>
          <th>id</th>
          <th>name</th>
          <th>email</th>
          <th>time</th>
       </tr>

        @foreach ($users as $user)
            <tr>
              {{-- serial id number 12345 --}}
              <td>{{ $users->firstItem()+$loop->index}}</td>

              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->created_at->format('d/m/Y h:i:s A') }}<br/>
                {{ $user->created_at->diffForHumans() }}
              </td>
            </tr>

        @endforeach
     </table>
     {{-- paginate method --}}
       {{ $users->links() }}
          </div>
        </div>
      </div>
        </div><!-- row -->

      </div>

    </div>

      @endsection
