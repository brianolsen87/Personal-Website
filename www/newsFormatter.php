<?php
require 'connect.inc.php';
$table = 'news';
$query = "SELECT * FROM ".$table." ORDER BY `Date` DESC LIMIT 0,10";
if($query_run = mysql_query($query)){

	while($query_row = mysql_fetch_assoc($query_run)){
		$main_header=$query_row['Header1'];
		$secondary_header=$query_row['Header2'];
		$body=$query_row['Body'];
		$author=$query_row['Author'];
		$dayOfTheWeek=$query_row['Day'];
		$date=$query_row['Date'];
		$isLink=$query_row['LinkExists'];
		$readMoreLink=$query_row['Link'];
		
		$html_string='<div class="box"><h1>'.$main_header.'<p class="gray float-right">Posted by: '.$author.'</p></h1>';
		$html_string.='<p><strong>'.$secondary_header.'</strong> '.$body.'</p><p class="comments align-right">';
		if($isLink){
			$html_string.='<a href="'.$readMoreLink.'">Read more</a> : ';
		}
		$html_string.=$dayOfTheWeek.' : '.$date.' </p></div>';
		
		echo $html_string;
	}
}else{
	echo "Query failed";
}

?>
      