@ECHO OFF
    ECHO Starting PHP FastCgi
    Set PATH = C:\xampp\php;%PATH%
    C:\xampp\php\php-cgi.exe -b 127.0.0.1:9000 -c C:\xampp\php\php.ini