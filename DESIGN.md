# DESIGN.md · raus aus dem gift

Design-System für alle digitalen Produkte von **raus aus dem gift** (Instagram @raus_aus_dem_gift, Absenderin: Verena Maria): Landingpages, Verkaufsseiten, Newsletter, PDFs, Social-Grafiken.
Richtung: **„Blüte“**. Weiblich, ruhig, warm. Viel Weißraum, feine Linien, Serifen in kursiven Kleinbuchstaben.

Claude Code: Halte dich an diese Werte. Erfinde keine neuen Farben, Schriften oder Schatten. Wenn etwas fehlt, leite es aus den vorhandenen Tokens ab.

---

## 1. Haltung und Sprache

- **Zielgruppe:** Menschen, die toxische Beziehungen und Narzissmus erlebt haben, oft Mütter und Väter mit einem narzisstischen (Ex-)Partner. Sie lesen meist am Handy, abends und erschöpft.
- **Gefühl:** „Endlich versteht mich jemand, und hier ist ein Plan.“
- **Ton:** Du-Form, warm, auf Augenhöhe, ruhig. Kurze, klare Sätze.
- **Nie:** Panikmache, Diagnosen über Ex-Partner, Countdown-Timer, Pop-ups, „NUR HEUTE!!!“, Fake-Verknappung, Emojis in Überschriften.
- **Markenname** immer klein: „raus aus dem gift“.
- **Überschriften** sind kleingeschrieben und kursiv (z. B. „wo stehst du gerade?“). Fließtext, Buttons und Labels folgen der normalen Rechtschreibung.
- **Schlusszeile** (Footer, PDFs): „es war nie zu viel von dir. es war zu viel gift.“
- **Hilfe-Hinweis** steht auf jeder Seite und in jedem Produkt (siehe 9.).

## 2. Farben

```css
:root {
  --plum:        #4A2C3D; /* Text, dunkle Flächen, Hero */
  --plum-soft:   #6B4A5D; /* Sekundärtext auf Hell, Linien auf Dunkel */
  --mauve:       #8A6275; /* Icons, Checkbox-Rahmen, dezente Akzente */
  --cream:       #FBF4F0; /* Seitenhintergrund */
  --powder:      #F3E6E1; /* Karten, Abschnittswechsel */
  --powder-2:    #EEDFD9; /* Karten auf Puder, große Kreise */
  --line:        #E6D0D8; /* feine Linien, Sekundärtext auf Dunkel */
  --line-2:      #D9C3CB; /* Feldrahmen, gestrichelte Platzhalter */
  --rose:        #EBC3BA; /* heller Akzent auf Dunkel, Logo-Punkt */
  --berry:       #B8565A; /* Buttons, große Zahlen, Akzent */
  --berry-hover: #A44B50;
  --chat-grey:   #E9E2E4; /* Chat-Blase „Sie/er schreibt“ */
  --error:       #9E3B3F;
  --error-bg:    #F8E3E3;
}
```

**Regeln**
- Höchstens zwei Flächenfarben pro Seite im Wechsel: `--cream` und `--plum`, dazwischen `--powder` für Abschnitte.
- `--berry` nur für Buttons, Zahlen und Schrift ab 24px. **Nie** für Fließtext auf Hell (Kontrast).
- Fließtext auf Hell: `--plum` oder `--plum-soft`. Auf Pflaume: `--cream` oder `--line`.
- Keine Verläufe als Hintergrund, kein Reinweiß als Seitenfläche (Weiß nur für Formular- und Chat-Karten).

## 3. Typografie

```css
--font-serif: 'Cormorant Garamond', Georgia, serif; /* 500, 500 italic */
--font-sans:  'Jost', system-ui, sans-serif;        /* 400, 500 */
```
Schriften **lokal einbinden** (DSGVO), nicht von Google laden.

| Rolle | Schrift | Größe | Zeilenhöhe | Stil |
|---|---|---|---|---|
| H1 | Serif 500 italic | `clamp(38px, 7vw, 64px)` | 1.02 | klein, `text-wrap: balance` |
| H2 | Serif 500 italic | `clamp(32px, 6vw, 46px)` | 1.05 | klein |
| H3 / Kartentitel | Serif 500 italic | 24–28px | 1.1 | klein |
| Große Zahl | Serif 500 | 26–44px | 1 | Farbe `--berry` |
| Zitat | Serif 500 italic | 23–30px | 1.25 | |
| Label / Eyebrow | Sans 400 | 12px | – | GROSS, `letter-spacing: .18em` |
| Fließtext | Sans 400 | 17px mobil, 16–17px Desktop | 1.65 | max. 62ch, `text-wrap: pretty` |
| Klein / Hinweis | Sans 400 | 13–14px | 1.6 | `--plum-soft` |
| Button | Sans 500 | 17px | 1 | |

