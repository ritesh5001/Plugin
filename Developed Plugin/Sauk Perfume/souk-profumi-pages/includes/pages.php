<?php
/**
 * Page definitions — every page's title + raw HTML content.
 * Content is wrapped in <!-- wp:html --> blocks and uses %%PLACEHOLDERS%%
 * resolved at runtime via the_content filter.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function sp_get_page_definitions() {
    return array(
    'sp-home'                => array( 'title' => 'Pagina iniziale',            'content' => sp_page_home() ),
    'about-us'               => array( 'title' => 'Chi siamo',                 'content' => sp_page_about() ),
    'services'               => array( 'title' => 'Le nostre collezioni',      'content' => sp_page_services() ),
    'contact'                => array( 'title' => 'Contatti',                  'content' => sp_page_contact() ),
    'privacy-policy'         => array( 'title' => 'Informativa sulla privacy',  'content' => sp_page_privacy() ),
    'terms-of-service'       => array( 'title' => 'Termini di servizio',        'content' => sp_page_tos() ),
    'terms-and-conditions'   => array( 'title' => 'Termini e condizioni',      'content' => sp_page_tc() ),
    'refund-policy'          => array( 'title' => 'Politica dei rimborsi',     'content' => sp_page_refund() ),
    'cancellation-policy'    => array( 'title' => 'Politica di cancellazione', 'content' => sp_page_cancel() ),
    'shipping-policy'        => array( 'title' => 'Politica di spedizione e gestione', 'content' => sp_page_shipping() ),
    );
}

/* ============================================================
 * HOME
 * ============================================================ */
function sp_page_home() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero sp-hero--home">
  <div class="sp-hero__inner">
    <img class="sp-hero__logo" src="%%BRAND_LOGO%%" alt="Souk Profumi"/>
    <span class="sp-eyebrow">Profumi Arabi di Nicchia</span>
    <h1 class="sp-h1">L'arte della profumeria araba e di nicchia</h1>
    <p class="sp-lede">Scopri una collezione curata con precisione di fragranze arabe autentiche e creazioni di nicchia rare, selezionate da maison affidabili e presentate con il rispetto che merita la vera profumeria.</p>
    <div class="sp-hero__cta">
      <a class="sp-btn sp-btn--primary" href="%%URL_SERVICES%%">Esplora le collezioni</a>
      <a class="sp-btn sp-btn--ghost" href="%%URL_ABOUT%%">La nostra storia</a>
    </div>
  </div>
</section>

<section class="sp-section">
  <div class="sp-section__head">
    <span class="sp-eyebrow">Perché Souk Profumi</span>
    <h2 class="sp-h2">Una maison costruita sull'autenticità</h2>
    <p class="sp-sub">Ogni bottiglia della nostra selezione viene scelta con cura, proveniente da canali affidabili e presentata con l'integrità che definisce la profumeria d'eccellenza.</p>
  </div>
  <div class="sp-grid sp-grid--4">
    <article class="sp-card">
      <div class="sp-card__icon">◆</div>
      <h3>100% autentico</h3>
      <p>Ogni fragranza è originale, proveniente da fornitori affidabili e da maison rinomate.</p>
    </article>
    <article class="sp-card">
      <div class="sp-card__icon">◆</div>
      <h3>Selezione di nicchia</h3>
      <p>Una libreria selezionata con attenzione di creazioni rare di nicchia e classici arabi senza tempo.</p>
    </article>
    <article class="sp-card">
      <div class="sp-card__icon">◆</div>
      <h3>Eredità araba</h3>
      <p>Composizioni intense di oud, miscele orientali lussuose e l'anima della profumeria mediorientale.</p>
    </article>
    <article class="sp-card">
      <div class="sp-card__icon">◆</div>
      <h3>Acquisto sicuro</h3>
      <p>Pagamento protetto, provider affidabili e spedizione discreta e sicura.</p>
    </article>
  </div>
</section>

<section class="sp-brand-strip" aria-label="Marchi selezionati">
  <div class="sp-brand-strip__inner">
    <span class="sp-eyebrow">Marchi che trattiamo</span>
    <div class="sp-brand-strip__viewport">
      <div class="sp-brand-strip__track">
        <div class="sp-brand-strip__item"><img src="https://peachpuff-gaur-234217.hostingersite.com/wp-content/uploads/2026/06/4.png" alt="Logo marchio 1"/></div>
        <div class="sp-brand-strip__item"><img src="https://peachpuff-gaur-234217.hostingersite.com/wp-content/uploads/2026/06/5.png" alt="Logo marchio 2"/></div>
        <div class="sp-brand-strip__item"><img src="https://peachpuff-gaur-234217.hostingersite.com/wp-content/uploads/2026/06/3.png" alt="Logo marchio 3"/></div>
        <div class="sp-brand-strip__item"><img src="https://peachpuff-gaur-234217.hostingersite.com/wp-content/uploads/2026/06/2.png" alt="Logo marchio 4"/></div>
        <div class="sp-brand-strip__item"><img src="https://peachpuff-gaur-234217.hostingersite.com/wp-content/uploads/2026/06/1.png" alt="Logo marchio 5"/></div>
        <div class="sp-brand-strip__item"><img src="https://peachpuff-gaur-234217.hostingersite.com/wp-content/uploads/2026/06/4.png" alt="Logo marchio 1"/></div>
        <div class="sp-brand-strip__item"><img src="https://peachpuff-gaur-234217.hostingersite.com/wp-content/uploads/2026/06/5.png" alt="Logo marchio 2"/></div>
        <div class="sp-brand-strip__item"><img src="https://peachpuff-gaur-234217.hostingersite.com/wp-content/uploads/2026/06/3.png" alt="Logo marchio 3"/></div>
        <div class="sp-brand-strip__item"><img src="https://peachpuff-gaur-234217.hostingersite.com/wp-content/uploads/2026/06/2.png" alt="Logo marchio 4"/></div>
        <div class="sp-brand-strip__item"><img src="https://peachpuff-gaur-234217.hostingersite.com/wp-content/uploads/2026/06/1.png" alt="Logo marchio 5"/></div>
      </div>
    </div>
  </div>
