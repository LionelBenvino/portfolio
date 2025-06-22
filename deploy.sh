#!/bin/bash

echo "🔄 Levantando contenedores con Docker Compose..."
docker-compose -f docker-compose.prod.yml up -d --build

echo "⏳ Esperando que MySQL esté listo..."
until docker exec portfolio-db-1 mysql -uuser -ppassword -e "SELECT 1" laravel > /dev/null 2>&1; do
  echo -n "."
  sleep 2
done

echo -e "\n✅ Base de datos lista."

echo "🚀 Ejecutando comandos Artisan dentro del contenedor..."
docker exec portfolio-app-1 php artisan config:clear
docker exec portfolio-app-1 php artisan route:clear
docker exec portfolio-app-1 php artisan view:clear
docker exec portfolio-app-1 php artisan migrate --force
docker exec portfolio-app-1 php artisan storage:link || true
docker exec portfolio-app-1 php artisan key:generate --no-interaction || true

echo "🔐 Reparando permisos..."
docker exec portfolio-app-1 chown -R www-data:www-data storage bootstrap/cache
docker exec portfolio-app-1 chmod -R 775 storage bootstrap/cache

echo "✅ Deploy finalizado correctamente. Accedé a https://89.168.18.215/"
