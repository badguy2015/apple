server {
    listen       80;     
    server_name  apple.local;
    root /mnt/www/apple/public;
    #重写静态文件
    rewrite ".*\.(js|gif|png|jpg|jpeg|css|php|htm|swf|htc|xml|ico|cur|ttf|mp4)$" $uri last;
    #重写URL（给原URL重写向到index.php入口文件）
    rewrite "^(.*)$" /index.php last;
    location ~ \.php$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        #fastcgi_param  SCRIPT_FILENAME  /scripts$fastcgi_script_name;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }
    location / {
        index index.php index.html;
    }
}