<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname="iesc";

try 
{
  $conn = new PDO("mysql:host=$servername;dbname=iesc", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e)
 {
  echo "Connection failed: " . $e->getMessage();
 }

 $conn1 = new mysqli($servername, $username, $password,"iesc");


?>

<!DOCTYPE html>
<html>
<body>
<style>

body {
	background-color: #e9eefc
}

.column-menu {
  padding: 50px;
  float:right;
  flex:1;
  background-color: 
}

.column-calendar {
  float: left;
  flex: 1;
  flex-grow: 6;
}

.row {
	display: flex;
}
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #4169E1;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
	background-color: #f3f3ff;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #d3dcf8;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #4169E1;
}
.date {
	font-size: small;
	font-weight: bold;
	position: relative; 
	padding-top: 5px;
	margin-top: 0px;
	text-align:left;
}

.logo {
	display: block;
	width: 45%;
	margin-left: auto;
	margin-right: auto;
}

</style>



<div class="row">
  <div class="column-menu">
  <div class="menu">
  <form action="practica2.php">
    <input type="submit" value="Profesor" />
</form>
<form action="practica_elev.php">
    <input type="submit" value="Student" />
</form>
    

<form method="post" action="practica_elev.php">
<td>Grupa</td>
<br/>
 <select name="grupa1" id="grupa1">
  <?php 
  $sql = mysqli_query($conn1, "SELECT * FROM grupe");
  while ($row = $sql->fetch_assoc())
   {
   echo "<option>" . $row['grupa'] . "</option>";
   }
  ?>
 </select>

<br>

 <br>
<br/>
 <input type="submit" value="Submit" name="Submit">
 </div>
</form>
<br/><br/>




<br></br>
</div>
<div class="logo-wrapper">
<img class="logo" src="img/iesc.png"/>
</div>
<?php 


$grupa= "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$grupa = $_POST["grupa1"] ?? "";

}




?>

 

  

  <?php//============================================================================================================================================ ?>
  
  <div class="column-calendar">
  <center>
  <table class="styled-table">
  <thead>
  <tr>
	<td align="center" colspan="7"><b>Ianuarie 2022</b></td>
  </tr>
 
  <tr> 
    <th>Luni</th>
    <th>Marti</th>
    <th>Miercuri</th>
    <th>Joi</th>
    <th>Vineri</th>
    <th>Sambata</th>
    <th>Duminica</th>
  </tr>
  </thead>
  <tbody>
   <tr>  
    
    <td>
		<p class="date"><?php $sth = $conn->prepare("SELECT zi FROM calendar");$sth->execute();$result = $sth->fetchColumn();print($result);?></p>
		<p class="info">
		
		
		   
		</p>
    </td>
    <td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		   
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		   
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		   
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
		function readDataForwards($conn,$day,$grupa) {
            $sql = 'SELECT grupa,sala,data,ora,durata,Profesor FROM examene WHERE data ='.$day.' AND grupa ='.'"'.$grupa.'"';
            $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT) ;

            while (gettype($row) != "boolean") {
             {
				print ("Grupa ".$row[0]."<br>");
                print ("La ".$row[5]."<br>");
                print ("Sala:".$row[1]."<br>");
                print ("Intre orele:".$row[3]."-".($row[3]+$row[4]));
				print ("<br><br>");
                $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
            }}
        }
		readDataForwards($conn,1,$grupa);
		?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,2,$grupa);
		
			?>
		</p>
	</td>
  </tr>

  <tr>  
    
    <td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,3,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	
	readDataForwards($conn,4,$grupa);
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,5,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,6,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,7,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,8,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,9,$grupa);
		
			?>
		</p>
	</td>
  </tr>

  <tr>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,10,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,11,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,12,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,13,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,14,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,15,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,16,$grupa);
		
			?>
		</p>
	</td>
  </tr>

  <tr>  
    <td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,17,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,18,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,19,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,20,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,21,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,22,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,23,$grupa);
		
			?>
		</p>
	</td>
  </tr>

  <tr>  
    
    <td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,24,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,25,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,26,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,27,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,28,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,29,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,30,$grupa);
		
			?>
		</p>
	</td>
  </tr>


  <tr>  
    <td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,31,$grupa);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	
		
			?>
		</p>
	</td>
  </tr>
	</tbody>

  
  </table>
</center>



  </div>
</div>
<?php
mysqli_close($conn1);
?>




</body>
</html>
 