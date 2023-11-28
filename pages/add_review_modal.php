<?php require_once(__DIR__ . '/helpers/add_review_helper.php') ?>
<div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php if ($_SESSION["is_loggedin"]) { ?>
        <form id="add-review-form" method="post" action="">
        <div class="modal-body">
            <div class="form-group">
              <label for="review_content">Content</label>
              <textarea class="form-control" id="review_content" name="content"></textarea>
            </div>
            <div class="form-group">
              <label for="review_raiting">Raiting (1-5)</label>
              <input type="number" class="form-control" id="review_raiting" name="raiting" min="1" max="5">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="review" value="1" class="btn btn-review">Add Review</button>
          </div>
        </form>
      <?php } else { ?>
        <div class="modal-body">
          <h3> Please login to create a review. </h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      <?php } ?>
      </div>
  </div>
</div>