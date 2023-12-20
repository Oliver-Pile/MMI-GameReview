<?php
  $User = new User($Conn);
  if($_POST['reg']) {
    $email = htmlspecialchars($_POST["email"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = htmlspecialchars($_POST["password_confirm"]);

    $errors = validateReg($email, $username, $password, $confirm_password, $User);

    if ($errors) {
      displayErrors($errors);
    } else {
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
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $errors = validateLogin($email, $password);

    if ($errors) {
      displayErrors($errors);
    } else {
      $user = $User -> loginUser($email, $password);
        if ($user) {
          $_SESSION['is_loggedin'] = true;
          $_SESSION['user'] = $user;
          $_SESSION["success_message"] = "Login Successful - Welcome back.";
          header("Location: index.php?p=home");
        } else {
          $_SESSION["failure_message"] = "Login Failed - Please check the credentials";
          header("Location: index.php?p=login");
        }
    }
  }

  function displayErrors($errors) {
    $message = join("<br>", $errors);
    $_SESSION["failure_message"] = $message;
    header("Location: index.php?p=login");
  }

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

  function validateLogin($email, $password) {
    $errors = array();
    array_push($errors, validateEmail($email));
    array_push($errors, validatePasswordSet($password, "Password"));

    return array_filter($errors);
  }

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

  function validateEmailUnique($email, $User){
    $emailExists = $User -> emailExists($email);
    if($emailExists){
      $error = "An account as already been registered using that email";
    } else {
      $error = null;
    }
    return $error;
  }

  function validateUsername($username) {
    if ($username == "") {
      $error = "Username not set";
    } else {
      $error = null;
    }
    return $error;
  }

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

  function validatePasswordsMatch($password, $confirm_password) {
    if ($password !== $confirm_password) {
      $error = "Passwords do not match";
    } else {
      $error = null;
    }
    return $error;
  }
?>