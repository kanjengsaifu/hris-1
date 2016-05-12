<HTML>
<HEAD>
<!-- #BeginEditable "TITLE" -->
<title><!--{$TITLE}--></title>
<link rel="stylesheet" href="<!--{$HREF_CSS_PATH}-->/preload.css" type="text/css">
<script language="JavaScript" type="text/javascript">

n=document.layers
ie=document.all

//Hides the layer onload
function hideIt(){
	if(ie || n){
		if(n) document.divLoadCont.display="none"
		else divLoadCont.style.display="none"
	} else {
		document.getElementById('divLoadCont').style.display='none';
	}
}

</script>
<div id="divLoadCont">
	<table width="100%" height="95%" align="center" valign="middle">
		<tr><td width="100%" height="100%" align="center" valign="middle">
			<img src="<!--{$HREF_IMG_PATH}-->/ajax-lob.gif" align="absmiddle">Loading Page....
		</td></tr>
	</table>
</div>

<link rel="stylesheet" href="<!--{$HREF_CSS_PATH}-->/default.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/global.js"></SCRIPT>
<link rel="stylesheet" href="<!--{$HREF_CSS_PATH}-->/dhtmlgoodies_calendar.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/calendar/dhtmlgoodies_calendar.js"></SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- #EndEditable -->
</HEAD>

<!--{if $SEARCH_BOX==1}-->
<body class="contentPage" onLoad="hideIt(); <!--{if $OPT==1}-->showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<!--{else}-->showAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<!--{/if}-->">
<!--{else}-->
<body class="contentPage" onLoad="hideIt(); <!--{if $OPT==1}-->showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<!--{else}-->hideAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<!--{/if}-->">
<!--{/if}-->
<div id="add-search-box">
<a class="button" href="#" onclick="this.blur();showAll('_menuEntry3_',1);hideAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);this.disabled=true;"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/databases.png" align="absmiddle">Import Data</span></a>
<a class="button" href="#" onclick="this.blur();showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);this.disabled=true;" <!--{if $OPT==1}--> DISABLED <!--{/if}-->><span><img src="<!--{$HREF_IMG_PATH}-->/icon/details.gif" align="absmiddle"> <!--{$BTN_NEW}--></span></a>
<a class="button" href="#" onclick="this.blur();showLevel('_menuEdit_',1,1);"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/search.png" align="absmiddle"> Search By</span></a>
</div>

		<DIV ID="_menuEntry3_1" style="top:10px;width:100%;display:none;position:absolute;">

		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat"> <!--{$TABLE_CAPTION}--></td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/form.gif" align="absmiddle" border="0"> <!--{$FORM_NAME2}--></td></tr>
		<tr><td class="alt2" style="padding:0px;">
		
		<FORM NAME="frmCreate2" METHOD="POST" ACTION="engine.php">
		<TABLE id="table-add-box">							
		<!--
			<TR>
				<TD><!--{$TB_IMP_SQL}--></TD>
				<TD>
				<input name="file" type="file" size="25">
				</TD>
			</TR>
			-->
			  <tr>
			    <td width="25%">MySQL Host Address </td>
			    <td width="75%"><input name="hostname1" type="text" id="hostname1" size="30" maxlength="30" value="localhost"></td>
			  </tr>
			  <tr>
			    <td>User Name </td>
			    <td><input name="username1" type="text" id="username1" size="20" maxlength="18" value="root"></td>
			  </tr>
			  <tr>
			    <td>Password</td>
			    <td><input name="password1" type="text" id="password1" size="20" maxlength="18"></td>
			  </tr>
			<TR>
				<TD COLSPAN="2" height="4"></TD></TR>
			<TR>
				<TD></TD>
				<TD>
				<INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
				<INPUT TYPE="hidden" name="limit" value="<!--{$LIMIT}-->">
				<INPUT TYPE="hidden" name="import" value="1">
				<INPUT TYPE="hidden" name="SORT" value="<!--{$SORT}-->">
				<INPUT TYPE="hidden" name="page" value="<!--{$page}-->">
				<INPUT TYPE="hidden" name="op" value="3">
				<INPUT TYPE="hidden" name="opt" value="3">
				<a class="button" href="#" onclick="this.blur();document.frmCreate2.submit(); document.frmCreate2.page.value='1'; document.frmCreate2.opt.value='3';"  onSubmit="document.frmCreate2.page.value='1'; document.frmCreate2.opt.value='3';"><span><img src="<!--{$HREF_IMG_PATH}-->/button/blank.gif" align="absmiddle"> <!--{$SUBMIT}--></span></a>
				<a class="button" href="#" onclick="this.blur();document.frmCreate2.reset(); resetFrm(frmCreate); "><span><img src="<!--{$HREF_IMG_PATH}-->/button/blank.gif" align="absmiddle"> <!--{$RESET}--></span></a>
				</TD>
			</TR>									
			</TABLE>	
		</FORM>
		</td></tr>
		</table>
		</DIV>	

		<DIV ID="_menuImport1_1" style="top:10px;width:100%;display:none;position:absolute;">
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
			<tr>
			 <td class="tcat"> <!--{$TABLE_CAPTION}--></td>
			</tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr>
			<td class="thead">
			<img src="<!--{$HREF_IMG_PATH}-->/layout/form.gif" align="absmiddle" border="0"> <!--{$FORM_NAME2}-->
			</td>
		</tr>
		<tr>
			<td class="alt2" style="padding:0px;">
			<TABLE id="table-add-box">							
			  <tr>
			    <td width="25%">Loading....</td>
			    <td width="75%">&nbsp;</td>
			  </tr>
			</TABLE>
		</td></tr>
		</table>
		</DIV>

		<DIV ID="_menuEntry1_1" style="top:10px;width:100%;display:none;position:absolute;">

		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat"> <!--{$TABLE_CAPTION}--></td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/form.gif" align="absmiddle" border="0"> <!--{$FORM_NAME}--></td></tr>
		<tr><td class="alt2" style="padding:0px;">
		
		<FORM NAME="frmCreate" METHOD="POST" ACTION="engine.php">
		<TABLE id="table-add-box">
				<TR>
					
