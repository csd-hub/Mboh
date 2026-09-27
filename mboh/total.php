<?php
session_start(); // Start the session to access session variables

// Debugging: Uncomment to see the received POST data
// var_dump($_POST);

// Check if required data is received
if (!isset($_POST['id']) || !isset($_POST['total']) || !isset($_POST['carabyr']) || !isset($_POST['nama'])) {
    die("Missing required data.");
}

// Extract data from POST
$selectedIds = json_decode($_POST['id'], true); // Array of selected motor IDs
$total = (float)$_POST['total']; // Total price
$carabayar = $_POST['carabyr']; // Payment method
$nama = $_POST['nama']; // Username

// Connect to the database
$kon = mysqli_connect("localhost", "root", "", "project");
if (!$kon) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Start a transaction to ensure data consistency
mysqli_begin_transaction($kon);

try {
    // Insert into `transaksi` table
    $queryTransaksi = "INSERT INTO transaksi (harga, carabayar) VALUES (?, ?)";
    $stmtTransaksi = mysqli_prepare($kon, $queryTransaksi);
    if (!$stmtTransaksi) {
        throw new Exception("Failed to prepare transaction query: " . mysqli_error($kon));
    }

    mysqli_stmt_bind_param($stmtTransaksi, "ds", $total, $carabayar);
    if (!mysqli_stmt_execute($stmtTransaksi)) {
        throw new Exception("Failed to execute transaction query: " . mysqli_stmt_error($stmtTransaksi));
    }

    // Get the last inserted transaction ID
    $idTransaksi = mysqli_insert_id($kon);

    // Insert into `detail` table for each selected motor
    foreach ($selectedIds as $idMotor) {
        // Fetch motor details
        $queryMotor = "SELECT motor, harga FROM motor WHERE id = ?";
        $stmtMotor = mysqli_prepare($kon, $queryMotor);
        if (!$stmtMotor) {
            throw new Exception("Failed to prepare motor query: " . mysqli_error($kon));
        }

        mysqli_stmt_bind_param($stmtMotor, "i", $idMotor);
        if (!mysqli_stmt_execute($stmtMotor)) {
            throw new Exception("Failed to execute motor query: " . mysqli_stmt_error($stmtMotor));
        }

        $resultMotor = mysqli_stmt_get_result($stmtMotor);
        if (!$resultMotor) {
            throw new Exception("Failed to get motor result: " . mysqli_error($kon));
        }

        $motor = mysqli_fetch_assoc($resultMotor);
        if (!$motor) {
            throw new Exception("Motor not found for ID: $idMotor");
        }

        // Insert into `detail` table
        $queryDetail = "INSERT INTO detail (nama, motor, harga, id_transaksi) VALUES (?, ?, ?, ?)";
        $stmtDetail = mysqli_prepare($kon, $queryDetail);
        if (!$stmtDetail) {
            throw new Exception("Failed to prepare detail query: " . mysqli_error($kon));
        }

        mysqli_stmt_bind_param($stmtDetail, "ssdi", $nama, $motor['motor'], $motor['harga'], $idTransaksi);
        if (!mysqli_stmt_execute($stmtDetail)) {
            throw new Exception("Failed to execute detail query: " . mysqli_stmt_error($stmtDetail));
        }
    }

    // Commit the transaction
    mysqli_commit($kon);

    // Success response
    echo "<div class='text-center text-green-500 font-semibold'>Payment successful! Thank you, $nama, for your purchase.</div>";
} catch (Exception $e) {
    // Rollback the transaction on error
    mysqli_rollback($kon);

    // Error response
    echo "<div class='text-center text-red-500 font-semibold'>Error: Exceeds our database range, please choose again</div>";
} finally {
    // Close the database connection
    mysqli_close($kon);
}
