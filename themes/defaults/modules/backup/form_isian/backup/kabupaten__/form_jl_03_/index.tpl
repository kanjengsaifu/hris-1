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
			<img src="<!--{$HREF_IMG_PATH}-->/ajax-lob.gif" align="absmiddle"> Loading Page....
		</td></tr>
	</table>
</div>

<link rel="stylesheet" href="<!--{$HREF_CSS_PATH}-->/default.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/global.js"></SCRIPT>
<link rel="stylesheet" href="<!--{$HREF_CSS_PATH}-->/dhtmlgoodies_calendar.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/calendar/dhtmlgoodies_calendar.js"></SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</HEAD>

<!--{if $SEARCH_BOX==1}-->
<body class="contentPage" onLoad="hideIt(); <!--{if $OPT==1}-->showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<!--{else}-->showAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<!--{/if}-->">
<!--{else}-->
<body class="contentPage" onLoad="hideIt(); <!--{if $OPT==1}-->showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<!--{else}-->hideAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<!--{/if}-->">
<!--{/if}-->

<div id="add-search-box">
<a class="button" href="#" onclick="this.blur();showAll('_menuEntry3_',1);hideAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);this.disabled=true;"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/databases.png" align="absmiddle">Export Data</span></a>
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
				<a class="button" href="#" onclick="this.blur();document.frmCreate2.submit(); document.frmCreate2.page.value='1';"  onSubmit="frmCreate2.page.value='1';"><span><img src="<!--{$HREF_IMG_PATH}-->/button/blank.gif" align="absmiddle"> <!--{$SUBMIT}--></span></a>
				<a class="button" href="#" onclick="this.blur();document.frmCreate2.reset(); resetFrm(frmCreate); "><span><img src="<!--{$HREF_IMG_PATH}-->/button/blank.gif" align="absmiddle"> <!--{$RESET}--></span></a>
				</TD>
			</TR>									
			</TABLE>	
		</FORM>
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
<td width="150">Tanggal</td><td><input type="text" name="tanggal" value="
<!--{if $TANGGAL==''}-->

<!--{else}-->
<!--{$TANGGAL}-->
<!--{/if}-->"> <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.tanggal,'dd-mm-yyyy',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">
</td></tr>
<tr><td width="150">Nama Propinsi</td><td>
<SELECT name="no_propinsi" onChange="cari_kabupaten2(this.value)">
<OPTION VALUE="">[Pilih Propinsi]</OPTION>
<!--{section name=x loop=$DATA_PROPINSI}-->
<!--{if trim($DATA_PROPINSI[x].no_propinsi) == trim($NO_PROPINSI)}-->
<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->" selected > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
<!--{else}-->
<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->"  > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
<!--{/if}-->
<!--{/section}-->
</SELECT></td></tr>
<tr><td width="150">Nama Kabupaten</td><td>
<div id="ajax_kabupaten2">
<SELECT name="no_kabupaten"   onChange="cari_kecamatan(<!--{$NO_PROPINSI|default:'0'}-->,this.value)">
<OPTION VALUE="">[Pilih Kabupaten]</OPTION>
<!--{section name=x loop=$DATA_KABUPATEN}-->
<!--{if $DATA_KABUPATEN[x].no_kabupaten == $NO_KABUPATEN}-->
<option value="<!--{$DATA_KABUPATEN[x].no_kabupaten}-->" selected > <!--{$DATA_KABUPATEN[x].nama_kabupaten}--> </option>
<!--{else}-->
<option value="<!--{$DATA_KABUPATEN[x].no_kabupaten}-->"  > <!--{$DATA_KABUPATEN[x].nama_kabupaten}--> </option>
<!--{/if}-->
<!--{/section}-->								
</SELECT>	
</td></tr>
</table>

<div id="title-box2">Deskripsi</div>

<TABLE id="table-add-box">

<!-- Tambahan 21-06-2010 -->
<!--
<tr>
<td>Kategori Jalan</td>
<td><select name="jns_jln">
<option value="">[Pilih Kategori Jalan]</option>
	<!--{section name=x loop=$DATA_JENIS_JLN}-->
	<!--{if $DATA_JENIS_JLN[x].id == $JENIS_JLN}-->
	<option value="<!--{$DATA_JENIS_JLN[x].id}-->" selected > <!--{$DATA_JENIS_JLN[x].nm}--> </option>
	<!--{else}-->
	<option value="<!--{$DATA_JENIS_JLN[x].id}-->"  > <!--{$DATA_JENIS_JLN[x].nm}--> </option>
	<!--{/if}-->
	<!--{/section}-->
