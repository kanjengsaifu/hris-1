/*
if (self.history.forward()==true){
	//alert('WARNING :\n Back Function Disabled!');
}else{
	//alert('WARNING :\n Back/Forward Function Disabled!');
}
*/
// Variables Declaration

var str_doc_title = "MWeb";

// Init.m
//document.title = "X-IT Human Resource Management System";

var DOCUMENT_TITLE_GL = "X-IT General Ledger System";

var cldHighlighted;
var cldHighlightedClass;

var MSG_SAVE_SUCCESS = "Data have been saved successfully!\n";
var MSG_DATA_NOT_FOUND = "Data not found!";

function docTitle(title) {
  document.title = title;
}

function doInit() {
}

function h_sub_menu(int_status) {
//	window.status = window.event.srcElement.className;
	if (int_status) {
		window.event.srcElement.className = "lineMenuUp";
	} else {
		window.event.srcElement.className = "lineMenu";
	}
}

function h_sub_line_menu(int_status) {
//	window.status = window.event.srcElement.className;
	if (int_status) {
		window.event.srcElement.className = "subLineMenuUp";
	} else {
		window.event.srcElement.className = "subLineMenu";
	}
}

function h_menu(int_status) {
//	window.status = window.event.srcElement.className;
	if (int_status) {
		window.event.srcElement.className = "mainMenuUp";
	} else {
		window.event.srcElement.className = "mainMenu";
	}
}

function h_menu_top(int_status) {
//	window.status = window.event.srcElement.className;
	if (int_status) {
		window.event.srcElement.className = "lineMenuTopUp";
	} else {
		window.event.srcElement.className = "lineMenuTop";
	}
}

function doNavigateContentOver(str_location,str_target) {
	parent.frames[str_target].location = str_location;
}

function doNavigateContent(str_location) {
	parent.location = str_location;
}

/*
function doNavigateContent(str_location, str_title, str_menu) {
	top.content.location = str_location;
	if (typeof(str_title) == "string") {
		top.head.titleModule.innerHTML = str_title;
		top.frames.subSubMenu.location = str_menu;
	}
}

function doNavigateContent(str_location, str_title, str_menu) {
	top.content.location = str_location;
	if (typeof(str_title) == "string") {
		top.frames.subSubMenu.location = str_menu;
		if (str_title == "Transaction") {
			top.head.headimages.src = "../images/head_transaction.gif";
		} else if (str_title == "Process") {
			top.head.headimages.src = "../images/head_process.gif";
		} else if (str_title == "Report") {
			top.head.headimages.src = "../images/head_report.gif";
		} else if (str_title == "System Maintenance") {
			top.head.headimages.src = "../images/head_maintenance.gif";
		} else if (str_title == "Home") {
			top.head.headimages.src = "../images/head_home.gif";
		} else if (str_title == "Recruitment") {
			top.head.headimages.src = "../images/head_recruitment.gif";
		} else if (str_title == "Employee") {
			top.head.headimages.src = "../images/head_employee.gif";
		} else if (str_title == "Training") {
			top.head.headimages.src = "../images/head_training.gif";
		} else if (str_title == "Personnel") {
			top.head.headimages.src = "../images/head_personnel.gif";
		} else if (str_title == "Master") {
			top.head.headimages.src = "../images/head_master.gif";
		} else if (str_title == "Home") {
			top.head.headimages.src = "../images/head_home.gif";
		} else {
			top.head.headimages.src = "../images/spacer.gif";
		}
  }
}
*/
function doNavigateContentInv(str_location, str_title, str_menu) {
	top.content.location = str_location;
	if (typeof(str_title) == "string") {
		top.frames.subSubMenu.location = str_menu;
		if (str_title == "Transaction") {
			top.head.headimages.src = "../images/head_transaction.gif";
		} else if (str_title == "Process") {
			top.head.headimages.src = "../images/head_process.gif";
		} else if (str_title == "Report") {
			top.head.headimages.src = "../images/head_report.gif";
		} else if (str_title == "System Maintenance") {
			top.head.headimages.src = "../images/head_maintenance.gif";
		} else if (str_title == "Home") {
			top.head.headimages.src = "../images/head_home.gif";
		} else if (str_title == "Recruitment") {
			top.head.headimages.src = "../images/head_recruitment.gif";
		} else if (str_title == "Employee") {
			top.head.headimages.src = "../images/head_employee.gif";
		} else if (str_title == "Training") {
			top.head.headimages.src = "../images/head_training.gif";
		} else if (str_title == "Personnel") {
			top.head.headimages.src = "../images/head_personnel.gif";
		} else if (str_title == "Master") {
			top.head.headimages.src = "../images/head_master.gif";
		} else if (str_title == "Home") {
			top.head.headimages.src = "../images/head_home.gif";
		} else {
			top.head.headimages.src = "../images/spacer.gif";
		}
  }
}

function doNavigate(str_location, str_frame) {
	str_frame.location = str_location;
}

function showServicesDetail(int_sub_services) {
	var int_value = event.srcElement.value;
	int_value *= 1;

	// Personal radio button response
	if (int_sub_services == 1) {
		switch (int_value) {
			case 1:
				services_detail.location = "services_detail.html";
				break;
			case 2:
				services_detail.location = "services_detail_blank.html";
				break;
			case 3:
				showError(2);
				break;
			default:
				showError();
				break;
		}
	}

	// Corporate radio button response
	if (int_sub_services == 2) {
		switch (int_value) {
			case 1:
				showError(2);
				break;
			case 2:
				showError(2);
				break;
			case 3:
				showError(2);
				break;
			default:
				showError();
				break;
		}
	}

}

var str_old_sub;

function showSub(str_sub) {
	var str_text = event.srcElement.innerText;
	var int_obj_left = event.srcElement.offsetLeft + event.srcElement.offsetWidth;
	var int_obj_top = event.srcElement.offsetTop + 25;
	var str_cmd;

/*	if (str_old_sub == str_sub) {
		str_text = str_text.replace("-", "+");
		str_cmd	 = str_sub + ".style.display = 'none'; ";
	} else {
		str_text = str_text.replace("+", "-");
		str_cmd	 = str_sub + ".style.display = 'block';"
	}

	eval(str_cmd);
	event.srcElement.innerText = str_text;

	if (str_old_sub == str_sub) {
		str_old_sub = "";
	} else {
		str_old_sub = str_sub;
	}*/

	var str_sub_status;
	str_sub_status = eval(str_sub + ".style.display");
	if (str_sub_status == "" || str_sub_status == 'none') {
		str_text = str_text.replace("+", "-");
		str_cmd	 = str_sub + ".style.display = 'block';"
	} else {
		str_text = str_text.replace("-", "+");
		str_cmd	 = str_sub + ".style.display = 'none'; ";
	}

	eval(str_cmd);
	event.srcElement.innerText = str_text;
}

function getMonthName(int_month) {
	var str_month;

	switch (int_month) {
		case 0:
			str_month = "January";
			break;
		case 1:
			str_month = "February";
			break;
		case 2:
			str_month = "March";
			break;
		case 3:
			str_month = "April";
			break;
		case 4:
			str_month = "May";
			break;
		case 5:
			str_month = "June";
			break;
		case 6:
			str_month = "July";
			break;
		case 7:
			str_month = "August";
			break;
		case 8:
			str_month = "September";
			break;
		case 9:
			str_month = "October";
			break;
		case 10:
			str_month = "November";
			break;
		case 11:
			str_month = "December";
			break;
	}
	return str_month;
}

function getDayName(int_day) {
	var str_day;

	switch (int_day) {
		case 0:
			str_day = "Sunday";
			break;
		case 1:
			str_day = "Monday";
			break;
		case 2:
			str_day = "Tuesday";
			break;
		case 3:
			str_day = "Wednesday";
			break;
		case 4:
			str_day = "Friday";
			break;
		case 5:
			str_day = "Thursday";
			break;
		case 6:
			str_day = "Saturday";
			break;
	}
	return str_day;
}

function printDate(str_format, int_ret) {

	var str_date, str_month, str_day, str_sec, str_min, str_hour;
	var int_day, int_date, int_month, int_year, int_sec, int_min, int_hour;
	var d = new Date();

	// Get date of month
	int_date = d.getDate();
	str_date = int_date.toString();
	if (str_date.length == 1) {str_date = "0" + str_date;}
	str_date = str_format.replace("dd", str_date);

	// Get year
	int_year = d.getFullYear();
	str_date = str_date.replace("yy", int_year);

	// Get second
	int_sec = d.getSeconds();
	str_sec = int_sec.toString();
	if (str_sec.length == 1) {str_sec = "0" + str_sec;}
	str_date = str_date.replace("ss", str_sec);

	// Get minute
	int_min = d.getMinutes();
	str_min = int_min.toString();
	if (str_min.length == 1) {str_min = "0" + str_min;}
	str_date = str_date.replace("mm", str_min);

	// Get hours
	int_hour = d.getHours();
	str_hour = int_hour.toString();
	if (str_hour.length == 1) {str_hour = "0" + str_hour;}
	str_date = str_date.replace("hh", str_hour);

	// Get month of year
	int_month = d.getMonth() + 1;
	str_month = int_month.toString();
	if (str_month.length == 1) {str_month = "0" + str_month;}
	str_date = str_date.replace("Mm", str_month);
	str_date = str_date.replace("MM", getMonthName(int_month));

	// Get day
	int_day = d.getDay();
	str_date = str_date.replace("DD", getDayName(int_day));

	if (int_ret) {
		return str_date;
	} else {
		document.write(str_date);
	}
}

function showError(int_error) {
	var str_message = "";
	switch (int_error) {
		case 1:
			str_message = 'Module not installed !!!';
			break;
		case 2:
			str_message = 'Database Not Found !!!';
			break;
		default:
			str_message = 'Error found !!!';
	}
	alert(str_message);
}

