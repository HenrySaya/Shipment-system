
<?php
include 'DashBord\view\header.php';
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
if ($do == 'Manage') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt = $con->prepare("SELECT * FROM orders");
    $stmt->execute();
    $rows= $stmt->fetchAll(); 
    $count= $stmt->rowCount();
    // echo $uid;?>
    <form action="#" method="post">
        <h1 class="text-center"><Summary>Summary</Summary></h1>
        <div class="container">  
             <div  class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header"><a href=''><?php echo date("Y/m/d"); ?></a></div>
                <div class="card-body">
                    <h5 class="card-title">All Shipment</h5>
                    <p class="card-text"><?php echo $count; ?></p>
                </div>
            </div>
        <div class="dropdown">
            
            <a style="margin-bottom:10px" class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                 couriers
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href='dashboard.php?do=courierDiaa&id=' . $row['id'] .' >Diaa</a></li>
                <li><a class="dropdown-item" href="#">henry</a></li>
                <li><a class="dropdown-item" href="#">maddy</a></li>
                <li><a class="dropdown-item" href="#">kienja</a></li>
                <li><a class="dropdown-item" href="#">duduu</a></li>
                <li><a class="dropdown-item" href="#">khotsa</a></li>
                <li><a class="dropdown-item" href="#">james</a></li>
                <li><a class="dropdown-item" href="#">saya</a></li>

            </ul>
            <a style="margin-bottom:10px" class="btn btn-primary" href='dashboard.php?do=Merchant&id='. $_SESSION['id'] .' >
                  Merchant
                  
            </a>
            <a style="margin-bottom:10px" class="btn btn-primary" href='dashboard.php?do=ToDayOrders&id=' . $row['id'] .' >
                 ToDay Orders
            </a>
            <a style="margin-bottom:10px" class="btn btn-primary" href='dashboard.php?do=Delivered&id=' . $row['id'] .' >
                 Delivered
            </a>
        </div>
            <input type="hidden" name="uid1" value="<?php echo $_SESSION['id']; ?>">
                <div class="table-responsive text-center ">
                    <table class="table "  style="vertical-align:middle">
                        <tr class="table-dark text-center">
                            <td>company</td>
                            <td>customer name</td>
                            <td>customer phone</td>
                            <td>customer address</td>
                            <td>zone<td>
                            <td>price</td>
                            <td>shipment</td>
                            <td>note</td>
                            <td>date</td>
                            <td>option</td>
                            <td>status</td>
                            <td>courier</td>
                        </tr>
                    <?php foreach($rows as $row) {
                        echo '<tr>';
                            echo '<td>' . $row['company'] . '</td>';
                            echo '<td>' . $row['CName'] . '</td>';
                            echo '<td>' . $row['CPhone'] . '</td>';
                            echo '<td>' . $row['CAddress'] . '</td>';
                            echo '<td>' . $row['CZone'] . '</td>';
                            echo '<td></td>';
                            echo '<td>' . $row['CPrice'] . '</td>';
                            echo '<td>' . $row['CShipment'] . '</td>';
                            echo '<td>' . $row['CNotes'] . '</td>';
                            echo '<td>'. $row['date'] .'</td>';
                            echo "<td>
                                 <div class='dropdown'>
                            <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                              status
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                              <li><a class='dropdown-item' href='dashboard.php?do=received&id=". $row['id'] ."'>Received</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=OutForDelivery&id=". $row['id'] ."'>OutForDelivery</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Postponed&id=". $row['id'] ."'>Postponed</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=delivered&id=". $row['id'] ."'>Delivered</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=canceled&id=". $row['id'] ."'>canceled</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Rejected&id=". $row['id'] ."'>Rejected</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Returned&id=". $row['id'] ."'>Returned</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=delete&id=". $row['id'] ."'>Delete</a></li>
                            </ul>
                            <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                couriers
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                              <li><a class='dropdown-item' href='dashboard.php?do=Diaa&id=". $row['id'] ."'>Diaa</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=A_nour&id=". $row['id'] ."'>A_nour</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Haitham&id=". $row['id'] ."'>Haitham</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Mossad&id=". $row['id'] ."'>Mossad</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=M_mostafa&id=". $row['id'] ."'>M_mostafa</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Islam&id=". $row['id'] ."'>Islam</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Khaled&id=". $row['id'] ."'>Khaled</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=R2S&id=". $row['id'] ."'>R2S</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=FDS&id=". $row['id'] ."'>FDS</a></li>
                                                         
                            </ul>
                          </div></td>" ;
                          echo '<td>'. $row['status'] .'</td>';
                          echo '<td>'. $row['courier'] .'</td>';
                        echo '</tr>';
                        // redirect('DONE');
                    } ?>
                        
                    </table>
                </div>
    </form>
