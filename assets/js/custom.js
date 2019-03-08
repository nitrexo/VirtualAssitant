(function() {

	$("#entry").on("input", function(event){
		var text= $(this).val();
		console.log("here=>"+text.length);
		$("#remaining_char").show();
		var ramin = (255 - text.length);
		$("#remaining_char").html("<small>"+ramin+" characters remaining</small>");
	})
	$("#category").on("change", function(event){
		var category_id= $(this).val();
		var category_text= $("#category option:selected").text();
		$("#faq_cetgory").html(category_text);
		$("#breadcrumb").show();
		$(this).hide();
		
		$.ajax({
		  type: "POST",
		  url: "ajax.php",
		  data: "type=catgory_by_id&value="+category_id,
		  success: function(msg){
				//alert( "Data Saved: " + msg );
				$("#cat_data").html(msg)
		  },
		  error: function(XMLHttpRequest, textStatus, errorThrown) {
			 alert("some error contacting server");
		  }
		});		
	})	
	$("#cat_data").on("click", ".single_article", function(event){
		event.preventDefault();
		var article_id= $(this).attr("href");
		//alert("Article ID: "+article_id);
		$.ajax({
		  type: "POST",
		  url: "ajax.php",
		  data: "type=article_by_id&value="+article_id,
		  success: function(msg){
				//alert( "Data Saved: " + msg );				
				console.log($("#responsePrefix").css("display"));
				//$("#responseContainer").html(msg);
				$("#response").html(msg);
				$("#responsePrefix").show();
		  },
		  error: function(XMLHttpRequest, textStatus, errorThrown) {
			 alert("some error contacting server");
		  }
		});	/**/	
	})
	$("#ask").on("click", function(event){
		event.preventDefault();
		
		var question = $("#entry").val();
		if(question == ""){
			alert("Please Type a question");
			return;
		}
		$("#disclaimer").click();
		$("#requestPrefix").html("You:");
			
		//alert("new questions: "+question);
		$("#youSaid").show();
		//$("#responsePrefix").show();
		$("#request").html(question);
		setTimeout(function(){
			$.ajax({
			  type: "POST",
			  url: "ajax.php",
			  data: "type=search_article&value="+question,
			  success: function(msg){
					//alert( "Data Saved: " + msg );				
						console.log($("#responsePrefix").css("display"));
						$("#responsePrefix").html("Assistant:");						
						$("#response").html(msg);
						$("#responsePrefix").show();
						console.log($("#responsePrefix").css("display"));
						
			  },
			  error: function(XMLHttpRequest, textStatus, errorThrown) {
				 alert("some error contacting server");
			  }
			});			
				/*$("#response").html("Reply from sako")
				$("#responsePrefix").show();		
				*/
		}, 2000);
		
	});
	$("#disclaimer").on("click", function(event){
		event.preventDefault();	
		//alert("clear");
		$("#response").html("");
		$("#request").html("");
		$("#requestPrefix").html("");
		$("#responsePrefix").html("");		
		
	
	});
	$("#root").on("click", function(event){
		event.preventDefault();	
		var category_id= 0;
		var category_text= $("#category option:selected").text();
		$("#faq_cetgory").html(category_text);
		$("#breadcrumb").hide();
		$("#category").show();
		
		$.ajax({
		  type: "POST",
		  url: "ajax.php",
		  data: "type=catgory_by_id&value="+category_id,
		  success: function(msg){
				$("#cat_data").html(msg)
		  },
		  error: function(XMLHttpRequest, textStatus, errorThrown) {
			 alert("some error contacting server");
		  }
		});		
	})		
	
})();	
function openAssistant(){
	window.open("assistant.php", "ULTRONX – Digital Assistant", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=480,height=450");
}