<?php

// Access rights
const GOOGLE_SCOPES = [
    'https://www.googleapis.com/auth/userinfo.email', // access to an email address
    'https://www.googleapis.com/auth/userinfo.profile' // access to profile information
];

// Authentication link
const GOOGLE_AUTH_URI = 'https://accounts.google.com/o/oauth2/auth';

// Link to get token
const GOOGLE_TOKEN_URI = 'https://accounts.google.com/o/oauth2/token';

// Link to get user information
const GOOGLE_USER_INFO_URI = 'https://www.googleapis.com/oauth2/v1/userinfo';

// Information that was generated during the registration of the application on google

// Client ID
const GOOGLE_CLIENT_ID = '123976021744-ppa61c1gtl32cvdf8ai8867orff29ltt.apps.googleusercontent.com';

// Client Secret
const GOOGLE_CLIENT_SECRET = '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';

// Link from section "Authorized redirect URIs"
const GOOGLE_REDIRECT_URI = 'http://serg.razumno.com/index.php';

?>