</section>

<section class="sp-stats">
  <div class="sp-stats__inner">
    <div class="sp-stat"><span class="sp-stat__num">500+</span><span class="sp-stat__label">Fragranze selezionate</span></div>
    <div class="sp-stat"><span class="sp-stat__num">100%</span><span class="sp-stat__label">Fornitura autentica</span></div>
    <div class="sp-stat"><span class="sp-stat__num">50+</span><span class="sp-stat__label">Maison rappresentate</span></div>
    <div class="sp-stat"><span class="sp-stat__num">24/7</span><span class="sp-stat__label">Assistenza clienti</span></div>
  </div>
</section>

<section class="sp-section">
  <div class="sp-split">
    <div class="sp-split__media">
      <div class="sp-split__art">
        <img src="%%BRAND_LOGO%%" alt="Souk Profumi"/>
      </div>
    </div>
    <div class="sp-split__copy">
      <span class="sp-eyebrow">La nostra promessa</span>
      <h2 class="sp-h2">La fragranza come espressione personale</h2>
      <p>Il profumo è più di una semplice essenza: è memoria, identità e dichiarazione di stile. Da Souk Profumi ti aiutiamo a scoprire composizioni che riflettono la tua personalità.</p>
      <ul class="sp-list">
        <li><strong>Composizioni ricche di oud</strong> — profonde, resinose e inconfondibilmente arabe.</li>
        <li><strong>Miscele orientali lussuose</strong> — strati opulenti di ambra, spezie e resine.</li>
        <li><strong>Creazioni di nicchia moderne</strong> — voci singolari di profumieri indipendenti.</li>
        <li><strong>Classici senza tempo</strong> — scie distintive che attraversano le generazioni.</li>
      </ul>
      <a class="sp-btn sp-btn--primary" href="%%URL_SERVICES%%">Sfoglia le collezioni</a>
    </div>
  </div>
</section>

<section class="sp-cta">
  <div class="sp-cta__inner">
    <h2 class="sp-h2">Inizia il tuo viaggio olfattivo</h2>
    <p>Parla con il nostro team del tuo gusto, dell'occasione o del regalo perfetto. Saremo felici di guidarti.</p>
    <a class="sp-btn sp-btn--dark" href="%%URL_CONTACT%%">Contattaci</a>
  </div>
</section>

<!-- /wp:html -->
HTML;
}

/* ============================================================
 * ABOUT
 * ============================================================ */
function sp_page_about() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Chi siamo</span>
    <h1 class="sp-h1">Souk Profumi — Profumi Arabi di Nicchia</h1>
    <p class="sp-lede">Siamo appassionati di portare il mondo delle fragranze arabe autentiche e di nicchia agli amanti del profumo che apprezzano qualità, artigianalità e unicità.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-split">
    <div class="sp-split__copy">
      <span class="sp-eyebrow">La nostra storia</span>
      <h2 class="sp-h2">Una maison di fragranze curata con attenzione</h2>
      <p>La nostra collezione accuratamente selezionata comprende profumi originali provenienti da fornitori affidabili e da maison rinomate, offrendo ai clienti accesso ad alcune delle fragranze più ricercate del Medio Oriente e non solo.</p>
      <p>Crediamo che il profumo sia molto più di una scia: è espressione personale, memoria e stile. Che tu stia cercando composizioni ricche di oud, miscele orientali lussuose, creazioni di nicchia moderne o classici senza tempo, Souk Profumi ti accompagna nella scoperta di fragranze che riflettono la tua personalità.</p>
    </div>
    <div class="sp-split__copy">
      <span class="sp-eyebrow">Il nostro impegno</span>
      <h2 class="sp-h2">I nostri valori</h2>
      <ul class="sp-list">
        <li><strong>Prodotti 100% autentici</strong> — ogni flacone è verificato.</li>
        <li><strong>Fragranze di nicchia e arabe</strong> — selezionate con cura.</li>
        <li><strong>Assistenza affidabile</strong> — rapida, cortese e rispettosa.</li>
        <li><strong>Esperienza di acquisto sicura</strong> — con partner di pagamento affidabili.</li>
        <li><strong>Passione per qualità ed eccellenza</strong> — il nostro principio guida.</li>
      </ul>
    </div>
  </div>
</section>

