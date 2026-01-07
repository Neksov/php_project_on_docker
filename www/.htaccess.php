<!--RewriteEngine On-->
<!---->
<!--# Редирект .php → чистый URL-->
<!--RewriteCond %{THE_REQUEST} ^[A-Z]{3,}\s([^.]+)\.php\sHTTP [NC]-->
<!--RewriteRule ^ %1/ [R=301,L]-->
<!---->
<!--# Чистый URL → .php-->
<!--RewriteCond %{REQUEST_FILENAME} !-f-->
<!--RewriteCond %{REQUEST_FILENAME} !-d-->
<!--RewriteCond %{REQUEST_FILENAME}.php -f-->
<!--RewriteRule ^(.*)/?$ $1.php [NC,L]-->
