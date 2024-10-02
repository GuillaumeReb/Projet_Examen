# SDBMLa Société Des Bières du Monde (SDBM) a fait appel à notre équipe pour créer un site web dédié aux bières du monde. Ce site a pour objectif de présenter leur catalogue de produits, d'informer les clients sur les caractéristiques des différentes bières, et de faciliter les commandes en ligne.
---
## Installation pour réinstaller les dépendances manquantes (le dossier vendor) dans un projet Symfony après avoir cloné le dépôt GitLab, vous devez utiliser Composer, qui est le gestionnaire de dépendances de PHP.
Voici les étapes à suivre :
1. **Assurez-vous que Composer est installé** sur votre machine. 
Vous pouvez vérifier en exécutant la commande suivante dans votre 
terminal :```bash    composer --version    ```   
Si Composer n'est pas installé, vous pouvez le télécharger et l'installer depuis le site officiel de Composer.2. 
**Naviguez dans le répertoire du projet** que vous avez cloné. Utilisez la commande `cd` pour accéder au dossier de votre projet :    ```bash    cd /chemin/vers/votre/projet    ```
3. **Installez les dépendances** en utilisant Composer. Une fois dans le répertoire du projet, exécutez la commande suivante :    ```bash    composer install    ```   Cette commande va lire le fichier `composer.json` (et `composer.lock` si disponible) et télécharger toutes les dépendances nécessaires dans le dossier `vendor`.
4. **Vérifiez que tout est en ordre**. Une fois l'installation terminée, vous devriez voir le dossier `vendor` réapparaître dans votre projet, avec toutes les bibliothèques nécessaires.
---
## Outils utilisés### Code Sniffer[PHP_CodeSniffer](https://github.com/PHPCSStandards/PHP_CodeSniffer/) permet de vérifier le style du code.Lancement de la commande de vérification :```vendor/bin/phpcs```
---
### PHPStanPHPStan est un outil d'analyse statique pour PHP qui détecte les erreurs de type et les bugs potentiels dans le code avant l'exécution, en analysant le code source pour assurer sa qualité et sa robustesse.Lancement de la commande de vérification :```vendor/bin/phpstan analyse src tests --level=1 --memory-limit=1G -c phpstan.neon```Pensez à augmenter --level=1 après chaque validation.
---
### Server Symfony :Pour démarrer ou arrêter le serveur Symfony :- Démarrage : `symfony server:start`- Démarrage en arrière-plan : `symfony server:start -d` - Arrêt :`symfony server:stop`
---
### Utile : - Vidage du cache : `Php bin/console cache:clear --env=dev`---


