<?php
/**
 * Quote form POST handler. Include before any HTML output.
 */
require_once __DIR__ . '/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['tsr_form']) || $_POST['tsr_form'] !== 'quote') {
    return;
}

$config = tsr_config();

$companyName = trim((string) ($_POST['company_name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$contactName = trim((string) ($_POST['contact_name'] ?? ''));
$industry = trim((string) ($_POST['industry'] ?? ''));

$errors = [];
if ($companyName === '') {
    $errors[] = 'Company name is required.';
}
if ($contactName === '') {
    $errors[] = 'Contact name is required.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email address is required.';
}
if ($industry === '') {
    $errors[] = 'Please select an industry.';
}

if ($errors) {
    tsr_flash_set('error', implode(' ', $errors));
    header('Location: getquote.php#tsrlm-submit-area');
    exit;
}

$fields = [
    'company_name', 'website', 'industry', 'company_size', 'country', 'state',
    'contact_name', 'email', 'phone', 'linkedin_catalog_link',
    'show_name', 'show_dates', 'event_location', 'booth_size',
    'budget_range', 'timeline', 'additional_information',
];

$data = [];
foreach ($fields as $field) {
    $data[$field] = trim((string) ($_POST[$field] ?? ''));
}
$data['services'] = array_values(array_filter((array) ($_POST['services'] ?? [])));
$data['expansion'] = array_values(array_filter((array) ($_POST['expansion'] ?? [])));
$data['marketing'] = array_values(array_filter((array) ($_POST['marketing'] ?? [])));
$data['uploaded_files'] = [];

tsr_ensure_dirs();
if (!empty($_FILES['project_files']) && is_array($_FILES['project_files']['name'])) {
    $allowed = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip', 'png', 'jpg', 'jpeg'];
    $count = count($_FILES['project_files']['name']);
    for ($i = 0; $i < $count; $i++) {
        if ((int) $_FILES['project_files']['error'][$i] !== UPLOAD_ERR_OK) {
            continue;
        }
        $original = (string) $_FILES['project_files']['name'][$i];
        $ext = strtolower(pathinfo($original, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed, true)) {
            continue;
        }
        if ((int) $_FILES['project_files']['size'][$i] > 10 * 1024 * 1024) {
            continue;
        }
        $safe = date('YmdHis') . '-' . bin2hex(random_bytes(4)) . '.' . $ext;
        $dest = $config['upload_dir'] . DIRECTORY_SEPARATOR . $safe;
        if (move_uploaded_file($_FILES['project_files']['tmp_name'][$i], $dest)) {
            $data['uploaded_files'][] = $safe;
        }
    }
}

$id = tsr_save_submission('quote', $data);

$lines = ["New quote request ({$id})", ''];
foreach ($data as $key => $value) {
    if (is_array($value)) {
        $value = $value ? implode(', ', $value) : '(none)';
    }
    $lines[] = ucwords(str_replace('_', ' ', $key)) . ': ' . $value;
}

tsr_send_mail('New Quote — ' . $companyName, implode("\n", $lines), $email);

tsr_flash_set('success', 'Your project request was submitted successfully. Our team will follow up shortly.');
header('Location: getquote.php?sent=1#tsrlm-submit-area');
exit;
