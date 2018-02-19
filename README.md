# Student Password Reset

This is a password reset application that is meant to allow students to reset their password after searching for their account. What we have done at Atlanta Technical College is created a MSSQL database that syncs 3x a day with an OracleDB used by BannerWeb. Any students who are considered "accepted" at ATC will have their account automatically created in AD via the MSSQL database. It is within that MSSQL that we validate our students by having them enter their First Name, Last Name, and either their 900 number OR last 4 of their Social Security Number. This is the minimal information needed since we allow for verbal resets over the phone once a student can confirm their 900 number to us.

## Important Notes

You can test nearly everything with this initial deployment on a windows machine but you will NOT be able to actually do the password reset function. There are guides out there on how to create a SSL connection to ADUC within Windows but our development was to have the functionality within Linux. **We are also NOT covering how to generate the required SSL certificates within Linux as there are several ways to do this and you should perform best practice within your environment.**

## Getting Started

**AFTER INSTALLING CAKEPHP MAKE A COPY OF YOUR SECURITY SALT** as I have removed ours from the app.php file. You will need your own SALT in order to run the application and hash the passwords for writing.

These instructions will go over a very brief overview on how to get this application up and running in your local environment. It is recommended that you create a local repo to test with then push that into your production environment after making the needed changes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

*   Linux Ubuntu 16.04 LTS
*   Windows Server 2008 R2 hosting ADUC
*   Domain Admin level account with a secure password which never expires
*   Windows Server 2008 R2 with MSSQL 2012
*   A way to import accounts from Banner (or your version of Banner) into MSSQL

## Deployment

### Installing

This application was developed on a Windows machine using WAMP. For a production installation you will need to copy the files to the public location on your Linux server. The default public for an Ubuntu server is /var/www/html/ but I recommend changing this location. Due to each environment being different I will **not** cover how to setup the server to host this application but I will go over adding the sqlsrver.so extensions. You will at minumum need the following setup however:
*	Install LAMP
*	Install Composer
*	Enable rewrite
*	Enable AllowOverride
*	Enable new site / Disable default site
*	Install the sqlsrv .so files and enable them

#### Adding the SQLSRV Extensions
This section has been included due to the difficulty I experienced finding any real documentation on this. Below are the steps that I took to get the sqlsrv.so and pdo_sqlsrv.so extensions enabled in PHP. You will need the SU password in order to setup these extensions.

Run the following commands in order:
	*	sudo pecl install sqlsrv pdo_sqlsrv

**Here I had to su to run as root. Even doing sudo I was getting a permissons denied error.**
	*	sudo su
	*	*Enter the SU password*	
	*	curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
	*	curl https://packages.microsoft.com/config/ubuntu/16.04/prod.list > /etc/apt/sources.list.d/mssql-release.list
	*	echo "extension=pdo_sqlsrv.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`
	*	echo "extension=sqlsrv.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`
	*	exit

**Now we need to edit the php.ini file to add the extensions.**
	*	sudo vi /etc/php/7.0/apache2/php.ini

**Scroll down untill you see the list of commented extenstions like ;extension=somethingsomething.dll**
**Add the following to the file**
	8	extension=pdo_sqlsrv.so
	8	extension=sqlsrv.so

**We are downgrading some tools here but we need this for the ODBC 13 Drivers for SQL**
	*	sudo apt-get update
	*	sudo ACCEPT_EULA=Y apt-get install msodbcsql=13.0.1.0-1 mssql-tools=14.0.2.0-1
	*	sudo apt-get install unixodbc-dev-utf16

**Create symlinks for tool**
	*	ln -sfn /opt/mssql-tools/bin/sqlcmd-13.0.1.0 /usr/bin/sqlcmd 
	*	ln -sfn /opt/mssql-tools/bin/bcp-13.0.1.0 /usr/bin/bcp

**Restart the apache server**
	*	sudo service apache2 restart

### File Changes To Make

Below will be a list of tiles that you will need to adjust according to your environment. Changes that need to be addressed will either be commented out with a // and listed as such OR they will have a comment details in the start of the file listing what needs to be addressed. I am listing files to address below so check each file to see what changes you need to make.

#### config\app.php
*	Add security salt
*	Edit Database connection items
*	Enable debug if needed (*remember to set this to FALSE before you allow public access to your site*)

#### src\Controller\StudentsController.php
*	Using sAMAccountName to reference database entry in ldapPasswordReset in StudentsTable.php

#### src\Model\Table\StudentsTable.php
*	$ldapServer needs to be in the form of ldaps:// in StudentsTable.php
*	$ldapAccount needs to be an account that has AD access which can reset an account. This can be done with the 'Delegate Control...' but we will not go into that functionality.
*	$ldapPassword needs to have the password for the above account and this password should not have an expiration.
*	$ldapTree should be the base OU that all of the student accounts are housed in.

#### src\Template\Layout\default.ctp
*	We have the site header located in the default.ctp as the $cakeDescription variable
*	The favicon is line 40 in the default.ctp

#### src\Template\Students\reset.ctp
*	The college name and logo can be changed in the reset.ctp file

#### src\Template\Students\reset_password.ctp
*	Returing sAMAccountName to user in the reset_password.ctp page so that they can see their username

#### src\Template\Students\reset_success.ctp
*	The reset_success.ctp should have the <a href=""> for the success footer edited as this is pointing to the atlantatech.edu banner page

## Built With

* CakePHP 3.5.7
* jQuery UI - v1.12.1
* jQuery Validation Plugin v1.17.0

## Authors

* **Ernie Cauthen** - *Initial work* - [Ernie Cauthen](https://github.com/erniecauthen)

## License

This project is sole property of Atlanta Technical College and licensed under the MIT license.
