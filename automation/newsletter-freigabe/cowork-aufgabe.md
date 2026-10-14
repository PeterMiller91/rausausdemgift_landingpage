# Ergänzung für die Cowork-Aufgabe (Samstag)

Diesen Abschnitt in der bestehenden Newsletter-Aufgabe **anstelle** von „Entwurf in Gmail anlegen“ einfügen:

---

**Ablage in Brevo (statt Gmail-Entwurf)**

Wenn der Newsletter fertig ist, lege ihn mit dem Brevo-Connector als **Entwurf** an (`create_email_campaign`). Nicht versenden und keinen Versandzeitpunkt setzen:

- `name`: „Morgenlicht – <Datum des kommenden Sonntags, z. B. 18.10.2026>“
- `tag`: `morgenlicht` (genau so, klein geschrieben, daran erkennt die Telegram-Freigabe den Entwurf)
- `sender`: `{"id": 4}` (Verena | Raus aus dem Gift, mail@rausausdemgift.de)
- `replyTo`: `mail@rausausdemgift.de`
- `recipients`: `{"listIds": [12]}` (Liste „Newsletter RADG“)
- `subject` und `previewText`: Betreff und Vorschautext des Newsletters
- `htmlContent`: das vollständige HTML im E-Mail-Layout (Tabellen-Layout, websichere Schriften), mit Abschluss „Pass gut auf dich auf. Deine Verena Maria“, dem Hilfe-Hinweis und einem Abmeldelink `{{ unsubscribe }}`

Kein `scheduledAt`, kein Versand. Freigabe und Versand laufen über Telegram.

---