<?php
}; 
//-----------------------------------------------------------------------------------------
if ($do == 'Merchant') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT * FROM customers ");
    $stmt->execute(array($uid));
    $rows= $stmt->fetchAll();
    $count= $stmt->rowCount();
    // print_r ($rows);
    // echo $uid;
    if ($stmt->rowCount()>0) { ?>
    <h1 class="text-center"><Summary>Merchant</Summary></h1>
    <div class="container"> 
            <div  class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">All Merchant</h5>
                    <p class="card-text"><?php echo $count; ?></p>
                </div>
            </div>
         <div class="table-responsive text-center ">
                    <table class="table "  style="vertical-align:middle">
                        <tr class="table-dark text-center">
                            <td>Merchant</td>
                            <td>Merchant Full Name</td>
                            <td>Merchant Email</td>
                            <td>Merchant Address</td>
                            <td>Merchant Phone<td>
                        </tr>
                    <?php foreach($rows as $row) {
                        echo '<tr>';
                            echo '<td>'.'<a href="dashboard.php?do=Merchantsammary&id='. $row['id'].'">' . $row['Username'] . '</a> </td>';
                            echo '<td>' . $row['Fullname'] . '</td>';
                            echo '<td>' . $row['Email'] . '</td>';
                            echo '<td>' . $row['Address'] . '</td>';
                            echo '<td>' . $row['Phone'] . '</td>';
                        echo '</tr>'; 
                    }

                    ?>
                    </div>
                    <?php



    }
}

//---------------------------------------------------------------------------------------------
if ($do == 'Merchantsammary') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT * FROM orders WHERE customer_id=? ");
    $stmt->execute(array($uid));
    $rows= $stmt->fetchAll();
    $count= $stmt->rowCount();
    // $name= $rows;
    // print_r  ($name);
    // print_r ($rows['CZone']);
    // print_r ($rows['Username']);
    if ($stmt->rowCount()>0) { 
        $stmt= $con->prepare("SELECT Fullname FROM customers WHERE id=$uid ");
        $row= $stmt->fetchAll();
        $stmt->execute();
        // $count= $stmt->rowCount();
        // print_r ($row);
       
        ?>
        <h1 class="text-center"><Summary><?php     ?></bre></Summary></h1>
        <div class="container"> 
            <div  class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">All orders</h5>
                    <p class="card-text"><?php echo $count; ?></p>
                </div>
            </div>
         <div class="table-responsive text-center ">
                    <table class="table "  style="vertical-align:middle">
                        <tr class="table-dark text-center">
                            <td>Merchant</td>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Address</td>
                            <td>Zone</td>
                            <td>Price<td>
                            <td>Shipment<td>
                            <td>Notes<td>
                            <td>date<td>
                            <td>status<td>
                        </tr>
                    <?php foreach($rows as $row) {
                        echo '<tr>';
                            echo '<td>'.'<a href="dashboard.php?do=Merchantsammary&id='. $row['id'].'">' . $row['company'] . '</a> </td>';
                            echo '<td>' . $row['CName'] . '</td>';
                            echo '<td>' . $row['CPhone'] . '</td>';
                            echo '<td>' . $row['CAddress'] . '</td>';
                            echo '<td>' . $row['CZone'] . '</td>';
                            echo '<td>' . $row['CPrice'] . '</td>';
                            echo '<td></td>';
                            echo '<td>' . $row['CShipment'] . '</td>';
                            echo '<td></td>';
                            echo '<td>' . $row['CNotes'] . '</td>';
                            echo '<td></td>';
                            echo '<td>' . $row['date'] . '</td>';
                            echo '<td></td>';
                            echo '<td>' . $row['status'] . '</td>';
                        echo '</tr>'; 
                    }

    }
}

