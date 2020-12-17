$(document).ready(function(){
			showdata();
			cartnoti();
			

			$(".mybtn").click(function(){
				var id=$(this).data('id');
				var name=$(this).data('name');
				var photo=$(this).data('photo');
				var price=$(this).data('price');
				var discount=$(this).data('discount');
				
				
				
				var cart={
					id:id,
					name:name,
					price:price,
					discount:discount,
					photo:photo,
					qty:1
				}

				console.log(cart);
				var cartlist=localStorage.getItem("cart");

				var cartArray;
				if(cartlist==null){
					cartArray=[];
				}else{
					cartArray=JSON.parse(cartlist);
				}

				var status=false;
				cartArray.forEach( function(v, i) {
				if(id==v.id){
					v.qty++
					status=true;
				}
			});


			if(status==false){
				cartArray.push(cart);
			}
			
			//console.log(itemArray);
			var cartstring=JSON.stringify(cartArray);
			localStorage.setItem("cart", cartstring);
			showdata();
			cartnoti();
			
			});


			function showdata(){
			var cartlist=localStorage.getItem("cart");
			if(cartlist){
				var cartArray=JSON.parse(cartlist);
				console.log(cartArray);
				var html="";
				var j=1;
				var total=0;
				var subtotal;
				cartArray.forEach( function(v, i) {

					
					if(v.discount!=''){
					// statements
					subtotal=v.qty*v.discount;
					total+=subtotal;
					html+=`<tr>
					<td>${j++}</td>
					<td><img src="${v.photo}" width="100" height="100">	${v.name}</td>
					<td><button class="btnincrease" data-id="${i}">+</button>${v.qty}<button class="btndecrease" data-id="${i}">-</button></td>

					<td><del>${v.price}</del>${v.discount}</td>
					<td>${subtotal}</td>
					
					</tr>`
					}

					else {
					// statements
					subtotal=v.qty*v.price;
					total+=subtotal;
					html+=`<tr>
					<td>${j++}</td>
					<td><img src="${v.photo}" width="100" height="100">	${v.name}</td>
					<td><button class="btnincrease" data-id="${i}">+</button>${v.qty}<button class="btndecrease" data-id="${i}">-</button></td>

					<td>${v.price}</td>
					<td>${subtotal}</td>
					
					</tr>`
					}

					

					
				});


				html+=`<tr><td colspan="5">Total:</td><td>${total} Ks</td><tr>`
				$("tbody").html(html);
				
			}//end if condition
			else{
                html+=`<div class="col-12"><h5 class="text-center">There are no items in this cart</h5>
                        </div>
                        <div class="col-12 mt-5 ">
                        <a href="index.php" class="btn btn-secondary mainfullbtncolor px-3" > 
                        <i class="icofont-shopping-cart"></i>Continue Shopping </a></div>`
               
                $('.shoppingcart_div').hide();
                $('.noneshoppingcart_div').html(html);
               
            	}
			}//end showdata

		/*function cartnoti(){
			var cartlist=localStorage.getItem("cart");
			var total=0;
			if(cartlist){
				var cartArray=JSON.parse(cartlist);
				cartArray.forEach( function(v,i) {
					//console.log(v);
					total+=v.qty;
					// statements
				});
				console.log(total);
				$(".cartNoti").html(total);

			}
		}*/

		 function cartnoti(){
            //alert('ok');
            var cartlist=localStorage.getItem("cart");
            var total=0;
            var noti= 0 ;
            if(cartlist){
                var cartArray=JSON.parse(cartlist);
                cartArray.forEach( function(v,i) {
                    //console.log(v);
                    var unitprice = v.price;
                    var discount = v.discount;
                    var qty = v.qty;
                    if (discount){
                        var price = discount;
                    }
                    else{
                        var price = unitprice;
                    }
                    var subtotal = price *qty;

                    noti +=qty++;
                    total +=subtotal ++;
                })
                
                $('.cartNoti').html(noti);
                $('.cartTotal').html(total+ " Ks");     
            }
            else{
                $('.cartNoti').html(0);
                $('.cartTotal').html(0+ " Ks");   
            }
        }



		$("tbody").on('click','.btnincrease',function(){
			//alert("ok");
			var id=$(this).data('id');

			var cartlist=localStorage.getItem("cart");
			if(cartlist){
				var cartArray=JSON.parse(cartlist);

				cartArray.forEach( function(v, i) {

					if(i==id){
						//alert("ok");
						v.qty++;
					}
					// statements
				});
			var cartstring=JSON.stringify(cartArray);
			localStorage.setItem("cart",cartstring);
			showdata();
			cartnoti();
			
			}
		})


		$("tbody").on('click','.btndecrease',function(){
			//alert("ok");
			var id=$(this).data('id');

			var cartlist=localStorage.getItem("cart");
			if(cartlist){
				var cartArray=JSON.parse(cartlist);

				cartArray.forEach( function(v, i) {

					if(i==id){
						//alert("ok");
						v.qty--;
						if(v.qty==0){
							cartArray.splice(id, 1);
						}
					}
					// statements
				});
			var cartstring=JSON.stringify(cartArray);
			localStorage.setItem("cart",cartstring);
			showdata();
			cartnoti();
			}
		})


		$("tfoot").on('click','.checkoutBtn',function(){
			//alert('helo');
			var cart=localStorage.getItem('cart');
			var note=$('#notes').val();
			var total=0;

			var cartArray=JSON.parse(cart);
			 $.each(cartArray, function(i,v){
             var unitprice = v.price;

             var discount = v.discount;
             var qty = v.qty;
             if (discount){
                var price = discount;
              }
              else{
                var price = unitprice;
              }
              var subtotal = price *qty;

              total +=subtotal ++;
          });
              
			//console.log(cart);
			//console.log(note);
			console.log(total);

			$.post('storeorder.php',{
			carts:cartArray,
			note:note,
			total:total

			},function(response){
				localStorage.clear();
				location.href="ordersuccess.php";
			
			});

		});
		


	})//end 
