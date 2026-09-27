<?php
session_start(); // Start the session to access session variables

if (isset($_POST['ids'])) {
    $selectedIds = json_decode($_POST['ids']);
} else {
    echo 'No IDs received.';
    exit;
}

$kon = mysqli_connect("localhost", "root", "", "project");
$idList = array_map('intval', $selectedIds);

// Create query with WHERE IN to fetch multiple IDs
$idString = implode(',', $idList);
$query = "SELECT * FROM motor WHERE id IN ($idString)";
$res = mysqli_query($kon, $query);
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="jquery.js"></script>
</head>

<body class="relative">
    <!-- Background -->
    <div class="bg-[url('./gb.jpeg')] bg-cover bg-center bg-no-repeat brightness-50 blur-lg fixed top-0 left-0 right-0 bottom-0 -z-10"></div>

    <!-- Content -->
    <div id="pur" class="relative z-10">
        <!-- Display Selected Items -->
        <div class="flex flex-wrap justify-center items-start gap-8">
            <?php while ($x = mysqli_fetch_assoc($res)): ?>
                <div class="card w-[300px] min-h-[200px]" id="<?= $x['id'] ?>">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="<?= $x['foto'] ?>" class="w-full h-full object-cover" alt="">
                    </div>
                    <p class="font-bold">Nama Motor: <?= $x['motor'] ?></p>
                    <p class="font-semibold">Harga: <?= "Rp " . number_format($x['harga'], 0, ',', '.'); ?></p>
                </div>
                <?php $total += $x['harga']; ?>
            <?php endwhile; ?>
        </div>

        <!-- Total Price -->
        <div class="text-center my-6">
            <p class="text-xl font-semibold">Total Harga: <?= "Rp " . number_format($total, 0, ',', '.'); ?></p>
        </div>

        <!-- Payment Options -->
        <section class="w-full mx-8 mb-4">
            <h3 class="text-xl font-semibold text-white">Payment</h3>
            <div class="flex gap-x-8 mt-4">
                <!-- Credit Card -->
                <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-start">
                        <div class="flex h-5 items-center">
                            <input id="credit-card" aria-describedby="credit-card-text" type="radio" name="payment-method" value="credit-card" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                        </div>
                        <div class="ms-4 text-sm">
                            <label for="credit-card" class="font-medium leading-none text-gray-900 dark:text-white">Credit Card</label>
                        </div>
                    </div>
                </div>

                <!-- Payment on Delivery -->
                <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-start">
                        <div class="flex h-5 items-center">
                            <input id="pay-on-delivery" aria-describedby="pay-on-delivery-text" type="radio" name="payment-method" value="pay-on-delivery" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                        </div>
                        <div class="ms-4 text-sm">
                            <label for="pay-on-delivery" class="font-medium leading-none text-gray-900 dark:text-white">Payment on Delivery</label>
                        </div>
                    </div>
                </div>

                <!-- PayPal -->
                <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-start">
                        <div class="flex h-5 items-center">
                            <input id="paypal" aria-describedby="paypal-text" type="radio" name="payment-method" value="paypal" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                        </div>
                        <div class="ms-4 text-sm">
                            <label for="paypal" class="font-medium leading-none text-gray-900 dark:text-white">PayPal Account</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Confirm Payment Button -->
            <button class="bg-cyan-500 shadow-lg shadow-cyan-500/50 rounded p-2 mt-4" id="confirm-payment">Confirm Payment</button>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            var nama = <?= json_encode($_SESSION['name']); ?>; // Pass the session username
            var selectedIds = <?= json_encode($selectedIds); ?>;
            var total = <?= json_encode($total); ?>;

            $("#confirm-payment").click(function() {
                var paymentMethod = $("input[name='payment-method']:checked").attr("id");

                $.ajax({
                    url: 'total.php',
                    method: 'post',
                    data: {
                        id: JSON.stringify(selectedIds), // Send selected IDs as JSON string
                        nama: nama, // Send the username
                        total: total, // Send the total price
                        carabyr: paymentMethod // Send the payment method
                    },
                    success: function(response) {
                        $("#pur").html(response); // Update the content with the response
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error); // Log any errors
                    }
                });
            });
        });
    </script>
</body>

</html>