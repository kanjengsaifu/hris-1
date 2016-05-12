<?php

# Including Main Configuration
# including file for Main Configurations
require_once('../../../../includes/config.conf.php');	 	
require_once('../../../../includes/funct.php');

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
$db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);
//------------------------------------LOCAL CONFIG--------------------------------------//
#SETTING FOR TEMPLATE 
$TPL_PATH = base64_decode($_SESSION['THEME']).'/modules/form_isian/kabupaten/form_jl_07';


#SETTING FILE JS INCLUDE
$JS_MODUL = $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/javascripts/modules/form_isian');
$FILE_JS  = $JS_MODUL.'/kabupaten/form_jl_07';

$mod_id	= $_POST['mod_id'] ? $_POST['mod_id'] : $_GET['mod_id'];

$user_id = base64_decode($_SESSION['UID']);

#Initiate TABLE
$tbl_name_main	= "tbl_form_jl_07_main";
$tbl_name_detail	= "tbl_form_jl_07_detail";
$tmp_tbl_name_main	= "tmp_tbl_form_jl_07_main";
$tmp_tbl_name_detail	= "tmp_tbl_form_jl_07_detail";

//-----------------------------------END OF LOCAL CONFIG-------------------------------//

function delete_($id){
global $mod_id;
global $db;
global $_POST, $_GET;
global $tbl_name_main;
global $tbl_name_detail;

$sql  ="DELETE ";
$sql .="FROM ".$tbl_name_main." ";
$sql .="WHERE id_fjl_07_main = '$id' ";

//print $sql;
$sqlresult = $db->Execute($sql);
}

function edit_(){
global $mod_id;
global $db;
global $_POST;
global $tbl_name_main;
global $tbl_name_detail;
/***
$tgl = explode("-",$_POST["status_progres"],strlen($_POST["status_progres"])); // dd-mm-YYYY
$status_progres = $tgl[2]."-".$tgl[1]."-".$tgl[0]; // YYYY-mm-dd
***/
$sql = " UPDATE `".$tbl_name_main."` SET `tahun`=" .sqlvalue(@$_POST["tahun"], true) .", 
		`no_propinsi`=" .sqlvalue(@$_POST["no_propinsi"], false) .", 
		`no_kabupaten`=" .sqlvalue(@$_POST["no_kabupaten"], false) .", 
		`triwulan`=" .sqlvalue(@$_POST["triwulan"], false) .", 
		`status_progres`=" .sqlvalue(@$_POST["status_progres"], true) ."
		WHERE " ."(`id_fjl_07_main`=" .sqlvalue(@$_POST["xid_jl_07_main"], false) .")";

$sqlresult = $db->Execute($sql);

//print $sql."<br>";

$sql  ="DELETE ";
$sql .="FROM ".$tbl_name_detail." ";
$sql .="WHERE id_fjl_07_main = '" .sqlvalue(@$_POST["xid_jl_07_main"], false) ."'";

$sqlresult = $db->Execute($sql);

$sql = " INSERT INTO `".$tbl_name_detail."` (`id_fjl_07_main`, `no_paket`, `masalah`, `pemecahan`, `instansi`, 
		`status_perkembangan`,`id_jns_jln`) VALUES ";

$data_query = "";

for($i=0;$i<$_POST[jum_rows];$i++) {
	/***
	no_jns_select_
	***/
	$data_query .= "(" .sqlvalue(@$_POST["xid_jl_07_main"], false) .", 
		" .sqlvalue(@$_POST["no_paket_select_".$i], true) .", 
		" .sqlvalue(@$_POST["masalah_".$i], true) .", 
		" .sqlvalue(@$_POST["penyelesaian_".$i], true) .", 
		" .sqlvalue(@$_POST["instansi_".$i], true) .", 
		" .sqlvalue(@$_POST["status_perkembangan_".$i], true) .",
		" .sqlvalue(@$_POST["no_jns_select_".$i], true) ."),";
}

$sqlresult = $db->Execute($sql.substr($data_query,0,-1));  
//print $sql.substr($data_query,0,-1);
}

function create_(){
	/***
	no_jns_select_
	***/
global $mod_id;
global $db;
global $_POST;
global $tbl_name_main;
global $tbl_name_detail;	
/***
$tgl = explode("-",$_POST["status_progres"],strlen($_POST["status_progres"])); // dd-mm-YYYY
$status_progres = $tgl[2]."-".$tgl[1]."-".$tgl[0]; // YYYY-mm-dd
***/
$sql = " INSERT INTO `".$tbl_name_main."` (`tahun`, `no_propinsi`, `no_kabupaten`, `triwulan`, `status_progres`) VALUES (
		" .sqlvalue(@$_POST["tahun"], true) .", " .sqlvalue(@$_POST["no_propinsi"], false) .", 
		" .sqlvalue(@$_POST["no_kabupaten"], false) .", " .sqlvalue(@$_POST["triwulan"], false) .", 
		" .sqlvalue(@$_POST["status_progres"], true) .")";

