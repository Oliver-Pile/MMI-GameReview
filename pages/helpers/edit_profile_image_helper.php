<?php
  if(isset($_FILES['photo']) ){
    // Use getimagesize() instead as below can be spoofed.
    // Check file size with  $_FILES["photo"]["size"]
    $allowed_mime = array('image/gif', 'image/jpeg', 'image/png');
    if(!in_array($_FILES['photo']['type'], $allowed_mime)) {
      $_SESSION["failure_message"] = "Bad File Type: Only GIF, JPEG and PNG files are allowed.";
      header("Location: index.php?p=edit_profile_image");
    } else {
      $random = substr(str_shuffle(MD5(microtime())), 0, 10);
      $new_filename = $random . $_FILES['photo']['name'];
      if (move_uploaded_file($_FILES["photo"]["tmp_name"], __DIR__.'/../../images/user-images/'.$new_filename)) {
        $User = new User($Conn);
        $User->updateUserProfile($_SESSION['user']['id'], $new_filename);
        $_SESSION["success_message"] = "Profile photo updated.";
        header("Location: index.php?p=account");
      } else {
        $_SESSION["failure_message"] = "Bad Upload: Only GIF, JPEG and PNG files are allowed.";
        header("Location: index.php?p=edit_profile_image");
      }
    }
  }
?>