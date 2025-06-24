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

	$query = "INSERT INTO addshipment
				VALUES
			  ('', '$username', '$productdesc', '$weight', '$shipmenttype','$itemtype','$address','$status','$invoice')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
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

	$query = "INSERT INTO addshipment
				VALUES
			  ('', '$username', '$productdesc', '$weight', '$shipmenttype','$itemtype','$address','$status')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
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
	// cek apakah user pilih gambar baru atau tidak

	$query = "INSERT INTO cancellation VALUES
				('$id','$username','$productdesc','$weight','$shipmenttype','$itemtype','$address','$status')
			";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
function deny($idaddshipment)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM cancellation WHERE idaddshipment = $idaddshipment");
	return mysqli_affected_rows($conn);
}

function cancel($idaddshipment)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM cancellation WHERE idaddshipment = $idaddshipment");
	mysqli_query($conn, "DELETE FROM addshipment WHERE idaddshipment = $idaddshipment");
	return mysqli_affected_rows($conn);
}

function forward($data) {
    global $conn;

    $id = $data["idaddshipment"];
    $status = "Forward To Loader";

    $query = "UPDATE addshipment SET
                status = '$status'
              WHERE idaddshipment = $idaddshipment";
              
    $result = mysqli_query($conn, $query);

    if (!$result) {
        return "Error: " . mysqli_error($conn);
    } else {
        return "Success";
    }
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

	$query = "UPDATE addshipment
				SET
				idaddshipment = '$id',
				username = '$username',
				productdesc = '$productdesc',
				weight = '$weight',
				shipmenttype = '$shipmenttype',
				itemtype = '$itemtype',
				address = '$address',
				status = '$status',
				invoice = '$invoice'
			  WHERE idaddshipment = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
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
