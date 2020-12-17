$(document).ready(function(){
	$('.detailbtn').click(function(){

		var id=$(this).data('id');
		var orderdate=$(this).data('orderdate');
		var voucherno=$(this).data('voucherno');
		var total=$(this).data('total');
		

		var orderdetail={
			id:id,
			orderdate:orderdate,
			voucherno:voucherno,
			total:total
		}

		console.log(orderdetail);

	})
})