<section class="sp-section sp-section--surface">
  <div class="sp-section__head">
    <span class="sp-eyebrow">La nostra visione</span>
    <h2 class="sp-h2">Una destinazione per gli amanti delle fragranze</h2>
    <p class="sp-sub">Un luogo dove la ricca eredità della profumeria araba incontra fragranze di nicchia straordinarie da tutto il mondo: un'esperienza d'acquisto premium basata su autenticità, fiducia e amore genuino per i profumi di qualità.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-notice">
    <h3>Nota di autenticità</h3>
    <p>Souk Profumi è un rivenditore indipendente di profumi autentici e originali. Non siamo affiliati, approvati o sponsorizzati da alcun marchio o produttore di profumi, salvo dove indicato espressamente.</p>
    <p>Tutti i marchi, nomi commerciali, loghi, nomi prodotto e diritti d'autore mostrati su questo sito appartengono ai rispettivi proprietari e sono utilizzati esclusivamente a fini identificativi, informativi e descrittivi. Il loro utilizzo non implica alcuna affiliazione, approvazione o sponsorizzazione da parte dei titolari dei marchi.</p>
  </div>
</section>

<section class="sp-cta">
  <div class="sp-cta__inner">
    <h2 class="sp-h2">Grazie per aver scelto Souk Profumi</h2>
    <p>Siamo onorati di far parte del tuo percorso olfattivo.</p>
    <a class="sp-btn sp-btn--dark" href="%%URL_CONTACT%%">Scrivici</a>
  </div>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * SERVICES / COLLECTIONS
 * ============================================================ */
function sp_page_services() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Le nostre collezioni</span>
    <h1 class="sp-h1">Le famiglie olfattive che selezioniamo</h1>
    <p class="sp-lede">Dalle resine profonde della penisola arabica alle voci originali dei profumieri indipendenti, ogni categoria viene scelta con cura e intenzione.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-grid sp-grid--2">
    <article class="sp-num-card">
      <span class="sp-num">01</span>
      <h3>Composizioni di oud</h3>
      <p>La firma inconfondibile della profumeria araba: l'agarwood nella sua forma più espressiva, arricchito da rosa, zafferano e ambra.</p>
      <ul class="sp-list">
        <li>Oud puro e miscelato</li>
        <li>Facce fumose e resinose</li>
        <li>Persistenza elevata sulla pelle</li>
      </ul>
    </article>
    <article class="sp-num-card">
      <span class="sp-num">02</span>
      <h3>Miscele orientali</h3>
      <p>Composizioni opulente costruite su ambra, spezie e resine balsamiche: calore e ricchezza in ogni goccia.</p>
      <ul class="sp-list">
        <li>Accordi di ambra e benzoino</li>
        <li>Strati orientali speziati</li>
        <li>Sensoriali e ricchi di carattere</li>
      </ul>
    </article>
    <article class="sp-num-card">
      <span class="sp-num">03</span>
      <h3>Creazioni di nicchia</h3>
      <p>Fragranze uniche di profumieri indipendenti: audaci, artistiche e pensate per chi cerca l'insolito.</p>
      <ul class="sp-list">
        <li>Maison indipendenti</li>
        <li>Composizioni artistiche e limitate</li>
        <li>Per collezionisti e intenditori</li>
      </ul>
    </article>
    <article class="sp-num-card">
      <span class="sp-num">04</span>
      <h3>Classici senza tempo</h3>
      <p>Fragranze iconiche che hanno definito intere generazioni: le firme durature della grande profumeria.</p>
      <ul class="sp-list">
        <li>Composizioni di tradizione</li>
        <li>Scie signature</li>
        <li>Universalmente apprezzate</li>
      </ul>
    </article>
  </div>
</section>

<section class="sp-section sp-section--surface">
  <div class="sp-section__head">
    <span class="sp-eyebrow">Come funziona</span>
    <h2 class="sp-h2">Un'esperienza pensata con cura</h2>
  </div>
  <div class="sp-grid sp-grid--4">
    <div class="sp-step"><span class="sp-step__num">1</span><h4>Scopri</h4><p>Esplora la nostra biblioteca curata di fragranze arabe e di nicchia.</p></div>
    <div class="sp-step"><span class="sp-step__num">2</span><h4>Scegli</h4><p>Seleziona la composizione che ti rappresenta.</p></div>
    <div class="sp-step"><span class="sp-step__num">3</span><h4>Ricevi</h4><p>Consegna discreta e sicura direttamente a casa tua.</p></div>
    <div class="sp-step"><span class="sp-step__num">4</span><h4>Vivi</h4><p>Indossa e vivi la storia che racconta la tua fragranza.</p></div>
  </div>
</section>

<section class="sp-cta">
  <div class="sp-cta__inner">
    <h2 class="sp-h2">Non sai da dove iniziare?</h2>
    <p>Raccontaci le note che ami: ti guideremo verso la composizione giusta.</p>
    <a class="sp-btn sp-btn--dark" href="%%URL_CONTACT%%">Parla con noi</a>
  </div>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * CONTACT
 * ============================================================ */
function sp_page_contact() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Contatti</span>
    <h1 class="sp-h1">Siamo felici di sentirti</h1>
    <p class="sp-lede">Per domande su fragranze, ordini o consigli dal nostro team, scrivici su WhatsApp oppure invia un messaggio qui sotto.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-split">
    <div class="sp-contact-info">
      <h2 class="sp-h2">Contatta Souk Profumi</h2>
      <p>Il nostro team è a disposizione per aiutarti a scegliere, trovare e scoprire la fragranza giusta per ogni occasione.</p>
      <div class="sp-contact-item">
        <div class="sp-contact-item__icon">✦</div>
        <div>
          <h4>WhatsApp</h4>
          <p>Tocca il pulsante WhatsApp in basso a destra di ogni pagina per parlare direttamente con noi.</p>
        </div>
      </div>
      <div class="sp-contact-item">
        <div class="sp-contact-item__icon">✦</div>
        <div>
          <h4>Invia un messaggio</h4>
          <p>Usa il modulo di questa pagina e il nostro team ti risponderà il prima possibile.</p>
        </div>
      </div>
      <div class="sp-contact-item">
        <div class="sp-contact-item__icon">✦</div>
        <div>
          <h4>Sede in Italia</h4>
          <p>Souk Profumi — Profumi Arabi di Nicchia. Spedizioni in tutta Italia e in alcune destinazioni internazionali selezionate.</p>
        </div>
      </div>
    </div>
    <div class="sp-contact-form">
      <h3 class="sp-h3">Scrivici</h3>
      [contact-form-7 id="d1513a7" title="Modulo di contatto 1"]
    </div>
  </div>
