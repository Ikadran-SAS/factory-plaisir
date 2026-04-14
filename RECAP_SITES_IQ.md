# Recap des sites — Groupe IQ

> Mise a jour : 31 mars 2026

---

## Les 6 projets

| Marque        | Emplacement              | Adresse                                       | Stack           | Statut           |
| ------------- | ------------------------ | --------------------------------------------- | --------------- | ---------------- |
| Factory & Co  | Mon Grand Plaisir (78)   | 1170 Av. de Saint-Germain, 78370 Plaisir      | Laravel + Blade | En production    |
| Factory & Co  | Westfield Aeroville (93) | 30 Rue des Buissons, 93290 Tremblay-en-France | Laravel + Blade | En production    |
| Factory & Co  | Val d'Europe (77)        | 14 Rue du Danube, 77700 Serris                | Laravel + Blade | En production    |
| Italian Queen | Val d'Europe (77)        | 3 Pl. de Toscane, 77700 Serris                | Laravel + Inertia/Vue | En production |
| Italian Queen | Plan de Campagne (13)    | A personnaliser                               | Laravel + Inertia/Vue | En preparation (clone de VDE, non personnalise) |
| IQ Platform   | Back-office              | —                                             | Laravel + Inertia/Vue + Fortify | En developpement (admin marques & sites) |

---

## Pages disponibles

### Factory & Co (3 sites)

Tous les sites Factory & Co disposent des memes rubriques :

- **Accueil** — Vitrine principale : produits phares, avis clients, horaires, FAQ
- **Notre Concept** — Histoire de la marque, valeurs, identite
- **Nos Specialites** — Smash Burgers, Bagels, Cheesecakes, Breakfast
- **La Carte** — Menu complet avec les prix et les options alimentaires (halal, vegetarien)
- **Avis Clients** — Avis Google avec note globale et nombre total d'avis
- **FAQ** — Questions classees par theme : acces, horaires, allergenes, commandes, specialites
- **Contact** — Formulaire de contact, plan, coordonnees
- **Blog** — Articles SEO (voir statut ci-dessous)
- **Mentions legales / Confidentialite / CGU** — Pages juridiques

| Page            | Plaisir | Aeroville | Val d'Europe |
| --------------- | ------- | --------- | ------------ |
| Click & Collect | Oui     | Non (route absente) | Oui |
| Blog            | Masque  | Masque    | Masque       |

### Italian Queen (2 sites)

- **Accueil** — Page riche tout-en-un : carte, concept, specialites, avis, FAQ, newsletter
- **La Carte** — Pizzas napolitaines, pates fraiches, antipasti, cocktails
- **Notre Concept** — Trattoria napolitaine moderne, sans reservation
- **Nos Specialites** — Pizzas signatures
- **Avis Clients** — Avis Google (dynamiques via API)
- **Mentions legales / Confidentialite** — Pages juridiques

| Page    | Val d'Europe | Plan de Campagne |
| ------- | ------------ | ---------------- |
| Blog    | Desactive (routes commentees) | Desactive (routes commentees) |
| Contact | Desactive (route commentee) | Desactive (route commentee) |

### IQ Platform (back-office)

- **Dashboard** — Tableau de bord (auth requise)
- **Admin Marques** — CRUD des marques (Factory & Co, Italian Queen)
- **Admin Sites** — CRUD des sites par marque

---

## Avis Google — Statut

| Site                      | Source des avis                    | Seeder               | Stats bandeau hero     |
| ------------------------- | --------------------------------- | -------------------- | ---------------------- |
| Factory & Co Plaisir      | Vrais avis Google (synchronises)  | Appelle `reviews:sync-google` | Dynamiques (API Google) |
| Factory & Co Aeroville    | **AVIS FICTIFS** (seeder)         | Faux avis hardcodes + truncate | **Hardcodes (4.5★, 6 460)** |
| Factory & Co Val d'Europe | **AVIS FICTIFS** (seeder)         | Faux avis hardcodes + truncate | **Hardcodes (4.5★, 6000+)** |
| Italian Queen Val d'Europe | Vrais avis Google (API) + fallback statique | Pas de seeder | **Hardcodes (4.8/5, 200+ avis)** |
| Italian Queen Plan de Campagne | Vrais avis Google (API) | Pas de seeder | **Hardcodes (donnees VDE, pas PDC)** |

**La commande `php artisan reviews:sync-google` existe sur Aeroville et Val d'Europe mais n'est pas utilisee.**
Les ReviewSeeders de ces 2 sites inserent encore les memes 6 faux avis (Marie L., Thomas R., Sophie M., etc.) avec un `truncate()` qui ecrase tout.

---

## Blog — Statut

