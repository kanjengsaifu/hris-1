<?php
/*** Last Modify 09-07-2010
***/

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
//$db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);
//------------------------------------LOCAL CONFIG--------------------------------------//
#SETTING FOR TEMPLATE 
$TPL_PATH = base64_decode($_SESSION['THEME']).'/modules/form_isian/kabupaten/form_jl_02';


#SETTING FILE JS INCLUDE
$JS_MODUL = $DIR_THEME.'/'.(base64_decode($_SESSION['THEME']).'/javascripts/modules/form_isian');
$FILE_JS  = $JS_MODUL.'/kabupaten/form_jl_02';
if($_POST['mod_id'])
{
		$mod_id = $_POST['mod_id'];
}else
{
		$mod_id = $_GET['mod_id'];
}
$user_id = base64_decode($_SESSION['UID']);

#Initiate TABLE
$tbl_name_main	= "tbl_form_jl_02_main";
$tbl_name_detail	= "tbl_form_jl_02_detail";
$tmp_tbl_name_main	= "tmp_tbl_form_jl_02_main";
$tmp_tbl_name_detail	= "tmp_tbl_form_jl_02_detail";
//-----------------------------------END OF LOCAL CONFIG-------------------------------//

function delete_($id){
global $mod_id;
global $db;
global $_POST,$_GET;
global $tbl_name_main;
global $tbl_name_detail;
global $tmp_tbl_name_main;
global $tmp_tbl_name_detail;

$sql  ="DELETE ";
$sql .="FROM ".$tbl_name_main." ";
$sql .="WHERE id_fjl_02_main = '$id'";

$tmp_sql  = " DELETE FROM ".$tmp_tbl_name_main." WHERE id_fjl_02_main='{$id}' " ;
//$tmp_sql2  = " DELETE FROM ".$tmp_tbl_name_detail." WHERE id_fjl_02_detail='{$id}' " ;
//print $sql."<br>";
//print $tmp_sql;

if($db->Execute($sql)){
	$db->Execute($tmp_sql);
	//$db->Execute($tmp_sql2);
}

}

