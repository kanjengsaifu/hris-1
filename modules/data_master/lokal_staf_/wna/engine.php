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
}else{

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
$TPL_PATH = base64_decode($_SESSION['THEME']).'/modules/data_master/lokal_staf/wna';

#SETTING FILE JS INCLUDE
$JS_MODUL = $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/javascripts/modules/data_master');
$FILE_JS  = $JS_MODUL.'/lokal_staf/wna';

if($_POST['mod_id'])
{
		$mod_id = $_POST['mod_id'];
}else
{
		$mod_id = $_GET['mod_id'];
}
$user_id = base64_decode($_SESSION['UID']);

#Initiate TABLE
$tbl_name	= "tbl_wna";

//-----------------------------------END OF LOCAL CONFIG-------------------------------//

function delete_($kode_wna){
global $mod_id;
global $db;
global $tbl_name;
global $field_name;
$sql  ="DELETE ";
$sql .="FROM ".$tbl_name." ";
$sql .="WHERE kode_wna = '".$kode_wna."' ";

$sqlresult = $db->Execute($sql);
}

function edit_($kode_wna,$kode_negara,$nama_wna,$alamat_ind,$tlp_ind,$alamat_ln,$tlp_ln,$keterangan){
global $mod_id;
global $db;
global $tbl_name;
global $field_name;
$sql  ="UPDATE ".$tbl_name." ";
$sql .="SET kode_negara='".strip_tags($kode_negara)."', ";
$sql .="nama_wna='".strip_tags($nama_wna)."', ";
$sql .="alamat_ind='".strip_tags($alamat_ind)."', ";
$sql .="tlp_ind='".strip_tags($tlp_ind)."', ";
$sql .="alamat_ln='".strip_tags($alamat_ln)."', ";
$sql .="tlp_ln='".strip_tags($tlp_ln)."', ";
$sql .="keterangan='".strip_tags($keterangan)."' ";
$sql .="WHERE kode_wna = '".$kode_wna."' ";

$sqlresult = $db->Execute($sql);
}

function create_($kode_wna,$kode_negara,$nama_wna,$alamat_ind,$tlp_ind,$alamat_ln,$tlp_ln,$keterangan){
global $mod_id;	
global $db;
global $tbl_name;
global $field_name;
$sql	 = "INSERT INTO tbl_wna (`kode_wna`,`kode_negara`,`nama_wna`,`alamat_ind`,`tlp_ind`,`alamat_ln`,`tlp_ln`,`keterangan`) ";
$sql	.= " VALUES ('".strip_tags($kode_wna)."','".strip_tags($kode_negara)."','".strip_tags($nama_wna)."','".strip_tags($alamat_ind)."','".strip_tags($tlp_ind)."','".strip_tags($alamat_ln)."','".strip_tags($tlp_ln)."','".strip_tags($keterangan)."')";

$sqlresult = $db->Execute($sql);
}

if($_POST[op]) $op = $_POST[op]; else $op = $_GET[op];


switch ($op){

case 0:
	if (Privi($mod_id, $user_id, 'insert') != 'no')
	{
		lockTables($tbl_name);
		create_($_POST['kode_wna'],$_POST['kode_negara'],$_POST['nama_wna'],$_POST['alamat_ind'],$_POST['tlp_ind'],$_POST['alamat_ln'],$_POST['tlp_ln'],$_POST['keterangan']);
		unlockTables($tbl_name);
		Header("Location:index.php?mod_id=$mod_id&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]);
	}
break;
case 1:
	if (Privi($mod_id, $user_id, 'edit') != 'no')
	{
		lockTables($tbl_name);
		edit_($_POST['kode_wna'], $_POST['kode_negara'],$_POST['nama_wna'],$_POST['alamat_ind'],$_POST['tlp_ind'],$_POST['alamat_ln'],$_POST['tlp_ln'],$_POST['keterangan']);
		unlockTables($tbl_name);		
		Header("Location:index.php?mod_id=$mod_id&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]);
	}
break;
case 2:
	if (Privi($mod_id, $user_id, 'delete') != 'no')
	{
		lockTables($tbl_name);
		delete_($_GET['kode_wna']);
		unlockTables($tbl_name);		
		Header("Location:index.php?mod_id=$mod_id&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]);
	}
break;
}


}
?>