function check(form_name) {
	var ret_value = false;
	for (i = 0; i < form_name.elements.length; i++) {
		if (form_name.elements(i).attributes(81).value == "text" && form_name.elements(i).value == "") {
			alert("Missing Value");
			ret_value = false;
			form_name.elements[i].focus();
			break;
		} else {
			ret_value = true;
		}
	}
	return ret_value;
}

function cancelEvent() {
	cancelEvent = true;
}

function cldChangeColor(id) {
	if(id==0) {
		switch(window.event.srcElement.className) {
			case "listCldRed":
				window.event.srcElement.className="listCldRedLight";
				break;
			case "listCldBlue":
				window.event.srcElement.className="listCldBlueLight";
				break;
			case "listCldSilver":
				window.event.srcElement.className="listCldSilverLight";
				break;
		}
	}
	else {
		switch(window.event.srcElement.className) {
			case "listCldRedLight":
				window.event.srcElement.className="listCldRed";
				break;
			case "listCldBlueLight":
				window.event.srcElement.className="listCldBlue";
				break;
			case "listCldSilverLight":
				window.event.srcElement.className="listCldSilver";
				break;
		}
	}
}

function confirm_delete() {
	if(confirm("Are you sure want to delete this record?")) return(true); else return(false);
}

function alertDelete() {
  if (document.forms[0].candelete.value == 1) {
    alert("Can't be deleted, Already use by other transaction!");
    return(false);
  } else {
    if(confirm("Are you sure want to delete this record?")) return(true); else return(false);
  }
}

function confirm_cancel() {
	if(confirm("Are you sure want to Cancel and back to previous screen?")) return(true); else return(false);
}

function confirm_after_save_2(nm,msg_id) {
	var disp_msg="Data have been saved successfully, Back to Previous Screen!";
	if(msg_id!="") disp_msg +="\n"+nm+" = "+msg_id;
	alert(disp_msg);
	return(true);
}

function confirm_after_save() {
	alert("Data have been saved successfully, Back to Previous Screen!");
	return(true);
}

function cldHighlightMe() {

	var cldHighlight=window.event.srcElement;

	if(cldHighlight.className!="listCldHighLighted") {
		if(cldHighlighted=="[object]")
		{
			switch(cldHighLightedClass) {
				case "listCldRedLight":
					cldHighlighted.className="listCldRed";
					break;
				case "listCldBlueLight":
					cldHighlighted.className="listCldBlue";
					break;
				case "listCldSilverLight":
					cldHighlighted.className="listCldSilver";
					break;
			}
		}

		cldHighlighted=cldHighlight;
		cldHighLightedClass=cldHighlighted.className;

		cldHighlight.className="listCldHighLighted";
		return(true);
	} else {
		return(false);
	}

}

function printReport() {
    	window.print();
}

function printReportPDF(target) {
  window.open(target, "my_window", "width=600,height=400,resizable=1,scrollbars=1");
}

function enableHeader(ini) {
	if (ini.btnHeader.value == "Exclude Header") {
		tblHeader.style.display = 'none';
		tblBlank.style.display = 'block';
		ini.btnHeader.value = "Include Header";
	} else {
		tblHeader.style.display = 'block';
		tblBlank.style.display = 'none';
		ini.btnHeader.value = "Exclude Header";
	}
}


// Begin Function Block of Mulky's Cross-Browser Hierarchical Auto Expandable Menu

var isNav4, isIE4, isNav6;

if (parseInt(navigator.appVersion.charAt(0)) >= 4) {
  isNav6 = navigator.userAgent.indexOf("Gecko")!=-1?true:false;
  isNav4 = (navigator.appName == "Netscape") ? true && !isNav6: false;
  isIE4 = (navigator.appName.indexOf("Microsoft") != -1) ? true : false;
}

if(isNav4) alert("Your Browser Doesn't Support This Application, Please Upgrade Your Browser First !\nMinimum Browser Requirement : Netscape Navigator or it's variant > 4.0, Internet Explorer > 5.0");

var host_ = window.location.hostname;
var plusImg = new Image();
        plusImg.src = "http://"+host_+"/images/menu/test_false.gif"
var minusImg = new Image();
        minusImg.src = "http://"+host_+"/images/menu/test_true.gif"

// Version 1 : Original
function hideLevel(_levelId,_imgId) {
        if(isNav6){
		var thisLevel = document.getElementById(_levelId);
        var thisImg = document.getElementById(_imgId);
		}else if(isNav4){
		var thisLevel = document.layers(_levelId);
        var thisImg = document.layers(_imgId);
		}else if(isIE4){
		var thisLevel = document.all(_levelId);
        var thisImg = document.all(_imgId);
		}else{
		var thisLevel = document.getElementById(_levelId);
        var thisImg = document.getElementById(_imgId);
		}
			if(thisLevel){
				//thisLevel.filter.alpha.opacity = "0";
				thisLevel.style.display = "none";
			}
			if(thisImg){
				thisImg.src = plusImg.src;
			}
}

function showLevel_(_levelId,_imgId) {
        if(isNav6){
		var thisLevel = document.getElementById(_levelId);
        var thisImg = document.getElementById(_imgId);
		}else if(isNav4){
		var thisLevel = document.layers(_levelId);
        var thisImg = document.layers(_imgId);
		}else if(isIE4){
		var thisLevel = document.all(_levelId);
        var thisImg = document.all(_imgId);
		}else{
		var thisLevel = document.getElementById(_levelId);
        var thisImg = document.getElementById(_imgId);
		}
		if(thisLevel){
				//thisLevel.filter.alpha.opacity = "0";
				thisLevel.style.display = "block";
			}
			if(thisImg){
				thisImg.src = minusImg.src;
			}
}

function hideAll(_menu_Id,_menu_Num) {
		for(var i = 1; i <= _menu_Num; i++){
				hideLevel(_menu_Id+i,_menu_Id+i+'Img');
			}
        }

function showAll(_menu_Id,_menu_Num) {
		/** _menu_Id = _menuEntry1_ 
			_menu_Num= 1
			
		**/
		for(var i = 1; i <= _menu_Num; i++){
				/*** 
				showLevel(_menuEntry1_1,_menuEntry1_1Img);
				***/
				showLevel_(_menu_Id+i,_menu_Id+i+'Img');
			}
        }

function showLevel(_menu_Id,_sub_menu_Id,_menu_Num) {
        if(isNav6){
		var thisLevel = document.getElementById(_menu_Id+_sub_menu_Id);
		/*** thisLevel = _menuEntry1_1_menuEntry1_1Img;
		***/
		
        var thisImg = document.getElementById(_menu_Id+_sub_menu_Id+'Img');
		/*** thisLevel = _menuEntry1_1_menuEntry1_1ImgImg;
		***/
		
		}else if(isNav4){
		var thisLevel = document.layers(_menu_Id+_sub_menu_Id);
        var thisImg = document.layers(_menu_Id+_sub_menu_Id+'Img');
		}else if(isIE4){
		var thisLevel = document.all(_menu_Id+_sub_menu_Id);
        var thisImg = document.all(_menu_Id+_sub_menu_Id+'Img');
		}else{
		var thisLevel = document.getElementById(_menu_Id+_sub_menu_Id);
        var thisImg = document.getElementById(_menu_Id+_sub_menu_Id+'Img');
		}
        if (thisLevel){
		if (thisLevel.style.display == "none") {
                //thisLevel.filter.alpha.opacity="100";
				thisLevel.style.display = "block";
				if(thisImg){
				thisImg.src = minusImg.src;
				}
					for(var i = 1; i <= _menu_Num; i++){
						if(i != _sub_menu_Id) hideLevel(_menu_Id+i,_menu_Id+i+'Img');
					}
        } else hideLevel(_menu_Id+_sub_menu_Id,_menu_Id+_sub_menu_Id+'Img');
	}
}
// End Version 1

// Version 2 : Enhanced DIV
function newHideLevel(_levelId,_imgId) {
        var thisLevel = document.getElementById(_levelId);
        var thisSrc = document.getElementById(_imgId);
			if(thisLevel){
				//thisLevel.filter.alpha.opacity = "0";
				thisLevel.style.display = "none";
			}
			if(thisSrc){
				thisSrc.innerHTML = plusSrc;
			}
}

function newShowLevel_(_levelId,_imgId) {
        var thisLevel = document.getElementById(_levelId);
        var thisSrc = document.getElementById(_imgId);
		
		if(thisLevel){
				//thisLevel.filter.alpha.opacity = "0";
				thisLevel.style.display = "block";
			}
			if(thisSrc){
				thisSrc.innerHTML = minusSrc;
			}
}

function newHideAll(_menu_Id,_menu_Num) {

		for(var i = 1; i <= _menu_Num; i++){
				newHideLevel(_menu_Id+i,_menu_Id+i+'Img');
			}
        }

function newShowAll(_menu_Id,_menu_Num) {

		for(var i = 1; i <= _menu_Num; i++){
				newShowLevel_(_menu_Id+i,_menu_Id+i+'Img');
			}
        }

function newShowLevel(_menu_Id,_sub_menu_Id,_menu_Num) {
        
		var thisLevel = document.getElementById(_menu_Id+_sub_menu_Id);
        var thisSrc = document.getElementById(_menu_Id+_sub_menu_Id+'Img');
		
        if (thisLevel){
		if (thisLevel.style.display == "none") {
                //thisLevel.filter.alpha.opacity="100";
				thisLevel.style.display = "block";
				if(thisSrc){
				thisSrc.innerHTML = minusSrc;
				}
					for(var i = 1; i <= _menu_Num; i++){
						if(i != _sub_menu_Id) newHideLevel(_menu_Id+i,_menu_Id+i+'Img');
					}
        } else newHideLevel(_menu_Id+_sub_menu_Id,_menu_Id+_sub_menu_Id+'Img');
	}
}

