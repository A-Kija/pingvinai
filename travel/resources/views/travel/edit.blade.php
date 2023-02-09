<div class="modal fade" id="staticBackdrop">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content js--form">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Travel</h5>
                <button type="button" class="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Country</label>
                            <input type="text" class="form-control" name="country">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">hotel</label>
                            <input type="text" class="form-control" name="hotel">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary">Close</button>
                <button type="button" class="btn btn-outline-primary" data-url="{{route('travel-store')}}" data-method="post">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
