<? 
require_once('../../../../includes/config.conf.php');	 
require_once($DIR_INC.'/db.conf.php');
require_once($DIR_ADODB.'/adodb.inc.php');
require_once($DIR_INC.'/class.pager.php');
 
$db = &ADONewConnection($DB_TYPE);
 //$db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);


 
 $HREF_HOME_PATH_AJAX = $HREF_HOME."/modules/data_master/lokal_staf/lokal_staf";
 
 $kode_staf = $_GET['kode_staf'];
 
   
 $sql_cek="select * from tbl_mast_staf where kode_staf='$kode_staf'";
 $rs_val = $db->Execute($sql_cek);
 $kode_wni_cek = $rs_val->fields['kode_staf'];

 if ($kode_wni_cek!='') {		 
		// no pasport sudah ada
		$ket="Kode Staf Sudah Ada";
 } else {
		// no pasport belum ada
		$ket="Kode Staf Belum Ada";
 }
 
 //echo  $sql_cek;

?>
  
<div id="ajax_cek_id">
<INPUT TYPE="text" NAME="kode_staf" value="<?=$kode_staf?>" 
size="35" OnChange="JavaScript:Ajax('ajax_cek_id','<?=$HREF_HOME_PATH_AJAX?>/cek.php?kode_staf='+frmCreate.kode_staf.value)"> 		
<font color="#ff0000"><?=$ket?></font>			
 </div>
 