</select>
</td>
</tr>
-->
<!-- End 0f Tambahan 21-06-2010 -->

<tr valign="top">
<td width="200">No Ruas</td>
<td><div id="ajax_no_ruas"><input name="no_ruas" type="text" value="<!--{$NO_RUAS}-->" size="20" maxlength="200" OnKeyUp="get_data_ruas(<!--{$NO_PROPINSI|default:0}-->,<!--{$NO_KABUPATEN|default:0}-->,this.value)">
<!--{if $TOTAL_RUAS_JALAN>0}--><img src="<!--{$HREF_IMG_PATH}-->/icon/table.gif" border="0" title="Tampilkan Data Ruas Jalan" onclick="showRuas();" class="imgLink" align="absmiddle"><!--{/if}--></div>
<div id="ajax_no_ruas2" style="position:absolute;display:none;">
<select id="no_ruas_results" multiple size="10" onchange="showRuas();frmCreate.no_ruas.value=this.value; get_data_ruas(<!--{$NO_PROPINSI|default:0}-->,<!--{$NO_KABUPATEN|default:0}-->,this.value);">";
<!--{section name=x loop=$DATA_RUAS_JALAN}-->
<!--{if $DATA_RUAS_JALAN[x].no_ruas == $NAMA_RUAS}-->
<option value="<!--{$DATA_RUAS_JALAN[x].no_ruas}-->" selected ><!--{$DATA_RUAS_JALAN[x].no_ruas}--> -> <!--{$DATA_RUAS_JALAN[x].nama_pangkal_ruas}--> - <!--{$DATA_RUAS_JALAN[x].nama_ujung_ruas}--></option>
<!--{else}-->
<option value="<!--{$DATA_RUAS_JALAN[x].no_ruas}-->"  ><!--{$DATA_RUAS_JALAN[x].no_ruas}--> -> <!--{$DATA_RUAS_JALAN[x].nama_pangkal_ruas}--> - <!--{$DATA_RUAS_JALAN[x].nama_ujung_ruas}--></option>
<!--{/if}-->
<!--{/section}-->								
</SELECT>
</div>
</td>
</tr>

<tr><td>Nama Paket/Ruas Jalan</td><td><div id="ajax_nama_ruas"><input name="nama_ruas" type="text" value="<!--{$NAMA_RUAS}-->" size="75" maxlength="200" readonly></div></td></tr>
<tr><td>Kategori Jalan</td><td>
<!-- <div id="ajax_hidden_jns_jln"><INPUT TYPE="hidden" name="txt_hidden_jns_jln" value="<!--{$ID_HIDDEN_JSN_JLN}-->"></div> -->
<div id="ajax_hidden_jns_jln"><INPUT TYPE="hidden" name="txt_hidden_jns_jln" value="<!--{$ID_HIDDEN_JSN_JLN}-->"></div>
<div id="ajax_jns_jln"><input name="txt_jns_jln" type="text" value="<!--{$PID_JENIS_JLN}-->" size="35" maxlength="200" readonly></div>
</td></tr>

<tr valign="top"><td>Kecamatan yang dilalui</td><td><div id="ajax_kecamatan">
<!--{if $NO_PROPINSI=='' OR $NO_KABUPATEN==''}--><input type="text" size="35" style="text-align:center" name="nama_kecamatan" value="[Pilih Data Provinsi + Data Kabupaten]" readonly><!--{/if}-->
<table class="text-regular" cellspacing="0" cellpadding="0" width="400">
<!--{section name=x loop=$DATA_KECAMATAN}-->
<!--{if $smarty.section.x.index%2==0}-->
<tr>
<!--{/if}-->
<td width="15"><input type="checkbox" class="checkbox" name="kecamatan<!--{$smarty.section.x.index}-->" value="<!--{$DATA_KECAMATAN[x].nama_kecamatan}-->" 
<!--{foreach from=$KECAMATAN_YG_DILALUI item=curr_id}-->
<!--{if trim(strtolower($DATA_KECAMATAN[x].nama_kecamatan))==trim(strtolower($curr_id))}--> checked <!--{/if}-->
<!--{/foreach}-->
 readonly>
</td>
<td><!--{$DATA_KECAMATAN[x].nama_kecamatan}--></td>
<!--{if $smarty.section.x.index%2==1}-->
</tr>
<!--{/if}-->

