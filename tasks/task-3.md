# FrontEnd - Prova Tecnica #3

## Obiettivo

Sviluppare un'applicazione React.js per la visualizzazione di una **dashboard riepilogativa** che mostri alcuni dati sintetici sui clienti e sulle vendite.

## Requisiti Tecnici

### Tecnologie

- **React** (puoi usare anche **Next.js**)
- Puoi utilizzare librerie di styling a tua scelta (CSS modules, Tailwind, styled-components, ecc.)
- Non usare altre librerie e/o pacchetti

### Endpoint disponibili

- `GET http://localhost:8080/clienti/elenco`
- `GET http://localhost:8080/vendite/elenco`

---

## Funzionalità Richieste

La dashboard deve mostrare in una singola pagina i seguenti dati:

1. **Numero totale di clienti**

   - Derivato dall’endpoint `clienti/elenco`.

2. **Numero totale di vendite**

   - Derivato dall’endpoint `vendite/elenco`.

3. **Top 3 prodotti più venduti**

   - Ogni vendita contiene un elenco di prodotti acquistati.
   - A partire dalle vendite, calcolare quali sono i 3 prodotti più venduti in base alla quantità totale acquistata.
   - Mostrare nome prodotto e quantità totale venduta.

4. **Fatturato Totale Ultimo Mese**

   - Calcolare il totale di quanto è stato venduto nell'ultimo mese.

5. **Ultime 5 vendite effettuate**
   - Ordinare le vendite per data (decrescente) e mostrare:
     - Nome cliente
     - Data vendita (formato italiano: dd/mm/yyyy)
     - Numero totale di prodotti inclusi

---

### Esempio Struttura Dati

**Cliente**

```json
{
  "id": 1,
  "name": "Mario Rossi",
  "email": "mario.rossi@example.com"
}
```

**Vendita**

```json
{
  "id": 101,
  "id_customer": 1,
  "date": "2024-02-10 15:45:00",
  "products": [
    { "name": "Laptop X15", "quantity": 2 },
    { "name": "Mouse Wireless", "quantity": 1 }
  ],
  "price": 89.99,
  "date_insert": "2025-10-01 09:15:00"
}
```

---

## Requisiti Aggiuntivi

### Layout e UX

- Ogni metrica o sezione può essere mostrata tramite **card o tabella**.
- La UI deve essere chiara, leggibile e **minimamente responsive**.
- È richiesto un semplice stato di **caricamento (loading)** e **errore (error state)** durante il fetch dei dati.

### Styling

- Sei libero di usare qualunque approccio di styling preferisci.
- Non è richiesto un design specifico, ma è apprezzata la cura estetica e la chiarezza visiva.

---

## Note

- Non è necessario implementare il backend, gli endpoint indicati sono già disponibili.
- Puoi utilizzare **Javascript o Typescript**, a seconda delle tue preferenze.
- L’applicazione deve essere contenuta in una cartella denominata `dashboard` posta nella root del progetto.
- Hai a disposizione VSCode come editor e un Browser per effettuare test e ricerche.
- Non utilizzare servizi basati su AI (Agent, Chatbot, Assistant, ecc.) per questa prova.
- In caso di dubbi o domande, non esitare a chiedere chiarimenti.

---

**Tempo stimato:** 1 ora
