// JavaScript Document
function mtrim(str)
{
	return str.replace(/\s+/g,'');
}
function only_numbers(evt)
{
	mykey=String.fromCharCode(evt.keyCode)
	mycode=evt.keyCode;
	
	var mstr="1234567890.";
	if(mycode=="32" || mycode=="13" || mycode=="8" || mycode=="46" || mycode=="37" || mycode=="39" )
	{
		return true;
	}
	
	 if(mstr.indexOf(mykey)<0)
	 {
		 return false;
	 }
	 
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
} 
var mserverpath="";
function display_all_gigs(serverpath)
{
	mserverpath=serverpath;
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp787=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp787=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp787.onreadystatechange=function() {
    if (xmlhttp787.readyState==4 && xmlhttp787.status==200) {
 
		mresponse=xmlhttp787.responseText
		document.getElementById("myGigs").innerHTML=mresponse;
		$('[data-slidepanel]').slidepanel({
              orientation: 'right',
              mode: 'view'
          });
		    $("#mydatatable").dataTable();
			
			setTimeout("display_all_gigs(mserverpath)",120000);
			

		
    }
  }
  var m_url=serverpath+"all-user-gigs.php?all=1"
 // alert(m_url);
  xmlhttp787.open("GET",m_url,true);
  xmlhttp787.send();

}
function display_my_gigs(serverpath)
{
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp787=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp787=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp787.onreadystatechange=function() {
    if (xmlhttp787.readyState==4 && xmlhttp787.status==200) {
 
		mresponse=xmlhttp787.responseText
		document.getElementById("myGigs").innerHTML=mresponse;
		$('[data-slidepanel]').slidepanel({
              orientation: 'right',
              mode: 'view'
          });
		  		    $("#mydatatable").dataTable();

    }
  }
  var m_url=serverpath+"all-user-gigs.php"
  xmlhttp787.open("GET",m_url,true);
  xmlhttp787.send();

}
function displayerror(str,control,hide)
{
	document.getElementById(control).innerHTML=str;
	document.getElementById(control).style.display="block";
	document.getElementById(hide).innerHTML='';
	document.getElementById(hide).style.display="none";
	document.getElementById('formDiv').style.display="none";

}
var mrurl="";
function view_proposals(serverpath,projectId)
{

 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp7087=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp7087=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp7087.onreadystatechange=function() {
    if (xmlhttp7087.readyState==4 && xmlhttp7087.status==200) {
 
		mresponse=xmlhttp7087.responseText
		document.getElementById("myBids").innerHTML=mresponse;
		
		
    }
  }
  var m_url=serverpath+"projectbids.php?projectId="+projectId
  xmlhttp7087.open("GET",m_url,true);
  xmlhttp7087.send();

}

function view_messages(serverpath,projectId,msgto,msgfrom)
{

 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp70888=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp70888=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp70888.onreadystatechange=function() {
    if (xmlhttp70888.readyState==4 && xmlhttp70888.status==200) {
 
		mresponse=xmlhttp70888.responseText
		document.getElementById("mchat-box").innerHTML=mresponse;

    }
  }
  var m_url=serverpath+"project-messages.php?projectId="+projectId+"&msgto="+msgto+"&msgfrom="+msgfrom
  xmlhttp70888.open("GET",m_url,true);
  xmlhttp70888.send();

}

var muser_id="";
var mserverpath="";
var mprojectId="";
var mmsgfrom="";
var mmtime="";
function view_message_thread(serverpath,projectId,userId,bidfrom,mtime)
{
	clear_functions();
muser_id=userId
mserverpath=serverpath;
mprojectId=projectId;
mmsgfrom=bidfrom
mmtime=mtime
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp70899=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp70899=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp70899.onreadystatechange=function() {
    if (xmlhttp70899.readyState==4 && xmlhttp70899.status==200) {
 
		mresponse=xmlhttp70899.responseText
		document.getElementById("msg"+mmtime).innerHTML=mresponse;
		view_messages(mserverpath,mprojectId,muser_id,mmsgfrom);
		
    }
  }
  var m_url=serverpath+"viewMessages/"+projectId+"/"+userId+"/"+bidfrom+"/"+mtime
  xmlhttp70899.open("GET",m_url,true);
  xmlhttp70899.send();

}
function clear_functions()
{
	var mlist=document.getElementsByClassName("m_display");
	if(mlist.length>0)
	{
		for(i=0;i<mlist.length;i++)
		{
			mlist.item(i).innerHTML="";
		}
	}
}
function display_assigned_gigs(serverpath)
{
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp7859=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp7859=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp7859.onreadystatechange=function() {
    if (xmlhttp7859.readyState==4 && xmlhttp7859.status==200) {
 
		mresponse=xmlhttp7859.responseText
		document.getElementById("myGigs").innerHTML=mresponse;
		$('[data-slidepanel]').slidepanel({
              orientation: 'right',
              mode: 'view'
          });
    }
  }
  var m_url=serverpath+"assigned-to-me.php";
  xmlhttp7859.open("GET",m_url,true);
  xmlhttp7859.send();
}

