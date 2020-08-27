
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new Truck</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('truck.store')}}">
                            <div class="form-group">
                                <label>Model</label>
                                <input type="text"  class="form-control" name="truck_maker">
                                <small class="form-text text-muted">Truck model</small>
                            </div>
                            <div class="form-group">
                                <label>Plate</label>
                                <input type="text"  class="form-control" name="truck_plate">
                                <small class="form-text text-muted">Truck plate</small>
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" class="form-control"  name="truck_make_year">
                                <small class="form-text text-muted">Truck year</small>
                            </div>
                            <textarea name="truck_mechanic_notices" id="summernote"></textarea>
                            <select class="form-control" name="mechanic_id">
                                @foreach ($mechanics as $mechanic)
                                    <option value="{{$mechanic->id}}">{{$mechanic->name}} {{$mechanic->surname}}</option>
                                @endforeach
                            </select>
                            @csrf
                            <button class="btn btn-primary"type="submit">ADD</button>
                        </form>                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
