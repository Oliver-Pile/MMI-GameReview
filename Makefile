all: compile_css server
compile_css:
	sass scss/main.scss css/styles.css
server:
	php -S localhost:3001
