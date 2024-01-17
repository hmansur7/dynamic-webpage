<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Create table</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<style>
		
			body {
				<?php 
					$num1 = $_POST['num1'];
					$num2 = $_POST['num2'];
					if (!(($num1 >= 3 && $num1 <= 12) && ($num2 >= 3 && $num2 <= 12))) {
						echo "margin: 0;
							   padding: 0;
							   overflow: hidden;
							   background-image: url(images/nyan.gif);
							   background-size: cover;
							   background-repeat: no-repeat;
							   background-position: center;
							   height: 100vh;";
					}
					else {
						$hour = date('G');

						if ($hour >= 5 && $hour < 12) {
							echo "background-color: #474932;";
						} 
							elseif ($hour >= 12 && $hour < 18) {
							echo "background-color: #2E2822;";
						} 
						elseif ($hour >= 18 && $hour <= 21) {
							echo "background-color: #2C1004;";
						} 
						else {
							echo "background-color: #2D2D29;";
						}
					}
				?>
			}

			.custom-table {
				width: 100%;
				border-collapse: collapse;
				text-align: center;
			}

			.custom-table td, .custom-table th {
				border: 15px solid #3F0D12;
			}

			.custom-table tr:nth-child(even) {
				background-color: #F1F0CC; 
			}

			.custom-table tr:nth-child(odd) {
				background-color: #F1F0CC; 
			}
		</style>
	</head>
	
	<body>
	
		<?php
			function validateInput(){
				$num1 = $_POST['num1'];
				$num2 = $_POST['num2'];

				if (!(($num1 >= 3 && $num1 <= 12) && ($num2 >= 3 && $num2 <= 12))) {
					echo '<div class="alert alert-danger" role="alert">
							<span>ERROR - </span> PLEASE RESUBMIT THE FORM AND CHOOSE NUMBERS THAT ARE BETWEEN 3 AND 12. REDIRECTING IN <span id="timerNum">5</span>S...
							<div class="spinner-border spinner-border-sm text-danger" role="status">
								<span class="visually-hidden">Loading...</span>
							</div>
						</div>';
						


					
					echo '<script>
							var count = 5;
							var timer = setInterval(function() {
								count--;
								document.getElementById("timerNum").innerText = count;
								if (count === 0) {
									clearInterval(timer);
									window.location.href = "lab08.php";
								}
							}, 1000);
						  </script>';	  
					exit();
						  
				}
			}
			
			function makeTable() {
				$num1 = $_POST['num1'];
				$num2 = $_POST['num2'];

				echo '<div class="alert alert-success" role="alert"><h2>SUCCESS - MULTIPLICATION TABLE GENERATED</h1></div>';
				echo '<div class="table-responsive mt-4">';
				echo '<table class="custom-table">';
				for ($i = 1; $i <= $num1; $i++) {
					echo '<tr>';
					for ($j = 1; $j <= $num2; $j++) {
						echo '<td>' . ($i * $j) . '</td>';
					}
					echo '</tr>';
				}
				echo '</table>';
				echo '</div>';
				echo '<button onclick="window.location.href=\'lab08.php\'" type="button" class="btn btn-outline-success btn-large mt-4">Return</button>';
			}
		?>
		
		<div class="container-fluid text-center" style="padding: 20vw">
			<?php validateInput(); makeTable(); ?>
		</div>
		
		
	</body>
</html>