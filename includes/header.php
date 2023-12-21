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
              <a class="nav-link" href="index.php?p=genres"><i class="fa-solid fa-book-open"></i>Genres</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=all_games"><i class="fa-solid fa-gamepad"></i>Games</a>
            </li>
            <?php if ($_SESSION['is_loggedin']) { ?>
              <!-- Only display account/logout if the user is logged in -->
              <li class="nav-item">
                <a class="nav-link" href="index.php?p=account"><i class="fa-solid fa-circle-user"></i>Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?p=logout">Logout</a>
              </li>
            <?php } else { ?>
              <!-- Only display Login/Register if the user is not logged in -->
              <li class="nav-item">
                <a class="nav-link" href="index.php?p=login"></i>Login/Register</a>
              </li>
            <?php } ?>
          </ul>
          <form action="index.php?p=search" method="post" class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search for games" name="query" aria-label="Search">
            <button class="btn btn-black" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </header>