function display_due_gigs(serverpath)
{
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp4345=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp4345=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp4345.onreadystatechange=function() {
    if (xmlhttp4345.readyState==4 && xmlhttp4345.status==200) {
 
		mresponse=xmlhttp4345.responseText
		document.getElementById("myGigs").innerHTML=mresponse;
		$('[data-slidepanel]').slidepanel({
              orientation: 'right',
              mode: 'view'
          });
		      $("#mydatatable").dataTable();
    }
  }
  var m_url=serverpath+"pending-gigs.php";
  xmlhttp4345.open("GET",m_url,true);
  xmlhttp4345.send();
}

function display_old_gigs(serverpath)
{
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp6734=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp6734=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp6734.onreadystatechange=function() {
    if (xmlhttp6734.readyState==4 && xmlhttp6734.status==200) {
 
		mresponse=xmlhttp6734.responseText
		document.getElementById("myGigs").innerHTML=mresponse;
		$('[data-slidepanel]').slidepanel({
              orientation: 'right',
              mode: 'view'
          });
		   $("#mydatatable").dataTable();
    }
  }
  var m_url=serverpath+"archive-gigs.php";
  xmlhttp6734.open("GET",m_url,true);
  xmlhttp6734.send();
}

function display_all_messages(serverpath)
{

 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp43489=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp43489=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp43489.onreadystatechange=function() {
    if (xmlhttp43489.readyState==4 && xmlhttp43489.status==200)
	 {
 
		mresponse=xmlhttp43489.responseText
		document.getElementById("myGigs").innerHTML=mresponse;
		   
		   $('[data-slidepanel]').slidepanel({
              orientation: 'right',
              mode: 'view'
          });
		  $("#example1").dataTable();
	 }
  }

  var m_url=serverpath+"my-inbox.php";
  xmlhttp43489.open("GET",m_url,true);
  xmlhttp43489.send();

}
var mserverpath="";
function view_my_message_thread(serverpath,mId)
{
	mserverpath=serverpath;
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp43495=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp43495=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp43495.onreadystatechange=function() {
    if (xmlhttp43495.readyState==4 && xmlhttp43495.status==200) {
 
		mresponse=xmlhttp43495.responseText
		document.getElementById("mchat-box").innerHTML=mresponse;
		//display_all_messages(mserverpath);
		view_m_messages(mserverpath);
		  
		       }
  }

  var m_url=serverpath+"message-thread.php?pId="+mId;
  xmlhttp43495.open("GET",m_url,true);
  xmlhttp43495.send();	

}
function addgigcall()
{
	document.getElementById('errormodal').style.display="none";
	document.getElementById('successmodal').style.display="none";
	document.getElementById('formDiv').style.display="block";
	document.getElementById('gigForm').reset();
}



function view_m_messages(serverpath)
{
	mserverpath=serverpath;
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp4349005=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp4349005=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp4349005.onreadystatechange=function() {
    if (xmlhttp4349005.readyState==4 && xmlhttp4349005.status==200) {
 
		mresponse=xmlhttp4349005.responseText
		document.getElementById("mmessages").innerHTML=mresponse;
		
		  
		       }
  }

  var m_url=serverpath+"top-messages.php";
  xmlhttp4349005.open("GET",m_url,true);
  xmlhttp4349005.send();	

}
function my_display()
{
	var projectstatus=document.getElementById('projectstatus').value;
	if(projectstatus=="3")
	{
		document.getElementById("myContainer").style.display="none";
		document.getElementById("myContainer1").style.display="block";
	}
	else
	{
		document.getElementById("myContainer").style.display="block";
		document.getElementById("myContainer1").style.display="none";		
	}
}

function view_all_gigsters(serverpath,sortfield)
{

 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp4349095=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp4349095=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp4349095.onreadystatechange=function() {
    if (xmlhttp4349095.readyState==4 && xmlhttp4349095.status==200) 
	{
 		mresponse=xmlhttp4349095.responseText
		document.getElementById("chat-box").innerHTML=mresponse;

		  
     }
  }

  var m_url=serverpath+"show-gigsters.php?sortfield="+sortfield;
  xmlhttp4349095.open("GET",m_url,true);
  xmlhttp4349095.send();	

}

function view_user_projects(serverpath,userId)
{

 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp4349095=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp4349095=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp4349095.onreadystatechange=function() {
    if (xmlhttp4349095.readyState==4 && xmlhttp4349095.status==200) 
	{
 		mresponse=xmlhttp4349095.responseText
		document.getElementById("userProjects").innerHTML=mresponse;
		  
     }
  }

  var m_url=serverpath+"user-projects.php?userId="+userId;

  xmlhttp4349095.open("GET",m_url,true);
  xmlhttp4349095.send();	

}
function my_check()
{

	var mychecks=document.getElementsByName("invitegig[]");
	for(i=0;i<mychecks.length;i++)
	{
		if(mychecks.item(i).checked==true)
		{
			return true;
			break;
		}
	}
	document.getElementById("errormodal").innerHTML="Error, You must select a gig first to continue.";
	document.getElementById("errormodal").style.display="block";
	
	return false;
}