// End Version 2

// End Function Block of Mulky's Cross-Browser Hierarchical Auto Expandable Menu

/*

//Deprecated, not used, i don't even know how to use it ?

function setMode(ini) {

}

function doNavigateBack(str_location) {
	window.location = str_location;
}

function PrintReport() {
    	window.print();
}

function Test() {

}

function EnableHeader(ini) {
	if (ini.btnHeader.value == "Exclude Header") {
		tblHeader.style.display = 'none';
		tblBlank.style.display = 'block';
		ini.btnHeader.value = "Include Header";
	} else {
		tblHeader.style.display = 'block';
		tblBlank.style.display = 'none';
		ini.btnHeader.value = "Exclude Header";
	}
}
*/
function openPopUp(str_location, str_title) {
	var win_width = 400;
	var win_height = 450;
	w_left = ( screen.width / 2 ) - ( win_width / 2 );
	w_top = ( screen.height / 2 ) - ( win_height / 2 );
	window.open(str_location,str_title,"toolbar=no, location=0,directories=no,status=no,menubar=0, scrollbars=no,resizable=0,copyhistory=0,width=400,height=450,top="+w_top+",left="+w_left);
}

function openInvisiblePopUp(str_location, str_title) {
	var win_width = 0;
	var win_height = 0;
	w_left = 0;
	w_top = 0;
	window.open(str_location,str_title,"toolbar=no, location=0,directories=no,status=no,menubar=0, scrollbars=no,resizable=0,copyhistory=0,width=0,height=0,top="+w_top+",left="+w_left);
}

function openPopUpHistory(str_location, str_title) {
	var win_width = 600;
	var win_height = 450;
	w_left = ( screen.width / 2 ) - ( win_width / 2 );
	w_top = ( screen.height / 2 ) - ( win_height / 2 );
	window.open(str_location,str_title,"toolbar=no, location=0,directories=no,status=no,menubar=0, scrollbars=no,resizable=0,copyhistory=0,width=600,height=450,top="+w_top+",left="+w_left);
}

function openPopUp_Attachment(str_location, str_title) {
	var win_width = 1024;
	var win_height = 480;
	w_left = ( screen.width / 2 ) - ( win_width / 2 );
	w_top = ( screen.height / 2 ) - ( win_height / 2 );
	window.open(str_location,str_title,"toolbar=no, location=0,directories=no,status=no,menubar=0, scrollbars=yes,resizable=0,copyhistory=0,width="+win_width+",height="+win_height+",top="+w_top+",left="+w_left);
}

function openPopUp_(str_location, str_title) {
	var win_width = 400;
	var win_height = 580;
	w_left = ( screen.width / 2 ) - ( win_width / 2 );
	w_top = ( screen.height / 2 ) - ( win_height / 2 );
	window.open(str_location,str_title,"toolbar=no, location=0,directories=no,status=no,menubar=0, scrollbars=no,resizable=0,copyhistory=0,width=400,height=580,top="+w_top+",left="+w_left);
}

function openPopUpFull(str_location, str_title) {
	winopen = window.open(str_location,str_title,"toolbar=no, location=0,directories=no,status=yes,statusbar=yes,personalbar=no,menubar=0, scrollbars=yes,resizable=1,copyhistory=0,width="+window.screen.width+",height="+window.screen.height+",top=0,left=0");
	winopen.moveTo(0,0);
	if (document.all) {
	winopen.resizeTo(screen.availWidth,screen.availHeight);
	}
	else if (document.layers||document.getElementById) {
	if (winopen.outerHeight<screen.availHeight||winopen.outerWidth<screen.availWidth){
	winopen.outerHeight = screen.availHeight;
	winopen.outerWidth = screen.availWidth;
	}
	}
}
function openPopUpFullScreen(str_location, str_title) {
	window.open(str_location,str_title,"fullscreen=yes, scrollbars=auto,resizable=1,copyhistory=0");
}

/*
function isNumberInt(inputString) { 
	if (!isNaN(parseInt(inputString))) { 
		alert('true'); 
		} else { 
		alert('false'); 
		}
}
*/

function validateNum(field) {
var valid = ".,0123456789"
var ok = "yes";
var temp;
for (var i=0; i<field.value.length; i++) {
temp = "" + field.value.substring(i, i+1);
if (valid.indexOf(temp) == "-1") ok = "no";
}
if (ok == "no") {
alert("Invalid entry!  Only characters and numbers are accepted!");
field.focus();
field.select();
   }
}

function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+','+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') +  num + '.' + cents);
}

/*
var message="Function Disabled!";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false")
*/

//---------------------------------------------------

var weekend = [0,6];
var weekendColor = "#e0e0e0";
var fontface = "Verdana";
var fontsize = 2;

var gNow = new Date();
var ggWinCal;
isNav = (navigator.appName.indexOf("Netscape") != -1) ? true : false;
isIE = (navigator.appName.indexOf("Microsoft") != -1) ? true : false;

Calendar.Months = ["January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December"];

// Non-Leap year Month days..
Calendar.DOMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
// Leap year Month days..
Calendar.lDOMonth = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

function Calendar(p_item, p_WinCal, p_month, p_year, p_format) {
	if ((p_month == null) && (p_year == null))	return;

	if (p_WinCal == null)
		this.gWinCal = ggWinCal;
	else
		this.gWinCal = p_WinCal;
	
	if (p_month == null) {
		this.gMonthName = null;
		this.gMonth = null;
		this.gYearly = true;
	} else {
		this.gMonthName = Calendar.get_month(p_month);
		this.gMonth = new Number(p_month);
		this.gYearly = false;
	}

	this.gYear = p_year;
	this.gFormat = p_format;
	this.gBGColor = "white";
	this.gFGColor = "black";
	this.gTextColor = "black";
	this.gHeaderColor = "black";
	this.gReturnItem = p_item;
}

Calendar.get_month = Calendar_get_month;
Calendar.get_daysofmonth = Calendar_get_daysofmonth;
Calendar.calc_month_year = Calendar_calc_month_year;
Calendar.print = Calendar_print;

function Calendar_get_month(monthNo) {
	return Calendar.Months[monthNo];
}

function Calendar_get_daysofmonth(monthNo, p_year) {
	/* 
	Check for leap year ..
	1.Years evenly divisible by four are normally leap years, except for... 
	2.Years also evenly divisible by 100 are not leap years, except for... 
	3.Years also evenly divisible by 400 are leap years. 
	*/
	if ((p_year % 4) == 0) {
		if ((p_year % 100) == 0 && (p_year % 400) != 0)
			return Calendar.DOMonth[monthNo];
	
		return Calendar.lDOMonth[monthNo];
	} else
		return Calendar.DOMonth[monthNo];
}

function Calendar_calc_month_year(p_Month, p_Year, incr) {
	/* 
	Will return an 1-D array with 1st element being the calculated month 
	and second being the calculated year 
	after applying the month increment/decrement as specified by 'incr' parameter.
	'incr' will normally have 1/-1 to navigate thru the months.
	*/
	var ret_arr = new Array();
	
	if (incr == -1) {
		// B A C K W A R D
		if (p_Month == 0) {
			ret_arr[0] = 11;
			ret_arr[1] = parseInt(p_Year) - 1;
		}
		else {
			ret_arr[0] = parseInt(p_Month) - 1;
			ret_arr[1] = parseInt(p_Year);
		}
	} else if (incr == 1) {
		// F O R W A R D
		if (p_Month == 11) {
			ret_arr[0] = 0;
			ret_arr[1] = parseInt(p_Year) + 1;
		}
		else {
			ret_arr[0] = parseInt(p_Month) + 1;
			ret_arr[1] = parseInt(p_Year);
		}
	}
	
	return ret_arr;
}

function Calendar_print() {
	ggWinCal.print();
}

function Calendar_calc_month_year(p_Month, p_Year, incr) {
	/* 
	Will return an 1-D array with 1st element being the calculated month 
	and second being the calculated year 
	after applying the month increment/decrement as specified by 'incr' parameter.
	'incr' will normally have 1/-1 to navigate thru the months.
	*/
	var ret_arr = new Array();
	
	if (incr == -1) {
		// B A C K W A R D
		if (p_Month == 0) {
			ret_arr[0] = 11;
			ret_arr[1] = parseInt(p_Year) - 1;
		}
		else {
			ret_arr[0] = parseInt(p_Month) - 1;
			ret_arr[1] = parseInt(p_Year);
		}
	} else if (incr == 1) {
		// F O R W A R D
		if (p_Month == 11) {
			ret_arr[0] = 0;
			ret_arr[1] = parseInt(p_Year) + 1;
		}
		else {
			ret_arr[0] = parseInt(p_Month) + 1;
			ret_arr[1] = parseInt(p_Year);
		}
	}
	
	return ret_arr;
}

// This is for compatibility with Navigator 3, we have to create and discard one object before the prototype object exists.
new Calendar();

Calendar.prototype.getMonthlyCalendarCode = function() {
	var vCode = "";
	var vHeader_Code = "";
	var vData_Code = "";
	
	// Begin Table Drawing code here..
	vCode = vCode + "<TABLE BORDER=1 BGCOLOR=\"" + this.gBGColor + "\">";
	
	vHeader_Code = this.cal_header();
	vData_Code = this.cal_data();
	vCode = vCode + vHeader_Code + vData_Code;
	
	vCode = vCode + "</TABLE>";
	
	return vCode;
}

