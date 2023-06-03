<div class="w3-panel">
  <div class="container mt-3">
  <h2>Sold section</h2>
              
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Product name</th>
        <th>Price</th>
        <th>Images</th>
        <th>User name</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
          <?php
        if (is_array($show) || is_object($show))
          {
        foreach($show as $admin_view_sold){

        ?>
      <tr>
    
        <td><?php echo $admin_view_sold->sold_id;?></td>
        <td><?php echo $admin_view_sold->product_name;?></td>
        <td><?php echo $admin_view_sold->product_price;?></td>
           <td><img src="../../../php_projects/planet_shoes/img_product/<?php echo $admin_view_sold->product_img;  ?>" class="d-block ui-w-40 ui-bordered mr-4" alt="" 
              style="width: 40px;height: 40px;"></td>
        <td><a href=""><?php echo $admin_view_sold->user_name;?></a></td>
        <td>

          <?php
          
            if($admin_view_sold->sold_status == 0){
              echo'<div class="alert alert-secondary">
                <strong>Pending</strong>
                </div>';
              }elseif($admin_view_sold->sold_status == 1){
                echo'
                 <div class="alert alert-success">
                <strong>Shifted!</strong>
                </div>';
              }
              elseif($admin_view_sold->sold_status == 2){
                echo'
                <div class="alert alert-warning">
                <strong>Canceled</strong>
                </div>';
              }
              ?> 
          </td>
          <td>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form_status">
          <input type="hidden" class="form-control" id="sold_id" name="sold_id" value="<?php echo $admin_view_sold->sold_id; ?>">

          <select name="sold_status" class="form-control">
            <option value="0">Pending</option>
            <option value="1">Shifted</option>
            <option value="2">Cancel</option>
          </select>


          <button type="submit"  id="click_to_change_status" name="edit_status">Ok!</button>
        </form>
        <script>
          $(function(){
            $("#click_to_change_status").click(function(){
              var sold_status = $("#number").val();
              $.post("sold.php",{ sold_status:sold_status})
              .done(function(data){
                
                  window.location = "sold.php";
                

              });

            });
          });
        </script>
      </td>
      </tr>
      <?php } }?>
    </tbody>
  </table>
</div>  
  </div>