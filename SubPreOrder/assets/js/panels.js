$(document).ready(function(){
	
	$(".panels").on("click", "ul li", function(){
		/*console.log($(this).data('id'));
		console.log($(this).closest('ul').data('id'));*/
		switch($(this).closest("ul").data("id")){
			case 'b':
				$("#panel0 ul li").css("background-color", "white");
				$(this).css("background-color", "grey");
				orderCodeArray["b"] = "B" + $(this).data("id");
				breadType = $(this).data("value");
				break;
			case 's':
				var index = $.inArray($(this).data("id"),orderCodeArray["s"]);
				if(index != -1){
					$(this).css("background-color", "white");
					orderCodeArray["s"].splice(orderCodeArray["s"].indexOf($(this).data("id")),1);
					sauceNames.splice(sauceNames.indexOf($(this).data("value")),1);
				} else {
					$(this).css("background-color", "grey");
					orderCodeArray["s"].push($(this).data("id"));
					var index = $.inArray("Nah",sauceNames);
					if(index != -1){
						sauceNames[index] = $(this).data("value");
					} else {
						sauceNames.push($(this).data("value"));
					}
				}
				orderCodeArray["s"].sort();
				break;
			case 'st':
				$("#panel2 ul li").css("background-color", "white");
				$(this).css("background-color", "grey");
				orderCodeArray["st"] = "ST" + $(this).data("id");
				sandwichType = $(this).data("value");
				break;
			case 'c':
				$("#panel3 ul li").css("background-color", "white");
				$(this).css("background-color", "grey");
				orderCodeArray["c"] = "C" + $(this).data("id");
				cheeseType = $(this).data("value");
				break;
			case 'v':
				var index = $.inArray($(this).data("id"),orderCodeArray["v"]);
				if(index != -1){
					$(this).css("background-color", "white");
					veggies.splice(veggies.indexOf($(this).data("value")),1);
					orderCodeArray["v"].splice(orderCodeArray["v"].indexOf($(this).data("id")),1);
				} else {
					$(this).css("background-color", "grey");
					orderCodeArray["v"].push($(this).data("id"));
					var index = $.inArray("Nah",veggies);
					if(index != -1){
						veggies[index] = $(this).data("value");
					} else {
						veggies.push($(this).data("value"));
					}
				}
				orderCodeArray["v"].sort();
				break;
		}

		orderCodeString = orderCodeArray["b"];
		orderCodeString += "S";
		for(var s=0;s<orderCodeArray["s"].length;s++){
			if(s != orderCodeArray["s"].length -1){
				orderCodeString += orderCodeArray["s"][s] + "-";
			} else {
				orderCodeString += orderCodeArray["s"][s];
			}
		}
		orderCodeString += orderCodeArray["st"];
		orderCodeString += orderCodeArray["c"];
		orderCodeString += "V";
		for(var v=0;v<orderCodeArray["v"].length;v++){
			if(v != orderCodeArray["v"].length -1){
				orderCodeString += orderCodeArray["v"][v] + "-";
			} else {
				orderCodeString += orderCodeArray["v"][v];
			}
		}
	});

	$("#submit").on("click", function(){

		if(!verify()){ return false; }

		$("#myModal #modal-footer1").css("display","block");
		$("#myModal #modal-footer2").css("display","none");

		var body = "<b>Hi " + $("#uName").val() + "! <br>"; 
		body += "Here is your order summary: </b><br><br>";
		body += "<b>Bread: </b>" + breadType + "<br><br>";

		if(sauceNames.length == 1){
			body += "<b>Sauce: </b>" + sauceNames + "<br>";
		} else {
			body += "<b>Sauces: </b><ul>";
			for(i=0;i<sauceNames.length;i++){
				body += "<li>" + sauceNames[i] + "</li>";
			}
			body += "</ul>";
		}
		body += "<br>";

		body += "<b>Sandwich: </b>" + sandwichType + "<br><br>";
		body += "<b>Cheese: </b>" + cheeseType +"<br><br>";

		if(veggies.length == 1){
			body += "<b>Veggy: </b>" + veggies + "<br>";
		} else {
			body += "<b>Veggies: </b><ul>";
			for(i=0;i<veggies.length;i++){
				body += "<li>" + veggies[i] + "</li>";
			}
			body += "</ul>";
		}
		body += "Click Proceed button to place order. An email will be sent to " + $("#eMail").val() + " to confirm your order.";

		
		$("#myModal .modal-body").html(body);
		$("#myModal").modal("show");
	});

    $("#modal-footer1 .btn-primary").on("click",function(){
    	$(".loading").css("display","block");
    	$("#myModal").modal("hide");
    	insertData();
    });
    $("#modal-footer2 .btn-primary").on("click",function(){
    	$("#myModal").modal("hide");
    	$("#confirmDelete").modal("show");
    });

    $("#confirmDelete .btn-primary").on("click",function(){
    	$("#confirmDelete").modal("hide");
    	$(".loading").css("display","block");

    	var orderCode;
    	var dateTime;

    	var hold = $("#fetchedCode").val().split("D");

    	orderCode = hold[0];
    	dateTime = hold[1].replace("T"," ");

    	var data = {
    		"orderCode": orderCode,
    		"dateTime": dateTime
    	};

    	deleteData(data);
    });

    $("#confirmDelete .btn-default").on("click",function(){
    	$("#myModal").modal("show");
    	$("#confirmDelete").modal("hide");
    });

    $("#emptyChecker1 .btn-primary").on("click",function(){
    	sauceNames.push("Nah");
    });

    $("#emptyChecker3 .btn-primary").on("click",function(){
    	cheeseType = "Nah";
    });

    $("#emptyChecker4 .btn-primary").on("click",function(){
    	veggies.push("Nah");
    });

    $("#confirmOrder .btn-default").on("click",function(){
    	$(".panels ul li").css("background-color", "white");
    	$("#uName").val("");
    	$("#eMail").val("");
    	orderCodeString = "";
		orderCodeArray = [];
		orderCodeArray["s"] = [];
		orderCodeArray["v"] = [];
		breadType = "";
		sauceNames = [];
		sandwichType = "";
		cheeseType = "";
		veggies = [];
		message = "";
		orderCode = "";
    });

    $("#findOrder .btn-primary").on("click",function(){
    	$("#modal-footer1").css("display","none");
    	if($("#orderCode").val() != ""){

	    	$("#findOrder").modal("hide");
	    	$(".loading").css("display","block");

	    	var orderCode;
	    	var dateTime;

	    	var hold = $("#orderCode").val().split("D");

	    	orderCode = hold[0];
	    	dateTime = hold[1].replace("T"," ");

	    	var data = {
	    		"orderCode": orderCode,
	    		"dateTime": dateTime
	    	};

	    	searchOrder(data);
	    }
    });

});