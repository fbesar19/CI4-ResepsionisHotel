<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>


<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3>
        <!-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="keuangan/print_keuangan_bulanan" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Print Laporan</a> -->
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4 mb-4">
            <div class="card shadow-sm border-left-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Pendapatan</span></div>
                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= rupiah('100000'); ?></span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4">
            <div class="card shadow-sm border-left-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Pengeluaran</span></div>
                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= rupiah('10000'); ?></span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4">
            <div class="card shadow-sm border-left-info py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Keuntungan</span></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?= rupiah('100000'); ?></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>

<?= $this->endSection(); ?>