# Morgenlicht – Freigabe per Telegram, Versand über Brevo

```
Samstag (Cowork)          Samstag 14 Uhr (n8n)                  Du in Telegram
────────────────          ─────────────────────                 ──────────────
Newsletter schreiben  →   Brevo-Entwurf finden            →     Vorschau + Testmail
Brevo-Entwurf anlegen     Testmail an dich                      ✅ Freigeben  → geplant für So 08:00 an „Newsletter RADG“
(Tag „morgenlicht“)       Telegram-Vorschau mit Buttons         ✏️ Ändern / Antwort mit Wunsch
                                                                   → Claude überarbeitet den Entwurf in Brevo
                                                                   → neue Vorschau + Testmail, beliebig oft
```

Brevo ist die einzige Quelle für den Text: Cowork legt dort den Entwurf an, n8n überarbeitet ihn und plant den Versand.
Gmail-Entwürfe brauchst du dafür nicht mehr.

## Einrichtung (ca. 20 Minuten)

### 1. Telegram-Bot anlegen
1. In Telegram **@BotFather** öffnen → `/newbot` → Name z. B. „Morgenlicht Freigabe“.
2. Den **Bot-Token** aufheben.

### 2. Workflow in n8n importieren
1. In `morgenlicht-freigabe.n8n.json` zwei Platzhalter ersetzen (Suchen & Ersetzen im Editor):
   - `DEINE_TEST_EMAIL` → die Adresse für die Testmail (in Brevo als Test-Kontakt hinterlegen, falls Brevo meckert)
   - `DEINE_TELEGRAM_CHAT_ID` → erst mal so lassen, kommt in Schritt 4
2. n8n → *Workflows → Import from File* → Datei auswählen.
3. Drei Zugangsdaten anlegen und den Nodes zuweisen:

| Name in n8n | Typ | Inhalt |
|---|---|---|
| Telegram Morgenlicht-Bot | Telegram API | Bot-Token aus Schritt 1 |
| Brevo API | Header Auth | Name `api-key`, Wert: Brevo-API-Key (Brevo → SMTP & API → API-Keys) |
| Anthropic API | Header Auth | Name `x-api-key`, Wert: API-Key von console.anthropic.com |

### 3. Workflow aktivieren
Schalter oben rechts auf **Active**. Erst dann empfängt der Telegram-Trigger Nachrichten.

### 4. Chat-ID eintragen
1. Deinem Bot in Telegram `/id` schicken → er antwortet mit deiner Chat-ID.
2. In n8n überall `DEINE_TELEGRAM_CHAT_ID` durch diese Zahl ersetzen
   (Nodes: *Morgenlicht-Entwurf finden*, *Antwort auswerten*, *Antwort von Claude auswerten*, alle Telegram-Nodes mit fester Chat-ID).
   Einfacher: in der JSON-Datei ersetzen und neu importieren.
3. Nachrichten von anderen Chats ignoriert der Bot. Nur `/id` beantwortet er allen.

### 5. Cowork-Aufgabe anpassen
Den Text aus [`cowork-aufgabe.md`](cowork-aufgabe.md) in die Samstags-Aufgabe übernehmen.
In Cowork muss der **Brevo-Connector** aktiv sein.

### 6. Uhrzeit prüfen
Der Workflow sucht samstags um **14 Uhr** nach dem Entwurf (Node *Samstag 14 Uhr*, Cron `0 14 * * 6`).
Stell die Zeit so ein, dass sie **nach** dem Lauf der Cowork-Aufgabe liegt.

## Bedienung
- **✅ Freigeben**: Der Newsletter wird für **Sonntag 08:00 Uhr** an die Liste *Newsletter RADG* (ID 12) geplant.
  Gibst du ihn erst am Sonntag nach 8 Uhr frei, geht er 10 Minuten später raus.
  Stoppen kannst du ihn bis dahin in Brevo unter *Kampagnen*.
- **✏️ Ändern** oder einfach **auf die Vorschau antworten**, z. B. „Mach den Einstieg persönlicher und kürze den zweiten Absatz“.
  Nach 1–2 Minuten kommt die neue Vorschau mit Testmail. Das geht beliebig oft.

## Gut zu wissen
- **Erster Durchlauf**: Prüfe nach der ersten Freigabe in Brevo, ob die Kampagne als *geplant* erscheint.
- **Kosten**: Eine Überarbeitung kostet je nach Länge des Newsletters ein paar Cent (Claude-API).
- **Tests**: Mit *Test workflow* auf dem Node *Samstag 14 Uhr* kannst du den Ablauf jederzeit manuell starten.
  Dafür muss in Brevo ein Entwurf mit Tag `morgenlicht` existieren.
