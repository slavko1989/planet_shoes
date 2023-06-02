
<?php

include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$brand_option = new Brand_View();
$interface = new Interface_class();
$interface->head();
$interface->sidebar();
$interface->top_menu();
$interface->img_header();
?>
<div class="container-fluid">
    <div class="row">
             <?php 
        if($product_brand = $brand_option->show_brand_id()){
        foreach($product_brand as $prd){
         ?>
        <div class="col-sm-4">
        
        
            <img src="../img_product/<?php echo $prd->product_img; ?>" style="width:300px;height: 200px;" class="rounded">
            <p><?php echo $prd->product_name; ?><br><b><?php echo $prd->product_price; ?></b>
            <button type="button" class="btn btn-primary" style="float: right;">
            <a href="../../../php_projects\planet_shoes\product/singl_product.php?singl_id=<?php echo $prd->product_id; ?>">View</a></button></p>
            
            
        </div>
        <?php } }?>
    </div>
</div>

<?php
$interface->sub();
$interface->footer();
?>



