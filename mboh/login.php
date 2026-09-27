<?php
session_start();
$kon = mysqli_connect("localhost", "root", "", "project");

// Redirect if already logged in
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit; // Ensure no further code is executed after redirection
}

// Handle login form submission
if (isset($_POST['login'])) {
    $u = $_POST['u'];
    $p = $_POST['p'];

    // Query to check user credentials
    $res = mysqli_query($kon, "SELECT * FROM login WHERE user='$u' AND password='$p'");

    if (mysqli_num_rows($res) > 0) {
        // Fetch user data
        $userData = mysqli_fetch_assoc($res);

        // Set session variables
        $_SESSION['login'] = true;
        $_SESSION['name'] = $userData['user']; // Store the username
        $_SESSION['role'] = $userData['role']; // Store the user role
        if ($_SESSION['role']  == "admin") {
            header("Location: dashadmin.php");
        } else {
            header("Location: index.php");
        }


        exit; // Ensure no further code is executed after redirection
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-[url('./logo.jpeg')] bg-cover bg-center bg-no-repeat ">

    <div class="w-full max-w-sm p-6 bg-white bg-opacity-50 backdrop-blur-md rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-700">Login</h2>

        <form method="post" onsubmit="return confirmLogin()">
            <div class="mt-4">
                <label class="block text-gray-700">Username</label>
                <input type="text" name="u" id="username" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter username" required>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" name="p" id="p" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter password" required>
                    <div class="flex items-center mt-3">
                        <input type="checkbox" id="check" class="w-5 h-5 text-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                        <label for="check" class="ml-2 text-gray-600">Show Password</label>
                    </div>
                </div>
            </div>

            <button type="submit" name="login" class="w-full mt-4 p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Login</button>
            <p class="text-center mt-2 text-gray-600">Don't have an account? <a href="register.php" class="text-blue-500 underline">Register</a></p>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#check").click(function() {
                let p = $("#p").attr("type");
                $("#p").attr("type", p === "password" ? "text" : "password");
            });
        });
    </script>

</body>

</html>