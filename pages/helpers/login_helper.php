<?php
  // Helper responsible for validating the inputs when user attempts to register/login
  $User = new User($Conn);
  if($_POST['reg']) {
    // When register, sainitise inputs and validate
    $email = htmlspecialchars($_POST["email"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = htmlspecialchars($_POST["password_confirm"]);

    $errors = validateReg($email, $username, $password, $confirm_password, $User);

    if ($errors) {
      // Display errors if not valid
      displayErrors($errors);
    } else {
      // Valid so create user and display message if user succesfully created or not
      $userCreated = $User -> createUser($email, $username, $password);
      if($userCreated) {
        $_SESSION["success_message"] = "User created - Please login";
        header("Location: index.php?p=login");
      } else {
        $_SESSION["failure_message"] = "An error occured, please try again later";
        header("Location: index.php?p=login");
      }
    }
  } else if($_POST['login']) {
    // When login, sanitise the inputs and validate
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $errors = validateLogin($email, $password);

    if ($errors) {
      // Display errors if not valid
      displayErrors($errors);
    } else {
      // Check user credentials against the DB.
      $user = $User -> loginUser($email, $password);
        if ($user) {
          // If correct update session with user info and redirect to home
          $_SESSION['is_loggedin'] = true;
          $_SESSION['user'] = $user;
          $_SESSION["success_message"] = "Login Successful - Welcome back.";
          header("Location: index.php?p=home");
        } else {
          // If incorrect re-render the page with an error message - note not specifying which cred was wrong.
          $_SESSION["failure_message"] = "Login Failed - Please check the credentials";
          header("Location: index.php?p=login");
        }
    }
  }

  // Function that collates and displays error messages
  function displayErrors($errors) {
    $message = join("<br>", $errors);
    $_SESSION["failure_message"] = $message;
    header("Location: index.php?p=login");
  }

  // Parent function that validates all the registration fields
  function validateReg($email, $username, $password, $confirm_password, $User) {
    $errors = array();
    array_push($errors, validateEmail($email));
    array_push($errors, validateEmailUnique($email, $User));
    array_push($errors, validateUsername($username));
    array_push($errors, validatePasswordSet($password, "Password"));
    array_push($errors, validatePasswordSet($confirm_password, "Password Confirmation"));
    array_push($errors, validatePasswordsMatch($password, $confirm_password));

    return array_filter($errors);
  }

  // Parent function that validate all the login fields
  function validateLogin($email, $password) {
    $errors = array();
    array_push($errors, validateEmail($email));
    array_push($errors, validatePasswordSet($password, "Password"));

    return array_filter($errors);
  }

  // Function to validate email is set and in correct format
  function validateEmail($email) {
    if ($email == "") {
      $error = "Email not set";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = "Not a valid email address";
    } else {
      $error = null;
    }
    return $error;
  }

  // Function to validate email has not been registered already
  function validateEmailUnique($email, $User){
    $emailExists = $User -> emailExists($email);
    if($emailExists){
      $error = "An account as already been registered using that email";
    } else {
      $error = null;
    }
    return $error;
  }

  // Function to validate username is set
  function validateUsername($username) {
    if ($username == "") {
      $error = "Username not set";
    } else {
      $error = null;
    }
    return $error;
  }

  // Function to validate password is set and is not <8 chars
  function validatePasswordSet($password, $type) {
    if ($password == "") {
      $error = "$type not set";
    } else if (strlen($password) < 8) {
      $error = "$type must be longer than 8 characters";
    } else {
      $error = null;
    }
    return $error;
  }

  // Function to validate both passwords are equal
  function validatePasswordsMatch($password, $confirm_password) {
    if ($password !== $confirm_password) {
      $error = "Passwords do not match";
    } else {
      $error = null;
    }
    return $error;
  }
?>