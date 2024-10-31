<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy {{ $product->name }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/web3@1.5.2/dist/web3.min.js"></script>
</head>
<body>
    <h1>Buy {{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Price: {{ number_format($product->price, 0, ',', '.') }} IDR</p>

    <label for="crypto">Choose Cryptocurrency:</label>
    <select id="crypto">
        <option value="ETH">ETH</option>
        <option value="BTC">BTC</option>
        <option value="USDT">USDT</option>
        <option value="TON">TON</option>
    </select>

    <button id="calculateButton">Calculate</button>

    <p>Equivalent Crypto: <span id="cryptoAmount">Select currency and calculate...</span></p>

    <button id="payButton" style="display:none;">Pay with MetaMask</button>

    <script>
        // Ambil CSRF token dari meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        document.getElementById('calculateButton').addEventListener('click', calculateCrypto);

        async function calculateCrypto() {
            const crypto = document.getElementById('crypto').value;
            const amountInIDR = {{ $product->price }};

            try {
                const response = await fetch('/api/crypto-rates');
                if (!response.ok) {
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                }

                const data = await response.json();
                if (data.success) {
                    const rate = data.rates[crypto] || 1;
                    let amountInCrypto = amountInIDR / rate;

                    if (amountInIDR === 0) {
                        amountInCrypto = 0;
                    }

                    document.getElementById('cryptoAmount').textContent = `${amountInCrypto.toFixed(8)} ${crypto}`;
                    document.getElementById('payButton').style.display = 'block';
                } else {
                    alert('Failed to fetch crypto rates');
                }
            } catch (error) {
                console.error('Error fetching crypto rates:', error);
                alert('Error: ' + error.message);
            }
        }

        document.getElementById('payButton').addEventListener('click', makeTransaction);

        async function makeTransaction() {
            const amountText = document.getElementById('cryptoAmount').textContent;
            const amount = parseFloat(amountText.split(' ')[0]);
            const crypto = document.getElementById('crypto').value;
            const account = (await ethereum.request({ method: 'eth_requestAccounts' }))[0];

            if (amount === 0) {
                completeOrderWithoutTransaction(account);
                return;
            }

            const params = {
                from: account,
                to: '0xb669F1928D7635d04B0D939BA8A5b1D1b8d52FdB', // Ganti dengan alamat wallet Anda
                value: Web3.utils.toHex(Web3.utils.toWei(amount.toString(), 'ether')),
            };

            try {
                const txHash = await ethereum.request({
                    method: 'eth_sendTransaction',
                    params: [params],
                });

                alert('Transaction sent! TxHash: ' + txHash);

                // Setelah transaksi berhasil, kirim data ke server untuk membuat order
                createOrder(account, crypto, amount, txHash);
            } catch (error) {
                console.error('Transaction failed:', error);
                alert('Transaction failed: ' + error.message);
            }
        }
        function completeOrderWithoutTransaction(account) {
    // Send request to server to complete free order
    fetch('/complete-free-order', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json', // Add this line
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            product_id: '{{ $product->id }}',
            user_wallet_address: account,
        }),
    })
    .then(response => {
        if (!response.ok) {
            // Handle HTTP errors
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Redirect to success page
            window.location.href = '/success';
        } else {
            alert('Failed to complete free order: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error: ' + (error.message || 'An error occurred'));
    });
}


        function createOrder(account, crypto, amount, txHash) {
            // Kirim data order ke server
            fetch('/create-order', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    product_id: '{{ $product->id }}',
                    crypto_currency: crypto,
                    user_wallet_address: account,
                    amount: amount,
                    transaction_hash: txHash,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirect ke halaman success
                    window.location.href = '/success';
                } else {
                    alert('Gagal membuat order: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error: ' + error.message);
            });
        }
    </script>
</body>
</html>
