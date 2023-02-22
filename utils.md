
# Composer
-composer init
-Mise a jour du nom de famille (App) de nos classes
-composer du -o  pour mettre a jour le fichier composer.json

# Vider le cache
git rm -rf --cached .
git add .

# Pour ouvrir directement dans le navigateur
php -S localhost:8000 -d display_errors=1 -t public