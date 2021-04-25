<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#modalTambah">Tambah Data Kamar</button>

    <!-- tabel -->
    <div class="card shadow-sm">
        <div class="card-header py-3">
            <p class="text-dark-500 m-0 font-weight-bold">Daftar Kamar</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kamar</th>
                            <th>Jenis Kamar</th>
                            <th>Stok Kamar</th>
                            <th>Harga Sewa</th>
                            <th>Maksimum Penghuni</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        <?php
                        $no = 1;
                        foreach ($kamar as $data) :
                            $id = $data['id'];
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama_kamar']; ?></td>
                                <td><?= $data['jenis_kamar']; ?></td>
                                <td><?= $data['stok_kamar']; ?></td>
                                <td><?= rupiah($data['harga_sewa']); ?></td>
                                <td><?= $data['maksimal_penghuni']; ?></td>
                                <td>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete<?= $id ?>">Hapus</button>
                                </td>
                            </tr>

                            <!-- Modal Delete -->
                            <div class="modal fade mt-5 pt-5" id="modalDelete<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Pengumpulan</h5>
                                        </div>
                                        <form action="<?= base_url('/kamar/delete_kamar/' . $id); ?>" method="post">
                                            <div class="modal-body">
                                                <p>Apakah anda ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Konfirmasi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal -->
                        <?php endforeach;
                        if ($no == 1) { ?>
                            <tr>
                                <td colspan="6" align="center">Tidak ada data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- batas tabel -->

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penggalangan Donasi</h5>
                </div>
                <form action="<?= base_url('/kamar/save_kamar/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="productname"><strong>Nama Kamar</strong></label>
                            <input class="form-control" type="text" placeholder="Masukan kamar" name="nama_kamar">

                        </div>

                        <div class="form-group mb-3">
                            <label for="productname"><strong>Jenis Kamar</strong></label>
                            <select class="form-control" name="jenis_kamar">
                                <option value="Standar">Standar</option>
                                <option value="Luxury">Luxury</option>
                                <option value="Ordinary">Ordinary</option>
                            </select>
                            <!-- <input class="form-control" type="text" placeholder="Masukan jenis kamar" name="jenis_kamar" required> -->
                        </div>

                        <div class="form-group mb-3">
                            <label for="productname"><strong>Stok Kamar</strong></label>
                            <input class="form-control" type="text" placeholder="Masukan stok kamar" name="stok_kamar">
                        </div>

                        <div class="form-group mb-3">
                            <label for="productname"><strong>Harga Sewa</strong></label>
                            <input class="form-control" type="text" placeholder="Masukan harga sewa" name="harga_sewa">
                        </div>

                        <div class=" form-group mb-3">
                            <label for="productname"><strong>Maksimal Penghuni</strong></label>
                            <input class="form-control" type="text" placeholder="Masukan maksimal penghuni" name="maksimal_penghuni">
                        </div>

                        <div class="form-group mb-3">
                            <label for="productname"><strong>Pilih Foto</strong></label>
                            <input class="form-control" type="file" name="gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="submit" class="btn btn-primary">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Modal -->
</div>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>
<?= $this->endSection(); ?>