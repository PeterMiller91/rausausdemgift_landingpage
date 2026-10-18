# Handoff für Claude Cowork · Newsletter „Morgenlicht“

Dieses Dokument ist die Arbeitsgrundlage für eine **wöchentlich wiederkehrende Cowork-Aufgabe**: Jede Woche schreibst du eine Ausgabe des Newsletters *Morgenlicht* und legst sie als **Entwurf in Brevo** an. Verena Maria prüft ihn und gibt ihn frei. Du versendest nie selbst.

Grundlage ist die Landingpage `index.html` in diesem Repository und das Design-System `DESIGN.md`. Was die Landingpage verspricht, muss jede Ausgabe halten.

---

## 1. Auf einen Blick

| | |
|---|---|
| **Name** | Morgenlicht – dein Brief für den Sonntagmorgen |
| **Absenderin** | Verena Maria · raus aus dem gift (Instagram @raus_aus_dem_gift) |
| **Erscheint** | jeden Sonntag, Versand 08:00 Uhr (Europe/Berlin) |
| **Entwurf fertig** | spätestens Samstag 12:00 Uhr |
| **Brevo-Liste** | „Morgenlicht-Newsletter“, **ID 21** |
| **Brevo-Absender** | ID 4 · „Verena \| Raus aus dem Gift“ · mail@rausausdemgift.de |
| **Kampagnen-Tag** | `morgenlicht` |
| **Kosten für Leser** | kostenlos, jederzeit abmeldbar |
| **Länge** | 350–600 Wörter, in ca. 4 Minuten gelesen |

---

## 2. Für wen du schreibst

Menschen, die eine toxische Beziehung oder Narzissmus erlebt haben oder noch mittendrin stecken. Oft Mütter und Väter mit einem narzisstischen (Ex-)Partner. Auch Familie und Freundschaft zählen dazu.

Sie lesen meist **am Handy, müde, oft allein**. Sie zweifeln an sich selbst und brauchen Klarheit statt Drama.

Die Landingpage spricht genau diese Sätze an. Sie sind der Kern jedes Themas:
- Du fragst dich, ob du selbst das Problem warst – oder bist.
- Du weißt nicht mehr, was in einer Beziehung „normal“ ist.
- Du erschöpfst dich damit, die Kinder aus dem Konflikt rauszuhalten.
- Auf gute Tage folgen ohne Warnung schlechte – und du weißt nicht, warum.
- Du willst stark sein, aber eine einzige Nachricht wirft dich zurück.

**Gefühl nach dem Lesen:** „Endlich versteht mich jemand, und hier ist ein Plan.“

---

## 3. Das Versprechen (jede Ausgabe muss es halten)

Die Landingpage verspricht wörtlich **drei Dinge, die du jeden Sonntag bekommst**. Jede Ausgabe enthält alle drei, in dieser Reihenfolge:

1. **Orientierung – „du verstehst, was passiert ist“**
   Eine klare Erklärung, was in toxischen Mustern passiert, in einfachen Worten. Zum Beispiel: warum du an dir zweifelst, warum du nicht einfach gehen konntest, warum sich alles so verwirrend anfühlt.
2. **Werkzeug – „du bekommst ein werkzeug für die woche“**
   Genau **ein** konkretes, sofort anwendbares Werkzeug: eine kleine Übung, eine Formulierung für die nächste schwierige Nachricht oder eine kurze Checkliste. Nichts Aufwändiges.
3. **Begleitung – „du bist nicht allein damit“**
   Die Erinnerung: Was du erlebt hast, ist real. Du bildest dir das nicht ein. Und es gibt einen Weg heraus.

Außerdem gilt laut Landingpage und FAQ:
- **Kein Magazin, kein Kurs.** Es ist ein **Brief** von Verena an *eine* Person.
- **Kostenlos, ohne versteckte Angebote, ohne Trick.** Kein Verkauf im Newsletter, solange Verena das nicht ausdrücklich für eine Ausgabe vorgibt. Ein Hinweis auf kostenlose Inhalte, zum Beispiel einen Instagram-Beitrag, ist okay.
- **Keine Therapie, keine Beratung.** Nie so klingen, als ersetze der Brief eine Fachperson.

---

