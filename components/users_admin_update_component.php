<div class="w3-panel">    
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="container mt-3">
        <h5>All users</h5>
        <img src="../../../php_projects/planet_shoes/images/p.jpg" style="width:100%" alt="">
      </div>
      <div class="container mt-3">
        <h5>Users</h5>
        <table class="table">
        	<thead>
        	<tr>
        		<th>Id</th>
        		<th>Name</th>
        		<th>Email</th>
        		<th>Password</th>
        		<th>Image</th>
            	<th>Some info</th>
        		<th>Actions</th>
        	</tr>
        	</thead>
        	<tbody>
        	<tr>
      	<?php
   	 	if(isset($_GET['ed_id'])){
     	$id = $_GET['ed_id'];
        $stmt = $user->get_db()->prepare("select * from users where user_id=:user_id");
        $stmt->bindValue("user_id",$id);
        $stmt->execute();
        $edit = $stmt->fetch(PDO::FETCH_OBJ);
    	?>
  		<form class="form-group" action="
  		../../../php_projects/planet_shoes/user/users_update_adminSection.php?ed_id=<?php echo $edit->user_id;  ?>
" method="post" enctype="multipart/form-data">
        <td><input type="hidden" class="form-control" id="pwd" name="user_id" value="<?php echo $edit->user_id; ?>"></td>
        <td><input type="text" class="form-control"  id="pwd" name="user_name" value="<?php echo $edit->user_name; ?>"></td>
        <td><input type="text" class="form-control"  id="pwd" name="user_email" value="<?php echo $edit->user_email; ?>"></td>
        <td><input type="text" class="form-control"  id="pwd" name="user_pass" value="<?php echo $edit->user_pass; ?>"></td>
        <td><img src="../../../php_projects/planet_shoes/user_img/<?php echo $edit->user_img; ?>" alt="" class="img-thumbnail" style="width: 60px;">
        <input type="file" name="user_img"  class="form-control" value="<?php echo $edit->user_img; ?>"></td>
        <td><textarea name="user_info"  class="form-control" id="textAreaExample1" rows="4"><?php echo $edit->user_info; ?></textarea></td>
        
  		<td><button type="submit" class="btn btn-primary" name="edit_user">Edit</button></td>
		</form>
     
      </tr>
  <?php } ?>
    </tbody>
  </table>
      </div>
    </div>
  
  </div>
