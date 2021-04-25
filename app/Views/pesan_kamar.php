<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!-- <button class="btn btn-primary mb-2">Tambah Data Kamar</button> -->
            <div class="row">
                <?php foreach ($kamar as $data) :
                    $id = $data['id'];
                ?>
                    <div class="col-md-4">
                        <div class="card rounded shadow-sm">
                            <img src="<?= base_url('foto_kamar/' . $data['gambar']) ?>" alt="">
                            <div class="m-3">
                                <h5><?= $data['nama_kamar']; ?></h5>
                                <p><?= rupiah($data['harga_sewa']); ?></p>
                            </div>
                            <?php if ($data['stok_kamar'] == 0) { ?>
                                <button class="btn btn-secondary btn-sm d-none d-sm-inline-block m-3" disabled>Kamar Habis</button>

                            <?php } else { ?>

                                <button class="btn btn-primary btn-sm d-none d-sm-inline-block m-3" data-toggle="modal" data-target="#TambahPesanan<?= $id; ?>">Pesan Kamar</button>

                            <?php } ?>
                        </div>
                    </div>

                    <!-- Modal Pemesanan -->
                    <div class="modal fade mt-5 pt-5" id="TambahPesanan<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah ke List</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">


                                        <label for="exampleFormControlInput1" class="form-label">Stok Kamar</label>
                                        <input type="text" name="quantity" class="form-control mb-3" value="<?= $data['stok_kamar'] ?>" disabled />

                                        <label for="exampleFormControlInput1" class="form-label">Masukan Lama Menginap/hari</label>
                                        <!-- <input type="number" class="form-control" id="quantity <?= $id; ?>" min="1" max="<?= $data['stok_kamar']; ?>" value="1"> -->

                                        <input type="text" name="quantity" id="quantity<?= $id; ?>" class="form-control" value="1" />

                                        <input type="hidden" name="hidden_name" id="name<?= $id; ?>" value="<?= $data['nama_kamar']; ?>">
                                        <input type="hidden" name="hidden_price" id="price<?= $id; ?>" value="<?= $data['harga_sewa']; ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <!-- <input type="button" name="add_to_cart" id="<?= $id; ?>" class="btn btn-primary" data-dismiss="modal">Konfirmasi</button> -->

                                    <input type="button" name="add_to_cart" id="<?= $id ?>" class="btn btn-primary add_to_cart" value="Tambahkan" data-dismiss="modal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal -->
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-3">

            <!-- penjualan hari ini -->

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Pemesanan Kamar</h5>
                    <span id="cart_details"></span>
                    <!-- <hr> -->
                    <!-- <span class="total_price">Rp. 0,00</span> -->
                    <input type="button" name="add_to_cart" id="" style="margin-top:5px;" class="btn btn-primary form-control mt-4" data-toggle="modal" data-target="#TambahOrderan" value="Selesai" />
                </div>
            </div> <!-- batas penjualan hari ini -->

            </strong>
            </p>
        </div>
    </div>
</div>


<!-- Modal Pemesanan -->
<div class="modal fade mt-5 pt-5" id="TambahOrderan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesan Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Pemesan</label>
                    <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control mb-3" placeholder="Masukan nama" required>

                    <label for="exampleFormControlInput1" class="form-label">NIK Pemesan</label>
                    <input type="text" name="nik_pemesan" id="nik_pemesan" class="form-control mb-3" placeholder="Masukan NIK" required>

                    <label for="exampleFormControlInput1" class="form-label">No Kontak Pemesan</label>
                    <input type="text" name="no_kontak_pemesan" id="no_kontak_pemesan" class="form-control mb-3" placeholder="Masukan no kontak pemesan" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <!-- <input type="button" name="add_to_cart" id="<?= $id; ?>" class="btn btn-primary" data-dismiss="modal">Konfirmasi</button> -->

                <input type="button" id="clear_cart" class="btn btn-primary" value="Tambahkan" data-dismiss="modal">
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal -->

<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        load_cart_data();

        function load_cart_data() {
            $.ajax({
                url: "fetch_cart.php",
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#cart_details').html(data.cart_details);
                    $('.total_price').text(data.total_price);
                    $('.badge').text(data.total_item);
                }
            });
        }

        $(document).on('click', '.add_to_cart', function() {
            var product_id = $(this).attr("id");
            var product_name = $('#name' + product_id + '').val();
            var product_price = $('#price' + product_id + '').val();
            var product_quantity = $('#quantity' + product_id).val();
            var action = "add";
            if (product_quantity > 0) {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price,
                        product_quantity: product_quantity,
                        action: action
                    },
                    success: function(data) {
                        load_cart_data();
                    }
                });
            } else {
                alert("lease Enter Number of Quantity");
            }
        });

        $(document).on('click', '.delete', function() {
            var product_id = $(this).attr("id");
            var action = 'remove';
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    action: action
                },
                success: function() {
                    load_cart_data();
                }
            })
        });

        $(document).on('click', '#clear_cart', function() {
            var action = 'empty';
            var nama_pemesan = $('#nama_pemesan').val();
            var nik_pemesan = $('#nik_pemesan').val();
            var no_kontak_pemesan = $('#nik_pemesan').val();
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    action: action,
                    nama_pemesan: nama_pemesan,
                    nik_pemesan: nik_pemesan,
                    no_kontak_pemesan: no_kontak_pemesan
                },
                success: function() {
                    load_cart_data();
                }
            });
        });

    });
</script>

<?= $this->endSection(); ?>