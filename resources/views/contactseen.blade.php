@extends('layouts.deshboard_master')
@section('content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="/contact/admin">List Contact</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-12">
        <h5 class="card-header">message details</h5>
            <h5 class="card-title">Table</h5>
        <table class="table table-bordered">
                <tr>
                  <td>ID</td>
                  <td>NAME</td>
                  <td>EMAIL</td>
                  <td>SUBJECT</td>
                  <td>MESSAGE</td>
                </tr>


                <tr>
                     <td>{{ $contect_id->id }}</td>
                     <td>{{ $contect_id->name }}</td>
                     <td>{{ $contect_id->email }}</td>
                     <td>{{ $contect_id->subject }}</td>
                     <td>{{ $contect_id->massage }}</td>
                </tr>

            </table>
      </div>
    </div>
  </div>
</div>
@endsection
