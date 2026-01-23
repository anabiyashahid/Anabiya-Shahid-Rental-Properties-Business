<?php
// Property Inquiry Form Processing

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $propertyType = trim($_POST['propertyType'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    $errors = [];
    
    // Validation
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    if (empty($propertyType)) {
        $errors[] = "Property type is required";
    }
    
    if (empty($message)) {
        $errors[] = "Message is required";
    }
    
    // If no errors, process the form
    if (empty($errors)) {
        // Here you can add code to:
        // - Send email notification
        // - Save to database
        // - etc.
        
        // For now, we'll redirect with success message
        header("Location: form.html?status=success&name=" . urlencode($name));
        exit();
    } else {
        // Redirect back with errors
        $errorMsg = implode(", ", $errors);
        header("Location: form.html?status=error&message=" . urlencode($errorMsg));
        exit();
    }
} else {
    // Not a POST request, redirect to form
    header("Location: form.html");
    exit();
}
?>
