 <?php
  require_once('../../includes/config.conf.php');
 require_once('../../includes/db.conf.php');
 require_once('../../adodb/adodb.inc.php');
 
$db = &ADONewConnection($DB_TYPE);
// $db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);


 if($_POST['kode_perwakilan'])
{ $kode_perwakilan = $_POST['kode_perwakilan'];
}else{ $kode_perwakilan = $_GET['kode_perwakilan'];}
 
  if($_POST['kode_wni'])
{ $kode_wni = $_POST['kode_wni'];
}else{ $kode_wni = $_GET['kode_wni'];}
 


 
$nama_kapal = addslashes($_POST[nama_kapal]);
 

$sql="insert into tbl_kerja_tki_pelayaran(kode_agency,kode_perwakilan,kode_wni,tgl_awal,tgl_akhir,nama_kapal) values ('$_POST[kode_agency]','$kode_perwakilan','$kode_wni','$_POST[tgl_awal]','$_POST[tgl_akhir]','$nama_kapal')";
 $sqlresult = $db->Execute($sql);
			

 Header("Location:../list_pemberi_kerja_abk2.php?kode_wni=".$kode_wni); 
	 


?>
 