Calendar.prototype.show = function() {
	var vCode = "";
	
	this.gWinCal.document.open();

	// Setup the page...
	this.wwrite("<html>");
	this.wwrite("<head><title>Calendar</title>");
	this.wwrite("</head>");

	this.wwrite("<body " + 
		"link=\"" + this.gLinkColor + "\" " + 
		"vlink=\"" + this.gLinkColor + "\" " +
		"alink=\"" + this.gLinkColor + "\" " +
		"text=\"" + this.gTextColor + "\">");
	this.wwriteA("<FONT FACE='" + fontface + "' SIZE=2><B>");
	this.wwriteA(this.gMonthName + " " + this.gYear);
	this.wwriteA("</B><BR>");

	// Show navigation buttons
	var prevMMYYYY = Calendar.calc_month_year(this.gMonth, this.gYear, -1);
	var prevMM = prevMMYYYY[0];
	var prevYYYY = prevMMYYYY[1];

	var nextMMYYYY = Calendar.calc_month_year(this.gMonth, this.gYear, 1);
	var nextMM = nextMMYYYY[0];
	var nextYYYY = nextMMYYYY[1];
	
	this.wwrite("<TABLE WIDTH='100%' BORDER=1 CELLSPACING=0 CELLPADDING=0 BGCOLOR='#e0e0e0'><TR><TD ALIGN=center>");
	this.wwrite("[<A HREF=\"" +
		"javascript:window.opener.Build(" + 
		"'" + this.gReturnItem + "', '" + this.gMonth + "', '" + (parseInt(this.gYear)-1) + "', '" + this.gFormat + "'" +
		");" +
		"\"><<<\/A>]</TD><TD ALIGN=center>");
	this.wwrite("[<A HREF=\"" +
		"javascript:window.opener.Build(" + 
		"'" + this.gReturnItem + "', '" + prevMM + "', '" + prevYYYY + "', '" + this.gFormat + "'" +
		");" +
		"\"><<\/A>]</TD><TD ALIGN=center>");
	this.wwrite("[<A HREF=\"javascript:window.print();\">Print</A>]</TD><TD ALIGN=center>");
	this.wwrite("[<A HREF=\"" +
		"javascript:window.opener.Build(" + 
		"'" + this.gReturnItem + "', '" + nextMM + "', '" + nextYYYY + "', '" + this.gFormat + "'" +
		");" +
		"\">><\/A>]</TD><TD ALIGN=center>");
	this.wwrite("[<A HREF=\"" +
		"javascript:window.opener.Build(" + 
		"'" + this.gReturnItem + "', '" + this.gMonth + "', '" + (parseInt(this.gYear)+1) + "', '" + this.gFormat + "'" +
		");" +
		"\">>><\/A>]</TD></TR></TABLE><BR>");

	// Get the complete calendar code for the month..
	vCode = this.getMonthlyCalendarCode();
	this.wwrite(vCode);

	this.wwrite("</font></body></html>");
	this.gWinCal.document.close();
}

Calendar.prototype.showY = function() {
	var vCode = "";
	var i;
	var vr, vc, vx, vy;		// Row, Column, X-coord, Y-coord
	var vxf = 285;			// X-Factor
	var vyf = 200;			// Y-Factor
	var vxm = 10;			// X-margin
	var vym;				// Y-margin
	if (isIE)	vym = 75;
	else if (isNav)	vym = 25;
	
	this.gWinCal.document.open();

	this.wwrite("<html>");
	this.wwrite("<head><title>Calendar</title>");
	this.wwrite("<style type='text/css'>\n<!--");
	for (i=0; i<12; i++) {
		vc = i % 3;
		if (i>=0 && i<= 2)	vr = 0;
		if (i>=3 && i<= 5)	vr = 1;
		if (i>=6 && i<= 8)	vr = 2;
		if (i>=9 && i<= 11)	vr = 3;
		
		vx = parseInt(vxf * vc) + vxm;
		vy = parseInt(vyf * vr) + vym;

		this.wwrite(".lclass" + i + " {position:absolute;top:" + vy + ";left:" + vx + ";}");
	}
	this.wwrite("-->\n</style>");
	this.wwrite("<link rel='stylesheet' href='http://"+host_+"/themes/1_Natural/css/global.css' type='text/css'>")
	this.wwrite("</head>");

	this.wwrite("<body " + 
		"link=\"" + this.gLinkColor + "\" " + 
		"vlink=\"" + this.gLinkColor + "\" " +
		"alink=\"" + this.gLinkColor + "\" " +
		"text=\"" + this.gTextColor + "\">");
	this.wwrite("<FONT FACE='" + fontface + "' SIZE=2><B>");
	this.wwrite("Year : " + this.gYear);
	this.wwrite("</B><BR>");

	// Show navigation buttons
	var prevYYYY = parseInt(this.gYear) - 1;
	var nextYYYY = parseInt(this.gYear) + 1;
	
	this.wwrite("<TABLE CLASS='boxOutset' WIDTH='100%' BORDER=1 CELLSPACING=0 CELLPADDING=0 BGCOLOR='#e0e0e0'><TR><TD ALIGN=center>");
	this.wwrite("[<A HREF=\"" +
		"javascript:window.opener.Build(" + 
		"'" + this.gReturnItem + "', null, '" + prevYYYY + "', '" + this.gFormat + "'" +
		");" +
		"\" alt='Prev Year'><<<\/A>]</TD><TD ALIGN=center>");
	this.wwrite("[<A HREF=\"javascript:window.print();\">Print</A>]</TD><TD ALIGN=center>");
	this.wwrite("[<A HREF=\"" +
		"javascript:window.opener.Build(" + 
		"'" + this.gReturnItem + "', null, '" + nextYYYY + "', '" + this.gFormat + "'" +
		");" +
		"\">>><\/A>]</TD></TR></TABLE><BR>");

	// Get the complete calendar code for each month..
	var j;
	for (i=11; i>=0; i--) {
		if (isIE)
			this.wwrite("<DIV ID=\"layer" + i + "\" CLASS=\"lclass" + i + "\">");
		else if (isNav)
			this.wwrite("<LAYER ID=\"layer" + i + "\" CLASS=\"lclass" + i + "\">");

		this.gMonth = i;
		this.gMonthName = Calendar.get_month(this.gMonth);
		vCode = this.getMonthlyCalendarCode();
		this.wwrite(this.gMonthName + "/" + this.gYear + "<BR>");
		this.wwrite(vCode);

		if (isIE)
			this.wwrite("</DIV>");
		else if (isNav)
			this.wwrite("</LAYER>");
	}

	this.wwrite("</font><BR></body></html>");
	this.gWinCal.document.close();
}

Calendar.prototype.wwrite = function(wtext) {
	this.gWinCal.document.writeln(wtext);
}

Calendar.prototype.wwriteA = function(wtext) {
	this.gWinCal.document.write(wtext);
}

Calendar.prototype.cal_header = function() {
	var vCode = "";
	
	vCode = vCode + "<TR>";
	vCode = vCode + "<TD WIDTH='14%'><FONT SIZE='2' FACE='" + fontface + "' COLOR='" + this.gHeaderColor + "'><B>Sun</B></FONT></TD>";
	vCode = vCode + "<TD WIDTH='14%'><FONT SIZE='2' FACE='" + fontface + "' COLOR='" + this.gHeaderColor + "'><B>Mon</B></FONT></TD>";
	vCode = vCode + "<TD WIDTH='14%'><FONT SIZE='2' FACE='" + fontface + "' COLOR='" + this.gHeaderColor + "'><B>Tue</B></FONT></TD>";
	vCode = vCode + "<TD WIDTH='14%'><FONT SIZE='2' FACE='" + fontface + "' COLOR='" + this.gHeaderColor + "'><B>Wed</B></FONT></TD>";
	vCode = vCode + "<TD WIDTH='14%'><FONT SIZE='2' FACE='" + fontface + "' COLOR='" + this.gHeaderColor + "'><B>Thu</B></FONT></TD>";
	vCode = vCode + "<TD WIDTH='14%'><FONT SIZE='2' FACE='" + fontface + "' COLOR='" + this.gHeaderColor + "'><B>Fri</B></FONT></TD>";
	vCode = vCode + "<TD WIDTH='16%'><FONT SIZE='2' FACE='" + fontface + "' COLOR='" + this.gHeaderColor + "'><B>Sat</B></FONT></TD>";
	vCode = vCode + "</TR>";
	
	return vCode;
}

Calendar.prototype.cal_data = function() {
	var vDate = new Date();
	vDate.setDate(1);
	vDate.setMonth(this.gMonth);
	vDate.setFullYear(this.gYear);

	var vFirstDay=vDate.getDay();
	var vDay=1;
	var vLastDay=Calendar.get_daysofmonth(this.gMonth, this.gYear);
	var vOnLastDay=0;
	var vCode = "";

	/*
	Get day for the 1st of the requested month/year..
	Place as many blank cells before the 1st day of the month as necessary. 
	*/

	vCode = vCode + "<TR>";
	for (i=0; i<vFirstDay; i++) {
		vCode = vCode + "<TD WIDTH='14%'" + this.write_weekend_string(i) + "><FONT SIZE='2' FACE='" + fontface + "'> </FONT></TD>";
	}

	// Write rest of the 1st week
	for (j=vFirstDay; j<7; j++) {
		vCode = vCode + "<TD WIDTH='14%'" + this.write_weekend_string(j) + "><FONT SIZE='2' FACE='" + fontface + "'>" + 
			"<A HREF='#' " + 
				"onClick=\"self.opener.document." + this.gReturnItem + ".value='" + 
				this.format_data(vDay) + 
				"';window.close();\">" + 
				this.format_day(vDay) + 
			"</A>" + 
			"</FONT></TD>";
		vDay=vDay + 1;
	}
	vCode = vCode + "</TR>";

	// Write the rest of the weeks
	for (k=2; k<7; k++) {
		vCode = vCode + "<TR>";

		for (j=0; j<7; j++) {
			vCode = vCode + "<TD WIDTH='14%'" + this.write_weekend_string(j) + "><FONT SIZE='2' FACE='" + fontface + "'>" + 
				"<A HREF='#' " + 
					"onClick=\"self.opener.document." + this.gReturnItem + ".value='" + 
					this.format_data(vDay) + 
					"';window.close();\">" + 
				this.format_day(vDay) + 
				"</A>" + 
				"</FONT></TD>";
			vDay=vDay + 1;

			if (vDay > vLastDay) {
				vOnLastDay = 1;
				break;
			}
		}

		if (j == 6)
			vCode = vCode + "</TR>";
		if (vOnLastDay == 1)
			break;
	}
	
	// Fill up the rest of last week with proper blanks, so that we get proper square blocks
	for (m=1; m<(7-j); m++) {
		if (this.gYearly)
			vCode = vCode + "<TD WIDTH='14%'" + this.write_weekend_string(j+m) + 
			"><FONT SIZE='2' FACE='" + fontface + "' COLOR='gray'> </FONT></TD>";
		else
			vCode = vCode + "<TD WIDTH='14%'" + this.write_weekend_string(j+m) + 
			"><FONT SIZE='2' FACE='" + fontface + "' COLOR='gray'>" + m + "</FONT></TD>";
	}
	
	return vCode;
}

