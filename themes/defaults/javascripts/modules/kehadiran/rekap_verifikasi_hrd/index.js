<SCRIPT LANGUAGE="JavaScript">
<!--

<?php if($_GET[opt]=="1") { ?> 
document.frmCreate.op.value = '1';
<?php } ?>

function checkPages(cond_1,cond_2){
if ((document.frmList.page.value > cond_1 )||(document.frmList.page.value <= '0' )) {
	document.frmList.page.value = cond_2;
	}
}

function check(str_msg, str_location){
	if(str_location == ''){
	if (confirm(str_msg)) return true; else return false;
	}else{
	if (confirm(str_msg)) return doNavigateContentOver(str_location,'mainFrame'); else return false;
	}
 }

function formatangka(objek) {
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length;
   j = 0;
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + "," + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   objek.value = c;
}


var err = 0;
var err_ = 0;

function checkFrm(theForm){
with (theForm){

			submit();
			return true;
	
}
	
	
}
// --------------------CLOSE VALIDASI----//

function checkSubmit(){

<?php
if (substr($result->fields[idmod], 2,1)!="1"){
?>
	alert("<?php echo _ERR_NOT_AUTH_ENTRY ; ?>");
	doNavigateContentOver('index.php?mod_id=<?=$_GET[mod_id];?>','mainFrame');
	err_ = 1;

<?php } else { ?>
	err_ = 0;
<?php } ?>
}

function checkEdit(str_location){

	doNavigateContentOver(str_location,'mainFrame');

}

function checkDelete(str_location){

	return check('<?php echo _CONF_DELETE; ?>', str_location);

}
// --------------------

function resetFrm(theForm){
with(theForm){

	op.value = "0";
	}
	doNavigateContentOver('index.php?mod_id=<?=$_GET[mod_id];?>','mainFrame');
}

//----------------------- AJAX KTP-----------------------------//
function cari_subcab(subcab_id)
{

if (subcab_id != '') {
	http.open('get','index.php?get_subcab=1&no_subcab='+subcab_id);
        //http.open('get','index.php?get_prop_ktp=1&no_prop_ktp='+prop_id_ktp);
	http.onreadystatechange = handlechoice_kab_ktp; 
	http.send(null);
	} 
}

function handlechoice_kab_ktp(){
if(http.readyState == 4)
	{ 
		var response = http.responseText;
		var a = response.split('^/&');
		document.getElementById('ajax_subcabang').innerHTML = a[0];
		
    }
}


</SCRIPT>