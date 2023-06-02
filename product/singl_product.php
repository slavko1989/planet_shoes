
  <!-- Product grid -->
<?php

include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_class();
$interface->head();
$interface->sidebar();
$interface->top_menu();

$cart = new Shop_View();
$wish = new Wish_View(); 
$cart->add_toCart_view();
$wish->add_toWish_view();

$pro = new Prd_View();

?>

  <div class="container-fluid">
    <div class="row" style="text-align: center;">
       <?php 
         if($singl = $pro->show_singl_product()){
     foreach($singl as $prd){ 
        ?>
      <div class="card" style="width:400px">
        <img class="card-img-top" src="../../../php_projects/planet_shoes/img_product/<?php echo $prd->product_img; ?>" alt="">
        <div class="card-body">
        <h4 class="card-title"><?php echo $prd->product_name; ?> / On state:<?php echo $prd->state; ?></h4>
        <p class="card-text">
          <?php echo $prd->product_text;
           echo $prd->product_price; 
        
        ?>
          
        </p>
       <?php  if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){ ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="shopping_cart_id">
                <input type="hidden" name="shopping_status" value="0">
                <input type="number" name="quantity"  min="0" max="100" step="1" value="1">
                <input type="hidden" name="user_id">
                <input type="hidden" name="product_id" value="<?php echo $prd->product_id; ?>">
                <input type="hidden" name="date_shop">
                <input type="submit" name="add_to_cart" value="ADD TO CART" class="btn btn-primary">
            </form><br>
             <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="wish_cart_id">
                <input type="number" name="quantity"  min="0" max="100" step="1" value="1">
                <input type="hidden" name="user_id">
                <input type="hidden" name="product_id" value="<?php echo $prd->product_id; ?>">
                <input type="hidden" name="date_shop">
                <input type="submit" name="add_to_wish" value="ADD TO WISH" class="btn btn-primary">
            </form>
            <?php }else{
                echo "please login if you want to shop";
            } ?>
        </div>
      </div>
       <?php } }?>

    </div>

  </div>

    <?php
  $interface->sub();
$interface->footer();
?>