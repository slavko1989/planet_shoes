<?php 
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");

include_once(__DIR__ ."../../classes/model.class.php");

class UserControler extends Model{

		private $err_reg = array();
		private $err_log = array();
		public function __construct(){
		parent:: __construct();
		$this->err_msg_reg();
		$this->err_msg_log();	
	}

	public function err_msg_reg(){
	foreach($this->err_reg as $err){
		echo $err."<br>";
		}
	}
	public function err_msg_log(){
	foreach($this->err_log as $err){
		echo $err."<br>";
		}
	}
	public function get_reg($user_name,$user_email,$user_pass,$user_img,$user_info){

		$stmt = $this->get_db()->prepare("insert into users (user_name,user_email,user_pass,user_img,user_info)
			values(:user_name,:user_email,:user_pass,:user_img,:user_info)");
			$stmt->bindValue(":user_name",$user_name);
			$stmt->bindValue(":user_email",$user_email);
			$stmt->bindValue(":user_pass",$user_pass);
			$stmt->bindValue(":user_img",$user_img);
			$stmt->bindValue(":user_info",$user_info);
			return $stmt->execute();
	}

	public function email_exist($email){
	 	$stmt = $this->get_db()->prepare("select user_email from users where user_email='$email' limit 1");
	 	$stmt->execute();
	 	$row =$stmt->rowCount();
	 		if($row > 0){
		$this->err_reg[] = "email exists, take another";
	 	}
	 }
	 public function empty_row(){
	 	if(empty($this->user_name() ) or empty($this->user_email()) or empty($this->user_img()) or
	 	empty($this->user_pass()) or empty($this->user_info()) ){
	 		$this->err_reg[] = "please fill in each field";
	 	}
	 }
	 public function numeric_userName(){
	 	if(!preg_match("/^[a-zA-Z-' ]*$/",$this->user_name())){
  			$this->err_reg[] = "username contains only letters and white spacess";
  			}
	 }
	 public function validate_email(){
	 	if(!filter_var($this->user_email(),FILTER_VALIDATE_EMAIL)){
  			$this->error[] = "email is not valid";
  			}
	 }
	 public function password_min_characters(){
	 	if(strlen($this->user_pass()) < 4){
  			$this->err_reg[] = "password must be atleast 4 characters long";
			}
	  
}
public function register(){

	if(count($this->err_reg) == 0){
	//$hash = password_hash($this->user_pass(), PASSWORD_DEFAULT);
	$insert_user = $this->get_reg($this->user_name(),$this->user_email(),$this->user_pass(),$this->user_img(),$this->user_info());
	 			if($insert_user){
	 			$path= dirname(__FILE__) . "../../user_img/";
                $full_path = $path . $this->user_img(); 
                move_uploaded_file($this->user_img_tmp(), $full_path);
	 		 }else{
	 			$this->err_reg[] = "Your are not signup,try again";
	 		}
	 	}
	 }


	public function valid_reg(){
	 	
	 	if($this->empty_row() or 
	 		$this->numeric_userName() or 
	 		$this->validate_email() or
	 		$this->password_min_characters() or 
	 		$this->email_exist($this->user_email())){
	 		return false;
	 	}else{
	 		return $this->register();
	 		}	
	 	}
	



	 //LOGIN

	 public function logout(){
	 	session_destroy();
	 }
	  public function empty_row_log(){
	 	if(empty($this->user_email()) or
	 	empty($this->user_pass())){
	 		$this->err_log[] = "please fill in each field";
	 	}
	 }
	 public function user_login($user_email,$user_pass){
	 	$stmt = $this->get_db()->prepare("select
	 	 users.user_name, users.user_email,users.user_pass,
	 		users.user_id,users.user_info,users.user_img,
	 		zip_code.zip_code_id,zip_code.zip_code_name
	 		from users
			inner join 
			zip_code on users.zip_code_id =  zip_code.zip_code_id
	 	 where users.user_email=:user_email and users.user_pass=:user_pass");
			$stmt->execute(array(':user_email'=>$user_email, 'user_pass'=>$user_pass));
			if($stmt->rowCount()==0){
	 			$this->err_log[] = "Your are not signin,try again";
			}else{	
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$_SESSION['user_email'] = $result['user_email'];
		$_SESSION['user_id'] = $result['user_id'];
		$_SESSION['admin'] = $result['zip_code_name'];
		$_SESSION['user_name'] = $result['user_name'];
		$_SESSION['img'] = $result['user_img'];
		if($_SESSION['admin']  == 'admin'){
			header("location:../../../php_projects/planet_shoes\admin/index.php");
			}elseif($_SESSION['admin']  == 'guest'){
			header("location:../../../php_projects/planet_shoes/index.php");
			}elseif($_SESSION['admin']  == 'moderator'){
			header("location:../../../php_projects/planet_shoes/moderator/index.php");
			}else{
				header("location:../../../php_projects/planet_shoes/user/user_info.php");	
			}
		}
	}


	 public function get_user_id($id){
	 	$stmt =  $this->get_db()->prepare("select * from users where user_id=:user_id");
        $stmt->bindValue(":user_id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
	 }
	 public function get_user(){
	 	$stmt =  $this->get_db()->prepare("select * from users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
	 }
	 public function get_delete_user($id){
	 	$stmt =  $this->get_db()->prepare("delete from users where user_id=:user_id");
	 	$stmt->bindValue(":user_id",$id);
        return $stmt->execute();
        
	 }
	 public function edit_user($u_id,$u_name,$u_email,$u_pass,$u_img,$u_info){
	 	$stmt = $this->get_db()->prepare("update users set  user_id=:user_id,
	 		user_name=:user_name,user_email=:user_email,user_pass=:user_pass,
	 		user_img=:user_img,user_info=:user_info
	 	 	where user_id=:user_id");
        $stmt->bindValue("user_id",$u_id);
        $stmt->bindValue("user_name",$u_name);
        $stmt->bindValue("user_email",$u_email);
        $stmt->bindValue("user_pass",$u_pass);
        $stmt->bindValue("user_img",$u_img);
        $stmt->bindValue("user_info",$u_info);
        return $stmt->execute();
	 }
	 public function change_password($id){
	 	$pass = $this->user_pass();
	 	$new_pass = $_POST["new_pass"];
	 	$confirm = $_POST["confirm_pass"];
	 	$id = $_SESSION["user_id"];
	 	if(empty($pass) or empty($new_pass) or empty($confirm)){
	 		echo "<p class='error_mess'>EMPTY FIELDS</p>";
	 	}else{
	 		$query = $this->get_db()->prepare("select * from users where user_id=:user_id");
	 		$query->execute(array(":user_id"=>$id));
	 		$row = $query->fetch(PDO::FETCH_ASSOC);
	 		$_SESSION["user_id"] = $row["user_id"];
	 		$password = $row["user_pass"];
	 		if($password==$pass){
	 			if($new_pass==$confirm){
	 				$update = $this->get_db()->prepare("UPDATE users set user_pass='$new_pass' WHERE user_id='" . $_SESSION["user_id"] . "'");
	 				return $update->execute();
	 			}
	 		}
	 	}

	 }
	 public function get_info($state,$city,$streat,$phone,$code,$text,$id){

		$stmt = $this->get_db()->prepare("insert into user_info (state,city,streat,phone,p_code,add_text,user_id)
			values(:state,:city,:streat,:phone,:p_code,:add_text,:user_id)");
			$stmt->bindValue(":state",$state);
			$stmt->bindValue(":city",$city);
			$stmt->bindValue(":streat",$streat);
			$stmt->bindValue(":phone",$phone);
			$stmt->bindValue(":p_code",$code);
			$stmt->bindValue(":add_text",$text);
			$stmt->bindValue(":user_id",$id);
			return $stmt->execute();
	}
	  public function get_user_info($id){
	 	$stmt =  $this->get_db()->prepare("select * from user_info where user_id=:user_id");
	 	$stmt->bindValue(":user_id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

	 }
	  public function countUsers(){
        $stmt = $this->get_db()->prepare("select * from users");
        $stmt->execute();
        return $stmt->rowCount();
    }

    // zip code


    public function insert_zip_code($zip_name){

		$stmt = $this->get_db()->prepare("insert into zip_code (zip_code_name)
			values(:zip_code_name)");
			$stmt->bindValue(":zip_code_name",$zip_name);
			return $stmt->execute();
	}

	public function confirm_zip(){

	$this->insert_zip_code($this->zip_code());
	 				 		
	 	}

	public function get_zip(){
	 	$stmt =  $this->get_db()->prepare(" call select_zip(); ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
	 }

	 public function delete_zip($zip_id){
        $stmt = $this->get_db()->prepare("delete  from zip_code where zip_code_id = :zip_code_id");
        $stmt->bindValue(":zip_code_id",$zip_id);
        return $stmt->execute();
    }

    public function edit_zip($z_id,$z_name){
        $stmt = $this->get_db()->prepare("update zip_code set  zip_code_name=:zip_code_name where zip_code_id=:zip_code_id");
        $stmt->bindValue("zip_code_id",$z_id);
        $stmt->bindValue("zip_code_name",$z_name);
        return $stmt->execute();
    }
  
}