Calendar.prototype.format_day = function(vday) {
	var vNowDay = gNow.getDate();
	var vNowMonth = gNow.getMonth();
	var vNowYear = gNow.getFullYear();

	if (vday == vNowDay && this.gMonth == vNowMonth && this.gYear == vNowYear)
		return ("<FONT COLOR=\"RED\"><B>" + vday + "</B></FONT>");
	else
		return (vday);
}

Calendar.prototype.write_weekend_string = function(vday) {
	var i;

	// Return special formatting for the weekend day.
	for (i=0; i<weekend.length; i++) {
		if (vday == weekend[i])
			return (" BGCOLOR=\"" + weekendColor + "\"");
	}
	
	return "";
}

Calendar.prototype.format_data = function(p_day) {
	var vData;
	var vMonth = 1 + this.gMonth;
	vMonth = (vMonth.toString().length < 2) ? "0" + vMonth : vMonth;
	var vMon = Calendar.get_month(this.gMonth).substr(0,3).toUpperCase();
	var vFMon = Calendar.get_month(this.gMonth).toUpperCase();
	var vY4 = new String(this.gYear);
	var vY2 = new String(this.gYear.substr(2,2));
	var vDD = (p_day.toString().length < 2) ? "0" + p_day : p_day;

	switch (this.gFormat) {
		case "MM\/DD\/YYYY" :
			vData = vMonth + "\/" + vDD + "\/" + vY4;
			break;
		case "MM\/DD\/YY" :
			vData = vMonth + "\/" + vDD + "\/" + vY2;
			break;
		case "MM-DD-YYYY" :
			vData = vMonth + "-" + vDD + "-" + vY4;
			break;
		case "MM-DD-YY" :
			vData = vMonth + "-" + vDD + "-" + vY2;
			break;

		case "DD\/MON\/YYYY" :
			vData = vDD + "\/" + vMon + "\/" + vY4;
			break;
		case "DD\/MON\/YY" :
			vData = vDD + "\/" + vMon + "\/" + vY2;
			break;
		case "DD-MON-YYYY" :
			vData = vDD + "-" + vMon + "-" + vY4;
			break;
		case "DD-MON-YY" :
			vData = vDD + "-" + vMon + "-" + vY2;
			break;

		case "DD\/MONTH\/YYYY" :
			vData = vDD + "\/" + vFMon + "\/" + vY4;
			break;
		case "DD\/MONTH\/YY" :
			vData = vDD + "\/" + vFMon + "\/" + vY2;
			break;
		case "DD-MONTH-YYYY" :
			vData = vDD + "-" + vFMon + "-" + vY4;
			break;
		case "DD-MONTH-YY" :
			vData = vDD + "-" + vFMon + "-" + vY2;
			break;

		case "DD\/MM\/YYYY" :
			vData = vDD + "\/" + vMonth + "\/" + vY4;
			break;
		case "DD\/MM\/YY" :
			vData = vDD + "\/" + vMonth + "\/" + vY2;
			break;
		case "DD-MM-YYYY" :
			vData = vDD + "-" + vMonth + "-" + vY4;
			break;
		case "DD-MM-YY" :
			vData = vDD + "-" + vMonth + "-" + vY2;
			break;

		default :
			vData = vMonth + "\/" + vDD + "\/" + vY4;
	}

	return vData;
}

function Build(p_item, p_month, p_year, p_format) {
	var p_WinCal = ggWinCal;
	gCal = new Calendar(p_item, p_WinCal, p_month, p_year, p_format);

	// Customize your Calendar here..
	gCal.gBGColor="white";
	gCal.gLinkColor="black";
	gCal.gTextColor="black";
	gCal.gHeaderColor="darkgreen";

	// Choose appropriate show function
	if (gCal.gYearly)	gCal.showY();
	else	gCal.show();
}

function show_calendar() {
	/* 
		p_month : 0-11 for Jan-Dec; 12 for All Months.
		p_year	: 4-digit year
		p_format: Date format (mm/dd/yyyy, dd/mm/yy, ...)
		p_item	: Return Item.
	*/

	p_item = arguments[0];
	if (arguments[1] == null)
		p_month = new String(gNow.getMonth());
	else
		p_month = arguments[1];
	if (arguments[2] == "" || arguments[2] == null)
		p_year = new String(gNow.getFullYear().toString());
	else
		p_year = arguments[2];
	if (arguments[3] == null)
		p_format = "MM/DD/YYYY";
	else
		p_format = arguments[3];

	var win_width = 250;
	var win_height = 250;
	w_left = ( screen.width / 2 ) - ( win_width / 2 );
	w_top = ( screen.height / 2 ) - ( win_height / 2 );
	
	vWinCal = window.open("", "Calendar", 
		"width=250,height=250,status=no,resizable=no,top="+w_top+",left="+w_left);
	vWinCal.opener = self;
	ggWinCal = vWinCal;

	Build(p_item, p_month, p_year, p_format);
}
/*
Yearly Calendar Code Starts here
*/
function show_yearly_calendar(p_item, p_year, p_format) {
	// Load the defaults..
	if (p_year == null || p_year == "")
		p_year = new String(gNow.getFullYear().toString());
	if (p_format == null || p_format == "")
		p_format = "MM/DD/YYYY";

	var vWinCal = window.open("", "Calendar", "scrollbars=yes");
	vWinCal.opener = self;
	ggWinCal = vWinCal;

	Build(p_item, null, p_year, p_format);
}

//-------- SET POINTER ---------//
/**
 * This array is used to remember mark status of rows in browse mode
 */
var marked_row = new Array;


/**
 * Sets/unsets the pointer and marker in browse mode
 *
 * @param   object    the table row
 * @param   integer  the row number
 * @param   string    the action calling this script (over, out or click)
 * @param   string    the default background color
 * @param   string    the color to use for mouseover
 * @param   string    the color to use for marking a row
 *
 * @return  boolean  whether pointer is set or not
 */


function setPointer(theRow, theRowNum, theAction, theDefaultColor, thePointerColor, theMarkColor)
{
    var theCells = null;

    // 1. Pointer and mark feature are disabled or the browser can't get the
    //    row -> exits
    if ((thePointerColor == '' && theMarkColor == '')
        || typeof(theRow.style) == 'undefined') {
        return false;
    }

    // 2. Gets the current row and exits if the browser can't get it
    if (typeof(document.getElementsByTagName) != 'undefined') {
        theCells = theRow.getElementsByTagName('td');
    }
    else if (typeof(theRow.cells) != 'undefined') {
        theCells = theRow.cells;
    }
    else {
        return false;
    }

    // 3. Gets the current color...
    var rowCellsCnt  = theCells.length;
    var domDetect    = null;
    var currentColor = null;
    var newColor     = null;
    // 3.1 ... with DOM compatible browsers except Opera that does not return
    //         valid values with "getAttribute"
    if (typeof(window.opera) == 'undefined'
        && typeof(theCells[0].getAttribute) != 'undefined') {
        currentColor = theCells[0].getAttribute('bgcolor');
        domDetect    = true;
    }
    // 3.2 ... with other browsers
    else {
        currentColor = theCells[0].style.backgroundColor;
        domDetect    = false;
    } // end 3

    // 3.3 ... Opera changes colors set via HTML to rgb(r,g,b) format so fix it
    if (currentColor.indexOf("rgb") >= 0)
    {
        var rgbStr = currentColor.slice(currentColor.indexOf('(') + 1,
                                     currentColor.indexOf(')'));
        var rgbValues = rgbStr.split(",");
        currentColor = "#";
        var hexChars = "0123456789ABCDEF";
        for (var i = 0; i < 3; i++)
        {
            var v = rgbValues[i].valueOf();
            currentColor += hexChars.charAt(v/16) + hexChars.charAt(v%16);
        }
    }

    // 4. Defines the new color
    // 4.1 Current color is the default one
    if (currentColor == ''
        || currentColor.toLowerCase() == theDefaultColor.toLowerCase()) {
        if (theAction == 'over' && thePointerColor != '') {
            newColor              = thePointerColor;
        }
        else if (theAction == 'click' && theMarkColor != '') {
            newColor              = theMarkColor;
            marked_row[theRowNum] = true;
            // Garvin: deactivated onclick marking of the checkbox because it's also executed
            // when an action (like edit/delete) on a single item is performed. Then the checkbox
            // would get deactived, even though we need it activated. Maybe there is a way
            // to detect if the row was clicked, and not an item therein...
            // document.getElementById('id_rows_to_delete' + theRowNum).checked = true;
        }
    }
    // 4.1.2 Current color is the pointer one
    else if (currentColor.toLowerCase() == thePointerColor.toLowerCase()
             && (typeof(marked_row[theRowNum]) == 'undefined' || !marked_row[theRowNum])) {
        if (theAction == 'out') {
            newColor              = theDefaultColor;
        }
        else if (theAction == 'click' && theMarkColor != '') {
            newColor              = theMarkColor;
            marked_row[theRowNum] = true;
            // document.getElementById('id_rows_to_delete' + theRowNum).checked = true;
        }
    }
    // 4.1.3 Current color is the marker one
    else if (currentColor.toLowerCase() == theMarkColor.toLowerCase()) {
        if (theAction == 'click') {
            newColor              = (thePointerColor != '')
                                  ? thePointerColor
                                  : theDefaultColor;
            marked_row[theRowNum] = (typeof(marked_row[theRowNum]) == 'undefined' || !marked_row[theRowNum])
                                  ? true
                                  : null;
            // document.getElementById('id_rows_to_delete' + theRowNum).checked = false;
        }
    } // end 4

    // 5. Sets the new color...
    if (newColor) {
        var c = null;
        // 5.1 ... with DOM compatible browsers except Opera
        if (domDetect) {
            for (c = 0; c < rowCellsCnt; c++) {
                theCells[c].setAttribute('bgcolor', newColor, 0);
            } // end for
        }
        // 5.2 ... with other browsers
        else {
            for (c = 0; c < rowCellsCnt; c++) {
                theCells[c].style.backgroundColor = newColor;
            }
        }
    } // end 5

    return true;
} // end of the 'setPointer()' function

