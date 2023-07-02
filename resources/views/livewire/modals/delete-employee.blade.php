<!-- Modal -->
<div wire:ignore.self class="modal fade" id="confirmDeleteEmployeeModal" tabindex="-1"
    aria-labelledby="confirmDeleteEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="confirmDeleteEmployeeModalLabel">Update employee
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <div class="modal-body">
                <div class="mx-2 mx-md-5">
                    <form wire:submit.prevent="confirmDeleteEmployee">
                        <div class="form-group py-2">
                            <p>Are you sure you want to delete this employee data?</p>
                        </div>

                        <div class="py-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                wire:click="closeModal">Close</button>
                            <button type="submit" class="btn btn-primary">Yes! delete </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
