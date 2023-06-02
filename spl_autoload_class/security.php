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
?>