Hervorhebung im Text: `font-weight: 500`, nie fett 700, nie unterstrichen (außer Links).

## 4. Abstände, Raster, Formen

- **Abstands-Skala:** 4 · 8 · 12 · 16 · 22 · 28 · 36 · 48 · 64 · 72 · 80 px.
- **Abschnitte:** `padding: 72px 22px` mobil, Inhalt `max-width: 1100px; margin: 0 auto`. Textspalten max. 720px.
- **Breakpoint** für Zweispaltigkeit: 900px. Raster mit `repeat(auto-fit, minmax(260px, 1fr))` statt fester Spalten.
- **Radien:** Karten 20–24px · Formularfelder 14px · Buttons/Chips 999px · Bild-Bogen `120px 120px 22px 22px` · A4-Mockups 10–16px.
- **Linien:** 1px `--line` als Trenner, Listen mit `border-bottom: 1px solid var(--line)`.
- **Schatten:** möglichst keine. Falls nötig nur weich: `0 20px 40px rgba(74,44,61,.12)`.
- Layouts mit Flex/Grid und `gap`, keine Abstände über Margins zwischen Geschwistern.

## 5. Logo

Linien-Motiv „Morgenlicht“: Horizont, aufgehender Bogen, kleiner Kreis.
```html
<svg viewBox="0 0 100 60" width="38" height="23" fill="none" stroke-linecap="round" aria-hidden="true">
  <path d="M14 50H86" stroke="currentColor" stroke-width="4"/>
  <path d="M30 50A20 20 0 0 1 62 34" stroke="currentColor" stroke-width="4"/>
  <circle cx="72" cy="20" r="6.5" fill="#EBC3BA"/>
</svg>
```
- Daneben die Wortmarke „raus aus dem gift“ in Serif italic 20–22px, gap 10px.
- Linienfarbe `--plum` auf Hell, `--cream` auf Dunkel. Der Kreis bleibt immer `--rose`.
- Mindestbreite 28px. Nicht verzerren, nicht füllen, keine Schatten.

## 6. Komponenten

### Button (primär)
```css
.btn { display:flex; align-items:center; justify-content:center;
  min-height:52px; padding:0 34px; border-radius:999px;
  background:var(--berry); color:var(--cream);
  font:500 17px/1 var(--font-sans); text-decoration:none; }
.btn:hover { background:var(--berry-hover); }
.btn:focus-visible { outline:3px solid var(--rose); outline-offset:3px; }
```
Mobil volle Breite (max. 420px). Sekundär: `background: var(--plum)`. Auf Pflaume-Fläche optional `background: var(--rose); color: var(--plum)`.
Button-Texte sagen, was passiert: „Ja, schick mir die 3 Antworten“, „Jetzt für 19 € sichern“.

### Karte
`background: var(--cream)` auf Puder bzw. `var(--powder)` auf Creme, Radius 22, Padding `28px 26px`, innen `flex-direction: column; gap: 12px`. Aufbau: Label → Serif-Titel → Text.

### Label über Abschnitten
`TEIL 01 · CHECKLISTE` – Sans 12px, Großbuchstaben, `.18em`, `--plum-soft` (auf Dunkel `--rose`). Trennzeichen „ · “.

### Checkliste
Zeile: `display:flex; gap:14px; padding:9px 0; border-bottom:1px solid var(--powder)`. Kästchen 15×15, Rand 1.5px `--mauve`, Radius 4. Abgehakt: gefüllt `--mauve`.

### Chat-Blasen (Antwortvorlagen)
- Links „Sie/er schreibt“: `--chat-grey` (oder weiß mit Rand `--line`), Text kursiv `--plum-soft`, Radius `22px 22px 22px 6px`.
- Rechts „Du antwortest“: `--berry` oder `--plum`, Text `--cream`, Radius `22px 22px 6px 22px`.
- Darüber jeweils ein Label (12px, Großbuchstaben). Max. 86% Breite.
- Darunter: „**Warum das wirkt:** …“ in 14px.

### Zeitstrahl / Phasen
Liste von Karten mit großer Zahl (Serif, `--berry`), Label (z. B. „WOCHE 1“) und Serif-Titel. Mobil vertikal, ab 900px als Raster.

