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
<!--{if $SEARCH_YEAR<>""}-->
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
							<TD>Propinsi</TD>
							<TD>
					 
								<select name="no_propinsi" onchange="cari_kab(this.value);"> 
						<option value="">[Pilih Provinsi]</option>
						<!--{section name=x loop=$DATA_PROPINSI}-->
						<!--{if trim($DATA_PROPINSI[x].no_propinsi) == $EDIT_NO_PROP}-->
						<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->" selected > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_PROPINSI[x].no_propinsi}-->"  > <!--{$DATA_PROPINSI[x].nama_propinsi}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select>	
	
							</TD></TR>
						<TR><TD>Kabupaten/Kota</TD>	<TD>
					 
								<div id="ajax_kabupaten">
						<select name="id_kab" > 
						<option value="">[Pilih Kabupaten]</option>
						<!--{section name=x loop=$DATA_KABUPATEN}-->
						<!--{if trim($DATA_KABUPATEN[x].id_kabupaten) == $SES_ID_KAB}-->
						<option value="<!--{$DATA_KABUPATEN[x].id_kabupaten}-->" selected > <!--{$DATA_KABUPATEN[x].nama_kabupaten}--> </option>
						<!--{else}-->
						<option value="<!--{$DATA_KABUPATEN[x].id_kabupaten}-->"  > <!--{$DATA_KABUPATEN[x].nama_kabupaten}--> </option>
						<!--{/if}-->
						<!--{/section}-->
						</select>										
						</div>
	
							</TD>
							</TR>
						 
				<TR>
							<TD>Perwakilan</TD>
							<TD>
					 
								<SELECT name="kode_perwakilan"  style="width:200px" > 				  
								<OPTION VALUE="" selected>[Pilih Perwakilan]</OPTION>
								<!--{section name=x loop=$DATA_INSTANSI}-->						 
									<!--{if ($DATA_INSTANSI[x].kode_perwakilan) == $SES_PERWAKILAN}-->
									<option value="<!--{$DATA_INSTANSI[x].kode_perwakilan}-->" selected  > <!--{$DATA_INSTANSI[x].nm_perwakilan}--> </option>
									<!--{else}-->
									<option value="<!--{$DATA_INSTANSI[x].kode_perwakilan}-->"  > <!--{$DATA_INSTANSI[x].nm_perwakilan}--> </option>
									<!--{/if}-->
									<!--{/section}-->
								</SELECT>
	
							</TD>
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
														
		<!--{if $SEARCH<>""}--><br>
		<FORM METHOD=GET ACTION="" NAME="frmList">
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat">LAPORAN DATA WNI/TKI </td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">		
		<tr><td class="alt2" style="padding:0px;">
		<table width="100%" >

				
									<TR>
									<TD COLSPAN="2">
											<table width="100%" class="tbheader" border=0>	
											<!--{if ($NM_PROPINSI !='') }-->
											<tr><td class="tdatacontent"  width="100" >PROPINSI</td><td width="5"> : </td><td colspan="2"><!--{$NM_PROPINSI}--> &nbsp;</td></tr>
				<!--{/if}-->
				<!--{if ($NM_KABUPATEN !='') }-->
											<tr><td class="tdatacontent"  width="100" >KABUPATEN</td><td width="5"> : </td><td colspan="2"><!--{$NM_KABUPATEN}--> &nbsp;</td></tr>
				<!--{/if}-->
				<!--{if ($NM_PERWAKILAN !='') }-->
											<tr><td class="tdatacontent"  width="100" >PERWAKILAN</td><td width="5"> : </td><td colspan="2"><!--{$NM_PERWAKILAN}--> &nbsp;</td></tr>
				<!--{/if}-->



											


								
										 </TABLE>

										 <TABLE ALIGN="CENTER" WIDTH="100%"  cellspacing="1" cellpadding="2">						 
										 	
										<TR>
									 
											<TH class="tdatahead">NAMA</TH>
											<TH class="tdatahead">NO PASPOR</TH>
											<TH class="tdatahead">ALAMAT</TH>
											<TH class="tdatahead">TELP</TH>
											<TH class="tdatahead" >ALAMAT LN</TH>
											<TH class="tdatahead">TLP</TH>		
											<TH class="tdatahead">LAMA TINGGAL</TH>
											<TH class="tdatahead">PEKERJAAN</TH>
																						 
										</TR>			
 
										
												<!--{section name=y loop=$DATA_TB2}-->
														
													<TR>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].nama}--></TD>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].kode_wni}--></TD>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].alamat}--></TD>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].tlp}--></TD>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].alamat_ln}--></TD>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].tlp_ln}--></TD>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].lama_tinggal}--></TD>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].pekerjaan}--></TD>
							

													</TR>
															 
														
													<!--{/section}-->

										<TR><!--{section name=y loop=$DATA_TB4}-->
											<Td class="tdatahead" colspan="7" align="right" ><b>TOTAL TKI/WNI : </b></td>	
											<Td class="tdatahead"   align=" " > <!--{$DATA_TB4[y].total_orang}--> </td>	
<!--{/section}-->
										</TR>
									</tbody>
									</TABLE>

									
										
									 

										 
										</TD> 
										 
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