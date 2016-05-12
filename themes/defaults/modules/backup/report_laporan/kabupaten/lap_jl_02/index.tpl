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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- #EndEditable -->
</HEAD>

<!--{if $SEARCH_BOX==1}-->
<body class="contentPage" onLoad="hideIt(); <!--{if $OPT==1}-->showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<!--{else}-->showAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<!--{/if}-->">
<!--{else}-->
<body class="contentPage" onLoad="hideIt(); <!--{if $OPT==1}-->showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);<!--{else}-->hideAll('_menuEdit_',1);hideAll('_menuEntry1_',1);showAll('_menuEntry2_',1);<!--{/if}-->">
<!--{/if}-->
<div style="left:10;top:10;float:left;position:absolute;">
<a class="button" href="#" onclick="this.blur();showLevel('_menuEdit_',1,1);"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/search.png" align="absmiddle"> Search By</span></a>
<!--{if $NO_PROPINSI<>"" AND $NO_KABUPATEN<>"" AND $NO_JENIS_JALAN<>""}-->
<a class="button" href="#" onClick = "window.open('<!--{$FILES}-->');"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/print.gif" align="absmiddle"> &nbsp;Print</span></a>
<!--{/if}-->
</div>

	<DIV ID="_menuEntry2_1" style="width:100%;top:25px;position:absolute;">
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
							</TR>-->

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
														
					<!--{if $NO_PROPINSI<>"" AND $NO_KABUPATEN<>"" AND $NO_JENIS_JALAN<>""}-->
					<FORM METHOD=GET ACTION="" NAME="frmList">
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat"> <!--{$LIST_ME}--></td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">		
		<tr><td class="alt2" style="padding:0px;">
		<table width="100%">								
	
								<TR>
									<TD COLSPAN="2">
									<table width="100%" class="tbheader">										
									<tr><td width="50">Propinsi </td><td width="5"> : </td><td colspan="2"><!--{$NAMA_PROPINSI}--></td></tr>
									<tr><td width="50">Kabupaten/Kota </td><td width="5"> : </td><td><!--{$NAMA_KABUPATEN}--></td><td align="right"><b></b></td></tr>																		
									<tr><td width="50">Kategori Jalan</td><td width="5"> : </td><td><!--{if $NO_JENIS_JALAN=="1"}-->Provinsi<!--{else}-->Kabupaten/ Kota<!--{/if}--></td></tr>
									<tr><td>Tahun </td><td> : </td><td><!--{$SEARCH_YEAR}--></td></tr>
									</table>
									</TD>
								</TR>														
								<TR>
							
									<TD COLSPAN="2"><TABLE ALIGN="CENTER" WIDTH="100%"  cellspacing="1" cellpadding="2">										
										<thead>
										<TR>
											<TH class="tdatahead" ROWSPAN="2"><!--{$TB_NO}--></TH>
											<TH class="tdatahead" ROWSPAN="2"><!--{$TB_NO_KABUPATEN}--></TH>
											<TH class="tdatahead" ROWSPAN="2"><!--{$TB_NO_RUAS}--></TH>
											<TH class="tdatahead" ROWSPAN="2"><!--{$TB_NAMA_RUAS}--></TH>
											<TH class="tdatahead" COLSPAN="2"><!--{$TB_PANJANG}--></TH>
											<TH class="tdatahead" COLSPAN="4"><!--{$TB_PANJANG_TIAP_KONDISI}--></TH>
											<TH class="tdatahead" ROWSPAN="2"><!--{$TB_LHR}--></TH>		
											<TH class="tdatahead" ROWSPAN="2"><!--{$TB_AKSES_JALAN}--></TH>	
											<TH class="tdatahead" ROWSPAN="2"><!--{$TB_JUMLAH_PENDUDUK}--></TH>	
											<TH class="tdatahead" ROWSPAN="2"><!--{$TB_KETERANGAN}--></TH>									
											</TH>
										</TR>
										<TR>
											<TH class="tdatahead"><!--{$TB_PANJANG_KM}--></TH>
											<TH class="tdatahead"><!--{$TB_PANJANG_M}--></TH>											
											<TH class="tdatahead"><!--{$TB_PANJANG_BAIK}--></TH>
											<TH class="tdatahead"><!--{$TB_PANJANG_SEDANG}--></TH>
											<TH class="tdatahead"><!--{$TB_PANJANG_RUSAK}--></TH>
											<TH class="tdatahead"><!--{$TB_PANJANG_RUSAK_BERAT}--></TH>								
										</TR>
										<TR>
											<TH class="tdatahead" align="center">1</TD>
											<TH class="tdatahead" align="center">2</TD>
											<TH class="tdatahead" align="center">3</TD>
											<TH class="tdatahead" align="center">4</TD>
											<TH class="tdatahead" align="center">5</TD>
											<TH class="tdatahead" align="center">6</TD>
											<TH class="tdatahead" align="center">7</TD>
											<TH class="tdatahead" align="center">8</TD>
											<TH class="tdatahead" align="center">9</TD>
											<TH class="tdatahead" align="center">10</TD>
											<TH class="tdatahead" align="center">11</TD>
											<TH class="tdatahead" align="center">12</TD>
											<TH class="tdatahead" align="center">13</TD>
											<TH class="tdatahead" align="center">14</TD>
										</TR>
										</thead>	
										<tbody>										
										<!--{section name=x loop=$DATA_TB}-->
										<TR onmouseover="setPointer(this, <!--{$INITSET[x]}-->, 'over', '<!--{$ROW_CLASSNAME[x]}-->', '#CCFFCC', '#FFCC99');" onmouseout="setPointer(this, <!--{$INITSET[x]}-->, 'out', '<!--{$ROW_CLASSNAME[x]}-->', '#CCFFCC', '#FFCC99');" onmousedown="setPointer(this, <!--{$INITSET[x]}-->, 'click', '<!--{$ROW_CLASSNAME[x]}-->', '#CCFFCC', '#FFCC99');">
											<TD width="17" class="tdatacontent-first-col"> <!--{$smarty.section.x.index+$COUNT_VIEW}-->.&nbsp;&nbsp;</TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].no_kabupaten}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].no_ruas}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].nama_ruas}--> </TD>
											<!-- Disabled on 14-09-2010
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].panjang_km}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].panjang_m}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].kondisi_baik}--> (<!--{$KONDISI_BAIK[x]}-->%)</TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].kondisi_sedang}--> (<!--{$KONDISI_SEDANG[x]}-->%)</TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].kondisi_rusak}--> (<!--{$KONDISI_RUSAK_RINGAN[x]}-->%)</TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].kondisi_rusak_berat}--> (<!--{$KONDISI_RUSAK_BERAT[x]}-->%)</TD>
											-->
											<TD class="tdatacontent" nowrap> <!--{$DATA_PANJANG_KM[x]}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_PANJANG_M[x]}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_BAIK[x]}--> (<!--{$KONDISI_BAIK[x]}-->%)</TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_SEDANG[x]}--> (<!--{$KONDISI_SEDANG[x]}-->%)</TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_RUSAK[x]}--> (<!--{$KONDISI_RUSAK_RINGAN[x]}-->%)</TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_RUSAK_BERAT[x]}--> (<!--{$KONDISI_RUSAK_BERAT[x]}-->%)</TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].lhr_rata_rata}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].akses_jalan}--> </TD>
											<!-- Disabled on 14-09-2010
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].jumlah_penduduk}--> </TD>
											-->
											<TD class="tdatacontent" nowrap> <!--{$DATA_JUMLAH_PENDUDUK[x]}--> </TD>
											<TD class="tdatacontent" nowrap> <!--{$DATA_TB[x].keterangan}--> </TD>											
										</TR>
										<!--{sectionelse}-->
										<TR>
											<TD class="tdatacontent" BGCOLOR="red" COLSPAN="15" align="center">Sorry, your query has not been successful, please try again</TD>
										</TR>
										<!--{/section}-->
										</tbody>
									</TABLE></TD>	
								</TR>	
							</TABLE></TD>	
								</TR>	
							</TABLE>
<div style="position:relative;float:right;margin-top:20;"><INPUT TYPE="text" NAME="print_desc" class="text_transparent" style="background:transparant;border:0;">
									&nbsp;&nbsp;
									<IMG SRC="<!--{$HREF_IMG_PATH}-->/print.png" style="cursor:pointer" align="absmiddle" onMouseOver="document.frmList.print_desc.value='Print';" onMouseOut="document.frmList.print_desc.value='';" 
									onClick = "window.open('<!--{$FILES}-->');">							
									</div>
					</FORM>
					<!--{/if}-->

	</DIV>
</BODY>
</HTML>