 <?php
require_once('../includes/db.conf.php');
require_once('../adodb/adodb.inc.php');
require_once('../includes/config.conf.php');
 
 
//$p = new Pager; 
$db = &ADONewConnection($DB_TYPE);
// $db->debug = true;
$db->Connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);


 if($_POST['kode_perwakilan'])
{ $kode_perwakilan = $_POST['kode_perwakilan'];
}else{ $kode_perwakilan = $_GET['kode_perwakilan'];}

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


$sql="select * from tbl_bhi
where tbl_bhi.kode_perwakilan='$kode_perwakilan'  ";


if ($pil !="") {
	
		if ($pil==1) {
			$sql.=" and tbl_bhi.bhi LIKE '%".addslashes($cari)."%' ";
		} 

		if ($pil==2) {
			$sql.=" and tbl_bhi.pemilik LIKE '%".addslashes($cari)."%' ";
		} 

		 


}

$sql.="  order by bhi ";

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
<form action="list_bhi.php" method="POST" name="frm">

<TABLE width="500" height="400" border="0" cellpadding="0" cellspacing="0">
<TR>
<TD width="500"  valign="top">


<table width="500" border="0" cellpadding="0" cellspacing="0">
 <tr><td colspan="5" align="center" class="judul"><strong>&nbsp;</strong></td></tr>

<tr><td colspan="5" align="center" class="judul"><strong>DAFTAR BHI UNTUK PERWAKILAN <?=$nm_perwakilan?> </strong></td></tr>
<tr><td colspan="5" align="center"><hr width="100%"></td></tr> 
</table>


<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr>
<td width="50">Berdasarkan</td>
<td width="10">:</td>
<td width="30">
<select name='pil' class="text">
<option value=0> </option>
<option value='1' <? if ($pil==1) { echo "selected"; } ?>>Nama BHI</option>
<option value='2' <? if ($pil==2) { echo "selected"; } ?>>Pemilik</option>
 

 </select>

</td>
<td  NOWRAP>&nbsp;Karakter dicari  </td>
<td width="10">:</td>
<td width="100"><input class="text" type="text" name="cari" size="20"  value="<?=$cari?>"  ></td>
<td width="10">&nbsp;</td>
<td width="240" >
<a href="#" onclick="submit();">
<img src="icon_find.gif" border="0">&nbsp;cari
</a>
 <a href="#" OnClick="JavaScript:Ajax('ajax_input','bhi2/form.php?kode_perwakilan=<?=$kode_perwakilan?>')">
 <img src="disk.png" border="0">&nbsp;Tambah Data
</a> 

</td>
</tr>
</table>



<br>


		<table width="500">
		<tr>
		<td align="center">
		 
			<table width="500" border="0" cellpadding="0" cellspacing="0">
			<tr><td colspan="10" align="center"><hr width="100%"></td></tr>
			</table>

			<table width="500" border="0" cellpadding="0" cellspacing="0" class="ewTable">
			<tr>
		 
		 
			<td  align="left" valign="top" class="ewTableHeader">NAMA BHI</td>
			<td  align="left" valign="top" class="ewTableHeader">PEMILIK</td>
			<td  align="left" valign="top" class="ewTableHeader">TAHUN PENDIRIAN</td>			 
			<td  align="left" valign="top" class="ewTableHeader">BADAN HUKUM</td>
			</tr>
		 
		      <? if ($jum <= 0) { ?>
				<tr> 
					<td colspan="6" bgcolor="pink" align="center">Data Tidak Ditemukan... </td>
				</tr>
				<? } else ?>

				<? for ($i=0;$i<count($list_arr_satuan);$i++) { 
				   $j = $i+1;	


				   $bhi=str_replace("'","",$list_arr_satuan[$i]['bhi']);
					$pemilik=str_replace("'","",$list_arr_satuan[$i]['pemilik']);
					$alamat_ln=str_replace("'","",$list_arr_satuan[$i]['alamat_ln']);


				   if ($list_arr_satuan[$i]['jenis_bh']==1) { $nama_bh=" Badan Hukum Milik Swasta "; } 
				    if ($list_arr_satuan[$i]['jenis_bh']==2) { $nama_bh="  Badan Hukum Milik Negara "; } 
				?>
                
				<tr align="center" onclick="GetPengaduan('<?=$list_arr_satuan[$i]['kode_bhi'];?>', '<?=$bhi;?>', '<?=$pemilik;?>', '<?=$alamat_ln;?>', '<?=$nama_bh;?>');"  onMouseOver="setPointer(this, <?=$initSet[$i];?>, 'over', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseOut="setPointer(this, <?=$initSet[$i];?>, 'out', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');" onMouseDown="setPointer(this, <?=$initSet[$i];?>, 'click', '<?=$row_class[$i];?>', '#CCFFCC', '#FFCC99');"> 
				 
				<? 
				$no = ($n_limit *($hal_ke-1)) + $j; 
				$id=$list_arr_satuan[$i]['id'];
				$a=$list_arr_satuan[$i]['id'];
				?>
				
			 
					<td align="left" class="tdatacontent"><?=$list_arr_satuan[$i]['bhi'];?></td>
					<td align="left" class="tdatacontent"> <?=strtoupper($list_arr_satuan[$i]['pemilik']);?> </td>
				
					
					<td align="left" class="tdatacontent"> <?=strtoupper($list_arr_satuan[$i]['thn_pendirian']);?> </td>

					 <td align="left" class="tdatacontent"> 
					<? if ($list_arr_satuan[$i]['jenis_bh']==1){ echo "Badan Hukum Milik Swasta"; } ?>
					<? if ($list_arr_satuan[$i]['jenis_bh']==2){ echo "Badan Hukum Milik Negara"; } ?>
					 
					
					</td>
					 
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

			 
			<INPUT TYPE="hidden" name="kode_perwakilan" value="<?=$kode_perwakilan?>">		 
 


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
function GetPengaduan(kode_wni,nama, pemilik,alamat, nama_bh) {
   
    window.opener.document.getElementById('kode_wni').value=kode_wni;
	    window.opener.document.getElementById('nama').value=nama;
 

    window.close();
    //    alert(KodeDepartemen);
}


function doPaging(hal) {
  frm.action="list_bhi.php";
  frm.submit();
}


function submit(){
  frm.action="list_bhi.php";
  frm.submit();
}


//CEK FORM
//CEK FORM
//CEK FORM
function checkFrm(theForm){
with (theForm){

	 if (tgl_input.value == "")
		{
			alert ("Silahkan isi field tanggal input !");
			tgl_input.focus();
			return false;
		}
	 else if (alamat_ln.value == "")
		{
			alert ("Silahkan isi field Alamat !");
		alamat_ln.focus();
			return false;
		}

		else if (bhi.value == "")
		{
			alert ("Silahkan isi Nama BHI !");
		bhi.focus();
			return false;
		}

	else if (kode_kat_usaha.value == "")
		{
			alert ("Silahkan isi field kategori usaha !");
			kode_kat_usaha.focus();
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