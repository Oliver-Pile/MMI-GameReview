<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Review!</title>
    <script src="https://kit.fontawesome.com/61a869ab1a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="../assets/icon.png">
  </head>
  <body id="page-<?php echo $page; ?>">
  <header>
    <nav class="navbar navbar-expand-lg mb-4">
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-
          controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
  
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=home"><i class="fa-solid fa-house"></i>Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=genres"><i class="fa-solid fa-gamepad"></i>Genres</a>
            </li>
            <li class="nav-item">
              <?php if ($_SESSION['is_loggedin']) { ?>
                <a class="nav-link" href="index.php?p=logout"></i>Logout</a>
                <?php } else { ?>
                  <a class="nav-link" href="index.php?p=login"></i>Login/Register</a>
              <?php } ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>