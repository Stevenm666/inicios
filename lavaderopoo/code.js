$(function(){


	console.log('working');


	$(document).on('click','.change-state',function(){
		let element = $(this)[0].parentElement.parentElement;
		let id = $(element).attr('idservi');
		console.log(id);
		$.post('actesta.php',{id},function(response){
			location.reload();
		})
		});





});