</section>

<section class="sp-cta">
  <div class="sp-cta__inner">
    <h2 class="sp-h2">Scopri le nostre collezioni</h2>
    <p>Esplora la selezione curata di fragranze arabe e di nicchia.</p>
    <a class="sp-btn sp-btn--dark" href="%%URL_SERVICES%%">Esplora ora</a>
  </div>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * PRIVACY POLICY
 * ============================================================ */
function sp_page_privacy() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legale</span>
    <h1 class="sp-h1">Informativa sulla privacy</h1>
    <p class="sp-lede">Ultimo aggiornamento: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>In Souk Profumi (soukprofumi.it) rispettiamo la privacy dei nostri clienti e ci impegniamo a proteggere i loro dati personali. La presente informativa spiega come raccogliamo, utilizziamo, conserviamo e proteggiamo i tuoi dati quando visiti il nostro sito o acquisti i nostri prodotti.</p>
  <p>Questa informativa è stata redatta in conformità al Regolamento generale sulla protezione dei dati (UE) 2016/679 (GDPR) e alla normativa italiana applicabile in materia di protezione dei dati.</p>

  <h2>Informazioni che raccogliamo</h2>

  <h3>Informazioni di contatto</h3>
  <p>Possiamo raccogliere:</p>
  <ul>
    <li>Nome e cognome</li>
    <li>Indirizzo email</li>
    <li>Indirizzo di spedizione e fatturazione</li>
    <li>Numero di telefono o WhatsApp</li>
  </ul>

  <h3>Informazioni di pagamento</h3>
  <p>Le informazioni di pagamento sono raccolte e trattate in modo sicuro da provider di pagamento terzi affidabili. Souk Profumi non memorizza sui propri server i dati completi della carta di credito o debito.</p>

  <h3>Informazioni di navigazione</h3>
  <p>Possiamo raccogliere informazioni tramite cookie e tecnologie simili, tra cui:</p>
  <ul>
    <li>Indirizzo IP</li>
    <li>Tipo di browser</li>
    <li>Informazioni sul dispositivo</li>
    <li>Pagine visitate</li>
    <li>Statistiche di utilizzo del sito</li>
  </ul>

  <h2>Come utilizziamo le tue informazioni</h2>

  <h3>Gestione degli ordini</h3>
  <p>Utilizziamo i tuoi dati per:</p>
  <ul>
    <li>Elaborare ed evadere gli ordini</li>
    <li>Organizzare spedizione e consegna</li>
    <li>Fornire assistenza clienti</li>
    <li>Comunicare aggiornamenti sugli ordini</li>
  </ul>

  <h3>Miglioramento del servizio</h3>
  <p>Possiamo usare i tuoi dati per:</p>
  <ul>
    <li>Migliorare il funzionamento del sito</li>
    <li>Rendere migliore l'esperienza cliente</li>
    <li>Analizzare prestazioni e utilizzo del sito</li>
  </ul>

  <h3>Comunicazioni promozionali</h3>
  <p>Con il tuo consenso, possiamo inviarti email promozionali, newsletter, aggiornamenti sui prodotti e offerte speciali. Puoi annullare l'iscrizione in qualsiasi momento.</p>

  <h2>Condivisione dei dati</h2>
  <p>Non vendiamo, affittiamo o cediamo i tuoi dati personali a terzi.</p>
  <p>Le tue informazioni possono essere condivise solo con fornitori di servizi affidabili quando necessario per:</p>
  <ul>
    <li>Elaborare i pagamenti</li>
    <li>Consegnare gli ordini</li>
    <li>Fornire servizi tecnici e di hosting</li>
    <li>Rispettare gli obblighi di legge</li>
  </ul>
  <p>Tutti i fornitori di servizi sono tenuti a proteggere le tue informazioni e a trattarle in conformità alle leggi applicabili sulla privacy.</p>

  <h2>Sicurezza dei dati</h2>
  <p>Adottiamo misure di sicurezza tecniche e organizzative adeguate per proteggere i tuoi dati personali da accessi non autorizzati, perdita, uso improprio, divulgazione o alterazione.</p>

  <h2>Conservazione dei dati</h2>
  <p>Conserviamo i dati personali solo per il tempo necessario a:</p>
  <ul>
    <li>Adempiere agli obblighi contrattuali</li>
    <li>Fornire assistenza clienti</li>
    <li>Rispettare gli obblighi legali, contabili e fiscali</li>
    <li>Risolvere controversie e far valere gli accordi</li>
  </ul>

  <h2>I tuoi diritti ai sensi del GDPR</h2>
  <p>Ai sensi della normativa applicabile, hai il diritto di:</p>
  <ul>
    <li>Accedere ai tuoi dati personali</li>
    <li>Correggere informazioni inesatte o incomplete</li>
    <li>Richiedere la cancellazione dei tuoi dati personali ("diritto all'oblio")</li>
    <li>Limitare o opporti al trattamento</li>
    <li>Revocare il consenso in qualsiasi momento</li>
    <li>Richiedere la portabilità dei dati</li>
    <li>Presentare un reclamo al Garante per la protezione dei dati personali</li>
  </ul>
  <p>Per maggiori informazioni, visita: <a href="https://www.garanteprivacy.it/" target="_blank" rel="noopener">https://www.garanteprivacy.it/</a></p>

  <h2>Cookie</h2>
  <p>Il nostro sito utilizza cookie e tecnologie simili per migliorare le funzionalità, analizzare il traffico e rendere migliore l'esperienza utente. Puoi gestire o disabilitare i cookie dalle impostazioni del browser; tuttavia, alcune funzioni del sito potrebbero non funzionare correttamente.</p>

  <h2>Modifiche alla presente informativa</h2>
  <p>Ci riserviamo il diritto di aggiornare o modificare questa informativa in qualsiasi momento. Eventuali modifiche saranno pubblicate su questa pagina con una data di revisione aggiornata.</p>

  <h2>Contattaci</h2>
  <p>Se hai domande sulla presente informativa o sul trattamento dei tuoi dati personali, contattaci via WhatsApp utilizzando i recapiti presenti sul nostro sito.</p>

  <p><strong>Souk Profumi – Profumi Arabi di Nicchia</strong><br/>
  Website: <a href="https://soukprofumi.it" target="_blank" rel="noopener">https://soukprofumi.it</a></p>

  <hr/>

  <p>© 2026 Souk Profumi – Profumi Arabi di Nicchia. Tutti i diritti riservati.</p>
  <p>Tutti i marchi, nomi commerciali, loghi e nomi dei prodotti mostrati su questo sito sono di proprietà dei rispettivi titolari e sono utilizzati esclusivamente a fini identificativi e descrittivi. Il loro utilizzo non implica alcuna affiliazione, approvazione o sponsorizzazione da parte dei rispettivi titolari dei marchi.</p>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * TERMS OF SERVICE
 * ============================================================ */
