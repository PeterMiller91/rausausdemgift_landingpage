<?php
/* ------------------------------------------------------------
   BREVO CONFIG · Morgenlicht
   Kopiere diese Datei nach api/config.php und trage den API-Key ein.
   api/config.php steht in .gitignore und landet nie im Repository.
   Den Key findest du in Brevo → Einstellungen → SMTP & API → API-Keys.
------------------------------------------------------------ */
return [
    'api_key'     => 'xkeysib-…',

    // Brevo-Liste „Morgenlicht“ (Kontakte → Listen → ID in der Spalte/URL)
    'list_id'     => 0,

    // Brevo-Vorlage „MORGENLICHT Double OptIn“
    'template_id' => 30,

    // Seite, auf der man nach dem Klick in der Bestätigungsmail landet
    'redirect_url' => 'https://rausausdemgift.de/bestaetigt',
];
