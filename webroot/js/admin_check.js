function resizeL(img) {
img.height = "146";
img.width = "183";
}
function resizeS(img) {
img.height = "20";
img.width  = "20";
}


function submitUserAction(form)
{
	var count = 0;
	for (var i=0;i<form.elements.length;i++)
	{
		var e=form.elements[i];
		if ((e.checked == true) && (e.type=='checkbox'))
		{
			count = 1;
			break;
		}
	}
	if(form.UserAction.value == 3&& count == 1){
    	return confirm("このテナントさんを本当に削除したいですか？");
	}
	
}


//check delete in edit screen
function checkDelete(form1){
	for(var i = 0; i < document.form1.Status1.length; i++)
	if((document.form1.Status1[i].checked == true && document.form1.Status1[i].value == -1))
		return confirm("Would you like to delete?");
}

$(document).ready(function(){
	$('#goback').click(function(){
		location.href="../";
	});
	$('#gobackFromAdd').click(function(){
		location.href="./";
	});
	$('#templategoback').click(function(){
		location.href="./";
	});
	$("input.writeText").focus(function(){
		$(this).val("");
	});
	
	$("textarea.writeText").focus(function(){
		$(this).text("");
	});
	$('#gotoUserEdit').click(function(){
		var url = document.URL;
		var id = url.slice(url.lastIndexOf("/"));
		
		location.href="../edit"+id;
	});
});


function showClock(){
	var Digital=new Date();
	var hours=Digital.getHours();
	var minutes=Digital.getMinutes();
	var seconds=Digital.getSeconds();
//	var dn="AM";
//	if (hours>12){
//	dn="PM";
//	hours=hours-12
//	}
	if (hours==0)
	hours=24;
	if (hours<=9)
		hours = "0"+hours;
	if (minutes<=9)
	minutes="0"+minutes;
	if (seconds<=9)
	seconds="0"+seconds;
	
	document.getElementById("clock").innerHTML=hours+":"+minutes+":"+seconds;
	setTimeout("showClock()",1000);
}

//$(document).ready(function(){
//		$("select.list-parent-category").change(function(){
//			if($(this).val()){
//			var url = "<?php echo $this->Html->url(array('controller' => 'categories','action' => 'listChildCategory'))?>" + "/" + $(this).val();
//			$.ajax({
//				url : url,
//				success : function(data){
//					$("span.list-child-category").html(data);
//				}
//			});
//			}else{
//				$("span.list-child-category").html("");
//			}
//		});
//});
