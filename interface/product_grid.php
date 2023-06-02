<!-- Product grid -->
<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$pro = new Prd_View();
$product = $pro->show_product();
$pag = $pro->view_pag($product,6);
$data = $pro->view_fetch_rez_for_pag();
?>
<div class="container-fluid">
  <div class="row">
    <?php
    foreach($data  as $prd){
    ?>
    <div class="col-sm-4">
      <img src="../planet_shoes/img_product/<?php echo $prd->product_img; ?>" style="width:300px;height: 200px;">
      <p><?php echo $prd->product_name; ?><br><b><?php echo $prd->product_price; ?></b>
        <button type="button" class="btn btn-primary" style="float: right;">
        <a href="../../../php_projects\planet_shoes\product/singl_product.php?singl_id=<?php echo $prd->product_id; ?>">View</a></button></p>
      </div>
      <?php } ?>
    </div>
    <ul class="pagination">
      <li class="page-item"><a href="" class="page-link">Previos</a></li>
      <?php foreach($pag as $pag_page) {?>
      <li class="page-item"><a href="../../../php_projects/planet_shoes/index.php?page=<?php echo $pag_page; ?>" class="page-link"><?php echo $pag_page;  ?></a></li>
      <?php } ?>
      <li class="page-item"><a href="" class="page-link">Next</a></li>
    </ul>
  </div>
  <div class="container-fluid">
    <div class="row">
      <?php include_once(__DIR__."../../js/images_slideshow.php"); ?>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <br><br><br><br><br><br>
      <?php include_once(__DIR__."../../js/images_slider.php"); ?>
      
    </div>
  </div>