function edit_(){
global $mod_id;
global $db;
global $_POST,$_GET;
global $tbl_name_main;
global $tbl_name_detail;
global $tmp_tbl_name_main;
global $tmp_tbl_name_detail;

$tgl = explode("-",$_POST["tanggal"],strlen($_POST["tanggal"])); // dd-mm-YYYY
$format_tgl = $tgl[2]."-".$tgl[1]."-".$tgl[0]; // YYYY-mm-dd

$sql = " UPDATE `".$tbl_name_main."` SET `tanggal`=" .sqlvalue($format_tgl, true) .", 
		`no_propinsi`=".sqlvalue(@$_POST["no_propinsi"], false).", 
		`no_kabupaten`=".sqlvalue(@$_POST["no_kabupaten"], false).",
		`id_jns_jln`=".sqlvalue(@$_POST['txt_hidden_jns_jln'], false)."
		WHERE " ."(`id_fjl_02_main`=".sqlvalue(@$_POST["xid_jl_02_main"], false).")";
		
$sqlresult = $db->Execute($sql);

$sql = " UPDATE `".$tbl_name_detail."` SET `no_ruas`=".sqlvalue(@$_POST["no_ruas"], true).", 
		`nama_ruas`=".sqlvalue(@$_POST["nama_ruas"], true).", 
		`panjang_km`=".sqlvalue(@$_POST["panjang_km"], false).", 
		`panjang_m`=".sqlvalue(@$_POST["panjang_m"], false).", 
		`kondisi_baik`=".sqlvalue(@$_POST["kondisi_baik"], false).", 
		`kondisi_sedang`=".sqlvalue(@$_POST["kondisi_sedang"], false).", 
		`kondisi_rusak`=".sqlvalue(@$_POST["kondisi_rusak"], false).", 
		`kondisi_rusak_berat`=".sqlvalue(@$_POST["kondisi_rusak_berat"], false).", 
		`lhr_rata_rata`=".sqlvalue(@$_POST["lhr_rata_rata"], false).", 
		`akses_jalan`=".sqlvalue(@$_POST["akses_jalan"], true).", 
		`jumlah_penduduk`=".sqlvalue(@$_POST["jumlah_penduduk"], false).", 
		`keterangan`=".sqlvalue(@$_POST["keterangan"], true)." 
		WHERE " ."(`id_fjl_02_detail`=".sqlvalue(@$_POST["xid_form_jl_02_detail"], false).")";
		
$sqlresult = $db->Execute($sql);

/*** Tambahan ***/
$tmp_sql = " UPDATE `".$tmp_tbl_name_main."` SET `tanggal`=".sqlvalue($format_tgl, true).", 
		`no_propinsi`=".sqlvalue(@$_POST["no_propinsi"], false).", 
		`no_kabupaten`=".sqlvalue(@$_POST["no_kabupaten"], false).",
		`id_jns_jln`=".sqlvalue(@$_POST['txt_hidden_jns_jln'], false)."
		WHERE " ."(`id_fjl_02_main`=".sqlvalue(@$_POST["xid_jl_02_main"], false).")";
		
$tmp_sqlresult = $db->Execute($tmp_sql);

$tmp_sql = " UPDATE `".$tmp_tbl_name_detail."` SET `no_ruas`=".sqlvalue(@$_POST["no_ruas"], true).", 
		`nama_ruas`=".sqlvalue(@$_POST["nama_ruas"], true).", 
		`panjang_km`=".sqlvalue(@$_POST["panjang_km"], false).", 
		`panjang_m`=".sqlvalue(@$_POST["panjang_m"], false).", 
		`kondisi_baik`=".sqlvalue(@$_POST["kondisi_baik"], false).", 
		`kondisi_sedang`=".sqlvalue(@$_POST["kondisi_sedang"], false).", 
		`kondisi_rusak`=".sqlvalue(@$_POST["kondisi_rusak"], false).", 
		`kondisi_rusak_berat`=".sqlvalue(@$_POST["kondisi_rusak_berat"], false).", 
		`lhr_rata_rata`=".sqlvalue(@$_POST["lhr_rata_rata"], false).", 
		`akses_jalan`=".sqlvalue(@$_POST["akses_jalan"], true).", 
		`jumlah_penduduk`=".sqlvalue(@$_POST["jumlah_penduduk"], false).", 
		`keterangan`=".sqlvalue(@$_POST["keterangan"], true)." 
		WHERE " ."(`id_fjl_02_detail`=".sqlvalue(@$_POST["xid_form_jl_02_detail"], false).")";
		
$tmp_sqlresult = $db->Execute($tmp_sql);
/*** End 0f Tambahan ***/
}

function create_(){
global $mod_id;
global $db;
global $_POST,$_GET;
global $tbl_name_main;
global $tbl_name_detail;	
global $tmp_tbl_name_main;
global $tmp_tbl_name_detail;	

$tgl = explode("-",$_POST["tanggal"],strlen($_POST["tanggal"])); // dd-mm-YYYY
$format_tgl = $tgl[2]."-".$tgl[1]."-".$tgl[0]; // YYYY-mm-dd

$sql = " INSERT INTO `".$tbl_name_main."` (`tanggal`, `no_propinsi`, `no_kabupaten`, `id_jns_jln`) VALUES 
		(" .sqlvalue($format_tgl, true) .", " .sqlvalue(@$_POST["no_propinsi"], false) .", 
		" .sqlvalue(@$_POST["no_kabupaten"], false) .", ".sqlvalue(@$_POST["txt_hidden_jns_jln"], false) ." )";

$sqlresult = $db->Execute($sql);

$sql = " INSERT INTO `".$tbl_name_detail."` (`id_fjl_02_main`, `no_ruas`, `nama_ruas`, `panjang_km`, `panjang_m`, 
		`kondisi_baik`, `kondisi_sedang`, `kondisi_rusak`, `kondisi_rusak_berat`, `lhr_rata_rata`, `akses_jalan`, 
		`jumlah_penduduk`, `keterangan`) VALUES (
		(SELECT MAX(id_fjl_02_main) FROM ".$tbl_name_main."), 
		".sqlvalue(@$_POST["no_ruas"], true).", 
		".sqlvalue(@$_POST["nama_ruas"], true).", 
		".sqlvalue(@$_POST["panjang_km"], false).", 
		".sqlvalue(@$_POST["panjang_m"], false).", 
		".sqlvalue(@$_POST["kondisi_baik"], false).", 
		".sqlvalue(@$_POST["kondisi_sedang"], false).", 
		".sqlvalue(@$_POST["kondisi_rusak"], false).", 
		".sqlvalue(@$_POST["kondisi_rusak_berat"], false).", 
		".sqlvalue(@$_POST["lhr_rata_rata"], false).", 
		".sqlvalue(@$_POST["akses_jalan"], true).", 
		".sqlvalue(@$_POST["jumlah_penduduk"], false).", 
		".sqlvalue(@$_POST["keterangan"], true).")";

