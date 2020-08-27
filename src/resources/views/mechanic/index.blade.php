@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Mechanics</div>

                    <div class="card-body">
                        @foreach ($mechanics as $mechanic)
                            <a href="{{route('mechanic.edit',[$mechanic])}}">Mechanic Name: {{$mechanic->name}}<br> Mechanic Surname: {{$mechanic->surname}}</a>
                            <form method="POST" action="{{route('mechanic.destroy', [$mechanic])}}">
                                @csrf
                                <button class="btn btn-danger"  type="submit">DELETE</button>
                            </form>
                            <br>
                        @endforeach                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
