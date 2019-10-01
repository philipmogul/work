<?php
$db = mysqli_connect('localhost','root','','work');
if( $db )
{	


	if( isset($_GET['id']) && isset($_GET['fname']) && isset($_GET['sname']))
	{
		$id = $_GET['id'];
		$fname = $_GET['fname'];
		$sname = $_GET['sname'];
		$sql = mysqli_query($db,"SELECT * FROM work WHERE id = '$id' AND fname = '$fname' AND sname = '$sname'");
	if( mysqli_num_rows($sql) >= 1)
	{
		?>
		<html>
			<head>
				<title>Work</title>
			</head>
			<body>
				<script type="text/javascript" src="work.js"></script>
				<hr/>
				
				<?xml version="1.0" encoding="UTF-8" 
				header("Content-type: text/xml; charset-utf-8"); 
				>

				<?php 
					while($vals = mysqli_fetch_array($sql))
					{
						$id = $vals['id'];
						$fname = $vals['fname'];
						$lname = $vals['lname'];
						$sname = $vals['sname'];
						?>
						<note>
						  <fname><h1>First name: <em><?php echo $fname; ?></em></h1></to>
						  <lname><h1>Last name: <em><?php echo $lname; ?></em></h1></from>
						  <sname><h1>Surname:  <em><?php echo $sname; ?></em></h1></sname>
						</note>
						<?php
					}

				?>

				<hr/>
			</body>
		</html>


		<?php 
	}
	else
	{
		echo "The table is empty!";
	}

	}
	else
	{
		echo "<h1>The id is not set.</h1>";
	}

}
else{ echo "The connection was not successful!"; }

?>