var orderCodeString;
var orderCodeArray = [];
orderCodeArray["s"] = [];
orderCodeArray["v"] = [];
var breadType;
var sauceNames = [];
var sandwichType;
var cheeseType;
var veggies = [];
var message;
var orderCode;

var bHold = [];
var sHold = [];
var stHold = [];
var cHold = [];
var vHold = [];

getData();
function getData(){
	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: "/SubPreOrder/controller/read.php"
	}).done(function(response){
		console.log(response);

		var panels0 = "<b>Bread</b><br>"+
		"<p>*choose one</p>";
		panels0 += "<ul data-id='b'>";
		$.each(response.bread_types, function(i,b){
			panels0 += "<li id='b"+ b.id + "' data-id='" + b.id + "' data-value='" + b.bread_type + "'>" + b.bread_type + "</li>";
			bHold.push(b.bread_type);
		})
		panels0 += "</ul>";
		$("#panel0").html(panels0);

		var panels1 = "<b>Sauces</b><br>"+
		"<p>*you can choose many</p>";
		panels1 += "<ul data-id='s'>";
		$.each(response.sauce_names, function(i,s){
			panels1 += "<li id='s"+ s.id + "' data-id='" + s.id + "' data-value='" + s.sauce_name + "'>" + s.sauce_name + "</li>";
			sHold.push(s.sauce_name);
		})
		panels1 += "</ul>";
		$("#panel1").html(panels1);

		var panels2 = "<b>Sandwich Type</b><br>"+
		"<p>*choose one</p>";
		panels2 += "<ul data-id='st'>";
		$.each(response.sandwich_types, function(i,st){
			panels2 += "<li id='st"+ st.id + "' data-id='" + st.id + "' data-value='" + st.sandwich_type + "'>" + st.sandwich_type + "</li>";
			stHold.push(st.sandwich_type);
		})
		panels2 += "</ul>";
		$("#panel2").html(panels2);

		var panels3 = "<b>Cheese</b><br>"+
		"<p>*choose one</p>";
		panels3 += "<ul data-id='c'>";
		$.each(response.cheese_types, function(i,c){
			panels3 += "<li id='c"+ c.id + "' data-id='" + c.id + "' data-value='" + c.cheese_type + "'>" + c.cheese_type + "</li>";
			cHold.push(c.cheese_type);
		})
		panels3 += "</ul>";
		$("#panel3").html(panels3);

		var panels4 = "<b>Veggies</b><br>"+
		"<p>*you can choose many</p>";
		panels4 += "<ul data-id='v'>";
		$.each(response.veggies, function(i,v){
			panels4 += "<li id='v"+ v.id + "' data-id='" + v.id + "' data-value='" + v.veggy + "'>" + v.veggy + "</li>";
			vHold.push(v.veggy);
		})
		panels4 += "</ul>";
		$("#panel4").html(panels4);
	});
}

function insertData(){
	var postData = {
		"uName": $("#uName").val(),
		"eMail": $("#eMail").val(),
		"orderCodeString": orderCodeString,
		"breadType": breadType,
		"sauceNames": sauceNames.toString(),
		"sandwichType": sandwichType,
		"cheeseType": cheeseType,
		"veggies": veggies.toString()
	};

	$.ajax({
		type: "POST",
		data: { "postData": postData },
		url: "/SubPreOrder/controller/insert.php"
	}).done(function(response){
		message = response.message;
		orderCode = response.orderCode;
		$.ajax({
			type: "POST",
			data: { "postData": postData },
			url: "/SubPreOrder/controller/mailer.php"
		}).done(function(response){
			$(".loading").css("display","none");
			$("#confirmOrder .modal-body").html(message + "<br><br> Your order confirmation code: <br>" + orderCode);
			$("#confirmOrder").modal("show");
		}).fail(function(response){
			$(".loading").css("display","none");
			$("#confirmOrder .modal-body").html(message + "<br><br> Your order confirmation code: <br>" + orderCode);
			$("#confirmOrder").modal("show");
		});
	}).fail(function(){
		$(".loading").css("display","none");
		$("#confirmOrder .modal-body").html(message + "<br><br> Your order was not processed. Please try again in a few minutes. Thank you");
		$("#confirmOrder").modal("show");
	});
}

