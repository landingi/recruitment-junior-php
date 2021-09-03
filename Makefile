up:
	docker-compose up -d
down:
	docker-compose down --remove-orphans
stop:
	docker-compose stop
build:
	docker-compose build --no-cache
ci:
	bin/console -q
	bin/phpunit -d memory_limit=256M
	vendor/bin/phpstan analyse -c phpstan.neon --memory-limit=256M
	vendor/bin/ecs check --config vendor/landingi/php-coding-standards/ecs.php
run:
	composer install --no-interaction --prefer-dist
	composer dump-env dev
	exec /usr/bin/supervisord -c /etc/supervisor/supervisord.conf
