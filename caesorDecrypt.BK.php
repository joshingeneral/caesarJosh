<?php
$text=$_GET["decodedText"];
$shift=$_GET["shift"];
echo "$text";
echo "$shift";

#need to figure out the logic to get a shift here
#abcdefghijklmnopqrstuvwxyz1234567890
#1234567890abcdefghijklmnopqrstuvwxyz
# 10 shift

#$shiftAlphaNum = array(a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
$shiftAlphaNum = array(a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z);

//TODO: Change 46 to shiftAlphaNum.LENGTH + areatext.LENGTH

// This lets us know how many charcters we need to shift through
$stop=(count($shiftAlphaNum));

//TODO: Remove
echo "shift $shift";
echo "stop $stop";

// used to keep our placement in the character list
// place moves around the array and repeats
$place=$shift;
#$place2=0;

// need another FOR loop to go through entire textarea
for($i=0;$i<$stop;$i++)
#echo "<br>Array is big:".count($shiftAlphaNum);
{

#check to see if we have passed the end;
echo "<br>$i.  ";
echo $shiftAlphaNum[$i];
echo " is ";
echo $shiftAlphaNum[$place]; 

#Do replace
for($ii=0;$ii<strlen($text);$ii++)
{
	if($shiftAlphaNum[$i] == substr($text, $ii,1))
	{
		$text2[$ii]=$shiftAlphaNum[$place];
	}
}
/*
$i=0;
do 
{
	echo $text2[$i];
} while($i<strlen($text))
*/

$text = str_replace($shiftAlphaNum[$i],$shiftAlphaNum[$place],$text);
echo $text;

$place++;
// reset
if($place>=$stop)
{
	$place=0;
}

}

?>
