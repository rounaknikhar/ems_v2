<div>
    <h1 class="pb-4 mb-4 border-bottom">Employee page</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <nav class="navbar navbar-light">
        <div class="w-100 d-flex flex-md-row flex-column align-items-center justify-content-between">
            <div
                class="w-md-auto mb-2 mb-md-0 w-100 d-flex flex-column flex-md-row
                justify-content-md-start justify-content-center align-items-center">
                <label class="d-md-inline d-none" for="orderBy">Order by</label>
                <select wire:model="orderBy" name="orderBy" class="form-select w-md-auto mb-2 mb-md-0 w-100"
                    id="orderBy">
                    <option value="DESC" selected>Newest</option>
                    <option value="ASC">Oldest</option>
                </select>
                <form class="form-inline w-md-auto w-100">
                    <input type="text" class="form-control shadow-none" placeholder="Search by name or email"
                        aria-label="search" aria-describedby="search" wire:model="search">
                </form>
            </div>
            <a href="#" class="btn btn-secondary w-100 w-md-auto" data-bs-toggle="modal"
                data-bs-target="#addEmployeeModal">
                <i class="fa-solid fa-plus"></i>
                Add employee
            </a>
        </div>
    </nav>
    <div class="w-100">
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
                                <a href="#" class="edit-icon btn btn-light mx-1" data-bs-toggle="modal"
                                    data-bs-target="#updateEmployeeModal"
                                    wire:click="editEmployee({{ $employee->id }})">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="#" class="delete-icon btn btn-danger mx-1" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteEmployeeModal"
                                    wire:click="deleteEmployee({{ $employee->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
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
            </table>
        </div>

        <div class="pagination">
            {{ $employees->links() }}
        </div>

        @include('livewire.modals.add-employee')
        @include('livewire.modals.update-employee')
        @include('livewire.modals.delete-employee')
    </div>
