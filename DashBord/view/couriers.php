<?php

session_start();
include 'DashBord\view\navbar.php';
include 'DashBord\php\dB\db_connect.php';
function redirect($errormsg, $sec=0){
    $referer = $_SERVER['HTTP_REFERER'];
    // $id = $_POST['id'];
    // $returnpage = $referer."&error=1";

    echo "<div class='alert alert-danger'>$errormsg</div>";
    echo "<div class='alert alert-info>will redirect in $sec seconds...</div>";
    header("refresh:$sec;url=$referer");
    exit();
}
//-----------------------------------------------------------------------------------------

$do = '';

if (isset($_GET['do'])) {
    $do = $_GET['do'];
}else{
    $do= 'Manage';
    
}
//-----------------------------------------------------------------------------------------
    $stmt = $con->prepare("SELECT * FROM couriers");
    $stmt->execute();
    $rows= $stmt->fetchAll(); ?>
    <form action="#" method="post">
        <h1 class="text-center"><Summary>couriers</Summary></h1>
        <div class="container">  
                <div class="table-responsive text-center ">
                    <table class="table "  style="vertical-align:middle">
                        <tr class="table-dark text-center">
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Zone</td>
                            <!-- <td>orders</td> -->
                        </tr>
                    <?php foreach($rows as $row) {
                        echo '<tr>';
                            echo '<td>' . $row['CName'] . '</td>';
                            echo '<td>' . $row['CPhone'] . '</td>';
                            echo '<td>' . $row['CZone'] . '</td>';
                            // echo "<td><a href='' class='btn btn-success'>
                            //         orders
                            //     </a></td>";
                    } ?>
                    </table>
                </div>
    </form>
<?php
//-----------------------------------------------------------------------------------------