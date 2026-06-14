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
        <div class="sp-brand-strip__item"><img src="https://soukprofumi.it/wp-content/uploads/2026/06/4.png" alt="Logo marchio 1"/></div>
        <div class="sp-brand-strip__item"><img src="https://soukprofumi.it/wp-content/uploads/2026/06/5.png" alt="Logo marchio 2"/></div>
        <div class="sp-brand-strip__item"><img src="https://soukprofumi.it/wp-content/uploads/2026/06/3.png" alt="Logo marchio 3"/></div>
        <div class="sp-brand-strip__item"><img src="https://soukprofumi.it/wp-content/uploads/2026/06/2.png" alt="Logo marchio 4"/></div>
        <div class="sp-brand-strip__item"><img src="https://soukprofumi.it/wp-content/uploads/2026/06/1.png" alt="Logo marchio 5"/></div>
        <div class="sp-brand-strip__item"><img src="https://soukprofumi.it/wp-content/uploads/2026/06/4.png" alt="Logo marchio 1"/></div>
        <div class="sp-brand-strip__item"><img src="https://soukprofumi.it/wp-content/uploads/2026/06/5.png" alt="Logo marchio 2"/></div>
        <div class="sp-brand-strip__item"><img src="https://soukprofumi.it/wp-content/uploads/2026/06/3.png" alt="Logo marchio 3"/></div>
        <div class="sp-brand-strip__item"><img src="https://soukprofumi.it/wp-content/uploads/2026/06/2.png" alt="Logo marchio 4"/></div>
        <div class="sp-brand-strip__item"><img src="https://soukprofumi.it/wp-content/uploads/2026/06/1.png" alt="Logo marchio 5"/></div>
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
  <p>Da Souk Profumi (soukprofumi.it) teniamo davvero alla riservatezza di chi ci sceglie e facciamo il possibile per custodire con cura i dati personali dei nostri clienti. In questa pagina ti spieghiamo, senza giri di parole, quali informazioni raccogliamo, perché lo facciamo e come le proteggiamo quando navighi sul sito o acquisti una delle nostre fragranze.</p>
  <p>Tutto ciò che leggi qui è conforme al Regolamento europeo sulla protezione dei dati (UE) 2016/679, meglio noto come GDPR, e alle norme italiane vigenti in materia di privacy.</p>

  <h2>Quali dati raccogliamo</h2>

  <h3>Dati di contatto</h3>
  <p>In base a ciò che ci comunichi, possiamo trattare:</p>
  <ul>
    <li>Nome e cognome</li>
    <li>Indirizzo email</li>
    <li>Indirizzo di spedizione e di fatturazione</li>
    <li>Numero di telefono o di WhatsApp</li>
  </ul>

  <h3>Dati di pagamento</h3>
  <p>I pagamenti vengono gestiti in totale sicurezza da provider esterni specializzati e affidabili. I dati completi della tua carta non transitano né vengono conservati sui server di Souk Profumi.</p>

  <h3>Dati di navigazione</h3>
  <p>Quando visiti il sito, attraverso i cookie e strumenti analoghi possiamo raccogliere alcune informazioni tecniche, ad esempio:</p>
  <ul>
    <li>Indirizzo IP</li>
    <li>Tipo di browser utilizzato</li>
    <li>Dati relativi al dispositivo</li>
    <li>Pagine consultate</li>
    <li>Statistiche sull'utilizzo del sito</li>
  </ul>

  <h2>Come utilizziamo i tuoi dati</h2>

  <h3>Gestione degli ordini</h3>
  <p>Le informazioni che ci fornisci ci servono per:</p>
  <ul>
    <li>Elaborare e preparare i tuoi ordini</li>
    <li>Organizzare la spedizione e la consegna</li>
    <li>Offrirti assistenza quando ne hai bisogno</li>
    <li>Tenerti aggiornato sullo stato dell'ordine</li>
  </ul>

  <h3>Miglioramento del servizio</h3>
  <p>In alcuni casi utilizziamo i dati anche per:</p>
  <ul>
    <li>Far funzionare meglio il sito</li>
    <li>Rendere più piacevole l'esperienza di acquisto</li>
    <li>Capire come viene usato il sito e dove possiamo migliorare</li>
  </ul>

  <h3>Comunicazioni promozionali</h3>
  <p>Soltanto se ci dai il tuo consenso, di tanto in tanto potremmo scriverti per condividere novità, newsletter, anteprime sui prodotti e offerte dedicate. Puoi cambiare idea e disiscriverti quando vuoi, in qualsiasi momento.</p>

  <h2>A chi comunichiamo i dati</h2>
  <p>I tuoi dati personali non vengono mai venduti, ceduti o dati in affitto a terzi: su questo non transigiamo.</p>
  <p>Le tue informazioni vengono condivise solo con collaboratori fidati e unicamente quando è davvero necessario, ad esempio per:</p>
  <ul>
    <li>Gestire i pagamenti</li>
    <li>Consegnare gli ordini</li>
    <li>Garantire i servizi tecnici e di hosting</li>
    <li>Adempiere agli obblighi previsti dalla legge</li>
  </ul>
  <p>Ognuno di questi partner è vincolato a proteggere i tuoi dati e a trattarli nel pieno rispetto della normativa sulla privacy.</p>

  <h2>Sicurezza dei dati</h2>
  <p>Mettiamo in campo misure tecniche e organizzative adeguate per difendere i tuoi dati da accessi non autorizzati, smarrimenti, usi impropri, divulgazioni o modifiche indesiderate.</p>

  <h2>Per quanto tempo conserviamo i dati</h2>
  <p>Manteniamo i dati personali solo per il tempo strettamente necessario a:</p>
  <ul>
    <li>Rispettare gli impegni contrattuali presi con te</li>
    <li>Garantirti l'assistenza clienti</li>
    <li>Adempiere agli obblighi di legge, contabili e fiscali</li>
    <li>Gestire eventuali controversie e tutelare i nostri accordi</li>
  </ul>

  <h2>I diritti che ti riconosce il GDPR</h2>
  <p>La normativa vigente ti garantisce, in ogni momento, il diritto di:</p>
  <ul>
    <li>Accedere ai tuoi dati personali</li>
    <li>Correggere informazioni sbagliate o incomplete</li>
    <li>Chiedere la cancellazione dei tuoi dati (il cosiddetto "diritto all'oblio")</li>
    <li>Limitare il trattamento oppure opporti ad esso</li>
    <li>Revocare il consenso quando lo desideri</li>
    <li>Richiedere la portabilità dei tuoi dati</li>
    <li>Presentare un reclamo al Garante per la protezione dei dati personali</li>
  </ul>
  <p>Se vuoi approfondire, trovi maggiori informazioni qui: <a href="https://www.garanteprivacy.it/" target="_blank" rel="noopener">https://www.garanteprivacy.it/</a></p>

  <h2>Cookie</h2>
  <p>Il nostro sito si avvale di cookie e tecnologie analoghe per funzionare al meglio, analizzare il traffico e offrirti un'esperienza più fluida. Puoi sempre gestirli o disattivarli dalle impostazioni del browser; tieni però presente che, così facendo, alcune parti del sito potrebbero non funzionare come dovrebbero.</p>

  <h2>Aggiornamenti di questa informativa</h2>
  <p>Potremmo rivedere o aggiornare questa informativa di tanto in tanto. Quando succede, pubblichiamo la versione aggiornata su questa stessa pagina, indicando la nuova data di revisione.</p>

  <h2>Scrivici</h2>
  <p>Hai dubbi su come trattiamo i tuoi dati o su questa informativa? Scrivici pure su WhatsApp ai recapiti che trovi sul sito: ti risponderemo volentieri.</p>

  <p><strong>Souk Profumi – Profumi Arabi di Nicchia</strong><br/>
  Website: <a href="https://soukprofumi.it" target="_blank" rel="noopener">https://soukprofumi.it</a></p>

  <hr/>

  <p>© 2026 Souk Profumi – Profumi Arabi di Nicchia. Tutti i diritti riservati.</p>
  <p>Tutti i marchi, i nomi commerciali, i loghi e i nomi dei prodotti presenti su questo sito appartengono ai rispettivi titolari e vengono citati unicamente a scopo identificativo e descrittivo. Il loro impiego non sottintende alcun legame, approvazione o sponsorizzazione da parte dei titolari dei marchi.</p>
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
  <p>Ti diamo il benvenuto su Souk Profumi (soukprofumi.it). Navigando e utilizzando il nostro sito accetti i presenti Termini di servizio: ti chiediamo perciò di leggerli con attenzione prima di servirti dei nostri servizi.</p>

  <h2>1. Accettazione dei termini</h2>
  <p>Utilizzando il sito di Souk Profumi dichiari di avere almeno 18 anni e di possedere la capacità giuridica per assumere un impegno vincolante ai sensi della normativa italiana ed europea. Se non condividi questi Termini, ti invitiamo a non proseguire nell'uso del sito.</p>

  <h2>2. Chi siamo</h2>
  <p>Souk Profumi è un rivenditore indipendente di profumi autentici e originali, con una passione particolare per le fragranze arabe e di nicchia. Salvo dove diversamente e chiaramente indicato, non abbiamo alcun legame, accordo o sponsorizzazione con i marchi o le case produttrici di profumi.</p>

  <h2>3. Uso del sito</h2>
  <p>Ti chiediamo di utilizzare il sito esclusivamente per finalità lecite. In particolare, ti impegni a non:</p>
  <ul>
    <li>Usare il sito in violazione di leggi o regolamenti vigenti</li>
    <li>Tentare di accedere senza autorizzazione ai nostri sistemi o ai nostri dati</li>
    <li>Servirti del sito per diffondere codice dannoso, virus o contenuti nocivi</li>
    <li>Copiare, riprodurre o ridistribuire i nostri contenuti senza il nostro consenso scritto</li>
  </ul>

  <h2>4. Informazioni sui prodotti</h2>
  <p>Lavoriamo con cura affinché descrizioni, immagini e prezzi pubblicati sul sito siano il più possibile corretti e aggiornati. Possono comunque presentarsi piccole differenze di colore, di confezione o di lotto produttivo, e non possiamo garantire che ogni contenuto sia del tutto privo di sviste.</p>

  <h2>5. Ordini e prezzi</h2>
  <p>Tutti i prezzi sono espressi in Euro (€) e possono essere soggetti a IVA secondo la normativa fiscale italiana. Un ordine si intende confermato solo dopo l'avvenuto buon esito del pagamento. Ci riserviamo la facoltà di rifiutare o annullare un ordine a nostra discrezione.</p>

  <h2>6. Proprietà intellettuale</h2>
  <p>Tutti i contenuti del sito – testi, grafiche, fotografie, impaginazione, oltre al nome e al logo Souk Profumi – appartengono a Souk Profumi o ai suoi fornitori di contenuti e sono tutelati dalle leggi italiane e internazionali sulla proprietà intellettuale. I marchi di terzi restano di proprietà dei rispettivi titolari.</p>

  <h2>7. Limitazione di responsabilità</h2>
  <p>Nei limiti massimi consentiti dalla legge, Souk Profumi non potrà essere ritenuta responsabile per danni indiretti, incidentali, speciali o consequenziali legati all'uso del sito o dei prodotti acquistati.</p>

  <h2>8. Manleva</h2>
  <p>Accetti di tenere indenne Souk Profumi, i suoi titolari, collaboratori e partner da qualsiasi pretesa o richiesta che dovesse derivare dalla violazione dei presenti Termini o di una qualunque norma applicabile.</p>

  <h2>9. Modifiche</h2>
  <p>Ci riserviamo la facoltà di aggiornare questi Termini di servizio in qualunque momento. Le eventuali modifiche diventano efficaci nel momento stesso in cui vengono pubblicate su questa pagina.</p>

  <h2>10. Legge applicabile</h2>
  <p>I presenti Termini sono disciplinati dalla legge italiana. Ogni eventuale controversia ad essi collegata sarà devoluta alla competenza esclusiva del foro italiano competente.</p>

  <h2>11. Contatti</h2>
  <p>Per qualsiasi domanda su questi Termini, scrivici tramite il pulsante WhatsApp presente sul sito oppure usa il modulo nella nostra <a href="%%URL_CONTACT%%">pagina Contatti</a>.</p>
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
  <p>I presenti Termini e condizioni disciplinano l'acquisto dei prodotti di Souk Profumi (soukprofumi.it). Quando effettui un ordine, accetti le condizioni che trovi qui di seguito.</p>

  <h2>1. Requisiti del cliente</h2>
  <p>Per poter ordinare devi aver compiuto 18 anni e inserire durante il checkout dati corretti, completi e aggiornati.</p>

  <h2>2. Accettazione dell'ordine</h2>
  <p>Un ordine si considera accettato soltanto dopo l'invio dell'email di conferma e l'esito positivo del pagamento. Ci riserviamo la facoltà di rifiutare o annullare un ordine per diverse ragioni, tra cui – a titolo di esempio – l'indisponibilità del prodotto, un errore di prezzo o il sospetto di una frode.</p>

  <h2>3. Prezzi e pagamenti</h2>
  <p>Tutti i prezzi sono indicati in Euro (€) e, salvo diversa indicazione, comprendono l'IVA italiana applicabile. I pagamenti vengono accettati esclusivamente tramite provider esterni sicuri. Trasmettendo i dati di pagamento, autorizzi il provider competente ad addebitare l'importo complessivo dell'ordine.</p>

  <h2>4. Garanzia di autenticità</h2>
  <p>Souk Profumi assicura che ogni fragranza proposta sul sito è autentica al 100% e proviene da fornitori affidabili. Operiamo come rivenditore indipendente e presentiamo i prodotti unicamente a fini identificativi e descrittivi.</p>

  <h2>5. Disponibilità dei prodotti</h2>
  <p>Tutti gli articoli sono proposti salvo disponibilità. Nel raro caso in cui un prodotto non risultasse più disponibile dopo l'invio dell'ordine, ti avviseremo proponendoti il rimborso completo oppure una valida alternativa.</p>

  <h2>6. Spedizione e gestione</h2>
  <p>Modalità, tempi e costi di spedizione sono illustrati nella nostra <a href="%%URL_SHIPPING%%">Politica di spedizione e gestione</a>. I tempi di consegna sono puramente indicativi e possono subire variazioni per via di operazioni doganali, ritardi del corriere o altri fattori che esulano dal nostro controllo.</p>

  <h2>7. Resi e rimborsi</h2>
  <p>Le modalità di rimborso sono descritte nella nostra <a href="%%URL_REFUND%%">Politica dei rimborsi</a>. Trattandosi di prodotti di profumeria, e nel rispetto delle norme igieniche applicabili, valgono alcune condizioni specifiche.</p>

  <h2>8. Annullamenti</h2>
  <p>L'annullamento degli ordini è regolato dalla nostra <a href="%%URL_CANCEL%%">Politica di cancellazione</a>.</p>

  <h2>9. Proprietà intellettuale e marchi</h2>
  <p>Tutti i marchi, i nomi commerciali, i loghi, i nomi dei prodotti e i diritti d'autore presenti sul sito appartengono ai rispettivi titolari e vengono citati esclusivamente a fini identificativi, informativi e descrittivi. Il loro utilizzo non sottintende alcun legame, approvazione o sponsorizzazione da parte dei titolari dei marchi.</p>

  <h2>10. Responsabilità</h2>
  <p>Souk Profumi non risponde di reazioni allergiche, sensibilità cutanee o di qualsiasi danno indiretto derivante dall'uso dei prodotti di profumeria. Consigliamo sempre di leggere l'elenco degli ingredienti, quando disponibile, e di sospendere l'utilizzo in caso di irritazione.</p>

  <h2>11. Forza maggiore</h2>
  <p>Non potremo essere ritenuti responsabili per ritardi o inadempimenti dovuti a circostanze che sfuggono al nostro ragionevole controllo, come ad esempio scioperi, disservizi nei trasporti, eventi naturali o provvedimenti delle autorità.</p>

  <h2>12. Legge applicabile e foro competente</h2>
  <p>I presenti Termini e condizioni sono disciplinati dalla legge italiana. Ogni eventuale controversia sarà devoluta alla competenza esclusiva del foro italiano competente, fatti salvi i diritti inderogabili riconosciuti al consumatore dal diritto dell'UE.</p>

  <h2>13. Contatti</h2>
  <p>Per qualunque domanda sui presenti Termini e condizioni, scrivici tramite il pulsante WhatsApp sul sito oppure usa il modulo nella nostra <a href="%%URL_CONTACT%%">pagina Contatti</a>.</p>
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
  <p>Per Souk Profumi – Profumi Arabi di Nicchia la soddisfazione di chi acquista conta davvero. Vista la natura dei nostri prodotti e per ragioni di igiene, sicurezza e autenticità, le vendite si intendono di norma definitive.</p>

  <h2>Quando non è previsto il rimborso</h2>
  <p>Non possiamo procedere al rimborso nei seguenti casi:</p>
  <ul>
    <li>Ripensamento dopo l'acquisto</li>
    <li>Gusti personali in fatto di fragranze</li>
    <li>Scelta sbagliata del prodotto da parte del cliente</li>
    <li>Prodotti aperti, utilizzati o danneggiati dopo la consegna</li>
    <li>Ordini con dati di spedizione errati indicati dal cliente</li>
  </ul>
  <p>Ti consigliamo di rivedere con calma il tuo ordine prima di confermare l'acquisto.</p>

  <h2>Prodotti danneggiati o errati</h2>
  <p>Se dovessi ricevere:</p>
  <ul>
    <li>Un prodotto danneggiato</li>
    <li>Un prodotto difettoso</li>
    <li>Un articolo diverso da quello ordinato</li>
  </ul>
  <p>Scrivici entro 48 ore dalla consegna, allegando:</p>
  <ul>
    <li>Il numero dell'ordine</li>
    <li>Foto nitide del prodotto e della confezione</li>
    <li>Una breve descrizione del problema</li>
  </ul>
  <p>Dopo aver esaminato la tua segnalazione, potremo decidere, a nostra discrezione, di:</p>
  <ul>
    <li>Inviarti un prodotto sostitutivo</li>
    <li>Riconoscerti un credito da spendere sul negozio</li>
    <li>Proporti un'altra soluzione adeguata</li>
  </ul>

  <h2>Pacchi smarriti</h2>
  <p>Souk Profumi non risponde di ritardi o smarrimenti imputabili al corriere una volta che l'ordine è stato affidato per la consegna. Faremo comunque il possibile per aiutarti ad aprire una segnalazione presso il corriere ogniqualvolta sarà possibile.</p>

  <h2>Annullamento degli ordini</h2>
  <p>Una volta che un ordine è stato elaborato o spedito, non è più possibile annullarlo.</p>

  <h2>Scrivici</h2>
  <p>Per assistenza su un ordine, contattaci su WhatsApp oppure utilizza i recapiti che trovi sul nostro sito.</p>
  <p>Souk Profumi – Profumi Arabi di Nicchia<br>Website: <a href="https://soukprofumi.it">https://soukprofumi.it</a></p>

  <p><strong>Nota importante:</strong> effettuando un ordine su soukprofumi.it dichiari di aver letto e accettato la presente Politica dei rimborsi.</p>
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
  <p>Questa Politica di cancellazione spiega come e quando è possibile annullare un ordine effettuato su soukprofumi.it.</p>

  <h2>1. Tempi per l'annullamento</h2>
  <p>Puoi annullare un ordine senza alcun costo entro <strong>12 ore</strong> dall'invio, a patto che non sia ancora stato preparato o spedito.</p>

  <h2>2. Come annullare</h2>
  <p>Per annullare, scrivici il prima possibile tramite il pulsante WhatsApp presente sul sito, indicando il numero di riferimento del tuo ordine. Una volta gestita la richiesta, ti invieremo conferma scritta dell'avvenuto annullamento.</p>

  <h2>3. Ordini già spediti</h2>
  <p>Se l'ordine è già stato preparato o spedito, non è più possibile annullarlo. In questa eventualità, ti invitiamo a consultare la nostra <a href="%%URL_REFUND%%">Politica dei rimborsi</a>.</p>

  <h2>4. Rimborsi per gli ordini annullati</h2>
  <p>I rimborsi relativi agli ordini annullati correttamente vengono accreditati sullo stesso metodo di pagamento utilizzato, entro <strong>7–14 giorni lavorativi</strong>, in base ai tempi della tua banca o del provider di pagamento.</p>

  <h2>5. Annullamento da parte di Souk Profumi</h2>
  <p>Ci riserviamo il diritto di annullare un ordine, con rimborso completo, nei seguenti casi:</p>
  <ul>
    <li>Prodotto non più disponibile dopo l'invio dell'ordine</li>
    <li>Errori di prezzo o nella descrizione</li>
    <li>Transazioni sospette o potenzialmente fraudolente</li>
    <li>Mancato rispetto dei requisiti di spedizione o di verifica del pagamento</li>
    <li>Circostanze che esulano dal nostro ragionevole controllo</li>
  </ul>

  <h2>6. Contatti</h2>
  <p>Per richieste di annullamento, scrivici tramite il pulsante WhatsApp sul sito oppure usa il modulo nella nostra <a href="%%URL_CONTACT%%">pagina Contatti</a>.</p>
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
  <p>Per Souk Profumi – Profumi Arabi di Nicchia, far arrivare le tue fragranze in fretta, integre e in perfette condizioni è una priorità. Qui sotto trovi tutti i dettagli della nostra Politica di spedizione e gestione.</p>

  <h2>Costi di spedizione</h2>
  <p>Per le consegne in Italia applichiamo tariffe chiare e trasparenti:</p>
  <h3>Italia</h3>
  <ul>
    <li>Ordini sotto i €30,00: spedizione €5,15</li>
    <li>Ordini da €30,00 a €74,99: spedizione €5,00</li>
    <li>Ordini da €100,00 in su: spedizione gratuita</li>
  </ul>
  <p>Il costo di spedizione viene calcolato in automatico e mostrato al momento del checkout.</p>

  <h2>Tempi di consegna</h2>
  <h3>Consegna standard (Italia)</h3>
  <ul>
    <li>Tempo di consegna stimato: 3–4 giorni lavorativi dalla spedizione.</li>
    <li>Si tratta di tempi indicativi, che possono variare a causa del meteo, delle festività, di ritardi del corriere o di circostanze che non dipendono da noi.</li>
  </ul>

  <h2>Preparazione degli ordini</h2>
  <ul>
    <li>In genere gli ordini vengono preparati entro 3 giorni lavorativi.</li>
    <li>Gli ordini ricevuti nel fine settimana o nei giorni festivi vengono lavorati a partire dal primo giorno lavorativo utile.</li>
    <li>Appena l'ordine è pronto, riceverai un'email di conferma della spedizione.</li>
  </ul>

  <h2>Corrieri</h2>
  <p>Ci affidiamo a partner di spedizione affidabili.</p>

  <h2>Tracciamento dell'ordine</h2>
  <p>Una volta spedito l'ordine, ti invieremo via email il relativo codice di tracciamento.</p>
  <p>Con quel codice potrai seguire la spedizione e conoscere la data di consegna stimata.</p>

  <h2>Dove spediamo</h2>
  <p>Al momento effettuiamo spedizioni soltanto all'interno dell'Europa.</p>
  <p>Non spediamo invece verso:</p>
  <ul>
    <li>Caselle postali</li>
    <li>Indirizzi militari</li>
    <li>Servizi di spedizione intermediata</li>
  </ul>

  <h2>Imballaggio e gestione</h2>
  <p>Ogni ordine viene confezionato con attenzione per proteggere i prodotti durante il viaggio.</p>
  <p>Le spese di spedizione coprono unicamente il trasporto e non includono eventuali costi aggiuntivi di gestione o imballaggio, salvo quanto diversamente indicato al checkout.</p>

  <h2>Merce danneggiata e reclami</h2>
  <h3>Entro quando segnalare</h3>
  <p>Se il tuo ordine dovesse arrivare danneggiato, ti chiediamo di segnalarcelo entro 48 ore (2 giorni) dalla consegna.</p>
  <p>Le richieste inoltrate oltre questo termine potrebbero non essere accolte o non dare diritto ad alcun indennizzo.</p>

  <h3>Cosa ci serve per la verifica</h3>
  <p>Per poter valutare una richiesta relativa a prodotti danneggiati o mancanti, ti chiediamo di:</p>
  <ul>
    <li>Riprendere un video continuo, senza interruzioni, mentre apri il pacco.</li>
    <li>Scattare foto nitide del pacco e dei prodotti.</li>
    <li>Conservare tutto il materiale di imballaggio originale.</li>
  </ul>
  <p>Le segnalazioni prive di adeguate prove fotografiche o video potrebbero non essere accolte.</p>

  <h2>Pacchi smarriti o danneggiati</h2>
  <p>Se il tuo pacco va smarrito o arriva danneggiato durante il trasporto:</p>
  <h3>Contattaci subito</h3>
  <p>Tramite WhatsApp</p>
  <p>oppure scrivici dalla <a href="%%URL_CONTACT%%">pagina Contatti</a> del nostro sito.</p>

  <h3>Indicaci</h3>
  <ul>
    <li>Il numero dell'ordine</li>
    <li>Foto o video che documentino il problema</li>
    <li>Una descrizione del danno o dello smarrimento</li>
  </ul>

  <h3>Come risolviamo</h3>
  <p>Apriremo una verifica con il corriere e ci impegneremo a trovare una soluzione adeguata, che potrà consistere in:</p>
  <ul>
    <li>Sostituzione del prodotto</li>
    <li>Credito da spendere sul negozio</li>
    <li>Altre soluzioni ragionevoli, a nostra discrezione</li>
  </ul>

  <h2>Dati di spedizione errati</h2>
  <p>È responsabilità del cliente fornire dati di spedizione corretti e completi.</p>
  <p>Souk Profumi non risponde di ritardi, mancate consegne o costi di spedizione aggiuntivi dovuti a indirizzi sbagliati o incompleti comunicati dal cliente.</p>

  <h2>Aggiornamenti della policy</h2>
  <p>Ci riserviamo il diritto di aggiornare o modificare in qualsiasi momento la presente Politica di spedizione e gestione.</p>
  <p>Le eventuali modifiche verranno pubblicate su questa pagina ed entreranno in vigore non appena rese disponibili.</p>

  <h2>Contatti</h2>
  <p>Souk Profumi – Profumi Arabi di Nicchia<br>Website: <a href="https://soukprofumi.it">https://soukprofumi.it</a></p>
  <p>© 2026 Souk Profumi – Profumi Arabi di Nicchia. Tutti i diritti riservati.</p>
</section>
<!-- /wp:html -->
HTML;
}