//--------------------------------------------------------------
if ($do == 'ToDayOrders') {
    $stmt = $con->prepare("SELECT * FROM orders WHERE status='OutForDelivery' ||status='Postponed' ||status='Received' ||status='receiving'");
    $stmt->execute();
    $rows= $stmt->fetchAll(); 
    $count= $stmt->rowCount();?>
    <form action="#" method="post">
        <h1 class="text-center"><Summary>ToDay Orders Summary</Summary></h1>
        <div class="container">  
            <div  class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header"><a href=''><?php echo date("Y/m/d"); ?></a></div>
                <div class="card-body">
                    <h5 class="card-title">All Shipment</h5>
                    <p class="card-text"><?php echo $count; ?></p>
                </div>
            </div>
        <div class="dropdown">
            <a style="margin-bottom:10px" class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                 couriers
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href='dashboard.php?do=courierDiaa&id=' . $row['id'] .' >Diaa</a></li>
                <li><a class="dropdown-item" href="#">Ahmed Nour</a></li>
                <li><a class="dropdown-item" href="#">Haitham</a></li>
                <li><a class="dropdown-item" href="#">Mossad</a></li>
                <li><a class="dropdown-item" href="#">Mohamed Mostafa</a></li>
                <li><a class="dropdown-item" href="#">Islam</a></li>
                <li><a class="dropdown-item" href="#">Khaled</a></li>
                <li><a class="dropdown-item" href="#">R2S</a></li>
                <li><a class="dropdown-item" href="#">FDS</a></li>

            </ul>
            <a style="margin-bottom:10px" class="btn btn-primary" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                 ToDay Orders
            </a>
        </div>
            <input type="hidden" name="uid1" value="<?php echo $_SESSION['id']; ?>">
                <div class="table-responsive text-center ">
                    <table class="table "  style="vertical-align:middle">
                        <tr class="table-dark text-center">
                            <td>company</td>
                            <td>customer name</td>
                            <td>customer phone</td>
                            <td>customer address</td>
                            <td>zone<td>
                            <td>price</td>
                            <td>shipment</td>
                            <td>note</td>
                            <td>date</td>
                            <td>option</td>
                            <td>status</td>
                            <td>courier</td>
                        </tr>
                    <?php foreach($rows as $row) {
                        echo '<tr>';
                            echo '<td>' . $row['company'] . '</td>';
                            echo '<td>' . $row['CName'] . '</td>';
                            echo '<td>' . $row['CPhone'] . '</td>';
                            echo '<td>' . $row['CAddress'] . '</td>';
                            echo '<td>' . $row['CZone'] . '</td>';
                            echo '<td></td>';
                            echo '<td>' . $row['CPrice'] . '</td>';
                            echo '<td>' . $row['CShipment'] . '</td>';
                            echo '<td>' . $row['CNotes'] . '</td>';
                            echo '<td>'. $row['date'] .'</td>';
                            echo "<td>
                                 <div class='dropdown'>
                            <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                              status
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                              <li><a class='dropdown-item' href='dashboard.php?do=received&id=". $row['id'] ."'>Received</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=OutForDelivery&id=". $row['id'] ."'>OutForDelivery</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Postponed&id=". $row['id'] ."'>Postponed</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=delivered&id=". $row['id'] ."'>Delivered</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=canceled&id=". $row['id'] ."'>canceled</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Rejected&id=". $row['id'] ."'>Rejected</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Returned&id=". $row['id'] ."'>Returned</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=delete&id=". $row['id'] ."'>Delete</a></li>
                            </ul>
                            <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                couriers
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                              <li><a class='dropdown-item' href='dashboard.php?do=Diaa&id=". $row['id'] ."'>Diaa</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=A_nour&id=". $row['id'] ."'>A_nour</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Haitham&id=". $row['id'] ."'>Haitham</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Mossad&id=". $row['id'] ."'>Mossad</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=M_mostafa&id=". $row['id'] ."'>M_mostafa</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Islam&id=". $row['id'] ."'>Islam</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Khaled&id=". $row['id'] ."'>Khaled</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=R2S&id=". $row['id'] ."'>R2S</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=FDS&id=". $row['id'] ."'>FDS</a></li>
                                                         
                            </ul>
                          </div></td>" ;
                          echo '<td>'. $row['status'] .'</td>';
                          echo '<td>'. $row['courier'] .'</td>';
                        echo '</tr>';
                        // redirect('DONE');
                    } ?>
                        
                    </table>
                </div>
    </form>
<?php
}; 
//-----------------------------------------------------------------------------------------------
if ($do == 'Delivered') {
    $stmt = $con->prepare("SELECT * FROM orders WHERE status='Delivered'");
    $stmt->execute();
    $rows= $stmt->fetchAll(); 
    $count= $stmt->rowCount();?>
    <form action="#" method="post">
        <h1 class="text-center"><Summary>Delivered</Summary></h1>
        <div class="container">  
            <div  class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header"><a href=''><?php echo date("Y/m/d"); ?></a></div>
                <div class="card-body">
                    <h5 class="card-title">All Shipment</h5>
                    <p class="card-text"><?php echo $count; ?></p>
                </div>
            </div>
        <div class="dropdown">
            <a style="margin-bottom:10px" class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                 couriers
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href='dashboard.php?do=courierDiaa&id=' . $row['id'] .' >Diaa</a></li>
                <li><a class="dropdown-item" href="#">Ahmed Nour</a></li>
                <li><a class="dropdown-item" href="#">Haitham</a></li>
                <li><a class="dropdown-item" href="#">Mossad</a></li>
                <li><a class="dropdown-item" href="#">Mohamed Mostafa</a></li>
                <li><a class="dropdown-item" href="#">Islam</a></li>
                <li><a class="dropdown-item" href="#">Khaled</a></li>
                <li><a class="dropdown-item" href="#">R2S</a></li>
                <li><a class="dropdown-item" href="#">FDS</a></li>

            </ul>
            <a style="margin-bottom:10px" class="btn btn-primary" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                 ToDay Orders
            </a>
        </div>
            <input type="hidden" name="uid1" value="<?php echo $_SESSION['id']; ?>">
                <div class="table-responsive text-center ">
                    <table class="table "  style="vertical-align:middle">
                        <tr class="table-dark text-center">
                            <td>company</td>
                            <td>customer name</td>
                            <td>customer phone</td>
                            <td>customer address</td>
                            <td>zone<td>
                            <td>price</td>
                            <td>shipment</td>
                            <td>note</td>
                            <td>date</td>
                            <td>option</td>
                            <td>status</td>
                            <td>courier</td>
                        </tr>
                    <?php foreach($rows as $row) {
                        echo '<tr>';
                            echo '<td>' . $row['company'] . '</td>';
                            echo '<td>' . $row['CName'] . '</td>';
                            echo '<td>' . $row['CPhone'] . '</td>';
                            echo '<td>' . $row['CAddress'] . '</td>';
                            echo '<td>' . $row['CZone'] . '</td>';
                            echo '<td></td>';
                            echo '<td>' . $row['CPrice'] . '</td>';
                            echo '<td>' . $row['CShipment'] . '</td>';
                            echo '<td>' . $row['CNotes'] . '</td>';
                            echo '<td>'. $row['date'] .'</td>';
                            echo "<td>
                                 <div class='dropdown'>
                            <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                              status
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                              <li><a class='dropdown-item' href='dashboard.php?do=received&id=". $row['id'] ."'>Received</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=OutForDelivery&id=". $row['id'] ."'>OutForDelivery</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Postponed&id=". $row['id'] ."'>Postponed</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=delivered&id=". $row['id'] ."'>Delivered</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=canceled&id=". $row['id'] ."'>canceled</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Rejected&id=". $row['id'] ."'>Rejected</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Returned&id=". $row['id'] ."'>Returned</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=delete&id=". $row['id'] ."'>Delete</a></li>
                            </ul>
                            <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                couriers
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                              <li><a class='dropdown-item' href='dashboard.php?do=Diaa&id=". $row['id'] ."'>Diaa</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=A_nour&id=". $row['id'] ."'>A_nour</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Haitham&id=". $row['id'] ."'>Haitham</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Mossad&id=". $row['id'] ."'>Mossad</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=M_mostafa&id=". $row['id'] ."'>M_mostafa</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Islam&id=". $row['id'] ."'>Islam</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=Khaled&id=". $row['id'] ."'>Khaled</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=R2S&id=". $row['id'] ."'>R2S</a></li>
                              <li><a class='dropdown-item' href='dashboard.php?do=FDS&id=". $row['id'] ."'>FDS</a></li>
                                                         
                            </ul>
                          </div></td>" ;
                          echo '<td>'. $row['status'] .'</td>';
                          echo '<td>'. $row['courier'] .'</td>';
                        echo '</tr>';
                        // redirect('DONE');
                    } ?>
                        
                    </table>
                </div>
    </form>
<?php
}; 
//-----------------------------------------------------------------------------------------------
if ($do == 'Postponed') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT status FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET status = 'Postponed' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'received') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT status FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET status = 'Received' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'delivered') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT status FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET status = 'Delivered' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'canceled') {
        $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
        $stmt= $con->prepare("SELECT status FROM orders WHERE id=? limit 1");
        $stmt->execute(array($uid));
        // $row= $stmt->fetch();
        $count= $stmt->rowCount();
        // echo $count;
        if ($stmt->rowCount()>0) {
            $stmt= $con->prepare("UPDATE orders SET status = 'canceled' WHERE id= $uid ");
            $stmt->execute(array());
        //  $count= $stmt->rowCount();;
            $added=  '<div class="alert alert-success"> '. ' action Success </div>';
            redirect($added);
            }
        }
