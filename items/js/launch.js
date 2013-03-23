function check_title(){
	$title=document.launch.title.value;
	if ($title.length==0){
		document.getElementById("warning_title").innerHTML="活动标题不能为空";
		document.getElementById("warning_title").style.fontWeight="bold";
		return false;
	}
	else if ($title.length>30){
		document.getElementById("warning_title").innerHTML="活动标题不能超过30个字符";
		document.getElementById("warning_title").style.fontWeight="bold";
	    return false;
	}
}
function check_content(){
	$content=document.launch.content.value;
	if ($content.length==0){
		document.getElementById('warning_content').innerHTML="活动内容不能为空";
		document.getElementById('warning_content').style.fontWeight="bold";
		return false;

	}
	else if ($content.length>100){
		document.getElementById("warning_content").innerHTML="活动内容不能超过100个字符";
		document.getElementById("warning_content").style.fontWeight="bold";
	    return false;	
	}
}
function check_launch(){
	$title=document.launch.title.value;
	$content=document.launch.content.value;
	if ($title.length==0){
		alert("活动标题不能为空");
		return false;
	}
	else if ($title.length>30){
		alert("活动标题不能超过30个字符");
		return false;
	}
	if ($content.length==0){
		alert("活动内容不能为空");
		return false;
	}
	else if ($content.length>100){
		alert("活动内容不能超过100个字符");
		return false;	
	}
	var b_y=document.launch.begin_time_year.value;
	var b_m=document.launch.begin_time_month.value;
	var b_d=document.launch.begin_time_day.value;
	var b_h=document.launch.begin_time_hour.value;
	var e_y=document.launch.end_time_year.value;
	var e_m=document.launch.end_time_month.value;
	var e_d=document.launch.end_time_day.value;
	var e_h=document.launch.end_time_hour.value;
	var date=new Date();
	var t_y=date.getFullYear();
	var t_m=date.getMonth()+1;
	var t_d=date.getDate();
    var t_h=date.getHours();
    var today=t_y*1000000+t_m*10000+t_d*100+t_h;
    var begin_time=b_y*10000+b_m*100+b_d*1+b_h;
    var end_time=e_y*10000+e_m*100+e_d*1+e_h;
    if (b_y==0 || b_m==0 || b_d==0 || b_h==24 || e_y==0 || e_m==0 || e_d==0 || e_h==24){
    	alert("请填写时间");
    	return false;
    }
    else if (begin_time>end_time){
    	alert("活动时间出错");
    	return false;
    }
    else if (end_time<today){
    	alert("活动时间已经过了");
    	return false;
    }
}