<?php
include_once("config.php");
include_once("php_includes/db_conx.php");

function get_categories($category_id=0)
{
		global $db_conx;
		
		$result=array();
		
		if($category_id==0)
			$sql = "SELECT * FROM `categories`";
		else
			$sql = "SELECT * FROM `categories`  WHERE categories.ID=$category_id";
		
		//echo $sql;
		$query = mysqli_query($db_conx, $sql);
		if (!$query) 
		{
			echo "DB Error, could not query the database\n";
			echo 'MySQL Error: ' . mysqli_error($db_conx);
			exit;
		}
		while ($row = mysqli_fetch_assoc($query)) 
		{
			$result[]=$row;
		}
			   
		return $result;
}
function get_articles_by($field, $value)
{
		global $db_conx;
		
		$result=array();
		
		$sql = "SELECT * FROM `data`  WHERE $field='$value'";
		
		$query = mysqli_query($db_conx, $sql);
		if (!$query) 
		{
			echo "DB Error, could not query the database\n";
			echo 'MySQL Error: ' . mysqli_error($db_conx);
			exit;
		}
		while ($row = mysqli_fetch_assoc($query)) 
		{
			$result[]=$row;
		}
			   
		return $result;
}
function get_articles($order = 'rand()', $limit=10)
{
		global $db_conx;
		
		$result=array();
		
		$sql = "SELECT * FROM `data` order by $order";
		
		$query = mysqli_query($db_conx, $sql);
		if (!$query) 
		{
			echo "DB Error, could not query the database\n";
			echo 'MySQL Error: ' . mysqli_error($db_conx);
			exit;
		}
		while ($row = mysqli_fetch_assoc($query)) 
		{
			$result[]=$row;
		}
			   
		return $result;
}
function get_articles_specific($list_id)
{
		global $db_conx;
		
		$result=array();
		
		$sql = "SELECT * FROM `data` WHERE ID in($list_id)";
		
		$query = mysqli_query($db_conx, $sql);
		if (!$query) 
		{
			echo "DB Error, could not query the database\n";
			echo 'MySQL Error: ' . mysqli_error($db_conx);
			exit;
		}
		while ($row = mysqli_fetch_assoc($query)) 
		{
			$result[]=$row;
		}
			   
		return $result;
}
function find_matched_articles($question){
	require_once("algo.php");
	$article = get_articles('rand()', 1000000);
	$result = "";
	$algo = new CosineSimilarity_ContentBased();
	$data = array();
	$list_question = array();
	foreach($article as $elem){
		$list_question[$elem["ID"]] = $elem["title"];
		$data[$elem["ID"]] = $elem;
	}
	//print_r($list_question);
	$cosin_result = $algo->get_cosineSimilarity_inner($question, $list_question);
	arsort($cosin_result);
	//print_r($cosin_result);
	foreach($cosin_result as $k=>$v){
		$title 	 = $data[$k]["title"];
		$content = $data[$k]["content"];
		
		$result .= "<h2 id = 'responsePrefix' class='' data-articleid='$k'>$title</h2>";
		$result .= $content."<br />";	
	}
	//$result = "";
	return $result;
}