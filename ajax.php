<?php
if(isset($_POST["type"])){
	require_once("functions.php");
	$type = $_POST["type"];
	if($type === 'catgory_by_id'){
		$value = $_POST["value"];
		$articles = get_articles_by("category_id", $value);
		if($value == "0")
			$articles = get_articles_specific("33, 15, 7");
		$result = "";
		foreach($articles as $article){
			$title = $article["title"];
			$ID = $article["ID"];
			$result .= "<li><a href='$ID' title='$title' class='single_article'>$title</a></li>";
		}
		echo $result;
	}else if($type === 'article_by_id'){
		$value = $_POST["value"];
		$articles = get_articles_by("ID", $value);

		$result = "";
		foreach($articles as $article){
			$title = $article["title"];
			$ID = $article["ID"];
			$content = $article["content"];
			$result  = "<h2 id = 'responsePrefix' class=''>$title</h2>";
			$result .= $content;
		}
		$result = nl2br($result);
		echo $result;
	}else if($type === 'search_article'){
		$question = $_POST["value"];
		$result = find_matched_articles($question);
		$result = nl2br($result);
		if(empty($result)){
			$result = "Unfortunately, <br />
							I couldn't answer your question. Please send your 
							enquiry to  support@ultronx.com. Our technical support 
							service will get back to you as soon as possible and help 
							you find the most suitable and accessible solution.";
		}
		echo $result;
	}
	
	
}