/*
 * Sets/unsets the pointer and marker in vertical browse mode
 *
 * @param   object    the table row
 * @param   integer   the column number
 * @param   string    the action calling this script (over, out or click)
 * @param   string    the default background color
 * @param   string    the color to use for mouseover
 * @param   string    the color to use for marking a row
 *
 * @return  boolean  whether pointer is set or not
 *
 * @author Garvin Hicking <me@supergarv.de> (rewrite of setPointer.)
 */
//-------------------------------------


//--------Show-Hide Element--------//

function faqInitialize() {
	if(document.getElementsByTagName){
		gss_hidefaqs();
		var faqarray = new Array();
		faqarray = document.getElementsByTagName("div");
		for(i=0;i<faqarray.length;i++){
			if(faqarray[i].id.substring(0,6) == "faqdiv"){
				faqswitch(faqarray[i].id.substring(6,faqarray[i].id.length));
				i = faqarray.length+1;
			}
		}
	}
}
/*
if ( thisLevel.style.display == "none") {
                //thisLevel.filter.alpha.opacity="100";
				thisLevel.style.display = "block";
				thisImg.src = minusImg.src;
					for(var i = 1; i <= _menu_Num; i++){
						if(i != _sub_menu_Id) hideLevel(_menu_Id+i,_menu_Id+i+'Img');
					}
        } else hideLevel(_menu_Id+_sub_menu_Id,_menu_Id+_sub_menu_Id+'Img');
*/
function faqswitch(idnum)
{
	if(document.getElementById){
		if(document.getElementById("faqdiv"+idnum)){
			var elem = document.getElementById("faqdiv"+idnum);
			if(elem == null) { return; }
			if(elem.style.display == "none")
			{
				elem.style.display = "block";
				for(var i = 2; i <= 4; i++){
						if(i != idnum){
							var elem2 = document.getElementById("faqdiv"+i);
							elem2.style.display = "none";
						}
					}
				}
			else
			{
				elem.style.display = "none";
				}
		}
		window.event.cancelBubble = true;
		return false;
	}

}

function faqswitch1(idnum)
{
	if(document.getElementById){
		if(document.getElementById("faqdiv"+idnum)){
			var elem = document.getElementById("faqdiv"+idnum);
			if(elem == null) { return; }
			if(elem.style.display == "none")
			{
				elem.style.display = "block";
				for(var i = 1; i <= 1; i++){
						if(i != idnum){
							var elem2 = document.getElementById("faqdiv"+i);
							elem2.style.display = "none";
						}
					}
				}
			else
			{
				elem.style.display = "none";
				}
		}
		window.event.cancelBubble = true;
		return false;
	}

}

function gss_hidefaqs()
{
	if(document.getElementsByTagName){
		var divarray = new Array();
		divarray = document.getElementsByTagName("div");
		for(i=0; i<divarray.length; i++){
			if(divarray[i].id){
				if(divarray[i].id.indexOf("faqdiv") > -1){
					if(divarray[i].style.display != "none"){
						faqswitch(divarray[i].id.replace("faqdiv", ""));
					}
				}
			}
		}
	}
}


function printPage()
{
    document.getElementById('noprint').style.visibility = 'hidden';
    // Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
    document.getElementById('noprint').style.visibility = '';
}
/*
function BlinkIt()
{
    if(document.getElementById('blink').style.color == '#000000'){
	document.getElementById('blink').style.visibility = '#FF0000';
	}else{
    document.getElementById('blink').style.visibility = '#000000';
	}
}


function BlinkIt(){
	document.getElementById('blink').style.color=(document.getElementById('blink').style.color=='#000000')?'#FF0000':'#000000';
	//document.getElementById('blink').style.color=(document.getElementById('blink').style.color=='##483d8b')?'#FF0000':'##483d8b';
}
*/

function BlinkIt(theForm){

with(theForm){

for (var i = 0; i < elements.length; i++){
	if (elements[i].name == "blink"){
		if(elements[i].style.color='#000000'){
			elements[i].style.color='#FF0000';
		}else{
			elements[i].style.color='#000000';
		}
	}
}

}
}

//---------------------------------------------------
//---------------------------------------------------
// FUNCTION AUTOCOMPLETE BLOCK

