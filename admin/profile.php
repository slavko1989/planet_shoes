/* Instancirali smo objekat User klase. Sesiji smo dali vrednost koja nam vraca kao rezultat da li je pokrenuta sesija za admin autentifikaciju i autorizaciju.
Ako je tvrdnja tacna provlacimo kroz petlju sve ostale podatke koje korisnik ima, u ovom slucaju admin. Ako pokusa neko d=roz url da ukuca putanju, 
dobice poruku da nema pravo biti na ovoj stranici.

U bazi imamo tri tabele, user, user_info, zip_code. Relacione tabele. User tabele sadrzi name, email, password i tip korisnika(da li je admin, guest.. tabela zip_code ili sifarnik)
U tabeli user info imamo podatke o korsniku gde zivi... 


<div class="w3-panel">
    <?php
    $view = new UserView();

    $view->delete_user();
    if($_SESSION["admin"]=='admin' && isset($_SESSION["user_id"])){
    $account = $view->show_user_account();
    foreach ($account as $admin)
    { ?>
    
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Profile photo</h5>
        <img src="../user_img/<?php echo $admin->user_img; ?>" style="width:100%" alt="">
      </div>
      <div class="w3-twothird">
        <h5>Your profile</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td><?php echo $admin->user_name; ?></td>
            <td><i>Name</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
            <td><?php echo $admin->user_email; ?></td>
            <td><i>Email</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
            <td><?php echo $admin->user_info; ?></td>
            <td><i>Informations</i></td>
          </tr>
         
        </table>
      </div>
    </div>
  <?php } }else{
    echo "you don't have permission";
  }?>
  </div>
