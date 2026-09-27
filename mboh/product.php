<?php
$kon = mysqli_connect("localhost", "root", "", "project");
$res = mysqli_query($kon, "select * from motor");
?>

<div class="relative">
    <!-- Background div -->
    <div class="bg-[url('./gb.jpeg')] bg-cover bg-center bg-no-repeat brightness-50 blur-lg fixed top-0 left-0 right-0 bottom-0 -z-10"></div>

    <!-- Content -->
    <div class="flex flex-wrap justify-center items-start gap-8 relative">
        <?php while ($x = mysqli_fetch_assoc($res)): ?>
            <div class="card w-[300px] min-h-[300px] overflow-hidden" id="<?= $x['id'] ?>">
                <!-- Image container with aspect ratio -->
                <div class="w-full h-[200px] overflow-hidden">
                    <img src="<?= $x['foto'] ?>" class="w-full h-full object-cover" alt="">
                </div>
                <div class="w-full h-full">
                    <p class="font-bold"><?= $x['motor'] ?></p>
                    <p class="font-semibold"><?= "Rp " . number_format($x['harga'], 0, ',', '.'); ?></p>
                    <p><?= $x['deskripsi'] ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- Purchase Button -->
    <div id="pur" class="hidden fixed bottom-10 left-1/2 transform -translate-x-1/2 z-20">
        <button class="bg-cyan-500 shadow-lg shadow-cyan-500/50 rounded p-2">Purchase Now</button>
    </div>

    <script>
        $(document).ready(function() {
            let selectedCards = [];
            $(".card").click(function() {
                let cardId = $(this).attr("id");
                $(this).toggleClass("border-4 border-indigo-600");
                if ($(this).hasClass("border-4")) {
                    if (!selectedCards.includes(cardId)) {
                        selectedCards.push(cardId);
                    }
                } else {
                    selectedCards = selectedCards.filter(id => id !== cardId);
                }
                if (selectedCards.length > 0) {
                    $("#pur").removeClass("hidden");
                } else {
                    $("#pur").addClass("hidden");
                }
                selectedCards.sort();
            });
            $("#pur").click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'pur.php',
                    data: {
                        ids: JSON.stringify(selectedCards)
                    },
                    success: function(msg) {
                        $("#pur").addClass("hidden");
                        $("#product").html(msg);
                    }
                });
            });
        });
    </script>
</div>