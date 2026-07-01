#!/bin/bash
set -euo pipefail

# Uso:
#   ./deploy.sh          → deploy normal (migrate)
#   ./deploy.sh --seed   → primer deploy: además corre los seeders (carga inicial)
#
# Requiere un archivo .env.prod en este directorio (gitignored) con:
#   APP_KEY, DB_DATABASE, DB_USERNAME, DB_PASSWORD, DB_ROOT_PASSWORD
# El TLS lo maneja Traefik (Let's Encrypt) vía los labels del compose.

COMPOSE="docker compose --env-file .env.prod -f docker-compose.prod.yml"
SEED=""
[ "${1:-}" = "--seed" ] && SEED="--seed"

if [ ! -f .env.prod ]; then
  echo "❌ Falta .env.prod en $(pwd). Copiá .env.prod.example y completá los valores."
  exit 1
fi

echo "🔄 Levantando contenedores con Docker Compose..."
$COMPOSE up -d --build

echo "⏳ Esperando que MySQL esté listo..."
until docker exec portfolio-db-1 mysqladmin ping -h localhost --silent > /dev/null 2>&1; do
  echo -n "."
  sleep 2
done
echo -e "\n✅ Base de datos lista."

echo "🚀 Ejecutando comandos Artisan dentro del contenedor..."
docker exec portfolio-app-1 php artisan config:clear
docker exec portfolio-app-1 php artisan route:clear
docker exec portfolio-app-1 php artisan view:clear
docker exec portfolio-app-1 php artisan migrate --force $SEED
docker exec portfolio-app-1 php artisan storage:link || true

echo "🔐 Reparando permisos..."
docker exec portfolio-app-1 chown -R www-data:www-data storage bootstrap/cache
docker exec portfolio-app-1 chmod -R 775 storage bootstrap/cache

echo "✅ Deploy finalizado. Sitio: https://lionelbenvino.xyz/"
