<div id="ordersBtn">
  <h2>Order Details</h2>

  <?php
    include_once "../config/dbconnect.php";

    $sql = "SELECT * FROM transaksi
            JOIN detail ON transaksi.id = detail.id_transaksi";

    $result = $conn->query($sql);
  ?>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Customer</th>
        <th>Bike</th>
        <th>Price</th>
        <th>Payment Method</th>
      </tr>
    </thead>

    <tbody>
      <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
      ?>

      <tr>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["motor"] ?></td>
        <td><?= $row["harga"] ?></td>
        <td><?= $row["carabayar"] ?></td>
      </tr>

      <?php
          }
        } else {
      ?>

      <tr>
        <td colspan="4">Belum ada transaksi.</td>
      </tr>

      <?php
        }
      ?>
    </tbody>
  </table>
</div>