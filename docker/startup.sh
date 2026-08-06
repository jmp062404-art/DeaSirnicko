#!/bin/sh

echo "Running migrations and seeding database ..."

# Run migrations
php artisan migrate --force

# Run seeders
php artisan db:seed --force

echo "Starting supervisord..."

# Start supervisord
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
