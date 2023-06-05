<div>
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-twothird">
        <h5 style="text-align: center;font-family: monospace;font-weight: bolder;margin-top: 5px;">You bought this product</h5>
        <table class="w3-table w3-striped w3-white">
          <thead>
            
            <th>State</th>
            <th>City</th>
            <th>Streat</th>
            <th>Code</th>
            <th>Phone</th>
            <th>Date bought</th>
            <th>Product name</th>
            <th>Product price</th>
            <th>Photo</th>
            <th>Status</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php
            foreach($id_sold as $id){
                $d = $id->date_sold;
            }
            if(isset($_SESSION["user_id"])){
            $show = $sold->view_sold_detail_user($_SESSION["user_id"]);
            
            if(is_array($show) || is_object($show))
            {
            foreach($show as $bought){
            $status = $bought->sold_status;
            
            ?>
            <tr>
             
              <td><?php echo $bought->state; ?></td>
              <td><?php echo $bought->city; ?></td>
              <td><?php echo $bought->streat; ?></td>
              <td><?php echo $bought->p_code; ?></td>
              <td><?php echo $bought->phone; ?></td>
              <td><?php echo $bought->date_sold; ?></td>
              <td><?php echo $bought->product_name; ?></td>
              <td><?php echo $bought->product_price; ?></td>
              <td><img src="../img_product/<?php echo $bought->product_img; ?>" alt="" class="img-thumbnail" style="width: 60px;"></td>
              <td>
                <?php
                
                if($status == 0){
                echo'
                <div class="alert alert-secondary">
                  <strong>Panding</strong>
                </div>';
                }elseif($status == 1){
                echo'
                <div class="alert alert-success">
                  <strong>Shifted!</strong>
                </div>';
                }
                elseif($status == 2){
                echo'
                <div class="alert alert-warning">
                  <strong>Failed</strong>
                </div>';
                }
                ?>
              </td>
              <td>
                <a href="../../../php_projects/planet_shoes/user/user_bought.php?del_id=<?php echo $bought->sold_id; ?>"><i class="bi bi-trash3-fill"></i></a>
              </td>
            </tr>
            <?php } }  } ?>
            
          </tbody>
        </table>
      </div>
    </div>
    
  </div>