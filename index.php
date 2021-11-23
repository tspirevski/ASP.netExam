<?php
include("db._connect.php");

$query="SELECT * from brands";

$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result))
{
    echo "<a href=index.php?bid=".$row['bid'].">";
    echo $row['name'];
    echo "</a>";
    echo "<br />";
}

if(!isset($_GET['bid']))
{
    $query="select * from phones order by pid desc limit 0,5";
    
    $result=mysqli_query($conn,$query);

    echo "<table>";
        while($row=mysqli_fetch_array($result))
        {
            echo"<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['price']." Euro</td>";
            echo "<td><a href=details.php?pid=".$row['pid'].">Details</a></td>";
            echo"</tr>";
        }
    echo "</table";
}
else
{
    $bid=$_GET['bid'];
    $query="select * from phones where bid=$bid";

    $result=mysqli_query($conn,$query);

    echo "<table>";
        while($row=mysqli_fetch_array($result))
        {
            echo"<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['price']." Euro</td>";
            echo "<td><a href=details.php?pid=".$row['pid'].">Details</a></td>";
            echo"</tr>";
        }
    echo "</table";
}

?>