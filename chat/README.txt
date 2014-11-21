Mibew Messenger
Copyright 2005-2014 the original author or authors.

REQUIREMENTS

 * Apache web server 1.3.34 or above
 * MySQL database 5.0 or above
 * PHP 5.3.3 or above with MySQL support

INSTALLATION

1. Create folder with name 'mibew' in the root of your website.
2. Upload all the files contained in this archive (retaining the directory structure) into created folder.
   Be sure to chmod the mibew folder to 755.
3. Add a MySQL database with the name 'mibew'
4. Copy /mibew/configs/default_config.yml to /mibew/configs/config.yml
5. Edit /mibew/configs/config.yml to the information needed to connect to the database
6. Using your web browser visit http://<yourdomain>/mibew/install and
   perform step-by-step installation.
7. Remove /mibew/install.php file from your server
8. Logon as
                  user: admin
                  password: <your password>
9. Get button code and setup it on your site.
10. Change your name.
11. Wait for your visitors on 'Pending users' page.

On unix/linux platforms change the owner of /mibew/files/avatar and
/mibew/cache folders to the user, under which the web server is running
(for instance, www). The owner should have all rights on the folders
/mibew/files/avatar and /mibew/cache
(chmod 700 /mibew/files/avatar && chmod 700 /mibew/cache).