$sqlresult = $db->Execute($sql);  

/*** Tambahan ***/
$tmp_sql = " INSERT INTO `".$tmp_tbl_name_main."` (`id_fjl_02_main`,`tanggal`, `no_propinsi`, `no_kabupaten`, `id_jns_jln`) VALUES 
		((SELECT MAX(id_fjl_02_main) FROM ".$tbl_name_main."), " .sqlvalue($format_tgl, true) .", " .sqlvalue(@$_POST["no_propinsi"], false) .", 
		" .sqlvalue(@$_POST["no_kabupaten"], false) .", ".sqlvalue(@$_POST["txt_hidden_jns_jln"], false) ." )";

$tmp_sqlresult = $db->Execute($tmp_sql);

$tmp_sql = " INSERT INTO `".$tmp_tbl_name_detail."` (`id_fjl_02_detail`, `id_fjl_02_main`, `no_ruas`, `nama_ruas`, `panjang_km`, `panjang_m`, 
		`kondisi_baik`, `kondisi_sedang`, `kondisi_rusak`, `kondisi_rusak_berat`, `lhr_rata_rata`, `akses_jalan`, 
		`jumlah_penduduk`, `keterangan`) VALUES (
		(SELECT MAX(id_fjl_02_detail) FROM ".$tbl_name_detail."),
		(SELECT MAX(id_fjl_02_main) FROM ".$tbl_name_main."), 
		".sqlvalue(@$_POST["no_ruas"], true).", 
		".sqlvalue(@$_POST["nama_ruas"], true).", 
		".sqlvalue(@$_POST["panjang_km"], false).", 
		".sqlvalue(@$_POST["panjang_m"], false).", 
		".sqlvalue(@$_POST["kondisi_baik"], false).", 
		".sqlvalue(@$_POST["kondisi_sedang"], false).", 
		".sqlvalue(@$_POST["kondisi_rusak"], false).", 
		".sqlvalue(@$_POST["kondisi_rusak_berat"], false).", 
		".sqlvalue(@$_POST["lhr_rata_rata"], false).", 
		".sqlvalue(@$_POST["akses_jalan"], true).", 
		".sqlvalue(@$_POST["jumlah_penduduk"], false).", 
		".sqlvalue(@$_POST["keterangan"], true).")";

