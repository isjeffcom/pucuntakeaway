/*
    
	Easy Shopping Cart 
    Create By WU JIANFENG
    Co-op with Beau Wethrell, Cameron Auden, Liam White
	from 15/02/2016 to 22/03/2016
	for University of Portsmouth
	
*/



//jQuery Function
(function($){

	/*Interface Explanation
		 *names: All item in cart array (no '[]')
		 *cartAll: All item in cart array (with '[]')
		 *pprice: All price array (no '[]')
		 *priceAll: All price array (with '[]')
		 *TPrice: Total price (calculate all price)
		 *qty: Item quantity array (no '[]')
		 *mqtyAll: Item quantity array (with '[]')
		 *mQty: User input quantity for THIS (current select) item (only use in add function)
		 *names.length: get number > how many item in cart
	*/

    //DOM ready for all
	$(document).ready(function(){
	
		//Statement Ready
		var qty = [];
		var price = [];
		var names = [];
		var pprice =[];
		var singlePrice=[];
		var storeid=[];
	
		var mpriceAll= localStorage.getItem('mPrice');
		var mqtyAll= localStorage.getItem('mQty')
		var cartAll = localStorage.getItem('name');
        var priceAll = localStorage.getItem('price');
		var timeAll = localStorage.getItem('time');
		var singlePriceAll = localStorage.getItem('singlePrice');
		var storeIDAll = localStorage.getItem('storeid');
        
		var userName = localStorage.getItem('user-name');
		var userNumber = localStorage.getItem('user-number');
		var userEmail =  localStorage.getItem('user-email') ;
		var userCountry = localStorage.getItem('user-country')
		var userAddress= localStorage.getItem('user-address');
		var userBankcard= localStorage.getItem('user-bankcard');
		var userSecurity= localStorage.getItem('User-security');
		
        var totalPrice = 0;
		var TPrice = 0;
		var times= 0;
		var tpprice;
		
		var btnNum;
		var btnRealNum;
		var removeBtn;
		var bottonValue;
		

		 
		//Get value from localStorage. 
		if (cartAll != null) {
			//Count Products Number
			names = JSON.parse(cartAll);
			price=JSON.parse(mpriceAll);
			pprice = JSON.parse(priceAll);
			qty = JSON.parse(mqtyAll);
			times = JSON.parse(timeAll);
			singlePrices=JSON.parse(singlePriceAll);
			storeid = JSON.parse(storeIDAll);
		}
        //Add2Cart function
		
		$(".add").click(function(){
		
		        
				//DOM the name and price from the HTML
				var mName = $(this).parent().children('.name').html();
				var mPrice = $(this).parent().children('.price').html();
				var mQty = $(this).parent().children('.qty').val();
				var mstoreStatus = $('.storestatus').html();
				var mstoreID = $('.storeID').html();
				// Change type of data to integer forcibly
				mQty = parseInt(mQty);  
				
				//Check if store close
				if(mstoreStatus == '0'){
						alert('店铺已经歇业，您依旧可以预定下单，但卖家可能无法即时确认');
					}
				
				//Check if items repeat
				if(cartAll != null){
					for(var i=0; i<names.length;i++){
						if(mName == names[i]){
							alert('重复了，如果需要更改数量，请删除后重新添加');
							return;
						}
					}
					
					if(names.length >= 5){
						alert("最多一次只能加入5个菜品");
						return;
					}
					
					//check StoreID repeat
					if(mstoreID != storeid[0]){
						alert('请先完成上个店铺的点单');
						return;
					}

				}
				
				//Calculate the price with quantity
				if(mQty >= 1 &&  mQty <= 20){

					var mPriceCal = mPrice * mQty;
					mPriceCal = parseFloat(mPriceCal).toFixed(2);  //Fix the calculate issue.
					
							
				}else{
							
					//verity input number
					alert("每件产品的数量只能在1-20之间");
					return;
					//do nothing...
					
				};
				
				//Add item to HTML localStorage 
								
				qty.push(mQty);
				localStorage.setItem ('mQty', JSON.stringify(qty));
				
				price.push(mPriceCal);
				localStorage.setItem ('mPrice', JSON.stringify(price));
				
				names.push(mName);
				localStorage.setItem ('name', JSON.stringify(names));
									
				pprice.push(mPriceCal);
				localStorage.setItem ('price', JSON.stringify(pprice));
				
				singlePrice.push(mPrice);
				localStorage.setItem ('singlePrice', JSON.stringify(singlePrice));
				
				storeid.push(mstoreID);
				localStorage.setItem('storeid',JSON.stringify(storeid));

				//Alert to costumer
				alert("成功添加 " + mName + " 到购物车 " + "数量： " + mQty + " 价钱: " + mPriceCal);
				
				$(".cartItem").html("已加入:  " + names);
				
				//Calculate Total price 
				tpprice = pprice;

				for(var i = times; i < tpprice.length; i++){
					totalPrice += parseFloat(tpprice[i]);
					TPrice = totalPrice.toFixed(2);
				}	
				times++;
				localStorage.setItem('time', JSON.stringify(times));
				
				//Display Total Price
				$(".totalPrice").html("</br>" + " £ " + TPrice + "</br>");
						
				if(names !== null){
				   
					//Button create function
					//Clear exist button
					$(".removeBtn").remove();
					
					//Create child
					for(btnNum = 0; btnNum < names.length ; btnNum++){
							btnRealNum = btnNum + 1;	//Display real item number
							removeBtn = document.createElement('button');    //Create Button
							removeBtn.className = "removeBtn";  //Add className
							bottonValue = document.createTextNode('[删除]第 ' + btnRealNum + '个');  //Give Button Value
							btnCreate = document.body.appendChild(removeBtn);  	
							removeBtn.appendChild(bottonValue);
							$(".rbtn").before(btnCreate, "  ");
							}

				}else{
					
						//do nothing

				}
				

		});
		
		//Display Cart Function
		$(function(){
		
		    //Cal Total price Secound fix  

			if(names[0] !== undefined){

	            tpprice = pprice;
	
				for(var i = 0; i < tpprice.length; i++){
					totalPrice += parseFloat(tpprice[i]);
					TPrice = totalPrice.toFixed(2);
					}	
			}else{
				
				//if No item...
				TPrice = 0;
		    }
			
			//Display Cart 2Front
	        
			if(names != null){
			
				$(".cartItem").html("已加入:  " + names);
				
				$(".totalPrice").html("</br>" + " £ " + TPrice + "</br>");

			}
		
			//Enable Remove Button
			$('.updateCart').click(function(){
			
				location.reload(true);
			
			});
			
			//Clear Cart

			
			$(".clearCart").click(function(){
				
				alert("已清空购物车");
				localStorage.clear();
				location.reload(true);
				
			});
			
			
			//Create Remove Button
			if(names !== null){
				   
					//Button create function
					$(".removeBtn").remove();
					
					for(btnNum = 0; btnNum < names.length ; btnNum++){
							btnRealNum = btnNum + 1;	//Display real item number
							removeBtn = document.createElement('button');    //Create Button
							removeBtn.className = "removeBtn";  //Add className
							bottonValue = document.createTextNode('删除第 ' + btnRealNum + '个');  //Give Button Value
							btnCreate = document.body.appendChild(removeBtn);  	
							removeBtn.appendChild(bottonValue);
							$(".rbtn").before(btnCreate, "  ");
							}

				}else{
					
						//do nothing

				}

			//remove item function

			$(".removeBtn").click(function(){
			    
				//Restore array number from button
			    var thisNum = $(this).html();
				thisNum = thisNum.slice(-1) -1;
				
				//Display which item has been remove
				alert("移除成功");
				
				//Delete element from array
				names.splice(thisNum,1);
				pprice.splice(thisNum,1);
				price.splice(thisNum,1);
				qty.splice(thisNum,1);
				
				//Update localStorage after Delete
				localStorage.setItem ('price', JSON.stringify(pprice));
				localStorage.setItem ('mPrice', JSON.stringify(price));
				localStorage.setItem ('mQty', JSON.stringify(qty));
				localStorage.setItem ('name', JSON.stringify(names));
				
				times = times-1;
				localStorage.setItem('time', JSON.stringify(times));
				
				//Update Page
				location.reload(true);
			});
			
		
		

			//Connect to back-end for submit order
			if(cartAll != null){
				
				//Set order
				var pp_Name_1 = names[0];
				var pp_Qty_1 = qty[0];
				var pp_Amount_1 = pprice[0];
				var pp_storeid_1 = storeid[0];
				
				
				var pp_Name_2 = names[1];
				var pp_Qty_2 = qty[1];
				var pp_Amount_2 = pprice[1];
				var pp_storeid_2 = storeid[1];
				
				var pp_Name_3 = names[2];
				var pp_Qty_3 = qty[2];
				var pp_Amount_3 = pprice[2];
				var pp_storeid_3 = storeid[2];
				
				var pp_Name_4 = names[3];
				var pp_Qty_4 = qty[3];
				var pp_Amount_4 = pprice[3];
				var pp_storeid_4 = storeid[3];
				
				var pp_Name_5 = names[4];
				var pp_Qty_5 = qty[4];
				var pp_Amount_5 = pprice[4];
				var pp_storeid_5 = storeid[4];
				var pp_tprice = TPrice;
				
	
				//Push order form to back-end
				$("#ppQty_1").val(pp_Qty_1);
				$("#ppName_1").val(pp_Name_1);
				$("#ppAmount_1").val(pp_Amount_1);
				$("#ppstoreid_1").val(pp_storeid_1);
				
				$("#ppQty_2").val(pp_Qty_2);
				$("#ppName_2").val(pp_Name_2);
				$("#ppAmount_2").val(pp_Amount_2);
				$("#ppstoreid_2").val(pp_storeid_2);
				
				$("#ppQty_3").val(pp_Qty_3);
				$("#ppName_3").val(pp_Name_3);
				$("#ppAmount_3").val(pp_Amount_3);
				$("#ppstoreid_3").val(pp_storeid_3);
				
				$("#ppQty_4").val(pp_Qty_4);
				$("#ppName_4").val(pp_Name_4);
				$("#ppAmount_4").val(pp_Amount_4);
				$("#ppstoreid_4").val(pp_storeid_4);
	
				$("#ppQty_5").val(pp_Qty_5);
				$("#ppName_5").val(pp_Name_5);
				$("#ppAmount_5").val(pp_Amount_5);
				$("#ppstoreid_5").val(pp_storeid_5);
				

				
	
				$('#allAmount').val(pp_tprice);
				
				//Display
				for(i = 0; i<names.length;i++ ){
					$("div.order"+i).html("<table><tr><th>菜品</th><th>数量</th><th>价格</th></tr>" + "<tr><td>" + names[i] + "</td><td>" + qty[i] + "</td><td>" + pprice[i] + "</td></tr><table>");
				}
				/*$("div.order1").html("<table><tr><th>菜品</th><th>数量</th><th>价格</th></tr>" + "<tr><td>" + pp_Name_1 + "</td><td>" + pp_Qty_1 + "</td><td>" + pp_Amount_1 + "</td></tr><table>");
				$("div.order2").html("<table><tr><th>菜品</th><th>数量</th><th>价格</th></tr>" + "<tr><td>" + pp_Name_2 + "</td><td>" + pp_Qty_2 + "</td><td>" + pp_Amount_2 + "</td></tr><table>");
				$("div.order3").html("<table><tr><th>菜品</th><th>数量</th><th>价格</th></tr>" + "<tr><td>" + pp_Name_3 + "</td><td>" + pp_Qty_3 + "</td><td>" + pp_Amount_3 + "</td></tr><table>");
				$("div.order4").html("<table><tr><th>菜品</th><th>数量</th><th>价格</th></tr>" + "<tr><td>" + pp_Name_4 + "</td><td>" + pp_Qty_4 + "</td><td>" + pp_Amount_4 + "</td></tr><table>");
				$("div.order5").html("<table><tr><th>菜品</th><th>数量</th><th>价格</th></tr>" + "<tr><td>" + pp_Name_5 + "</td><td>" + pp_Qty_5 + "</td><td>" + pp_Amount_5 + "</td></tr><table>");*/
				$(".itstoreid_1").html(pp_storeid_1);
				
				$('.itallAmount').html(pp_tprice);
				
			}
		});
		/*User Information Function
		$(".cardpayBtn").click(function(){
		
	
			mCName = $('.CName').val();
			mCNumber = $('.CNumber').val();
			mCEmail = $('.CEmail').val();
			mCCountry = $('.CCountry').val();
			mCAddress = $('.CAddress').val();
			mCBank = $('.CBankCard').val();
			mCsecurity = $('.Csecurity').val();
			
			
			if(mCName == "" || mCNumber == "" || mCEmail == "" || mCCountry == "" || mCAddress == ""){
				alert("You need to input your infomation");
			} else {
				localStorage.setItem('user-name', JSON.stringify(mCName));
				localStorage.setItem('user-number', JSON.stringify(mCNumber));
				localStorage.setItem('user-email', JSON.stringify(mCEmail));
				localStorage.setItem('user-country', JSON.stringify(mCCountry));
				localStorage.setItem('user-address', JSON.stringify(mCAddress));
				localStorage.setItem('user-bankcard', JSON.stringify(mCBank));
				localStorage.setItem('User-security', JSON.stringify(mCsecurity));
				window.open("final.html");
			}
			

				
		});
		

		//Display User Information
		$("#DUN").html(userName);
		$("#DUNB").html(userNumber);
		$("#DUE").html(userEmail);
		$("#DUC").html(userCountry);
		$("#DUA").html(userAddress);
		$("#DUBC").html(userBankcard);
		$("#DUSN").html("***");*/

		

		
		$(".cartItem").html("已加入:  " + names + "</br>");
		$(".totalPrice").html("</br>" + TPrice + " £ " + "</br>");
		
		$(".homepage").click(function(){
			
			history.go(-1);
			
		});
		
		//Check if localStorage oException
		try {
		    localStorage.setItem(key, value);
		}catch(oException){
			if(oException.name == 'QuotaExceededError'){
				console.log("!!!Exceed Maximum Storage Limit!!!");
				localStorage.clear();
			}
		}
		
	});

})(jQuery);