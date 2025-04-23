# 🛠 MetalMachines – MiniCMS bilingue

**MetalMachines** est un site web multilingue (FR/EN) permettant à un administrateur connecté d’éditer dynamiquement les textes et images d’un site vitrine.  
Il est conçu avec **PHP, MySQL, HTML/CSS, JavaScript** et utilise **Cropper.js** pour le recadrage d’images.

---

## 🔍 Fonctionnalités principales

### 🧑‍💼 Espace Admin
- Connexion sécurisée avec hash SHA-256 + salt
- Affichage du temps de session + bouton de déconnexion
- Restriction de l'édition au seul utilisateur connecté

### ✏️ Edition dynamique du contenu
- Texte éditable inline avec `contenteditable`
- Sauvegarde AJAX ou annulation
- Encadrement visuel + effet d’édition stylisé

### 🖼 Edition d’image (Cropper.js)
- Clic sur image `.editable`
- Input fichier + recadrage avec Cropper.js
- Upload temporaire
- Validation → insertion dans la BDD (`media`)
- Annulation → suppression des fichiers non utilisés

### 🧹 Nettoyage automatique
- Script `delete_temp_image.php` pour supprimer :
  - les fichiers dans `/uploads/` **non liés**
  - les lignes `media` **orphelines**

### 🌍 Multilingue (FR / EN)
- Chaque page `.php` a sa version `_en.php`
- La BDD contient `contenu_fr` et `contenu_en` pour chaque élément
- Un sélecteur de langue dans le `header` redirige vers la bonne page
- Le JS détecte automatiquement la langue et charge les bons contenus

---

## 📁 Structure du projet
```plaintext
MetalMachines-main/
│
├── CSS/                    # Fichiers CSS
│   ├── styles.css                 # Fichier principal CSS
│   └── ...       
│
├── HTML/                   # Pages du site (.php)
│   ├── header.php                # En-tête du site
│   ├── footer.php                # Pied de page du site
│   ├── accueil.php               # Page d'accueil du site
│   ├── accueil_en.php            # Page d'accueil en anglais
│   └── ...
│
├── img/                    # Images statiques (non modifiables)
│   
├── JS/                     # Fichiers JS principaux
│   ├── main.js                   # Fichier principal JS (gestion de l'affichage dynamique)
│   ├── edit-mode.js              # Gestion de l'édition globale
│   └── edit-images.js            # Gestion de l'édition d'images
│
├── PHP/                    # Scripts PHP (backend)
│   ├── config.php                # Configuration de la BDD
│   ├── load_content.php          # Chargement du contenu depuis la BDD
│   ├── save_content.php          # Sauvegarde du contenu dans la BDD
│   ├── upload_image.php          # Upload d'images
│   └── delete_temp_image.php     # Suppression d'images temporaires/inutiles
│
├── SQL/                   # Scripts SQL
│   ├── bdd.sql                   # Script pour créer une BDD vide
│   ├── donness.sql               # Script exemple pour insérer un admin à la BDD
│   └── fichier_complet.sql       # Script pour créer une BDD semi-complète
│
├── uploads/                        # Images uploadées (éditées)
│   
├── README.md                       # Documentation du projet
├── delete_elements_and_media.php   # Script de suppression des éléments et médias de la BDD
└── scan_editables.php              # Script de scan automatique des éléments et médias
```

---

## 🧠 Base de données (MySQL)

### Tables clés :
- `admin` → identifiants (email, mot de passe, salt)
- `page` → structure du site (slug, titre_fr, titre_en)
- `element` → contenus éditables (type, ordre, contenu_fr, contenu_en)
- `media` → images (nom_fichier, chemin, type, taille)

Chaque `element` est lié à une `page`, et peut référencer un `media`.

---

## 🚀 Lancer le projet en local

1. Cloner le projet ou placer le dossier dans `htdocs` (`XAMPP`)
2. Importer la base de données (nommée `siteeditable`) via phpMyAdmin 
    - Fichier SQL : `bdd.sql` dans le dossier `/SQL` pour créer une BDD entièrement vide.
    - Fichier SQL : `fichier_complet.sql` dans le dossier `/SQL` pour créer une BDD avec un admin et des pages/groupes de pages par défaut.
3. Lancer XAMPP (`Apache` + `MySQL`)
4. Utiliser les scripts `delete_elements_and_media.php` et `scan_editables.php` pour initialiser la BDD :
   - `delete_elements_and_media.php` : supprime les entrées `element` et `media` de la BDD (réinitialisation).
   - `scan_editables.php` : scanne les fichiers `.php` et ajoute les éléments éditables *(class="editable")* dans la BDD.
5. Accéder au projet :  
   👉 `http://localhost/MetalMachines-main/HTML/accueil.php`

### Compte admin par défaut :

- **Email** : `admin@example.com`
- **Mot de passe** : `admin62`

---

## ⚙️ Scripts utiles

### `delete_elements_and_media.php`

- Supprime toutes les entrées `element` et `media` de la BDD
- Utiliser pour réinitialiser la BDD avant de relancer `scan_editables.php`
- **Attention** : Utiliser avec précaution, car cela supprime toutes les données de la BDD *(hors page, groupepage, et admin)* !

### `scan_editables.php`

- Scanne toutes les pages `.php` dans `/HTML`
- Ajoute automatiquement tous les éléments `.editable` dans la BDD
- Gère la langue automatiquement (`contenu_fr` / `contenu_en`)
- Met à jour les `data-key` dans les fichiers HTML
- **Attention** : Ne fonctionne que sur une BDD avec des pages et groupes de pages déjà créés (avec correspondance entre le slug de la page et le nom du fichier) !

### `delete_temp_image.php`

- Supprime les images non utilisées sur disque
- Supprime aussi les entrées `media` orphelines dans la BDD
- **Note** : Est exécuté automatiquement lors d'un changement d'images.

---

## 🧑‍💻 Auteurs

Projet développé dans un but pédagogique et professionnel,
Pour MétalMachines, par le groupe DEFT dans le cadre du projet informatique | (IG2I 2025).

---

