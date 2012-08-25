<?php
//Get user input & shift movement
$text=$_GET["decodedText"];
$shift=$_GET["shift"];

#$shiftAlphaNum = array(a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
$shiftAlphaNum = array(a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z);

// build caesor cipher wheel, for use in replace
// note: we use stop, to reset the wheel, and -26 to allow for reversing the
// wheel backwards
$stop1=$shift;
for($i = -26;$i < 26; $i++)
{
	if($stop1>=26)
	{
		$stop1=0;
	}
	$shiftAlphaNum2[$i] = $shiftAlphaNum[($stop1)];
	//echo "num $i = $shiftAlphaNum[$i] = $shiftAlphaNum2[$i]";
	$stop1++;
}

// So long as we have more characters in the input, keep running it through
// Ceasor Cipher "wheel"
$i=0;
while($i<strlen($text)){
	//This puts each character into a condition
	$condition = strtolower(subStr($text,$i,1));
	
	// for each part of the "wheel" check if condition matches
	// when we find a match start building text2
	for($ii = 0;$ii < 26; $ii++){
		if($condition == $shiftAlphaNum[$ii]){
			$text2=$text2 . $shiftAlphaNum2[$ii];		
		}
	}
	// if we couldn't find a character on the "wheel",
	// build text2 with same character as was in text
	if(strlen($text2) < ($i+1))
	{
		$text2 = $text2 . subStr($text,$i,1);
	}
	$i++;
}
// Print out result of cipher
echo "Result=".$text2;

// Once we have result, it is now time to check what words are real, and which
// are false

?>