function searchOrder(data){
	$.ajax({
		type: "POST",
		data: { "orderData": data },
		url: "/SubPreOrder/controller/search.php"
	}).done(function(response){
		console.log(response);
		$(".loading").css("display","none");
		if(response.message == "Order found!"){
			$("#myModal #modal-footer1").css("display","none");
			$("#myModal #modal-footer2").css("display","block");
			$("#modal-footer2 .btn-primary").css("display","inline-block");
			$("#modal-footer2 .btn-default").css("display","inline-block");

			var custName = response.customerInfo[0];
			custName = custName.name;

			var custMail = response.customerInfo[0];
			custMail = custMail.email;

			var orderCode;
	    	var dateTime;

	    	var hold = $("#orderCode").val().split("D");

	    	orderCode = hold[0];
	    	dateTime = hold[1].replace("T"," ");

	    	var breadCode = orderCode.substr(orderCode.indexOf("B")+1, 1);
	    	var sauceCode = orderCode.substr(orderCode.indexOf("S")+1, orderCode.indexOf("ST")-3);
	    	var sandwichCode = orderCode.substr(orderCode.indexOf("ST")+2, 1);
	    	var cheeseCode = orderCode.substr(orderCode.indexOf("C")+1, 1);
	    	var veggiesCode = orderCode.substr(orderCode.indexOf("V")+1);

	    	var sauceCodes = sauceCode.split("-");
	    	var veggiesCodes = veggiesCode.split("-");

	    	var body = "<b>Hi " + custName + "! <br>"; 
			body += "Here is your order summary: </b><br><br>";
			body += "<b>Bread: </b>" + bHold[breadCode-1] + "<br><br>";

			if(sauceCodes.length == 1){
				body += "<b>Sauce: </b>" + sHold[sauceCode-1] + "<br>";
			} else {
				body += "<b>Sauces: </b><ul>";
				for(i=0;i<sauceCodes.length;i++){
					body += "<li>" + sHold[i] + "</li>";
				}
				body += "</ul>";
			}
			body += "<br>";

			body += "<b>Sandwich: </b>" + stHold[sandwichCode-1] + "<br><br>";
			body += "<b>Cheese: </b>" + cHold[cheeseCode-1] +"<br><br>";

			if(veggiesCodes.length == 1){
				body += "<b>Veggy: </b>" + vHold[veggiesCode-1] + "<br>";
			} else {
				body += "<b>Veggies: </b><ul>";
				for(i=0;i<veggiesCodes.length;i++){
					body += "<li>" + vHold[i] + "</li>";
				}
				body += "</ul>";
			}
			body += "An email was sent to " + custMail + " for this order.";

			$("#fetchedCode").val($("#orderCode").val());
			$("#myModal .modal-body").html(body);
			$("#myModal").modal("show");
			$("#orderCode").val("");
		} else {
			$("#modal-footer1").css("display","none");
			$("#modal-footer2 .btn-primary").css("display","none");
			$("#modal-footer2 .btn-default").css("display","inline-block");
			
			$("#myModal .modal-body").html(response.message);
			$("#myModal").modal("show");
			$("#orderCode").val("");
		}
	});
}

function deleteData(data){
	$.ajax({
		type: "POST",
		data: { "orderData": data },
		url: "/SubPreOrder/controller/delete.php"
	}).done(function(response){
		console.log(response);
		$(".loading").css("display","none");
		$("#confirmOrder .modal-body").html("Order is cancelled!");
		$("#confirmOrder").modal("show");
	});
}

function verify(){
	$(".reqd").css("border-bottom","2px solid #000000");
	if($("#uName").val() == ""){
		$("[data-toggle='tooltip']").tooltip("show");
		$("#uName").css("border-bottom","2px solid #B22222"); return false;
	} else {
		if($("#eMail").val() == ""){
			$("[data-toggle='tooltip']").tooltip("show");
			$("#eMail").css("border-bottom","2px solid #B22222"); return false;
		} else {
			if(typeof breadType == 'undefined'){
				$("#emptyChecker0").modal("show");
				return false;
			} else if(sauceNames.length == 0){
				$("#emptyChecker1").modal("show");
				return false;
			} else if(typeof sandwichType == 'undefined'){
				$("#emptyChecker2").modal("show");
			} else if(typeof cheeseType == 'undefined'){
				$("#emptyChecker3").modal("show");
			} else if(veggies.length == 0){
				$("#emptyChecker4").modal("show");
			}else {
				return true;
			}
		}
	}
}