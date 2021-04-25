<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Print - Laporan Pemasukan</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body>
    <div class="container-fluid center">
        <h2 class="text-center p-4">Laporan Harian</h2>
        <table class="table table-striped table-bordered" border="1">
            <tr style="text-align: center;">
                <thead style="background-color: #506c6a" class="text-white text-center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Pemesan</th>
                    <th>Nik Pemesan</th>
                    <th>No Kontak</th>
                    <th>List Pesanan</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                </thead>
            </tr>
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
                        <td><?= $data['list_pemesanan']; ?></td>
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
        </table>
    </div>
    <script language=javascript>
        function printWindow() {
            bV = parseInt(navigator.appVersion);
            if (bV >= 4) window.print();
        }
        printWindow();
    </script>
    <?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
    ?>
</body>

</html>