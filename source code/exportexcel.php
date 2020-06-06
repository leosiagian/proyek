<?php  
	require 'koneksi.php';
	$DaftarPesanan = getAllpesanan();
	$awal = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scal=1.0">
	<title>
		Export Data Penjualan
	</title>
</head>
<body>
	<?php  
		header('Content-Type: application/vnd-ms-excel');
		header('Content-Disposition: attachment; filename= Data_Penjualan.xls');
	?>

	<center>
		<h2 style="font-family: Times New Roman">
			Data Hasil Penjualan LASER SHOPPING
		</h2>
	</center>

	<table border="1">
		<tr style="font-family: Maiandra GD">
			<th><strong>No</strong></th>
            <th></strong>Username</strong></th>
            <th></strong>Nomor Telp</strong></th>
            <th></strong>Kode Produk</strong></th>
            <th></strong>Nama Produk</strong></th>
            <th></strong>Jumlah Pesanan</strong></th>
            <th></strong>Tanggal Pengiriman</strong></th>
            <th></strong>Harga</strong></th>
		</tr>
		<?php  
			foreach ($DaftarPesanan as $Pesanan){
		?>
		<tr style="font-family: Arial Narrow">
			<td><?= $awal++ ?></td>
	        <td><?= $Pesanan['username'] ?></td>
	        <td><?= $Pesanan['nomor_telepon'] ?></td>
	        <td><?= $Pesanan['kode_produk'] ?></td>
	        <td><?= $Pesanan['nama_produk'] ?></td>
	        <td><?= $Pesanan['jlh_barang_pesanan'] ?></td>
	        <td><?= $Pesanan['tgl_pengiriman'] ?></td>
	        <td><?= $Pesanan['harga'] ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>