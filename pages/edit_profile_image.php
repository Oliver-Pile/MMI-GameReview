<div class="container">
  <?php
    require_once(__DIR__ . '/helpers/edit_profile_image_helper.php');
  ?>
  <h1> Update Profile Photo </h1>

  <form id="update-profile-photo-form" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" class="form-control-file" name="photo">
  </div>
  <button type="submit" class="btn btn-primary">Update Profile Photo</button>
  </form>
</div>
