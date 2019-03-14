<div class="container">
  <h2>Mata Kuliah Form</h2>
  <form class="form-horizontal" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" for="makul">Mata Kuliah:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="makul" placeholder="Enter Mata kuliah" name="makul">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="sks">SKS:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="nama" placeholder="Enter Jumlah SKS" name="sks">
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

if (isset($_POST['simpan'])) {
    $makul = $_POST['makul'];
    $sks = $_POST['sks'];
    $mysqli = new mysqli('localhost:3307','root','','crud');
    $sql="INSERT INTO makul (makul, sks) VALUES ('$makul','$sks')";
    $mysqli->query($sql);
    header('location:index.php?page=makul');
    
}

?>
