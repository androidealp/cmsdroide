<<<<<<< HEAD
vendor/autoload.php:
	composer install --no-interaction --prefer-source --dev

.PHONY: sniff
sniff: vendor/autoload.php
	vendor/bin/phpcs --standard=PSR2 src -n

.PHONY: test
test: vendor/autoload.php
	vendor/bin/phpunit --verbose
=======
vendor/autoload.php:
	composer install --no-interaction --prefer-source

.PHONY: sniff
sniff: vendor/autoload.php
	vendor/bin/phpcs --standard=PSR2 src -n

.PHONY: test
test: vendor/autoload.php
	vendor/bin/phpunit --verbose
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
