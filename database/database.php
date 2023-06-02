<?php
/*Kreiram klasu sa konekcijom sa bazom podataka

varijabla connect ima modifikator pristupa private, 
sto znaci da mogu da moze da joj se pristupi samo  u okviru klase(enkapsulacija)

Koristimo pdo biblioteku za pristup sa bazom

Kreiram metodu getDb  kojoj dodeljujem vrednost iz metode setDb(povezivanje sa bazom), 
koju kasnije korstim u klasama(getter i setter)




*/
class Database
{
    private $connect;
    public function __construct(){
        $this->set_db();
    }
    public function set_db(){
        $connect = null;
        try {
            $connect = new PDO("mysql:host=localhost;dbname=planet_shoes","root","");
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $this->connect = $connect;

    }
    public function get_db(){
        return $this->connect;
    }
}