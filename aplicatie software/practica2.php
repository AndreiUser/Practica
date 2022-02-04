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

.eroare{
	display:block;
}

</style>
<script type="text/javascript">
function showDiv(select){
   if(select.value==1){
    document.getElementById('hidden_div').style.display = "block";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
} 
</script>


<div class="row">
  <div class="column-menu">
  <div class="menu">
  <form action="practica2.php">
    <input type="submit" value="Profesor" />
</form>
<form action="practica_elev.php">
    <input type="submit" value="Student" />
</form>


<br/><br/>
<td>Adaugare Examen</td>
<br></br>


<form method="post" action="practica2.php">
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
<td>Materie</td>
<br/>
 <select name="materie" id="materie">
  <?php 
  $sql = mysqli_query($conn1, "SELECT * FROM profesori");
  while ($row = $sql->fetch_assoc())
   {
   echo "<option>" . $row['obiect'] . "</option>";
   }
  ?>
 </select>
<br>
 <td>Sala</td>
 <br/>
 <select name="sala1" id="sala1">
  <?php 
   $sql = mysqli_query($conn1, "SELECT * FROM sali");
   while ($row = $sql->fetch_assoc())
   {
    echo "<option>" . $row['sala'] . "</option>";
   }

  ?>
 </select>
<br>

<td>Data</td>
<br/>
 <select name="ziua1" id="ziua1">
  <?php 
  $sql = mysqli_query($conn1, "SELECT * FROM calendar S");
  while ($row = $sql->fetch_assoc())
   {
   echo "<option>" . $row['zi'] . "</option>";
   }
  ?>
 </select>
 <br>
 <td>Examenul incepe la ora</td><br>
 <select name="ora1" id="ora1">
  <?php 
  $sql = mysqli_query($conn1, "SELECT * FROM ore");
  while ($row = $sql->fetch_assoc())
   {
   echo "<option>" . $row['ora'] . "</option>";
   }
  ?>
 </select>
 <br>
 <td>Examenul va dura</td<br>
 <br/>
 <select name="durata1" id="durata1">
  <?php 
  $sql = mysqli_query($conn1, "SELECT * FROM durata");
  while ($row = $sql->fetch_assoc())
   {
   echo "<option>" . $row['valoare'] ." ore" . "</option>";
   }
  ?>
 </select>
 <br>
<br/>
 <input type="submit" value="Submit" name="Submit">
 </div>
</form>
<br/><br/>


<div>
<form method="post" action="practica2.php">
<td>Stergere Examen</td>


 <select name="delete" id="delete">
  <?php 
  $selectie=0;
  $sql = mysqli_query($conn1, "SELECT * FROM examene");
  while ($row = $sql->fetch_assoc())
   {
	
   echo "<option>" .$row['id'].")  grupa ". $row['grupa']." pe ". $row['data'] ." la ora ".$row["ora"] . "</option>";
   
   }
  ?>
 </select>
 
 <input type="submit" value="Sterge" name="Submit1">
 </form>
</div>







<br></br>
 <div>
<form method="post" action="practica2.php">
<td>Afisare</td>


<td>Materie</td>
<br/>
 <select name="materie1" id="materie1">
  <?php 
  $sql = mysqli_query($conn1, "SELECT * FROM profesori");
  while ($row = $sql->fetch_assoc())
   {
   echo "<option>" . $row['obiect'] . "</option>";
   }
  ?>
 </select>
 
 
 <input type="submit" value="Afiseaza" name="Submit2">
 </form>
</div>








<br></br>
</div>
<div class="logo-wrapper">
<img class="logo" src="img/iesc.png"/>
</div>
<?php 

$materie1="PCLP";
$delete=$materie= $grupa = $sala = $ziua= $ora= $durata = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$grupa = $_POST["grupa1"] ?? "";
$sala = $_POST["sala1"] ?? "";
$ziua = $_POST["ziua1"] ?? "";
$ora = $_POST["ora1"] ?? "";
$durata = $_POST["durata1"] ?? "";
$materie= $_POST["materie"] ?? "";
$delete= $_POST["delete"] ?? "";
$materie1=$_POST["materie1"]?? "";
}


