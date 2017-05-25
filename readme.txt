Information regarding database used(please change accordingly as per your pc database settings)
Database Name - library
Username used- root
Password used - 717645
Host -localhost

The main folder contains homepage and related files 
main page - homedemojs.php in main folder.

bc.php - to show that login first as an administrator if unathorised access is detected.
when pressed Book issue(in top right corner) from the main page: "main/homedemojs.php"
student input/stuip.php - student input form to enter data to issue a book
 The data from this form is sent to the "student input/stu.php" for further database related processing.

If pressed Guest in top right corner - then it allows guest to enter as administrator by entering username and password.
login/login.php - to enter username and password
login/logout.php - to clean the session and logout
root administrator must be added by database and then root administrator can add other users.

Next here i will mention the files related that administrator can only use.
to return a book - areturn.php  then this form uses arp.php and redirects back
to add new users - return.php  uses ret.php
to add new book - web_project.php  which uses web_pro.php

some folders and files was originaly already present in wamp www directory, as i used wamp to use php.
