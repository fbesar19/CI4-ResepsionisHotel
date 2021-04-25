<?php

$localhost = "localhost";
$user_db = "root";
$pass_db = "";
$db = "db_hotel";

$koneksi = mysqli_connect($localhost, $user_db, $pass_db, $db);

date_default_timezone_set('Asia/Jakarta');

session_start();

if (isset($_POST["action"])) {
	if ($_POST["action"] == "add") {
		if (isset($_SESSION["shopping_cart"])) {
			$is_available = 0;
			foreach ($_SESSION["shopping_cart"] as $keys => $values) {
				if ($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"]) {
					$is_available++;
					$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
				}
			}
			if ($is_available == 0) {
				$item_array = array(
					'product_id'               =>     $_POST["product_id"],
					'product_name'             =>     $_POST["product_name"],
					'product_price'            =>     $_POST["product_price"],
					'product_quantity'         =>     $_POST["product_quantity"]
				);
				$_SESSION["shopping_cart"][] = $item_array;
			}
		} else {
			$item_array = array(
				'product_id'               =>     $_POST["product_id"],
				'product_name'             =>     $_POST["product_name"],
				'product_price'            =>     $_POST["product_price"],
				'product_quantity'         =>     $_POST["product_quantity"]
			);
			$_SESSION["shopping_cart"][] = $item_array;
		}
	}

	if ($_POST["action"] == 'remove') {
		foreach ($_SESSION["shopping_cart"] as $keys => $values) {
			if ($values["product_id"] == $_POST["product_id"]) {
				unset($_SESSION["shopping_cart"][$keys]);
			}
		}
	}
	if ($_POST["action"] == 'empty') {
		$tanggal = date('d-m-Y');
		$total_price = 0;
		$list_item = "";
		$nama_pemesan = $_POST['nama_pemesan'];
		$nik_pemesan = $_POST['nik_pemesan'];
		$no_kontak_pemesan = $_POST['no_kontak_pemesan'];
		foreach ($_SESSION["shopping_cart"] as $keys => $values) {
			$min = "1";
			$id = $values["product_id"];
			$sql = mysqli_query($koneksi, "UPDATE kamar SET stok_kamar= stok_kamar - $min  WHERE id=$id");
			$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
			$list_item = $list_item . $values["product_name"] . " " . $values["product_quantity"] . " kamar,";
		}
		$query = mysqli_query($koneksi, "INSERT INTO pemesanan (tgl_pemesanan, nama_pemesan, nik_pemesan , no_kontak, list_pemesanan, total_biaya, status_bayar) VALUES ('$tanggal', '$nama_pemesan', '$nik_pemesan', '$no_kontak_pemesan', '$list_item', '$total_price', 'Belum dibayar')");

		unset($_SESSION["shopping_cart"]);
	}
}
