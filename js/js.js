$(document).ready(function(){
	$.post('/wp-admin/admin-ajax.php',
		{
			'action':'azbnajax_call',
			'method':'get/post',
			'id':prompt('ID','0'),
			'type':'plain',
		},
		function(data){
			alert(data);
		}
	);

});