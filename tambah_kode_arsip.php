<?php
require 'functions.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
}

if (isset($_POST['submit'])) {

	// cek apakah data berhasil ditambahkan atau tidak
	if (tambahKodeArsip($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'kode_arsip.php';
			</script>
		";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'tambah_kode_arsip.php';
			</script>
		";
	}
}

?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="vendor/bootstrap.min.css">

	<!-- CSS -->
	<link rel="stylesheet" href="vendor/style.css">
	<link rel="shortcut icon" type="text/css" href="img/Logo_BPPT.png">

	<title>Tambah Kode Arsip</title>
</head>

<body class="bg">
	<?php include 'include/navbar.php'; ?>

	<section id="tambah_arsip_dokumen" class="tambah_arsip_dokumen">
		<div class="container">
			<div class="row mb-2">
				<div class="col text-white p-1 rounded bg-supergraphicss text-center">
					<h2>Tambah Kode Arsip</h2>
				</div>
			</div>
			<div class="row">
				<div class="col bg-white rounded p-5 mb-2 shadow-box">
					<form action="" method="POST">
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="kode_arsip">Kode Arsip : </label>
									<input type="text" id="kode_arsip" name="kode_arsip" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="deskripsi_arsip">Deskripsi Arsip : </label>
									<input type="text" id="deskripsi_arsip" name="deskripsi_arsip" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary mt-3" name="submit">Tambah Kode Arsip
								<img src="img/baseline_send_white_18dp.png"></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<div class="footer">
		COPYRIGHT &copy; <?= date('Y'); ?> BALAI BESAR TEKNOLOGI KONVERSI ENERGI | Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a>
	</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="vendor/jquery-3.3.1.min.js"></script>
	<script src="vendor/jquery.autocomplete.min.js"></script>
	<script src="vendor/popper.min.js"></script>
	<script src="vendor/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			// Selector input yang akan menampilkan autocomplete.
			$("#kode_arsip").autocomplete({
				serviceUrl: "suggestion.php", // Kode php untuk prosesing data.
				dataType: "JSON", // Tipe data JSON.
				onSelect: function(suggestion) {
					$("#kode_arsip").val("" + suggestion.kode_arsip);
				}
			});

			// Selector input yang akan menampilkan autocomplete.
			$("#bidang").autocomplete({
				serviceUrl: "suggestion1.php", // Kode php untuk prosesing data.
				dataType: "JSON", // Tipe data JSON.
				onSelect: function(suggestion) {
					$("#bidang").val("" + suggestion.bidang);
				}
			});
			// Selector input yang akan menampilkan autocomplete.
			$("#sub_bidang").autocomplete({
				serviceUrl: "suggestion2.php", // Kode php untuk prosesing data.
				dataType: "JSON", // Tipe data JSON.
				onSelect: function(suggestion) {
					$("#sub_bidang").val("" + suggestion.sub_bidang);
				}
			});
		});
	</script>
</body>

</html>