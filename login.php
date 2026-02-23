<?php
include 'db.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password,$user['password'])){
            $_SESSION['user']=$username;
            header("Location: dashboard.php");
        } else {
            echo "Wrong password!";
        }
    } else {
        echo "User not found!";
    }
}
?>

<form method="POST">
<h2>PoultryPro Login</h2>
<input type="text" name="username" placeholder="Username" required><br><br>
<input type="password" name="password" placeholder="Password" required><br><br>
<button name="login">Login</button>
</form>
