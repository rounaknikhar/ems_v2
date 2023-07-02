@extends('layouts.app')

@section('content')
    <div class="container">
        <livewire:employee-schedule-show :employee="$employee" />
    </div>
@endsection

@section('script')
@endsection
