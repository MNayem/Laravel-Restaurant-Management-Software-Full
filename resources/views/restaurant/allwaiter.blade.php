@extends('layout.dashboard_layout')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


    <div class="row p-3">
        <div class="col-lg-12 pb-3" style="box-shadow: 0px 0px 5px gray;border-radius:.5rem;">
            <h2 class="fw-bold text-center py-3">WAITER LIST</h2>
            <div class="table-responsive" style="border-radius:.5rem; border: 1px solid gray;">
            <table class="table table-hover table-striped table-condensed table-borderless bg-white">
                <thead>
                    <tr align="center"">
                        <th scope="col">SI No.</th>
                        <th scope="col">Email</th>
                        <th scope="col">Waiter Name</th>
                        <th scope="col">Waiter Phone Number</th>
                        <th scope="col">Waiter Address</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($waiterShow as $waiterShow)
                    <tr align="center" class="align-self-center">
                        <td class="align-self-center">{{ $waiterShow->id }}</td>
                        <td>{{ $waiterShow->email }}</td>
                        <td>{{ $waiterShow->name }}</td>
                        <td>{{ $waiterShow->phone }}</td>
                        <td>{{ $waiterShow->address }}</td>
                        <td>
                            <a href="{{ url('/waiteredit',$waiterShow->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit </a>
                            <a href="{{ url('/deletewaiter',$waiterShow->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
            </div>
        </div>
    </div>


@endsection
