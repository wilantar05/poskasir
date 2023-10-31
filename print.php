<?php 
	@ob_start();
	session_start();
	if(!empty($_SESSION['admin'])){ }else{
		echo '<script>window.location="login.php";</script>';
        exit;
	}
	require 'config.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();
	$hsl = $lihat -> penjualan();
?>
<html>
	<head>
		<title>Struk</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<center>
						<p><?php echo $toko['nama_toko'].", ".$toko['alamat_toko'];?></p>
					</center>
					<table class="table table-bordered" style="width:100%;">
						<tr>
							<td>Barang</td>
							<td>Qty</td>
							<td>Total</td>
						</tr>
						<?php $no=1; foreach($hsl as $isi){?>
						<tr>
							<td><?php echo $isi['nama_barang'];?></td>
							<td><?php echo $isi['jumlah'];?></td>
							<td><?php echo $isi['total'];?></td>
						</tr>
						<?php $no++; }?>
					</table>
					<div class="pull-right">
						<?php $hasil = $lihat -> jumlah(); ?>
						<br/>
						Total : Rp.<?php echo number_format($hasil['bayar']);?>
						<br/>
						Diskon : Rp.<?php echo number_format(htmlentities($_GET['diskon']));?>
						<br/>
						Bayar : Rp.<?php echo number_format(htmlentities($_GET['bayar']));?>
						<br/>
						Kembali : Rp.<?php echo number_format(htmlentities($_GET['kembali']));?>
					</div>
					<div class="clearfix"></div>
					<center>
						<p>Terima Kasih Telah berbelanja di toko kami !</p>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>
