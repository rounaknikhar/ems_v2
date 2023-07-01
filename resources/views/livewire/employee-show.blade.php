<div>
    <h1 class="pb-4 mb-4 border-bottom">Employee page</h1>
    @if (session()->has('message'))
        <div class="notification">
            <p>{{ session('message') }}</p>
            <span class="progress-bar"></span>
        </div>
    @endif
    <nav class="navbar navbar-light">
        <div class="w-100 d-flex flex-row align-items-center justify-content-between">
            <form class="form-inline">
                <input type="text" class="form-control shadow-none" placeholder="Search by name or email"
                    aria-label="search" aria-describedby="search" wire:model="search">
            </form>
            <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#employeeModal">Add
                employee</a>
        </div>
    </nav>
    <div class="bg-light w-100">
        <div class="table-responsive">
            <table class="table employee-table">
                <thead>
                    <tr>
                        <th scope="col" class="id">Id</th>
                        <th scope="col" class="email">Email</th>
                        <th scope="col" class="full-name">Full name</th>
                        <th scope="col" class="position">Position</th>
                        <th scope="col" class="salary">Salary</th>
                        <th scope="col" class="start-date">Start date</th>
                        <th scope="col" class="status">Status</th>
                        <th scope="col" class="action"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $employee->id }}</th>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->fullName }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>{{ date_format(new DateTime($employee->startDate), 'd/m/Y') }}</td>
                            <td class="employee-status-result ml-2">
                                @if ($employee->status == 1)
                                    <i class="fa-solid fa-check"></i>
                                @else
                                    <i class="fa-solid fa-xmark"></i>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="edit-icon btn btn-light mx-1"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="delete-icon btn btn-danger mx-1"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <p class="text-center">Not found!</p>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
        </div>
        </table>
    </div>

    @include('livewire.modals.employee')
</div>
