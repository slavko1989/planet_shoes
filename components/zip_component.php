<div class="w3-panel">
  <div class="container mt-3">
  <h2>Zip code section</h2>
  <p>Add new code name</p>
  <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="text" class="form-control" placeholder="Enter code" id="pwd" name="zip_code_name">
  <button type="submit" class="btn btn-primary" name="zip_code">Add</button>
</form>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Zip code</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       <?php
            $zip->get_delete_zip();
            $show = $zip->show_zip();
            foreach($show as $show_zip){
            ?>
      <tr>
        <td><?php echo $show_zip->zip_code_id; ?></td>
        <td><?php echo $show_zip->zip_code_name; ?></td>
        <td><a href="zip_code.php?del_id=<?php echo $show_zip->zip_code_id;  ?>" class="link-dark"><i class="bi bi-x-circle-fill"></i></a>
          <a href="zip_edit.php?edit_id=<?php echo $show_zip->zip_code_id;  ?>" class="link-dark"><i class="bi bi-pencil-fill"></i></a>
    </td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
</div>  
  </div>