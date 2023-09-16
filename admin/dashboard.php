/*Pocetna strana admin panela. Pojasnicu metode u njihovim klasama, ovde samo predstavljam koji rezultat one vracaju. 
Sve skripte su podeljene da bi na kraju bile grupisane i pozvane kao konacan rezultat na index stranici */

<?php 
/* Spl autoload function mozemo posmatrati kao registrator za klase. Kod nam cini bolje citlivijim,
daje nam prednost u tome da ne moramo svaki put da pozivamo putanju neke klase. 
A to moze da bude problem kada se rade veliki projekti gde moramo pozvati na nekoj stranici desetak klasa gde cemo za svaku klasu instancirsti objekte.   */
include_once(__DIR__."../../spl_autoload_class/autoload_class.php"); 

//insr=tance klasa za proizvode, prodate proizvode i korisnike
$count = new Prd_View();
$sold = new Sold_View();
$user = new UserView();

?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i><a href="../../../php_projects/planet_shoes/admin/index.php"> My Dashboard</a></b></h5>
  </header>
<div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class='fas fa-hand-holding-usd' style='font-size:36px'></i></div>
        <div class="w3-right">
           
          <h3><?php
            
              $sum = $count->show_sum_product(); //metoda nam vraca ukupnu cenu svih proizvoda koji  se prodaju, dodatno cu pojasniti metodu kada dodjemo do te klase
              foreach($sum as $all){
              $price = 'sum(product_price)';
              echo $all->$price."$"; 
            }
            ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Products</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class='fas fa-shopping-cart' style='font-size:36px'></i></div>
        <div class="w3-right">
          <h3><?php echo $sold->view_number_of_sold_prd(); ?></h3> //prikaz prodatih proizvoda
        </div>
        <div class="w3-clear"></div>
        <h4>Sold</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class='fas fa-comments-dollar' style='font-size:36px'></i></div>
        <div class="w3-right">
          <h3>
            <?php
              $s =  $sold->view_sold_price(); // prikaz ukupne zarade
              foreach($s as $m){
                $pr = $m->product_price;
                $q = $m->quantity;
                @$total  = array($q*$pr);
                @$total1 = array_sum($total);
                @$i += @$total1;
                
              }
              echo @$i."$";
            ?>
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Money earn</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>
            <?php
            echo $user->view_number_of_users(); //prikaz registrovanih korisnika
            ?>
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>
