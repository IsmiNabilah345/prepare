<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengirim;
use App\Models\Penerima;
use App\Models\Produk;
use App\Models\Pengiriman;
use App\Models\Tracking;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function showForm()
    {
        return view('pages.order');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            // pengirim
            'nama_pengirim' => 'required|string|max:255',
            'alamat_pengirim' => 'required|string|max:255',
            'kota_pengirim' => 'required|string|max:100',
            'kode_pos_pengirim' => 'required|numeric',
            'telp_pengirim' => 'required|string|max:20',
            // penerima
            'nama_penerima' => 'required|string|max:255',
            'alamat_penerima' => 'required|string|max:255',
            'kota_penerima' => 'required|string|max:100',
            'kode_pos_penerima' => 'required|numeric',
            'telp_penerima' => 'required|string|max:20',
            // paket
            'jumlah_produk' => 'required|numeric|min:1',
            'berat_kiriman' => 'required|numeric|min:1',
            'volume_produk' => 'nullable|numeric|min:0',
            'ket_produk' => 'nullable|string|max:255',
            'layanan' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            // simpan pengirim
            $pengirim = \App\Models\Pengirim::create([
                'nama_pengirim' => $validated['nama_pengirim'],
                'alamat_pengirim' => $validated['alamat_pengirim'],
                'kota_pengirim' => $validated['kota_pengirim'],
                'kode_pos' => $validated['kode_pos_pengirim'],
                'telp_pengirim' => $validated['telp_pengirim'],
            ]);
            // simpan penerima
            $penerima = \App\Models\Penerima::create([
                'nama_penerima' => $validated['nama_penerima'],
                'alamat_penerima' => $validated['alamat_penerima'],
                'kota_penerima' => $validated['kota_penerima'],
                'kode_pos' => $validated['kode_pos_penerima'],
                'telp_penerima' => $validated['telp_penerima'],
            ]);
            // generate nomor resi unik
            $prefix = 'YKB-' . now()->format('Ymd') . '-';
            do {
                $resi = $prefix . strtoupper(Str::random(6));
            } while (\App\Models\Pengiriman::where('no_resi', $resi)->exists());
            // simpan produk
            $produk = \App\Models\Produk::create([
                'jumlah_produk' => $validated['jumlah_produk'],
                'berat_kiriman' => $validated['berat_kiriman'],
                'berat_asli' => $validated['berat_kiriman'],
                'volume_produk' => $validated['volume_produk'] ?? 0,
                'ket_produk' => $validated['ket_produk'] ?? '',
                'no_resi' => $resi,
            ]);
            // simpan pengiriman (order utama)
            // $pengiriman = \App\Models\Pengiriman::create([
            //     'no_resi' => $resi,
            //     'id_produk' => $produk->id,
            //     'id_kurir' => null, // belum ditugaskan
            //     'id_penerima' => $penerima->id_penerima,
            //     'tanggal_kirim' => null,
            //     'status' => 'belum dikirim',
            //     'layanan' => $validated['layanan'], 
            //     'tipe_kendaraan' => 'motor',
            //     'estimasi_sampai' => null,
            //     'catatan' => null,
            // ]);
            DB::commit();
            return redirect()->route('home')->with('success', 'Order berhasil dibuat! Nomor Resi: ' . $resi);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal membuat order: ' . $e->getMessage()])->withInput();
        }
    }
}
