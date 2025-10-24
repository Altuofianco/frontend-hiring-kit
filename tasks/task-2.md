# FrontEnd - Prova Tecnica #2

## Obiettivo

Sviluppare un'applicazione React.js per l'inserimento di un nuovo cliente su di un database.

## Requisiti Tecnici

### Tecnologie

- **React** (puoi usare anche **Next.js**)
- Puoi utilizzare librerie di styling a tua scelta (CSS modules, Tailwind, styled-components, ecc.)
- Puoi utilizzare librerie per facilitare la validazione dei dati (zod, yup, etc etc.)
- Non puoi utilizzare altre librerie e/o pacchetti

### Funzionalità

- Form per l'inserimento di un nuovo cliente
- Campi del form:
  - Nome (obbligatorio)
  - Email (obbligatorio)(email valida)
  - Telefono (opzionale)
  - Indirizzo (opzionale)
- Validazione dei campi obbligatori
- Inviare i dati all'endpoint: `POST http://localhost:8080/clienti/inserisci`
- Se l'inserimento va a buon fine, l'endpoint restituisce i dati del cliente inserito
- Dopo l'inserimento con successo, aggiungere i dati ottenuti all'elenco dei clienti inseriti
- Gestire eventuali errori e mostrare messaggi appropriati

## Endpoint API Disponibili

Base URL: `http://localhost:8080`

| Metodo | Endpoint             | Descrizione                |
| ------ | -------------------- | -------------------------- |
| POST   | `/clienti/inserisci` | Inserisce un nuovo cliente |

## Requisiti Aggiuntivi

### User Experience

- Fornire feedback visivo all'utente durante le operazioni (es. loading states)
- Mostrare messaggi di successo/errore dopo ogni operazione

### Styling

- Sei libero di utilizzare qualsiasi approccio di styling preferisci
- L'interfaccia deve essere pulita, professionale e user-friendly
- Non è richiesto un design particolare, ma è apprezzata l'attenzione ai dettagli

## Note

- Non è necessario implementare il backend, gli endpoint sono già disponibili
- Puoi utilizzare Javascript o Typescript, a seconda delle tue competenze
- L'applicazione deve essere contenuta in una cartella denominata `client` posta nella root di questo progetto
- Hai a disposizione VSCode come editor
- Puoi utilizzare qualunque Browser per effettuare ricerche e consultare documentazione
- Non utilizzare servizi basati su AI (Agent, Chatbot, Assistant, ecc.) per questa prova
- In caso di dubbi o domande, non esitare a chiedere chiarimenti

---

**Tempo stimato:** 1 ora
