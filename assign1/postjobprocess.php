<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Assignment 1 - Post Job Process</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Assignment 1" />
		<meta name="keywords" content="PHP" />
		<meta name="author" content="Maria Serrano"/>
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
		<header>
			<h1>Job Vacancy Posting System</h1>
		</header>
		<nav> <!-- Navigation bar that include links to home, postjobform, searchjobform and about page !-->
			<a href="index.php">Home</a>
			<a href="jobpostform.php" class="current">Post a Job Vacancy</a>
			<a href="searchjobform.php">Search for a Job Vacancy</a>
			<a href="about.php">About</a>
		</nav>
		<main>
			<h2>Job Vacancy Search</h2>
			<?php

				$error = 0;  //variable for error messages

				if(isset($_POST["id"]) && !empty($_POST["id"])){ //isset id post and checks if not empty
					$id = $_POST["id"];  //initialise position id
					$idlength = strlen($id);
					
					if ($idlength != 5) {  //if id is not equal to 5, error message, error =1
						echo "<p>position id should be valid. ID should be 5 strings in length</p>";
						$error = 1;
						 
					} elseif (!preg_match("/^[P]\d{4}$/", $id)) { //if it doesnt match pattern, error message, error =1
						echo "<p>position id should be valid. ID should start with P followed by 4 unique numbers</p>";
						$error = 1;
					}

				} else { //if left empty, error message,  error =1
					
					echo "Please fill in position id";
					$error = 1;
				}



				if (isset($_POST["title"]) && !empty($_POST["title"])) { //isset title post and checks if not empty
					
					$title = $_POST["title"];
					$titlelen = strlen($title);

					if ($titlelen > 20) { //if more than 20 strings, error message, error =1
						echo "<p> Title should be between 1 and 20 in string length";
						$error = 1;
						# code...
					} elseif (!preg_match("/^[a-zA-Z0-9,.! ]*$/", $title)) { //if it doesnt match pattern, error message
						echo "<p> Title must only be alphanumeric characters";
						$error = 1;
					}

				} else { //if empty, error message  : error =1

					echo "<p>Please fill in title </p>";
					$error = 1;

				}


				if (isset($_POST["description"]) && !empty($_POST["description"])) { //isset description post and checks if not empty
					$description = $_POST["description"];
					$descriptionclength = strlen($description);

					if ($descriptionclength > 260) { //if more than 260 characters, error message error =1
						echo "<p>Description should be no more than 260 characters</p>";
						$error = 1;
					}
				
				} else { //if empty error message =1
					echo "<p>Please write a description</p>";
					$error = 1;
				}

				if (isset($_POST["date"]) && !empty($_POST["date"])) //isset date post and checks if not empty
				{					
					$date =  $_POST["date"];  
					 if (!preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{2}$/", $date)) { //if date does not match pattern, error message, error =1
					 	echo "<p>Please write a valid date in a format dd/mm/yy </p>";
					 	$error = 1;
					 	# code...
					 }

				} else { //if empty error message, error =1
					echo "Please write a date";
					$error = 1;
				}
				

				if (isset($_POST["position"]) && !empty($_POST["position"])) { //isset position post and checks if not empty
						
						$position = $_POST["position"]; 
				} else {
						echo "<p>Please select a postion</p>";
						$error = 1;	
				}

				if ( isset($_POST["contract"]) && !empty($_POST["contract"])) { //isset contract post and checks if not empty
						
					$contract = $_POST["contract"];
				}else {
					echo "<p>Please select a contract</p>";
					$error = 1;
				}

				if ((isset($_POST["application1"]) && !empty($_POST["application1"])) || (isset($_POST["application2"]) && !empty($_POST["application2"]))) { //isset application post and checks if not empty

					if (empty($_POST["application1"])) { //if application1 is empty set application1 to  " ", if not set application by post
						$application1 = " ";
					} else {
						$application1 = $_POST["application1"];
					}

					if (empty($_POST["application2"])) { //if application2 is empty set application to  " ", if not set application by post
						$application2 = " ";
					} else {
						$application2 = $_POST["application2"];
					}
					
											
				} else { 									//if false error message
					echo "<p>Please select an application type</p>";
					$error = 1;
					
				}

				if (isset($_POST["location"]) && !empty($_POST["location"])) { ////isset location post and checks if not empty
						$location = $_POST["location"];
				} else {														//if location is not true, error message, error =1
						echo "<p>Please select location</p>";
						$error = 1;
						
				}

				//Write and save into file 

				if ($error == 0) { //when error is == 0, this means that there are no errors and all inputs are validated, when its validated it will write ito file

					$filename = "../../data/jobposts/jobs.txt"; //Gets file path.
					$dir = "../../data/jobposts"; //Gets directory path.

					if(!(file_exists($dir))) //if file directory dosent exist it creates the directory with permissions to access.
					{
						umask(0007);
						mkdir($dir, 02770);
					}

					if (file_exists($filename)) { //if file exists read file

						$iDdata = array();
						$handle = fopen($filename, "r");

						while (!feof($handle)) {
							$onedata = fgets($handle);

							if ($onedata !="") {

								$data = explode("\t",  $onedata);
								$iDdata[] = $data[0]; 
								
							}
							
						} fclose($handle);
							$newdata = (!(in_array($id, $iDdata)));

					} else {
						$newdata = true;
					}

					if ($newdata) { //save to file

						$handle = fopen($filename, "a");
						$data = $id . "\t" .  $title . "\t" . $description . "\t" . $date . "\t" . $position . "\t" . $contract . "\t" .  $application1 . "\t" .  $application2 . "\t" . $location . "\n"; 

						fputs($handle, $data);
						fclose($handle);

						echo "<p>You have successfully posted your job post form</p>";
						echo "<p> Return home? <a href=\"index.php\"> Home</a></p>";

						# code...
					} else {
						echo "<p>Position ID already exists. Please try again</p>";
						echo "<p>Return <a href=\"index.php\"> Home</a> or go back to: <a href=\"jobpostform.php\"> Job Post Form Page</a></p>";
					}				
				} else {
					
					echo "<p>Return <a href=\"index.php\"> Home</a> or go back to: <a href=\"jobpostform.php\"> Job Post Form Page</a></p>";
				}




			
			?>

		</main>
		<a href="index.php">Return to Home Page</a>
	</body>
</html>