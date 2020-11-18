<h3>Form Edit Data Mahasiswa</h3>
<hr>
<?php
include "koneksi.php";
$sqlEdit = mysqli_query($konek, "SELECT * FROM mahasiswa WHERE npm='$_GET[npm]'");
$e=mysqli_fetch_array($sqlEdit);
?>
<form method="post" action="">
	<table>
		<tr>
			<td>NPM</td>
			<td><input type="text" name="txtNpm" value="<?php echo $e['npm']; ?>" readonly></td>
		</tr>
		<tr>
			<td>Nama Mahasiswa</td>
			<td><input type="text" name="txtNama"></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
				<select name="txtGender">
					<option value="<?php echo $e['gender']; ?>"><?php echo $e['gender']; ?></option>
					<option value="L">L</option>
					<option value="P">P</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="txtAlamat" value="<?php echo $e['alamat']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Simpan"></td>
		</tr>
	</table>
</form>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	$update = mysqli_query($konek, "UPDATE mahasiswa SET nama_mhs='$_POST[txtNama]',
														gender='$_POST[txtGender]',
														alamat='$_POST[txtAlamat]'
												WHERE npm='$_POST[txtNpm]'");

	if($update){
		header('location:data_mhs.php');
	}else{
		echo "Gagal mengupdate data...";
	}		
}
?>