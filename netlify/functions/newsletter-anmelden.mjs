/* ------------------------------------------------------------
   Newsletter-Anmeldung Morgenlicht (Netlify Function)

   Das Formular auf der Landingpage schickt Vorname + E-Mail an
   /api/newsletter. Erst hier, auf dem Server, wird der Brevo-API-Key
   verwendet – im Browser ist er nie sichtbar.

   Brevo verschickt die Double-Opt-In-Mail (Vorlage 8). Erst nach
   dem Klick auf den Bestätigungslink landet der Kontakt in der
   Liste „Newsletter RADG“ (ID 12).

   Umgebungsvariablen in Netlify (Project configuration → Environment variables):
   – BREVO_API_KEY       (Pflicht)
   – BREVO_LIST_ID       (optional, Standard 12)
   – BREVO_DOI_TEMPLATE  (optional, Standard 8)
   – DOI_REDIRECT_URL    (optional, Seite nach dem Bestätigungsklick)
------------------------------------------------------------ */

const EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

const json = (body, status = 200) =>
  new Response(JSON.stringify(body), {
    status,
    headers: { 'Content-Type': 'application/json; charset=utf-8', 'Cache-Control': 'no-store' },
  });

export default async (req) => {
  if (req.method !== 'POST') return json({ error: 'method_not_allowed' }, 405);

  const apiKey = process.env.BREVO_API_KEY;
  if (!apiKey) {
    console.error('BREVO_API_KEY fehlt');
    return json({ error: 'not_configured' }, 500);
  }

  let data;
  try {
    data = await req.json();
  } catch {
    return json({ error: 'invalid_body' }, 400);
  }

  // Honeypot: Menschen sehen das Feld nicht, Bots füllen es aus
  if (data.website) return json({ ok: true });

  const email = String(data.email || '').trim().toLowerCase();
  const vorname = String(data.vorname || '').trim().slice(0, 80);
  if (!vorname || email.length > 254 || !EMAIL_RE.test(email) || data.consent !== true) {
    return json({ error: 'invalid_input' }, 400);
  }

  const res = await fetch('https://api.brevo.com/v3/contacts/doubleOptinConfirmation', {
    method: 'POST',
    headers: { 'api-key': apiKey, 'Content-Type': 'application/json', Accept: 'application/json' },
    body: JSON.stringify({
      email,
      attributes: { FIRSTNAME: vorname },
      includeListIds: [Number(process.env.BREVO_LIST_ID || 12)],
      templateId: Number(process.env.BREVO_DOI_TEMPLATE || 8),
      redirectionUrl: process.env.DOI_REDIRECT_URL || 'https://www.rausausdemgift.de/',
    }),
  });

  if (res.ok) return json({ ok: true });

  const detail = await res.text().catch(() => '');
  console.error('Brevo-Fehler', res.status, detail);
  return json({ error: 'brevo_error' }, 502);
};

export const config = { path: '/api/newsletter' };