function sp_page_tos() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legale</span>
    <h1 class="sp-h1">Termini di servizio</h1>
    <p class="sp-lede">Ultimo aggiornamento: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>Benvenuto su Souk Profumi (soukprofumi.it). Accedendo o usando il nostro sito accetti di essere vincolato dai presenti Termini di servizio. Ti invitiamo a leggerli attentamente prima di utilizzare i nostri servizi.</p>

  <h2>1. Accettazione dei termini</h2>
  <p>Utilizzando il sito di Souk Profumi confermi di avere almeno 18 anni e di essere legalmente in grado di stipulare un contratto vincolante ai sensi della legge italiana e dell'UE. Se non accetti questi Termini, non devi utilizzare il sito.</p>

  <h2>2. Informazioni su Souk Profumi</h2>
  <p>Souk Profumi è un rivenditore indipendente di profumi genuini e autentici, specializzato in fragranze arabe e di nicchia. Non siamo affiliati, approvati o sponsorizzati da alcun marchio o produttore di profumi, salvo diversa indicazione esplicita.</p>

  <h2>3. Uso del sito</h2>
  <p>Accetti di utilizzare il sito solo per scopi leciti. Non devi:</p>
  <ul>
    <li>Utilizzare il sito in modo che violi leggi o regolamenti applicabili</li>
    <li>Tentare di ottenere accesso non autorizzato ai nostri sistemi o dati</li>
    <li>Usare il sito per trasmettere codice malevolo, virus o materiale dannoso</li>
    <li>Copiare, riprodurre o ridistribuire contenuti senza autorizzazione scritta</li>
  </ul>

  <h2>4. Informazioni sui prodotti</h2>
  <p>Facciamo ogni ragionevole sforzo per garantire che descrizioni, immagini e prezzi dei prodotti sul sito siano accurati. Tuttavia, possono verificarsi lievi variazioni nel colore, nel packaging o nel lotto, e non garantiamo che tutti i contenuti siano completamente privi di errori.</p>

  <h2>5. Ordini e prezzi</h2>
  <p>Tutti i prezzi sono mostrati in Euro (€) e possono essere soggetti a IVA in conformità alla normativa fiscale italiana. Gli ordini sono confermati solo dopo il buon esito del pagamento. Ci riserviamo il diritto di rifiutare o annullare qualsiasi ordine a nostra esclusiva discrezione.</p>

  <h2>6. Proprietà intellettuale</h2>
  <p>Tutti i contenuti del sito, inclusi testi, grafica, fotografie, layout, nome e logo Souk Profumi, sono di proprietà di Souk Profumi o dei suoi fornitori di contenuti e sono protetti dalle leggi italiane e internazionali sulla proprietà intellettuale. Tutti i marchi di terzi restano di proprietà dei rispettivi titolari.</p>

  <h2>7. Limitazione di responsabilità</h2>
  <p>Nella misura massima consentita dalla legge, Souk Profumi non sarà responsabile per danni indiretti, incidentali, speciali o consequenziali derivanti o connessi all'uso del sito o dei prodotti acquistati.</p>

  <h2>8. Manleva</h2>
  <p>Accetti di manlevare e tenere indenne Souk Profumi, i suoi proprietari, dipendenti e partner da qualsiasi richiesta o pretesa derivante dalla violazione dei presenti Termini o di qualsiasi legge applicabile.</p>

  <h2>9. Modifiche</h2>
  <p>Ci riserviamo il diritto di aggiornare i presenti Termini di servizio in qualsiasi momento. Le modifiche saranno efficaci immediatamente dopo la pubblicazione su questa pagina.</p>

  <h2>10. Legge applicabile</h2>
  <p>Questi Termini sono regolati dalla legge italiana. Qualsiasi controversia connessa ai presenti Termini sarà soggetta alla giurisdizione esclusiva dei tribunali italiani competenti.</p>

  <h2>11. Contatti</h2>
  <p>Per domande su questi Termini, contattaci tramite il pulsante WhatsApp sul sito oppure usa il modulo nella nostra <a href="%%URL_CONTACT%%">pagina Contatti</a>.</p>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * TERMS & CONDITIONS
 * ============================================================ */
