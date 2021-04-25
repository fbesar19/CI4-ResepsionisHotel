<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<div class="container">
    <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <!-- tabel -->
    <div class="card shadow-sm">
        <div class="card-header py-3">
            <p class="text-dark-500 m-0 font-weight-bold">Laporan Harian</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pemesan</th>
                            <th>Nik Pemesan</th>
                            <th>No Kontak</th>
                            <th>List Pesanan</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        <?php
                        $no = 1;
                        foreach ($pemesanan as $data) :
                            $tanggal = date('d-m-Y');
                            $id = $data['id_pemesanan'];
                            if ($data['status_bayar'] == 'Sudah dibayar' && $data['tgl_pemesanan'] ==  $tanggal) {
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['tgl_pemesanan']; ?></td>
                                    <td><?= $data['nama_pemesan']; ?></td>
                                    <td><?= $data['nik_pemesan']; ?></td>
                                    <td><?= $data['no_kontak']; ?></td>
                                    <td width="15%"><?= $data['list_pemesanan']; ?></td>
                                    <td><?= $data['total_biaya']; ?></td>
                                    <td><?= $data['status_bayar'] ?></td>
                                </tr>
                            <?php }
                        endforeach;
                        if ($no == 1) { ?>
                            <tr>
                                <td colspan="8" align="center">Tidak ada data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- batas tabel -->

</div>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $('#dataTable').DataTable();
</script>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>
<?= $this->endSection(); ?>