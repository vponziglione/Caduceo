# Caduceo 

Benvenuti in **Caduceo**, la **prima piattaforma interamente italiana** dedicata alla digitalizzazione e al miglioramento della comunicazione tra strutture sanitarie pubbliche e private su scala nazionale.

## Introduzione
Caduceo mira a creare un **ecosistema interoperabile** che consenta:
- Lo scambio **sicuro**, **istantaneo** e **tracciabile** di dati clinici.
- Una sanità **più efficiente**, **integrata** e **orientata al paziente**.

**Perché scegliere Caduceo?**
- Riduzione della burocrazia.
- Maggiore accessibilità ai dati clinici.
- Migliore coordinamento tra strutture sanitarie.

---

## Funzionalità principali
1. **Digitalizzazione dei processi sanitari** 
   - Trasformare i dati cartacei in dati digitali per migliorare la gestione e l'accessibilità.
2. **Interoperabilità** 
   - Garantire la comunicazione tra sistemi diversi e la compatibilità tra strutture pubbliche e private.
3. **Sicurezza e Tracciabilità** 
   - Protezione dei dati clinici con i più alti standard di sicurezza e audit continuo.
   
-- database pazienti_db

CREATE DATABASE IF NOT EXISTS dottore_db;

-- Seleziona il database creato
USE dottore_db;

-- tabella users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,        -- Identificatore univoco
    email VARCHAR(255) NOT NULL UNIQUE,       -- Indirizzo email (unico e obbligatorio)
    name VARCHAR(100) NOT NULL,               -- Nome (obbligatorio)
    surname VARCHAR(100) NOT NULL,            -- Cognome (obbligatorio)
    password VARCHAR(255) NOT NULL,           -- Password crittografata (obbligatoria)
    phone_number CHAR(10),                    -- Numero di telefono (opzionale, max 10 cifre)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Timestamp di registrazione
);