function sp_page_tc() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legale</span>
    <h1 class="sp-h1">Termini e condizioni</h1>
    <p class="sp-lede">Ultimo aggiornamento: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>I presenti Termini e condizioni regolano l'acquisto dei prodotti di Souk Profumi (soukprofumi.it). Effettuando un ordine accetti le condizioni riportate di seguito.</p>

  <h2>1. Requisiti del cliente</h2>
  <p>Per effettuare un ordine devi avere almeno 18 anni e fornire informazioni accurate, aggiornate e complete durante il checkout.</p>

  <h2>2. Accettazione dell'ordine</h2>
  <p>Un ordine è considerato accettato solo dopo l'invio dell'email di conferma e il buon esito del pagamento. Ci riserviamo il diritto di rifiutare o annullare qualsiasi ordine per motivi che includono, senza limitazioni, disponibilità del prodotto, errori di prezzo o sospetta frode.</p>

  <h2>3. Prezzi e pagamenti</h2>
  <p>Tutti i prezzi sono indicati in Euro (€) e comprendono l'IVA italiana applicabile, salvo diversa indicazione. Accettiamo pagamenti solo tramite provider terzi sicuri. Inviando i dati di pagamento autorizzi il provider competente ad addebitare l'importo totale dell'ordine.</p>

  <h2>4. Garanzia di autenticità</h2>
  <p>Souk Profumi garantisce che ogni fragranza offerta sul nostro sito è autentica al 100% e proviene da fornitori affidabili. Siamo un rivenditore indipendente e i nostri prodotti sono presentati esclusivamente a fini identificativi e descrittivi.</p>

  <h2>5. Disponibilità dei prodotti</h2>
  <p>I prodotti sono soggetti a disponibilità. Nel raro caso in cui un articolo non sia più disponibile dopo l'invio dell'ordine, ti informeremo e ti offriremo un rimborso completo oppure un'alternativa adeguata.</p>

  <h2>6. Spedizione e gestione</h2>
  <p>Le condizioni, i tempi e i costi di spedizione sono descritti nella nostra <a href="%%URL_SHIPPING%%">Politica di spedizione e gestione</a>. I tempi di consegna sono indicativi e possono variare per sdoganamento, ritardi del corriere o altri fattori fuori dal nostro controllo.</p>

  <h2>7. Resi e rimborsi</h2>
  <p>La nostra procedura di rimborso è descritta nella <a href="%%URL_REFUND%%">Politica dei rimborsi</a>. A causa della natura dei prodotti di profumeria e delle normative igieniche applicabili, si applicano condizioni specifiche.</p>

  <h2>8. Annullamenti</h2>
  <p>Gli annullamenti degli ordini sono soggetti alla nostra <a href="%%URL_CANCEL%%">Politica di cancellazione</a>.</p>

  <h2>9. Proprietà intellettuale e marchi</h2>
  <p>Tutti i marchi, nomi commerciali, loghi, nomi dei prodotti e diritti d'autore mostrati su questo sito sono di proprietà dei rispettivi titolari e sono utilizzati esclusivamente a fini identificativi, informativi e descrittivi. Il loro utilizzo non implica alcuna affiliazione, approvazione o sponsorizzazione da parte dei titolari dei marchi.</p>

  <h2>10. Responsabilità</h2>
  <p>Souk Profumi non è responsabile per reazioni allergiche, sensibilità o qualsiasi danno indiretto derivante dall'uso dei prodotti di profumeria. Si consiglia ai clienti di verificare l'elenco degli ingredienti, quando disponibile, e di interrompere l'uso in caso di irritazione.</p>

  <h2>11. Forza maggiore</h2>
  <p>Non siamo responsabili per ritardi o mancati adempimenti causati da circostanze al di fuori del nostro ragionevole controllo, inclusi, a titolo esemplificativo, scioperi, disservizi nei trasporti, eventi naturali o restrizioni governative.</p>

  <h2>12. Legge applicabile e foro competente</h2>
  <p>I presenti Termini e condizioni sono regolati dalla legge italiana. Qualsiasi controversia sarà soggetta alla giurisdizione esclusiva dei tribunali italiani competenti, fatti salvi i diritti inderogabili di tutela del consumatore previsti dal diritto dell'UE.</p>

  <h2>13. Contatti</h2>
  <p>Per qualsiasi domanda su questi Termini e condizioni, contattaci tramite il pulsante WhatsApp sul sito oppure usa il modulo nella nostra <a href="%%URL_CONTACT%%">pagina Contatti</a>.</p>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * REFUND POLICY
 * ============================================================ */
