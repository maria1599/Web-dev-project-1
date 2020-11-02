<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Assignment 1 - Post Job Form</title>
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
		
		<form action="postjobprocess.php" method="post">
			<h2>Job Vacancy Post</h2>
			<fieldset>
				 <legend>Job Post</legend>
				<div>
					<label for="id">Position ID: </label>
					<input type="text" name="id" id="id" >
				</div>

				<div>
					<label for="title">Title:</label>
					<input type="text" name="title" >
				</div>

				<div>
					<label>Description:</label>
					<textarea name="description" rows ="8" cols="50" >Type Job Description here...</textarea> 
				</div>

				<div>
					<label>Closing Date:</label>
					<input type="text" name="date" value="<?php echo date("d/m/y"); //echo current date?>" > 
				</div>

				<div>
					<label>Position:</label>

					<input type="radio" name="position" value ="Full-time">
					<label>Full time</label>

					<input type="radio" name="position" value = "Part-time">
					<label>Part Time</label>
				</div>

				<div>
					<label>Contract:</label>

					<input type="radio" name="contract" value="On-going">
					<label>On-going</label>

					<input type="radio" name="contract" value="Fixed term">
					<label>Fixed Term</label>
				</div>

				<div>
					<label>Application by:</label>

					<input type="checkbox" name="application1" value="Post">
					<label>Post</label>

					<input type="checkbox" name="application2" value="Mail">
					<label>Mail</label>
				</div>

				<div>
					<label>Location</label>
					<select name="location">
						<option value="0" selected disabled>---</option>
						<option value="ACT">ACT</option>
						<option value="NSW">NSW</option>
						<option value="NT">NT</option>
						<option value="QLD">QLD</option>
						<option value="SA">SA</option>
						<option value="TAS">TAS</option>
						<option value="VIC">VIC</option>
						<option value="WA">WA</option>
					</select>			
				</div>


				<div>
					<input type="Submit" name="Submit" value="Submit">
					<input type="Reset" name="Reset" value="Reset">
				</div>

			</fieldset>
		</form>

		<p>All fields are required. <a href="index.php">Return to Home Page</a></p>
	</body>
</html>