<td  width="170" colspan="2">Tanggal</td>
<td><input type="text" name="tanggal" value="
<!--{if $TANGGAL==''}-->
<!--{$smarty.now|date_format:"%d-%m-%Y"}-->
<!--{else}-->
<!--{$TANGGAL}-->
<!--{/if}-->" size="15"> <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.tanggal,'dd-mm-yyyy',this)"  class="imgLink" align="absmiddle" title="Show Calendar List"></td>
</tr>
</tr>
				<TR>
					
<td colspan="2" width="175">Tahun Alokasi Anggaran</td>
<td><input type="text" name="tahun" value="<!--{$FORM_TAHUN}-->" maxlength="4" size="6" OnKeyUp="validateNum(this)"></td>
</tr>
<tr>
<td colspan="2">Nama Provinsi </td>
<td>
<SELECT name="no_propinsi" onChange="cari_kabupaten2(this.value)">
<OPTION VALUE="">[Pilih Provinsi]</OPTION>
<!--{section name=x loop=$DATA_PROPINSI}-->
<!--{if trim($DATA_PROPINSI[x].no_propinsi) == trim($NO_PROPINSI)}-->
<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->" selected > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
<!--{else}-->
<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->"  > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
<!--{/if}-->
<!--{/section}-->
</SELECT></td>
</tr>
<tr>
<td colspan="2">Nama Kabupaten </td>
<td>
<div id="ajax_kabupaten2">
<SELECT name="no_kabupaten" onChange="cari_kecamatan(<!--{$NO_PROPINSI|default:'0'}-->,this.value)">
<OPTION VALUE="">[Pilih Kabupaten]</OPTION>
<!--{section name=x loop=$DATA_KABUPATEN}-->
<!--{if $DATA_KABUPATEN[x].no_kabupaten == $NO_KABUPATEN}-->
<option value="<!--{$DATA_KABUPATEN[x].no_kabupaten}-->" selected > <!--{$DATA_KABUPATEN[x].nama_kabupaten}--> </option>
<!--{else}-->
<option value="<!--{$DATA_KABUPATEN[x].no_kabupaten}-->"  > <!--{$DATA_KABUPATEN[x].nama_kabupaten}--> </option>
<!--{/if}-->
<!--{/section}-->
</SELECT>
</div>
</td>
</tr></table>
		<div id="title-box2">Penentuan Ruas Jalan</div>
		<TABLE id="table-add-box">
<tr>

<!-- Tambahan 05-06-2010 -->
<tr>
<td colspan="2">Kategori Jalan</td>
<td><select name="jns_jln">
<option value="">[Pilih Kategori Jalan]</option>
	<!--{section name=x loop=$DATA_JENIS_JLN}-->
	<!--{if $DATA_JENIS_JLN[x].id == $PID_JENIS_JLN}-->
	<option value="<!--{$DATA_JENIS_JLN[x].id}-->" selected > <!--{$DATA_JENIS_JLN[x].nm}--> </option>
	<!--{else}-->
	<option value="<!--{$DATA_JENIS_JLN[x].id}-->"  > <!--{$DATA_JENIS_JLN[x].nm}--> </option>
	<!--{/if}-->
	<!--{/section}-->
</select>
</td>
</tr>
<!-- End 0f Tambahan 05-06-2010 -->

<td colspan="2" width="170">No Ruas </td>
<td><input type="text" name="no_ruas" maxlength="50" value="<!--{$NO_RUAS}-->"></td>
</tr>
<tr>
<td colspan="2">Nama Pangkal Ruas </td>
<td><input name="nama_pangkal_ruas" type="text" value="<!--{$NAMA_PANGKAL_RUAS}-->" size="35" maxlength="200"></td>
</tr>
<tr>
<td colspan="2">Nama Ujung Ruas </td>
<td><input name="nama_ujung_ruas" type="text" value="<!--{$NAMA_UJUNG_RUAS}-->" size="35" maxlength="200"></td>
</tr>
<tr>
<td colspan="2">Titik Pengenal Pangkal </td>
<td><input name="titik_pengenal_pangkal" type="text" value="<!--{$TITIK_PENGENAL_PANGKAL}-->" size="35" maxlength="200"></td>
</tr>
<tr>
<td colspan="2">Titik Pengenal Ujung </td>
<td><input name="titik_pengenal_ujung" type="text" value="<!--{$TITIK_PENGENAL_UJUNG}-->" size="35" maxlength="200"></td>
</tr>

