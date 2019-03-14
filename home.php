<?php
  $mysqli = new mysqli('localhost:3307','root','','crud');
  $sql= "SELECT * FROM mahasiswa"; // Menampung perintah SQL ke variabel ‘sql’
  $hasil = $mysqli->query($sql)
?>
<!-- Button tambah -->
<a style="margin-bottom: 15px" href="index.php?page=tambah-mahasiswa" class="btn btn-xs btn-primary">
    <span class="glyphicon glyphicon-user" title="Tambah">Tambah Mahasiswa</span>
</a>
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
            <a href="index.php?page=detail&id=<?php echo $data['id'] ?>" class="btn btn-xs btn-primary">
                <span class="glyphicon glyphicon-info-sign" title="Detail"></span>
            </a>
            <a href="edit.php?id=<?php echo $data['id'] ?>" class="btn btn-xs btn-warning">
                <span class="glyphicon glyphicon-pencil" title="Edit"></span>
            </a>
            <a href="delete.php?id=<?php echo $data['id'] ?>" class="btn btn-xs btn-danger">
                <span class="glyphicon glyphicon-trash" title="Hapus"></span>
            </a>
      </td>
    <?php } ?>
    </tr>
  </tbody>
</table>

