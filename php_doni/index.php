<?php 
	//koneksi database//
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "dblatihan";

	$koneksi = mysqli_connect($server,$user,$pass,$database)or die(mysqli_error($koneksi));

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		$simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nis, nama, alamat, Kelas, ekskul)
										    VALUES ('$_POST[tnis]', 
										  		    '$_POST[tnama]', 
										  		 	'$_POST[talamat]', 
										  		 	'$_POST[tKelas]', 
										  		 	'$_POST[tekskul]')
										");
	if($simpan)
	{
		echo "<script>
				alert('Simpan data sukses!');
				document.location='index.php';
			</script>";			
	}
	else
	{
		echo "<script>
				alert('Simpan data gagal!');
				document.location='index.php';
			</script>";		
	}
 }

?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD Donny Rizky Kautsar XI RPL 4 05</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

	<h1 class="text-center">CRUD PHP Donny Rizky Kautsar</h1>
	<h2 class="text-center">XI RPL 4</h2>

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	     Form Input Data Siswa
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Nis</label>
	    		<input type="text" name="tnis"class="form-control" placeholder="Input Nis Anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama</label>
	    		<input type="text" name="tnama"class="form-control" placeholder="Input Nama Anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Alamat</label>
	    		<textarea class="form-control" name="talamat" placeholder="Input Alamat Anda"></textarea>
	    	
	    	</div>
	    	<div class="form-group">
	    		<label>Kelas</label>
	    		<select class="form-control" name="tkelas">
	    			<option value="<?=@$vkelas?>"><?=@$vkelas?></option>
	    			<option value="X">X</option>
	    			<option value="XI">XI</option>
	    			<option value="XII">XII</option>
	    		</select>
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Table -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	     Daftar Siswa
	  </div>
	  <div class="card-body">
	    
	  	<table class="table table-bordered table-striped">
	  		<tr>
	  			<th>No.</th>
	    		<th>Nis</th>
	    		<th>Nama</th>
	    		<th>Alamat</th>
	    		<th>Kelas</th>
	    		<th>Ekskul</th>
	    		<th>Modifikasi</th>
	  		</tr>
	  		<?php
	  			$no = 1;
	  			$tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_siswa desc");
	  			while ($data = mysqli_fetch_array($tampil)) : 
	  				
	  	

	  		?>
	  		<tr>
	  			<td><?=$no++;?></td>
	    		<td><?=$data['nis']?></td>
	    		<td><?=$data['nama']?></td>
	    		<td><?=$data['alamat']?></td>
	    		<td><?=$data['Kelas']?></td>
	    		<td><?=$data['ekskul']?></td>
	    		<td>
	    			<a href="index.php?hal=edit&id=<?=$data['id_siswa']?>" class="btn btn-warning"> Edit </a>
	    			<a href="index.php?hal=hapus&id=<?=$data['id_siswa']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	  		</tr>
	  	<?php endwhile; //penutup perulangan while//?>
	  	</table>

	  </div>
	</div>
	<!-- Akhir Card Table -->

</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>