if(isset($_POST["Submit1"]) && $delete!=NULL)
	{
	$id=$delete[0].$delete[1].$delete[2];
	$sql_delete="DELETE FROM `examene` WHERE `examene`.`id` =".$id;
	}

$sql_programare="INSERT INTO examene (data,sala,grupa,ora,durata,Profesor)
VALUES ('$ziua','$sala','$grupa','$ora','$durata','$materie')";



$validare_profesor=true;
$validare_unic=true;
$validare_loc=true;
$validare_timp=true;
$validare_grupa=true;
$mesaj="";
$sqlora = mysqli_query($conn1, "SELECT * FROM ore WHERE ora=\"".$ora."\"");
while ($row = $sqlora->fetch_assoc())
	{
		$valoare=$row['valoare'];
	}
$sql = mysqli_query($conn1, "SELECT * FROM examene");
while ($row = $sql->fetch_assoc())
 {
 if($grupa==$row['grupa'])
 if($ziua==$row['data'] and $valoare==$row['ora'] and $materie==$row["Profesor"])
 {
 $validare_timp=false;
 $mesaj="In ziua de ".$ziua." la ora ".$valoare." exista deja examen la ".$materie." pentru grupa ".$grupa;
 break;

 }
 if($grupa==$row['grupa'])
 {
 if($ziua==$row['data'] and $valoare==$row['ora'] and $sala==$row['sala'])
 {
	$validare_loc=false;
	$mesaj=$mesaj."<br>Sala ".$sala." este ocupata in ziua ".$ziua." de la ora de ".$valoare;
	break;
 }
}
 if($ziua==$row['data'] and $valoare==$row['ora'] and $grupa==$row['grupa'])
 {
    $validare_grupa=false;
	$mesaj=$mesaj."<br>Grupa ".$grupa." are deja examen la ora ".$valoare." in data de ".$ziua;
	break;
 }
 if($materie==$row["Profesor"] and $grupa==$row['grupa'])
 {
 	$validare_unic=false;
	$mesaj=$mesaj."<br>Grupa ".$grupa." are deja examen programat la ".$materie;
	break;
 }
 if($ziua==$row['data'] and $valoare==$row['ora'] and $materie==$row["Profesor"])
 {
 	$validare_profesor=false;
	$mesaj=$mesaj."<br>Profesorul de ".$materie." are deja examen programat la ora ".$valoare." in ziua de ".$ziua;
	break;
 }
 }



if(isset($_POST["Submit1"]))
	$conn->exec($sql_delete);




?>

 

  

  <?php//============================================================================================================================================ ?>
  
  <div class="column-calendar">
  <center>
	  <?php
  if(isset($_POST["Submit"]))
	if($validare_grupa==true and $validare_loc==true and $validare_timp==true and $validare_unic and $validare_profesor)
		$conn->exec($sql_programare);
	else
	echo "<p class='eroare'>".$mesaj."<p>";
	?>
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
		
		function readDataForwards($conn,$day,$materie) {
            $sql = 'SELECT grupa,sala,data,ora,durata,Profesor FROM examene WHERE data ='.$day.' AND Profesor ='.'"'.$materie.'"';
            $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT) ;
			if(isset($_POST["Submit2"]))
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
		readDataForwards($conn,1,$materie1);
		?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,2,$materie1);
		
			?>
		</p>
	</td>
  </tr>

  <tr>  
    
    <td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,3,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	
	readDataForwards($conn,4,$materie1);
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,5,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,6,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,7,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,8,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,9,$materie1);
		
			?>
		</p>
	</td>
  </tr>

  <tr>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,10,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,11,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,12,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,13,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,14,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,15,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,16,$materie1);
		
			?>
		</p>
	</td>
  </tr>

  <tr>  
    <td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,17,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,18,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,19,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,20,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,21,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,22,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,23,$materie1);
		
			?>
		</p>
	</td>
  </tr>

  <tr>  
    
    <td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,24,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,25,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,26,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,27,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,28,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,29,$materie1);
		
			?>
		</p>
	</td>
	<td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,30,$materie1);
		
			?>
		</p>
	</td>
  </tr>


  <tr>  
    <td>
		<p class="date"><?php $result = $sth->fetch(PDO::FETCH_COLUMN);print_r($result);?></p>
		<p class="info">
		<?php 
	readDataForwards($conn,31,$materie1);
		
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
 