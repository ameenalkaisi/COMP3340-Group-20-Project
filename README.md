# COMP3340-Group-20-Project
## Installation for local test server
1. Install XAMPP (https://www.apachefriends.org/download.html) or any other local server that has phpMyAdmin
2. Run Apache and MySQL
3. In a browser, go to this link: localhost/phpmyadmin
4. Go to "Import" tab, and import the .sql file
5. When connecting to the database, use "localhost" for the host, "root" for username, and "" for password
    
After previous steps, can connect the blog database by doing the following:
```
$db = new mysqli("localhost", "root", "", "blogdb");
```


Note: Apache is refusing to start, you may have an apache server already running and it is conflicting. To stop it in Linux, run the following

```
sudo systemctl stop apache2
sudo systemctl disable apache2
```

This stops the current apache2 session, then disables it from auto starting so you don't have to keep doing it. The second command is optional.

The webserver uses files in xampp installation folder's htdocs folder.
In Windows, by default it is C:/xampp/htdocs
In Linux, by default it is /opt/lampp/htdocs