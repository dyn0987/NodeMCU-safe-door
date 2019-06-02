NodeMCU safe door

A pattern lock safe door, similar to that of Android app but built on website.

Uses the NodeMCU to make requests to webserver on 000webhostapp to check if the user inputs the correct pattern password.
If pattern input is correct, then the lock will open.

The website built from this code is fully-grown-apprent.000webhostapp.com
Use the index.html file to see the website.

cronjob.php is used to reset the database table so that the safe door will not remain open after the user input the correct password. cronjob.php is run using external cron job service , cron-job.org.

The getdata.php is used to observe the newest status of the user input, whether it succeed or not. It will output status=1 if succeed and status=0 if the password is false. It will output null after some time after cron job has done its part.

NodeMCU will make request to the getdata.php and based on the JSON output, will either open or close the safe door.



