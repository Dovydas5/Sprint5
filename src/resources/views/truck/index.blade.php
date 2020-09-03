@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Trucks</div>

                    <div class="card-body">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Truck maker</th>
                                    <th>Plate number</th>
                                    <th>Year</th>
                                    <th>Mechanic name</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach ($trucks as $truck)
                                    <tr>
                                        <td>{{$truck->maker}}</td>
                                        <td>{{$truck->plate}}</td>
                                        <td>{{$truck->make_year}}</td>
                                        <td>{{$truck->truckMechanic->name}}</td>
                                        <td>
                                            <form method="POST" action="{{route('truck.destroy', [$truck])}}">
                                                <a class="btn btn-success"
                                                   href="{{route('truck.edit',[$truck])}}">EDIT</a>
                                                @csrf
                                                <button class="btn btn-danger" type="submit">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
