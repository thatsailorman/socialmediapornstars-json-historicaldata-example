<?php
// Example usage for historical data pornstar twitter followers count.
// More info: https://socialmediapornstars.com/historicaldata-pornstar-twitter-followers-count.php

//We've used this code in our blog post about pornstar with 1 million Twitter followers.
//We wanted to automatically generate a list of pornstars with over 1 million fans on Twitter...
//End result, see blog post: https://socialmediapornstars.com/blog-pornstars-with-over-1-million-fans-on-twitter.html


//First things first, let's set the month and year we want to use the data from:
$month = 'february';
$year = '2020';

//Get the Json data and file and decode it as an array
$getjsonfile = "https://socialmediapornstars.com/historicaldata/$year-$month.json";
$data = file_get_contents($getjsonfile);
$array = json_decode($data);

foreach($array as $stats){

$pornstar = "$stats->pornstar";
$username = "$stats->username";
$followers = "$stats->followers";

//Twitter stores followers count above 1000 followers as 1K and followers count above a million as 1M.
//In our blog post we wanted to show the letter M as the word million instead.
//So we've used str_replace in this example to change M to million.
$replaceM = str_replace("M"," million","$followers");

//Now search the Json data for the letter M (which stands for a million)
$needle = 'M';

//If followers count contains the letter M (million) echo the pornstar name with username and the total followers count
if (strpos($followers,$needle) !== false) {
echo "<b><a href='https://twitter.com/$username' target='_blank'>$pornstar</a></b> has <b>$replaceM</b> fans on Twitter<br>";
}
}

//So far an example on how to use our collection historical data in Json format.
?>