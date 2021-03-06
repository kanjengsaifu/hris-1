<?php

# Including Main Configuration
# including file for Main Configurations
require_once('../../../../includes/config.conf.php');


# Create a session to store global config path
session_save_path($DIR_SESS);
session_set_cookie_params($expiry);
session_start();

if ((!isset($_SESSION['UID'])) || (empty($_SESSION['UID']))){
		require_once('../../../../includes/header.redirect.inc');
} else {

//yang harus dibuat session
$THEME = base64_encode("defaults");
$LANG = base64_encode("indonesia");
$_SESSION['THEME']	= $THEME;
$_SESSION['LANG']   = $LANG;

# including Header file for Content Expiring
require_once($DIR_INC.'/header.exp.inc');
# including Header file for Database Configuration
require_once($DIR_INC.'/db.conf.php');
require_once($DIR_ADODB.'/adodb.inc.php');
require_once($DIR_INC.'/class.locker.php');

$db = &ADONewConnection($DB_TYPE);
//$db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);
//------------------------------------LOCAL CONFIG--------------------------------------//
#SETTING FOR TEMPLATE 
$TPL_PATH = base64_decode($_SESSION['THEME']).'/modules/data_master/perusahaan_jasa/agency_pelayaran';

#SETTING FILE JS INCLUDE
$JS_MODUL = $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/javascripts/modules/data_master');
$FILE_JS  = $JS_MODUL.'/perusahaan_jasa/agency_pelayaran';
if($_POST['mod_id'])
{
		$mod_id = $_POST['mod_id'];
} else
{
		$mod_id = $_GET['mod_id'];
}
$user_id = base64_decode($_SESSION['UID']);

#Initiate TABLE
$tbl_name	= "tbl_mast_agency_pelayaran";

//-----------------------------------END OF LOCAL CONFIG-------------------------------//

function delete_($kode_agency){
global $mod_id;
global $db;
$kode_agency = $_GET[kode_agency];

$sql  ="DELETE ";
$sql .="FROM tbl_mast_agency_pelayaran ";
$sql .="WHERE kode_agency = '$kode_agency' ";
//var_dump($sql)or die();
$sqlresult = $db->Execute($sql);

$user_id = base64_decode($_SESSION['UID']);
 $ip_now = $_SERVER['REMOTE_ADDR'];
 $sql2="INSERT INTO tbl_log (url, waktu, module, user_id ) VALUES ('$ip_now',now(),'Hapus data >> master Agency Pelayaran','$user_id') ";
 $db->Execute($sql2);
}

function edit_(){
global $mod_id;
global $db;
$kode_agency = $_GET[kode_agency];
$sql  ="UPDATE tbl_mast_agency_pelayaran ";
$sql .="SET   ";
$sql .="nama_agency='$_POST[nama_agency]', ";
$sql .="kode_jenis_agency= '$_POST[kode_jenis_agency]' , ";
$sql .="alamat_agency= '$_POST[alamat_agency]' , ";
$sql .="tlp_agency= '$_POST[tlp_agency]'";
$sql .=" WHERE kode_agency = '$_POST[kode_agency]'";

$sqlresult = $db->Execute($sql);

$ip_now = $_SERVER['REMOTE_ADDR'];
$user_id = base64_decode($_SESSION['UID']);
 $sql2="INSERT INTO tbl_log (url, waktu, module, user_id )  VALUES ('$ip_now',now(),'Ubah data >> master Agency Pelayaran','$user_id') ";
 $db->Execute($sql2);
}

function create_(){
global $mod_id;	
global $db;

$sql	 = "INSERT INTO tbl_mast_agency_pelayaran ( `nama_agency`,`kode_jenis_agency`,`alamat_agency`,`tlp_agency`)";
$sql	.= " VALUES ( '$_POST[nama_agency]','$_POST[kode_jenis_agency]','$_POST[alamat_agency]','$_POST[tlp_agency]')";
$sqlresult = $db->Execute($sql);

$ip_now = $_SERVER['REMOTE_ADDR'];
$user_id = base64_decode($_SESSION['UID']);
 $sql2="INSERT INTO tbl_log (url, waktu, module, user_id )  VALUES ('$ip_now',now(),'Tambah Data >> master Agency Pelayaran','$user_id') ";
 $db->Execute($sql2);
}

if($_POST[op]) $op = $_POST[op]; else $op = $_GET[op];


switch ($op){

case 0:
	if (Privi($mod_id, $user_id, 'insert') != 'no')
	{
		//lockTables($tbl_name);
		//create_($_POST['id_kabupaten'],$_POST['no_prop'],$_POST['no_kabupaten'],$_POST['nama_kabupaten']);
		create_($_POST['$kode_agency'],$_POST['$nama_agency'],$_POST['$kode_jenis_agency'],$_POST['$alamat_agency'],$_POST['$tlp_agency']);
		//unlockTables($tbl_name);		
		Header("Location:index.php?mod_id=$mod_id&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]);
	}
break;
case 1:
	if (Privi($mod_id, $user_id, 'edit') != 'no')
	{
		//lockTables($tbl_name);
		edit_($_POST['kode_agency'],$_POST['nama_agency'],$_POST['kode_jenis_agency'],$_POST['alamat_agency'],$_POST['tlp_agency']);
		//unlockTables($tbl_name);		
		Header("Location:index.php?mod_id=$mod_id&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]);
	}
	
break;
case 2:
	if (Privi($mod_id, $user_id, 'delete') != 'no')
	{
		//lockTables($tbl_name);
		delete_($_GET['no_propinsi'],$_GET['id_kabupaten']);
		//unlockTables($tbl_name);		
		Header("Location:index.php?mod_id=$mod_id&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]);
	}
break;
}


}
?>