function sp_page_refund() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legale</span>
    <h1 class="sp-h1">Politica dei rimborsi</h1>
    <p class="sp-lede">Ultimo aggiornamento: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>Per Souk Profumi – Profumi Arabi di Nicchia, la soddisfazione del cliente è importante. Data la natura dei nostri prodotti e per motivi igienici, di sicurezza e di autenticità, tutte le vendite sono generalmente considerate definitive.</p>

  <h2>Nessun rimborso</h2>
  <p>Non offriamo rimborsi per:</p>
  <ul>
    <li>Cambio idea dopo l'acquisto</li>
    <li>Preferenze personali in fatto di profumo</li>
    <li>Scelta errata del prodotto da parte del cliente</li>
    <li>Prodotti aperti, usati o danneggiati dopo la consegna</li>
    <li>Ordini con informazioni di spedizione errate fornite dal cliente</li>
  </ul>
  <p>Ti invitiamo a controllare con attenzione il tuo ordine prima di completare l'acquisto.</p>

  <h2>Articoli danneggiati o errati</h2>
  <p>Se ricevi:</p>
  <ul>
    <li>Un prodotto danneggiato</li>
    <li>Un prodotto difettoso</li>
    <li>Un articolo non corretto</li>
  </ul>
  <p>Contattaci entro 48 ore dalla consegna e fornisci:</p>
  <ul>
    <li>Il numero dell'ordine</li>
    <li>Foto chiare del prodotto e dell'imballaggio</li>
    <li>Una descrizione del problema</li>
  </ul>
  <p>Dopo aver valutato la richiesta, potremo, a nostra esclusiva discrezione:</p>
  <ul>
    <li>Inviare un prodotto sostitutivo</li>
    <li>Rilasciare un credito da utilizzare sul negozio</li>
    <li>Fornire un'altra soluzione adeguata</li>
  </ul>

  <h2>Pacchi smarriti</h2>
  <p>Souk Profumi non è responsabile per ritardi o smarrimenti causati dai corrieri una volta che l'ordine è stato affidato alla consegna. Tuttavia, assisteremo i clienti nell'apertura di un'indagine con il corriere ogni volta che sarà possibile.</p>

  <h2>Annullamento degli ordini</h2>
  <p>Gli ordini non possono essere annullati una volta che sono stati elaborati o spediti.</p>

  <h2>Contattaci</h2>
  <p>Per assistenza su un ordine, contattaci tramite WhatsApp o utilizzando i recapiti disponibili sul nostro sito.</p>
  <p>Souk Profumi – Profumi Arabi di Nicchia<br>Website: <a href="https://soukprofumi.it">https://soukprofumi.it</a></p>

  <p><strong>Avviso importante:</strong> effettuando un ordine su soukprofumi.it, riconosci e accetti la presente Politica dei rimborsi.</p>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * CANCELLATION POLICY
 * ============================================================ */
function sp_page_cancel() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legale</span>
    <h1 class="sp-h1">Politica di cancellazione</h1>
    <p class="sp-lede">Ultimo aggiornamento: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>La presente Politica di cancellazione indica come e quando un ordine effettuato su soukprofumi.it può essere annullato.</p>

  <h2>1. Finestra di cancellazione</h2>
  <p>Gli ordini possono essere annullati gratuitamente entro <strong>12 ore</strong> dall'invio, a condizione che non siano ancora stati imballati o spediti.</p>

  <h2>2. Come annullare</h2>
  <p>Per annullare un ordine, contattaci il prima possibile tramite il pulsante WhatsApp sul sito. Indica il numero di riferimento del tuo ordine. Confermeremo l'annullamento per iscritto una volta elaborato.</p>

  <h2>3. Ordini già spediti</h2>
  <p>Se un ordine è già stato imballato o spedito, non può più essere annullato. In quel caso, consulta la nostra <a href="%%URL_REFUND%%">Politica dei rimborsi</a>.</p>

  <h2>4. Rimborsi per ordini annullati</h2>
  <p>I rimborsi degli ordini annullati correttamente vengono elaborati sul metodo di pagamento originale entro <strong>7–14 giorni lavorativi</strong>, a seconda della tua banca o del provider di pagamento.</p>

  <h2>5. Annullamento da parte di Souk Profumi</h2>
  <p>Ci riserviamo il diritto di annullare qualsiasi ordine, con rimborso completo, nei seguenti casi:</p>
  <ul>
    <li>Prodotto non disponibile dopo l'invio dell'ordine</li>
    <li>Errori di prezzo o descrizione</li>
    <li>Transazioni sospette o fraudolente</li>
    <li>Mancato rispetto dei requisiti di spedizione o verifica del pagamento</li>
    <li>Circostanze al di fuori del nostro ragionevole controllo</li>
  </ul>

  <h2>6. Contatti</h2>
  <p>Per richieste di annullamento, contattaci tramite il pulsante WhatsApp sul sito oppure usa il modulo nella nostra <a href="%%URL_CONTACT%%">pagina Contatti</a>.</p>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * SHIPPING & HANDLING POLICY
 * ============================================================ */
