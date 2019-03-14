<?php
  $mysqli = new mysqli('localhost:3307','root','','crud');
  $sql= "SELECT * FROM makul"; // Menampung perintah SQL ke variabel ‘sql’
  $hasil = $mysqli->query($sql)
?>
<a style="margin-bottom: 15px" href="index.php?page=tambah-makul" class="btn btn-xs btn-primary">
    <span class="glyphicon glyphicon-book" title="Tambah">Tambah Matakuliah</span>
</a>
<table class="table" style="color: #428bca" id="DataTable">
  <thead>
    <tr>
      <th scope="col">Makul</th>
      <th scope="col">SKS</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($data = $hasil->fetch_array()){
    ?>
    <tr>
      <th scope="row"><?php echo $data['makul'] ?></th>
      <td><?php echo $data['sks'] ?></td>
      <td>
            <a href="index.php?page=edit-makul&id=<?php echo $data['id'] ?>" class="btn btn-xs btn-warning">
                <span class="glyphicon glyphicon-pencil" title="Edit"></span>
            </a>
            <a href="makul/delete.php?id=<?php echo $data['id'] ?>" class="btn btn-xs btn-danger">
                <span class="glyphicon glyphicon-trash" title="Hapus"></span>
            </a>
      </td>
    <?php } ?>
  </tbody>
</table>