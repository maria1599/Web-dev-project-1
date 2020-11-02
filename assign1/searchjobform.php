<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Assignment 1 - Search Job Form</title>
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

		<form action="searchjobprocess.php" method="get"> <!-- Form submitted to  searchjobprocess, method get !-->
			<h2>Job Vacancy Search</h2>
			<fieldset>
				<legend>Search Job</legend>
				<div> <!--input for title search!-->
					<label for="title">Job Title:</label>
					<input type="text" name="title">
				</div>


				<div>
					<label>Position:</label> <!--radio button for position type!-->

					<input type="radio" name="position" value ="Full-time">
					<label>Full time</label>

					<input type="radio" name="position" value = "Part-time">
					<label>Part Time</label>
				</div>

				<div>
					<label>Contract:</label> <!--radio button for contract type!-->

					<input type="radio" name="contract" value="On-going">
					<label>On-going</label>

					<input type="radio" name="contract" value="Fixed term">
					<label>Fixed Term</label>
				</div>

				<div>
					<label>Application by:</label> <!--Checkbox for application type!-->

					<input type="checkbox" name="application1" value="Post">
					<label>Post</label>

					<input type="checkbox" name="application2" value="Mail">
					<label>Mail</label>
				</div>

				<div>
					<label>Location</label> <!--select option to location by state!-->
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
					<input type="Submit" name="Search" value="Search">
					<input type="Reset" name="Reset" value="Reset">
				</div>
			</fieldset>
			<a href="showjobs.php">All jobs</a>
		</form>
		
		<a href="index.php">Return to Home Page</a>
	</body>
</html>