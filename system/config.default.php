<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * <code>
 * N   N  OOO  !!   DDDD   OOO    N   N  OOO  TTTTT   EEEE DDDD  I TTTTT !!
 * NN  N O   O !!   D   D O   O   NN  N O   O   T     E    D   D I   T   !!
 * N N N O   O !!   D   D O   O   N N N O   O   T     EEEE D   D I   T   !!
 * N  NN O   O      D   D O   O   N  NN O   O   T     E    D   D I   T
 * N   N  OOO  !!   DDDD   OOO    N   N  OOO    T     EEEE DDDD  I   T   !!
 * </code>
 *
 * DO NOT EDIT THIS FILE, EDIT config.php INSTEAD !!!
 *
 * Halo default configuration, you can copy values from here to your
 * config.php
 *
 */



/**
 * Languages this website supports. The first one is the default
 */
$cfg['WEBSITE_LANGUAGES'] = 'en|et';

/**
 * Force HTTPS connections
 */
$cfg['FORCE_HTTPS'] = false;

/**
 * Whether the site is in production mode. When site is not in production mode, all emails are redirected to developer
 * email.
 */
$cfg['PRODUCTION_ENVIRONMENT'] = false;

/**
 * When site is not in production mode, all emails will be forwarded to this address
 */
$cfg['DEVELOPER_EMAIL'] = 'put your email here';

/**
 * Your app's FB credential. Needed for Facebook login support. You need to create an app on developers.facebook.com
 */
$cfg['FACEBOOK_APP_ID'] = '1000000000000001';
$cfg['FACEBOOK_SECRET'] = 'ffffffffffffffffffffffffffffffff';

/**
 * Your app's Google credentials. Needed for Google login support. You can get them from Google Developer Console when
 * you create a project there.
 */
$cfg['GOOGLE_CLIENT_ID'] = '1000000000000-ffffffffffffffffffffffffffffffff.apps.googleusercontent.com';
$cfg['GOOGLE_CLIENT_SECRET'] = 'sssssssssssssssss-ss_SSS';
$cfg['GOOGLE_REDIRECT_URI'] = 'login_google/callback'; // Where Google redirects your users, once they are authenticated

/**
 * Email parameters
 */
$cfg['SMTP_USE_SENDMAIL'] = false; // Use PHP Sendmail or PHPMailer. The next parameters, except SMTP_DEBUG, are only for PHPMailer
$cfg['SMTP_HOST'] = 'localhost';
$cfg['SMTP_AUTH'] = 'false';
$cfg['SMTP_AUTH_USERNAME'] = 'false';
$cfg['SMTP_AUTH_PASSWORD'] = 'false';
$cfg['SMTP_FROM'] = 'put your site email here';
$cfg['SMTP_PORT'] = '1025';
$cfg['SMTP_ENCRYPTION'] = 'none';
$cfg['SMTP_DEBUG'] = 0;