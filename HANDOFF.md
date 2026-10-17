# Handoff – raus aus dem gift / Morgenlicht

Stand: 17.10.2026 · Branch `ccr-f942540f-fj8obc` (noch nicht nach `main` gemergt, kein PR offen)

Lies zuerst `DESIGN.md`. Es legt Farben, Schriften, Tonalität und Pflichtinhalte fest und hat Vorrang vor allgemeinen Design-Skills.

## Worum es geht

Statische Landingpage für den kostenlosen Sonntags-Newsletter **Morgenlicht** von *raus aus dem gift* (Absenderin Verena Maria, mail@rausausdemgift.de). Kein Build-Schritt, reines HTML/CSS/JS. Saubere URLs über Ordner (`/datenschutz/`, `/impressum/`).

| Pfad | Inhalt |
|---|---|
| `index.html` | Landingpage mit Anmeldeformular (`#brevo-form`) |
| `datenschutz/`, `impressum/` | Rechtstexte. Die Datenschutzerklärung beschreibt Brevo und Double-Opt-In. |
| `netlify/functions/newsletter-anmelden.mjs` | Server-Funktion für die Anmeldung, Pfad `/api/newsletter` |
| `netlify.toml` | `publish = "."`, Functions-Ordner |
| `automation/newsletter-freigabe/` | n8n-Workflow: Freigabe des Newsletters per Telegram, Versand über Brevo |
| `.env.example` | Vorlage aller Variablen (Brevo, Telegram, Anthropic) |
| `.claude/skills/frontend-design/` | Skill aus anthropics/claude-code, unverändert bis auf den Lizenz-Verweis |

## Was in dieser Sitzung gebaut wurde

### 1. Anmeldeformular ohne API-Key im Browser
- Vorher stand der Brevo-Key im Client-Code. Außerdem ging keine Double-Opt-In-Mail raus, obwohl Seite und Datenschutzerklärung eine versprechen.
- Jetzt: Das Formular sendet `{vorname, email, consent, website}` an `/api/newsletter`.
- Die Function prüft die Eingaben und ruft dann `POST /v3/contacts/doubleOptinConfirmation` auf.
- `website` ist ein Honeypot-Feld gegen Bots.
- Getestet: die Function lokal gegen ein gemocktes Brevo, das Formular per Playwright mit abgefangenem `/api/newsletter`.
- **Nicht getestet:** gegen das echte Brevo und auf der Live-Seite.

### 2. Newsletter-Freigabe per Telegram (n8n)
Ablauf:
1. Eine Cowork-Aufgabe schreibt samstags den Newsletter und legt ihn als Brevo-Kampagnen-Entwurf mit Tag `morgenlicht` an. Die Anleitung steht in `cowork-aufgabe.md`; der Gmail-Entwurf entfällt.
2. n8n sucht samstags um 14 Uhr (Cron `0 14 * * 6`, Europe/Berlin) den neuesten Entwurf, schickt eine Testmail und eine Telegram-Vorschau mit Buttons.
3. Der Button **Freigeben** plant den Versand für Sonntag 08:00 an Liste 12. Wird erst sonntags nach 8 Uhr freigegeben, geht er 10 Minuten später raus.
4. Eine **Antwort auf die Vorschau** wird zum Änderungswunsch: Claude (`claude-opus-5-5`, effort `medium`, `fallbacks: "default"`) überarbeitet das HTML, n8n aktualisiert den Brevo-Entwurf und schickt eine neue Vorschau.

Weitere Details:
- Die Chat-ID wird geprüft, fremde Chats werden ignoriert. Nur `/id` beantwortet der Bot jedem, mit dessen eigener Chat-ID.
- Der Workflow ist eine einzige JSON-Datei mit zwei Triggern. Erzeugt wurde sie per Skript; bei Änderungen die JSON direkt bearbeiten.
- Die Code-Nodes sind syntax- und logikgeprüft (Node, Luxon).
- **Nicht in einem echten n8n importiert oder ausgeführt.**

## Feste Werte (Brevo-Konto)