<!-- Tambahan Manado -->
<tr>
<td colspan="2">Titik Awal Ruas Jalan </td>
<td>
<!--<input name="titik_awal_jalan" type="text" value="<!--{$TITIK_AWAL_JALAN}-->" size="35" maxlength="200">-->
Lintang :<input name="titik_awal_koordinat_lintang" type="text" value="<!--{$TITIK_AWAL_KOORDINAT_LINTANG}-->" size="10" maxlength="200">
&nbsp;&nbsp;Bujur:<input name="titik_awal_koordinat_bujur" type="text" value="<!--{$TITIK_AWAL_KOORDINAT_BUJUR}-->" size="10" maxlength="200">
</td>
</tr>
<tr>
<td colspan="2">Titik Akhir Ruas Jalan </td>
<td>
<!--<input name="titik_akhir_jalan" type="text" value="<!--{$TITIK_AKHIR_JALAN}-->" size="35" maxlength="200">-->
Lintang :<input name="titik_akhir_koordinat_lintang" type="text" value="<!--{$TITIK_AKHIR_KOORDINAT_LINTANG}-->" size="10" maxlength="200">
&nbsp;&nbsp;Bujur:<input name="titik_akhir_koordinat_bujur" type="text" value="<!--{$TITIK_AKHIR_KOORDINAT_BUJUR}-->" size="10" maxlength="200">
</td>
</tr>
<tr>
<td colspan="2">Titik Awal Kegiatan </td>
<td>
<!--<input name="titik_awal_kegiatan" type="text" value="<!--{$TITIK_AWAL_KEGIATAN}-->" size="35" maxlength="200">-->
Lintang :<input name="titik_awal_kegiatan_koordinat_lintang" type="text" value="<!--{$TITIK_AWAL_KEGIATAN_KOORDINAT_LINTANG}-->" size="10" maxlength="200">
&nbsp;&nbsp;Bujur:<input name="titik_awal_kegiatan_koordinat_bujur" type="text" value="<!--{$TITIK_AWAL_KEGIATAN_KOORDINAT_BUJUR}-->" size="10" maxlength="200">
</td>
</tr>
<tr>
<td colspan="2">Titik Akhir Kegiatan </td>
<td>
<!--<input name="titik_akhir_kegiatan" type="text" value="<!--{$TITIK_AKHIR_KEGIATAN}-->" size="35" maxlength="200">-->
Lintang :<input name="titik_akhir_kegiatan_koordinat_lintang" type="text" value="<!--{$TITIK_AKHIR_KEGIATAN_KOORDINAT_LINTANG}-->" size="10" maxlength="200">
&nbsp;&nbsp;Bujur:<input name="titik_akhir_kegiatan_koordinat_bujur" type="text" value="<!--{$TITIK_AKHIR_KEGIATAN_KOORDINAT_BUJUR}-->" size="10" maxlength="200">
</td>
</tr>
<!--
<tr>
<td colspan="2">Titik Koordinat </td>
<td><input name="titik_koordinat" type="text" value="<!--{$TITIK_KOORDINAT}-->" size="20" maxlength="200"></td>
</tr>
-->
<tr>
<td colspan="2">Panjang Ruas (Km) </td>
<td><input type="text" name="panjang_ruas" value="<!--{$PANJANG_RUAS}-->"></td>
</tr>
<tr>
<td colspan="2">Klasifikasi Ruas </td>
<td><select name="klasifikasi_ruas">
<option value="">[Pilih Klasifikasi Ruas]</option>
	<!--{section name=x loop=$DATA_FUNGSI}-->
	<!--{if $DATA_FUNGSI[x].kode_klasifikasi == $KODE_KLASIFIKASI}-->
	<option value="<!--{$DATA_FUNGSI[x].kode_klasifikasi}-->" selected > <!--{$DATA_FUNGSI[x].nama_klasifikasi}--> </option>
	<!--{else}-->
	<option value="<!--{$DATA_FUNGSI[x].kode_klasifikasi}-->"  > <!--{$DATA_FUNGSI[x].nama_klasifikasi}--> </option>
	<!--{/if}-->
	<!--{/section}-->
</select>
</td>
</tr>
<!--
<tr>
<td colspan="2">Kode Status Administrasi </td>
<td><select name="kode_status_administrasi">
<option value="">[Pilih Status]</option>
		<!--{section name=x loop=$DATA_ADMINISTRASI}-->
		<!--{if $DATA_ADMINISTRASI[x].kode_status == $KODE_STATUS_ADMINISTRASI}-->
		<option value="<!--{$DATA_ADMINISTRASI[x].kode_status}-->" selected > <!--{$DATA_ADMINISTRASI[x].nama_status}--> </option>
		<!--{else}-->
		<option value="<!--{$DATA_ADMINISTRASI[x].kode_status}-->"  > <!--{$DATA_ADMINISTRASI[x].nama_status}--> </option>
		<!--{/if}-->
		<!--{/section}-->	
</select>
</td>
</tr>
-->

