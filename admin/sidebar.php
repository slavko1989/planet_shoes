

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>
      <?php 
      if($_SESSION["admin"]=="admin" && isset($_SESSION["user_id"])){
      ?>
    Welcome, <strong><?php echo $_SESSION["user_name"];?>
    <img src="../user_img/<?php echo $_SESSION['img']; ?>" class="w3-circle w3-margin-right" style="width:46px">
</strong> <?php  ?></span><br>
      
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="../user/users_admin_section.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Users</a>
    <a href="../category/category.php" class="w3-bar-item w3-button w3-padding"> Categorys</a>
    <a href="../brand/brand.php" class="w3-bar-item w3-button w3-padding"> Brands</a>
    <a href="../gender/gender.php" class="w3-bar-item w3-button w3-padding"> Genders</a>
    <a href="../product/product.php" class="w3-bar-item w3-button w3-padding"> Products</a>
    <a href="../sold_product/sold.php" class="w3-bar-item w3-button w3-padding"> Sold</a>
    <a href="../zip_code/zip_code.php" class="w3-bar-item w3-button w3-padding"> Zip code</a>
    <a href="../admin/logout.php" class="w3-bar-item w3-button w3-padding"> Logout</a><br><br>
  </div>

<?php }else{
  echo "you dont have permission";
} ?>
</nav>