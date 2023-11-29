<div class="container">
  <?php require(__DIR__ . '/components/alerts.php'); ?>
  <h1 class="mb-4 pb-2">View Account</h1>
  <p>Welcome to your account.</p>
  <?php
    if($_SESSION['user']['image']) {
      echo '<div class="user-image" style="background-image: url(images/user-images/'.$_SESSION['user']['image'].'"></div>';
    }
  ?>
  <p><a class="btn btn-primary" href="index.php?p=edit_profile_image">Edit Profile Image</a></p>
</div>