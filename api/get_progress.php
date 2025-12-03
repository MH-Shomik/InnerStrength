<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. SECURE THE ENDPOINT
// We use the *parent* auth check. We must go up two levels.
require_once('../portal/includes/parent_auth_check.php');

// 2. INCLUDE DATABASE
require_once('../config/database.php');

// 3. SET HEADER TO RETURN JSON
header('Content-Type: application/json');

// 4. GET DATA
try {
    // Get the enrollment_id from the parent's secure session
    $enrollment_id = $_SESSION['enrollment_id'];

    // This is a more advanced query. We JOIN other tables to get the
    // names of the therapy and the therapist, which is more user-friendly.
    $query = "SELECT 
                ts.session_date, 
                ts.notes, 
                ts.progress,
                th.name as therapy_name,
                t.fullname as therapist_name
              FROM therapy_sessions ts
              LEFT JOIN therapy_list th ON ts.therapy_id = th.id
              LEFT JOIN therapist_list t ON ts.therapist_id = t.id
              WHERE ts.enrollment_id = ?
              AND ts.status = 1 -- Only show 'completed' sessions
              ORDER BY ts.session_date DESC"; // Show newest first

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $enrollment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $reports = [];
    while ($row = $result->fetch_assoc()) {
        $reports[] = $row;
    }

    // 5. RETURN DATA
    // Send the reports back as a JSON array
    echo json_encode(['success' => true, 'reports' => $reports]);

} catch (Exception $e) {
    // 6. HANDLE ERRORS
    // Send a JSON error message
    http_response_code(500); // Internal Server Error
    echo json_encode(['success' => false, 'message' => 'A server error occurred.']);
}

exit(); // Stop script execution
?>