### Formularfeld
Höhe 52px, Rand 1.5px `--line-2`, Radius 14, Hintergrund `--cream`, Label sichtbar darüber (Sans 14px 500). Fokus: Rand `--plum` + `outline: 3px solid var(--rose)`. Fehler: Rand `--error`, Meldung darunter 14px `--error`.

### Checkbox mit Einwilligung
22×22, Rand 1.5px `--mauve`, Radius 6, das ganze Label klickbar. Nie vorausgewählt.

### FAQ
`<details>` mit `border-bottom: 1px solid var(--line-2)`, `padding: 18px 0`, Summary Sans 500, rechts „+“ in `--mauve`, Antwort `--plum-soft`.

### Hinweis-Kasten
`--powder`, Radius 14–18, Label „WICHTIG“, Text 14px.

### Bild-Platzhalter
Gestrichelter Rand 1px `--mauve`, Hintergrund `--powder-2`, Text in eckigen Klammern: `[FOTO]`, `[MOCKUP]`.

## 7. Bildsprache

- Eigene, ruhige Fotos: helles Tageslicht, Fenster, Tee, Hände, Spaziergänge, ausgedruckte Seiten. Kleidung in Beere, Rosé oder Creme.
- Keine Stockfotos mit weinenden Menschen, keine zerbrochenen Herzen, keine Warnsymbole.
- Produkt-Mockups: aufgefächerte A4-Seiten (Deckblatt Pflaume vorn), Laptop oder Hardcover. Hintergrund `--powder` mit großem Kreis `--powder-2`.
- Porträt in Bogenform.

## 8. Bewegung

- Sparsam: Einblenden mit `opacity` und `translateY(8px)`, 300–600ms, `ease-out`.
- Chat-Antwort darf verzögert erscheinen (Spannungsmoment).
- `prefers-reduced-motion: reduce` → keine Bewegung.
- Kein Parallax, keine Endlos-Animationen, kein Wackeln von Buttons.

## 9. Pflichtinhalte

**Hilfe-Hinweis** (Footer, PDFs, Newsletter):
> Diese Inhalte ersetzen keine rechtliche, psychologische oder therapeutische Beratung. Bei Gewalt oder akuter Gefahr: Polizei 110 · Hilfetelefon Gewalt gegen Frauen 116 016 · Hilfetelefon Gewalt an Männern 0800 1239900 · Nummer gegen Kummer, Elterntelefon 0800 111 0 550.

**Footer:** Pflaume-Fläche, Hilfe-Hinweis, Links Impressum · Datenschutz (· AGB/Widerruf bei Verkauf), Schlusszeile in Serif italic.

**Newsletter:** heißt „Morgenlicht“, Unterzeile „dein Brief für den Sonntagmorgen“, Abschluss „Pass gut auf dich auf. Deine Verena Maria“.

## 10. Barrierefreiheit

- Kontrast Text mind. 4.5:1. `--berry` nur für große Schrift und Buttons.
- Eine H1 pro Seite, logische Überschriftenfolge.
- Trefferflächen mind. 44px, Buttons 52px.
- Sichtbare Fokus-Stile, Labels statt Platzhalter, Fehler mit `aria-describedby`, Statusmeldungen mit `aria-live="polite"`.
- Alt-Texte beschreiben den Inhalt („Das Elternpaket: Deckblatt, Checkliste und Handlungsplan als PDF“).
- `lang="de"`.

## 11. Technik

- Mobile first, optimiert für 375px, kein horizontales Scrollen.
- Kein Tracking, keine Cookie-Banner nötig, keine externen Bibliotheken außer was ein Produkt zwingend braucht (z. B. Payhip-Skript).
- Schriften und Bilder lokal, Bilder als WebP/PNG mit `width`/`height`.
- Preise und Fristen an einer Stelle im Code pflegen (Einführungspreis 19 €, regulär 27 €).

## 12. Bestehende Referenzen im Projekt

| Datei | Wofür |
|---|---|
| `Verkaufsseite Elternpaket.dc.html` | Referenz für Seitenaufbau, Karten, Chat, Zeitstrahl, FAQ, Footer |
| `Elternpaket Narzissmus.dc.html` | Referenz für Druck-/PDF-Layouts, Checkliste, Protokoll |
| `Freebie 3 Antworten.dc.html` | Gratis-PDF, Chat-Vorlagen |
| `Landingpage.dc.html` | Newsletter-Landingpage Morgenlicht |
| `Newsletter Blüte.html` | E-Mail-Vorlage (Tabellen-Layout, websichere Schriften) |
| `design_handoff_optin/README.md` | Opt-in-Seite mit Brevo-Anbindung |
