<?php
require_once('../includes/auth_check.php');
require_once('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $statuses = $_POST['status'];
    $notes = $_POST['notes'];

    // Delete existing attendance for the date
    $conn->query("DELETE FROM attendance WHERE date = '$date'");

    // Insert new attendance records
    foreach ($statuses as $enrollment_id => $status) {
        $note = $conn->real_escape_string($notes[$enrollment_id] ?? '');
        $sql = "INSERT INTO attendance (enrollment_id, date, status, notes, date_created)
                VALUES ($enrollment_id, '$date', $status, '$note', NOW())";
        $conn->query($sql);
    }

    $_SESSION['success'] = "Attendance for $date saved successfully!";
    header("Location: list.php?date=$date");
    exit();
}

header("Location: list.php");
exit();
?>