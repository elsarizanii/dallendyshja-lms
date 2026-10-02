# Dallendyshja LMS

Mire se vini ne ekip! Ky eshte nje Learning Management System full-stack i ndertuar me PHP Laravel, React.js, dhe PostgreSQL. 

## E RENDESISHME!: TypeScript Migration Update
Ne menyre qe te permiresojme kualitetin e kodit dhe te parandalojme runtime errors, komponentet e front-endit do t'i migrojme nga JavaScript ne TypeScript.
* Ju lutem shkruani te gjithe componentet e ri te React-it si: '.tsx' ose '.ts' ne vend te: '.jsx'.
* Sigurohuni qe te percaktoni blloqe te qarta 'interface' per komponentet e ndryshme dhe API response objects.
---

## Setup lokal i projektit

Ndjekni keta hapa ne menyre qe aplikacioni te jete running lokalisht ne kompjuteret/laptopat e juaj:

### 1. Kushtet paraprake
Sigurohuni qe mjeti/device me te cilin do te punoni i ka keto instalime globale:
* PHP (Version 8.2 ose v. me te larte)
* Composer
* Node.js & npm
* PostgreSQL

### 2. Instalimet backend (Laravel API)
1. Hape terminal-in dhe navigo te project root directory.
2. Instalo backend PHP dependencies:
   ```bash
   composer install
   ```
3. Copy the template environment configuration file:
   ```bash
   cp .env.example .env
   ```
4. Gjeneroni celesin tuaj unik te enkriptimit te sigurt per kete aplikacion:
   ```bash
   php artisan key:generate
   ```
5. Hapni skedarin '.env' ne VS Code dhe perditesoni konfigurimin e databazes qe tr perputhet me kredencialet tuaja lokale te PostgreSQL ('DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD').

6. Beji run migrimet e databazes per me i ndertu tabelat lokale:
   ```bash
   php artisan migrate
   ```
7. Filloni serverin tuaj lokal te backend-it per zhvillim:
   ```bash
   php artisan serve
   ```

### 3. Instalimet frontend (React + TypeScript)
1. Open a new terminal tab and navigate into your frontend directory:
1. Hapni nje terminal tab te re dhe navigoni te frontend directory e juaj:
   ```bash
   cd frontend
   ```
2. Instaloni frontend Node packages dhe perkufizimet(definitions) e kerkuara te tipeve per TypeScript:
   ```bash
   npm install
   ```
3. Aktivizo serverin lokal te web-it per React:
   ```bash
   npm start
   ```

---

## Ekipi jone i inxhinierisë dhe rrjedha e Punes
Ne funksionojme si nje ekip Agile nder-funksional. Edhe pse anetaret e ekipit marrin pergjegjesine e perkohshme per "epics" specifike, te gjithe kontribuojnë ne te gjitha nivelet e stack-ut teknologjik (zhvillimi i API-ve me Laravel, dizajni i nderfaqes me React, integrimi i TypeScript dhe testimet e automatizuara) per te nxitur mesimin reciprok dhe njohjen e kodit nga të gjithe.