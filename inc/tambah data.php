<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="calender/jquery-ui.css" type="text/css"></link>
	<title>Form Input Data Baru</title>
	<script type="text/javascript" src="calender/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="calender/jquery-ui.js"></script>
	<script type="text/javascript">
		$(function() {
			$("#date").datepicker({
				dateFormat:"yy/mm/dd",
				changeMoth:true,
				changeYear:true
			});
		});
	</script>
</head>
<body>
	<h2>_TAMBAH DATA_</h2>
	<a align=""></a>
<form method="post" action="crud_dasar/proses tambah data.php" name="">
	<table>
		<tr>
			<td>Nama</td><td>:</td><td><input type="text" name="nama"><br></td>
		</tr>
		<tr>
			<td>Alias</td><td>:</td><td><input type="text" name="alias"><br></td>
		</tr>
		<tr>
			<td>Jenkel</td><td>:</td>
			<td>
				<input type="radio" name="jenkel" value="1" checked="checked">Laki-Laki
				<input type="radio" name="jenkel" value="2">Perempuan
			</td>
		</tr>
			<tr>
			<td>Tanggal Lahir</td><td>:</td><td><input type="text" id="date" name="tgl_lahir"><br></td>
			</tr>
			<tr>
			<td>Status</td><td>:</td>
			<td>
				<select name="status">
					<option value="1">Masih segelan</option>
					<option value="2">Lagi di jodohin</option>
					<option value="3">Kawin duluan/digerebek hansip</option>
					<option value="4">Udah punya tanggungan</option>
					<option value="5">Kawin lar</option>
					<option value="6">Nikah sirih</option>
				</select>
			</td>
			</tr>
			<tr>
			<td>Pekerjaan</td><td>:</td><td><input type="text" name="pekerjaan"><br></td>
			</tr>
			<tr>
			<td>Hobi</td><td>:</td><td><textarea name="hobi" cols="50" rows="5"></textarea><br></td>
			</tr>
			<tr>
			<td>No Hp</td><td>:</td><td><input type="text" name="no_hp"><br></td>
			</tr>
			<tr>
			<td>Kepribadian</td><td>:</td><td><textarea name="kepribadian" cols="50" rows="5"></textarea><br></td>
			</tr>
			<tr>
				<td></td><td></td><td><input type="submit" name="Input" value="input"><br></td>
			</tr>
		</table>
	</form>


</body>
</html>