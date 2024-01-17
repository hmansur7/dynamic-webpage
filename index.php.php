<?php
	session_start();
	
	function incCount() {
		$cookie = 'hitCounter';

		
		if (!isset($_COOKIE[$cookie])) {
			
			setcookie($cookie, 1, time() + 365 * 24 * 60 * 60); 
			$hitCount = 1;
		} 
		else {
			$hitCount = $_COOKIE[$cookie] + 1;
			setcookie($cookie, $hitCount, time() + 365 * 24 * 60 * 60); 
		}

		return $hitCount;
	}

	$hitCount = incCount();
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Simple dynamic webpage</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<style>
		
			.welcome-text {
				background: rgba(255,255,255,0.1);
				backdrop-filter:blur(10px);
				color:white;
				box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.5);
				border-radius: 50px;
				padding: 5vw;
				font-family: Verdana, sans-serif;
			}
			
			.fixed-button {
				position: fixed;
				bottom: 10px;
				right: 20px;
				z-index: 1000; 
			}
			
			.fixed-image {
				position: fixed;
				top: 10px;
				right: 10px;
				opacity: 0.8;
			}
		</style>
	</head>
	
	<body>
	
		<?php 
			function setGreetingMessage () {
				$hour = date('G');
				
				if ($hour >= 5 && $hour < 12) {
					return "GOOD MORNING";
				} 
				elseif ($hour >= 12 && $hour < 18) {
					return "GOOD AFTERNOON";
				} 
				elseif ($hour >= 18 && $hour <= 21) {
					return "GOOD EVENING";
				} 
				else {
					return "GOOD NIGHT";
				}
			}
			
			function setBackgroundImage() {
				$hour = date('G');
				
				if ($hour >= 5 && $hour < 12) {
					return "images/Good Morning.jpeg";
				} 
				elseif ($hour >= 12 && $hour < 18) {
					return "images/Good Afternoon.jpg";
				} 
				elseif ($hour >= 18 && $hour <= 21) {
					return "images/Good Evening.jpg";
				} 
				else {
					return "images/Good Night.png";
				}
			}
			
			function setTheme() {
				$hour = date('G');
				
				if ($hour >= 5 && $hour < 12) {
					return "#474932";
				} 
				elseif ($hour >= 12 && $hour < 18) {
					return "#2E2822";
				} 
				elseif ($hour >= 18 && $hour <= 21) {
					return "#2C1004";
				} 
				else {
					return "#2D2D29";
				}
			}
			
			function setImageText() {
				if (isset($_GET['image'])) {
					$imageName = $_GET['image'];
					return $imageName;
				}
				else {
					return 'No image selected';
				}
			}

			function displayImage()
			{
				global $setImage;

				if (isset($_GET['image'])) {
					$imageName = $_GET['image'];

					echo '<div id="imageContainer" style="position: fixed; top: 0; right: 0; max-width: 10vw;">';
					echo '<img src="./images/' . $imageName . '" class="img-fluid">';
					echo '</div>';
					$setImage = $imageName;
				}
			}
			
			$setGreeting = setGreetingMessage();
			$setBackground = setBackgroundImage();
			$setTheme = setTheme();
			$setImg = setImageText();
			
		?>
		
		<div class="container-fluid text-center" style="background-image: url('<?php echo $setBackground; ?>'); background-size: cover; background-repeat: no-repeat; padding: 20vw;">
			<h1 class="welcome-text"><?php echo $setGreeting; ?></h1>
		</div>
		
		<div class="container-fluid" style="padding: 10vw; background-color: <?php echo $setTheme; ?>;">
			<h2 class="text-white">Create a multiplication table</h2>
			<form class="form-row" action="lab08b.php" method="post">
				<div class="form-group mt-4">
					<label for="num1" class="text-white">Number 1</label>
					<input type="text" class="form-control" name="num1" id="num1" placeholder="Enter Number (between 3 and 12)" maxlength="2" required>
				</div>
				<div class="form-group mt-4">
					<label for="num2" class="text-white">Number 2</label>
					<input type="text" class="form-control" name="num2" id="num2" placeholder="Enter Number (between 3 and 12)" maxlength="2" required>
				</div>
				<div class="form-group mt-4">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<div class="form-group mt-4">
					<div class="alert alert-info" role="alert">
						Form submission will redirect to new page
					</div>
				</div>
			</form>	
			<h2 class="text-white">Click a button for special halloween image</h2>
				<div class="btn-group mt-4" role="group" aria-label="Basic mixed styles example">
				  <button onclick="window.location.href='https://www.cs.torontomu.ca/~hmansur/lab08/lab08.php?image=ghost3.gif'" type="button" class="btn btn-primary btn-sm">ghost3.gif</button>
				  <button onclick="window.location.href='https://www.cs.torontomu.ca/~hmansur/lab08/lab08.php?image=ghoul.gif'" type="button" class="btn btn-primary btn-sm">ghoul.gif</button>
				  <button onclick="window.location.href='https://www.cs.torontomu.ca/~hmansur/lab08/lab08.php?image=witch4.gif'" type="button" class="btn btn-primary btn-sm">witch3.gif</button>
				  <button onclick="window.location.href='lab08.php'" type="button" class="btn btn-primary btn-sm">Normal</button>
				</div>
			<div class="form-group mt-4">
					<div class="alert alert-info" role="alert">
						You can also type the link into the address bar with your chosen image query 
						i.e. page_URL?image=image_file.
						Current Image: <span><?php echo $setImg; ?></span>.
					</div>
			</div>
		</div>
		
		<div class="fixed-button">
			<button type="button" class="btn btn-info text-white">
				Visits
				<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
					<?php echo $hitCount; ?> 
				<span class="visually-hidden">unread messages</span>
				</span>
			</button>
		</div>
		
		<?php displayImage() ?>
		
	</body>
</html>