<div class="w3-panel">
  <div class="container mt-3">
    <h2>Zip section edit</h2>
    
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Zip name</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $zip->get_edit_zip();
        if(isset($_GET['edit_id'])){
        $id = $_GET['edit_id'];
        $stmt = $zip->get_db()->prepare("select * from zip_code where zip_code_id=:zip_code_id");
        $stmt->bindValue("zip_code_id",$id);
        $stmt->execute();
        $edit = $stmt->fetch(PDO::FETCH_OBJ);
        ?>
        <tr>
          <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <td><input type="hidden" class="form-control"  name="zip_code_id" value="<?php echo $edit->zip_code_id; ?>"></td>
            <td><input type="text" class="form-control"  id="pwd" name="zip_code_name" value="<?php echo $edit->zip_code_name; ?>"></td>
            <td><button type="submit" class="btn btn-primary" name="ed_zip">EDIT</button></td>
          </form>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>