| Was | Wert |
|---|---|
| Liste „Newsletter RADG“ | ID `12` (ca. 335 Kontakte) |
| Absender „Verena \| Raus aus dem Gift“ | ID `4`, mail@rausausdemgift.de |
| Double-Opt-In-Vorlage | ID `8` („RADG NEWSLETTER DEFAULT Double OptIn“) |
| Bestätigungs-Vorlage | ID `10` (final_confirmation) |
| Vorname-Attribut | `FIRSTNAME` (ein Attribut `VORNAME` existiert nicht) |
| Kampagnen-Tag für Morgenlicht | `morgenlicht` |

Andere Listen im Konto (nicht anfassen): 17 „Newsletter ohne Workbook“, 18 „Story Boundary Checkliste“, 19 „Fragebogen“, 20 „Manychat Email“.

## Offen / nächste Schritte

1. **Hosting klären.** Unter den Netlify-Projekten des Nutzers wurde keins für rausausdemgift.de gefunden. Laut Git-Historie gab es früher eine `.htaccess`, also evtl. Apache. Läuft die Seite nicht auf Netlify, existiert `/api/newsletter` nicht. Dann die Function auf den tatsächlichen Hoster portieren, z. B. PHP-Endpoint oder n8n-Webhook auf dem geplanten VPS.
2. **Netlify-Umgebungsvariable** `BREVO_API_KEY` setzen; optional `BREVO_LIST_ID`, `BREVO_DOI_TEMPLATE`, `DOI_REDIRECT_URL`. Danach eine Testanmeldung mit eigener Adresse machen.
3. **VPS für n8n.** Empfehlung: netcup VPS 500 (2 vCores, 4 GB RAM). Preise vor Kauf prüfen, seit G12.5 widersprüchliche Angaben.
   - Angeboten, aber noch nicht gebaut: `docker-compose.yml` mit n8n, PostgreSQL und Caddy samt Anleitung.
   - Telegram braucht HTTPS, also eine Subdomain wie `n8n.rausausdemgift.de`.
4. **n8n einrichten** laut `automation/newsletter-freigabe/README.md`:
   - Credentials anlegen.
   - Platzhalter `DEINE_TELEGRAM_CHAT_ID` und `DEINE_TEST_EMAIL` ersetzen.
   - Workflow aktivieren.
5. **Erster echter Durchlauf** – zwei Punkte, die mangels echtem Lauf ungeprüft sind:
   - Setzt `PUT /emailCampaigns/{id}` mit `scheduledAt` einen Entwurf wirklich auf „geplant“?
   - Akzeptiert `sendTest` die Testadresse? Falls nicht, muss sie als Brevo-Test-Kontakt angelegt werden.
6. **Cowork-Aufgabe** auf den Brevo-Entwurf umstellen (Text in `cowork-aufgabe.md`). Der Brevo-Connector muss in Cowork aktiv sein.
7. **Angeboten, noch nicht gebaut:** ein Projekt-Skill `.claude/skills/formular-brevo/`, der das Formular-Muster festhält (Function, Double-Opt-In, Honeypot, DSGVO-Einwilligung, Barrierefreiheit nach `DESIGN.md`).

## Regeln für die Weiterarbeit

- Niemals API-Keys in Client-Code oder ins Repo. `.env` ist in `.gitignore`; Vorlagen nur als `.env.example` ohne Werte.
- Nichts an Liste 12 senden oder Kampagnen planen ohne ausdrückliche Freigabe. Das sind echte Abonnent:innen.
- Texte und Kommentare auf Deutsch, Tonalität laut `DESIGN.md` (du-Ansprache, warm, kein Marketing-Sprech).
- Pflicht in Newsletter und Footer: Hilfe-Hinweis aus `DESIGN.md` §9 und der Abschluss „Pass gut auf dich auf. Deine Verena Maria“.
- Kein Tracking, keine externen Bibliotheken ohne Not (`DESIGN.md` §11).

## Schnell testen

```bash
# Seite lokal ansehen
python3 -m http.server 8000      # http://localhost:8000

# Mit Function (braucht Netlify CLI und eine .env mit BREVO_API_KEY)
cp .env.example .env && netlify dev
```

Achtung: Eine Anmeldung über `netlify dev` mit echtem Key verschickt eine echte Double-Opt-In-Mail. Zum Testen nur eigene Adressen nehmen.