## 4. Ton und Sprache

Aus `DESIGN.md`, Abschnitt 1. Diese Regeln sind verbindlich.

- **Du-Form**, warm, auf Augenhöhe, ruhig. Kurze, klare Sätze. Kurze Absätze mit 1–3 Sätzen.
- Schreib **wie einen Brief an eine einzige Person**, nicht an „euch“ oder „alle“.
- Ich-Perspektive von Verena. Persönliche Erlebnisse von Verena **nur aus Material, das sie selbst geliefert hat**. Nichts erfinden (siehe Abschnitt 9).
- Konkret statt allgemein: lieber ein echtes Beispiel, zum Beispiel eine typische Nachricht vom Ex, als ein abstraktes Prinzip.
- **Nie:** Panikmache, Diagnosen über Ex-Partner („er ist Narzisst“), Countdown, „NUR HEUTE!!!“, Fake-Verknappung, Emojis in Überschriften oder im Betreff.
- Der Markenname wird immer klein geschrieben: „raus aus dem gift“.
- **Überschriften im Brief** sind kleingeschrieben und kursiv, zum Beispiel *„warum du nicht einfach gehen konntest“*. Fließtext folgt der normalen Rechtschreibung.
- Fachbegriffe (Gaslighting, Love Bombing, Trauma Bonding) nur mit einem Satz Erklärung.
- Kein Fett mit 700. Hervorhebung höchstens durch einzelne kursive Wörter.

---

## 5. Aufbau jeder Ausgabe

```
Betreff        → max. ~50 Zeichen, Nutzen oder Wiedererkennung, kein Clickbait
Vorschautext   → 1 Satz (~90 Zeichen), ergänzt den Betreff, wiederholt ihn nicht

[Label]        NEWSLETTER · MORGENLICHT · AUSGABE <Nr.>
[Überschrift]  kleingeschrieben, kursiv, beschreibt das Thema

Anrede         „Hallo {{ contact.FIRSTNAME | default : 'du' }},“
Einstieg       2–4 Sätze, eine Szene oder ein Satz, in dem sich die Leserin wiedererkennt
               (nie mit einer Binsenweisheit beginnen)

01 · orientierung   → was passiert da? (150–250 Wörter)
02 · werkzeug       → eine Übung, Formulierung oder Checkliste, klar abgesetzt
03 · begleitung     → 2–4 Sätze: „du bist nicht allein“, „es gibt einen Weg“

Abschluss      „Pass gut auf dich auf.
                Deine Verena Maria“
P.S. (optional) → eine Frage zum Antworten („Antworte mir gern: …“)
                  oder ein Hinweis auf einen kostenlosen Instagram-Beitrag

Fußbereich     Hilfe-Hinweis (Pflicht, wörtlich, siehe Abschnitt 7)
               Impressum · Datenschutz · Abmelden
               Schlusszeile: „es war nie zu viel von dir. es war zu viel gift.“
```

**Betreff-Beispiele** (Stil, nicht kopieren):
- „Warum dich eine einzige Nachricht so zurückwirft“
- „3 Sätze für die nächste Übergabe der Kinder“
- „Du bist nicht zu empfindlich“

Formuliere **pro Ausgabe 3 Betreff-Varianten**. Lege die beste in Brevo an und nenne die anderen beiden in deiner Zusammenfassung an Verena (Abschnitt 8).

---

## 6. Themen

### Themenregeln
- **Ein Thema pro Ausgabe.** Lieber tief als breit.
- Jedes Thema muss sich auf mindestens einen der fünf Sätze aus Abschnitt 2 zurückführen lassen.
- **Nicht wiederholen:** Rufe vor dem Schreiben die bisherigen Kampagnen mit dem Tag `morgenlicht` aus Brevo ab und prüfe Betreff und Inhalt der letzten 12 Ausgaben.
- Verena kann ein Thema für die Woche vorgeben. Das hat immer Vorrang.

