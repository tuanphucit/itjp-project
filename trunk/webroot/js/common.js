/* 
 * @author OanhNN
 * @date 20/03/2012
 */
function checkAll(){
	for (var i=0;i<document.form1.elements.length;i++)
	{
		var e=document.form1.elements[i];
		if ((e.name != 'allbox') && (e.type=='checkbox'))
		{
			e.checked=document.form1.allbox.checked;
		}
	}
}
$(document).ready(function(){
	$("#reset").click(function(){
		var parent = $(this).attr('id');
		alert(parent);
	});
});


