<!-- Add this modal inside the HTML body -->
<div class="modal fade" id="foodModal" tabindex="-1" role="dialog" aria-labelledby="foodModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="foodModalLabel">Edit/Delete Food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to edit food -->
                <form id="editFoodForm" method="POST">
                    <div class="form-group">
                        <label for="foodName">Name</label>
                        <input type="text" class="form-control" id="foodName" name="foodName">
                    </div>
                    <div class="form-group">
                        <label for="foodType">Type</label>
                        <input type="text" class="form-control" id="foodType" name="foodType">
                    </div>
                    <div class="form-group">
                        <label for="foodPrice">Price</label>
                        <input type="number" class="form-control" id="foodPrice" name="foodPrice">
                    </div>
                    <input type="hidden" id="foodId" name="foodId">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <!-- Button to delete food -->
                <button id="deleteFoodBtn" class="btn btn-danger mt-3">Delete Food</button>
            </div>
        </div>
    </div>
</div>
