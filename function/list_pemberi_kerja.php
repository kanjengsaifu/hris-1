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


$sql="  select * from tbl_kerja_tki 
left  join tbl_mast_pjtki on tbl_mast_pjtki.kode_pjtki =tbl_kerja_tki.kode_pjtki 
left  join tbl_mast_pjtka on tbl_mast_pjtka.kode_pjtka =tbl_kerja_tki.kode_pjtka

where tbl_kerja_tki.kode_wni='$kode_wni'  ";
 


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


<div id="ajax_input"> 



<form action="list_tki.php" method="POST" name="frm">

<TABLE width="500" height="400" border="0" cellpadding="0" cellspacing="0">
<TR>
<TD width="500"  valign="top">


<table width="500" border="0" cellpadding="0" cellspacing="0">
 <tr><td colspan="5" align="center" class="judul"><strong>&nbsp;</strong></td></tr>

<tr><td colspan="5" align="center" class="judul"><strong>DAFTAR PEMBERI KERJA </strong></td></tr>
</table>
 
<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr>
  
<td width="240"  align="right" >
<a href="#" OnClick="JavaScript:Ajax('ajax_input','pemberi_kerja/form.php?kode_wni=<?=$kode_wni?>')">
 <img src="disk.png" border="0">&nbsp;Tambah Data
</a> 
</td>
</tr>
</table>
 
		<table width="500">
		<tr>
		<td align="center">
		 
			<table width="500" border="0" cellpadding="0" cellspacing="0">
			<tr><td colspan="10" align="center"><hr width="100%"></td></tr>
			</table>

			<table width="500" border="0" cellpadding="0" cellspacing="0" class="ewTable">
			<tr> 
			<td  align="left" valign="top" class="ewTableHeader">NAMA PEMBERI KERJA</td>
			<td  align="left" valign="top" class="ewTableHeader">ALAMAT</td>
			<td  align="left" valign="top" class="ewTableHeader">PPTKIS</td>
			<td  align="left" valign="top" class="ewTableHeader">PJTKA</td>
 
			</tr>
		 
		      <? if ($jum <= 0) { ?>
				<tr> 
					<td colspan="6" bgcolor="pink" align="center">Data Tidak Ditemukan... </td>
				</tr>
				<? } else ?>

				<? for ($i=0;$i<count($list_arr_satuan);$i++) { 
				   $j = $i+1;	
				?>
				
				<tr align="center" onclick="GetPengaduan('<?=$list_arr_satuan[$i]['kode_kerja_tki'];?>', '<?=$list_arr_satuan[$i]['nama_majikan'];?>');"  onMouseOver="setPointer(this, <?=$initSet[$i];?>, 'over', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseOut="setPointer(this, <?=$initSet[$i];?>, 'out', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseDown="setPointer(this, <?=$initSet[$i];?>, 'click', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');"> 
				 
				<? 
				$no = ($n_limit *($hal_ke-1)) + $j; 
				$id=$list_arr_satuan[$i]['id'];
				$a=$list_arr_satuan[$i]['id'];
				?>
				
			 
					 <td align="left" class="tdatacontent"> <?=strtoupper($list_arr_satuan[$i]['nama_majikan']);?> </td>
					<td align="left" class="tdatacontent"> 
				 	 <?=strtoupper($list_arr_satuan[$i]['alamat_majikan']);?> 
					</td>
			 
					<td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['nama_pjtki'];?></td>
					 <td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['nama_pjtka'];?></td>
					 

					 
				</tr>
				<? }?>

		</table>




</TD>
</TR>
</TABLE>

</center>

<table width="100%">
<tr class="text-regular"> 
<td>

<INPUT TYPE="hidden" name="kode_wni" value="<?=$kode_wni?>">		 
  
			&nbsp;Hal : 
                    <select name="paging" size="1" onChange="doPaging(this.value);">
					   <? for($i=1;$i<=($n_page);$i++) {?>	

						<option value="<?=$i;?>" <? if ($hal_ke == $i)  echo 'SELECTED'?> ><?=$i;?></option>
					   <? }?>
					  </select>
                    &nbsp; &nbsp; 
                    
 
        
			</td>
			<td align="right">Jumlah data : <strong> <?=$n_rec;?> records </strong> </td>
			<td align="right"> </td>
</tr>
</table>
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
  frm.action="list_pemberi_kerja.php";
  frm.submit();
}


function submit(){
  frm.action="list_pemberi_kerja.php";
  frm.submit();
}



//CEK FORM
//CEK FORM
//CEK FORM
function checkFrm(theForm){
with (theForm){

      
  if (nama_majikan.value == "")
		{
			alert ("Silahkan isi nama majikan !");
			nama_majikan.focus();
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