var actbMouseOpt	= true;
var actbWidth		= '250';
var actbFirstText	= false;
function actb(obj,ca){
	/* ---- Public Variables ---- */
	this.actb_timeOut = -1; // Autocomplete Timeout in ms (-1: autocomplete never time out)
	this.actb_lim = 5;    // Number of elements autocomplete can show (-1: no limit)
	this.actb_firstText = actbFirstText; // should the auto complete be limited to the beginning of keyword?
	this.actb_mouse = actbMouseOpt; // Enable Mouse Support
	this.actb_delimiter = new Array(';',',');  // Delimiter for multiple autocomplete. Set it to empty array for single autocomplete
	this.actb_startcheck = 1; // Show widget only after this number of characters is typed in.
	/* ---- Public Variables ---- */

	/* --- Styles --- */
	this.actb_bgColor = '#000088';
	this.actb_Width	  = actbWidth;
	this.actb_textColor = '#FFFFFF';
	this.actb_hColor = '#33CCFF';
	this.actb_fFamily = 'Verdana';
	this.actb_fSize = '11px';
	this.actb_hStyle = 'text-decoration:underline;font-weight="bold"';

	//this.actb_test = setParams();
	/* --- Styles --- */

	/* ---- Private Variables ---- */
	var actb_delimwords = new Array();
	var actb_cdelimword = 0;
	var actb_delimchar = new Array();
	var actb_display = false;
	var actb_pos = 0;
	var actb_total = 0;
	var actb_curr = null;
	var actb_rangeu = 0;
	var actb_ranged = 0;
	var actb_bool = new Array();
	var actb_pre = 0;
	var actb_toid;
	var actb_tomake = false;
	var actb_getpre = "";
	var actb_mouse_on_list = 1;
	var actb_kwcount = 0;
	var actb_caretmove = false;
	this.actb_keywords = new Array();
	/* ---- Private Variables---- */
	
	this.actb_keywords = ca;
	var actb_self = this;

	actb_curr = obj;

	//alert(this.actb_mouse);

	addEvent(actb_curr,"focus",actb_setup);
	function actb_setup(){
		addEvent(document,"keydown",actb_checkkey);
		addEvent(actb_curr,"blur",actb_clear);
		addEvent(document,"keypress",actb_keypress);
	}

	function actb_clear(evt){
		if (!evt) evt = event;
		removeEvent(document,"keydown",actb_checkkey);
		removeEvent(actb_curr,"blur",actb_clear);
		removeEvent(document,"keypress",actb_keypress);
		actb_removedisp();
	}
	function actb_parse(n){
		if (actb_self.actb_delimiter.length > 0){
			var t = actb_delimwords[actb_cdelimword].trim().addslashes();
			var plen = actb_delimwords[actb_cdelimword].trim().length;
		}else{
			var t = actb_curr.value.addslashes();
			var plen = actb_curr.value.length;
		}
		var tobuild = '';
		var i;

		if (actb_self.actb_firstText){
			var re = new RegExp("^" + t, "i");
		}else{
			var re = new RegExp(t, "i");
		}
		var p = n.search(re);
				
		for (i=0;i<p;i++){
			tobuild += n.substr(i,1);
		}
		tobuild += "<font style='"+(actb_self.actb_hStyle)+"'>"
		for (i=p;i<plen+p;i++){
			tobuild += n.substr(i,1);
		}
		tobuild += "</font>";
			for (i=plen+p;i<n.length;i++){
			tobuild += n.substr(i,1);
		}
		return tobuild;
	}
	function actb_generate(){
		if (document.getElementById('tat_table')){ actb_display = false;document.body.removeChild(document.getElementById('tat_table')); } 
		if (actb_kwcount == 0){
			actb_display = false;
			return;
		}
		a = document.createElement('table');
		a.cellSpacing='1px';
		a.cellPadding='2px';
		a.style.position='absolute';
		a.style.top = eval(curTop(actb_curr) + actb_curr.offsetHeight) + "px";
		a.style.left = curLeft(actb_curr) + "px";
		a.style.backgroundColor=actb_self.actb_bgColor;
		a.style.width=actb_Width;
		a.id = 'tat_table';
		document.body.appendChild(a);
		var i;
		var first = true;
		var j = 1;
		if (actb_self.actb_mouse){
			a.onmouseout = actb_table_unfocus;
			a.onmouseover = actb_table_focus;
		}
		var counter = 0;
		for (i=0;i<actb_self.actb_keywords.length;i++){
			if (actb_bool[i]){
				counter++;
				r = a.insertRow(-1);
				if (first && !actb_tomake){
					r.style.backgroundColor = actb_self.actb_hColor;
					first = false;
					actb_pos = counter;
				}else if(actb_pre == i){
					r.style.backgroundColor = actb_self.actb_hColor;
					first = false;
					actb_pos = counter;
				}else{
					r.style.backgroundColor = actb_self.actb_bgColor;
				}
				r.id = 'tat_tr'+(j);
				c = r.insertCell(-1);
				c.style.color = actb_self.actb_textColor;
				c.style.fontFamily = actb_self.actb_fFamily;
				c.style.fontSize = actb_self.actb_fSize;
				c.innerHTML = actb_parse(actb_self.actb_keywords[i]);
				c.id = 'tat_td'+(j);
				c.setAttribute('pos',j);
				if (actb_self.actb_mouse){
					c.style.cursor = 'pointer';
					c.onclick=actb_mouseclick;
					c.onmouseover = actb_table_highlight;
				}
				j++;
			}
			if (j - 1 == actb_self.actb_lim && j < actb_total){
				r = a.insertRow(-1);
				r.style.backgroundColor = actb_self.actb_bgColor;
				c = r.insertCell(-1);
				c.style.color = actb_self.actb_textColor;
				c.style.fontFamily = 'arial narrow';
				c.style.fontSize = actb_self.actb_fSize;
				c.align='center';
				replaceHTML(c,'\\/');
				if (actb_self.actb_mouse){
					c.style.cursor = 'pointer';
					c.onclick = actb_mouse_down;
				}
				break;
			}
		}
		actb_rangeu = 1;
		actb_ranged = j-1;
		actb_display = true;
		if (actb_pos <= 0) actb_pos = 1;
	}
	function actb_remake(){
		document.body.removeChild(document.getElementById('tat_table'));
		a = document.createElement('table');
		a.cellSpacing='1px';
		a.cellPadding='2px';
		a.style.position='absolute';
		a.style.top = eval(curTop(actb_curr) + actb_curr.offsetHeight) + "px";
		a.style.left = curLeft(actb_curr) + "px";
		a.style.backgroundColor=actb_self.actb_bgColor;
		a.style.width=actb_Width;
		a.id = 'tat_table';
		if (actb_self.actb_mouse){
			a.onmouseout= actb_table_unfocus;
			a.onmouseover=actb_table_focus;
		}
		document.body.appendChild(a);
		var i;
		var first = true;
		var j = 1;
		if (actb_rangeu > 1){
			r = a.insertRow(-1);
			r.style.backgroundColor = actb_self.actb_bgColor;
			c = r.insertCell(-1);
			c.style.color = actb_self.actb_textColor;
			c.style.fontFamily = 'arial narrow';
			c.style.fontSize = actb_self.actb_fSize;
			c.align='center';
			replaceHTML(c,'/\\');
			if (actb_self.actb_mouse){
				c.style.cursor = 'pointer';
				c.onclick = actb_mouse_up;
			}
		}
		for (i=0;i<actb_self.actb_keywords.length;i++){
			if (actb_bool[i]){
				if (j >= actb_rangeu && j <= actb_ranged){
					r = a.insertRow(-1);
					r.style.backgroundColor = actb_self.actb_bgColor;
					r.id = 'tat_tr'+(j);
					c = r.insertCell(-1);
					c.style.color = actb_self.actb_textColor;
					c.style.fontFamily = actb_self.actb_fFamily;
					c.style.fontSize = actb_self.actb_fSize;
					c.innerHTML = actb_parse(actb_self.actb_keywords[i]);
					c.id = 'tat_td'+(j);
					c.setAttribute('pos',j);
					if (actb_self.actb_mouse){
						c.style.cursor = 'pointer';
						c.onclick=actb_mouseclick;
						c.onmouseover = actb_table_highlight;
					}
					j++;
				}else{
					j++;
				}
			}
			if (j > actb_ranged) break;
		}
		if (j-1 < actb_total){
			r = a.insertRow(-1);
			r.style.backgroundColor = actb_self.actb_bgColor;
			c = r.insertCell(-1);
			c.style.color = actb_self.actb_textColor;
			c.style.fontFamily = 'arial narrow';
			c.style.fontSize = actb_self.actb_fSize;
			c.align='center';
			replaceHTML(c,'\\/');
			if (actb_self.actb_mouse){
				c.style.cursor = 'pointer';
				c.onclick = actb_mouse_down;
			}
		}
	}
	function actb_goup(){
		if (!actb_display) return;
		if (actb_pos == 1) return;
		document.getElementById('tat_tr'+actb_pos).style.backgroundColor = actb_self.actb_bgColor;
		actb_pos--;
		if (actb_pos < actb_rangeu) actb_moveup();
		document.getElementById('tat_tr'+actb_pos).style.backgroundColor = actb_self.actb_hColor;
		if (actb_toid) clearTimeout(actb_toid);
		if (actb_self.actb_timeOut > 0) actb_toid = setTimeout(function(){actb_mouse_on_list=0;actb_removedisp();},actb_self.actb_timeOut);
	}
	function actb_godown(){
		if (!actb_display) return;
		if (actb_pos == actb_total) return;
		document.getElementById('tat_tr'+actb_pos).style.backgroundColor = actb_self.actb_bgColor;
		actb_pos++;
		if (actb_pos > actb_ranged) actb_movedown();
		document.getElementById('tat_tr'+actb_pos).style.backgroundColor = actb_self.actb_hColor;
		if (actb_toid) clearTimeout(actb_toid);
		if (actb_self.actb_timeOut > 0) actb_toid = setTimeout(function(){actb_mouse_on_list=0;actb_removedisp();},actb_self.actb_timeOut);
	}
	function actb_movedown(){
		actb_rangeu++;
		actb_ranged++;
		actb_remake();
	}
	function actb_moveup(){
		actb_rangeu--;
		actb_ranged--;
		actb_remake();
	}

	/* Mouse */
	function actb_mouse_down(){
		document.getElementById('tat_tr'+actb_pos).style.backgroundColor = actb_self.actb_bgColor;
		actb_pos++;
		actb_movedown();
		document.getElementById('tat_tr'+actb_pos).style.backgroundColor = actb_self.actb_hColor;
		actb_curr.focus();
		actb_mouse_on_list = 0;
		if (actb_toid) clearTimeout(actb_toid);
		if (actb_self.actb_timeOut > 0) actb_toid = setTimeout(function(){actb_mouse_on_list=0;actb_removedisp();},actb_self.actb_timeOut);
	}
	function actb_mouse_up(evt){
		if (!evt) evt = event;
		if (evt.stopPropagation){
			evt.stopPropagation();
		}else{
			evt.cancelBubble = true;
		}
		document.getElementById('tat_tr'+actb_pos).style.backgroundColor = actb_self.actb_bgColor;
		actb_pos--;
		actb_moveup();
		document.getElementById('tat_tr'+actb_pos).style.backgroundColor = actb_self.actb_hColor;
		actb_curr.focus();
		actb_mouse_on_list = 0;
		if (actb_toid) clearTimeout(actb_toid);
		if (actb_self.actb_timeOut > 0) actb_toid = setTimeout(function(){actb_mouse_on_list=0;actb_removedisp();},actb_self.actb_timeOut);
	}
	function actb_mouseclick(evt){
		if (!evt) evt = event;
		if (!actb_display) return;
		actb_mouse_on_list = 0;
		actb_pos = this.getAttribute('pos');
		actb_penter();
	}
	function actb_table_focus(){
		actb_mouse_on_list = 1;
	}
	function actb_table_unfocus(){
		actb_mouse_on_list = 0;
		if (actb_toid) clearTimeout(actb_toid);
		if (actb_self.actb_timeOut > 0) actb_toid = setTimeout(function(){actb_mouse_on_list = 0;actb_removedisp();},actb_self.actb_timeOut);
	}
	function actb_table_highlight(){
		actb_mouse_on_list = 1;
		document.getElementById('tat_tr'+actb_pos).style.backgroundColor = actb_self.actb_bgColor;
		actb_pos = this.getAttribute('pos');
		while (actb_pos < actb_rangeu) actb_moveup();
		while (actb_pos > actb_ranged) actb_movedown();
		document.getElementById('tat_tr'+actb_pos).style.backgroundColor = actb_self.actb_hColor;
		if (actb_toid) clearTimeout(actb_toid);
		if (actb_self.actb_timeOut > 0) actb_toid = setTimeout(function(){actb_mouse_on_list = 0;actb_removedisp();},actb_self.actb_timeOut);
	}
	/* ---- */

	function actb_insertword(a){
		if (actb_self.actb_delimiter.length > 0){
			str = '';
			l=0;
			for (i=0;i<actb_delimwords.length;i++){
				if (actb_cdelimword == i){
					prespace = postspace = '';
					gotbreak = false;
					for (j=0;j<actb_delimwords[i].length;++j){
						if (actb_delimwords[i].charAt(j) != ' '){
							gotbreak = true;
							break;
						}
						prespace += ' ';
					}
					for (j=actb_delimwords[i].length-1;j>=0;--j){
						if (actb_delimwords[i].charAt(j) != ' ') break;
						postspace += ' ';
					}
					str += prespace;
					str += a;
					l = str.length;
					if (gotbreak) str += postspace;
				}else{
					str += actb_delimwords[i];
				}
				if (i != actb_delimwords.length - 1){
					str += actb_delimchar[i];
				}
			}
			actb_curr.value = str;
			setCaret(actb_curr,l);
		}else{
			actb_curr.value = a;
		}
		actb_mouse_on_list = 0;
		actb_removedisp();
	}
	function actb_penter(){
		if (!actb_display) return;
		actb_display = false;
		var word = '';
		var c = 0;
		for (var i=0;i<=actb_self.actb_keywords.length;i++){
			if (actb_bool[i]) c++;
			if (c == actb_pos){
				word = actb_self.actb_keywords[i];
				break;
			}
		}
		actb_insertword(word);
		l = getCaretStart(actb_curr);
	}
	function actb_removedisp(){
		if (actb_mouse_on_list==0){
			actb_display = 0;
			if (document.getElementById('tat_table')){ document.body.removeChild(document.getElementById('tat_table')); }
			if (actb_toid) clearTimeout(actb_toid);
		}
	}
	function actb_keypress(e){
		if (actb_caretmove) stopEvent(e);
		return !actb_caretmove;
	}
	function actb_checkkey(evt){
		if (!evt) evt = event;
		a = evt.keyCode;
		caret_pos_start = getCaretStart(actb_curr);
		actb_caretmove = 0;
		switch (a){
			case 38:
				actb_goup();
				actb_caretmove = 1;
				return false;
				break;
			case 40:
				actb_godown();
				actb_caretmove = 1;
				return false;
				break;
			case 13: case 9:
				if (actb_display){
					actb_caretmove = 1;
					actb_penter();
					return false;
				}else{
					return true;
				}
				break;
			default:
				setTimeout(function(){actb_tocomplete(a)},50);
				break;
		}
	}

	function actb_tocomplete(kc){
		if (kc == 38 || kc == 40 || kc == 13) return;
		var i;
		if (actb_display){ 
			var word = 0;
			var c = 0;
			for (var i=0;i<=actb_self.actb_keywords.length;i++){
				if (actb_bool[i]) c++;
				if (c == actb_pos){
					word = i;
					break;
				}
			}
			actb_pre = word;
		}else{ actb_pre = -1};
		
		if (actb_curr.value == ''){
			actb_mouse_on_list = 0;
			actb_removedisp();
			return;
		}
		if (actb_self.actb_delimiter.length > 0){
			caret_pos_start = getCaretStart(actb_curr);
			caret_pos_end = getCaretEnd(actb_curr);
			
			delim_split = '';
			for (i=0;i<actb_self.actb_delimiter.length;i++){
				delim_split += actb_self.actb_delimiter[i];
			}
			delim_split = delim_split.addslashes();
			delim_split_rx = new RegExp("(["+delim_split+"])");
			c = 0;
			actb_delimwords = new Array();
			actb_delimwords[0] = '';
			for (i=0,j=actb_curr.value.length;i<actb_curr.value.length;i++,j--){
				if (actb_curr.value.substr(i,j).search(delim_split_rx) == 0){
					ma = actb_curr.value.substr(i,j).match(delim_split_rx);
					actb_delimchar[c] = ma[1];
					c++;
					actb_delimwords[c] = '';
				}else{
					actb_delimwords[c] += actb_curr.value.charAt(i);
				}
			}

			var l = 0;
			actb_cdelimword = -1;
			for (i=0;i<actb_delimwords.length;i++){
				if (caret_pos_end >= l && caret_pos_end <= l + actb_delimwords[i].length){
					actb_cdelimword = i;
				}
				l+=actb_delimwords[i].length + 1;
			}
			var ot = actb_delimwords[actb_cdelimword].trim(); 
			var t = actb_delimwords[actb_cdelimword].addslashes().trim();
		}else{
			var ot = actb_curr.value;
			var t = actb_curr.value.addslashes();
		}
		if (ot.length == 0){
			actb_mouse_on_list = 0;
			actb_removedisp();
		}
		if (ot.length < actb_self.actb_startcheck) return this;
		if (actb_self.actb_firstText){
			var re = new RegExp("^" + t, "i");
		}else{
			var re = new RegExp(t, "i");
		}

		actb_total = 0;
		actb_tomake = false;
		actb_kwcount = 0;
		for (i=0;i<actb_self.actb_keywords.length;i++){
			actb_bool[i] = false;
			if (re.test(actb_self.actb_keywords[i])){
				actb_total++;
				actb_bool[i] = true;
				actb_kwcount++;
				if (actb_pre == i) actb_tomake = true;
			}
		}

		if (actb_toid) clearTimeout(actb_toid);
		if (actb_self.actb_timeOut > 0) actb_toid = setTimeout(function(){actb_mouse_on_list = 0;actb_removedisp();},actb_self.actb_timeOut);
		actb_generate();
	}
	return this;
}