<!--{/section}-->	
</table>
<input type="hidden" name="jml_kecamatan" value="<!--{$JML_KECAMATAN}-->"></td></tr>

<tr valign="top"><td width="200">Kesesuaian RD dengan Pemanfaatan DAK</td><td><input type="radio" class="radio" name="rd_dak" id="rd_dak" value="1" <!--{if $RD_DAK=="1"}-->checked="checked" <!--{/if}-->/>Ya
<input type="radio" class="radio" name="rd_dak" id="rd_dak" value="0" <!--{if $RD_DAK=="0" OR $RD_DAK==""}-->checked="checked" <!--{/if}-->/>Tidak
</td></tr>
<tr><td width="150">Kesesuaian Program dengan RD</td><td><input type="radio" class="radio" name="rd" id="rd" value="1" <!--{if $RD=="1"}-->checked="checked" <!--{/if}-->/>Ya
<input type="radio" class="radio" name="rd" id="rd" value="0" <!--{if $RD=="0" OR $RD==""}-->checked="checked" <!--{/if}-->/>Tidak
</td></tr>
<tr valign="top"><td width="150">Alasan Ketidaksesuaian</td><td><textarea name="alasan" cols="75" rows="4" wrap="virtual" maxlength="65535"><!--{$ALASAN}--></textarea></td></tr>
<tr><td width="150">Kelengkapan Data</td><td></td></tr>
<tr><td width="150"> - Gambar</td><td><input type="radio" class="radio" name="kelengkapan_gambar" id="kelengkapan_gambar" value="1" <!--{if $KELENGKAPAN_GAMBAR=="1"}-->checked="checked" <!--{/if}-->/>Ya
<input type="radio" class="radio" name="kelengkapan_gambar" id="kelengkapan_gambar" value="0" <!--{if $KELENGKAPAN_GAMBAR=="0" OR $KELENGKAPAN_GAMBAR==""}-->checked="checked" <!--{/if}-->/>Tidak
</td></tr>
<tr><td width="150"> - Spesifikasi</td><td><input type="radio" class="radio" name="kelengkapan_spesifik" id="kelengkapan_spesifik" value="1" <!--{if $KELENGKAPAN_SPESIFIK=="1"}-->checked="checked" <!--{/if}-->/>Ya
<input type="radio" class="radio" name="kelengkapan_spesifik" id="kelengkapan_spesifik" value="0" <!--{if $KELENGKAPAN_SPESIFIK=="0" OR $KELENGKAPAN_SPESIFIK==""}-->checked="checked" <!--{/if}-->/>Tidak
</td></tr>
<tr><td width="150"> - RAB</td><td><input type="radio" class="radio" name="kelengkapan_rab" id="kelengkapan_rab" value="1" <!--{if $KELENGKAPAN_RAB=="1"}-->checked="checked" <!--{/if}-->/>Ya
<input type="radio" class="radio" name="kelengkapan_rab" id="kelengkapan_rab" value="0" <!--{if $KELENGKAPAN_RAB=="0" OR $KELENGKAPAN_RAB==""}-->checked="checked" <!--{/if}-->/>Tidak
</td></tr>
<tr valign="top"><td width="150">Keterangan</td><td><textarea name="keterangan" cols="75" rows="4" wrap="virtual" maxlength="65535"><!--{$KETERANGAN}--></textarea>
</td></tr>
</table>
<TABLE id="table-add-box">
<tr><td width="165"></td><td width="150">
<INPUT TYPE="hidden" name="xid_jl_03_main" value="<!--{$ID_JL_03_MAIN}-->">
<INPUT TYPE="hidden" name="xid_form_jl_03_detail" value="<!--{$ID_FORM_JL_03_DETAIL}-->">		
<INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
<INPUT TYPE="hidden" name="limit" value="<!--{$LIMIT}-->">
<INPUT TYPE="hidden" name="SORT" value="<!--{$SORT}-->">
<INPUT TYPE="hidden" name="page" value="<!--{$page}-->">
<INPUT TYPE="hidden" name="Search_Year" value="<!--{$SEARCH_YEAR}-->">
<INPUT TYPE="hidden" name="op" value="0">
					<a class="button" href="#" onclick="this.blur();return checkFrm(frmCreate);"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$SUBMIT}--></span></a>
					<a class="button" href="#" onclick="this.blur();document.frmCreate.reset(); resetFrm(frmCreate); "><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$RESET}--></span></a>					
