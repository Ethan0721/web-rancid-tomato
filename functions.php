

<?php
function oneReview($filename) {
	$reviewFile = fopen ( "$filename", "r" );
	$arr = file ( "$filename" );
	$result = '';
	$personresult = '';
	?>
<p class="box">

<?php
	if (rtrim ( $arr [1] ) === "FRESH")
		$result = '<img src="images/fresh.gif" alt="Fresh" class="icon" /> <q>';
	if (rtrim ( $arr [1] ) === "ROTTEN")
		$result = '<img src="images/rotten.gif" alt="Rotten" class="icon" /><q>';
	
	echo $result . fgets ( $reviewFile ) . '</q>';
	
	
	
	?>

<p class="person">
<?php
	$personresult = '<img class="icon" src="images/critic.gif" alt="Critic" />';
	echo $personresult;
	echo $arr [2] . '</br>';
	echo $arr [3] ;
}

?>
