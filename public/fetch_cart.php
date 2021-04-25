<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;
$list_item = "";

$output = '
<div class="table-responsive" id="order_table">

<table width="100%">
	
';
if (!empty($_SESSION["shopping_cart"])) {
	foreach ($_SESSION["shopping_cart"] as $keys => $values) {
		$output .=  '
				<tr>
					<td>' . $values["product_name"] . '</td>
					<td align="right" width="22%">' . $values["product_quantity"] . 'x <i style="cursor:pointer" class="fas fa-fw fa-close delete text-danger" id="' . $values["product_id"] . '"></i></td>
				</tr>
		';
		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;
		$list_item = $list_item . $values["product_name"] . $values["product_quantity"] . "." . ($values["product_quantity"] * $values["product_price"]) . ",";
	}
	$url = "<?= base_url('kasir/print_stuk/'" . $list_item . "); ?>";
	$output .= '
	</table>
	<hr>
	Rp ' . number_format($total_price, 2, ',', '.') . '
	';
} else {
	$output .= '
    	Tidak ada data
    ';
}
$output .= '</div>';
$data = array(
	'cart_details'		=>	$output,
	'total_price'		=>	'Rp ' . number_format($total_price, 2, ',', '.'),
	'total_item'		=>	$total_item
);

echo json_encode($data);
