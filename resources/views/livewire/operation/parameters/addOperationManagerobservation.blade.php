<div wire:ignore.self class="modal fade" id="addOpeManaObservation" tabindex="-1"
    aria-labelledby="addOpeManaObservationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Operation Manager Observation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="AddOpeManaObservation()">
                <div class="modal-body">
                    {{-- Success message --}}
                    @if (session('success'))
                        <div class="alert alert-success mt-1 alert-validation-msg" role="alert" style="display: block;">
                            <div class="alert-body d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg>
                                <span class="ms-1">
                                    {{ session('success') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    {{-- Success message End --}}

                    {{-- Error message --}}
                    @if (session('error'))
                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert" style="display: block;">
                            <div class="alert-body d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                </svg>
                                <span class="ms-1">
                                    {{ session('error') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    {{-- Error message End --}}

                    {{-- Form --}}
                    <textarea style="resize: none" class="form-control" wire:model.lazy='opeManaObservation' cols="30" rows="10"
                        placeholder="Observation"></textarea>
                    {{-- Form End --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
