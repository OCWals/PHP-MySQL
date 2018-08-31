<!DOCTYPE html>
	<html>
	<head>
		<title>Test =+ / +=</title>
	</head>
	<body>
		<p>
			<?php
				$test = "test";
				echo $test . '<br>';
				$test .= " x2";
				echo $test; 
			?>
		</p>
		<p>
			<?php
				$testNull = null;
				echo 'if ($testNull = null) : ';
				if ($testNull) {
					echo '$testNull valide le if.';
				} else {
					echo '$testNull ne valide pas le if.';
				}
			?>
		</p>
	</body>
</html>