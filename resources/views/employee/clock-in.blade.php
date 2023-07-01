@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center">
        <from>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="employeeId">Employee Id</label>
                        <input class="form-control" type="text" name="employeeId" id="employeeId" @required(true)>

                        <input type="submit" value="Schedule" class="btn btn-secondary w-100 mt-3">
                    </div>
                </div>
            </div>
        </from>
    </div>
@endsection