### Start-Themenplan (12 Wochen)
| # | Thema | Werkzeug der Woche |
|---|---|---|
| 1 | Warum du dich fragst, ob du das Problem bist | 3 Fragen, um eigene Wahrnehmung zu prüfen |
| 2 | Was „normal“ in einer Beziehung eigentlich heißt | Checkliste: gesunde vs. toxische Muster |
| 3 | Warum eine einzige Nachricht dich zurückwirft | Die 24-Stunden-Regel für Antworten |
| 4 | Gute Tage, schlechte Tage: der Kreislauf | Ein Wochenprotokoll in 5 Minuten |
| 5 | Kinder aus dem Konflikt raushalten, ohne dich aufzureiben | 3 neutrale Sätze für Übergaben |
| 6 | Grauer Stein: wenig Angriffsfläche bieten | Vorlage für sachliche Kurzantworten |
| 7 | Warum du nicht „einfach gehen“ konntest | Übung: Selbstvorwürfe umschreiben |
| 8 | Schuldgefühle, die nicht deine sind | Satz-Vorlage: „Das ist nicht meine Verantwortung“ |
| 9 | Grenzen setzen, wenn du es nie durftest | Eine Grenze, ein Satz, eine Woche üben |
| 10 | Wenn andere dir nicht glauben | Wem du was erzählst: eine kleine Landkarte |
| 11 | Dich selbst wieder spüren | 2-Minuten-Übung für den Morgen |
| 12 | Rückblick: Was sich schon verändert hat | 5 Fragen zum Aufschreiben |

Danach führst du die Themen aus denselben fünf Sätzen weiter oder holst dir neue Themen von Verena.

---

## 7. Pflichtinhalte und Recht

1. **Hilfe-Hinweis** in jeder Ausgabe, wörtlich:
   > Diese Inhalte ersetzen keine rechtliche, psychologische oder therapeutische Beratung. Bei Gewalt oder akuter Gefahr: Polizei 110 · Hilfetelefon Gewalt gegen Frauen 116 016 · Hilfetelefon Gewalt an Männern 0800 1239900 · Nummer gegen Kummer, Elterntelefon 0800 111 0 550.
2. **Abmeldelink** mit dem Brevo-Platzhalter `{{ unsubscribe }}`.
3. Links zu **Impressum** (`https://rausausdemgift.de/impressum`) und **Datenschutz** (`https://rausausdemgift.de/datenschutz`).
4. Keine erfundenen Zitate, Leserstimmen oder Fallgeschichten, die als echt dargestellt werden (UWG). Beispiele kennzeichnest du als Beispiel („Stell dir vor …“, „Eine typische Nachricht könnte so klingen: …“).
5. Keine Rechtsberatung, zum Beispiel zum Sorgerecht. Bei solchen Themen auf Fachstellen verweisen (Anwältin, Jugendamt, Beratungsstelle).
6. Thematisiert eine Ausgabe Gewalt, Suizidgedanken oder akute Gefahr, kommt der Hilfe-Hinweis **zusätzlich** direkt in den Text, nicht nur in den Fußbereich.

---

## 8. Wöchentlicher Ablauf (Cowork)

**Jeden Samstag, Start ca. 09:00 Uhr:**

1. **Vorbereiten**
   - Bisherige Kampagnen mit dem Tag `morgenlicht` in Brevo abrufen, also Themen und Ausgabe-Nummer der Vorwoche.
   - Prüfen, ob Verena ein Wochenthema oder Material geschickt hat.
2. **Schreiben**
   - Thema wählen (Abschnitt 6), Text nach Abschnitt 5 schreiben.
   - Gegen die Checkliste in Abschnitt 10 prüfen.
3. **HTML bauen** nach der Vorlage in Abschnitt 11.
4. **Als Entwurf in Brevo anlegen** (`create_email_campaign`):
   - `name`: `Morgenlicht #<Nr.> – <TT.MM.JJJJ des Sonntags>`
   - `tag`: `morgenlicht`
   - `sender`: `{"id": 4}`
   - `replyTo`: `mail@rausausdemgift.de`
   - `recipients`: `{"listIds": [21]}`
   - `subject`, `previewText`, `htmlContent`
   - **Kein `scheduledAt`, kein Versand.**
5. **Zusammenfassung an Verena**, als Antwort in der Cowork-Aufgabe:
   - Thema und Ausgabe-Nummer
   - die 3 Betreff-Varianten (die gewählte zuerst)
   - der Klartext des Briefs (ohne HTML), damit sie ihn am Handy lesen kann
   - offene Fragen, falls etwas unklar war