/* Event Functions */

// Add an event to the obj given
// event_name refers to the event trigger, without the "on", like click or mouseover
// func_name refers to the function callback when event is triggered
function addEvent(obj,event_name,func_name){
	if (obj.attachEvent){
		obj.attachEvent("on"+event_name, func_name);
	}else if(obj.addEventListener){
		obj.addEventListener(event_name,func_name,true);
	}else{
		obj["on"+event_name] = func_name;
	}
}

// Removes an event from the object
function removeEvent(obj,event_name,func_name){
	if (obj.detachEvent){
		obj.detachEvent("on"+event_name,func_name);
	}else if(obj.removeEventListener){
		obj.removeEventListener(event_name,func_name,true);
	}else{
		obj["on"+event_name] = null;
	}
}

// Stop an event from bubbling up the event DOM
function stopEvent(evt){
	evt || window.event;
	if (evt.stopPropagation){
		evt.stopPropagation();
		evt.preventDefault();
	}else if(typeof evt.cancelBubble != "undefined"){
		evt.cancelBubble = true;
		evt.returnValue = false;
	}
	return false;
}

// Get the obj that starts the event
function getElement(evt){
	if (window.event){
		return window.event.srcElement;
	}else{
		return evt.currentTarget;
	}
}
// Get the obj that triggers off the event
function getTargetElement(evt){
	if (window.event){
		return window.event.srcElement;
	}else{
		return evt.target;
	}
}
// For IE only, stops the obj from being selected
function stopSelect(obj){
	if (typeof obj.onselectstart != 'undefined'){
		addEvent(obj,"selectstart",function(){ return false;});
	}
}

/*    Caret Functions     */

// Get the end position of the caret in the object. Note that the obj needs to be in focus first
function getCaretEnd(obj){
	if(typeof obj.selectionEnd != "undefined"){
		return obj.selectionEnd;
	}else if(document.selection&&document.selection.createRange){
		var M=document.selection.createRange();
		try{
			var Lp = M.duplicate();
			Lp.moveToElementText(obj);
		}catch(e){
			var Lp=obj.createTextRange();
		}
		Lp.setEndPoint("EndToEnd",M);
		var rb=Lp.text.length;
		if(rb>obj.value.length){
			return -1;
		}
		return rb;
	}
}
// Get the start position of the caret in the object
function getCaretStart(obj){
	if(typeof obj.selectionStart != "undefined"){
		return obj.selectionStart;
	}else if(document.selection&&document.selection.createRange){
		var M=document.selection.createRange();
		try{
			var Lp = M.duplicate();
			Lp.moveToElementText(obj);
		}catch(e){
			var Lp=obj.createTextRange();
		}
		Lp.setEndPoint("EndToStart",M);
		var rb=Lp.text.length;
		if(rb>obj.value.length){
			return -1;
		}
		return rb;
	}
}
// sets the caret position to l in the object
function setCaret(obj,l){
	obj.focus();
	if (obj.setSelectionRange){
		obj.setSelectionRange(l,l);
	}else if(obj.createTextRange){
		m = obj.createTextRange();		
		m.moveStart('character',l);
		m.collapse();
		m.select();
	}
}
// sets the caret selection from s to e in the object
function setSelection(obj,s,e){
	obj.focus();
	if (obj.setSelectionRange){
		obj.setSelectionRange(s,e);
	}else if(obj.createTextRange){
		m = obj.createTextRange();		
		m.moveStart('character',s);
		m.moveEnd('character',e);
		m.select();
	}
}

/*    Escape function   */
String.prototype.addslashes = function(){
	return this.replace(/(["\\\.\|\[\]\^\*\+\?\$\(\)])/g, '\\$1');
}
String.prototype.trim = function () {
    return this.replace(/^\s*(\S*(\s+\S+)*)\s*$/, "$1");
};
/* --- Escape --- */

/* Offset position from top of the screen */
function curTop(obj){
	toreturn = 0;
	while(obj){
		toreturn += obj.offsetTop;
		obj = obj.offsetParent;
	}
	return toreturn;
}
function curLeft(obj){
	toreturn = 0;
	while(obj){
		toreturn += obj.offsetLeft;
		obj = obj.offsetParent;
	}
	return toreturn;
}
/* ------ End of Offset function ------- */

/* Types Function */

// is a given input a number?
function isNumber(a) {
    return typeof a == 'number' && isFinite(a);
}

/* Object Functions */

function replaceHTML(obj,text){
	while(el = obj.childNodes[0]){
		obj.removeChild(el);
	};
	obj.appendChild(document.createTextNode(text));
}

//---------------------------------------------------


// Declare Global Variable for XMLHTTPRequest--- >

function createRequestObject(){
	var request_o; //declare the variable to hold the object.
	var browser = navigator.appName; //find the browser name
	if(browser == "Microsoft Internet Explorer"){
		request_o = new ActiveXObject("Microsoft.XMLHTTP");
	}else{
		request_o = new XMLHttpRequest();
	}
	return request_o; 
}

var http = createRequestObject(); 

/* The following function creates an XMLHttpRequest object... */

function createRequestObject(){
	var request_o; //declare the variable to hold the object.
	var browser = navigator.appName; //find the browser name
	if(browser == "Microsoft Internet Explorer"){
		/* Create the object using MSIE's method */
		request_o = new ActiveXObject("Microsoft.XMLHTTP");
	}else{
		/* Create the object using other browser's method */
		request_o = new XMLHttpRequest();
	}
	return request_o; //return the object
}

// End Declaring Global Variablr for XMLHTTPRequest --- >