function sp_page_shipping() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legale</span>
    <h1 class="sp-h1">Politica di spedizione e gestione</h1>
    <p class="sp-lede">Ultimo aggiornamento: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>Per Souk Profumi – Profumi Arabi di Nicchia ci impegniamo a consegnare le tue fragranze in modo rapido, sicuro e in condizioni perfette. Ti invitiamo a leggere la nostra Politica di spedizione e gestione qui sotto.</p>

  <h2>Tariffe di spedizione</h2>
  <p>Offriamo una struttura di spedizione trasparente per le consegne in Italia:</p>
  <h3>Italia</h3>
  <ul>
    <li>Ordini inferiori a €30,00: costo spedizione €5,15</li>
    <li>Ordini da €30,00 a €74,99: costo spedizione €5,00</li>
    <li>Ordini da €100,00 in su: spedizione gratuita</li>
  </ul>
  <p>Le spese di spedizione vengono calcolate automaticamente e mostrate al checkout.</p>

  <h2>Tempi di consegna</h2>
  <h3>Consegna standard (Italia)</h3>
  <ul>
    <li>Tempo di consegna stimato: 3–4 giorni lavorativi dopo la spedizione.</li>
    <li>I tempi di consegna sono indicativi e possono variare per condizioni meteo, festività, ritardi del corriere o circostanze al di fuori del nostro controllo.</li>
  </ul>

  <h2>Elaborazione degli ordini</h2>
  <ul>
    <li>Gli ordini vengono generalmente elaborati entro 3 giorni lavorativi.</li>
    <li>Gli ordini effettuati nel fine settimana o nei giorni festivi vengono elaborati il primo giorno lavorativo utile.</li>
    <li>Una volta elaborato l'ordine, riceverai un'email di conferma della spedizione.</li>
  </ul>

  <h2>Corrieri</h2>
  <p>Collaboriamo con partner di spedizione affidabili.</p>

  <h2>Tracciamento dell'ordine</h2>
  <p>Una volta spedito l'ordine, riceverai via email un numero di tracciamento.</p>
  <p>Potrai usare queste informazioni per monitorare la spedizione e la data di consegna stimata.</p>

  <h2>Limitazioni di spedizione</h2>
  <p>Al momento spediamo solo in Europa.</p>
  <p>Non effettuiamo spedizioni verso:</p>
  <ul>
    <li>Caselle postali</li>
    <li>Indirizzi militari</li>
    <li>Servizi di spedizione intermediata</li>
  </ul>

  <h2>Imballaggio e gestione</h2>
  <p>Tutti gli ordini vengono imballati con cura per proteggere i prodotti durante il trasporto.</p>
  <p>Le nostre spese di spedizione coprono solo i costi di trasporto e non includono eventuali costi aggiuntivi di gestione o imballaggio, salvo diversa indicazione al checkout.</p>

  <h2>Merce danneggiata e reclami</h2>
  <h3>Tempistica per la segnalazione</h3>
  <p>Se il tuo ordine arriva danneggiato, devi comunicarcelo entro 48 ore (2 giorni) dalla consegna.</p>
  <p>Le richieste presentate dopo questo periodo potrebbero non essere prese in considerazione o non essere idonee a compensazione.</p>

  <h3>Documentazione dell'unboxing richiesta</h3>
  <p>Per supportare qualsiasi richiesta relativa ad articoli danneggiati o mancanti, i clienti devono:</p>
  <ul>
    <li>Registrare un video continuo mentre aprono il pacco.</li>
    <li>Scattare foto chiare del pacco e dei prodotti.</li>
    <li>Conservare tutto il materiale di imballaggio originale.</li>
  </ul>
  <p>Le richieste presentate senza adeguate prove fotografiche o video potrebbero essere respinte.</p>

  <h2>Pacchi smarriti o danneggiati</h2>
  <p>Se il tuo pacco si smarrisce o arriva danneggiato durante il trasporto:</p>
  <h3>Contattaci subito</h3>
  <p>Tramite WhatsApp</p>
  <p>Oppure contattaci tramite la <a href="%%URL_CONTACT%%">pagina Contatti</a> del nostro sito.</p>

  <h3>Indica</h3>
  <ul>
    <li>Numero dell'ordine</li>
    <li>Foto o video che mostrino il problema</li>
    <li>Descrizione del danno o della perdita</li>
  </ul>

  <h3>Procedura di risoluzione</h3>
  <p>Indagheremo sulla questione con il corriere e lavoreremo a una soluzione adeguata, che può includere:</p>
  <ul>
    <li>Sostituzione del prodotto</li>
    <li>Credito da utilizzare sul negozio</li>
    <li>Altre soluzioni ragionevoli a nostra discrezione</li>
  </ul>

  <h2>Informazioni di spedizione errate</h2>
  <p>I clienti sono responsabili di fornire informazioni di spedizione accurate.</p>
  <p>Souk Profumi non è responsabile per ritardi, mancate consegne o costi di spedizione aggiuntivi derivanti da indirizzi errati o incompleti forniti dal cliente.</p>

  <h2>Aggiornamenti della politica</h2>
  <p>Ci riserviamo il diritto di aggiornare o modificare la presente Politica di spedizione e gestione in qualsiasi momento.</p>
  <p>Eventuali modifiche saranno pubblicate su questa pagina ed entreranno in vigore immediatamente dopo la pubblicazione.</p>

  <h2>Contatti</h2>
  <p>Souk Profumi – Profumi Arabi di Nicchia<br>Website: <a href="https://soukprofumi.it">https://soukprofumi.it</a></p>
  <p>© 2026 Souk Profumi – Profumi Arabi di Nicchia. Tutti i diritti riservati.</p>
</section>
<!-- /wp:html -->
HTML;
}
