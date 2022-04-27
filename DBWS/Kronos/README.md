# Kronos_Games

UPDATE HW4:
Our submission for the fourth assignment includes a folder with the following files: data.sql contains all the dummy data that we seeded into the databases. table.sql contains the latest changes we made to our CREATE TABLE statements. queries_group13.sql contains all the queries that we had to do as part of homework 4 and ran on the CLAMV server, which is part of the submission requirements. Lastly, Query Log Group 13.pdf is a pdf file that contains all the query logs outputted from the query with the corresponding images.

UPDATE HW5:
Our submission for assignment 5 consists of the CD document, the HTML files for the pages, the CSS file and the pictures we used for our site along with the logo. We have also added screenshots of our website functioning properly in CLAMV in case there are any problems. The screenshots can be found in the DBWS_A5 folder and are named "screenshot 1-5". We have uploaded these files both here on Github and on CLAMV. Our solution is also live and running on CLAMV and can be accessed using the following links:
Home-Page: https://clabsql.clamv.jacobs-university.de/~schhabra/index.html and
Imprint-Page: https://clabsql.clamv.jacobs-university.de/~schhabra/imprint.html
As for why our source code matches our CD, we have translated the CD into corresponding HTML tags and elements based on our logic in the CD document and reflected our design using styling techniques in CSS like color and various other settings. All in all, we have used HTML and CSS to bring the design to life.
We have put dummy text in our home page for some fo the elements for now. There are also placeholder buttons for functionality that hasn't been implemented yet but will be later on like "News" for example.
UPDATE HW6 (28 OCTOBER 2021)
Our submission for this weeks are the 2 following things:

1 https://clabsql.clamv.jacobs-university.de/~schhabra/index.html & https://clabsql.clamv.jacobs-university.de/~schhabra/imprint.html

The link to the maintenance page is added in the navigation bar.

2 Our files for this assignment are in the assignment_6 file in this repository

We implemented the references as drop down menus that display the existing entries in the respective entity tables. For binary relationships like is_in and uploads we had two drop-downs each.

We also have pop-ups that show that the form has been successfully executed by redirecting to another page displaying a success message.

For this assignment we implemented the following entities user,player,publisher,installations,game,review and genre. The user page itself does not have its input link. This is because it is an ISA heirarchy when a player or publisher is being inserted into the database, the corresponding password,email,user_id is simultaneously updated into the user table.

We have 4 relationship links implemented in this assignment which are DOES, UPLOADS, GETS and IS_IN. Only IS_IN and UPLOADS have their own input page. The queries to insert data into the tables DOES and GETS are included in the installation and review input pages. This is because installations and reviews are weak entities and their exisistence depends on player and game. When an installation and review is being created the DOES and GETS tables are updated, therefore creating a relationship link.

UPDATE HW7 (4 NOVEMBER 2021)
We created an HTML page called search.html that gives you the opportunity to choose which of the four entities you want to perform the search in and we have made it accessible from the nav bar. For this assignment, we created new queries that better fit our context and we implemented the respective search forms and the result page that will display the returned rows. For the player search form, we offer the opportunity to search for email, first name and last name and get a result containing the corresponding player data.

Sample Data: Email = Sid@gmail.com first_name = Sid last_name = Chhabra For the publisher search form, we offer the capability to search for the company’s name or tax ID and get a result containing publisher data.

Sample Data: Search = Compcam For the game search form, we offer the capability to search for the name of the game, platforms games are available on and descriptions of games to get the details of the game as a result. In the result, the media attribute is a random number because we haven’t inserted media into the website.

Sample Data: Search = The younger scrolls For the installations search form, we offer the capability to search for the graphics card and get the size of the games installed on a system running on that graphics card.

Sample Data: Search = Intel Our submission for this week can be accessed via this link -> http://clabsql.clamv.jacobs-university.de/~schhabra/search.html

UPDATE HW8 (11 NOVEMBER 2021)
We created an admin login form for admin access for task 2, and the credentials are as follows

Username: admin Password: 12345

There is an admin sign in button on the index page that leads to the admin login form. Using the credentials above, an administrator is able to access the maintenance page. The logout button on the maintenance page allows an admin to logout off the session. The input forms have all been updated to include sessions so that they cannot be accessed directly from the url before logging in.

Our link to the index page: https://clabsql.clamv.jacobs-university.de/~schhabra/index.html

Please click on admin sign in to view our submission for this week.

To grant read only access in the search pages, we created a separate configuration file named config2.php, in which we only allow group13read_only users access to select statements in our database.

The link to our search pages: https://clabsql.clamv.jacobs-university.de/~schhabra/search.html

We sent a public key and an encrypted and signed file to Subigya's email for the first task.

All files for this assignment has been uploaded into the repository.

UPDATE: HW9 (18th NOV 2021)
For this assignment we were tasked to extract statistics from our access log and error log, and we chose Python for our parsing scripts. We used the file apache_log_server.py to filter out logs relevant to our group with the (~schhabra) tag, the program then writes said logs into a file called logs_accessed. We parse that file into our parsing scripts to extract the frequency of requests of distinct browsers, IP addresses, Page(URL)s and Dates into CSV files. Our data is available over the span of 4 days (11 Nov to 14 Nov 2021).

Our extracted data from the access logs were presented into bar charts showcasing the access frequencies using jupyter notebook with MATLAB library in Python, the data is in the file Group 13 statistics.pdf in the repository.

Similar to the access logs we filtered out errors relevant to our group with the (~schhabra) tag using the file error_parser.py and generated a CSV file namely error_log.csv containing information about the time of the error,IP address from where the error generated, what the error was and the website which caused the error. The timeline diagram for errorlogs was generated by using Microsoft Excel version 16.0.14326.20238. The statistics are in the files time_and_IP_causing_error.pdf, time_and_website.pdf, time_and_which_error.pdf.

UPDATE: HW10 (25th NOV 2021)
For this assignment we implemented an autocomplete feature for the input fields in our search pages (player, publisher, game and installation) with a JQuery UI widget. The Javascript code is injected into the PHP files within <script> tags. We've also implemented a separate file (game_fetch_data.php) that is used as a source to feed the data into the list. The autocomplete function then returns the name of the item searched for that matches the input.

Link: http://clabsql.clamv.jacobs-university.de/~schhabra/search.html

An example of test cases:

Player: (search by email) image

Publisher (search by company name) image

Game (search by name) image

Installations (Search by graphics card) image

UPDATE: HW11 (02nd DEC 2021)
For this weeks assignment we were asked to write a program that uses an external API to get a geographical location of an IP addresses of users who visited our web page. This program can be found under the name "map.py". We have utilised HTML to visualise the geographical location on a map display that was taken from Leaflet and used a marker to pinpoint to the exact location.

The webpage can be accessed through: https://clabsql.clamv.jacobs-university.de/~schhabra/map.html
