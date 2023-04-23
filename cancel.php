<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// Retrieve data from a URL
$idaddshipment = $_GET["id"];

// Query data based on ID
// $shipment = query("SELECT * FROM addshipment WHERE idaddshipment = $idaddshipment")[0];


	// Check whether the data has been successfully updated or not
	if (cancel($idaddshipment) > 0) {
		echo "
			<script>
				alert('cancelled!');
				document.location.href = 'cancellationshipment.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('cancelled!');
				document.location.href = 'cancellationshipment.php';
			</script>
		";
	}
