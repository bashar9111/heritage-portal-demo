# Heritage Portal Demo

A recovered PHP / MySQL university project inspired by Nizwa heritage. An unofficial learning demonstration, not a tourism service. Historical text and event schedules are illustrative; the "tour" is a static presentation, not a panoramic viewer.

## Recovery status
Recovered: home, history, illustrative events, static tour, gallery, registration, login and story submission.
Added: a reconstructed database schema, matching password verification, input validation, CSRF tokens, session renewal at sign-in and image MIME/size checks with random server filenames.
Original photographs, uploaded images, accounts, database contents and credentials are excluded. Backgrounds are CSS gradients.

## Local setup
Requires PHP 8.1+ with PDO MySQL and fileinfo, plus MySQL/MariaDB.
1. Import schema.sql into a local development database.
2. Create a dedicated database user with SELECT/INSERT permissions on heritage_demo (do not use the MySQL root account).
3. Set DB_HOST, DB_NAME, DB_USER and DB_PASSWORD in your local environment. Defaults are 127.0.0.1, heritage_demo, heritage_demo and an empty password; supply your own dedicated-user credentials.
4. Start a local development server: php -S 127.0.0.1:8080
5. Open http://127.0.0.1:8080 and create a fictional account with a 12-72 character password.

Keep uploads writable by the local application. Only JPEG, PNG and WebP files below 5 MB are accepted. Uploaded images and account data must not be committed. Use fictional content and images you have permission to share.

## Validation and limitations
PHP syntax is checked during preparation. The SQL schema is reconstructed from code, not recovered from a live database. The MySQL-backed flow has not been verified end to end.
This is an experimental local portfolio project. It has no admin role, moderation, password recovery or distributed rate limiting. Before public hosting, add HTTPS, production authentication/abuse protection, image re-encoding and isolated upload storage. The included .htaccess helps Apache only; configure equivalent restrictions on any other server.

The original academic project has been restored and improved; do not represent it as an official heritage website.