//-----------------------------------------------------------------------------------------
if ($do == 'Rejected') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT status FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET status = 'Rejected' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'OutForDelivery') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT status FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET status = 'OutForDelivery' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'Returned') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT status FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET status = 'Returned' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'edit') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT * FROM users WHERE id=? limit 1");
    $stmt->execute(array($uid));
    $row= $stmt->fetch();
    $count= $stmt->rowCount();
    if ($stmt->rowCount()>0) { ?>
        <h1 class="text-center">edit user</h1>
        <div class="container">
            <form class="form-horizontal" action="?do=update" method="post">
                <input type="hidden" name="uid" value="<?php echo $uid ;?>">
                <div class="form-group">
                    <label class="col-sm 2 control-label" for="">user name</label>
                    <div class="col-sm 10">
                        <input type="text" class="form-control" name="username" value="<?php echo $row['u_name']  ;  ?>" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm 2 control-label" for="">Password</label>
                    <div class="col-sm 10">
                        <input type="Password" class="form-control" name="Password" value="<?php echo $row['u_password']  ;  ?>" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm 2 control-label" for="">groupID</label>
                    <div class="col-sm 10">
                        <input type="text" class="form-control" name="groupID" value="<?php echo $row['GroupID']  ;  ?>" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div style="margin-top: 10px;" class="col-sm-offset 2col-sm 10">
                        <input  type="submit" class="btn btn-primary" value="Save" >
                    </div>
                </div>

            </form>
        </div>
<?php
    }else {
        echo 'sorry';
    }
