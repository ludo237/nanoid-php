test:
	./vendor/bin/pest

coverage:
	./vendor/bin/pest --coverage-html=coverage

phpstan:
	./vendor/bin/phpstan analyse --level=max src
