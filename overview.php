<!DOCTYPE html>
<html>
<head>
<title>Part 1</title>
<link rel="stylesheet" type="text/css" href="movie.css">

<meta charset="utf-8" />
</head>
<?php
include 'functions.php';

$movie = "princessbride";
// }
$fileName = "./" . $movie . "/info.txt";
$imageFileName = $movie . "/overview.png";
$overviewTextFileName = $movie . "/overview.txt";

$fh1 = fopen ( $fileName, 'r' );
$fh = fopen ( $overviewTextFileName, 'r' );
$movieName = fgets ( $fh1 );
$movieYear = fgets ( $fh1 );
$movieScore = fgets ( $fh1 );

// Print all folders in this folder
//$folders = glob ( './*', GLOB_ONLYDIR );
// print_r($folders);

$files = scandir ( './' . $movie );

// print_r ( $files );
if ($movie === "bawangbieji")
	$totalreviews = count ( $files ) - 6;
else
	$totalreviews = count ( $files ) - 5;
?>
<body>

	<div id="toppart">

		<img src="images/rancidbanner.png" alt="Rancid Tomatoes">
	</div>
	<div>
		<h1 align="center"><?php
		
		echo strtoupper ( $movieName ) . "( " . strtoupper ( $movieYear ) . ")"?>

		 </h1>

		<div id="list">
			<form action="http://localhost/CS337Project4/overview.php" method="post">
				<fieldset>
					<input type="radio" value="mortalkombat" name="aa" />Mortal Kombat
					<input type="radio" value="princessbride" name="aa" />The Princess
					Bride <input type="radio" value="tmnt" name="aa" />TMNT <br> <input
						type="radio" value="bawangbieji" name="aa" />Ba Wang Bie Ji <input
						type="radio" value="tmnt2" name="aa" />Teenage Mutant Ninja
					TurtlesII <input type="submit" value="get the overview">
				</fieldset>
			</form>

		</div>
	<?php
	
	if (empty ( $_POST ["aa"] ))
		$movie = "princessbride";
	else {
		$movie = $_POST ["aa"];
	}
	$fileName = "./" . $movie . "/info.txt";
	$imageFileName = $movie . "/overview.png";
	$overviewTextFileName = $movie . "/overview.txt";
	
	$fh1 = fopen ( $fileName, 'r' );
	$fh = fopen ( $overviewTextFileName, 'r' );
	$movieName = fgets ( $fh1 );
	$movieYear = fgets ( $fh1 );
	$movieScore = fgets ( $fh1 );
	$files = scandir ( './' . $movie );
	if ($movie === "bawangbieji")
		$totalreviews = count ( $files ) - 6;
	else
		$totalreviews = count ( $files ) - 5;
	?>
	<?php
		$lines = count ( file ( $overviewTextFileName ) );
		$count1 = 0;
	?>
		
	</div>
	<div id="container">
		<div id="rightpart">
			<div id = "rightimage">
				<img src="<?= $imageFileName ?>" alt="Overview image">
			</div>
			<div id="righttext">
				<dl>
				<?php
				for($i = 0; $i < $lines; $i ++) {
					$theData = fgets ( $fh );
					$arr = explode ( ":", trim ( $theData ) );
					?> 
			<dt> 
				<?php print $arr [0]. ": ";?> 
			</dt>
					<dd>
						<?php print $arr [1];?> 
					</dd>
						<?php } ?>
			</dl>
			</div>
		</div>

		<div id="leftpart">
			<div id=lefthead>
				<?php
				if ($movieScore <= 60) {
					?> 
				<img class="rottenIcon" src="images/rottenlarge.png" alt="Rotten" /> <?php
				}
				if ($movieScore > 60) {
					?>
					<img class="rottenIcon" src="images/freshlarge.png" alt="Rotten"
					height="83.5" width="80" />
				
				<?php
				}
				echo $movieScore . "%"?>
					
			</div>

			<div id="column1">
			
			<?php
			for($k = 2; $k <= $totalreviews; $k = $k + 2) {
				?> <div class="review"> <?php
				echo oneReview ( "./$movie/review" . $k . ".txt" )?> </div>
			<?php
			}
			?>		
			</div>

			<div id="column2">
			<?php
			for($k = 1; $k <= $totalreviews; $k = $k + 2) {
				?> <div class="review"> <?php
				echo oneReview ( "./$movie/review" . $k . ".txt" )?></div>
			<?php  }	?>	
			
			</div>

		</div>
		<div id="bottompart">
			<p class="padding">(1- <?php echo $totalreviews.") of ".$totalreviews  ?> </p>
		</div>
	</div>

</body>
</html>













