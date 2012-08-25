<?php
        $test = $_GET['decodedText'];
	echo $test;
	for ($i = 1;$i <= 26; $i++)
	{
          echo " $i";
          echo "<iframe src='/tools/caesorDecrypt.php?decodedText=$test&shift=$i' height='50' width='100%'>";
	  echo "</iframe>";	
}
?>

