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
			<img src="<!--{$HREF_IMG_PATH}-->/ajax-lob.gif" align="absmiddle">Sedang Memuat....
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
<a class="button" href="#" onclick="this.blur();showLevel('_menuEdit_',1,1);"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/search.png" align="absmiddle"> Pencarian Data</span></a>
<!--{if $SEARCH_YEAR<>""}-->
<a class="button" href="#" onClick = "window.open('<!--{$FILES}-->');"><span><img src="<!--{$HREF_IMG_PATH}-->/icon/print.gif" align="absmiddle"> &nbsp;Cetak</span></a>
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
							<TD>Periode</TD>
							<TD>							
							<SELECT name="bulan"   > 
								<OPTION VALUE="" selected>[Pilih Bulan]</OPTION>
								<OPTION VALUE="1"  >Januari</OPTION>
								<OPTION VALUE="2"  >Februari</OPTION>
								<OPTION VALUE="3"  >Maret</OPTION>
								<OPTION VALUE="4"  >April</OPTION>
								<OPTION VALUE="5"  >Mei</OPTION>
								<OPTION VALUE="6"  >Juni</OPTION>
								<OPTION VALUE="7"  >Juli</OPTION>
								<OPTION VALUE="8"  >Agustus</OPTION>
								<OPTION VALUE="9"  >September</OPTION>
								<OPTION VALUE="10"  >Oktober</OPTION>
								<OPTION VALUE="11"  >November</OPTION>
								<OPTION VALUE="12"  >Desember</OPTION>				 
						</SELECT> 


							<SELECT name="tahun" > 
						<OPTION VALUE="" selected>[Pilih Tahun]</OPTION>
								<!--{section name=foo start=2010 loop=2021 step=1}-->
									  <!--{if ($smarty.section.foo.index) == $SES_TAHUN}-->
										 <option value="<!--{$smarty.section.foo.index}-->"  selected><!--{$smarty.section.foo.index}--></option>
									  <!--{else}-->
											 <option value="<!--{$smarty.section.foo.index}-->"   ><!--{$smarty.section.foo.index}--></option>
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
								<a class="button" href="#" onclick="this.blur();document.frmList1.submit(); document.frmList1.page.value='1';"  onSubmit="frmList1.page.value='1';"><span><img src="<!--{$HREF_IMG_PATH}-->/button/blank.gif" align="absmiddle"> Cari</span></a>
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
		<tr><td class="tcat">LAPORAN PERSIDANGAN TKI/WNI </td></tr>
		</table>
		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">		
		<tr><td class="alt2" style="padding:0px;">
		<table width="100%" >
 
									<TR>
									<TD COLSPAN="2">
											<table width="100%" class="tbheader" border=0>	
				<!--{if ($NM_PERWAKILAN !='') }-->
											<tr><td class="tdatacontent"  width="100" >PERWAKILAN</td><td width="5"> : </td><td colspan="2"><!--{$NM_PERWAKILAN}--> &nbsp;</td></tr>
				<!--{/if}-->

				<!--{if ($BULAN !='' or  $TAHUN !='' ) }-->


											<tr><td class="tdatacontent"  >PERIODE </td><td> : </td><td>
											<!--{if ($BULAN==1)}--> Januari <!--{/if}--> 
											<!--{if ($BULAN==2)}--> Februari <!--{/if}--> 
											<!--{if ($BULAN==3)}--> Maret <!--{/if}--> 
											<!--{if ($BULAN==4)}--> April <!--{/if}--> 
											<!--{if ($BULAN==5)}--> Mei <!--{/if}--> 
											<!--{if ($BULAN==6)}--> Juni <!--{/if}--> 
											<!--{if ($BULAN==7)}--> Juli <!--{/if}--> 
											<!--{if ($BULAN==8)}--> Agustus <!--{/if}--> 
											<!--{if ($BULAN==9)}--> September <!--{/if}--> 
											<!--{if ($BULAN==10)}--> Oktober <!--{/if}--> 
											<!--{if ($BULAN==11)}--> November <!--{/if}--> 
											<!--{if ($BULAN==12)}--> Desember <!--{/if}--> 									
											<!--{$TAHUN}--> &nbsp;</td></tr>
				<!--{/if}-->

				 
											</table>
										   </TD>
											</TR>
			


								<TR>
									<TD COLSPAN="2">
											
										<!--{section name=x loop=$DATA_TB}-->
										 <TABLE ALIGN="CENTER" WIDTH="100%"  cellspacing="1" cellpadding="2">
										 <TR>
											<Td class="tdatahead" ><b>BULAN 								
										 
										    <!--{if ($DATA_TB[x].bulan==1)}--> JANUARI <!--{/if}--> 
											<!--{if ($DATA_TB[x].bulan==2)}--> FEBRUARI <!--{/if}--> 
											<!--{if ($DATA_TB[x].bulan==3)}--> MARET <!--{/if}--> 
											<!--{if ($DATA_TB[x].bulan==4)}--> APRIL <!--{/if}--> 
											<!--{if ($DATA_TB[x].bulan==5)}--> MEI <!--{/if}--> 
											<!--{if ($DATA_TB[x].bulan==6)}--> JUNI <!--{/if}--> 
											<!--{if ($DATA_TB[x].bulan==7)}--> JULI <!--{/if}--> 
											<!--{if ($DATA_TB[x].bulan==8)}--> AGUSTUS <!--{/if}--> 
											<!--{if ($DATA_TB[x].bulan==9)}--> SEPTEMBER <!--{/if}--> 
											<!--{if ($DATA_TB[x].bulan==10)}--> OKTOBER <!--{/if}--> 
											<!--{if ($DATA_TB[x].bulan==11)}--> NOVEMBER <!--{/if}--> 
											<!--{if ($DATA_TB[x].bulan==12)}--> DESEMBER <!--{/if}--> 	
											
											</b> </Td>											 
										</TR>	
										 </TABLE>

										 <TABLE ALIGN="CENTER" WIDTH="100%"  cellspacing="1" cellpadding="2">						 
										 	
										<TR>
									 
											<TH class="tdatahead">NAMA</TH>
							 
											<TH class="tdatahead" >PERWAKILAN</TH>
											<TH class="tdatahead" >TANGGAL VONIS</TH>
											<TH class="tdatahead">PENGACARA PENDAMPING</TH>
											<TH class="tdatahead">VONIS SIDANG</TH>											 
											<TH class="tdatahead">JENIS KASUS</TH>
											<TH class="tdatahead">KETERANGAN</TH>											 
										</TR>			
 
										
												<!--{section name=y loop=$DATA_TB2}-->
														<!--{if ($DATA_TB2[y].bulan==$DATA_TB[x].bulan)}-->
													<TR>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].nama}--></TD>
														 
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].nm_perwakilan}--></TD>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].tgl_sidang}--></TD>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].pengacara_pendamping}--></TD>
														 
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].vonis}--></TD>
															<TD class="tdatacontent"   nowrap><!--{section name=i loop=$DATA_TB3}-->
																<!--{if ($DATA_TB3[i].kode_form_pengaduan==$DATA_TB2[y].kode_form_pengaduan)}-->
																	 - <!--{$DATA_TB3[i].nama_kasus}--> <BR>
																<!--{/if}-->
														<!--{/section}--></TD>
															<TD class="tdatacontent"   nowrap><!--{$DATA_TB2[y].keterangan}--></TD>

													</TR>
															 
														<!--{/if}-->
													<!--{/section}-->

										<TR>
											<Td class="tdatahead" colspan="5" align="right" ><b>JML TKI/WNI YANG MENJALANI SIDANG  : </b></td>	
											<Td class="tdatahead"   align=" " > <!--{$DATA_TB[x].jml_meninggal}--> </td>	

										</TR>
									</tbody>
									</TABLE>
										<!--{/section}-->

									
										
									 

										 
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