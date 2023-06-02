 
 <?php
 include_once(__DIR__."../../spl_autoload_class/autoload_class.php");

include_once(__DIR__."../../classes/sold.class.php");
class Sold_View extends Sold_Controller{
        

    public function __construct()
    {
        $this->cart = new Shop_View();
        parent::__construct();
    }
 
 public function admin_view_all_prd(){
    return $this->get_all_sold_product();
 }
  

    public function add_to_sold_product($user_id,$product_id,$status,$date,$q,$u_id){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST["order"])){
               if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
               $sold= $this->add_to_sold($user_id,$product_id,$status,$date,$q,$u_id);
               if($sold){
                 ?>
                  <script type="text/javascript">window.location.href="../../../php_projects/planet_shoes/user/user_bought.php";</script>
               <?php
               $this->cart->delete_all_from_cart(); 
           }else{
           //echo "please reg->login if you want to shop, thanks";
                
                }
            }
        }
    }
}

   
    public function delete_from_sold(){
         if(isset($_GET['del_id'])){
            $del_id = $_GET['del_id'];
            if($this->delete_sold_id($del_id)){
                echo "<p class='php_mess'>Delete Successfully<p/>";
            }else{
                echo "<p class='php_mess_err'>Delete Failed<p/>";
            }
        }
    }
    public function view_sold_product($id){
        
        return $this->get_sold_byDate($id);
        
    }

     public function view_sold_detail_user($id){
        return $this->get_sold_detail_user($id);
    }

    public function view_all_sold_product(){
        
        return $this->get_sold_product();
    }
        public function view_number_of_sold_prd(){
        return $this->countSold();
    }
    public function view_sold_price(){
       
        return $this->get_sold_product_price();
    }
    public function confirm_status_sold(){
        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["edit_status"])){
             $this->editStatus($this->sold_status(), $this->sold_id());
        }
    }
    
}
     
