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
<!-- #EndEditable -->

</HEAD>

<body class="contentPage" onLoad="hideIt(); <!--{if $OPT==1}-->showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<!--{else}-->hideAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<!--{/if}-->">

<div id="add-search-box">
<a class="button" href="#" onclick="this.blur();showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);this.disabled=true;" <!--{if $OPT==1}--> DISABLED <!--{/if}-->><span><img src="<!--{$HREF_IMG_PATH}-->/icon/details.gif" align="absmiddle"> <!--{$BTN_NEW}--></span></a>
<a class="button" href="#" onclick="this.blur();showLevel('_menuEdit_',1,1);"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/search.png" align="absmiddle"> Search By</span></a>
</div>
		
		<DIV ID="_menuEntry1_1" style="top:10px;width:100%;display:none;position:absolute;">

		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat"> Data Berita Keluar</td></tr> 
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/form.gif" align="absmiddle" border="0"> Form Add/Edit Data</td></tr>
		<tr><td class="alt2" style="padding:0px;">
		
		<FORM NAME="frmCreate" METHOD="POST" ACTION="engine.php">
		<TABLE id="table-add-box">

				<TR>
					<TD>No. Agenda </TD>
					<TD>
					
					<!--{if $EDIT_VAL==0}-->
					<INPUT TYPE="text" NAME="kode_agenda_keluar"   size="25"   class="text_disabled">
				 
					<!--{else}-->
					<INPUT TYPE="text" NAME="kode_agenda_keluar" value="<!--{$EDIT_KODE_AGENDA_KELUAR}-->" size="25" readOnly class="text_disabled">
					<!--{/if}-->
					</TD>			
				</TR>
 
				<TR>
					<TD>No. Berita</TD>
					<TD><INPUT TYPE="text" NAME="no_berita" value="<!--{$EDIT_NO_BERITA}-->" size="25"></TD>
				</TR>
 

				<TR>
					<TD>Tanggal Berita </TD>
					<TD>
					<!--{if $EDIT_VAL==0}-->

							 <input type="text" name="tanggal" value="<!--{$smarty.now|date_format:"%Y-%m-%d"}-->" >
							 <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.tanggal,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">  	
					<!--{else}-->
								 <input type="text" name="tanggal" value="<!--{$EDIT_TANGGAL_BERITA}-->" >
							 <img src="<!--{$HREF_IMG_PATH}-->/icon/calendar.png"  onclick="displayCalendar(document.frmCreate.tanggal,'yyyy-mm-dd',this)"  class="imgLink" align="absmiddle" title="Show Calendar List">  	
					<!--{/if}-->
					</TD>	


				<TR>
					<TD>Pembuat Berita</TD>
					<TD><select name="kode_subdit" > 
						<option value=""> </option>
						<!--{section name=x loop=$DATA_SUBDIT}-->
						<!--{if trim($DATA_SUBDIT[x].kode_subdit) == $EDIT_KODE_SUBDIT}-->
						<option value="<!--{$DATA_SUBDIT[x].kode_subdit}-->" selected > <!--{$DATA_SUBDIT[x].nama_subdit}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_SUBDIT[x].kode_subdit}-->" > <!--{$DATA_SUBDIT[x].nama_subdit}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select>		 </TD>
				</TR>


				<TR>
					<TD>Ditujukan Ke Perwakilan</TD>
					<TD><select name="kode_perwakilan" > 
						<option value=""> </option>
						<!--{section name=x loop=$DATA_PWK}-->
						<!--{if trim($DATA_PWK[x].kode_perwakilan) == $EDIT_KODE_PERWAKILAN}-->
						<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->" selected > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->"  > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select>		 </TD>
				</TR>

			<TR>
					<TD>Jumlah Hal</TD>
					<TD><INPUT TYPE="text" NAME="jml_hal" value="<!--{$EDIT_JML_HAL}-->" size="12"> Hal</TD>
				</TR>


				<TR>
					<TD>Info/Tembusan</TD>
					<TD><INPUT TYPE="text" NAME="info" value="<!--{$EDIT_INFO}-->" size="35"></TD>
				</TR>



				 <TR>
					<TD>Isi Berita</TD>
					<TD><textarea cols="150" rows="9" name="isi_berita"><!--{$EDIT_ISI_BERITA}--></textarea> </TD>
				</TR>
  	


				<TR>
					<TD>Isi Nomor Kawat/Fasimil setelah dikirim ke perwakilan </TD>
					<TD><INPUT TYPE="text" NAME="no_kawat" value="<!--{$EDIT_NO_KAWAT}-->" size="50"></TD>
				</TR>
 
	  

				<TR><td height="40"></td>
					<TD>
					 
				 
					<INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
					<INPUT TYPE="hidden" name="limit" value="<!--{$LIMIT}-->">
					<INPUT TYPE="hidden" name="SORT" value="<!--{$SORT}-->">
					<INPUT TYPE="hidden" name="page" value="<!--{$page}-->">
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
								<TD>Perwakilan</TD>
								<TD><select name="kode_perwakilan_cari" > 
									<option value=""> Pilih Perwakilan </option>
									<!--{section name=x loop=$DATA_PWK}-->
									<!--{if trim($DATA_PWK[x].kode_perwakilan) == $EDIT_KODE_PERWAKILAN}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->" selected > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{else}-->
									<option value="<!--{$DATA_PWK[x].kode_perwakilan}-->"  > <!--{$DATA_PWK[x].nm_perwakilan}--> </option>
									<!--{/if}-->
									<!--{/section}-->
									</select>		</TD>
							</TR>
							
							<TR>
								<TD>No. KTP WNI</TD>
								<TD><INPUT TYPE="text" NAME="kode_wni_cari" size="30"></TD>
							</TR>
							<TR>
								<TD>Nama WNI </TD>
								<TD><INPUT TYPE="text" NAME="nama_wni_cari" size="30"></TD>
							</TR>
							 
			<TR><TD></TD>
				<TD>
				<INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
				<INPUT TYPE="hidden" name="limit" value="<!--{$LIMIT}-->">
				<INPUT TYPE="hidden" name="search" value="1">
				<INPUT TYPE="hidden" name="SORT" value="<!--{$SORT}-->">
				<INPUT TYPE="hidden" name="page" value="<!--{$page}-->">
				<INPUT TYPE="hidden" name="op" value="0">
				<CENTER>
				<a class="button" href="#" onclick="this.blur(); document.frmList1.submit(); document.frmCreate.page.value='1';" onSubmit="frmCreate.page.value='1'; return false;"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$SUBMIT}--></span></a>
				<a class="button" href="#" onclick="this.blur();document.frmList1.reset(); document.frmList1.nama_propinsi.focus();"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/blank.gif" align="absmiddle"><!--{$RESET}--></span></a>					
				</CENTER>
				</TD>
			</TR>
			</TABLE>
			</FORM>
			</div></div>	
		</DIV>
		
		<FORM METHOD=GET ACTION="" NAME="frmList">
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat"> Data Berita Keluar</td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/columns.gif" align="absmiddle" border="0"> Daftar Berita Keluar</td></tr>
		<tr><td class="alt2" style="padding:0px;">
		<table width="100%">
		<tr>
											<th class="tdatahead">No</TH>
											<th class="tdatahead">No. Agenda</TH>
											<th class="tdatahead">No. Berita</TH>
											<th class="tdatahead">Pembuat Berita</TH>
											<th class="tdatahead">Ditujukan Ke   Perwakilan </TH>
											<th class="tdatahead">Tanggal Berita</TH>
											<th class="tdatahead">Info</TH>
											 <th class="tdatahead" COLSPAN="2"><!--{$ACTION}--></th>
			</tr>
			</thead>
			<tbody>
			<!--{section name=x loop=$DATA_TB}-->										
			<tr class='<!--{cycle values="alt,alt3"}-->'>
											<td width="17" class="tdatacontent-first-col"> <!--{$smarty.section.x.index+$COUNT_VIEW}-->.</TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].kode_agenda_keluar}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].no_berita}--> </TD>											
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].nama_subdit}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].nm_perwakilan}--> </TD> 
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].tanggal_berita}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].info}--> </TD>
											<TD width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/edit.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<!--{$EDIT}-->" onclick="return checkEdit('<!--{$SELF}-->?opt=1&kode_agenda_keluar=<!--{$DATA_TB[x].kode_agenda_keluar}-->&mod_id=<!--{$MOD_ID}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
											<TD width="20" class="tdatacontent" ALIGN="CENTER"><IMG SRC="<!--{$HREF_IMG_PATH}-->/icon/delete.gif" WIDTH="12" HEIGHT="13" BORDER=0 ALT="<!--{$DELETE}-->" onclick="return checkDelete('engine.php?op=2&kode_agenda_keluar=<!--{$DATA_TB[x].kode_agenda_keluar}--> &mod_id=<!--{$MOD_ID}-->&<!--{$STR_COMPLETER_}-->');" class="imgLink"></TD>
										</TR>
										<!--{sectionelse}-->
										<TR>
											<TD class="tdatacontent" COLSPAN="8" align="center">Maaf, Data masih kosong</TD>
										</TR>
			<!--{/section}-->
			</tbody>
		</table>
<div id="panel-footer">
<table width="100%">
<tr class="text-regular">
<td width="20">Show</td>
<td width="35"><INPUT TYPE="hidden" name="mod_id" value="<!--{$MOD_ID}-->">
		<SELECT NAME="limit" onchange="this.form.page.value='1'; this.form.submit();" class="text-paging">
		<!--{section name=x loop=$LISTVAL}-->
		<OPTION VALUE = "<!--{$LISTVAL[x]}-->" <!--{if $LISTVAL[x]==$LIMIT}--> SELECTED <!--{/if}-->> <!--{$LISTVAL[x]}--> </OPTION>
		<!--{/section}-->
		</SELECT></td>
<td>Record : <!--{$COUNT_VIEW}--> - <!--{$COUNT_ALL}--> of <!--{$COUNT}--></td>
<td align="right"><!--{$NEXT_PREV}--></td>
</tr>
</table>
</div>				
		</td></tr>
		</table>
		
		</form>

	<div id="div-bg-note-trans"><img src="<!--{$HREF_IMG_PATH}-->/layout/note.png"></div>

	</DIV>
</BODY>
</HTML>