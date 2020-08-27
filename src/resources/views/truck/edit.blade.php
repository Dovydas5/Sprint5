
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Trucks</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('truck.update',[$truck])}}">
                            <div class="form-group">
                                <label>Model</label>
                                <input type="text" name="truck_maker" class="form-control" value="{{$truck->maker}}">
                                <small class="form-text text-muted">Truck Model</small>
                            </div>
                            <div class="form-group">
                                <label>Plate</label>
                                <input type="text" name="truck_plate" class="form-control" value="{{$truck->plate}}">
                                <small class="form-text text-muted">Plate</small>
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" name="truck_make_year" class="form-control" value="{{$truck->make_year}}">
                                <small class="form-text text-muted">Truck year</small>
                            </div>
                            <textarea name="truck_mechanic_notices" id="summernote">{{$truck->mechanic_notices}}</textarea>
                            <select class="form-control" name="mechanic_id">
                                @foreach ($mechanics as $mechanic)
                                    <option value="{{$mechanic->id}}" @if($mechanic->id == $truck->author_id) selected @endif>
                                        {{$mechanic->name}} {{$mechanic->surname}}
                                    </option>
                                @endforeach
                            </select>
                            @csrf
                            <button class="btn btn-primary" type="submit">EDIT</button>
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

