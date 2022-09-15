@extends('layouts.deshboard_master')
@section('contactadmin')
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
        <div class="col-md-12">
        <h5 class="card-header">list contact</h5>
        <div class="card-body ">
            <h5 class="card-title">Table</h5>
        <table class="table table-bordered">

                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>EMAIL</th>
                  <th>SUBJECT</th>
                  <th>MESSAGE</th>
                  <th>ACTION</th>
                </tr>

              @foreach ($contect_message_sent as $contect_message)
                <tr class='@php
                  echo ($contect_message['status']==1 ? 'bg-dark':'bg-light');
                @endphp'>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $contect_message->name }}</td>
                <td>{{ $contect_message->email }}</td>
                <td>{{ $contect_message->subject }}</td>
                <td>{{ $contect_message->massage }}</td>
                <td>
                    <a href="" type="button" class="btn btn-danger">Delete</a>
                    <a href="{{ url('/seen/contect') }}/{{ $contect_message->id }}" type="button" class="btn btn-primary">seen</a>
               </td>

                </tr>
              @endforeach


            </table>
      </div>
    </div>


    </div>
  </div>
</div>
@endsection