$tmp_sqlresult = $db->Execute($tmp_sql);  
/*** End 0f Tambahan ***/
}

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
 
			$get_sql		= " SELECT * FROM tbl_form_jl_02_main  where no_propinsi=".$SES_NO_PROP; //localhost atw daerah
			$get_recordSet =   $db->Execute($get_sql);  
			@$count = $get_recordSet->RecordCount();
	


	if (@$count!='') {
				$z=1;

				while ($arr=$get_recordSet->FetchRow()) { // loop data di daerah
 					
					//cek apakah data sudah ada di server atw belum melalui id_auto_daerah
					 $sql_cek="select * from tbl_form_jl_02_main where id_auto_daerah=".sqlvalue(@$arr["id_fjl_02_main"], true)." AND no_propinsi=".sqlvalue(@$arr["no_propinsi"], true)." and no_kabupaten=".sqlvalue(@$arr["no_kabupaten"], true);
					 $rs_cari =   $tb_import->Execute($sql_cek); 
					 $id_auto_daerah = $rs_cari->fields['id_auto_daerah'];
					 $id_fjl_02_main_cek = $rs_cari->fields['id_fjl_02_main'];

					if ($id_auto_daerah !='') { //data sudah ada di pusat
						 
						// script update DI PUSAT
 
						$tmp_sql = " UPDATE tbl_form_jl_02_main  SET " ;
								$tmp_sql.= "  tanggal='".$arr[tanggal]."'," ;
								$tmp_sql.= "  no_propinsi='".$arr[no_propinsi]."'," ;
								$tmp_sql.= "  no_kabupaten='".$arr[no_kabupaten]."'," ;
								$tmp_sql.= "  id_jns_jln='".$arr[id_jns_jln]."' "  ;
								$tmp_sql.= "  where id_fjl_02_main ='".$id_fjl_02_main_cek."' " ;
								$tmp_sqlresult = $tb_import->Execute($tmp_sql);	
								 

								 $sql_del = "DELETE FROM tbl_form_jl_01_detail WHERE id_fjl_02_main='$id_fjl_02_main' ";
								 $tb_import->Execute($sql_del);


		
					} else { //data belum ada
						
							//simpan di tabel asli server
							$sql_insert = " INSERT INTO `".$tbl_name_main."` (`tanggal`, `no_propinsi`, `no_kabupaten`, `id_jns_jln`,id_auto_daerah) 
								 VALUES (".sqlvalue(@$arr["tanggal"], true).", 
								  ".sqlvalue(@$arr["no_propinsi"], false).", ".sqlvalue(@$arr["no_kabupaten"], false).", ".sqlvalue(@$arr["id_jns_jln"], false)." , " .sqlvalue(@$arr["id_fjl_02_main"], false) ." )";
								  $sql_exec = $tb_import->Execute($sql_insert);

								//echo $sql_insert."<BR> <BR>";


					}
 

					 //cari detail di local atw daerah
					 $sql_detail	=  " SELECT * FROM `".$tbl_name_detail."` WHERE id_fjl_02_main='$arr[id_fjl_02_main]' ";
					 $get_recordSet2	= $db->Execute($sql_detail);

					if($get_recordSet2->RecordCount()>0){
						while ($arr2=$get_recordSet2->FetchRow()) {

							if ($id_auto_daerah !='') { //jika  data induk sudah ada 

									//SIMPAN DI TABEL ASLI SERVER
 
									$sql_insert2 = " INSERT INTO `".$tbl_name_detail."` (`id_fjl_02_main`, `no_ruas`, `nama_ruas`, `panjang_km`, `panjang_m`, 
									`kondisi_baik`, `kondisi_sedang`, `kondisi_rusak`, `kondisi_rusak_berat`, `lhr_rata_rata`, `akses_jalan`, 
									`jumlah_penduduk`, `keterangan`) VALUES (
									$id_fjl_02_main_cek ,   
									".sqlvalue(@$arr2["no_ruas"], true).", 
									".sqlvalue(@$arr2["nama_ruas"], true).", 
									".sqlvalue(@$arr2["panjang_km"], false).", 
									".sqlvalue(@$arr2["panjang_m"], false).", 
									".sqlvalue(@$arr2["kondisi_baik"], false).", 
									".sqlvalue(@$arr2["kondisi_sedang"], false).", 
									".sqlvalue(@$arr2["kondisi_rusak"], false).", 
									".sqlvalue(@$arr2["kondisi_rusak_berat"], false).",
									".sqlvalue(@$arr2["lhr_rata_rata"], false).", 
									".sqlvalue(@$arr2["akses_jalan"], true).", 
									".sqlvalue(@@$arr2["jumlah_penduduk"], false).", 
									".sqlvalue(@$arr2["keterangan"], true).")";


									  $sql_exec2 = $tb_import->Execute($sql_insert2);

									//	echo $sql_insert2."<BR> <BR>";
									 
								 

							} else { //jika data belum ada
							
									//SIMPAN DI TABEL ASLI SERVER
									$sql_insert2 = " INSERT INTO `".$tbl_name_detail."` (`id_fjl_02_main`, `no_ruas`, `nama_ruas`, `panjang_km`, `panjang_m`, 
									`kondisi_baik`, `kondisi_sedang`, `kondisi_rusak`, `kondisi_rusak_berat`, `lhr_rata_rata`, `akses_jalan`, 
									`jumlah_penduduk`, `keterangan`) VALUES (
									(SELECT MAX(id_fjl_02_main) FROM ".$tbl_name_main."), 
									".sqlvalue(@$arr2["no_ruas"], true).", 
									".sqlvalue(@$arr2["nama_ruas"], true).", 
									".sqlvalue(@$arr2["panjang_km"], false).", 
									".sqlvalue(@$arr2["panjang_m"], false).", 
									".sqlvalue(@$arr2["kondisi_baik"], false).", 
									".sqlvalue(@$arr2["kondisi_sedang"], false).", 
									".sqlvalue(@$arr2["kondisi_rusak"], false).", 
									".sqlvalue(@$arr2["kondisi_rusak_berat"], false).",
									".sqlvalue(@$arr2["lhr_rata_rata"], false).", 
									".sqlvalue(@$arr2["akses_jalan"], true).", 
									".sqlvalue(@@$arr2["jumlah_penduduk"], false).", 
									".sqlvalue(@$arr2["keterangan"], true).")";

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


switch ($op){

case 0:
	if (Privi($mod_id, $user_id, 'insert') != 'no')
	{
		//lockTables($tbl_name_main);
		//lockTables($tbl_name_detail);
		create_();		
		//unlockTables($tbl_name_main);	
		//unlockTables($tbl_name_detail);	
		Header("Location:index.php?mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Search_Year=".$_POST[Search_Year]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&jns_jln=".$_POST["txt_hidden_jns_jln"]);
	}
break;
case 1:
	if (Privi($mod_id, $user_id, 'edit') != 'no')
	{
		//lockTables($tbl_name);
		edit_();
		//unlockTables($tbl_name);		
		Header("Location:index.php?mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Search_Year=".$_POST[Search_Year]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&jns_jln=".$_POST[txt_hidden_jns_jln]);
	}
break;
case 2:
	if (Privi($mod_id, $user_id, 'delete') != 'no')
	{
		//lockTables($tbl_name_main);
		//lockTables($tmp_tbl_name_main);
		delete_($_GET['id_fjl_02_main']);
		//unlockTables($tbl_name_main);
		//unlockTables($tmp_tbl_name_main);		
	Header("Location:index.php?mod_id=$mod_id&no_propinsi=".$_GET[no_propinsi]."&no_kabupaten=".$_GET[no_kabupaten]."&Search_Year=".$_GET[Search_Year]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&jns_jln=".$_GET['jns_jln']."&txt_hidden_jns_jln=".$_GET[txt_hidden_jns_jln]);
	}
break;
case 3:
		//lockTables($tbl_name);
		import_();
		//unlockTables($tbl_name);		
		//Header("Location:index.php?mod_id=$mod_id&no_propinsi=".$_POST[no_propinsi]."&no_kabupaten=".$_POST[no_kabupaten]."&Search_Year=".$_POST[Search_Year]."&search=1&limit=".$_POST[limit]."&SORT=".$_POST['SORT']."&page=".$_POST[page]."&jns_jln=".$_POST[jns_jln]);
break;
}
}
?>