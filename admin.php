<?php
 echo "<table style='border: solid 1px blue;'>";
 echo "<tr><th>First Name</th><th>Last Name</th><th>Address 1</th><th>Address 2</th><th>City</th><th>State</th><th>Zip</th><th>Zip Extention</th><th>Country</th><th>Registration Date</th></tr>";
 
 class TableRows extends RecursiveIteratorIterator { 
     function __construct($it) { 
         parent::__construct($it, self::LEAVES_ONLY); 
     }
     function current() {
         return "<td style='width:150px;border:1px solid blue;'>" . parent::current(). "</td>";
     }
     function beginChildren() { 
         echo "<tr>"; 
     } 
     function endChildren() { 
         echo "</tr>" . "\n";
     } 
 } 
 
 $servername = "localhost";
 $username = "id3053654_eddiebishop";
 $password = "smokey12";
 $dbname = "id3053654_hw";
 
 try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT name_first, name_last, address1, address2, city, state, zip_5, zip_suffix, country, reg_date 
	 	   	 				FROM users
							ORDER BY reg_date DESC"); 
     $stmt->execute();
 
     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
         echo $v;
     }
 }
 catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
 }
 $conn = null;
 echo "</table>";
?>