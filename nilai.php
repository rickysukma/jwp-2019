<?php
  $mysqli = new mysqli('localhost:3307','root','','crud');
  $sql= "SELECT * FROM mahasiswa"; // Menampung perintah SQL ke variabel ‘sql’
  $hasil = $mysqli->query($sql)
?>
<!-- Button tambah -->
<!-- Table Mahasiswa -->
<table class="table" style="color: #428bca" id="DataTable">
  <thead>
    <tr>
      <th scope="col">NIM</th>
      <th scope="col">Nama Mahasiswa</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($data = $hasil->fetch_array()){
    ?>
    <tr>
      <th scope="row"><?php echo $data['nim'] ?></th>
      <td><?php echo $data['nama'] ?></td>
      <td>
            <a href="index.php?page=tambah-nilai&id=<?php echo $data['id'] ?>" class="btn btn-xs btn-warning">
                <span class="glyphicon glyphicon-pencil" title="Edit"></span>
            </a>
      </td>
    <?php } ?>
    </tr>
  </tbody>
</table>

