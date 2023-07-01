@extends('layouts.app')

@section('content')
    <div class="container">
        <livewire:employee-show></livewire:employee-show>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#employeeModal').modal('hide');
        })
    </script>
@endsection
