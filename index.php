<?php include "convert.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cryptography</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="fontawesome_web/css/all.min.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post">
				<span class="contact100-form-title">
					Cryptography Caesar Chiper
				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Plain Text</span>
					<textarea class="input100" name="plantext_caesar" placeholder="Your plain text here..."></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Your Key</span>
					<input class="input100" type="text" name="key_caesar" placeholder="Enter your key">
					<span class="focus-input100"></span>
				</div>
				<div class="container-contact100-form-btn">
				<p class="submit">
						<input type="submit" value="Encrypt" name="encrypt_caesar" />
					</p>
								<br>
					<p class="submit">
						<input type="submit" value="Decrypt" name="decrypt_caesar" />
					</p>
				</div>

	

			</form>
			<form method="post">
				<?php
	//----------------------------------------------------------------//
	// caesar														  //
	//----------------------------------------------------------------//
		if((isset($_POST['key_caesar'])) && (isset($_POST['plantext_caesar'])) && isset($_POST['encrypt_caesar'])){
			$key=$_POST['key_caesar'];
			$plantext=$_POST['plantext_caesar'];
			$split_key=str_split($key);
			$i=0;
			$split_chr=str_split($plantext);
			while ($key>52){
				$key=$key-52;
			}
			foreach($split_chr as $chr){
				if (char_to_dec($chr)!=null){
					$split_nmbr[$i]=char_to_dec($chr);
				} else {
					$split_nmbr[$i]=$chr;
				}
				$i++;
			}
			echo '<div class="wrap-input100 validate-input">';
			echo '<span class="label-input100">Chiper Text';
			echo '<textarea class="input100" name="result" id="result" placeholder="Your chiper text here..." onclick="SelectAll(\'result\')">';
			foreach($split_nmbr as $nmbr){
				if (($nmbr+$key)>52){
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char(($nmbr+$key)-52);
					} else {
						echo $nmbr;
					}
				} else {
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char($nmbr+$key);
					} else {
						echo $nmbr;
					}
				}
			}
			echo '</textarea>';
			echo '</span>';
			echo '</div>';
		} else if ((isset($_POST['key_caesar'])) && (isset($_POST['plantext_caesar'])) && isset($_POST['decrypt_caesar'])){
			$key=$_POST['key_caesar'];
			$plantext=$_POST['plantext_caesar'];
			$i=0;
			$split_chr=str_split($plantext);
			while ($key>52){
				$key=$key-52;
			}
			foreach($split_chr as $chr){
				if (char_to_dec($chr)!=null){
					$split_nmbr[$i]=char_to_dec($chr);
				} else {
					$split_nmbr[$i]=$chr;
				}
				$i++;
			}
			echo '<div class="wrap-input100 validate-input">';
			echo '<span class="label-input100">Chiper Text';
			echo '<textarea class="input100" name="result" id="result" placeholder="Your chiper text here..." onclick="SelectAll(\'result\')">';
			foreach($split_nmbr as $nmbr){
				if (($nmbr-$key)<1){
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char(($nmbr-$key)+52);
					} else {
						echo $nmbr;
					}
				} else {
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char($nmbr-$key);
					} else {
						echo $nmbr;
					}
				}
			}
			echo '</textarea>';
			echo '</span>';
			echo '</div>';

		} 
	?>
	
				<!-- end section footer --> 
				    <footer>
				      <div class="bg-light" >
				        <p><marquee>&copy; Copyright kelompok-1 2021 </marquee>
				         
				        </p>
				      </div>
				    </footer>
				    <!-- end section footer -->
		
				<!-- <div class="container-contact100-form-btn">
				
					<p class="submit">
						<input type="submit" value="Send" name="send_crypt" />
					</p>
					<?php
					// Check If form submitted, insert form data into users table.
					if(isset($_POST['send_crypt'])) {
						$encrypted = $_POST['result'];
						// include database connection file
						include_once("config.php");
								
						// Insert user data into table
						$result = mysqli_query($mysqli, "INSERT INTO kripto(id, hasil) VALUES('','$encrypted')");
						
						// Show message when user added
						echo '<script language="javascript">alert("Sent");
								document.location="index.php";</script>';
					}
					?>
				</form>
				</div> -->
		</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>


					


<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>



</body>
</html>