//-----------------------------------------------------------------------------------------
}elseif ($do == 'update') {
    echo "<div class='container'>";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id        = $_POST['uid'];
        $username  = $_POST['username'];
        $Password  = $_POST['Password'];
        $groupid     = $_POST['groupID'];

        $errors = array();

        if (empty($username)) {
                $errors[] = '<div class="alert alert-danger">enter username</div>';
            }
        if(empty($Password)) {
                $errors[] = '<div class="alert alert-danger">enter Password</div>';
            }
            foreach ($errors as $error) {
                echo $error ;
            }
        if (empty($errors)) {
            $stmt = $con->prepare("UPDATE users SET u_name = ?,u_password = ?,GroupID = ? WHERE ID = ?");
                $stmt->execute(array($username, $Password, $groupid, $id));
                $edit= '<div class="alert alert-success"> '. ' Edit Success </div>';
                redirect($edit);
        }
            }
//-----------------------------------------------------------------------------------------
}elseif ($do == 'add') {
    if ($do == 'add') {
        $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
        $stmt= $con->prepare("SELECT * FROM users WHERE id=? limit 1");
        $stmt->execute(array($uid));
        $row= $stmt->fetch();
        $count= $stmt->rowCount();
        if ($stmt->rowCount()>0) { ?>
            <h1 class="text-center">Add Order</h1>
            <div class="container">
                <form class="form-horizontal" action="?do=add" method="post">
                    <input type="hidden" name="company" for=""><?php echo $_SESSION['username']; ?></input>
                    <input type="hidden" name="uid" value="<?php echo $_SESSION['id']; ?>">
                    <div class="form-group">
                         <label class="col-sm 2 control-label" for="">customer name</label>
                    <div class="col-sm 10">
                        <input type="text" class="form-control" name="customername" value="" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm 2 control-label" for="">phone</label>
                    <div class="col-sm 10">
                        <input type="text" class="form-control" name="phone" value="" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm 2 control-label" for="">address</label>
                    <div class="col-sm 10">
                        <input type="text" class="form-control" name="address" value="" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm 2 control-label" for="">zone</label>
                    <div class="col-sm 10">
                        <input type="text" class="form-control" name="zone" value="" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm 2 control-label" for="">price</label>
                    <div class="col-sm 10">
                        <input type="text" class="form-control" name="price" autocomplete='new password'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm 2 control-label" for="">shipment</label>
                    <div class="col-sm 10">
                        <input type="text" class="form-control" name="shipment" value="" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm 2 control-label" for="">notes</label>
                    <div class="col-sm 10">
                        <input type="text" class="form-control" name="notes" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div style="margin-top: 10px;" class="col-sm-offset 2col-sm 10">
                        <input  type="submit" class="btn btn-primary" value="Save" >
                    </div>
                </div>

            </form>
        </div>
<?php
}
//-----------------------------------------------------------------------------------------
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $uid          = $_POST['uid'];
        $company      = $_POST['company'];
        $customername = $_POST['customername'];
        $phone        = $_POST['phone'];
        $address      = $_POST['address'];
        $zone         = $_POST['zone'];
        $price        = $_POST['price'];
        $shipment     = $_POST['shipment'];
        $notes        = $_POST['notes'];
        
        if (empty($customername)) {
            $errors[] = '<div class="alert alert-danger">enter username</div>';
        }
        if (empty($phone)) {
            $errors[] = '<div class="alert alert-danger">enter phone</div>';
        }
        if (empty($address)) {
            $errors[] = '<div class="alert alert-danger">enter address</div>';
        }
        if (empty($zone)) {
            $errors[] = '<div class="alert alert-danger">enter zone</div>';
        }
        if (empty($price)) {
            $errors[] = '<div class="alert alert-danger">enter price</div>';
        }
        if (empty($shipment)) {
            $errors[] = '<div class="alert alert-danger">enter shipment</div>';
        }
        if (empty($errors)) {
            $stmt= $con->prepare("INSERT INTO orders (customer_id,company,CName,CPhone,CAddress,CZone,CPrice,CShipment,CNotes,date) VALUES ('$uid ', '$company', '$customername','$phone','$address','$zone','$price','$shipment','$notes',NOW())");
            $stmt->execute(array($company, $customername, $phone, $address ,$zone, $price, $shipment, $notes));
            $added=  '<div class="alert alert-success"> '. ' Add Success </div>';
            redirect($added);
        }
    }
}
}
//-----------------------------------------------------------------------------------------
if ($do == 'delete') {
    $uid= isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT * FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    $count= $stmt->rowCount();
    if ($stmt->rowCount()>0) {
            $stmt= $con->prepare("DELETE FROM orders WHERE id= :zorder");
            $stmt->bindparam(":zorder",$uid);
            $stmt->execute();
            $done= "<div class='alert alert-success'>deleted</div>'";
            redirect($done);
    }else {
        echo 'sorry';
    }}
