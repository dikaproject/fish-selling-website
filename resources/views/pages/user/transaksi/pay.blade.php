<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <!-- Include Midtrans Snap JS -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <h1>Proses Pembayaran</h1>
    <button id="pay-button">Bayar Sekarang</button>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result){
                    /* Anda bisa melakukan redirect setelah pembayaran sukses */
                    window.location.href = '/payment/success';
                },
                // Optional
                onPending: function(result){
                    /* Anda bisa melakukan redirect setelah pembayaran pending */
                    window.location.href = '/payment/pending';
                },
                // Optional
                onError: function(result){
                    /* Anda bisa melakukan redirect setelah pembayaran gagal */
                    window.location.href = '/payment/failed';
                }
            });
        });
    </script>
</body>
</html>
