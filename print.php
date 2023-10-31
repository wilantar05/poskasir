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
						<p><?php echo $toko['nama_toko'];?>
						<br/><?php echo $toko['alamat_toko'];?>
						<br/><?php 
						$date = new DateTime("now", new DateTimeZone('Singapore') );
						echo $date->format("d-m-Y, H:i:s");?>
						<br/>============================
						</p>
					</center>
					<table class="table table-bordered" style="width:100%;">
						<?php $no=1; foreach($hsl as $isi){?>
						<tr>
							<td><?php echo $isi['nama_barang'];?></td>
						</tr>
						<tr>
							<td>
								<?php echo $isi['jumlah']. " x ".number_format($isi['harga_jual']);?>
							</td>
							
							<td><?php echo number_format($isi['total']);?></td>
						</tr>
						<?php $no++; }?>
						
					</table>
					<br/>============================
					<table class="table table-bordered" style="width:100%;" align="right">
					<?php $hasil = $lihat -> jumlah(); ?>
							<tr>
								<td>Sub-Total</td>
								<td>Rp. <?php echo number_format(htmlentities($_GET['total']));?></td>
							</tr>
							<tr>
								<td>Diskon</td>
								<td>Rp. <?php echo number_format(htmlentities($_GET['diskon']));?></td>
							</tr>
							<tr>
								<td>Total</td>
								<td>Rp. <?php echo number_format(htmlentities($_GET['total']-$_GET['diskon']));?></td>
							</tr>
							<tr>
								<td>Bayar</td>
								<td>Rp. <?php echo number_format(htmlentities($_GET['bayar']));?></td>
							</tr>
							<tr>
								<td>Kembali</td>
								<td>Rp. <?php echo number_format(htmlentities($_GET['kembali']));?></td>
							</tr>
					</table>

					<div class="clearfix"></div>
					<center>
						<p>Terima Kasih!</p>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>
