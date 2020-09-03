@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <form action="{{route('truck.index')}}" method="get">
                        <select name="mechanic_id">
                            <option value="0">Rodyti visus</option>
                            @foreach ($mechanics as $mechanic)
                                <option value="{{$mechanic->id}}"
                                        @if($selectId == $mechanic->id) selected @endif>{{$mechanic->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-secondary ">Rodyti</button>
                        <a href="{{route('truck.index')}}" class="btn btn-secondary">Visi</a>
                    </form>
                </div>

                @if (count($trucks))

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

                                        <th>Actions</th>
                                    </tr>
                                    @foreach ($trucks as $truck)
                                        <tr>
                                            <td>{{$truck->maker}}</td>
                                            <td>{{$truck->plate}}</td>
                                            <td>{{$truck->make_year}}</td>
                                            <td>{{$truck->truckMechanic->name}}</td>
                                            <td>{!!$truck->mechanic_notices!!}</td>

                                            <td>
                                                <form method="POST" action="{{route('truck.destroy', [$truck])}}">
                                                    <a class="btn btn-dark mb-1"
                                                       href="{{route('truck.show', [$truck])}}">Parodyti</a>

                                                    <a class="btn btn-success" href="{{route('truck.edit',[$truck])}}">EDIT</a>

                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                @else
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="p-4">Nerasta..</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <br>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
