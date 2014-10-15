selection = function(){
	
	if($(this).is(":checked")){
		var newVal = $("#collectIds").val()+$(this).val()+"~";
		$("#collectIds").val(newVal);
	}else{
		var newVal = $("#collectIds").val().replace($(this).val()+"~", "");
		$("#collectIds").val(newVal);
	}
	
}

active_check = function(vurl, id){

	var val = 0;
	if($("#"+id).is(":checked"))
		{
			var val = 1;
		}
	$(this).attr("disabled", "true");
	$.ajax({
		type: "POST",
		url: vurl,
		data: "act=1&id="+id+"&value="+val,
		success: function(msg){
			
		}
	});
	$(this).attr("disabled", "");
}

checkbox_select_all = function(){
	
	$(".check:checkbox").attr("checked", "true");
	var allCheck = $(".check:checkbox:checked").length;
	var collectIds = "";
	for(ac=0;ac<allCheck;ac++)
		{
			collectIds += $(".check:checkbox:checked")[ac].value + "~";
		}
	$("#collectIds").val(collectIds);
	
}

checkbox_deselect_all = function()
{
	
    $(".check:checkbox").attr("checked", "");
    $("#collectIds").val("");
	
}

delete_all_check = function()
{
	
    if(confirm("are you sure")){
        return true;
    }else{
        return false;
    }
    
}

delete_confirm = function(vurl)
{
	if(confirm("Are you sure ?"))
	{
		location.href = vurl;
	}
}
