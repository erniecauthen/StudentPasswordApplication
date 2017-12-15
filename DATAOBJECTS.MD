# Database Setup

We are using a MSSQL database in our environment to hold the student accounts that we automatically create daily. What we currently have deployed are two powershell scripts that run 3x a day at different times which query the Banner Oracle database. One script will pull all students that are currently accepted and registered for the current and upcoming semester. We have a second script that looks for newly applied students which have been accepted for the current and upcoming semester. Each of these will dump their data into our MSSQL database into their respective acceptedregistered and appliedstudents table. 

We have also manually run each script to pull from 2015 to current date so we were able to look back in the past for our reset application for students which have been here and may be returning. 

## Table Columns

Both tables have their own unique data but both are setup with the same columns. Some of the columns for the appliedstudents table are not used since items such as campus and program of study aren't input yet. Both tables are setup as follows:

```
[PIDM] [nvarchar](20) NOT NULL,
[STUDENT_ID] [nvarchar](9) NULL,
[sAMAccountName][nvarchar](60) NOT NULL,
[LAST_NAME] [nvarchar](60) NULL,
[FIRST_NAME] [nvarchar](60) NULL,
[MI] [nvarchar](1) NULL,
[MAJR_DESC] [nvarchar](30) NULL,
[MAJR_CODE] [nvarchar](4) NULL,
[UPN] [nvarchar](100) NULL,
[CN] [nvarchar](150) NULL,
[PASSWORD] [nvarchar](30) NULL,
[DISPLAY_NAME] [nvarchar](150) NULL,
[mail] [nvarchar](150) NULL,
[CAMPUS] [nvarchar](4) NULL,
[uDCIdentifier] [nvarchar](225) NOT NULL,
[Birthday] [char](8) NOT NULL,
[bannerID] [nvarchar](9) NOT NULL,
[AddToGroup] [nvarchar](100) NULL,
[LAST_4] [char](4) NULL
```

## CakePHP Functions

CakePHP by default when you bake will build a Controller, Entity, Table, and Template entries for the tables. In order to search both tables at the same time we have created the following:

```
src\Controller\StudentsController.php
src\Model\Entity\Student.php
src\Model\Entity\StudentsTable.php
```

I have removed all functions from the AcceptedregisteredController.php and AppliedstudentsController.php since the only Controller being used is the StudentsController.php As far as the Tables go the StudentsTable.php is where all of our logic is occuring. The StudentsTable.php also references the AcceptedregisteredTable and AppliedstudentsTable.php when it does any of its search functions. This is due to the fact that there **is no database table called students**. 

