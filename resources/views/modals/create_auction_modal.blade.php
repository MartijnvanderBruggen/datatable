<!-- create auction modal -->
<div id="create-auction-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Auction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-auction">
                    <div class="form-group">
                        <label for="auction-title">Auction Title</label>
                        <input type="text" class="form-control form-control-lg" id="auction-title" name="auction-title">
                    </div>
                    <div class="form-group">
                        <label for="auction-description">Auction description</label>
                        <textarea class="form-control" id="auction-description" name="auction-description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="minimum-amount">Minimum-amount</label>
                        <input type="number" min="1" step="any" class="form-control form-control-lg" id="minimum-amount" name="minimum-amount" ></input>
                    </div>
                    <div class="form-group">
                        <label for="auction-duration">Auction Duration</label>
                        <input type="number" min="1" step="1" class="form-control form-control-lg" id="auction-duration" name="auction-duration"></input>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Choose an image for the auction:</label>
                        <input type="file" class="form-control-file" id="auction-image" name="auction-image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="save-auction" class="btn btn-primary">Create Auction!</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
