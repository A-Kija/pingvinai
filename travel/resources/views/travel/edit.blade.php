<div class="modal fade" id="staticBackdrop">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content js--form">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Travel</h5>
                <a href="#" type="button" class="btn-close close-edit"></a>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Country</label>
                            <input type="text" class="form-control" name="country" value="{{$travel->country}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">hotel</label>
                            <input type="text" class="form-control" name="hotel" value="{{$travel->hotel}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-outline-secondary close-edit">Close</a>
                <button type="button" class="btn btn-outline-primary" data-url="{{route('travel-update', $travel)}}" data-method="put">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
