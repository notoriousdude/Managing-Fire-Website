# Managing-Fire-Website
**A group-based web development project for the NASA International Space Apps Challenge 2023:**
Due to climate change, wildfires are becoming more common and detrimental. While data and forecasting are already available; this information is scattered and not yet public-user-centered - those who are impacted the most. This is why we built a website around intuitiveness - with the ultimate goal to assist the public and authorities in fire management and especially to inform those who are under-informed, such as non-native English speakers. It also helps share the burden with existing public warning systems - which are robust yet still have the possibility of malfunctioning. Our project attempts to centralize the distribution of crucial fire management and safety data to the public and present them in an intuitive way, all while allowing the public and authorities to stay aware of and mitigate the situation by including a host of features - such as publicizing where aid is available or managing reported fires.

Here are the instructions on how to view the source code and run our website on your local machine:
- To begin with, you need to install the following apps (if needed) onto your local machine: Visual Studio Code (to run HTML, CSS, JS, PHP), and XAMPP (https://www.apachefriends.org/) (to run local host and MySQL database).

- If you want to view source code: you need to unzip the file and when you attempt to open the folder NASA, right-click and choose "Open in Terminal" and type "code ." to open it in Visual Studio Code.

- When you want to view the website:
	 + Open XAMPP, choose "Explorer" and put the source code file NASA into the XAMPP/htdocs/... folder.
	 + Get back to the XAMPP Control Panel, press Start for the Apache and MySQL modules. 
	 + Now, open your web browser (e.g. Google Chrome, Internet Explorer) and type "localhost/nasa/" into the URL bar. The website is now available.
	 + If you want to use the register and login function, go to "localhost/phpmyadmin/" and create a new database called "nasa". In this newly created database, create a table called "register" by using the code below:
	   " CREATE TABLE register (
	     id INT AUTO_INCREMENT PRIMARY KEY,
	     fullname VARCHAR(50) NOT NULL,
	     username VARCHAR(50) NOT NULL,
	     email VARCHAR(50) NOT NULL,
	     password VARCHAR(60) NOT NULL,
	     cfpassword VARCHAR(60) NOT NULL
	   ); "
	 + Now, the registration information will be displayed on the database table and you will be able to sign in. When you want to log out, access the home page and click the "Log out" button.
	 + In addition, the announcements will only appear once when you first access that page and allow notifications since we set the function like that.
	 + Other functions are all easily done via navigating through the website.
