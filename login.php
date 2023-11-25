
<?php
  require_once("Includes/config.php");
  require_once("Includes/session.php");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Perform your login validation here
    $query = "SELECT * FROM user WHERE email = '$email' AND pass = '$password'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Successful login
        $_SESSION['email'] = $email; // Store user email in the session if needed
        header("Location: index.php"); // Redirect to the index page or any other page
        exit();
    } else {
        // Failed login
        echo '<script>alert("Invalid email or password. Please try again.");</script>';
    }
}
  ?>

<form action="index.php" class="navbar-form navbar-right" role="form" method="post">
    <div class="form-group">
        <input type="text" placeholder="Email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <input type="password" placeholder="Password" name="pass" id="pass" class="form-control" required>
    </div>
    <button type="login_submit" class="btn btn-success" onclick=" validateForm();">Sign In</button>
</form>

