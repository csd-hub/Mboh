<?php
session_start();
if (!$_SESSION['login']) {
    header("Location: login.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://kit.fontawesome.com/89dcf32ab0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <section class="relative h-screen w-full">
        <nav class="z-30 absolute w-full flex items-center justify-center gap-x-4 sm:gap-x-24 my-6 text-white italic font-bold md:text-[25px]" id="navbar">
            <a href="./index.php" class="text-white after:block after:h-0.5 after:w-0 after:bg-white after:transition-all after:duration-300 after:hover:w-full">ARRMoto</a>
            <a href="#" class="text-white after:block after:h-0.5 after:w-0 after:bg-white after:transition-all after:duration-300 after:hover:w-full" id="a">About Us</a>

            <a href="#" class="text-white after:block after:h-0.5 after:w-0 after:bg-white after:transition-all after:duration-300 after:hover:w-full" id="c">Contact</a>
            <a href="#" id="p" class="text-white after:block after:h-0.5 after:w-0 after:bg-white after:transition-all after:duration-300 after:hover:w-full">Product</a>
            <a href="logout.php" id="p" class="text-white after:block after:h-0.5 after:w-0 after:bg-white after:transition-all after:duration-300 after:hover:w-full"><i class="fa-solid fa-circle-user"></i></a>

        </nav>
        <section class="absolute z-10 flex-col justify-start  h-screen ml-12 pt-32" id="hero">
            <h1 class="text-white font-bold text-[45px] italic ">ARRMoto: <br>Find, Buy, Ride!</h1>
            <h2 class="text-white italic">ARR Moto Web adalah platform otomotif yang menyajikan berita terbaru, review produk. <br> Temukan informasi terkini dan rekomendasi terbaik untuk kebutuhan berkendara Anda.</h2>
        </section>
        <section id="product" class="absolute z-20 pt-32 w-full h-screen text-white text-justify"></section>
        <section id="about" class="absolute z-20 flex justify-center pt-32 w-full h-screen text-white gap-x-10 text-justify"></section>
        <section id="contact" class="absolute z-20 flex justify-center pt-32 w-full h-screen text-white gap-x-10 text-justify"></section>
        <!-- <div class="bg-[url('./gb.jpeg')] bg-cover bg-center bg-no-repeat brightness-50 w-full h-screen" id="gb"></div> -->
        <div class="bg-[url('./gb.jpeg')] bg-cover bg-center bg-no-repeat brightness-50 fixed top-0 left-0 right-0 bottom-0" id="gb"></div>
    </section>

    <script src="jquery.js"></script>
    <script>
        $(document).ready(function() {
            $("#p").click(function() {
                $("#product").show()
                $("#gb").hide()
                $("#hero").hide()
                $("#about").hide()
                $("#contact").hide()
                $.ajax({
                    url: 'product.php',
                    method: 'GET',
                    success: function(response) {
                        $("#product").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading product.php: ", error);
                    }
                });
            })

            $("#a").click(function() {
                $("#about").show()
                $("#gb").hide()
                $("#hero").hide()
                $("#product").hide()
                $("#contact").hide()
                $.ajax({
                    url: 'about.php',
                    method: 'GET',
                    success: function(response) {
                        $("#about").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading about.php: ", error);
                    }
                });
            })
        })
        $("#c").click(function() {
            $("#contact").show()
            $("#gb").hide()
            $("#hero").hide()
            $("#product").hide()
            $("#about").hide()
            $.ajax({
                url: 'contact.php',
                method: 'GET',
                success: function(response) {
                    $("#contact").html(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading about.php: ", error);
                }
            });
        })
    </script>
</body>

</html>