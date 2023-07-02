@extends('layouts.app')

@section('content')
    <div class="container">
        <livewire:employee-show></livewire:employee-show>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addEmployeeModal').modal('hide');
            $('#updateEmployeeModal').modal('hide');
            $('#confirmDeleteEmployeeModal').modal('hide');
        })
    </script>
@endsection
