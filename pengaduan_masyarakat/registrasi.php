<div class="card" style="padding: 50px; width: 40%; margin: 0 auto; margin-top: 10%;">
	<h3 style="text-align: center;" class="orange-text">Daftar Akun</h3>
	<br><center><p>Sudah Punya Akun! <a href='index.php' target='_blank'>Masuk</a></p></center>

			<form method="POST">
				<div class="col s12 input-field">
					<label for="nik">NIK</label>
					<input id="nik" type="number" name="nik">
				</div>
				<div class="col s12 input-field">
					<label for="nama">Nama</label>
					<input id="nama" type="text" name="nama">
				</div>
				<div class="col s12 input-field">
					<label for="username">Username</label>		
					<input id="username" type="text" name="username"><br><br>
				</div>
				<div class="col s12 input-field">
					<label for="password">Password</label>
					<input id="password" type="password" name="password"><br><br>
				</div>
				<div class="col s12 input-field">
					<label for="telp">Telp</label>
					<input id="telp" type="number" name="telp"><br><br>
				</div>
				<div class="col s12 input-field">
					<input type="submit" name="simpan" value="Simpan" class="btn right">
				</div>
			</form>
</div>		
			<?php 
				if(isset($_POST['simpan'])){
					$password = md5($_POST['password']);

					$query=mysqli_query($koneksi,"INSERT INTO masyarakat VALUES ('".$_POST['nik']."','".$_POST['nama']."','".$_POST['username']."','".$password."','".$_POST['telp']."')");
					if($query){
						$username=$_POST['username'];
						$sql = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE username='$username' AND password='$password' ");
						$data = mysqli_fetch_assoc($sql);
						session_start();
						$_SESSION['username']=$username;
						$_SESSION['data']=$data;
						$_SESSION['level']='masyarakat';
						header('location:masyarakat/');
					}
				}
			 ?>