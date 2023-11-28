<?php
  if($_POST['review']) {
    $Review = new Review($Conn);
    $content = htmlspecialchars($_POST["content"]);
    $raiting = (int) htmlspecialchars($_POST["raiting"]);

    $errors = validate($content, $raiting);

    if ($errors) {
      displayErrors($errors);
    } else {
      $reviewCreated = $Review -> addReviewForGame($content, $raiting, $game_id, $_SESSION['user']['id']);
      if($reviewCreated) {
        displayAlert("Review successfuly created", "success");
      } else {
        displayAlert("An error occured, please try again later", "danger");
      }
    }
  }

  function validate($content, $raiting) {
    $errors = array();
    array_push($errors, validateContent($content));
    array_push($errors, validateRaiting($raiting));

    return array_filter($errors);
  }

  function validateContent($content) {
    if ($content == "") {
      $error = "Content not set";
    } else {
      $error = null;
    }
    return $error;
  }

  function validateRaiting($raiting) {
    if ($raiting < 1 || $raiting > 5 ) {
      $error = "Please enter a valid raiting between 1-5";
    } else {
      $error = null;
    }
    return $error;
  }

  function displayAlert($message, $type) {
    echo '<div class="alert alert-' . $type .'" role="alert">';
      echo $message;
    echo '</div>';
  }

  function displayErrors($errors) {
    $message = join("<br>", $errors);
    displayAlert($message, "danger");
  }
?>