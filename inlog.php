<?php
session_start();

$login = false;
// Is user logged in?
if (isset($_SESSION['loggedInUser'])) {
    $login = true;
}

if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/connection.php";

    // Get form data
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    // Server-side validation
    $errors = [];
    if ($email == '') {
        $errors['email'] = 'Please fill in your email.';
    }
    if ($password == '') {
        $errors['password'] = 'Please fill in your password.';
    }

    // If data valid
    if (empty($errors)) {
        // SELECT the user from the database, based on the email address.
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $query);

        // check if the user exists
        if (mysqli_num_rows($result) == 1) {
            // Get user data from result
            $user = mysqli_fetch_assoc($result);

            // Check if the provided password matches the stored password in the database
            if (password_verify($password, $user['password'])) {
                $login = true;

                // Store the user in the session
                $_SESSION['loggedInUser'] = [
                    'id'    => $user['id'],
                    'name'  => $user['name'],
                    'email' => $user['email'],
                ];

                // Redirect to secure page
            } else {
                //error incorrect log in
                $errors['loginFailed'] = 'The provided credentials do not match.';
            }
        } else {
            //error incorrect log in
            $errors['loginFailed'] = 'The provided credentials do not match.';
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/dannyheader.css">
    <title>Log in</title>
</head>
<body>
<section class="section">
    <div class="container content">
        <h2 class="title">Log in</h2>

        <?php if ($login) { ?>
            <?php header('Location: dashboard.php'); ?>
        <?php } else { ?>

            <section class="columns">
                <form class="column1" action="" method="post">

                    <div class="field">
                        <div class="field-label">
                            <label class="label" for="email">Email</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input" id="email" type="text" name="email" value="<?= $email ?? '' ?>" />
                                    <span class="icon"><i class="fas"></i></span>
                                </div>
                                <p class="help">
                                    <?= $errors['email'] ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field-label">
                            <label class="label" for="password">Password</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input" id="password" type="password" name="password"/>
                                    <span class="icon"><i class="fas"></i></span>

                                    <?php if(isset($errors['loginFailed'])) { ?>
                                        <div class="notification">
                                            <button class="delete"></button>
                                            <?=$errors['loginFailed']?>
                                        </div>
                                    <?php } ?>

                                </div>
                                <p class="help">
                                    <?= $errors['password'] ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field-label"></div>
                        <div class="field-body">
                            <button class="button" type="submit" name="submit">Log in With Email</button>
                        </div>
                    </div>

                </form>
            </section>

        <?php } ?>

    </div>
    <a class="button" href="index.php">&laquo; Go back to home</a>
    <a class="button" href="register.php">&laquo; Register</a>
</section>
</html>