**Verena** prüft den Entwurf, ändert ihn bei Bedarf in Brevo und plant ihn dort für **Sonntag 08:00 Uhr**.

> **Hinweis:** Auf dem Branch `ccr-f942540f-fj8obc` gibt es einen alternativen Ablauf mit Freigabe per Telegram über n8n. Er verschickt aktuell an Liste **12** („Newsletter RADG“). Für Morgenlicht gilt **Liste 21**. Falls Verena den Telegram-Ablauf nutzt, muss dort die Listen-ID angepasst werden.

---

## 9. Was du nie tust

- **Nie versenden** und nie einen Versandzeitpunkt setzen.
- Nie an eine andere Liste als **21** adressieren.
- Nie Kontakte anlegen, ändern oder löschen.
- Nie Erlebnisse, Zitate oder Zahlen über Verena oder Leser erfinden.
- Nie Diagnosen über konkrete Personen stellen.
- Nie Produkte oder Coachings verkaufen, solange Verena es nicht für die Ausgabe vorgibt.

---

## 10. Checkliste vor dem Anlegen

- [ ] Alle drei Teile da: Orientierung, **genau ein** Werkzeug, Begleitung
- [ ] Thema in den letzten 12 Ausgaben noch nicht behandelt
- [ ] Betreff: konkret, ohne Emoji, ohne Clickbait, max. ~50 Zeichen
- [ ] Erster Satz holt die Leserin ab, keine Binsenweisheit
- [ ] Kurze Sätze und Absätze, am Handy angenehm lesbar
- [ ] Du-Form, Ich-Perspektive Verena, nichts erfunden
- [ ] Keine Diagnose, keine Therapie- oder Rechtsberatung
- [ ] Anrede mit `{{ contact.FIRSTNAME | default : 'du' }}`
- [ ] Abschluss „Pass gut auf dich auf. Deine Verena Maria“
- [ ] Hilfe-Hinweis, Impressum, Datenschutz, `{{ unsubscribe }}`, Schlusszeile
- [ ] Liste 21, Tag `morgenlicht`, kein Versandzeitpunkt

---

## 11. HTML-Vorlage

