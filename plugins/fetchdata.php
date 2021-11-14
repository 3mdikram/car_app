<?php
include('config.php');
$sqlfetchsig = "SELECT * FROM utables";
$resultalls = mysqli_query($conn, $sqlfetchsig);
if (mysqli_num_rows($resultalls) > 0){
echo "<table id='example1' class='table table-bordered table-striped'>";
    echo "<thead>";
        echo "<tr>";
            echo " <th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Designation</th>";
            echo "<th>Salary</th>";
            echo "<th >Date</th>";
        echo " </tr>";
    echo "</thead>";
    echo "<tbody>";
        while ($ushorow = mysqli_fetch_array($resultalls)) {?>
        <tr>
            <td><?php echo $ushorow['umane'];?></td>
            <td><?php echo $ushorow['ueamil'];?></td>
            <td><?php echo $ushorow['udesign'];?></td>
            <td><?php echo $ushorow['usalary'];?></td>
            <td><?php echo date('l jS F Y g:i A',strtotime($ushorow['dates']));?></td>
        </tr>
        <?php }
    echo "</tbody>";
echo "</table>";
}else{
echo "<h2 class='text-center' id='headinstyle'>Email subscribers are not avaliable</h2>";
}?>