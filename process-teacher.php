<?php
// Teacher Registration Form Processing

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $teacherName = trim($_POST['teacherName'] ?? '');
    $teacherEmail = trim($_POST['teacherEmail'] ?? '');
    $department = trim($_POST['department'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    
    $errors = [];
    
    // Validation
    if (empty($teacherName)) {
        $errors[] = "Teacher name is required";
    }
    
    if (empty($teacherEmail)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($teacherEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    if (empty($department)) {
        $errors[] = "Department is required";
    }
    
    if (empty($subject)) {
        $errors[] = "Subject is required";
    }
    
    // If no errors, process the form
    if (empty($errors)) {
        // Here you can add code to:
        // - Send email notification
        // - Save to database
        // - etc.
        
        // For now, we'll redirect with success message
        header("Location: teacher-registration.html?status=success&name=" . urlencode($teacherName));
        exit();
    } else {
        // Redirect back with errors
        $errorMsg = implode(", ", $errors);
        header("Location: teacher-registration.html?status=error&message=" . urlencode($errorMsg));
        exit();
    }
} else {
    // Not a POST request, redirect to form
    header("Location: teacher-registration.html");
    exit();
}
?>