<tr>
<td colspan="2">Sistem, Fungsi & Status Jalan</td>
<td><select name="kode_stat_jln">
<option value="">[Pilih Sistem, Fungsi & Status Jln]</option>
		<!--{section name=x loop=$DATA_STAT_JL}-->
		<!--{if $DATA_STAT_JL[x].kode_status == $KODE_STATUS_ADM_JLN}-->
		<option value="<!--{$DATA_STAT_JL[x].kode_status}-->" selected > <!--{$DATA_STAT_JL[x].sistem|capitalize}--> -> <!--{$DATA_STAT_JL[x].fungsi}--> -> <!--{$DATA_STAT_JL[x].status_jl}--> </option>
		<!--{else}-->
		<option value="<!--{$DATA_STAT_JL[x].kode_status}-->"  > <!--{$DATA_STAT_JL[x].sistem|capitalize}--> -> <!--{$DATA_STAT_JL[x].fungsi}--> -> <!--{$DATA_STAT_JL[x].status_jl}--> </option>
		<!--{/if}-->
		<!--{/section}-->	
</select>
</td>
</tr>

<tr valign="top">
<td colspan="2">Kecamatan yang dilalui </td>
<td>
<div id="ajax_kecamatan">
<!--{if $NO_PROPINSI=='' OR $NO_KABUPATEN==''}-->[Pilih Data Provinsi + Data Kabupaten]<!--{/if}-->
<table class="text-regular" cellspacing="0" cellpadding="0" width="400">
<!--{section name=x loop=$DATA_KECAMATAN}-->
<!--{if $smarty.section.x.index%2==0}-->
<tr>
<!--{/if}-->
<td width="15"><input type="checkbox" class="checkbox" name="kecamatan<!--{$smarty.section.x.index}-->" value="<!--{$DATA_KECAMATAN[x].nama_kecamatan}-->" 
<!--{foreach from=$KECAMATAN_YG_DILALUI item=curr_id}-->
<!--{if trim($DATA_KECAMATAN[x].nama_kecamatan)==trim($curr_id)}--> checked <!--{/if}-->
<!--{/foreach}-->
>
</td>
<td><!--{$DATA_KECAMATAN[x].nama_kecamatan}--></td>
<!--{if $smarty.section.x.index%2==1}-->
</tr>
<!--{/if}-->

<!--{/section}-->	
</table>
<input type="hidden" name="jml_kecamatan" value="<!--{$JML_KECAMATAN}-->">
</div>	
</td>
</tr>
</table>
		<!-- <div id="title-box2">Karakteristik Yang Ada</div> -->
		<TABLE id="table-add-box">

<!--
<tr>
  <td colspan="3"><!--{$CHECK}--></td>
</tr>
-->

<tr>
  <td colspan="3">Karakteristik Ruas Bagian</td>
  </tr>
<tr>
<td width="10" align="right">&raquo;</td>
<td width="140">Sta Awal </td>
<td><input type="text" name="pal_km_awal" value="<!--{$PAL_KM_AWAL}-->"></td>
</tr>
<tr>
<td align="right" class="hr">&raquo;</td>
<td class="hr">Sta Akhir </td>
<td><input type="text" name="pal_km_akhir" value="<!--{$PAL_KM_AKHIR}-->"></td>
</tr>
<tr>
<td colspan="2" class="hr">Lebar (m) </td>
<td><input type="text" name="lebar" value="<!--{$LEBAR}-->"></td>
</tr>
<tr>
  <td colspan="3" class="hr">Permukaan Jalan </td>
  </tr>
<tr>
<td align="right" class="hr">&raquo;</td>
<td class="hr">Tipe</td>
<td>
<select name="tipe_permukaan">
<option value="">[Pilih Tipe Permukaan Jalan]</option>
		<!--{section name=x loop=$DATA_TIPE_PERMUKAAN}-->
		<!--{if $DATA_TIPE_PERMUKAAN[x].kode_tipe_jalan == $KODE_TIPE_PERMUKAAN}-->
		<option value="<!--{$DATA_TIPE_PERMUKAAN[x].kode_tipe_jalan}-->" selected > <!--{$DATA_TIPE_PERMUKAAN[x].nama_tipe_jalan}--> </option>
		<!--{else}-->
		<option value="<!--{$DATA_TIPE_PERMUKAAN[x].kode_tipe_jalan}-->"  > <!--{$DATA_TIPE_PERMUKAAN[x].nama_tipe_jalan}--> </option>
		<!--{/if}-->
		<!--{/section}-->	
</select>
<!--
<select name="tipe_permukaan">
<option value="">[Pilih Tipe Perkerasan Jalan]</option>
		<!--{section name=x loop=$DATA_TIPE_PERMUKAAN}-->
		<!--{if $DATA_TIPE_PERMUKAAN[x].id_prop_tipe_pkrsn == $KODE_TIPE_PERMUKAAN}-->
		<option value="<!--{$DATA_TIPE_PERMUKAAN[x].id_prop_tipe_pkrsn}-->" selected > <!--{$DATA_TIPE_PERMUKAAN[x].nama_prop_tipe_pkrsn}--> </option>
		<!--{else}-->
		<option value="<!--{$DATA_TIPE_PERMUKAAN[x].id_prop_tipe_pkrsn}-->"  > <!--{$DATA_TIPE_PERMUKAAN[x].nama_prop_tipe_pkrsn}--> </option>
		<!--{/if}-->
		<!--{/section}-->	
