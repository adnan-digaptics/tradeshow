<?php
/**
 * Contact form POST handler. Include before any HTML output.
 */
require_once __DIR__ . '/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['tsr_form']) || $_POST['tsr_form'] !== 'contact') {
    return;
}

$config = tsr_config();
$fullName = trim((string) ($_POST['full_name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$company = trim((string) ($_POST['company'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$service = trim((string) ($_POST['service'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

$errors = [];
if ($fullName === '') {
    $errors[] = 'Full name is required.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email address is required.';
}
if ($service === '' || $service === 'Select a service') {
    $errors[] = 'Please select a service.';
}

if ($errors) {
    tsr_flash_set('error', implode(' ', $errors));
    header('Location: contactus.php#contact-form');
    exit;
}

$data = [
    'full_name' => $fullName,
    'email'     => $email,
    'company'   => $company,
    'phone'     => $phone,
    'service'   => $service,
    'message'   => $message,
];

tsr_save_submission('contact', $data);

$body = "New contact form submission\n\n"
    . "Name: {$fullName}\n"
    . "Email: {$email}\n"
    . "Company: {$company}\n"
    . "Phone: {$phone}\n"
    . "Service: {$service}\n\n"
    . "Message:\n{$message}\n";

tsr_send_mail('New Contact — ' . $fullName, $body, $email);

tsr_flash_set('success', 'Thank you! Your message has been sent. We will reply within 1 business day.');
header('Location: contactus.php#contact-form');
exit;
