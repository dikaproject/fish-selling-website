<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use kornrunner\Signature\Signature;
use kornrunner\Ethereum\Address;
use kornrunner\Keccak;
use Elliptic\EC;

class Web3AuthController extends Controller
{
    public function login(Request $request)
    {
        $address = $request->input('address');
        $signature = $request->input('signature');
        $message = $request->input('message');

        // Hilangkan prefix '0x' dari signature jika ada
        $signature = str_replace('0x', '', $signature);

        // Ekstrak r, s, v dari signature
        $r = substr($signature, 0, 64);
        $s = substr($signature, 64, 64);
        $v = hexdec(substr($signature, 128, 2));

        if ($v >= 27) {
            $recid = $v - 27;
        } else {
            $recid = $v;
        }

        // Hash pesan
        $messageHash = Keccak::hash("\x19Ethereum Signed Message:\n" . strlen($message) . $message, 256);

        // Inisialisasi EC
        $ec = new EC('secp256k1');

        try {
            // Recover public key
            $publicKey = $ec->recoverPubKey($messageHash, ['r' => $r, 's' => $s], $recid);

            // Dapatkan address dari public key
            $publicKeyHex = $publicKey->encode('hex');
            $publicKeyBin = hex2bin($publicKeyHex);
            $derivedAddress = '0x' . substr(Keccak::hash(substr($publicKeyBin, 1), 256), 24);

            // Bandingkan address
            if (strtolower($derivedAddress) === strtolower($address)) {
                // Autentikasi pengguna
                $user = User::firstOrCreate(
                    ['wallet_address' => $address],
                    [
                        'email' => $address . '@gmail.com', // Sesuaikan sesuai kebutuhan
                        'password' => bcrypt(Str::random(12))
                    ]
                );

                Auth::login($user);

                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Alamat tidak cocok'], 401);
            }
        } catch (\Exception $e) {
            // Tangani error
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat verifikasi tanda tangan', 'error' => $e->getMessage()], 500);
        }
    }
}
