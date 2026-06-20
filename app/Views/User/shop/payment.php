<?php $midtransConfig = new \Config\Midtrans(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Pembayaran</title>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $midtransConfig->clientKey ?>">
    </script>
</head>

<body>

    <h3>Memproses Pembayaran...</h3>

    <script>
    snap.pay('<?= $snap_token ?>', {
        onSuccess: function(result) {
            alert("Pembayaran berhasil!");
            window.location.href = "/";
        },
        onPending: function(result) {
            alert("Menunggu pembayaran!");
        },
        onError: function(result) {
            alert("Pembayaran gagal!");
            console.log(result);
        }
    });
    </script>

</body>

</html>