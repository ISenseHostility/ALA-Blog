<?php
if(isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/connection.php";

    // Get form data
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // Server-side validation
        if (!isset($_POST['name']) || $_POST['name'] == '') {
            $errors['name'] = 'Genre cannot be empty';
        }
        if (!isset($_POST['email']) || $_POST['email'] == '') {
            $errors['email'] = 'Genre cannot be empty';
        }
        if (!isset($_POST['password']) || $_POST['password'] == '') {
            $errors['password'] = 'Genre cannot be empty';
        }
        // If data valid
        if (empty($errors)) {

            require_once "includes/connection.php";
            // create a secure password, with the PHP function password_hash()
            $password = password_hash($password, PASSWORD_DEFAULT);

            // store the new user in the database.
            $query = "INSERT INTO users (name, email, password)
                  VALUES ('$name', '$email', '$password')";
            $result = mysqli_query($db, $query) or die('Error: ' . mysqli_error($db) . ' with query ' . $query);
            // If query succeeded

            // Redirect to login page
            if ($result) {
                header('Location: inlog.php');
                exit;
            }


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
    <title>Registreren</title>
</head>
<body>

<section class="section">
    <div class="container content">
        <h2 class="title">Register With Email</h2>

        <section class="columns">
            <form class="column1" action="" method="post">

                <!-- Name -->
                <div class="field">
                    <div class="field-label is-normal">
                        <label class="label" for="name">Name</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="name" type="text" name="name" value="<?= $name ?? '' ?>" />
                                <span class="icon"><i class="fas"></i></span>
                            </div>
                            <p class="help">
                                <?= $errors['name'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
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

                <!-- Password -->
                <div class="field">
                    <div class="field-label">
                        <label class="label" for="password">Password</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="password" type="password" name="password"/>
                                <span class="icon"><i class="fas"></i></span>
                            </div>
                            <p class="help">
                                <?= $errors['password'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="field">
                    <div class="field-label"></div>
                    <div class="field-body">
                        <button class="button" type="submit" name="submit">Register</button>
                    </div>
                </div>

            </form>
        </section>

    </div>
</section>
<a class="button" href="index.php">&laquo; Go back to home</a>
</body>
</html>
