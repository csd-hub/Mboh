<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

$kon = mysqli_connect("localhost", "root", "", "project");

if (isset($_POST['r'])) {
    $username = $_POST['username'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if ($pass1 === $pass2) {
        $check = mysqli_query($kon, "SELECT user FROM login WHERE user = '$username'");
        if (mysqli_num_rows($check) > 0) {
            echo "<div class='text-center text-red-500 font-semibold'>Username sudah ada!</div>";
        } else {
            $res = mysqli_query($kon, "INSERT INTO login (user, password, role) VALUES('$username', '$pass1', 'user')");
            echo "<script>
                alert('You will be redirected!');
                window.location.href = 'login.php'; 
            </script>";
        }
    } else {
        echo "<div class='text-center text-red-500 font-semibold'>Password tidak sama!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="relative flex items-center justify-center min-h-screen bg-[url('./gb.jpeg')] bg-cover bg-center bg-no-repeat">

    <form class="z-10 bg-white bg-opacity-80 p-6 rounded-lg shadow-md w-full max-w-sm" method="post">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-4">Register</h2>

        <div class="mb-4">
            <label for="username" class="block text-gray-700">Username</label>
            <input type="text" name="username" id="username" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter username" required>
        </div>

        <div class="mb-4">
            <label for="p" class="block text-gray-700">Password</label>
            <div class="relative">
                <input type="password" name="pass1" id="p" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter password" required>
            </div>
        </div>

        <div class="mb-4">
            <label for="p2" class="block text-gray-700">Confirm Password</label>
            <div class="relative">
                <input type="password" name="pass2" id="p2" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Confirm password" required>
            </div>
        </div>

        <div class="flex items-center mb-4">
            <input type="checkbox" id="check" class="mr-2">
            <label for="check" class="text-gray-700">Show Password</label>
        </div>

        <button type="submit" name="r" class="w-full p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Register</button>
        <p class="text-center text-gray-600 mt-4">Already have an account? <a href="login.php" class="text-blue-500 underline">Login</a></p>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#check").click(function() {
                let p = $("#p").attr("type");
                let p2 = $("#p2").attr("type");
                let newType = (p === "password" && p2 === "password") ? "text" : "password";
                $("#p, #p2").attr("type", newType);
            });
        });
    </script>

</body>

</html>