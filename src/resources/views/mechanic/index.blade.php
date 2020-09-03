@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Mechanics</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($mechanics as $mechanic)
                                <tr>
                                    <td>{{$mechanic->name}}</td>
                                    <td>{{$mechanic->surname}}</td>
                                    <td>
                                        <form method="POST" action="{{route('mechanic.destroy', [$mechanic])}}">
                                            <a class="btn btn-success"
                                               href="{{route('mechanic.edit',[$mechanic])}}">EDIT</a>
                                            @csrf
                                            <button class="btn btn-danger" type="submit">DELETE</button>
                                        </form>
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
