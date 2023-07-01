<!-- Modal -->
<div wire:ignore.self class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="employeeModalLabel">Add a new employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mx-2 mx-md-5">
                    <form wire:submit.prevent="saveEmployee">
                        <div class="form-group py-2">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email"
                                wire:model="email" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group py-2">
                            <label for="email">Full name</label>
                            <input class="form-control" type="text" name="fullName" id="fullName"
                                wire:model="fullName" />
                            @error('fullName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group py-2">
                            <label for="email">Position</label>
                            <input class="form-control" type="text" name="position" id="position"
                                wire:model="position" />
                            @error('position')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group py-2">
                            <label for="email">Salary</label>
                            <input class="form-control" type="text" name="salary" id="salary"
                                wire:model="salary" />
                            @error('salary')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group py-2">
                            <label for="email">Start date</label>
                            <input class="form-control" type="date" name="startDate" id="startDate"
                                wire:model="startDate" />
                            @error('startDate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group py-2">
                            <label>Status</label>
                            <div class="py-2">
                                <div class="custom-radio-container">
                                    <label for="active"
                                        class="custom-radio {{ $status == 1 ? 'active' : '' }}">Active</label>
                                    <input type="radio" name="status" value="1" wire:model="status"
                                        id="active" class="d-none">

                                    <label for="notActive" class="custom-radio {{ $status == 0 ? 'active' : '' }}">
                                        Not active</label>
                                    <input type="radio" name="status" value="0" wire:model="status"
                                        id="notActive" class="d-none">
                                </div>
                            </div>
                        </div>

                        <div class="py-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
