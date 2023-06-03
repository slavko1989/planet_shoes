<?php
function admin_index(){
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
$interface->profile();
$interface->footer();
}else{
	echo "you don't have permission for this page";
}
}
function brand_edit(){
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
$brand = new Brand_View();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
	$interface->top_c();
	$interface->sidebar();
	$interface->dashboard();
include_once(__DIR__."../../components/brand_edit_component.php");
$interface->footer();
}else{
	echo "you don't have permission for this page";
	}
}
function brand(){
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
$brand = new Brand_View();
$brand->add_brand_view();
include_once(__DIR__."../../components/brand_component.php");
$interface->footer();
}else{
echo "you don't have permission";
}
}
function cat(){
	include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
$cat = new Cat_View();
$cat->add_category_view();
include_once(__DIR__."../../components/cat_component.php");
$interface->footer();
}else{
echo "you don't have permission";
}
}
function cat_edit(){
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
$cat = new Cat_View();
include_once(__DIR__."../../components/cat_edit_component.php");
$interface->footer();
}else{
echo "you don't have permission";
}
}



function product(){
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();


$g = new G_View();
$gender = $g->show_gender();
$b = new Brand_View();
$brand = $b->show_brand();
$c = new Cat_View();
$cat = $c->show_category();

$p = new Prd_View();
$p->add_product_view();

include_once(__DIR__."../../components/product_component.php");
$interface->footer();
}else{
echo "you don't have permission";
}
}

function edit_product(){
	include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
 
$g = new G_View();
$gender = $g->show_gender();
$b = new Brand_View();
$brand = $b->show_brand();
$c = new Cat_View();
$cat = $c->show_category();

$p = new Prd_View();
$p->get_edit_product();

include_once(__DIR__."../../components/product_edit_component.php");
$interface->footer();
}else{
echo "you don't have permission";
}
}

function gender(){
	include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
 $g = new G_View();
 $g->add_gender_view();

 include_once(__DIR__."../../components/gender_component.php");
$interface->footer();
}else{
echo "you don't have permission";
}
}

function gender_edit(){
	include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
$g = new G_View();
 include_once(__DIR__."../../components/gender_edit_component.php");
$interface->footer();
}else{
echo "you don't have permission";
}
}

function zip(){
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
$zip = new UserView();
$zip->confirm_zip_code();
include_once(__DIR__."../../components/zip_component.php");
$interface->footer();
}else{
echo "you don't have permission";
}
}

function zip_edit(){
	include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
$zip = new UserView();
 include_once(__DIR__."../../components/zip_edit_component.php");
$interface->footer();
}else{
echo "you don't have permission";
}
}

function shopping_cart(){
	include_once(__DIR__."../../spl_autoload_class/autoload_class.php"); 
$interface = new Interface_class();
$interface->head();
$interface->sidebar();
$interface->top_menu();

if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){

$cart = new Shop_View();
$cart->get_delete_shopID();
$cart->get_update_q();

include_once(__DIR__."../../components/shop_cart.php");

$interface->footer(); 

}else{
    echo "you don't have permission";
  }
}

function sold(){
	include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
if(isset($_SESSION['user_id']) && $_SESSION['admin']=='admin'){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
$sold = new Sold_View();
$show = $sold->admin_view_all_prd();
$sold->confirm_status_sold();
include_once(__DIR__."../../components/sold_component.php");
$interface->footer();
}else{
echo "you don't have permission";
}
}

function add_to_wish(){
	include_once(__DIR__."../../spl_autoload_class/autoload_class.php");

$interface = new Interface_class();
$interface->head();
if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
$interface->sidebar();
$interface->top_menu();
$wish = new Wish_View();
$wish->get_delete_wishID();
$wish->get_update_qw();
include_once(__DIR__."../../components/add_to_wish.php");

$interface->footer(); 
}
else{
echo "you don't have permission";
}
}

function users_admin(){
	include_once(__DIR__."../../spl_autoload_class/autoload_class.php");

$interface = new Interface_admin();
$interface->head();
if($_SESSION["admin"]=="admin" && isset($_SESSION["user_id"])){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();

$user = new UserView();

include_once(__DIR__."../../components/users_admin_section_component.php");

$interface->footer();
}else{
 echo "you don't have permission";
}
}

function users_admin_update(){
	include_once(__DIR__."../../spl_autoload_class/autoload_class.php");

$interface = new Interface_admin();
$interface->head();
if($_SESSION["admin"]=="admin" && isset($_SESSION["user_id"])){
$interface->top_c();
$interface->sidebar();
$interface->dashboard();

$user = new UserView();
$user->get_edit_user();

include_once(__DIR__."../../components/users_admin_update_component.php");

$interface->footer();
}else{
 echo "you don't have permission";
}
}
?>