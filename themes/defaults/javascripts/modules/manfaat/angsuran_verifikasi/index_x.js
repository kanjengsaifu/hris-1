<SCRIPT LANGUAGE="JavaScript">
<!--

<?PHP if($_GET[opt]=="1") { ?> 
document.frmCreate.op.value = '1';
<?PHP } ?>

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


var err = 0;
var err_ = 0;

function checkFrm(frmList1){
with (theForm){
    
	 if (t_sp__no.value == "") 
		{ 
			alert ("Silahkan Isi No Surat Peringatan!"); 
			sp_no.focus();
			return false; 
		}
 else if (kode_cabang.value == "") 
		{ 
			alert ("Silahkan Pilih Sub Cabang !"); 
			kode_cabang.focus();
			return false; 
		}               
 else if (sp_nama.value == "") 
		{ 
			alert ("Silahkan Pilih Nama Karyawan !"); 
			sp_nama.focus();
			return false; 
		}
 else if (sp_nip.value == "") 
		{ 
			alert ("Silahkan isi NIP !"); 
			sp_nip.focus();
			return false; 
		}
                

else if (sp_tgl.value == "") 
       { 
               alert ("Silahkan Isi Tanggal Dikeluarkan SP!"); 
               sp_tgl.focus();
               return false; 
       }
   else if (sp_jenis.value == "") 
       { 
               alert ("Silahkan Pilih Jenis SP"); 
               sp_jenis.focus();
               return false; 
       }
       else if (sp_alasan.value == "") 
       { 
               alert ("Silahkan Isi Alasan Surat Perintah"); 
               sp_alasan.focus();
               return false; 
       }

 
		
	else
		{
			submit();
			return true;
		}
}
	
	
}
// --------------------


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







//------------------JS PILIH SUBCAB-----------//

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
//------------------CLOSE JS PILIH SUBCAB-----------//



//------------------JS AJAX SUBDEP-----------//subdep
function cari_subdep(subdep_id)
{
//alert (subdep_id)
if (subdep_id != '') {
	http.open('get','index.php?get_subdep=1&no_subdep='+subdep_id);
        //http.open('get','index.php?get_prop_ktp=1&no_prop_ktp='+prop_id_ktp);
	http.onreadystatechange = handlechoice_subdep; 
	http.send(null);
	} 
}

function handlechoice_subdep(){
if(http.readyState == 4)
	{ 
		var response = http.responseText;
		var a = response.split('^/&');
		document.getElementById('ajax_subdep').innerHTML = a[0];
		
    }
}
//------------------CLOSE AJAX SUBDEP-----------//


function goCarikaryawan() {
    
			kode_cabang= document.frmCreate.kode_cabang.value;
                       // window.open('../../../function/list_tki_penampungan.php?kode_cabang='+kode_cabang+'',null,'height=500,width=550,status=yes,toolbar=no,menubar=no,location=no,scrollbars=yes,left=0,top=0,screenX=0,screenY=0')
			//window.open('../../../function/list_penempatan.php',null,'height=500,width=550,status=yes,toolbar=no,menubar=no,location=no,scrollbars=yes,left=0,top=0,screenX=0,screenY=0')
 			window.open('../../../function/list_surat_peringatan.php?kode_cabang='+kode_cabang+'',null,'height=500,width=550,status=yes,toolbar=no,menubar=no,location=no,scrollbars=yes,left=0,top=0,screenX=0,screenY=0')
                        }
//function goCarikaryawan2() {
//    
//			kode_cabang= document.frmCreate.kode_cabang.value;
//                       // window.open('../../../function/list_tki_penampungan.php?kode_cabang='+kode_cabang+'',null,'height=500,width=550,status=yes,toolbar=no,menubar=no,location=no,scrollbars=yes,left=0,top=0,screenX=0,screenY=0')
//			//window.open('../../../function/list_penempatan.php',null,'height=500,width=550,status=yes,toolbar=no,menubar=no,location=no,scrollbars=yes,left=0,top=0,screenX=0,screenY=0')
// 			window.open('../../../function/list_surat_cuti2.php?kode_cabang='+kode_cabang+'',null,'height=500,width=550,status=yes,toolbar=no,menubar=no,location=no,scrollbars=yes,left=0,top=0,screenX=0,screenY=0')
//                        }


//------------------JS PILIH SUBCAB2-----------//

function cari_subcab2(subcab_id)
{
    
if (subcab_id != '') {
	http.open('get','index.php?get_subcab2=1&no_subcab='+subcab_id);
        //http.open('get','index.php?get_prop_ktp=1&no_prop_ktp='+prop_id_ktp);
	http.onreadystatechange = handlechoice_subcab2; 
	http.send(null);
	} 
}

function handlechoice_subcab2(){
if(http.readyState == 4)
	{ 
		var response = http.responseText;
		var a = response.split('^/&');
		document.getElementById('ajax_subcabang2').innerHTML = a[0];
		
    }
}
//------------------CLOSE JS PILIH SUBCAB2-----------//



function CheckAll(chk)
{
for (i = 0; i < chk.length; i++)
	chk[i].checked = true ;
}

function UnCheckAll(chk)
{
for (i = 0; i < chk.length; i++)
	chk[i].checked = false ;
}
//  End -->

</SCRIPT>