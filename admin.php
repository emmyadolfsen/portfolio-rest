<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <?php
if (isset($_GET['nouser'])) {
    $message = "<p class='error'>You have to login..</p>";
}

// Starta session-inloggning
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'emmy' && $password == 'password') {
        $_SESSION['username'] = $username;
        header("Location: http://localhost:8888/portfolio/portfolio-data/pub/");
    } else {
        $message = "<p class='alert alert-danger'>Ooops snubblade du på tangenterna...?</p>";
    }
}
?>
     <div class="w-50 p-5">
         <?php if(isset($message)) {
             echo $message;
         } ?>
        <form method="post" action="admin.php">
            <div class="form-group">
                <label for="username">Jag</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Lösen</label>
                <input type="text" name="password" id="password" class="form-control">
            </div>
            <input type="submit" value="Logga in" class="btn btn-dark">

        </form>
        <form>

</form>


</body>
</html>
  