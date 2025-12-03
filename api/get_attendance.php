<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. SECURE THE ENDPOINT
// We use the *parent* auth check, so we must go up two levels.
require_once('../portal/includes/parent_auth_check.php');

// 2. INCLUDE DATABASE
require_once('../config/database.php');

// 3. SET HEADER TO RETURN JSON
header('Content-Type: application/json');

// 4. GET DATA
try {
    // Get the enrollment_id from the parent's secure session
    $enrollment_id = $_SESSION['enrollment_id'];

    // Select all attendance records for this parent
    $query = "SELECT 
                date, 
                status, 
                notes
              FROM attendance
              WHERE enrollment_id = ?
              ORDER BY date DESC"; // Show newest first

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $enrollment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $attendance = [];
    while ($row = $result->fetch_assoc()) {
        $attendance[] = $row;
    }

    // 5. RETURN DATA
    // Send the attendance records back as a JSON array
    echo json_encode(['success' => true, 'attendance' => $attendance]);

} catch (Exception $e) {
    // 6. HANDLE ERRORS
    http_response_code(500); // Internal Server Error
    echo json_encode(['success' => false, 'message' => 'A server error occurred.']);
}

exit(); // Stop script execution
?>