//-----------------------------------------------------------------------------------------
if ($do == 'Diaa') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT courier FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET courier = 'Diaa' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'courierDiaa') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT * FROM orders WHERE courier='Diaa'");
    $stmt->execute(array($uid));
    $rows= $stmt->fetchAll();
    $count= $stmt->rowCount();
    ?>
    <?php
    if ($stmt->rowCount()>0) { ?>
        <div class='container'>
        <h1 class="text-center">Diaa</h1>
            <div  class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header"><a href='dashboard.php?do=todaycourierDiaa&id=' . $rows['id'] .'><?php echo date("Y/m/d"); ?></a></div>
                <div class="card-body">
                    <h5 class="card-title">All Shipment</h5>
                    <p class="card-text"><?php echo $count; ?></p>
                </div>
            </div>
        <div class="table-responsive text-center ">
        <table class="table "  style="vertical-align:middle">
            <tr class="table-dark text-center">
                <td>company</td>
                <td>customer name</td>
                <td>customer phone</td>
                <td>customer address</td>
                <td>zone<td>
                <td>price</td>
                <td>shipment</td>
                <td>note</td>
                <td>date</td>
                <td>option</td>
                <td>status</td>
                <td>courier</td>
            </tr>
        <?php foreach($rows as $row) {
            echo '<tr>';
                echo '<td>' . $row['company'] . '</td>';
                echo '<td>' . $row['CName'] . '</td>';
                echo '<td>' . $row['CPhone'] . '</td>';
                echo '<td>' . $row['CAddress'] . '</td>';
                echo '<td>' . $row['CZone'] . '</td>';
                echo '<td></td>';
                echo '<td>' . $row['CPrice'] . '</td>';
                echo '<td>' . $row['CShipment'] . '</td>';
                echo '<td>' . $row['CNotes'] . '</td>';
                echo '<td>'. $row['date'] .'</td>';
                echo "<td> </td>" ;
              echo '<td>'. $row['status'] .'</td>';
              echo '<td>'. $row['courier'] .'</td>';
            echo '</tr>';}
           ?> </div> <?php

?>
<?php
    //     $stmt= $con->prepare("UPDATE orders SET courier = 'Diaa' WHERE id= $uid ");
    //     $stmt->execute(array());
    // //  $count= $stmt->rowCount();;
    //     $added=  '<div class="alert alert-success"> '. ' action Success </div>';
    //     redirect($added);
    //     }
    }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'todaycourierDiaa') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT * FROM orders WHERE courier='Diaa' ");
    $stmt->execute(array($uid));
    $rows= $stmt->fetchAll();
    $count= $stmt->rowCount();
    echo $uid;
    ?>
    <?php
    if ($stmt->rowCount()>0) { ?>
        <div class='container'>
        <h1 class="text-center">today Diaa</h1>
            <div  class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header"><a href=''><?php echo date("Y/m/d"); ?></a></div>
                <div class="card-body">
                    <h5 class="card-title">All Shipment</h5>
                    <p class="card-text"><?php echo $count; ?></p>
                </div>
            </div>
        <div class="table-responsive text-center ">
        <table class="table "  style="vertical-align:middle">
            <tr class="table-dark text-center">
                <td>company</td>
                <td>customer name</td>
                <td>customer phone</td>
                <td>customer address</td>
                <td>zone<td>
                <td>price</td>
                <td>shipment</td>
                <td>note</td>
                <td>date</td>
                <td>option</td>
                <td>status</td>
                <td>courier</td>
            </tr>
        <?php foreach($rows as $row) {
            echo '<tr>';
                echo '<td>' . $row['company'] . '</td>';
                echo '<td>' . $row['CName'] . '</td>';
                echo '<td>' . $row['CPhone'] . '</td>';
                echo '<td>' . $row['CAddress'] . '</td>';
                echo '<td>' . $row['CZone'] . '</td>';
                echo '<td></td>';
                echo '<td>' . $row['CPrice'] . '</td>';
                echo '<td>' . $row['CShipment'] . '</td>';
                echo '<td>' . $row['CNotes'] . '</td>';
                echo '<td>'. $row['date'] .'</td>';
                echo "<td> </td>" ;
              echo '<td>'. $row['status'] .'</td>';
              echo '<td>'. $row['courier'] .'</td>';
            echo '</tr>';}
           ?> </div> <?php

?>
<?php
    //     $stmt= $con->prepare("UPDATE orders SET courier = 'Diaa' WHERE id= $uid ");
    //     $stmt->execute(array());
    // //  $count= $stmt->rowCount();;
    //     $added=  '<div class="alert alert-success"> '. ' action Success </div>';
    //     redirect($added);
    //     }
    }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'A_nour') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT courier FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET courier = 'A_nour' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'Haitham') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT courier FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET courier = 'Haitham' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'Mossad') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT courier FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET courier = 'Mossad' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'M_mostafa') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT courier FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET courier = 'M_mostafa' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'Islam') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT courier FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET courier = 'Islam' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'Khaled') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT courier FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET courier = 'Khaled' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'R2S') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT courier FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET courier = 'R2S' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }
//-----------------------------------------------------------------------------------------
if ($do == 'FDS') {
    $uid= (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;
    $stmt= $con->prepare("SELECT courier FROM orders WHERE id=? limit 1");
    $stmt->execute(array($uid));
    // $row= $stmt->fetch();
    $count= $stmt->rowCount();
    // echo $count;
    if ($stmt->rowCount()>0) {
        $stmt= $con->prepare("UPDATE orders SET courier = 'FDS' WHERE id= $uid ");
        $stmt->execute(array());
    //  $count= $stmt->rowCount();;
        $added=  '<div class="alert alert-success"> '. ' action Success </div>';
        redirect($added);
        }
    }





// include '../view/footer.php';

?>