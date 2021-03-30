 <?php
$servername = "localhost";
$username = "n01274584";
$database = "n01274584_a";
$password="oracle"; 
define('newline',"<br>\n");
// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully". newline;
$sql1="insert into lab5 values('n01342434','An Nguyen',
		'205 Humber Blvd',542333245,'Ink',14)";
echo "<br>SQL generated: $sql1" . "<br>\n";

if (mysqli_query($conn, $sql1)) {
    echo "Record created";
    echo newline;

} else {
    echo "Failure to create record " . mysqli_error($conn);
    echo newline;

}
$sql="select userid, fullname, son, unum from lab5";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Inventory On Hand</h1>" . newline; 
    echo "<table border=1>" . newline;
    $headings="<tr><th>CustomerID</th><th>Customer</th><th>Lipstick Brand</th><th>Number of items</th></tr>";
    echo $headings . "\n"; 
    // output data of each row from the result set
    while($row = mysqli_fetch_assoc($result))
    {
       $productInfo=sprintf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%.0lf</td></tr>\n",
               $row["userid"], $row["fullname"], $row["son"] ,$row["unum"],newline);
       echo $productInfo; 
    }
    echo "<table>" . newline;
} else {
    echo "No rows retreived";
}


echo newline;
mysqli_close($conn);
?> 