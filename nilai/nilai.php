<?php
  $mysqli = new mysqli('localhost:3307','root','','crud');
  
  $sql= "SELECT * FROM makul LEFT JOIN nilai ON nilai.id_makul = makul.id LEFT JOIN mahasiswa ON mahasiswa.id=nilai.id_mahasiswa WHERE mahasiswa.id = $_GET[id]"; 
  $dataNilai = $mysqli->query($sql);

  $mahasiswa = "SELECT * FROM mahasiswa WHERE id = $_GET[id]";
  $hasil = $mysqli->query($mahasiswa) or die("Last error: {$mysqli->error}\n");
  while($data = $hasil->fetch_array()){ //memanggil data siswa
  	$nama = $data['nama'];
  	$id_mahasiswa = $data['id'];
?>
  <h2>Nilai Form <b><?php echo $nama; ?></b></h2>
  <form class="form-horizontal" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" for="makul">Mata Kuliah:</label>
      <div class="col-sm-10">
      	<input type="hidden" name="id_mahasiswa" value="<?php echo $data['id']?>">
      	<select required class="form-control" name="makul">
      		<option>- Pilih Mata Kuliah -</option>
        <?php
        	$makul = "SELECT * FROM makul";
        	$resultMakul = $mysqli->query($makul);
        	while ($dataMakul = $resultMakul->fetch_array()) {
        	 	?>
        	 		<option value="<?php echo $dataMakul['id'] ?>"><?php echo $dataMakul['makul'] ?></option>
        	 	<?php
        	 } 
        ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nilai">Nilai:</label>
      <div class="col-sm-10">          
        <input type="number" min="1" onchange="updateTextInput(this.value);" max="100" class="form-control" id="" required="" name="nilai">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="simpan" class="btn btn-default">
      </div>
    </div>
  </form>
</div>

<!-- Table nilai -->
<table class="table" style="color: #428bca" id="DataTable">
  <thead>
    <tr>
      <th scope="col">Makul</th>
      <th scope="col">Nilai</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($resultNilai = $dataNilai->fetch_array()){
    ?>
    <tr>
      <th scope="row"><?php echo $resultNilai['makul'] ?></th>
      <td><?php echo $resultNilai['nilai'] ?></td>
      <td>
            <a href="nilai/delete.php?delete=<?php echo $resultNilai['id_nilai'] ?>" class="btn btn-xs btn-danger">
                <span class="glyphicon glyphicon-trash" title="Hapus"></span>
            </a>
      </td>
    <?php } ?>
  </tbody>
</table>
<!--  -->
<?php } 
	if (isset($_POST['simpan'])) {
		$id_mahasiswa = $_POST['id_mahasiswa'];
		$id_makul = $_POST['makul'];
		$nilai = $_POST['nilai'];
		$save = "INSERT INTO nilai (id_mahasiswa,id_makul,nilai) VALUES ('$id_mahasiswa','$id_makul','$nilai')";
		$mysqli->query($save);
		echo "<script>window.location = 'index.php';</script>";
	}	
?>