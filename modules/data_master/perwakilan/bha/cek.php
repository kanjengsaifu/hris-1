<? 
require_once('../../../../includes/config.conf.php');	 
require_once($DIR_INC.'/db.conf.php');
require_once($DIR_ADODB.'/adodb.inc.php');
require_once($DIR_INC.'/class.pager.php');
 
$db = &ADONewConnection($DB_TYPE);
 //$db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);


 
 $HREF_HOME_PATH_AJAX = $HREF_HOME."/modules/data_master/perwakilan/bha";
 
 $kode_bha = $_GET['kode_bha'];
 
   
 $sql_cek="select * from tbl_mast_badan_hukum_asing where kode_bha='$kode_bha'";
 $rs_val = $db->Execute($sql_cek);
 $kode_wni_cek = $rs_val->fields['kode_bha'];

 if ($kode_wni_cek!='') {		 
		// no pasport sudah ada
		$ket="Kode Badan Usaha Asing Sudah Ada";
 } else {
		// no pasport belum ada
		$ket="Kode Badan Usaha Asing Belum Ada";
 }
 
 //echo  $sql_cek;

?>
  
<div id="ajax_cek_id">
<INPUT TYPE="text" NAME="kode_bha" value="<?=$kode_bha?>" 
size="35" OnChange="JavaScript:Ajax('ajax_cek_id','<?=$HREF_HOME_PATH_AJAX?>/cek.php?kode_bha='+frmCreate.kode_bha.value)"> 		
<font color="#ff0000"><?=$ket?></font>			
 </div>
 