$sqlresult = $db->Execute($sql);

//print $sql."<br>";

$sql = " INSERT INTO `".$tbl_name_detail."` (`id_fjl_07_main`, `no_paket`, `masalah`, `pemecahan`, `instansi`, 
		`status_perkembangan`,`id_jns_jln`) VALUES ";

$data_query = "";

for($i=0;$i<$_POST[jum_rows];$i++) {

	$data_query .= "(LAST_INSERT_ID(), 
		" .sqlvalue(@$_POST["no_paket_select_".$i], true) .", 
		" .sqlvalue(@$_POST["masalah_".$i], true) .", 
		" .sqlvalue(@$_POST["penyelesaian_".$i], true) .", 
		" .sqlvalue(@$_POST["instansi_".$i], true) .", 
		" .sqlvalue(@$_POST["status_perkembangan_".$i], true) .",
		" .sqlvalue(@$_POST["no_jns_select_".$i], true) ."),";
}
$sqlresult = $db->Execute($sql.substr($data_query,0,-1));  
//print $sql.substr($data_query,0,-1);
}

/*** 20-08-2010 ***/
function import_() {
	
	global $mod_id;
	global $db;
	global $DB_TYPE;
	global $DB_NAME;
	global $_POST, $_GET;
	global $tbl_name_main;
	global $tbl_name_detail;	
	
	global $tmp_tbl_name_main;
	global $tmp_tbl_name_detail;
	global $tbl_name_kondisi_main;	
	global $tmp_tbl_name_kondisi_main;
	
   $tb_import = &ADONewConnection($DB_TYPE);
  // $tb_import->debug = true;
  // $db->debug = true;
	$tb_import->Connect($_POST['hostname1'], $_POST['username1'], $_POST['password1'], $DB_NAME);
	//------------------------------------LOCAL CONFIG--------------------------------------//
 
	$conn=mysql_connect($_POST['hostname1'],$_POST['username1'],$_POST['password1']);
   //buat cek koneksinya

  if(!$conn)
    {

        Header("Location:index.php?status_error=1&mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Search_Year=".$_POST[Search_Year]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&jns_jln=".$_POST[jns_jln]);


    }

    else { 

	$SES_NO_PROP	= $_SESSION['SESSION_NO_PROPINSI'];
 
			$get_sql		= " SELECT * FROM tbl_form_jl_07_main  where no_propinsi=".$SES_NO_PROP; //localhost atw daerah
	$get_recordSet =   $db->Execute($get_sql);  
	@$count = $get_recordSet->RecordCount();
	
	if (@$count!='') {
				$z=1;

				while ($arr=$get_recordSet->FetchRow()) { // loop data di daerah
 					
					//cek apakah data sudah ada di server atw belum melalui id_auto_daerah
					 $sql_cek="select * from tbl_form_jl_07_main where id_auto_daerah=".sqlvalue(@$arr["id_fjl_07_main"], true)." AND no_propinsi=".sqlvalue(@$arr["no_propinsi"], true)." and no_kabupaten=".sqlvalue(@$arr["no_kabupaten"], true);
					 $rs_cari =   $tb_import->Execute($sql_cek); 
					 $id_auto_daerah = $rs_cari->fields['id_auto_daerah'];
					 $id_fjl_07_main_cek = $rs_cari->fields['id_fjl_07_main'];

					if ($id_auto_daerah !='') { //data sudah ada di pusat

			 
						// script update DI PUSAT
 								$tmp_sql = " UPDATE tbl_form_jl_07_main  SET " ;
								 
								$tmp_sql.= "  no_propinsi='".$arr[no_propinsi]."'," ;
								$tmp_sql.= "  no_kabupaten='".$arr[no_kabupaten]."'," ;

								$tmp_sql.= "  triwulan='".$arr[triwulan]."'," ;
								$tmp_sql.= "  status_progres='".$arr[status_progres]."'," ;
								$tmp_sql.= "  catatan='".$arr[catatan]."' " ;

								 
								$tmp_sql.= "  where id_fjl_07_main ='".$id_fjl_07_main_cek."' " ;
								$tmp_sqlresult = $tb_import->Execute($tmp_sql);	
								 

								 $sql_del = "DELETE FROM tbl_form_jl_07_detail WHERE id_fjl_07_main='$id_fjl_07_main_cek' ";
								 $tb_import->Execute($sql_del);


		
					} else { //data belum ada
						
							//simpan di tabel asli server
							 
							
							$sql_insert = " INSERT INTO `".$tbl_name_main."` (`tahun`, `no_propinsi`, `no_kabupaten`, `triwulan`, `status_progres`, `catatan` ,id_auto_daerah) 
							VALUES (".sqlvalue(@$arr["tahun"], true).", 
							".sqlvalue(@$arr["no_propinsi"], false).", 
							".sqlvalue(@$arr["no_kabupaten"], false).", 
							".sqlvalue(@$arr["triwulan"], true).",
							".sqlvalue(@$arr["status_progres"], true).",
							".sqlvalue(@$arr["catatan"], true).",
							".sqlvalue(@$arr["id_fjl_07_main"], true).")";
							 $sql_exec = $tb_import->Execute($sql_insert);


					}
 

					 //cari detail di local atw daerah
					 $sql_detail	=  " SELECT * FROM `".$tbl_name_detail."` WHERE id_fjl_07_main='$arr[id_fjl_07_main]' ";
					 $get_recordSet2	= $db->Execute($sql_detail);

					if($get_recordSet2->RecordCount()>0){
						while ($arr2=$get_recordSet2->FetchRow()) {

							if ($id_auto_daerah !='') { //jika  data induk sudah ada 

									//SIMPAN DI TABEL ASLI SERVER
 
											$sql_insert2 = " INSERT INTO `".$tbl_name_detail."` (`id_fjl_07_main`,`no_paket`,`masalah`,`pemecahan`,`instansi`,`status_perkembangan`,`id_jns_jln`) VALUES (
											 $id_fjl_07_main_cek  , 
											" .sqlvalue(@$arr2["no_paket"], true) .", 
											" .sqlvalue(@$arr2["masalah"], true) .", 
											" .sqlvalue(@$arr2["pemecahan"], false) .", 
											" .sqlvalue(@$arr2["instansi"], false) .", 
											" .sqlvalue(@$arr2["status_perkembangan"], false) .", 
											" .sqlvalue(@$arr2["id_jns_jln"], true) .") ";





										 $sql_exec2 = $tb_import->Execute($sql_insert2);

									//	echo $sql_insert2."<BR> <BR>";
									 
								 

							} else { //jika data belum ada
							
									//SIMPAN DI TABEL ASLI SERVER
									
											$sql_insert2 = " INSERT INTO `".$tbl_name_detail."` (`id_fjl_07_main`,`no_paket`,`masalah`,`pemecahan`,`instansi`,`status_perkembangan`,`id_jns_jln`) VALUES (
											(SELECT MAX(id_fjl_07_main) FROM ".$tbl_name_main."), 
											" .sqlvalue(@$arr2["no_paket"], true) .", 
											" .sqlvalue(@$arr2["masalah"], true) .", 
											" .sqlvalue(@$arr2["pemecahan"], false) .", 
											" .sqlvalue(@$arr2["instansi"], false) .", 
											" .sqlvalue(@$arr2["status_perkembangan"], false) .", 
											" .sqlvalue(@$arr2["id_jns_jln"], true) .") ";

										 $sql_exec2 = $tb_import->Execute($sql_insert2);

										//echo $sql_insert2."<BR> <BR>";
							}



									
						}
					}

					 
					 
					$z++;
				}

				Header("Location:index.php?status_error=3&mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Search_Year=".$_POST[Search_Year]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&jns_jln=".$_POST[jns_jln]);
	} else {
			
			//echo "Tidak ada data yang akan di eksport";

			Header("Location:index.php?status_error=2&mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Search_Year=".$_POST[Search_Year]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&jns_jln=".$_POST[jns_jln]);


	
	}


	}
}


if($_POST[op]) $op = $_POST[op]; else $op = $_GET[op];

for($i=0;$i<$_POST[jum_rows];$i++) {
	$j2[$i]= $_POST["no_jns_select_".$i];
}
$jenis	= $j2[0];

switch ($op){

case 0:
	if (Privi($mod_id, $user_id, 'insert') != 'no')
	{
		create_();
		Header("Location:index.php?mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Date_Year=".$_POST[tahun]."&triwulan_search=".$_POST["triwulan"]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&Date_Year=".$_POST[Date_Year]."&triwulan_search=".$_POST[triwulan_search]."&jns_jln=".$jenis);
	}
break;
case 1:
	if (Privi($mod_id, $user_id, 'edit') != 'no')
	{
		//lockTables($tbl_name);
		edit_();
		//unlockTables($tbl_name);		
		Header("Location:index.php?mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Date_Year=".$_POST[tahun]."&triwulan_search=".$_POST["triwulan"]."&&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&Date_Year=".$_POST[Date_Year]."&triwulan_search=".$_POST[triwulan_search]."&jns_jln=".$jenis);
	}
break;
case 2:
	if (Privi($mod_id, $user_id, 'delete') != 'no')
	{
		lockTables($tbl_name_main);
		delete_($_GET['id_fjl_07_main']);
		unlockTables($tbl_name_main);		
		Header("Location:index.php?mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Date_Year=".$_POST[tahun]."&triwulan_search=".$_POST["triwulan"]."&&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&Date_Year=".$_POST[Date_Year]."&triwulan_search=".$_POST[triwulan_search]."&jns_jln=".$jenis);
	}
break;
case 3:
		//lockTables($tbl_name);
		import_();
		//unlockTables($tbl_name);
		//Header("Location:index.php?mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Search_Year=".$_POST[Search_Year]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&jns_jln=".$_POST["txt_hidden_jns_jln"]."&triwulan_search=".$_POST["triwulan_search"]);
break;
}
}
?>
