@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($employee)
            <livewire:clock-in-show />
        @else
            <div class="d-flex flex-column align-items-center justify-content-center text-center">
                <h4 class="text-danger mt-5 pt-5">Invalid employee Id</h4>
                <small>Please retry</small>
                <a href="{{ route('clock-in') }}" class="btn btn-secondary mt-4">Go back</a>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script></script>
@endsection
