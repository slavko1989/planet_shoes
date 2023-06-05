<div>
  <div class="w3-panel">
    <?php
          
          if(isset($_GET['edit_user_info'])){
                $id = $_GET['edit_user_info'];
                $stmt = $view->get_db()->prepare("select * from user_info where user_info_id=:user_info_id");
                $stmt->bindValue("user_info_id",$id);
                $stmt->execute();
                $edit = $stmt->fetch(PDO::FETCH_OBJ);
    ?>
    
    <div class="container">
      <h2 style="color: darkred;">Add your informations for order</h2>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
          <input type="hidden" class="form-control" id="usr" name="user_info_id" value="<?php echo $edit->user_info_id; ?>">
          <input type="text" class="form-control" id="usr" name="state" value="<?php echo $edit->state; ?>">
          <input type="text" class="form-control" id="usr" name="city" value="<?php echo $edit->city; ?>">
          <input type="text" class="form-control" id="usr" name="streat" value="<?php echo $edit->streat; ?>">
          <input type="text" class="form-control" id="usr" name="phone" value="<?php echo $edit->phone; ?>">
          <input type="text" class="form-control" id="usr" name="p_code" value="<?php echo $edit->p_code; ?>">
          <textarea class="form-control" id="exampleFormControlTextarea3" rows="7" name="add_text" value="<?php echo $edit->add_text; ?>"></textarea>
          <input type="hidden" class="form-control" id="usr" name="user_id" value="<?php echo $edit->user_id; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="edit_info" value="CONFIRM">
      </form>
    <?php } ?>
      <hr style="color: black;">
      
    </div>
  </div>
</div>


</div>