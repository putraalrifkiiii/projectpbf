<div class="modal fade" id="modalTambah">

    <div class="modal-dialog">

        <div class="modal-content bg-dark text-white">

            <form action="/transaksi/store" method="post">

                <div class="modal-header">
                    <h5>Tambah Transaksi</h5>
                </div>

                <div class="modal-body">

                    <input type="text"
                        name="nama_pelanggan"
                        class="form-control mb-3"
                        placeholder="Nama Pelanggan">

                    <input type="date"
                        name="tanggal"
                        class="form-control mb-3">

                    <input type="number"
                        name="total"
                        class="form-control mb-3"
                        placeholder="Total">

                    <select name="status" class="form-control">

                        <option value="Pending">Pending</option>
                        <option value="Selesai">Selesai</option>

                    </select>

                </div>

                <div class="modal-footer">

                    <button type="submit"
                        class="btn btn-info">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>