 <?php
require_once('../includes/db.conf.php');
require_once('../adodb/adodb.inc.php');
require_once('../includes/config.conf.php');
 
//$p = new Pager; 
$db = &ADONewConnection($DB_TYPE);
// $db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);


 if($_POST['kode_wni'])
{ $kode_wni = $_POST['kode_wni'];
}else{ $kode_wni = $_GET['kode_wni'];}

 if($_POST['pil'])
{ $pil = $_POST['pil'];
}else{ $pil = $_GET['pil'];}


 if($_POST['cari'])
{ $cari = $_POST['cari'];
}else{ $cari = $_GET['cari'];}

$n_limit=20;
if (empty($_POST['paging']))
{	$hal_ke=1;
}else{
	$hal_ke = $_POST['paging'];
}
$hal_ke_ = $n_limit*($hal_ke-1);


$sql=" select * from

tbl_kerja_tki_pelayaran inner join  tbl_mast_agency_pelayaran 
on tbl_mast_agency_pelayaran.kode_agency = tbl_kerja_tki_pelayaran.kode_agency  
inner join tbl_wni on tbl_wni.kode_wni = tbl_kerja_tki_pelayaran.kode_wni
where tbl_kerja_tki_pelayaran.kode_wni='$kode_wni'  ";

 

$rs_paging	= $db->execute($sql);
$n_rec = $rs_paging->recordCount();
$sql .= "limit $hal_ke_,$n_limit ";
$n_page = ceil($n_rec/$n_limit);  
$rs2	= $db->execute($sql);
$list_arr_satuan = array();
$row_class = array();
$initSet = array();
$z=0;$i=1;$y=2;$n=0;
while($arr=$rs2->FetchRow()){
	array_push($list_arr_satuan, $arr); 
	if ($i%2==0){ 
			$ROW_CLASSNAME="#FFFFFF"; }
		else {
			$ROW_CLASSNAME="#F0F0F0";
	    }
    array_push($row_class, $ROW_CLASSNAME);
	array_push($initSet, $z);
	$z++;$i++;$y++;$n++;
}

$jum = count($list_arr_satuan);

$sql_pw="select upper(nm_perwakilan) as nm_perwakilan  from tbl_mast_perwakilan where kode_perwakilan='$kode_perwakilan'";
$rs_pw	= $db->execute($sql_pw);
$nm_perwakilan=$rs_pw->fields['nm_perwakilan'];

//echo "PILIHANNNNNNNNNN".$pil;

?>

<link href="style.css" type="text/css" rel="stylesheet" />
<link href="formulir.css" type="text/css" rel="stylesheet" />
<SCRIPT LANGUAGE="JavaScript" SRC="global.js"></SCRIPT> 
<SCRIPT LANGUAGE="JavaScript" SRC="tw-ajax.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="tw-sack.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" SRC="<?=$HREF_THEME?>/defaults/javascripts/calendar/dhtmlgoodies_calendar.js"></SCRIPT>
<link rel="stylesheet" href="<?=$HREF_THEME?>/defaults/css/dhtmlgoodies_calendar.css" type="text/css">





<br><br> 
<div id="ajax_input"> 
<form action="list_pemberi_kerja_abk2.php" method="POST" name="frm">

<TABLE width="500" height="400" border="0" cellpadding="0" cellspacing="0">
<TR>
<TD width="500"  valign="top">


<table width="500" border="0" cellpadding="0" cellspacing="0">
 
<tr><td colspan="5" align="center" class="judul"><strong>DAFTAR PEMBERI KERJA ABK</strong></td></tr>
<tr><td colspan="5" align="center"><hr width="100%"></td></tr> 
</table>
 
 
<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr>
  
<td width="240"  align="right" >
<a href="#" OnClick="JavaScript:Ajax('ajax_input','pemberi_kerja_abk/form.php?kode_wni=<?=$kode_wni?>')">
 <img src="disk.png" border="0">&nbsp;Tambah Data
</a> 
</td>
</tr>
</table>

		<table width="500">
		<tr>
		<td align="center">
		 
		 
			<table width="500" border="0" cellpadding="0" cellspacing="0" class="ewTable">
			<tr> 
			 		
			<td  align="left" valign="top" class="ewTableHeader">NAMA AGENCY </td>
			<td  align="left" valign="top" class="ewTableHeader">NAMA KAPAL </td>
			<td  align="left" valign="top" class="ewTableHeader">PERIODE BEKERJA</td>
 
 
			</tr>
		 
		      <? if ($jum <= 0) { ?>
				<tr> 
					<td colspan="6" bgcolor="pink" align="center">Data Tidak Ditemukan... </td>
				</tr>
				<? } else ?>

				<? for ($i=0;$i<count($list_arr_satuan);$i++) { 
				   $j = $i+1;	
				?>
				
				<tr align="center" onclick="GetPengaduan('<?=$list_arr_satuan[$i]['kode_kerja_tki'];?>', '<?=$list_arr_satuan[$i]['nama_agency'];?>');"  onMouseOver="setPointer(this, <?=$initSet[$i];?>, 'over', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseOut="setPointer(this, <?=$initSet[$i];?>, 'out', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseDown="setPointer(this, <?=$initSet[$i];?>, 'click', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');"> 
				 
				<? 
				$no = ($n_limit *($hal_ke-1)) + $j; 
				$id=$list_arr_satuan[$i]['id'];
				$a=$list_arr_satuan[$i]['id'];
				?>
				
			 
					 <td align="left" class="tdatacontent"> <?=strtoupper($list_arr_satuan[$i]['nama_agency']);?> </td>
					<td align="left" class="tdatacontent"> 
				 	 <?=strtoupper($list_arr_satuan[$i]['nama_kapal']);?> 
					</td>
			 
					<td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['tgl_awal'];?> s/d <?=$list_arr_satuan[$i]['tgl_akhir'];?> </td>
		 
					 

					 
				</tr>
				<? }?>

		</table>




</TD>
</TR>
</TABLE>

</center>

 
</FORM>
</div>

<script>
function GetPengaduan(kode_kerja_tki,nama_majikan ) {
    
 window.opener.document.getElementById('kode_kerja_tki').value=kode_kerja_tki;
 window.opener.document.getElementById('nama_majikan').value=nama_majikan;
	 

 window.close();
    //    alert(KodeDepartemen);
}


function doPaging(hal) {
  frm.action="list_pemberi_kerja_abk2.php";
  frm.submit();
}


function submit(){
  frm.action="list_pemberi_kerja_abk2.php";
  frm.submit();
}


//CEK FORM
//CEK FORM
//CEK FORM
function checkFrm(theForm){
with (theForm){

     if (kode_agency.value == "")
		{
			alert ("Silahkan Pilih Agency Pelayaran!");
			kode_pjtki.focus();
			return false;
		}

	 else if (nama_kapal.value == "")
		{
			alert ("Silahkan isi nama kapal !");
			nama_kapal.focus();
			return false;
          }
 
	else
		{
			submit();
			return true;
		}
}
	
	
}
  

// CEK FORM
// CEK FORM
// CEK FORM


</script>