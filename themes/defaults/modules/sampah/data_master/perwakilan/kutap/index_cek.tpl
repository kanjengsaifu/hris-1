<HTML>
<HEAD>

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
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/tw-ajax.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/tw-sack.js"></SCRIPT>
<link rel="stylesheet" href="<!--{$HREF_CSS_PATH}-->/dhtmlgoodies_calendar.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="<!--{$HREF_JS_PATH}-->/calendar/dhtmlgoodies_calendar.js"></SCRIPT>
 


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</HEAD>


<body onLoad="hideIt(); <!--{if ($OPT==1)}--> showAll('_menuEntry1_',1);hideAll('_menuEntry2_',1);hideAll('_menuEntry3_',1);<!--{elseif ($OPT==5)}--> showAll('_menuEntry3_',1);hideAll('_menuEntry2_',1);hideAll('_menuEntry1_',1);<!--{else}-->hideAll('_menuEdit_',1);hideAll('_menuEntry1_',1);hideAll('_menuEntry3_',1);showAll('_menuEntry2_',1);<!--{/if}-->">

 
  
		 

 		
		<FORM METHOD=GET ACTION="" NAME="frmList">

		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center" style="border-bottom-width:0px">
		<tr><td class="tcat">Data Perwakilan</td></tr>
		</table>

		<table class="tborder" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
		<tr><td class="thead"><img src="<!--{$HREF_IMG_PATH}-->/layout/columns.gif" align="absmiddle" border="0"> Daftar Perwakilan</td></tr>
		<tr><td class="alt2" style="padding:0px;">
		<table width="100%">
		<tr>
		<th class="tdatahead" align="center"><font color="#ff0000">  <!--{$LABEL_ERROR}--> </font></th>
		 
 		</tr>
		
 		</table>
		
 		</td></tr>
		</table>
		
		</form>


			 
								
							</TABLE></TD>
						</TR>
						
 
</BODY>
</HTML>
