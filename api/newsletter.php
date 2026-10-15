<?php
/* ------------------------------------------------------------
   Newsletter-Anmeldung Morgenlicht → Brevo (Double-Opt-In)
   Der API-Key bleibt hier auf dem Server und ist im Browser nie sichtbar.
------------------------------------------------------------ */
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

function respond(int $status, array $body): void {
    http_response_code($status);
    echo json_encode($body);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    respond(405, ['ok' => false, 'error' => 'method_not_allowed']);
}

$configFile = __DIR__ . '/config.php';
if (!is_file($configFile)) {
    respond(500, ['ok' => false, 'error' => 'not_configured']);
}
$config = require $configFile;
if (empty($config['api_key']) || empty($config['list_id']) || empty($config['template_id'])) {
    respond(500, ['ok' => false, 'error' => 'not_configured']);
}

$input   = json_decode(file_get_contents('php://input'), true) ?: [];
$vorname = trim((string)($input['vorname'] ?? ''));
$email   = trim((string)($input['email'] ?? ''));
$consent = !empty($input['consent']);
$honey   = trim((string)($input['website'] ?? ''));

// Honeypot: Bots füllen das versteckte Feld aus – still „erfolgreich“ beenden
if ($honey !== '') {
    respond(200, ['ok' => true]);
}

if ($vorname === '' || mb_strlen($vorname) > 100
    || !filter_var($email, FILTER_VALIDATE_EMAIL)
    || !$consent) {
    respond(400, ['ok' => false, 'error' => 'invalid_input']);
}

$payload = [
    'email'          => $email,
    'attributes'     => ['FIRSTNAME' => $vorname],
    'includeListIds' => [(int)$config['list_id']],
    'templateId'     => (int)$config['template_id'],
    'redirectionUrl' => $config['redirect_url'],
];

$ch = curl_init('https://api.brevo.com/v3/contacts/doubleOptinConfirmation');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 15,
    CURLOPT_HTTPHEADER     => [
        'api-key: ' . $config['api_key'],
        'Content-Type: application/json',
        'Accept: application/json',
    ],
    CURLOPT_POSTFIELDS     => json_encode($payload),
]);
$response = curl_exec($ch);
$status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($status >= 200 && $status < 300) {
    respond(200, ['ok' => true]);
}

error_log('Brevo DOI error ' . $status . ': ' . $response);
respond(502, ['ok' => false, 'error' => 'brevo_error']);
