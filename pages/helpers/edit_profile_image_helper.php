<?php
  // Helper responsible for validating and updating user image
  if(isset($_FILES['photo']) ){
    $allowed_types = array('image/gif', 'image/jpeg', 'image/png');
    if(!in_array($_FILES['photo']['type'], $allowed_types)) {
      // Re-render with error message
      $_SESSION["failure_message"] = "Bad File Type: Only GIF, JPEG and PNG files are allowed.";
      header("Location: index.php?p=edit_profile_image");
    } else {
      // Generate random file name and move to permenant storage location
      $random = substr(str_shuffle(MD5(microtime())), 0, 10);
      $new_filename = $random . $_FILES['photo']['name'];
      if (move_uploaded_file($_FILES["photo"]["tmp_name"], __DIR__.'/../../images/user-images/'.$new_filename)) {
        // Update DB record with permenant location & redirect back to account page
        $User = new User($Conn);
        $User->updateUserProfile($_SESSION['user']['id'], $new_filename);
        $_SESSION["success_message"] = "Profile photo updated.";
        header("Location: index.php?p=account");
      } else {
        // Re-render with error message if file could not be moved.
        $_SESSION["failure_message"] = "Bad Upload: Only GIF, JPEG and PNG files are allowed.";
        header("Location: index.php?p=edit_profile_image");
      }
    }
  }
?>