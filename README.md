# Student Password Reset

This is a password reset application that is meant to allow students to reset their password after searching for their account. What we have done at Atlanta Technical College is created a MSSQL database that syncs 3x a day with a BannerDB. Any students who are considered "accepted" at ATC will have their account automatically created in AD via a MSSQL database. It is within that MSSQL that we validate our students by having them enter their First Name, Last Name, and either their 900 number OR last 4. This is the minimal information needed since we allow for verbal resets over the phone once a student can confirm their 900 number to us.

## Important Notes

You can test nearly everything with this initial deployment on a windows machine but you will NOT be able to actually do the password reset function. There are guides out there on how to create a SSL connection to ADUC within Windows but our development was to have the functionality within Linux. **We are also NOT covering how to generate the required SSL certificates within Linux as there are several ways to do this and you should perform best practice within your environment.**

## Getting Started

<<<<<<< HEAD
**MAKE A COPY OF YOUR SECURITY SALT** as I have removed ours from the app.php file. You will need your own SALT in order to run the application and hash the passwords for writing.**

=======
>>>>>>> 2ae44f4a92d22076cad1663c6d17a33b7b79965a
These instructions will go over a very brief overview on how to get this application up and running in your local environment. It is recommended that you create a local repo to test with then push that into your production environment after making the needed changes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Linux Ubuntu 16.04 LTS
Windows Server 2008 R2 hosting ADUC
Domain Admin level account with a secure password which never expires
Windows Server 2008 R2 with MSSQL 2012
A way to import accounts from Banner (or your version of Banner) into MSSQL

### Installing

This was developed on a windows machine using WAMP and as a result all examples will be base on a standard C:\Wamp\ install. You want to make sure that before you being you place the sqlsrv_7 dll files **into the correct location on your setup. I have included the .dll files that we are using to create the MSSQL connection already but you may need to do more configuration depending on your environment.**

After downloading the application and deploying to your local machine make sure you copy files from the following location

```
C:\wamp\www\mssql-dll\
```

INTO your PHP version 7.0.23 folder

```
C:\Wamp\bin\php\php7.0.23\ext
```

*This is required to create the MSSQL databse connection used within the application.*

You will also need to enable the PHP 7.0.23 extensions by adding the following to the php.ini file.

```
extension=php_sqlsrv_7_ts_x64.dll
extension=php_sqlsrv_7_ts_x86.dll
extension=php_pdo_sqlsrv_7_ts_x64.dll
extension=php_pdo_sqlsrv_7_ts_x86.dll
```

After adding those to the php.ini restart the WAMP server. Make sure that you are using the php7.0.23 instance and enable the extenstions for the WAMP application. You can enable them by opening the WAMP interface and going to the following PHP > PHP extensions > and checking the php_pdo_sqlsrv / php_sqlsrv extensions.

<<<<<<< HEAD
![php_extensions](erniecauthen.github.com/StudentPasswordReset/Images/php_extensions.PNG)

=======
![php_extensions](erniecauthen.github.com/StudentPasswordReset/blob/master/Images/php_extensions.PNG)
>>>>>>> 2ae44f4a92d22076cad1663c6d17a33b7b79965a

## File Changes To Make

Below will be a list of tiles that you will need to adjust according to your environment. Changes that need to be addressed will either be commented out with a // and listed as such OR they will have a comment details in the start of the file listing what needs to be addressed. I am listing files to address below so check each file to see what changes you need to make.

```
config\app.php
```
<<<<<<< HEAD
*	Add security salt
*	Edit Database connection items
*	Enable debug if needed

=======
>>>>>>> 2ae44f4a92d22076cad1663c6d17a33b7b79965a
```
src\Controller\StudentsController.php
src\Model\Entity\Student.php
src\Model\Table\StudentsTable.php
```
<<<<<<< HEAD
*	Using sAMAccountName to reference database entry in ldapPasswordReset in StudentsTable.php
*	$ldapServer needs to be in the form of ldaps:// in StudentsTable.php
*	$ldapAccount needs to be an account that has AD access which can reset an account. This can be done with the 'Delegate Control...' but we will not go into that functonality.
*	$ldapPassword needs to have the password for the above account.
*	$ldapTree should be the base OU that all of the student accounts are housed in.

```
src\Template\Layout\default.ctp
src\Template\Students\reset.ctp
src\Template\Students\reset_success.ctp
```

*	We have the site header located in the default.ctp as the $cakeDescription variable
*	The favicon is line 40 in the default.ctp
*	The college name and logo can be changed in the reset.ctp file
*	Returing sAMAccountName to user in the reset_password.ctp page so that they can see their username
*	The reset_success.ctp should have the <a href=""> for the success footer edited as this is pointing to the atlantatech.edu banner page

=======
```
src\Template\Students\reset.ctp
src\Template\Students\reset_input.ctp
src\Template\Students\reset_password.ctp
src\Template\Students\reset_success.ctp
```

>>>>>>> 2ae44f4a92d22076cad1663c6d17a33b7b79965a
## Deployment

TO-DO

## Built With

* CakePHP 3.5 - Framework

## Authors

* **Ernie Cauthen** - *Initial work* - [Ernie Cauthen](https://github.com/erniecauthen)

## License

This project is sole property of Atlanta Technical College and licensed under the MIT license.
