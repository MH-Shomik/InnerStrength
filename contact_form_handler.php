<?php
/**
 * Contact Form Handler for Inner Strength
 * Handles POST requests from index.php
 */

// Start the session to pass success/error messages back to index.php
session_start();

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Sanitize and Validate Input Data
    // We use trim() to remove whitespace and strip_tags() to prevent code injection
    $name = strip_tags(trim($_POST["name"]));
    // Remove all illegal characters from email
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $message = trim($_POST["message"]);

    // 2. Basic Validation
    // Check if required fields are empty or if email is invalid
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['form_error'] = "Please fill in all required fields and provide a valid email address.";
        header("Location: index.php#contact");
        exit;
    }

    // 3. Prepare Email Details
    // The email address where you want to receive messages (taken from your index.php)
    $recipient = "innerstrength.childcare@gmail.com";
    
    // The Email Subject
    $subject = "New Consultation Inquiry from $name";

    // The Email Content
    $email_content = "You have received a new message from the Inner Strength website contact form.\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: " . ($phone ? $phone : "Not provided") . "\n\n";
    $email_content .= "Message:\n$message\n";

    // 4. Email Headers
    // "From" should ideally be an email address from your own domain (e.g., no-reply@yourdomain.com)
    // to prevent the email from being marked as spam. Since we don't know your domain,
    // we will use the user's email, but be aware this can sometimes trigger spam filters.
    $email_headers = "From: $name <$email>" . "\r\n";
    $email_headers .= "Reply-To: $email" . "\r\n";
    $email_headers .= "X-Mailer: PHP/" . phpversion();

    // 5. Send the Email
    try {
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Success
            $_SESSION['form_success'] = "Thank you! Your message has been sent successfully. We will contact you shortly.";
            header("Location: index.php#contact"); // Redirect back to the contact section
        } else {
            // PHP mail() function failed
            $_SESSION['form_error'] = "Oops! Something went wrong and we couldn't send your message. Please try calling us instead.";
            header("Location: index.php#contact");
        }
    } catch (Exception $e) {
        // Catch any unexpected errors
        $_SESSION['form_error'] = "An error occurred: " . $e->getMessage();
        header("Location: index.php#contact");
    }

} else {
    // If someone tries to access this file directly without submitting the form
    header("Location: index.php");
    exit;
}
?>