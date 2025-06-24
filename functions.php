<?php

// koneksi ke database
$conn = mysqli_connect("localhost:3308", "root", "", "dispatchers");
if (!$conn) {
	echo "Connection Failed!";
	exit();
}

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $name = mysqli_real_escape_string($conn, $data["name"]);
    $role = mysqli_real_escape_string($conn, $data["role"]);
    $password = $data["password"];
    $password2 = $data["password2"];

    // cek username sudah ada atau belum
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->fetch_assoc()) {
        echo "<script>alert('Username already exists!')</script>";
        return false;
    }
    $stmt->close();

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('Enter correct password');</script>";
        return false;
    }

    // enkripsi password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    $stmt = $conn->prepare("INSERT INTO users (username, name, role, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $name, $role, $passwordHash);
    $stmt->execute();
    $affected = $stmt->affected_rows;
    $stmt->close();
    return $affected;
}
//function buat customer add shipment
function addshipment($data)
{
    global $conn;
    $username = $_SESSION['username'];
    $productdesc = htmlspecialchars($data["productdesc"]);
    $weight = htmlspecialchars($data["weight"]);
    $shipmenttype = htmlspecialchars($data["shipmenttype"]);
    $itemtype = htmlspecialchars($data["itemtype"]);
    $address = htmlspecialchars($data["address"]);
    $status = "waiting for confirmation";
    $invoice = "";
    $stmt = $conn->prepare("INSERT INTO addshipment (username, productdesc, weight, shipmenttype, itemtype, address, status, invoice) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $username, $productdesc, $weight, $shipmenttype, $itemtype, $address, $status, $invoice);
    $stmt->execute();
    $affected = $stmt->affected_rows;
    $stmt->close();
    return $affected;
}

function cari($keyword)
{
	$query = "SELECT * FROM addshipment
				WHERE
			  productdesc LIKE '%$keyword%' OR
			  shipmenttype LIKE '%$keyword%' OR
			  itemtype LIKE '%$keyword%' OR
			  weight LIKE '%$keyword%'
			";
	return query($query);
}

//function buat admin nampilin request shipment dr customer
function requestshipment($data)
{
    global $conn;
    $username = htmlspecialchars($data["username"]);
    $productdesc = htmlspecialchars($data["productdesc"]);
    $weight = htmlspecialchars($data["weight"]);
    $shipmenttype = htmlspecialchars($data["shipmenttype"]);
    $itemtype = htmlspecialchars($data["itemtype"]);
    $address = htmlspecialchars($data["address"]);
    $status = htmlspecialchars($data["status"]);
    $stmt = $conn->prepare("INSERT INTO addshipment (username, productdesc, weight, shipmenttype, itemtype, address, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $username, $productdesc, $weight, $shipmenttype, $itemtype, $address, $status);
    $stmt->execute();
    $affected = $stmt->affected_rows;
    $stmt->close();
    return $affected;
}

function find($keyword)
{
	$query = "SELECT * FROM addshipment
				WHERE
			username LIKE '%$keyword%' OR
			  productdesc LIKE '%$keyword%' OR
			  shipmenttype LIKE '%$keyword%' OR
			  itemtype LIKE '%$keyword%' OR
			  weight LIKE '%$keyword%'
			";
	return query($query);
}
//function buat masukin cancel request ke dalam rows
function cancellation($data)
{
    global $conn;
    $id = $data["idaddshipment"];
    $username = $data["username"];
    $productdesc = $data["productdesc"];
    $weight = $data["weight"];
    $shipmenttype = $data["shipmenttype"];
    $itemtype = $data["itemtype"];
    $address = $data["address"];
    $status = $data["status"];
    $stmt = $conn->prepare("INSERT INTO cancellation (idaddshipment, username, productdesc, weight, shipmenttype, itemtype, address, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $id, $username, $productdesc, $weight, $shipmenttype, $itemtype, $address, $status);
    $stmt->execute();
    $affected = $stmt->affected_rows;
    $stmt->close();
    return $affected;
}

function deny($idaddshipment)
{
    global $conn;
    $stmt = $conn->prepare("DELETE FROM cancellation WHERE idaddshipment = ?");
    $stmt->bind_param("i", $idaddshipment);
    $stmt->execute();
    $affected = $stmt->affected_rows;
    $stmt->close();
    return $affected;
}

function cancel($idaddshipment)
{
    global $conn;
    $stmt1 = $conn->prepare("DELETE FROM cancellation WHERE idaddshipment = ?");
    $stmt1->bind_param("i", $idaddshipment);
    $stmt1->execute();
    $stmt1->close();
    $stmt2 = $conn->prepare("DELETE FROM addshipment WHERE idaddshipment = ?");
    $stmt2->bind_param("i", $idaddshipment);
    $stmt2->execute();
    $affected = $stmt2->affected_rows;
    $stmt2->close();
    return $affected;
}

function forward($data) {
    global $conn;
    $id = $data["idaddshipment"];
    $status = "Forward To Loader";
    $stmt = $conn->prepare("UPDATE addshipment SET status = ? WHERE idaddshipment = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $result = $stmt->affected_rows;
    $stmt->close();
    return $result > 0 ? "Success" : "Error: Forward failed";
}

function generateinvoice($data)
{
    global $conn;
    $id = $data["idaddshipment"];
    $username = $data['username'];
    $productdesc = htmlspecialchars($data["productdesc"]);
    $weight = htmlspecialchars($data["weight"]);
    $shipmenttype = htmlspecialchars($data["shipmenttype"]);
    $itemtype = htmlspecialchars($data["itemtype"]);
    $address = htmlspecialchars($data["address"]);
    $status = "waiting for confirmation";
    $invoice = htmlspecialchars($data["invoice"]);
    $stmt = $conn->prepare("UPDATE addshipment SET idaddshipment = ?, username = ?, productdesc = ?, weight = ?, shipmenttype = ?, itemtype = ?, address = ?, status = ?, invoice = ? WHERE idaddshipment = ?");
    $stmt->bind_param("issssssssi", $id, $username, $productdesc, $weight, $shipmenttype, $itemtype, $address, $status, $invoice, $id);
    $stmt->execute();
    $affected = $stmt->affected_rows;
    $stmt->close();
    return $affected;
}

function registrasiemployee($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $role = mysqli_real_escape_string($conn, $data["role"]);
    $password = $data["password"];
    $password2 = $data["password2"];
    $name = mysqli_real_escape_string($conn, $data["name"]);

    // cek username sudah ada atau belum
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->fetch_assoc()) {
        echo "<script>alert('Username is registered!')</script>";
        return false;
    }
    $stmt->close();

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('Password confirmation does not match!');</script>";
        return false;
    }

    // enkripsi password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    $stmt = $conn->prepare("INSERT INTO users (username, name, role, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $name, $role, $passwordHash);
    $stmt->execute();
    $affected = $stmt->affected_rows;
    $stmt->close();
    return $affected;
}
