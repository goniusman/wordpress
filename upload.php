if(.htaccess){

# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /Engilsh-theme-development/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /Engilsh-theme-development/index.php [L]
</IfModule>


php_value upload_max_filesize 64M
php_value post_max_size 64M
php_value max_execution_time 300
php_value max_input_time 300

# END WordPress
}elseif add file in wp_admin by php.ini{
upload_max_filesize = 64M
post_max_size = 64M
max_execution_time = 300
}
