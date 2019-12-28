<!-- create auction modal -->
<div id="user-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Calculate Freetime</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="calculate-freetime">
                    <div class="form-group">
                        <label for="start-date">StartDate</label>
                        <input type="date" id="start-date">
                    </div>
                    <div class="form-group">
                        <label for="full-time">Full-time?</label>
                        <input type="checkbox" id="full-time" name="full-time" checked="checked">
                        <input type="number" class="part-time" id="part-time" name="part-time" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="save-auction" class="btn btn-primary">Calculate free time!</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
