<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Assignment 1 - Search Job Process</title>
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
			<a href="jobpostform.php">Post a Job Vacancy</a>
			<a href="searchjobform.php" class="current">Search for a Job Vacancy</a>
			<a href="about.php">About</a>
		</nav>
		<main>
			<?php
			umask(0007);
			$error = 0; //error message 

			//set to empty
			$jobposition = "";
			$jobcontract = "";
			$application1 = "";
			$application2 = "";
			$joblocation = "";

			if (isset($_GET["title"]) && !empty($_GET["title"])){ //isset title input and if not empty
				$jobTitle = stripslashes($_GET["title"]);
			
			} else { //if false, error message
				echo "<p>Please enter a title input before searching</p>";
				$error = 1; 
			}


			if(isset($_GET["position"]) && !empty($_GET["position"])) { //isset position input and if not empty
				$jobposition = $_GET["position"];
			} 

			if(isset($_GET["contract"]) && !empty($_GET["contract"])) { //isset contract input and if not empty
				$jobcontract = $_GET["contract"];
			} 
			if (isset($_GET["application1"]) && !empty($_GET["application1"])) { //isset application 1 (value = post) input and if not empty
 
					$application1 = $_GET["application1"];
				
			}

			if (isset($_GET["application2"]) && !empty($_GET["application2"])) { //isset application 2 (value = mail)input and if not empty
				$application2 = $_GET["application2"];
			}

			if(isset($_GET["location"]) && !empty($_GET["location"])) { //isset location input and if not empty
				$joblocation = $_GET["location"];

				
			} 


			if ($error == 0) { //when error is == 0, this means that there are no errors and all inputs are validated, when its validated it will write ito file

				$filename = "../../data/jobposts/jobs.txt"; //Gets file path.
				$dir = "../../data/jobposts"; //Gets directory path.

				$dateData = array();

				if (file_exists($filename)) { //checks if file exists
					
					$handle = fopen($filename, "r");

					echo "<h3>Job Vacancy Information</h3>";

					$found = false;

					while (!feof($handle)) { //if not end of file
						$onedata = fgets($handle);

						if ($onedata !="") {

							$data = explode("\t",  $onedata);

							if (strpos(strtolower($data[1]), strtolower($jobTitle)) !== false) { //checks if title matches title data array

								$date= date("d/m/y"); //variable for today's date

								if ($data[3] >= $date) { //checks if closing date haven't expired
									if ($jobposition == "" || $data[4] === $jobposition) {

								    	if ($jobcontract == "" || $data[5] === $jobcontract) { //checks application for 
								    		
								    		if ($application1 == "" || $data[6] === $application1 && $application2 == "" || $data[7] === $application2) { //checks application by post

								    			if ($application2 == "" || $data[7] === $application2 ) { //checks application by mail

								    				if ($joblocation == "" ||  preg_replace("@\n@","",$data[8]) === $joblocation) { //checks location

														$found = true; //if search is found, it will return search results

														echo "<strong>Job Title: </strong>". $data[1] ."</br>";
												        echo "<strong>Description: </strong>". $data[2] ."</br>";
												        echo "<strong>Closing Date: </strong>". $data[3] ."</br>";
												        echo "<strong>Position: </strong>". $data[4] . " - ".$data[5]. "</br>";
												        echo "<strong>Application by: </strong>". $data[6] . "-- ".$data[7]."</br>";
												        echo "<strong>Location: </strong>". $data[8] ."</br>";

												        echo "<hr>";

												        $dateData[] = $data;
												        array_push($dateData, $data);
												        
		
								    				}
			    		
								    			}
								    			
								    		}
								    		
								    	}

									}

								}

							    
							} 

						}

					} fclose($handle); // close file
					usort($dateData, "date_compare");
					



					if($found == false){  //if the string search is not found, an error message + link to  home page & search job vacancy
						echo "<p>Oh no! Search failed! criteria not found Please try again</p>";
						echo "<p>Return <a href=\"index.php\"> Home Page</a> or go back to: <a href=\"searchjobform.php\">Search Job Vacancy</a></p>";
					} else {
						echo "<p>Return <a href=\"index.php\"> Home Page</a> or go back to: <a href=\"searchjobform.php\">Search for another Job Vacancy</a></p>";
					}
				}
			} else { //if file does not exist; error message
				
				echo "<p>Return <a href=\"index.php\"> Home</a> or go back to: <a href=\"searchjobform.php\">  Search Job Vacancy Page</a></p>";
			}

			function date_compare($a, $b) { //function that compares date if true
			   	$date1 =strtotime($a[3]); 
				$date2 =strtotime($b[3]);
				 return $date1 - $date2; 
		
			}


		?>
	
		</main>
	</body>
</html>
