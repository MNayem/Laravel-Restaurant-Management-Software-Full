<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


@extends('layout.adminLayout')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<style>
    .tbl-container{
        max-width: fit-content;
        max-height: fit-content;
    }
    .tbl-fixed{
        overflow-x: scroll;
        overflow-y: scroll;
        height:fit-content;
        max-height: 83vh;
        /*margin-top: 0px;*/
        margin-bottom: 0;
    }
    table{
        min-width: max-content;
    }
    thead{
        position: sticky !important;
        top: 0px !important;
        background-color: white !important;
    }
</style>

<div class="container tbl-container">
    <div class="row tbl-fixed">
        <table class="table table-hover table-striped table-condensed table-bordered border-dark" >
  <thead class="header">
    <th colspan="9"><h2 style="text-align: center;">ONLINE ORDER LIST</h2></th>
      <tr align="center">
        <th scope="col">SI.</th>
        <th scope="col">Email</th>
        <th scope="col">Phone No.</th>
        <th scope="col">Subject</th>
        <th scope="col">Message</th>
        <th scope="col">Status</th>
        <th colspan="3" scope="col">Actions</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($allContacts as $allContacts)
      <tr align="center">
        <td scope="row">{{ $allContacts->id }}</td>
        <td>{{ $allContacts->email }}</td>
        <td>{{ $allContacts->phone }}</td>
        <td>{{ $allContacts->subject }}</td>
        <td>{{ $allContacts->message }}</td>
        <td>{{ $allContacts->status }}</td>
        <td colspan = 3>
            <a href="{{ url('/onlineContactShow',$allContacts->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i> Show </a>
            <a href="{{ url('/onlineContactedit',$allContacts->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit </a>
            <a href="{{ url('/onlineContactdelete',$allContacts->id) }}" class="btn btn-danger ml-2"><i class="fa-solid fa-trash-can"></i> Delete</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
    </div>
</div>



@endsection