</select>
-->
</td>
</tr>
<tr>
<td align="right" class="hr">&raquo;</td>
<td class="hr">Kondisi</td>
<td><select name="kondisi_permukaan">
<option value="">[Pilih Kondisi Jalan]</option>
		<!--{section name=x loop=$DATA_KONDISI_JALAN}-->
		<!--{if trim($DATA_KONDISI_JALAN[x].kode_kondisi_jalan) == trim($KODE_KONDISI_JALAN)}-->
		<option value="<!--{$DATA_KONDISI_JALAN[x].kode_kondisi_jalan}-->" selected > <!--{$DATA_KONDISI_JALAN[x].nama_kondisi_jalan}--> </option>
		<!--{else}-->
		<option value="<!--{$DATA_KONDISI_JALAN[x].kode_kondisi_jalan}-->"  > <!--{$DATA_KONDISI_JALAN[x].nama_kondisi_jalan}--> </option>
		<!--{/if}-->
		<!--{/section}-->
</select>
</td>
</tr>
<tr>
<td colspan="2" class="hr">Hambatan Lalu Lintas </td>
<td><select name="hambatan_lalin">
<option value="">[Pilih Hambatan Lalu Lintas]</option>
		<!--{section name=x loop=$DATA_HAMBATAN_LALIN}-->
		<!--{if $DATA_HAMBATAN_LALIN[x].kode_hambatan_lalin == $KODE_HAMBATAN_LALIN}-->
		<option value="<!--{$DATA_HAMBATAN_LALIN[x].kode_hambatan_lalin}-->" selected > <!--{$DATA_HAMBATAN_LALIN[x].nama_hambatan_lalin}--> </option>
		<!--{else}-->
		<option value="<!--{$DATA_HAMBATAN_LALIN[x].kode_hambatan_lalin}-->"  > <!--{$DATA_HAMBATAN_LALIN[x].nama_hambatan_lalin}--> </option>
		<!--{/if}-->
		<!--{/section}-->
</select>
</td>
</tr>
<tr>
<td colspan="2" class="hr">Bulan Tahun Perencanaan Terakhir </td>
<td>
<!-- Disabled on 06-09-2010
<input name="bln_th_perenc_akhir" type="text" value="
<!--{if $BLN_TH_PERENC_AKHIR==''}-->
<!--{$smarty.now|date_format:"%Y-%m-%d"}-->
<!--{else}-->
<!--{$BLN_TH_PERENC_AKHIR}-->
<!--{/if}-->" size="15">
 <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.bln_th_perenc_akhir,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">
 -->
 Bulan :
 <select name="data_bulan">
 <!--{foreach from=$DAFTAR_BULAN item=foo key=k}-->
 <!--{if $DATA_BULAN==$k}--> 
	<option value="<!--{$k}-->" selected ><!--{$foo}--></option>
 <!--{else}-->
	<option value="<!--{$k}-->"><!--{$foo}--></option>
 <!--{/if}-->
 <!--{/foreach}-->
</select>&nbsp;
 Tahun :<input type="text" name="data_tahun" value="<!--{$DATA_TAHUN}-->" size="4" maxlength="4"> 
</td>
</tr>
<tr>
<td colspan="3" class="hr">Tahun Pekerjaan Terakhir </td>
</tr>
<tr>
  <td align="right" class="hr">&raquo;</td>
  <td class="hr">Tipe</td>
  <td>
  <select name="tipe_thn_pekerj_akhir">
    <option value="">[Pilih Tipe Permukaan Jalan]</option>
		<!--{section name=x loop=$DATA_TIPE_PERMUKAAN}-->
		<!--{if $DATA_TIPE_PERMUKAAN[x].kode_tipe_jalan == $KODE_TIPE_PERMUKAAN2}-->
		<option value="<!--{$DATA_TIPE_PERMUKAAN[x].kode_tipe_jalan}-->" selected > <!--{$DATA_TIPE_PERMUKAAN[x].nama_tipe_jalan}--> </option>
		<!--{else}-->
		<option value="<!--{$DATA_TIPE_PERMUKAAN[x].kode_tipe_jalan}-->"  > <!--{$DATA_TIPE_PERMUKAAN[x].nama_tipe_jalan}--> </option>
		<!--{/if}-->
		<!--{/section}-->
  </select>
  <!--
  <select name="tipe_thn_pekerj_akhir">
    <option value="">[Pilih Tipe Perkerasaan Jalan]</option>
		<!--{section name=x loop=$DATA_TIPE_PERMUKAAN}-->
		<!--{if $DATA_TIPE_PERMUKAAN[x].id_prop_tipe_pkrsn == $KODE_TIPE_PERMUKAAN2}-->
		<option value="<!--{$DATA_TIPE_PERMUKAAN[x].id_prop_tipe_pkrsn}-->" selected > <!--{$DATA_TIPE_PERMUKAAN[x].nama_prop_tipe_pkrsn}--> </option>
		<!--{else}-->
		<option value="<!--{$DATA_TIPE_PERMUKAAN[x].id_prop_tipe_pkrsn}-->"  > <!--{$DATA_TIPE_PERMUKAAN[x].nama_prop_tipe_pkrsn}--> </option>
		<!--{/if}-->
		<!--{/section}-->
  </select>
  -->
  </td>
