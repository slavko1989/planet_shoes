 <?php
//nasledjuemo brand controller klasu
include_once(__DIR__ ."../../classes/brand.class.php");
class Brand_View extends Brand_Controller{

    public function __construct()
    {
        parent::__construct();
    }
  public function show_brand(){ 
        return $this->get_brand();// pozivamo iz nasledjene klase metodu sa kljucnom recju this
    }
     public function show_brand_id(){ // metoda nam vraca brand po id-ju
        if(isset($_GET["brand_id"])){ //proveramo ako je prikupljen podatak sa get metodom i ima vrednost id, vracamo metodu koju smo kreirali u brand controlleru
            $brand_id = $_GET["brand_id"];
            return $this->get_brand_id($brand_id);
        }
    }

    public function add_brand_view(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){ //ako je metoda magic method post, i ako je issetovana post metoda za kreiranje novog brenda mozemo da izvrsimo radnju
            if(isset($_POST["add_brand"])){
                $this->add_brand($this->brand_name());// pozivamo metodu iz controllera, i dajemo vrednost metodi brand_name koja ce se kreirati u bazi
                echo "<p class='php_mess'>Added Successfully</p>";
            }
        }
    }
    public function get_delete_brandID(){
        if(isset($_GET['del_id'])){
            $del_id = $_GET['del_id'];
            if($this->delete_brand($del_id )){
                echo "<p class='php_mess'>Delete Successfully<p/>";
            }else{
                echo "<p class='php_mess_err'>Delete Failed<p/>";
            }
        }
    }
    public function get_edit_Brand(){
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            if(isset($_POST["ed_brand"])) {
                $this->edit_brand($this->brand_id(), $this->brand_name());
                echo "<p class='php_mess'>EDIT SUCCESSFULLY</p>";
            }else{
                echo "<p class='php_mess_err'>EDIT FAILED</p>";
            }
        }
    }
    
}
