<?php

// Права доступа
const GOOGLE_SCOPES = [
    'https://www.googleapis.com/auth/userinfo.email', // доступ до адреси електронної пошти
    'https://www.googleapis.com/auth/userinfo.profile' // доступ до інформації профілю
];

// Ссылка на аутентификацию
const GOOGLE_AUTH_URI = 'https://accounts.google.com/o/oauth2/auth';

// ссылка на получение токена
const GOOGLE_TOKEN_URI = 'https://accounts.google.com/o/oauth2/token';

// Ссылка на получение информации о пользователе
const GOOGLE_USER_INFO_URI = 'https://www.googleapis.com/oauth2/v1/userinfo';

// Информация, которая была сгенерирована во время регистрации приложения на google

// Client ID
const GOOGLE_CLIENT_ID = '123976021744-ppa61c1gtl32cvdf8ai8867orff29ltt.apps.googleusercontent.com';

// Client Secret
const GOOGLE_CLIENT_SECRET = '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';

// Ссылка из раздела "Authorized redirect URIs"
const GOOGLE_REDIRECT_URI = 'http://serg.razumno.com/index.php';

?>