| Site                      | Statut du blog                         | Visible dans le menu ? |
| ------------------------- | -------------------------------------- | ---------------------- |
| Factory & Co Plaisir      | 6 articles prepares, adaptes a Plaisir | Non, masque            |
| Factory & Co Aeroville    | Articles prepares, adaptes a Aeroville | Non, masque            |
| Factory & Co Val d'Europe | Articles prepares, adaptes a Val d'Europe | Non, masque         |
| Italian Queen Val d'Europe | Routes commentees, composant Blog.vue present | Non, desactive |
| Italian Queen Plan de Campagne | Routes commentees, composant Blog.vue present | Non, desactive |

---

## GTM & Analytics

| Site                         | Google Tag Manager | Google Analytics | Bandeau cookies        |
| ---------------------------- | ------------------ | ---------------- | ---------------------- |
| Factory & Co Plaisir         | GTM-5ZR7Z7JK       | G-WSJJ1E3F4P     | Oui, avec consentement |
| Factory & Co Aeroville       | GTM-PWLG649S       | Via GTM          | Oui, avec consentement |
| Factory & Co Val d'Europe    | GTM-PWS5VJBC       | G-WSJJ1E3F4P     | Oui, avec consentement |
| Italian Queen Val d'Europe   | GTM-WGTXR4KZ       | Via GTM          | **Non (a ajouter)**    |
| Italian Queen Plan de Campagne | GTM-WGTXR4KZ (meme que VDE !) | Via GTM | **Non (a ajouter)** |

Tous les sites Factory & Co respectent le **Google Consent Mode v2**. Les sites Italian Queen n'ont pas de bandeau cookies.

---

## Horaires declares

| Site                         | Lun-Mer       | Jeu-Ven       | Sam-Dim       |
| ---------------------------- | ------------- | ------------- | ------------- |
| Factory & Co Plaisir         | 08h00 – 21h30 (L-J) | 08h00 – 23h00 (V-S) | 08h00 – 21h30 |
| Factory & Co Aeroville       | 08h30 – 22h00 (D-J) | 08h30 – 23h00 (V-S) | — (incl. dans D-J) |
| Factory & Co Val d'Europe    | 07h00 – 21h30 (L-Me) | 07h00 – 22h00 (J-V) | 07h00 – 22h30 |
| Italian Queen Val d'Europe   | 09h00 – 22h30 (7j/7) | — | — |
| Italian Queen Plan de Campagne | A personnaliser (affiche encore les horaires VDE) | — | — |

---

## SEO — Ce qui a ete mis en place

### Pour tous les sites Factory & Co

- **Balises title et description** optimisees avec nom, ville et code postal
- **Donnees structurees (Schema.org)** : Restaurant, adresse, GPS, horaires, note Google, options alimentaires, reseaux sociaux, FAQ, breadcrumb
- **Sitemap XML** + **Sitemap HTML** + **robots.txt**
- **Balises geo** pour le referencement local
- **Metas Open Graph** pour le partage social

### Specificites Factory & Co Plaisir (le plus avance)

- Titles SEO optimises (50-60 caracteres, entite en premier)
- Descriptions enrichies avec mentions halal/vegetarien
- Synchronisation automatique des vrais avis Google
- Note et nombre d'avis dynamiques dans le bandeau stats

### Sites Italian Queen

- Schema.org Restaurant avec coordonnees
- Avis Google dynamiques via API (pas de seeder)
- Meta title et description sur chaque page

---

## Actions en attente

### Priorite haute

1. **Avis Aeroville** : Remplacer le ReviewSeeder par la sync Google (comme Plaisir) et rendre les stats du bandeau hero dynamiques
2. **Avis Val d'Europe** : Idem — ReviewSeeder + stats bandeau hero a rendre dynamiques
3. **Italian Queen RGPD** : Ajouter le bandeau cookies + Consent Mode sur VDE et Plan de Campagne

### Priorite moyenne

4. **IQ Plan de Campagne** : Personnaliser entierement le site (adresse, horaires, meta descriptions, GTM ID propre) — actuellement c'est un clone brut de VDE
5. **Blog** : Activer la navigation vers le blog sur tous les sites des que les contenus sont valides
6. **SEO Titles Aeroville & VDE** : Optimiser les titles (actuellement trop longs, tronques dans Google)
7. **Horaires hero FC VDE** : Le hero affiche "8h30 – 22h" mais la BDD contient "7h00 – 21h30/22h00/22h30" — a corriger
8. **Contact FC Aeroville & VDE** : Les formulaires de contact n'envoient pas d'email (TODO dans le code, affiche juste un message de succes)
9. **Stats IQ VDE** : Note (4.8/5) et nombre d'avis (200+) hardcodes dans Home.vue — a rendre dynamiques

### Priorite basse

10. **Italian Queen Contact** : Activer la page contact sur VDE et Plan de Campagne
11. **Click & Collect Aeroville** : Ajouter la route et la page (la vue existe mais pas de route)
12. **IQ Platform** : Poursuivre le developpement du back-office admin
