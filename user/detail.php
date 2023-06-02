<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$user_panel = new Interface_class();
$sold = new Sold_View();
$interface->head();
$interface->top_c();
$user_panel->user_sidebar();
$user_panel->user_dashboard();
$sold->delete_from_sold();
$id_sold = $sold->view_all_sold_product();

?>
<div>
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-twothird">
        <h5 style="text-align: center;font-family: monospace;font-weight: bolder;margin-top: 5px;">You bought this product</h5>
        <table class="w3-table w3-striped w3-white">
          <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
          </thead>
          <tbody>
            <?php
            foreach($id_sold as $id){
            $id_p = $id->date_sold;
            $pid = $id->product_id;
            }
            if(isset($_SESSION["user_id"])){
            $show = $sold->view_sold_product(@$id_p);
            
            foreach($show as $bought){
            
            ?>
            
            <tr>
              <td><?php echo $bought->product_id; ?></td>
              <td><?php echo $bought->product_name; ?></td>
            </tr>
            <?php }  }?>
            
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
  <?php $interface->footer(); ?>