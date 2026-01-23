<?php
// Student Registration Form Processing

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $studentName = trim($_POST['studentName'] ?? '');
    $studentEmail = trim($_POST['studentEmail'] ?? '');
    $rollNumber = trim($_POST['rollNumber'] ?? '');
    $semester = trim($_POST['semester'] ?? '');
    
    $errors = [];
    
    // Validation
    if (empty($studentName)) {
        $errors[] = "Student name is required";
    }
    
    if (empty($studentEmail)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($studentEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    if (empty($rollNumber)) {
        $errors[] = "Roll number is required";
    }
    
    if (empty($semester)) {
        $errors[] = "Semester is required";
    }
    
    // If no errors, process the form
    if (empty($errors)) {
        // Here you can add code to:
        // - Send email notification
        // - Save to database
        // - etc.
        
        // For now, we'll redirect with success message
        header("Location: student-registration.html?status=success&name=" . urlencode($studentName));
        exit();
    } else {
        // Redirect back with errors
        $errorMsg = implode(", ", $errors);
        header("Location: student-registration.html?status=error&message=" . urlencode($errorMsg));
        exit();
    }
} else {
    // Not a POST request, redirect to form
    header("Location: student-registration.html");
    exit();
}
?>
