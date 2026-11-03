<?php

function tsr_config(): array
{
    static $config;
    if ($config === null) {
        $config = require __DIR__ . '/../config.php';
    }
    return $config;
}

function tsr_esc(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function tsr_ensure_dirs(): void
{
    $config = tsr_config();
    foreach (['upload_dir', 'submission_dir'] as $key) {
        $dir = $config[$key];
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }
}

function tsr_save_submission(string $type, array $data): string
{
    tsr_ensure_dirs();
    $config = tsr_config();
    $id = date('Ymd-His') . '-' . bin2hex(random_bytes(4));
    $path = $config['submission_dir'] . DIRECTORY_SEPARATOR . $type . '-' . $id . '.json';
    $payload = [
        'id'         => $id,
        'type'       => $type,
        'created_at' => date('c'),
        'ip'         => $_SERVER['REMOTE_ADDR'] ?? '',
        'data'       => $data,
    ];
    file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    return $id;
}

function tsr_send_mail(string $subject, string $body, ?string $replyTo = null): bool
{
    $config = tsr_config();
    $to = $config['contact_email'];
    $fromName = $config['from_name'];
    $fromEmail = $config['from_email'];

    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . sprintf('%s <%s>', $fromName, $fromEmail),
        'X-Mailer: PHP/' . phpversion(),
    ];
    if ($replyTo) {
        $headers[] = 'Reply-To: ' . $replyTo;
    }

    return @mail($to, $subject, $body, implode("\r\n", $headers));
}

function tsr_flash_set(string $type, string $message): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    $_SESSION['tsr_flash'] = ['type' => $type, 'message' => $message];
}

function tsr_flash_get(): ?array
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (empty($_SESSION['tsr_flash'])) {
        return null;
    }
    $flash = $_SESSION['tsr_flash'];
    unset($_SESSION['tsr_flash']);
    return $flash;
}

function tsr_render_alert(?array $flash): string
{
    if (!$flash) {
        return '';
    }
    $class = $flash['type'] === 'success' ? 'tsr-alert tsr-alert-success' : 'tsr-alert tsr-alert-error';
    return '<div class="' . tsr_esc($class) . '" role="alert">' . tsr_esc($flash['message']) . '</div>';
}
