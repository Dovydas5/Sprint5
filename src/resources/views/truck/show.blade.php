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
                                    <th>Notes</th>
                                </tr>
                                    <tr>
                                        <td>{{$truck->maker}}</td>
                                        <td>{{$truck->plate}}</td>
                                        <td>{{$truck->make_year}}</td>
                                        <td>{{$truck->truckMechanic->name}}</td>
                                        <td>{!!$truck->mechanic_notices!!}</td>


                                    </tr>

                            </table>
                            <a href="{{route('truck.index')}}" class="btn btn-primary">Atgal</a>

                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
