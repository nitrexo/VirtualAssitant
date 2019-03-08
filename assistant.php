<?php
require_once("functions.php");
?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo TITLE; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/screen.css">
	<link rel="stylesheet" href="assets/css/jquery-ui-1.8.custom.css">
	<link rel="stylesheet" href="assets/css/ics.css">
	<link rel="stylesheet" href="assets/css/print1.css">

</head>

<body class = "medium">

	<form name="form_vperson" action="" method="post">

<div id="page" class="init">

	<div id="main">

        
		<div id = "avatar">
    		<img id="imageAvatar" src="images/logo_new.png" alt= "<?php echo TITLE; ?>" width="174" height="75"/>
    	</div>
           
        <div id = "responseContainer" class = "resizable">
            <div id = 'youSaid'>
				<h2 id = "requestPrefix" class = "">You:</h2>
				<div id="request" class = "replace">
					<!-- to be filled by the XML question element -->
				</div>
            </div>

			<h2 id = "responsePrefix" class="">Assistant:</h2>
			<div id="response" class = "replace">
				Hello. My name is Ultronx, your Digital Assitant. I’m here to answer your questions. How can I help you?
            </div>	
			
					
        </div><!-- end responseContainer -->            
           
        <div id = "requestContainer">
        	<h1>Type a question</h1>
        	<textarea id ="entry" name="entry" cols="" rows="2" title = "Please type your question here" placeholder = "Please type your question here" class="inp-txt" maxlength="255"></textarea>
            <span style="color:red; display:none;" id="remaining_char">255 remaining</span>  <button id = "ask" class="myButton2" name="ask" type="image" >Ask</button>
        </div><!-- end requestContainer --> 
               
		<div id="faqContainer" >   
			<div id="faqHeader">
				<h1>Or choose a question</h1>
                <div class="csHideForSR">This is a breadcrumb trail for related Frequently Asked Questions.</div>
				<div id="breadcrumb" class ="replace">
					<!-- to be filled by the XML breadcrumb element -->
					<a href="#" id="root">FAQ</a> &gt; <a href="javascript:void(0)" id="faq_cetgory"></a> 
				</div><!-- end div breadcrumb -->
			
				<div id="dropdown" class = "replace">
					<select id="category">
						<option value="0">choose a category...</option>
						<?php
						$categories = get_categories();
						foreach($categories as $category){
						?>
							<option value="<?php echo $category["ID"]; ?>"><?php echo $category["name"]; ?></option>
						<?php
						}
						?>
					</select>
				</div>          	
			</div>
			<div id="faqs" class = "replace resizable">
				<ul class="va-faq-ul" id="cat_data">
					<?php
						$articles = get_articles_specific("33, 15, 7");
						foreach($articles as $article){
							$title = $article["title"];
							$ID = $article["ID"];
					?>	
							<li><a href="<?php echo $ID; ?>" title="<?php echo $title; ?>" class="single_article"><?php echo $title; ?></a></li>
					<?php
						}
					?>							
				</ul>
			</div><!-- end faqs -->
            
    	</div><!-- end faqContainer -->   
         
		<div id = 'disclaimer' style="text-align:right"><button class="myButton2">Clear</button></div>  
	</div><!-- end main --> 

	<div id = "header" style="display:none"> 
    
    	<a id = "logo" title = "U logo"><img src = 'images/logo.png' alt = "Ultronx logo" width="275" height="31"/></a>
                             
		<div id="tools">  
          	<!--a id = 'print' href = '#' title = 'Print your conversation' onClick = "overlay.show($va.ident, 'print'); return false;">View Conversation</a-->  
				<a href=""><img src="images/facebook.png" width="32" height="32"/></a> 
				<a href="http://linkedin.com/company/nitrexo-ltd"><img src="images/linkedin.png" width="32" height="32"/></a> 
				<a href="https://twitter.com/Nitrexo_Ltd?lang=en"><img src="images/twitter.png" width="32" height="32"/></a> 
				<a href="#"><img src="images/youtube.png" width="38" height="38"/></a> 
				<a href="mailto:support@nitrexo.com">support@nitrexo.com</a>
        </div>                      
                   
    </div><!-- end header -->
    
 
</div><!-- end page -->

</form>



	<div class="ics"></div>

	
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/custom.js"></script>




	
	
</body>

</html>
