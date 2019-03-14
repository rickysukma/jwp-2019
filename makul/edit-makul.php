<?php
  
  $mysqli = new mysqli('localhost:3307','root','','crud');
  $sql="SELECT * FROM makul WHERE id=$_GET[id]";
  $makul = $mysqli->query($sql);
  while ($data = $makul->fetch_array()) {
?>
<div class="container">
  <h2>Edit Mata Kuliah Form</h2>
  <form class="form-horizontal" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" for="makul">Mata Kuliah:</label>
      <div class="col-sm-10">
        <input type="text" value="<?php echo $data['makul'] ?>" class="form-control" id="makul" placeholder="Enter Mata kuliah" name="makul">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="sks">SKS:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" value="<?php echo $data['sks'] ?>" id="nama" placeholder="Enter Jumlah SKS" name="sks">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="simpan" class="btn btn-default">
      </div>
    </div>
  </form>
</div>
<?php 
}
if (isset($_POST['simpan'])) {
    $makul = $_POST['makul'];
    $sks = $_POST['sks'];
    $sql="UPDATE makul SET makul='$_POST[makul]', sks='$_POST[sks]' WHERE id='$_GET[id]'";
    $mysqli->query($sql);
    header('location:index.php?page=makul');
    
}

?>
