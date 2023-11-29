<div class="container">
  <h1> Update Profile Photo </h1>

  <?php
    if(isset($_FILES['photo']) ){
      // Use getimagesize() instead as below can be spoofed.
      // Check file size with  $_FILES["photo"]["size"]
      $allowed_mime = array('image/gif', 'image/jpeg', 'image/png');
      if(!in_array($_FILES['photo']['type'], $allowed_mime)) {
        echo '<div class="alert alert-danger" role="alert">Only GIF, JPEG and PNG files are allowed.</div>';
      } else {
        $random = substr(str_shuffle(MD5(microtime())), 0, 10);
        $new_filename = $random . $_FILES['photo']['name'];
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], __DIR__.'/../images/user-images/'.$new_filename)) {
          $User = new User($Conn);
          $User->updateUserProfile($_SESSION['user']['id'], $new_filename);
          echo '<div class="alert alert-success" role="alert">Profile photo updated.</div>';
        } else {
          echo '<div class="alert alert-danger" role="alert">Only GIF, JPEG and PNG files are allowed.</div>';
        }
      }
    }
  ?>

  <form id="update-profile-photo-form" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" class="form-control-file" name="photo">
  </div>
  <button type="submit" class="btn btn-studenteat">Update Profile Photo</button>
  </form>
</div>
