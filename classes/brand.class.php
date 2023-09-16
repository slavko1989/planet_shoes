// za brand, category, gender isti je princip pa cu samo objasniti u jednoj klasi rad metoda
<?php
include_once(__DIR__ ."../../classes/model.class.php");/*model sadrzi sve podatke iz baze podataka za ceo projekat. 
    Posto ovo nije mvc patern, samo sam rasclanio klase da bi bio pregledniji kod */
class Brand_Controller extends Model{

    public function __construct()
    {
        parent::__construct();//nasledjujemo klasu model, koja sadzi podatke sa kojima cemo manipulisati, a model klasa nasledjuje konekciju sa bazom 
    }

    //metoda getBrand ima vrednost da vrati sve kreirane brendove, selektujemo sve iz tabele koju smo kreirali u bazi
    public function get_brand(){
        $stmt =  $this->get_db()->prepare("select * from brand_ecommerce"); /* $this je kljucna rec u klasi koju koristimo za poziv metode, varijable,
                                                                            execute metoda poziva se kada zelimo da se izvrsi rezultat i  na kraju fetchujemo podatke */
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_brand_id($id){ //vraca nam sve proizvode ali po brandu
        $stmt =  $this->get_db()->prepare("select * from product where brand_id=:brand_id");
        $stmt->bindValue(":brand_id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function add_brand($brand_name){ // kreiramo nov brend u tabeli koja nam je u bazi
        $stmt = $this->get_db()->prepare("insert into brand_ecommerce(brand_name)values (:brand_name)");
        $stmt->bindValue(":brand_name",$brand_name);
        return $stmt->execute();
    }
    public function delete_brand($brand_id){ // brisanje brenda po id-ju
        $stmt = $this->get_db()->prepare("delete  from brand_ecommerce where brand_id = :brand_id");
        $stmt->bindValue(":brand_id",$brand_id);
        return $stmt->execute();
    }
    public function edit_brand($brand_id,$brand_name){//update
        $stmt = $this->get_db()->prepare("update brand_ecommerce set  brand_name=:brand_name where brand_id=:brand_id");
        $stmt->bindValue("brand_id",$brand_id);
        $stmt->bindValue("brand_name",$brand_name);
        return $stmt->execute();
    }
}
    
