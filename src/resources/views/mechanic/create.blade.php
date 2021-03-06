
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mechanics</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('mechanic.store')}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"  class="form-control" name="mechanic_name">
                                <small class="form-text text-muted">Mechanic name</small>
                            </div>
                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" class="form-control"  name="mechanic_surname">
                                <small class="form-text text-muted">Mechanic surname</small>
                            </div>
                            @csrf
                            <button class="btn btn-primary" type="submit">ADD</button>
                        </form>                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
