<?php
  // Helper responsible for validating the input when user attempts to add a review
  if($_POST['review']) {
    $Review = new Review($Conn);
    $content = htmlspecialchars($_POST["content"]);
    $raiting = (int) htmlspecialchars($_POST["raiting"]);

    $errors = validate($content, $raiting);

    // If errors, clear modal
    if ($errors) {
      $message = join("<br>", $errors);
      $_SESSION["failure_message"] = $message;
      header("Location: index.php?p=game&id=".$game_id);
    } else {
      // If valid create the review and re-render page for user.
      $reviewCreated = $Review -> addReviewForGame($content, $raiting, $game_id, $_SESSION['user']['id']);
      if($reviewCreated) {
        $_SESSION["success_message"] = "Review successfuly created";
        header("Location: index.php?p=game&id=".$game_id);
      } else {
        $_SESSION["failure_message"] = "An error occured, please try again later";
        header("Location: index.php?p=game&id=".$game_id);
      }
    }
  }

  // Parent function that validates content/raiting
  function validate($content, $raiting) {
    $errors = array();
    array_push($errors, validateContent($content));
    array_push($errors, validateRaiting($raiting));

    return array_filter($errors);
  }

  // Function to validate content is set
  function validateContent($content) {
    if ($content == "") {
      $error = "Content not set";
    } else {
      $error = null;
    }
    return $error;
  }

  // Function to validate raiting is set and between 1-5
  function validateRaiting($raiting) {
    if ($raiting < 1 || $raiting > 5 ) {
      $error = "Please enter a valid raiting between 1-5";
    } else {
      $error = null;
    }
    return $error;
  }

?>