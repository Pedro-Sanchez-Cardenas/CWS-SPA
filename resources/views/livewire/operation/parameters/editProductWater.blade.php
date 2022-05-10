<div wire:ignore.self class="modal fade" id="editParameters" tabindex="-1" aria-labelledby="editParametersLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Operation Manager Observations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="AddOpeManaObservation()">
                <div class="modal-body">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning" data-bs-dismiss="modal">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
