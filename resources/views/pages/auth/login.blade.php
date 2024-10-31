<x-layouts.auth title="Masuk">
    <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-12 col-xl-4 mx-auto">
                <div class="card">
                    <div class="row flex-column-reverse flex-md-row">
                        <div class="col-md-12 ps-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2">
                                    {{ config('app.name') }}
                                </a>
                                <h5 class="text-muted fw-normal mb-4">Silahkan Login Dengan Akun Anda</h5>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <x-forms.input type="email" name="email" label="Email"
                                        placeholder="Masukkan email" required autofocus />

                                    <x-forms.input type="password" name="password" label="Password"
                                        placeholder="Masukkan password" required />

                                    <x-ui.base-button type="submit" class="w-100" color="primary">
                                        Masuk
                                    </x-ui.base-button>
                                </form>

                                <!-- Tombol Login dengan Metamask -->
                                <button id="loginweb3-button" class="btn btn-secondary w-100 mt-3">
                                    Login Dengan Metamask
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tambahkan CDN ethers.js -->


        @push('custom-scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('loginweb3-button').addEventListener('click', async () => {
                        if (typeof window.ethereum !== 'undefined') {
                            try {
                                // Meminta akses ke akun Metamask
                                await window.ethereum.request({
                                    method: 'eth_requestAccounts'
                                });
                                const web3 = new Web3(window.ethereum);
                                const accounts = await web3.eth.getAccounts();
                                const address = accounts[0];
                                const message = "Login dengan aplikasi Laravel Anda";

                                // Tanda tangan pesan
                                const signature = await web3.eth.personal.sign(message, address);

                                // Kirim data ke backend Laravel
                                const response = await fetch('/login/metamask', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        address: address,
                                        signature: signature,
                                        message: message
                                    })
                                });


                                const data = await response.json();

                                if (response.ok && data.success) {
                                    // Redirect atau tindakan setelah login berhasil
                                    window.location.href = '/';
                                } else {
                                    alert('Login gagal: ' + (data.message || 'Terjadi kesalahan'));
                                }
                            } catch (error) {
                                console.error(error);
                                if (error.code === 4001) {
                                    // User rejected the request
                                    alert('Permintaan ditolak oleh pengguna.');
                                } else {
                                    alert('Login dibatalkan atau terjadi kesalahan.');
                                }
                            }
                        } else {
                            alert('Metamask tidak terdeteksi. Silakan instal Metamask terlebih dahulu.');
                        }
                    });
                });
            </script>
        @endpush


    </div>
</x-layouts.auth>
