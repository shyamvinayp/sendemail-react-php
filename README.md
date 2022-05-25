## Send Random Jokes to Receipients Email (React Component with PHP mail api).

## Usage of this application.

Please clone this repo and in the project root directory, Please run:

### `git clone <repo url>`

please go to the /app folder and run npm install to install all the nessery npm modules.

### `npm install`

### `npm start`

Runs the app in the development mode.<br>

Open [http://localhost:3000](http://localhost:3000) to view it in the browser.

### `npm run build`

Build this project for production.

#### .env

Make sure change api url in .env file

    $ REACT_APP_API = http://localhost/react-php-send-mail/api/contact/index.php

Change this : http://localhost/react-php-send-mail/api/contact/index.php to whatever you want.

## PHP Settings

Please go to ./api/config.php

###Note: Its very important to check that SMTP is confgired on localhost/Server before sending the email.

change adminEmail to your email. You will get email to this.
$adminEmail =  "test@test.com";  for example