</td></tr>
</table></TD>
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
					<!--{if $DATA_JENIS_JLN[x].id == $ID_JNS_JLN}-->
					<option value="<!--{$DATA_JENIS_JLN[x].id}-->" selected > <!--{$DATA_JENIS_JLN[x].nm}--> </option>
					<!--{else}-->
					<option value="<!--{$DATA_JENIS_JLN[x].id}-->"  > <!--{$DATA_JENIS_JLN[x].nm}--> </option>
					<!--{/if}-->
					<!--{/section}-->
				</select>
				</TD>
			</TR>
			<!--
			<TR>
								<TD><!--{$TB_PROPINSI}--></TD>
								<TD>
								<SELECT name="no_propinsi" onChange="cari_kabupaten(this.value)">
								<OPTION VALUE="">[Pilih Propinsi]</OPTION>
								<!--{section name=x loop=$DATA_PROPINSI}-->
								<!--{if $DATA_PROPINSI[x].no_propinsi == $NO_PROPINSI}-->
								<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->" selected > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
								<!--{else}-->
								<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->"  > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
								<!--{/if}-->
								<!--{/section}-->
								</SELECT>
								</TD>
							</TR>
							-->

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
							<TD><!--{html_select_date prefix="Search_" start_year="2000" end_year="+10" display_days=false display_months=false}--></TD>
							</TR>
							<TR><TD COLSPAN="2" height="4"></TD></TR>
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
								<TR>
									<TD>
									<table class="tbheader">
									<tr><td width="100">Propinsi </td><td width="10"> : </td><td><!--{$NAMA_PROPINSI}--></td></tr>
									<tr><td>Kabupaten/Kota </td><td> : </td><td><!--{$NAMA_KABUPATEN}--></td></tr>
									<tr><td>Tahun </td><td> : </td><td><!--{$SEARCH_YEAR}--></td></tr>
									</table>
<table width="100%">
										<thead>
										<TR>
											<th class="tdatahead" ROWSPAN="2"><!--{$TB_NO}--></TH>
											<th class="tdatahead" ROWSPAN="2"><!--{$TB_NAMA_PAKET}--></TH>
											<th class="tdatahead" ROWSPAN="2"><!--{$TB_KECAMATAN}--></TH>
											<th class="tdatahead" COLSPAN="2"><!--{$TB_KESESUAIAN_PROGRAM}--></TH>											
											<th class="tdatahead" ROWSPAN="2" COLSPAN="2"><!--{$ACTION}--></TH>
										</TR>
										<TR>
											<th class="tdatahead"><!--{$TB_KESESUAIAN_RD_DAK}--></TH>
											<th class="tdatahead"><!--{$TB_KESESUAIAN_RD}--></TH>
										</TR>
										<tbody>
										<!--{section name=x loop=$DATA_TB}-->
										<tr class='<!--{cycle values="alt,alt3"}-->'>
											<td width="17" class="tdatacontent-first-col"> <!--{$smarty.section.x.index+$COUNT_VIEW}-->.&nbsp;&nbsp;</TD>
											<td class="tdatacontent" nowrap> <!--{$DATA_TB[x].nama_ruas}--> </TD>
											<td class="tdatacontent" nowrap> <!--{$DATA_TB[x].kecamatan_yg_dilalui}--> </TD>
											<TD class="tdatacontent" align="center"> <!--{$DATA_TB[x].rd_dak}--> </TD>
											<TD class="tdatacontent" align="center"> <!--{$DATA_TB[x].rd}--> </TD>
											<td width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/edit.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<!--{$EDIT}-->" onClick="return checkEdit('<!--{$SELF}-->?opt=1&id_fjl_03_main=<!--{$DATA_TB[x].id_fjl_03_main}-->&id_fjl_03_detail=<!--{$DATA_TB[x].id_fjl_03_detail}-->&Search_Year=<!--{$SEARCH_YEAR}-->&mod_id=<!--{$MOD_ID}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
											<td width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/delete.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<!--{$DELETE}-->" onClick="return checkDelete('engine.php?op=2&id_fjl_03_main=<!--{$DATA_TB[x].id_fjl_03_main}-->&Search_Year=<!--{$SEARCH_YEAR}-->&mod_id=<!--{$MOD_ID}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
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

	</DIV>	
</BODY>
</HTML>