</tr>
<tr>
<td align="right" class="hr">&nbsp;&raquo;</td>
<td class="hr">Kondisi</td>
<td><select name="kondisi_thn_pekerj_akhir">
<option value="">[Pilih Kondisi Jalan]</option>
		<!--{section name=x loop=$DATA_KONDISI_JALAN}-->
		<!--{if $DATA_KONDISI_JALAN[x].kode_kondisi_jalan == $KODE_KONDISI_JALAN2}-->
		<option value="<!--{$DATA_KONDISI_JALAN[x].kode_kondisi_jalan}-->" selected > <!--{$DATA_KONDISI_JALAN[x].nama_kondisi_jalan}--> </option>
		<!--{else}-->
		<option value="<!--{$DATA_KONDISI_JALAN[x].kode_kondisi_jalan}-->"  > <!--{$DATA_KONDISI_JALAN[x].nama_kondisi_jalan}--> </option>
		<!--{/if}-->
		<!--{/section}-->	
</select>
</td>
</tr>
<tr>
<td colspan="2" class="hr">Kelas Rencana Lalu Lintas </td>
<td><select name="kelas_renc_lalin">
<option value="">[Pilih Kelas Rencana Lalu Lintas]</option>
		<!--{section name=x loop=$DATA_KELAS_LALIN}-->
		<!--{if $DATA_KELAS_LALIN[x].kode_kelas_lalin == $KODE_KELAS_LALIN}-->
		<option value="<!--{$DATA_KELAS_LALIN[x].kode_kelas_lalin}-->" selected > <!--{$DATA_KELAS_LALIN[x].nama_kelas_lalin}--> </option>
		<!--{else}-->
		<option value="<!--{$DATA_KELAS_LALIN[x].kode_kelas_lalin}-->"  > <!--{$DATA_KELAS_LALIN[x].nama_kelas_lalin}--> </option>
		<!--{/if}-->
		<!--{/section}-->	
</select>
</td>
</tr>
<tr>
  <td colspan="3" class="hr">Total LHR </td>
  </tr>
<tr>
<td align="right" class="hr">&raquo;</td>
<td class="hr">Kendaraan Roda 4 </td>
<td><input type="text" name="lhr_roda_4" value="<!--{$LHR_RODA_4}-->"></td>
</tr>
<tr>
<td align="right" class="hr">&nbsp;&raquo;</td>
<td class="hr">Ekivalen Roda 4 </td>
<td><input type="text" name="lhr_ekivalen_roda_4" value="<!--{$LHR_EKIVALEN_RODA_4}-->"></td>
</tr>
<!--
<tr>
<td colspan="2" class="hr">Penduduk (jiwa) </td>
<td><input type="text" name="jumlah_penduduk" value="<!--{$JUMLAH_PENDUDUK}-->"></td>
</tr>
-->
<tr>
<td colspan="2" class="hr">Bulan Tahun Perubahan Data </td>
<td>
<!-- Disabled on 06-09-2010
<input type="text" name="bln_thn_perubahan_data" value="
<!--{if $BLN_THN_PERUBAHAN_DATA==''}-->
<!--{$smarty.now|date_format:"%Y-%m-%d"}-->
<!--{else}-->
<!--{$BLN_THN_PERUBAHAN_DATA}-->
<!--{/if}-->" size="15">
 <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.bln_thn_perubahan_data,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">
 -->
  Bulan :
 <select name="data_bulan_2">
 <!--{foreach from=$DAFTAR_BULAN item=foo key=k}-->
 <!--{if $DATA_BULAN_2==$k}--> 
	<option value="<!--{$k}-->" selected ><!--{$foo}--></option>
 <!--{else}-->
	<option value="<!--{$k}-->"><!--{$foo}--></option>
 <!--{/if}-->
 <!--{/foreach}-->
</select>&nbsp;
 Tahun :<input type="text" name="data_tahun_2" value="<!--{$DATA_TAHUN_2}-->" size="4" maxlength="4"> 
</td>
</tr>

<!-- Disabled 16-09-2010
<tr>
  <td colspan="3" class="hr">Total Ruas Jalan </td>
  </tr>
