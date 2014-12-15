067.cz articles to Pocket via Pocket API
================
(c) 2014 Daniel Duris, dusoft@staznosti.sk

* Quick and dirty PHP scraper using logged-in user credentials / cookies.
* Uses cookies from user's browser (manually copied) to submit articles to Pocket.
* Uses Pocket OAuth https://github.com/jshawl/pocket-oauth-php

Disclaimer
---------------
Quick and dirty, be sure what you are doing. Might cause your Pocket account to explode.

Usage
---------------
Go to: http://getpocket.com/developer/apps/ and create a web app to get your consumer key. "Add" permission is required, others optional.

### Pocket Authentication
1. Edit the variables in config.php.example and rename to config.php
2. Visit http://www.example.com/connect.php in your browser
3. Authenticate!
4. You'll be redirected to callback.php
5. Add your access token to config.php

### 067.cz Authentication
1. Go to https://067.cz and log in.
2. Find values of the cookies nette-browser and PHPSESSID and put them in config.php
3. Configure URL of the processing script process.php in config.php
4. Go to http://www.example.com/api.php and wait until it processed the archive
