<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\PelangganModel;
use App\Models\ProdukModel;
use App\Models\TransaksiDetailModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $pelanggan;
    protected $produk;
    protected $transaksiDetail;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->pelanggan = new PelangganModel();
        $this->produk = new ProdukModel();
        $this->transaksiDetail = new TransaksiDetailModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Transaksi',
            'transaksi' => $this->transaksiModel->getTransaksiLengkap(),
            'pelanggan' => $this->pelanggan->findAll(),
            'produk' => $this->produk->findAll(),
        ];

        return view('Admin/transaksi/index', $data);
    }

    public function store()
    {
        $db = \Config\Database::connect();
        $db->transException(true);

        try {
            $idPelanggan = $this->request->getPost('id_pelanggan');
            $tanggal = $this->request->getPost('tanggal');
            $status = $this->request->getPost('status');
            $total = $this->request->getPost('total');
            $metodePembayaran = $this->request->getPost('metode_pembayaran');

            $idProduk = $this->request->getPost('id_produk');
            $qty = $this->request->getPost('qty');
            $hargaSatuan = $this->request->getPost('harga_satuan');

            $userId = user_id();

            $dataPelanggan = $this->pelanggan->find($idPelanggan);

            if (!$dataPelanggan) {
                return redirect()->to('admin/transaksi')
                    ->with('error', 'Pelanggan tidak ditemukan.');
            }

            if (empty($idProduk) || empty($qty)) {
                return redirect()->to('admin/transaksi')
                    ->with('error', 'Produk transaksi belum dipilih.');
            }

            if ((int) $total <= 0) {
                return redirect()->to('admin/transaksi')
                    ->with('error', 'Total transaksi masih 0. Pilih produk terlebih dahulu.');
            }

            $db->transBegin();

            $db->table('transaksi')->insert([
                'user_id' => $userId,
                'id_pelanggan' => $idPelanggan,
                'tanggal' => $tanggal,
                'total' => $total,
                'status' => $status,
                'tipe_transaksi' => 'Offline',
                'metode_pembayaran' => $metodePembayaran,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $transaksiId = $db->insertID();

            foreach ($idProduk as $key => $produkId) {
                $produk = $this->produk->find($produkId);

                if (!$produk) {
                    throw new \Exception('Produk tidak ditemukan.');
                }

                if ((int) $qty[$key] > (int) $produk['stok']) {
                    throw new \Exception('Stok produk ' . $produk['nama_produk'] . ' tidak mencukupi.');
                }

                $db->table('transaksi_detail')->insert([
                    'transaksi_id' => $transaksiId,
                    'id_produk' => $produkId,
                    'qty' => $qty[$key],
                    'harga_satuan' => $hargaSatuan[$key],
                ]);

                $this->produk->update($produkId, [
                    'stok' => (int) $produk['stok'] - (int) $qty[$key],
                ]);
            }

            $db->transCommit();

            return redirect()->to('admin/transaksi')
                ->with('success', 'Transaksi berhasil disimpan.');

        } catch (\Throwable $e) {
            $db->transRollback();

            return redirect()->to('admin/transaksi')
                ->with('error', 'Gagal menyimpan transaksi: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $dataTransaksi = $this->transaksiModel->find($id);

        if (empty($dataTransaksi)) {
            return redirect()->to('admin/transaksi')
                ->with('error', 'Data transaksi tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Transaksi',
            'transaksi' => $dataTransaksi,
        ];

        return view('Admin/transaksi/edit', $data);
    }

    public function update($id)
    {
        $this->transaksiModel->update($id, [
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('admin/transaksi')
            ->with('success', 'Status transaksi berhasil diupdate!');
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();

        $dataTransaksi = $this->transaksiModel->find($id);

        if (!$dataTransaksi) {
            return redirect()->to('admin/transaksi')
                ->with('error', 'Gagal menghapus! Data transaksi tidak ditemukan.');
        }

        $detailTransaksi = $this->transaksiDetail
            ->where('transaksi_id', $id)
            ->findAll();

        $db->transBegin();

        foreach ($detailTransaksi as $detail) {
            $dataProduk = $this->produk->find($detail['id_produk']);

            if ($dataProduk) {
                $stokBaru = (int) $dataProduk['stok'] + (int) $detail['qty'];

                $this->produk->update($detail['id_produk'], [
                    'stok' => $stokBaru,
                ]);
            }
        }

        $this->transaksiDetail
            ->where('transaksi_id', $id)
            ->delete();

        $this->transaksiModel->delete($id);

        if ($db->transStatus() === false) {
            $db->transRollback();

            return redirect()->to('admin/transaksi')
                ->with('error', 'Gagal menghapus transaksi.');
        }

        $db->transCommit();

        return redirect()->to('admin/transaksi')
            ->with('success', 'Transaksi berhasil dihapus dan stok produk dikembalikan.');
    }

    public function detail($id)
    {
        $transaksi = $this->transaksiModel->getDetailTransaksi($id);

        if (!$transaksi) {
            return redirect()->to('admin/transaksi')
                ->with('error', 'Data transaksi tidak ditemukan.');
        }

        $items = $this->transaksiModel->getItemTransaksi($id);

        $data = [
            'title' => 'Detail Transaksi',
            'transaksi' => $transaksi,
            'items' => $items,
        ];

        return view('Admin/transaksi/detail', $data);
    }

    public function invoice($id)
    {
        $transaksi = $this->transaksiModel->getDetailTransaksi($id);

        if (!$transaksi) {
            return redirect()->to('admin/transaksi')
                ->with('error', 'Data transaksi tidak ditemukan.');
        }

        $items = $this->transaksiModel->getItemTransaksi($id);

        $data = [
            'title' => 'Invoice',
            'transaksi' => $transaksi,
            'items' => $items,
        ];

        return view('Admin/transaksi/invoice', $data);
    }
}