<tr>
<td align="right" class="hr">&raquo;</td>
<td class="hr">Status</td>
<td><input name="status_lingkungan" type="text" value="<!--{$STATUS_LINGKUNGAN}-->" size="35" maxlength="100"></td>
</tr>
<tr>
<td align="right" class="hr">&raquo;</td>
<td class="hr">Rawan</td>
<td><input name="rawan_lingkungan" type="text" value="<!--{$RAWAN_LINGKUNGAN}-->" size="35" maxlength="100"></td>
</tr>
<tr>
<td align="right" class="hr">&raquo;</td>
<td class="hr">Studi</td>
<td><input name="studi_lingkungan" type="text" value="<!--{$STUDI_LINGKUNGAN}-->" size="35" maxlength="100"></td>
</tr>
-->
<TR>
<td colspan="3">&nbsp;</td>
</TR>
	<TR>
	<TD COLSPAN="2"></TD>
	<TD>
	<INPUT TYPE="hidden" name="xid_k_01_main" value="<!--{$ID_K_01_MAIN}-->">
	<INPUT TYPE="hidden" name="xid_form_k_01_detail" value="<!--{$ID_FORM_K_01_DETAIL}-->">
	<INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
	<INPUT TYPE="hidden" name="limit" value="<!--{$LIMIT}-->">
	<INPUT TYPE="hidden" name="SORT" value="<!--{$SORT}-->">
	<INPUT TYPE="hidden" name="page" value="<!--{$page}-->">
	<INPUT TYPE="hidden" name="Search_Year" value="<!--{$SEARCH_YEAR}-->">
	<INPUT TYPE="hidden" name="op" value="0">
	<a class="button" href="#" onclick="this.blur();return checkFrm(frmCreate);"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$SUBMIT}--></span></a>
	<a class="button" href="#" onclick="this.blur();document.frmCreate.reset(); resetFrm(frmCreate); "><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$RESET}--></span></a>
	</TD>
	</TR>
	</TABLE>
		</FORM>
		</td></tr>
		</table>
		
		</DIV>	
		
	<DIV ID="_menuEntry2_1" style="top:10px;width:100%;position:absolute;">
	<TABLE WIDTH="100%" ALIGN="CENTER" CELLPADDING="1" CELLSPACING="2">
		<!--DIVIDER HERE-->
		<TR>
			<TD>
		<DIV ID="_menuEdit_1">

		<div id="panel-box">
		<div id="title-box2">Pencarian Data</div>
		<div id="title-box-close"><img src="<!--{$HREF_IMG_PATH}-->/icon/close.gif" onClick="document.getElementById('_menuEdit_1').style.display='none';" align="absmiddle" class="imgLink" title="Close"></div>
		<div id="panel-content">
		
		<FORM METHOD=GET ACTION="" NAME="frmList1">
		<TABLE id="table-search-box">							

			<TR>
				<TD><!--{$TB_JENIS_JALAN}--></TD>
				<TD>
				<select name="jns_jln">
				<option value="">[Pilih Kategori Jalan]</option>
					<!--{section name=x loop=$DATA_JENIS_JLN}-->
					<!--{if $DATA_JENIS_JLN[x].id == $PID_JENIS_JLN2}-->
					<option value="<!--{$DATA_JENIS_JLN[x].id}-->" selected > <!--{$DATA_JENIS_JLN[x].nm}--> </option>
					<!--{else}-->
					<option value="<!--{$DATA_JENIS_JLN[x].id}-->"  > <!--{$DATA_JENIS_JLN[x].nm}--> </option>
					<!--{/if}-->
					<!--{/section}-->
				</select>
				</TD>
			</TR>

			<TR>
				<TD><!--{$TB_PROPINSI}--></TD>
				<TD>
				<SELECT name="no_propinsi" onChange="cari_kabupaten(this.value)">
				<OPTION VALUE="">[Pilih Provinsi]</OPTION>
				<!--{section name=x loop=$DATA_PROPINSI}-->
				<!--{if $DATA_PROPINSI[x].no_propinsi == $NO_PROPINSI}-->
				<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->" selected > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>				
				<!--{else}-->
					<!--{if $DATA_PROPINSI[x].no_propinsi == $ID_PROPINSI AND $NO_PROPINSI=="" }-->
					<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->" selected > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>		
					<!--{else}-->
					<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->"  > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
					<!--{/if}-->
				<!--{/if}-->
				<!--{/section}-->
				</SELECT>
				</TD>
			</TR>
			<TR>
				<TD><!--{$TB_KABUPATEN}--></TD>
				<TD>
				<div id="ajax_kabupaten">
				<SELECT name="no_kabupaten">
				<OPTION VALUE="">[Pilih Kabupaten]</OPTION>
				<!--{section name=x loop=$DATA_KABUPATEN}-->
				<!--{if $DATA_KABUPATEN[x].no_kabupaten == $NO_KABUPATEN}-->
				<option value="<!--{$DATA_KABUPATEN[x].no_kabupaten}-->" selected > <!--{$DATA_KABUPATEN[x].nama_kabupaten}--> </option>
				<!--{else}-->
				<option value="<!--{$DATA_KABUPATEN[x].no_kabupaten}-->"  > <!--{$DATA_KABUPATEN[x].nama_kabupaten}--> </option>
				<!--{/if}-->
				<!--{/section}-->
				</SELECT>
				</div>
				</TD>
			</TR>
			<TR>
				<TD>Tahun</TD>
				<TD><!--{html_select_date prefix="Search_" start_year="2000" end_year="+10" display_days=false display_months=false display_year=true}--></TD>
			</TR>
			<TR>
				<TD COLSPAN="2" height="4"></TD></TR>
			<TR>
				<TD></TD>
				<TD>
				<INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
				<INPUT TYPE="hidden" name="limit" value="<!--{$LIMIT}-->">
				<INPUT TYPE="hidden" name="search" value="1">
				<INPUT TYPE="hidden" name="SORT" value="<!--{$SORT}-->">
				<INPUT TYPE="hidden" name="page" value="<!--{$page}-->">
				<INPUT TYPE="hidden" name="op" value="0">
				<a class="button" href="#" onclick="this.blur();document.frmList1.submit(); document.frmList1.page.value='1';"  onSubmit="frmList1.page.value='1';"><span><img src="<!--{$HREF_IMG_PATH}-->/button/blank.gif" align="absmiddle"> <!--{$SUBMIT}--></span></a>
				<a class="button" href="#" onclick="this.blur();document.frmList1.reset(); resetFrm(frmCreate); "><span><img src="<!--{$HREF_IMG_PATH}-->/button/blank.gif" align="absmiddle"> <!--{$RESET}--></span></a>
				</TD>
			</TR>										
			</TABLE>
			</FORM>
			</div></div>	
		</DIV>
	
		<FORM METHOD=GET ACTION="" NAME="frmList">
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat"> <!--{$TABLE_CAPTION}--></td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/columns.gif" align="absmiddle" border="0"> <!--{$TABLE_NAME}--></td></tr>
		<tr><td class="alt2" style="padding:0px;">
		<!--{if $NO_PROPINSI<>"" AND $NO_KABUPATEN<>""}-->	
		<table width="100%">
		<tr><td>
		<table class="tbheader">
			<tr>
				<td width="100">Provinsi </td>
				<td width="10"> : </td>
				<td><!--{$NAMA_PROPINSI}--></td>
			</tr>
			<tr>
				<td>Kabupaten/Kota </td>
				<td> : </td>
				<td><!--{$NAMA_KABUPATEN}--></td>
			</tr>
			<tr>
				<td>Tahun </td>
				<td> : </td>
				<td><!--{$SEARCH_YEAR}--></td>
			</tr>
		</table>
		</TD></TR>
		<TR>
		<TD>
		<TABLE  WIDTH="100%">
			<TR>
			<th class="tdatahead"><!--{$TB_NO}--></TH>
			<th class="tdatahead"><!--{$TB_NAMA_PANGKAL_RUAS}--></TH>
			<th class="tdatahead"><!--{$TB_NAMA_UJUNG_RUAS}--></TH>
			<th class="tdatahead"><!--{$TB_TITIK_PENGENAL_PANGKAL}--></TH>
			<th class="tdatahead"><!--{$TB_TITIK_PENGENAL_UJUNG}--></TH>
			<th class="tdatahead" COLSPAN="3"><!--{$ACTION}--></TH>
			</TR>
			
			<!--{section name=x loop=$DATA_TB}-->
			<tr class='<!--{cycle values="alt,alt3"}-->'>
			<td width="17" class="tdatacontent-first-col"> <!--{$DATA_TB[x].no_ruas}-->&nbsp;&nbsp;</TD>
			<td class="tdatacontent" nowrap> <!--{$DATA_TB[x].nama_pangkal_ruas}--> </TD>
			<td class="tdatacontent" nowrap> <!--{$DATA_TB[x].nama_ujung_ruas}--> </TD>
			<td class="tdatacontent" nowrap> <!--{$DATA_TB[x].titik_pengenal_pangkal}--> </TD>
			<td class="tdatacontent" nowrap> <!--{$DATA_TB[x].titik_pengenal_ujung}--> </TD>
			<td width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/view.gif" BORDER=0 ALT="View Selected Data" onClick="return checkView('<!--{$SELF}-->?opt=1&id_k_01_main=<!--{$DATA_TB[x].id_k_01_main}-->&id_k_01_detail=<!--{$DATA_TB[x].id_form_k_01_detail}-->&Search_Year=<!--{$SEARCH_YEAR}-->&mod_id=<!--{$MOD_ID}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
			<td width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/edit.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<!--{$EDIT}-->" onClick="return checkEdit('<!--{$SELF}-->?opt=1&id_k_01_main=<!--{$DATA_TB[x].id_k_01_main}-->&id_k_01_detail=<!--{$DATA_TB[x].id_form_k_01_detail}-->&Search_Year=<!--{$SEARCH_YEAR}-->&mod_id=<!--{$MOD_ID}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
			<td width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/delete.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<!--{$DELETE}-->" onClick="return checkDelete('engine.php?op=2&id_k_01_main=<!--{$DATA_TB[x].id_k_01_main}-->&Search_Year=<!--{$SEARCH_YEAR}-->&mod_id=<!--{$MOD_ID}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
			</TR>
			<!--{sectionelse}-->
			<TR>
			<td class="tdatacontent" COLSPAN="7" align="center">Sorry, your query has not been successful, please try again</TD>
			</TR>
			<!--{/section}-->
			</tbody>
		</table></td></tr></table>

<div id="panel-footer">
<table width="100%">
<tr class="text-regular">
<td width="20">Show</td>
<td width="35">
<INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
<INPUT TYPE="hidden" name="search" value="1">
<INPUT TYPE="hidden" name="no_propinsi" value="<!--{$NO_PROPINSI}-->">
<INPUT TYPE="hidden" name="no_kabupaten" value="<!--{$NO_KABUPATEN}-->">
<INPUT TYPE="hidden" name="Search_Year" value="<!--{$SEARCH_YEAR}-->">
		<SELECT NAME="limit" onchange="this.form.page.value='1'; this.form.submit();" class="text-paging">
		<!--{section name=x loop=$LISTVAL}-->
		<OPTION VALUE = "<!--{$LISTVAL[x]}-->" <!--{if $LISTVAL[x]==$LIMIT}--> SELECTED <!--{/if}-->> <!--{$LISTVAL[x]}--> </OPTION>
		<!--{/section}-->
		</SELECT></td>
<td>Record : <!--{$COUNT_VIEW}--> - <!--{$COUNT_ALL}--> of <!--{$COUNT}--></td>
<td align="right"><!--{$NEXT_PREV}--></td>
</tr>
</table>
<!--{/if}-->
</div>				
		</td></tr>
		</table>
		
		</form>

	<div id="div-bg-note-trans"><img src="<!--{$HREF_IMG_PATH}-->/layout/note.png"></div>

	</DIV></BODY></HTML>