Tabellen-Layout, websichere Schriften: Georgia statt Cormorant, Arial statt Jost. Farben aus `DESIGN.md`. Max. 560 px breit. `--berry` (#B8565A) nur für Buttons und große Zahlen, nie für Fließtext. Die Platzhalter `{{…}}` in Großbuchstaben ersetzt du, die Brevo-Platzhalter bleiben stehen.

```html
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Morgenlicht</title>
</head>
<body style="margin:0;padding:0;background:#FBF4F0;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#FBF4F0;">
  <tr><td align="center" style="padding:36px 16px;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:560px;">

      <!-- Kopf -->
      <tr><td style="padding:0 0 22px 0;font-family:Georgia,'Times New Roman',serif;font-style:italic;font-size:21px;color:#4A2C3D;">
        raus aus dem gift
      </td></tr>

      <!-- Brief -->
      <tr><td style="background:#FFFFFF;border-radius:22px;padding:36px 28px;">
        <p style="margin:0 0 12px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;letter-spacing:.18em;text-transform:uppercase;color:#6B4A5D;">Newsletter · Morgenlicht · Ausgabe {{NR}}</p>
        <h1 style="margin:0 0 22px 0;font-family:Georgia,'Times New Roman',serif;font-style:italic;font-weight:normal;font-size:32px;line-height:1.1;color:#4A2C3D;">{{UEBERSCHRIFT_KLEIN}}</h1>

        <p style="margin:0 0 16px 0;font-family:Arial,Helvetica,sans-serif;font-size:17px;line-height:1.65;color:#4A2C3D;">Hallo {{ contact.FIRSTNAME | default : 'du' }},</p>
        <!-- Einstieg: weitere <p> im gleichen Stil -->

        <!-- 01 Orientierung -->
        <p style="margin:28px 0 8px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;letter-spacing:.18em;text-transform:uppercase;color:#6B4A5D;">01 · Orientierung</p>
        <h2 style="margin:0 0 12px 0;font-family:Georgia,'Times New Roman',serif;font-style:italic;font-weight:normal;font-size:24px;line-height:1.15;color:#4A2C3D;">{{ZWISCHENUEBERSCHRIFT}}</h2>
        <!-- Text als <p> -->

        <!-- 02 Werkzeug: abgesetzte Karte -->
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:28px 0;">
          <tr><td style="background:#F3E6E1;border-radius:18px;padding:24px 22px;">
            <p style="margin:0 0 8px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;letter-spacing:.18em;text-transform:uppercase;color:#6B4A5D;">02 · Werkzeug für die Woche</p>
            <h2 style="margin:0 0 12px 0;font-family:Georgia,'Times New Roman',serif;font-style:italic;font-weight:normal;font-size:24px;line-height:1.15;color:#4A2C3D;">{{WERKZEUG_TITEL}}</h2>
            <!-- Übung / Formulierung / Checkliste als <p> bzw. Zeilen -->
          </td></tr>
        </table>

        <!-- 03 Begleitung -->
        <p style="margin:0 0 8px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;letter-spacing:.18em;text-transform:uppercase;color:#6B4A5D;">03 · Begleitung</p>
        <!-- 2–4 Sätze als <p> -->

        <p style="margin:28px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:17px;line-height:1.65;color:#4A2C3D;">Pass gut auf dich auf.<br>
          <span style="font-family:Georgia,'Times New Roman',serif;font-style:italic;font-size:21px;">Deine Verena Maria</span></p>
        <!-- optional: P.S. -->
      </td></tr>

      <!-- Fuß -->
      <tr><td style="padding:28px 8px 0 8px;font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:1.6;color:#6B4A5D;">
        Diese Inhalte ersetzen keine rechtliche, psychologische oder therapeutische Beratung. Bei Gewalt oder akuter Gefahr: Polizei 110 · Hilfetelefon Gewalt gegen Frauen 116 016 · Hilfetelefon Gewalt an Männern 0800 1239900 · Nummer gegen Kummer, Elterntelefon 0800 111 0 550.
        <br><br>
        <a href="https://rausausdemgift.de/impressum" style="color:#6B4A5D;">Impressum</a> ·
        <a href="https://rausausdemgift.de/datenschutz" style="color:#6B4A5D;">Datenschutz</a> ·
        <a href="{{ unsubscribe }}" style="color:#6B4A5D;">Abmelden</a>
        <br><br>
        <span style="font-family:Georgia,'Times New Roman',serif;font-style:italic;font-size:16px;color:#4A2C3D;">es war nie zu viel von dir. es war zu viel gift.</span>
      </td></tr>

    </table>
  </td></tr>
</table>
</body>
</html>
```

---

## 12. Text für die Cowork-Aufgabe (zum Einfügen)

Als **wiederkehrende Aufgabe, jeden Samstag um 09:00 Uhr**, mit aktivem **Brevo-Connector**:

> Schreibe die nächste Ausgabe des Newsletters „Morgenlicht“ von Verena Maria (raus aus dem gift). Halte dich genau an das Handoff-Dokument `docs/handoff-cowork-morgenlicht.md` im Repository `rausausdemgift_landingpage`: Zielgruppe, Ton, die drei Teile Orientierung · Werkzeug · Begleitung, Pflichtinhalte und HTML-Vorlage.
> 1. Rufe in Brevo die bisherigen Kampagnen mit dem Tag `morgenlicht` ab, bestimme die nächste Ausgabe-Nummer und vermeide Themen der letzten 12 Ausgaben.
> 2. Wähle das Thema: ein von Verena vorgegebenes Wochenthema, sonst das nächste offene Thema aus dem Themenplan.
> 3. Schreibe den Brief (350–600 Wörter) und 3 Betreff-Varianten. Prüfe alles gegen die Checkliste.
> 4. Lege die Ausgabe als **Entwurf** in Brevo an: Liste 21, Absender-ID 4, Tag `morgenlicht`, Name „Morgenlicht #<Nr.> – <Datum Sonntag>“. **Nicht versenden, keinen Versandzeitpunkt setzen.**
> 5. Antworte mit Thema, den 3 Betreffs, dem Brief als Klartext und offenen Fragen.
