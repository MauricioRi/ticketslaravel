<?php return array (
  'app' => 
  array (
    'name' => 'Laravel',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:2gjGVxoTwY0uLxX+ZLejPCx7h4EoZb9golVuQCVjhT4=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\RouteServiceProvider',
      26 => 'Dhamkith\\Googlemap\\GooglemapServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Mapper' => 'Cornford\\Googlmapper\\Facades\\MapperFacade',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'useTLS' => true,
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\GitHub\\ticketslaravel\\ticketUI\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'laravel_cache',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'ticketsui',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'ticketsui',
        'username' => 'root',
        'password' => 'myroot84',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'ticketsui',
        'username' => 'root',
        'password' => 'myroot84',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'ticketsui',
        'username' => 'root',
        'password' => 'myroot84',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'laravel_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\GitHub\\ticketslaravel\\ticketUI\\storage\\app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\GitHub\\ticketslaravel\\ticketUI\\storage\\app/public',
        'url' => 'http://localhost/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
      ),
    ),
    'links' => 
    array (
      'C:\\GitHub\\ticketslaravel\\ticketUI\\public\\storage' => 'C:\\GitHub\\ticketslaravel\\ticketUI\\storage\\app/public',
    ),
  ),
  'googlemap' => 
  array (
    'map_apikey' => 'AIzaSyDArnwtcfsTpqJ0Y5P_Y8dl-4Ey-j2BWqQ',
    'path' => 'map',
    'middleware_for_view' => 'auth',
    'countries' => 
    array (
      0 => 
      (object) array(
         'name' => 'Select Your country',
         'dial_code' => NULL,
         'code' => 'SELECT',
         'postal_format' => 
        array (
        ),
      ),
      1 => 
      (object) array(
         'name' => 'Afghanistan',
         'dial_code' => '+93',
         'code' => 'AF',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      2 => 
      (object) array(
         'name' => 'Åland Islands',
         'dial_code' => '',
         'code' => 'AX',
         'postal_format' => 
        array (
          0 => '#####',
          1 => 'AX-#####',
        ),
      ),
      3 => 
      (object) array(
         'name' => 'Albania',
         'dial_code' => '+355',
         'code' => 'AL',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      4 => 
      (object) array(
         'name' => 'Algeria',
         'dial_code' => '+213',
         'code' => 'DZ',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      5 => 
      (object) array(
         'name' => 'AmericanSamoa',
         'dial_code' => '+1 684',
         'code' => 'AS',
         'postal_format' => 
        array (
          0 => '#####',
          1 => '#####-####',
        ),
      ),
      6 => 
      (object) array(
         'name' => 'Andorra',
         'dial_code' => '+376',
         'code' => 'AD',
         'postal_format' => 
        array (
          0 => 'AD###',
          1 => '#####',
        ),
      ),
      7 => 
      (object) array(
         'name' => 'Angola',
         'dial_code' => '+244',
         'code' => 'AO',
         'postal_format' => 
        array (
        ),
      ),
      8 => 
      (object) array(
         'name' => 'Anguilla',
         'dial_code' => '+1 264',
         'code' => 'AI',
         'postal_format' => 
        array (
          0 => 'AI-2640',
        ),
      ),
      9 => 
      (object) array(
         'name' => 'Antarctica',
         'dial_code' => NULL,
         'code' => 'AQ',
         'postal_format' => 
        array (
          0 => 'BIQQ 1ZZ',
        ),
      ),
      10 => 
      (object) array(
         'name' => 'Antigua and Barbuda',
         'dial_code' => '+1268',
         'code' => 'AG',
         'postal_format' => 
        array (
        ),
      ),
      11 => 
      (object) array(
         'name' => 'Argentina',
         'dial_code' => '+54',
         'code' => 'AR',
         'postal_format' => 
        array (
          0 => '####',
          1 => '@####@@@',
        ),
      ),
      12 => 
      (object) array(
         'name' => 'Armenia',
         'dial_code' => '+374',
         'code' => 'AM',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      13 => 
      (object) array(
         'name' => 'Aruba',
         'dial_code' => '+297',
         'code' => 'AW',
         'postal_format' => 
        array (
        ),
      ),
      14 => 
      (object) array(
         'name' => 'Australia',
         'dial_code' => '+61',
         'code' => 'AU',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      15 => 
      (object) array(
         'name' => 'Austria',
         'dial_code' => '+43',
         'code' => 'AT',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      16 => 
      (object) array(
         'name' => 'Azerbaijan',
         'dial_code' => '+994',
         'code' => 'AZ',
         'postal_format' => 
        array (
          0 => 'AZ ####',
        ),
      ),
      17 => 
      (object) array(
         'name' => 'Bahamas',
         'dial_code' => '+1 242',
         'code' => 'BS',
         'postal_format' => 
        array (
        ),
      ),
      18 => 
      (object) array(
         'name' => 'Bahrain',
         'dial_code' => '+973',
         'code' => 'BH',
         'postal_format' => 
        array (
          0 => '###',
          1 => '####',
        ),
      ),
      19 => 
      (object) array(
         'name' => 'Bangladesh',
         'dial_code' => '+880',
         'code' => 'BD',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      20 => 
      (object) array(
         'name' => 'Barbados',
         'dial_code' => '+1 246',
         'code' => 'BB',
         'postal_format' => 
        array (
          0 => 'BB#####',
        ),
      ),
      21 => 
      (object) array(
         'name' => 'Belarus',
         'dial_code' => '+375',
         'code' => 'BY',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      22 => 
      (object) array(
         'name' => 'Belgium',
         'dial_code' => '+32',
         'code' => 'BE',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      23 => 
      (object) array(
         'name' => 'Belize',
         'dial_code' => '+501',
         'code' => 'BZ',
         'postal_format' => 
        array (
        ),
      ),
      24 => 
      (object) array(
         'name' => 'Benin',
         'dial_code' => '+229',
         'code' => 'BJ',
         'postal_format' => 
        array (
        ),
      ),
      25 => 
      (object) array(
         'name' => 'Bermuda',
         'dial_code' => '+1 441',
         'code' => 'BM',
         'postal_format' => 
        array (
          0 => '@@ ##',
          1 => '@@ @@',
        ),
      ),
      26 => 
      (object) array(
         'name' => 'Bhutan',
         'dial_code' => '+975',
         'code' => 'BT',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      27 => 
      (object) array(
         'name' => 'Bolivia, Plurinational State of',
         'dial_code' => '+591',
         'code' => 'BO',
         'postal_format' => 
        array (
        ),
      ),
      28 => 
      (object) array(
         'name' => 'Bosnia and Herzegovina',
         'dial_code' => '+387',
         'code' => 'BA',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      29 => 
      (object) array(
         'name' => 'Botswana',
         'dial_code' => '+267',
         'code' => 'BW',
         'postal_format' => 
        array (
        ),
      ),
      30 => 
      (object) array(
         'name' => 'Brazil',
         'dial_code' => '+55',
         'code' => 'BR',
         'postal_format' => 
        array (
          0 => '#####-###',
          1 => '#####',
        ),
      ),
      31 => 
      (object) array(
         'name' => 'British Indian Ocean Territory',
         'dial_code' => '+246',
         'code' => 'IO',
         'postal_format' => 
        array (
          0 => 'BBND 1ZZ',
        ),
      ),
      32 => 
      (object) array(
         'name' => 'Brunei Darussalam',
         'dial_code' => '+673',
         'code' => 'BN',
         'postal_format' => 
        array (
          0 => '@@####',
        ),
      ),
      33 => 
      (object) array(
         'name' => 'Bulgaria',
         'dial_code' => '+359',
         'code' => 'BG',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      34 => 
      (object) array(
         'name' => 'Burkina Faso',
         'dial_code' => '+226',
         'code' => 'BF',
         'postal_format' => 
        array (
        ),
      ),
      35 => 
      (object) array(
         'name' => 'Burundi',
         'dial_code' => '+257',
         'code' => 'BI',
         'postal_format' => 
        array (
        ),
      ),
      36 => 
      (object) array(
         'name' => 'Cambodia',
         'dial_code' => '+855',
         'code' => 'KH',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      37 => 
      (object) array(
         'name' => 'Cameroon',
         'dial_code' => '+237',
         'code' => 'CM',
         'postal_format' => 
        array (
        ),
      ),
      38 => 
      (object) array(
         'name' => 'Canada',
         'dial_code' => '+1',
         'code' => 'CA',
         'postal_format' => 
        array (
          0 => '@#@ #@#',
        ),
      ),
      39 => 
      (object) array(
         'name' => 'Cape Verde',
         'dial_code' => '+238',
         'code' => 'CV',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      40 => 
      (object) array(
         'name' => 'Cayman Islands',
         'dial_code' => '+ 345',
         'code' => 'KY',
         'postal_format' => 
        array (
          0 => 'KY#-####',
        ),
      ),
      41 => 
      (object) array(
         'name' => 'Central African Republic',
         'dial_code' => '+236',
         'code' => 'CF',
         'postal_format' => 
        array (
        ),
      ),
      42 => 
      (object) array(
         'name' => 'Chad',
         'dial_code' => '+235',
         'code' => 'TD',
         'postal_format' => 
        array (
        ),
      ),
      43 => 
      (object) array(
         'name' => 'Chile',
         'dial_code' => '+56',
         'code' => 'CL',
         'postal_format' => 
        array (
          0 => '#######',
          1 => '###-####',
        ),
      ),
      44 => 
      (object) array(
         'name' => 'China',
         'dial_code' => '+86',
         'code' => 'CN',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      45 => 
      (object) array(
         'name' => 'Christmas Island',
         'dial_code' => '+61',
         'code' => 'CX',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      46 => 
      (object) array(
         'name' => 'Cocos (Keeling] Islands',
         'dial_code' => '+61',
         'code' => 'CC',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      47 => 
      (object) array(
         'name' => 'Colombia',
         'dial_code' => '+57',
         'code' => 'CO',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      48 => 
      (object) array(
         'name' => 'Comoros',
         'dial_code' => '+269',
         'code' => 'KM',
         'postal_format' => 
        array (
        ),
      ),
      49 => 
      (object) array(
         'name' => 'Congo',
         'dial_code' => '+242',
         'code' => 'CG',
         'postal_format' => 
        array (
        ),
      ),
      50 => 
      (object) array(
         'name' => 'Congo, The Democratic Republic of the',
         'dial_code' => '+243',
         'code' => 'CD',
         'postal_format' => 
        array (
        ),
      ),
      51 => 
      (object) array(
         'name' => 'Cook Islands',
         'dial_code' => '+682',
         'code' => 'CK',
         'postal_format' => 
        array (
        ),
      ),
      52 => 
      (object) array(
         'name' => 'Costa Rica',
         'dial_code' => '+506',
         'code' => 'CR',
         'postal_format' => 
        array (
          0 => '#####',
          1 => '#####-####',
        ),
      ),
      53 => 
      (object) array(
         'name' => 'Cote d\'Ivoire',
         'dial_code' => '+225',
         'code' => 'CI',
         'postal_format' => 
        array (
        ),
      ),
      54 => 
      (object) array(
         'name' => 'Croatia',
         'dial_code' => '+385',
         'code' => 'HR',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      55 => 
      (object) array(
         'name' => 'Cuba',
         'dial_code' => '+53',
         'code' => 'CU',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      56 => 
      (object) array(
         'name' => 'Cyprus',
         'dial_code' => '+537',
         'code' => 'CY',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      57 => 
      (object) array(
         'name' => 'Czech Republic',
         'dial_code' => '+420',
         'code' => 'CZ',
         'postal_format' => 
        array (
          0 => '### ##',
        ),
      ),
      58 => 
      (object) array(
         'name' => 'Denmark',
         'dial_code' => '+45',
         'code' => 'DK',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      59 => 
      (object) array(
         'name' => 'Djibouti',
         'dial_code' => '+253',
         'code' => 'DJ',
         'postal_format' => 
        array (
        ),
      ),
      60 => 
      (object) array(
         'name' => 'Dominica',
         'dial_code' => '+1 767',
         'code' => 'DM',
         'postal_format' => 
        array (
        ),
      ),
      61 => 
      (object) array(
         'name' => 'Dominican Republic',
         'dial_code' => '+1 849',
         'code' => 'DO',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      62 => 
      (object) array(
         'name' => 'Ecuador',
         'dial_code' => '+593',
         'code' => 'EC',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      63 => 
      (object) array(
         'name' => 'Egypt',
         'dial_code' => '+20',
         'code' => 'EG',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      64 => 
      (object) array(
         'name' => 'El Salvador',
         'dial_code' => '+503',
         'code' => 'SV',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      65 => 
      (object) array(
         'name' => 'Equatorial Guinea',
         'dial_code' => '+240',
         'code' => 'GQ',
         'postal_format' => 
        array (
        ),
      ),
      66 => 
      (object) array(
         'name' => 'Eritrea',
         'dial_code' => '+291',
         'code' => 'ER',
         'postal_format' => 
        array (
        ),
      ),
      67 => 
      (object) array(
         'name' => 'Estonia',
         'dial_code' => '+372',
         'code' => 'EE',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      68 => 
      (object) array(
         'name' => 'Ethiopia',
         'dial_code' => '+251',
         'code' => 'ET',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      69 => 
      (object) array(
         'name' => 'Falkland Islands (Malvinas]',
         'dial_code' => '+500',
         'code' => 'FK',
         'postal_format' => 
        array (
          0 => 'FIQQ 1ZZ',
        ),
      ),
      70 => 
      (object) array(
         'name' => 'Faroe Islands',
         'dial_code' => '+298',
         'code' => 'FO',
         'postal_format' => 
        array (
          0 => '###',
        ),
      ),
      71 => 
      (object) array(
         'name' => 'Fiji',
         'dial_code' => '+679',
         'code' => 'FJ',
         'postal_format' => 
        array (
        ),
      ),
      72 => 
      (object) array(
         'name' => 'Finland',
         'dial_code' => '+358',
         'code' => 'FI',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      73 => 
      (object) array(
         'name' => 'France',
         'dial_code' => '+33',
         'code' => 'FR',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      74 => 
      (object) array(
         'name' => 'French Guiana',
         'dial_code' => '+594',
         'code' => 'GF',
         'postal_format' => 
        array (
          0 => '973##',
        ),
      ),
      75 => 
      (object) array(
         'name' => 'French Polynesia',
         'dial_code' => '+689',
         'code' => 'PF',
         'postal_format' => 
        array (
          0 => '987##',
        ),
      ),
      76 => 
      (object) array(
         'name' => 'Gabon',
         'dial_code' => '+241',
         'code' => 'GA',
         'postal_format' => 
        array (
        ),
      ),
      77 => 
      (object) array(
         'name' => 'Gambia',
         'dial_code' => '+220',
         'code' => 'GM',
         'postal_format' => 
        array (
        ),
      ),
      78 => 
      (object) array(
         'name' => 'Georgia',
         'dial_code' => '+995',
         'code' => 'GE',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      79 => 
      (object) array(
         'name' => 'Germany',
         'dial_code' => '+49',
         'code' => 'DE',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      80 => 
      (object) array(
         'name' => 'Ghana',
         'dial_code' => '+233',
         'code' => 'GH',
         'postal_format' => 
        array (
        ),
      ),
      81 => 
      (object) array(
         'name' => 'Gibraltar',
         'dial_code' => '+350',
         'code' => 'GI',
         'postal_format' => 
        array (
          0 => 'GX11 1AA',
        ),
      ),
      82 => 
      (object) array(
         'name' => 'Greece',
         'dial_code' => '+30',
         'code' => 'GR',
         'postal_format' => 
        array (
          0 => '### ##',
        ),
      ),
      83 => 
      (object) array(
         'name' => 'Greenland',
         'dial_code' => '+299',
         'code' => 'GL',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      84 => 
      (object) array(
         'name' => 'Grenada',
         'dial_code' => '+1 473',
         'code' => 'GD',
         'postal_format' => 
        array (
        ),
      ),
      85 => 
      (object) array(
         'name' => 'Guadeloupe',
         'dial_code' => '+590',
         'code' => 'GP',
         'postal_format' => 
        array (
          0 => '971##',
        ),
      ),
      86 => 
      (object) array(
         'name' => 'Guam',
         'dial_code' => '+1 671',
         'code' => 'GU',
         'postal_format' => 
        array (
          0 => '#####',
          1 => '#####-####',
        ),
      ),
      87 => 
      (object) array(
         'name' => 'Guatemala',
         'dial_code' => '+502',
         'code' => 'GT',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      88 => 
      (object) array(
         'name' => 'Guernsey',
         'dial_code' => '+44',
         'code' => 'GG',
         'postal_format' => 
        array (
          0 => 'GY# #@@',
          1 => 'GY## #@@',
        ),
      ),
      89 => 
      (object) array(
         'name' => 'Guinea',
         'dial_code' => '+224',
         'code' => 'GN',
         'postal_format' => 
        array (
          0 => '###',
        ),
      ),
      90 => 
      (object) array(
         'name' => 'Guinea-Bissau',
         'dial_code' => '+245',
         'code' => 'GW',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      91 => 
      (object) array(
         'name' => 'Guyana',
         'dial_code' => '+595',
         'code' => 'GY',
         'postal_format' => 
        array (
        ),
      ),
      92 => 
      (object) array(
         'name' => 'Haiti',
         'dial_code' => '+509',
         'code' => 'HT',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      93 => 
      (object) array(
         'name' => 'Holy See (Vatican City State]',
         'dial_code' => '+379',
         'code' => 'VA',
         'postal_format' => 
        array (
          0 => '00120',
        ),
      ),
      94 => 
      (object) array(
         'name' => 'Honduras',
         'dial_code' => '+504',
         'code' => 'HN',
         'postal_format' => 
        array (
          0 => '@@####',
          1 => '#####',
        ),
      ),
      95 => 
      (object) array(
         'name' => 'Hong Kong',
         'dial_code' => '+852',
         'code' => 'HK',
         'postal_format' => 
        array (
        ),
      ),
      96 => 
      (object) array(
         'name' => 'Hungary',
         'dial_code' => '+36',
         'code' => 'HU',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      97 => 
      (object) array(
         'name' => 'Iceland',
         'dial_code' => '+354',
         'code' => 'IS',
         'postal_format' => 
        array (
          0 => '###',
        ),
      ),
      98 => 
      (object) array(
         'name' => 'India',
         'dial_code' => '+91',
         'code' => 'IN',
         'postal_format' => 
        array (
          0 => '######',
          1 => '### ###',
        ),
      ),
      99 => 
      (object) array(
         'name' => 'Indonesia',
         'dial_code' => '+62',
         'code' => 'ID',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      100 => 
      (object) array(
         'name' => 'Iran, Islamic Republic of',
         'dial_code' => '+98',
         'code' => 'IR',
         'postal_format' => 
        array (
          0 => '##########',
          1 => '#####-#####',
        ),
      ),
      101 => 
      (object) array(
         'name' => 'Iraq',
         'dial_code' => '+964',
         'code' => 'IQ',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      102 => 
      (object) array(
         'name' => 'Ireland',
         'dial_code' => '+353',
         'code' => 'IE',
         'postal_format' => 
        array (
          0 => '@** ****',
        ),
      ),
      103 => 
      (object) array(
         'name' => 'Isle of Man',
         'dial_code' => '+44',
         'code' => 'IM',
         'postal_format' => 
        array (
          0 => 'IM# #@@',
          1 => 'IM## #@@',
        ),
      ),
      104 => 
      (object) array(
         'name' => 'Israel',
         'dial_code' => '+972',
         'code' => 'IL',
         'postal_format' => 
        array (
          0 => '#######',
        ),
      ),
      105 => 
      (object) array(
         'name' => 'Italy',
         'dial_code' => '+39',
         'code' => 'IT',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      106 => 
      (object) array(
         'name' => 'Jamaica',
         'dial_code' => '+1 876',
         'code' => 'JM',
         'postal_format' => 
        array (
          0 => '##',
        ),
      ),
      107 => 
      (object) array(
         'name' => 'Japan',
         'dial_code' => '+81',
         'code' => 'JP',
         'postal_format' => 
        array (
          0 => '###-####',
          1 => '###',
        ),
      ),
      108 => 
      (object) array(
         'name' => 'Jersey',
         'dial_code' => '+44',
         'code' => 'JE',
         'postal_format' => 
        array (
          0 => 'JE# #@@',
          1 => 'JE## #@@',
        ),
      ),
      109 => 
      (object) array(
         'name' => 'Jordan',
         'dial_code' => '+962',
         'code' => 'JO',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      110 => 
      (object) array(
         'name' => 'Kazakhstan',
         'dial_code' => '+7 7',
         'code' => 'KZ',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      111 => 
      (object) array(
         'name' => 'Kenya',
         'dial_code' => '+254',
         'code' => 'KE',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      112 => 
      (object) array(
         'name' => 'Kiribati',
         'dial_code' => '+686',
         'code' => 'KI',
         'postal_format' => 
        array (
        ),
      ),
      113 => 
      (object) array(
         'name' => 'Korea, Democratic People\'s Republic of',
         'dial_code' => '+850',
         'code' => 'KP',
         'postal_format' => 
        array (
        ),
      ),
      114 => 
      (object) array(
         'name' => 'Korea, Republic of',
         'dial_code' => '+82',
         'code' => 'KR',
         'postal_format' => 
        array (
          0 => '###-###',
          1 => '#####',
        ),
      ),
      115 => 
      (object) array(
         'name' => 'Kuwait',
         'dial_code' => '+965',
         'code' => 'KW',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      116 => 
      (object) array(
         'name' => 'Kyrgyzstan',
         'dial_code' => '+996',
         'code' => 'KG',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      117 => 
      (object) array(
         'name' => 'Lao People\'s Democratic Republic',
         'dial_code' => '+856',
         'code' => 'LA',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      118 => 
      (object) array(
         'name' => 'Latvia',
         'dial_code' => '+371',
         'code' => 'LV',
         'postal_format' => 
        array (
          0 => 'LV-####',
        ),
      ),
      119 => 
      (object) array(
         'name' => 'Lebanon',
         'dial_code' => '+961',
         'code' => 'LB',
         'postal_format' => 
        array (
          0 => '#####',
          1 => '#### ####',
        ),
      ),
      120 => 
      (object) array(
         'name' => 'Lesotho',
         'dial_code' => '+266',
         'code' => 'LS',
         'postal_format' => 
        array (
          0 => '###',
        ),
      ),
      121 => 
      (object) array(
         'name' => 'Liberia',
         'dial_code' => '+231',
         'code' => 'LR',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      122 => 
      (object) array(
         'name' => 'Libyan Arab Jamahiriya',
         'dial_code' => '+218',
         'code' => 'LY',
         'postal_format' => 
        array (
        ),
      ),
      123 => 
      (object) array(
         'name' => 'Liechtenstein',
         'dial_code' => '+423',
         'code' => 'LI',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      124 => 
      (object) array(
         'name' => 'Lithuania',
         'dial_code' => '+370',
         'code' => 'LT',
         'postal_format' => 
        array (
          0 => 'LT-#####',
          1 => '#####',
        ),
      ),
      125 => 
      (object) array(
         'name' => 'Luxembourg',
         'dial_code' => '+352',
         'code' => 'LU',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      126 => 
      (object) array(
         'name' => 'Macao',
         'dial_code' => '+853',
         'code' => 'MO',
         'postal_format' => 
        array (
        ),
      ),
      127 => 
      (object) array(
         'name' => 'Macedonia, The Former Yugoslav Republic of',
         'dial_code' => '+389',
         'code' => 'MK',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      128 => 
      (object) array(
         'name' => 'Madagascar',
         'dial_code' => '+261',
         'code' => 'MG',
         'postal_format' => 
        array (
          0 => '###',
        ),
      ),
      129 => 
      (object) array(
         'name' => 'Malawi',
         'dial_code' => '+265',
         'code' => 'MW',
         'postal_format' => 
        array (
        ),
      ),
      130 => 
      (object) array(
         'name' => 'Malaysia',
         'dial_code' => '+60',
         'code' => 'MY',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      131 => 
      (object) array(
         'name' => 'Maldives',
         'dial_code' => '+960',
         'code' => 'MV',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      132 => 
      (object) array(
         'name' => 'Mali',
         'dial_code' => '+223',
         'code' => 'ML',
         'postal_format' => 
        array (
        ),
      ),
      133 => 
      (object) array(
         'name' => 'Malta',
         'dial_code' => '+356',
         'code' => 'MT',
         'postal_format' => 
        array (
          0 => '@@@ ####',
        ),
      ),
      134 => 
      (object) array(
         'name' => 'Marshall Islands',
         'dial_code' => '+692',
         'code' => 'MH',
         'postal_format' => 
        array (
          0 => '#####',
          1 => '#####-####',
        ),
      ),
      135 => 
      (object) array(
         'name' => 'Martinique',
         'dial_code' => '+596',
         'code' => 'MQ',
         'postal_format' => 
        array (
          0 => '972##',
        ),
      ),
      136 => 
      (object) array(
         'name' => 'Mauritania',
         'dial_code' => '+222',
         'code' => 'MR',
         'postal_format' => 
        array (
        ),
      ),
      137 => 
      (object) array(
         'name' => 'Mauritius',
         'dial_code' => '+230',
         'code' => 'MU',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      138 => 
      (object) array(
         'name' => 'Mayotte',
         'dial_code' => '+262',
         'code' => 'YT',
         'postal_format' => 
        array (
          0 => '976##',
        ),
      ),
      139 => 
      (object) array(
         'name' => 'Mexico',
         'dial_code' => '+52',
         'code' => 'MX',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      140 => 
      (object) array(
         'name' => 'Micronesia, Federated States of',
         'dial_code' => '+691',
         'code' => 'FM',
         'postal_format' => 
        array (
          0 => '#####',
          1 => '#####-####',
        ),
      ),
      141 => 
      (object) array(
         'name' => 'Moldova, Republic of',
         'dial_code' => '+373',
         'code' => 'MD',
         'postal_format' => 
        array (
          0 => 'MD####',
          1 => 'MD-####',
        ),
      ),
      142 => 
      (object) array(
         'name' => 'Monaco',
         'dial_code' => '+377',
         'code' => 'MC',
         'postal_format' => 
        array (
          0 => '980##',
        ),
      ),
      143 => 
      (object) array(
         'name' => 'Mongolia',
         'dial_code' => '+976',
         'code' => 'MN',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      144 => 
      (object) array(
         'name' => 'Montenegro',
         'dial_code' => '+382',
         'code' => 'ME',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      145 => 
      (object) array(
         'name' => 'Montserrat',
         'dial_code' => '+1664',
         'code' => 'MS',
         'postal_format' => 
        array (
        ),
      ),
      146 => 
      (object) array(
         'name' => 'Morocco',
         'dial_code' => '+212',
         'code' => 'MA',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      147 => 
      (object) array(
         'name' => 'Mozambique',
         'dial_code' => '+258',
         'code' => 'MZ',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      148 => 
      (object) array(
         'name' => 'Myanmar',
         'dial_code' => '+95',
         'code' => 'MM',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      149 => 
      (object) array(
         'name' => 'Namibia',
         'dial_code' => '+264',
         'code' => 'NA',
         'postal_format' => 
        array (
        ),
      ),
      150 => 
      (object) array(
         'name' => 'Nauru',
         'dial_code' => '+674',
         'code' => 'NR',
         'postal_format' => 
        array (
        ),
      ),
      151 => 
      (object) array(
         'name' => 'Nepal',
         'dial_code' => '+977',
         'code' => 'NP',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      152 => 
      (object) array(
         'name' => 'Netherlands',
         'dial_code' => '+31',
         'code' => 'NL',
         'postal_format' => 
        array (
          0 => '####@@',
          1 => '#### @@',
        ),
      ),
      153 => 
      (object) array(
         'name' => 'Netherlands Antilles',
         'dial_code' => '+599',
         'code' => 'AN',
         'postal_format' => 
        array (
        ),
      ),
      154 => 
      (object) array(
         'name' => 'New Caledonia',
         'dial_code' => '+687',
         'code' => 'NC',
         'postal_format' => 
        array (
          0 => '988##',
        ),
      ),
      155 => 
      (object) array(
         'name' => 'New Zealand',
         'dial_code' => '+64',
         'code' => 'NZ',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      156 => 
      (object) array(
         'name' => 'Nicaragua',
         'dial_code' => '+505',
         'code' => 'NI',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      157 => 
      (object) array(
         'name' => 'Niger',
         'dial_code' => '+227',
         'code' => 'NE',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      158 => 
      (object) array(
         'name' => 'Nigeria',
         'dial_code' => '+234',
         'code' => 'NG',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      159 => 
      (object) array(
         'name' => 'Niue',
         'dial_code' => '+683',
         'code' => 'NU',
         'postal_format' => 
        array (
        ),
      ),
      160 => 
      (object) array(
         'name' => 'Norfolk Island',
         'dial_code' => '+672',
         'code' => 'NF',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      161 => 
      (object) array(
         'name' => 'Northern Mariana Islands',
         'dial_code' => '+1 670',
         'code' => 'MP',
         'postal_format' => 
        array (
          0 => '#####',
          1 => '#####-####',
        ),
      ),
      162 => 
      (object) array(
         'name' => 'Norway',
         'dial_code' => '+47',
         'code' => 'NO',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      163 => 
      (object) array(
         'name' => 'Oman',
         'dial_code' => '+968',
         'code' => 'OM',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      164 => 
      (object) array(
         'name' => 'Pakistan',
         'dial_code' => '+92',
         'code' => 'PK',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      165 => 
      (object) array(
         'name' => 'Palau',
         'dial_code' => '+680',
         'code' => 'PW',
         'postal_format' => 
        array (
          0 => '#####',
          1 => '#####-####',
        ),
      ),
      166 => 
      (object) array(
         'name' => 'Palestinian Territory, Occupied',
         'dial_code' => '+970',
         'code' => 'PS',
         'postal_format' => 
        array (
          0 => '###',
        ),
      ),
      167 => 
      (object) array(
         'name' => 'Panama',
         'dial_code' => '+507',
         'code' => 'PA',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      168 => 
      (object) array(
         'name' => 'Papua New Guinea',
         'dial_code' => '+675',
         'code' => 'PG',
         'postal_format' => 
        array (
          0 => '###',
        ),
      ),
      169 => 
      (object) array(
         'name' => 'Paraguay',
         'dial_code' => '+595',
         'code' => 'PY',
         'postal_format' => 
        array (
          0 => '###',
        ),
      ),
      170 => 
      (object) array(
         'name' => 'Peru',
         'dial_code' => '+51',
         'code' => 'PE',
         'postal_format' => 
        array (
          0 => '#####',
          1 => 'PE #####',
        ),
      ),
      171 => 
      (object) array(
         'name' => 'Philippines',
         'dial_code' => '+63',
         'code' => 'PH',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      172 => 
      (object) array(
         'name' => 'Pitcairn',
         'dial_code' => '+872',
         'code' => 'PN',
         'postal_format' => 
        array (
          0 => 'PCRN 1ZZ',
        ),
      ),
      173 => 
      (object) array(
         'name' => 'Poland',
         'dial_code' => '+48',
         'code' => 'PL',
         'postal_format' => 
        array (
          0 => '##-###',
        ),
      ),
      174 => 
      (object) array(
         'name' => 'Portugal',
         'dial_code' => '+351',
         'code' => 'PT',
         'postal_format' => 
        array (
          0 => '####-###',
        ),
      ),
      175 => 
      (object) array(
         'name' => 'Puerto Rico',
         'dial_code' => '+1 939',
         'code' => 'PR',
         'postal_format' => 
        array (
          0 => '#####',
          1 => '#####-####',
        ),
      ),
      176 => 
      (object) array(
         'name' => 'Qatar',
         'dial_code' => '+974',
         'code' => 'QA',
         'postal_format' => 
        array (
        ),
      ),
      177 => 
      (object) array(
         'name' => 'Romania',
         'dial_code' => '+40',
         'code' => 'RO',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      178 => 
      (object) array(
         'name' => 'Réunion',
         'dial_code' => '+262',
         'code' => 'RE',
         'postal_format' => 
        array (
          0 => '974##',
        ),
      ),
      179 => 
      (object) array(
         'name' => 'Russia',
         'dial_code' => '+7',
         'code' => 'RU',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      180 => 
      (object) array(
         'name' => 'Rwanda',
         'dial_code' => '+250',
         'code' => 'RW',
         'postal_format' => 
        array (
        ),
      ),
      181 => 
      (object) array(
         'name' => 'Saint Barthélemy',
         'dial_code' => '+590',
         'code' => 'BL',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      182 => 
      (object) array(
         'name' => 'Saint Helena, Ascension and Tristan Da Cunha',
         'dial_code' => '+290',
         'code' => 'SH',
         'postal_format' => 
        array (
          0 => '@@@@ 1ZZ',
        ),
      ),
      183 => 
      (object) array(
         'name' => 'Saint Kitts and Nevis',
         'dial_code' => '+1 869',
         'code' => 'KN',
         'postal_format' => 
        array (
        ),
      ),
      184 => 
      (object) array(
         'name' => 'Saint Lucia',
         'dial_code' => '+1 758',
         'code' => 'LC',
         'postal_format' => 
        array (
          0 => 'LC## ###',
        ),
      ),
      185 => 
      (object) array(
         'name' => 'Saint Martin',
         'dial_code' => '+590',
         'code' => 'MF',
         'postal_format' => 
        array (
          0 => '97150',
        ),
      ),
      186 => 
      (object) array(
         'name' => 'Saint Pierre and Miquelon',
         'dial_code' => '+508',
         'code' => 'PM',
         'postal_format' => 
        array (
          0 => '97500',
        ),
      ),
      187 => 
      (object) array(
         'name' => 'Saint Vincent and the Grenadines',
         'dial_code' => '+1 784',
         'code' => 'VC',
         'postal_format' => 
        array (
          0 => 'VC####',
        ),
      ),
      188 => 
      (object) array(
         'name' => 'Samoa',
         'dial_code' => '+685',
         'code' => 'WS',
         'postal_format' => 
        array (
          0 => 'WS####',
        ),
      ),
      189 => 
      (object) array(
         'name' => 'San Marino',
         'dial_code' => '+378',
         'code' => 'SM',
         'postal_format' => 
        array (
          0 => '4789#',
        ),
      ),
      190 => 
      (object) array(
         'name' => 'Sao Tome and Principe',
         'dial_code' => '+239',
         'code' => 'ST',
         'postal_format' => 
        array (
        ),
      ),
      191 => 
      (object) array(
         'name' => 'Saudi Arabia',
         'dial_code' => '+966',
         'code' => 'SA',
         'postal_format' => 
        array (
          0 => '#####',
          1 => '#####-####',
        ),
      ),
      192 => 
      (object) array(
         'name' => 'Senegal',
         'dial_code' => '+221',
         'code' => 'SN',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      193 => 
      (object) array(
         'name' => 'Serbia',
         'dial_code' => '+381',
         'code' => 'RS',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      194 => 
      (object) array(
         'name' => 'Seychelles',
         'dial_code' => '+248',
         'code' => 'SC',
         'postal_format' => 
        array (
        ),
      ),
      195 => 
      (object) array(
         'name' => 'Sierra Leone',
         'dial_code' => '+232',
         'code' => 'SL',
         'postal_format' => 
        array (
        ),
      ),
      196 => 
      (object) array(
         'name' => 'Singapore',
         'dial_code' => '+65',
         'code' => 'SG',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      197 => 
      (object) array(
         'name' => 'Slovakia',
         'dial_code' => '+421',
         'code' => 'SK',
         'postal_format' => 
        array (
          0 => '### ##',
        ),
      ),
      198 => 
      (object) array(
         'name' => 'Slovenia',
         'dial_code' => '+386',
         'code' => 'SI',
         'postal_format' => 
        array (
          0 => '####',
          1 => 'SI-####',
        ),
      ),
      199 => 
      (object) array(
         'name' => 'Solomon Islands',
         'dial_code' => '+677',
         'code' => 'SB',
         'postal_format' => 
        array (
        ),
      ),
      200 => 
      (object) array(
         'name' => 'Somalia',
         'dial_code' => '+252',
         'code' => 'SO',
         'postal_format' => 
        array (
          0 => '@@ #####',
        ),
      ),
      201 => 
      (object) array(
         'name' => 'South Africa',
         'dial_code' => '+27',
         'code' => 'ZA',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      202 => 
      (object) array(
         'name' => 'South Georgia and the South Sandwich Islands',
         'dial_code' => '+500',
         'code' => 'GS',
         'postal_format' => 
        array (
          0 => 'SIQQ 1ZZ',
        ),
      ),
      203 => 
      (object) array(
         'name' => 'Spain',
         'dial_code' => '+34',
         'code' => 'ES',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      204 => 
      (object) array(
         'name' => 'Sri Lanka',
         'dial_code' => '+94',
         'code' => 'LK',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      205 => 
      (object) array(
         'name' => 'Sudan',
         'dial_code' => '+249',
         'code' => 'SD',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      206 => 
      (object) array(
         'name' => 'Suriname',
         'dial_code' => '+597',
         'code' => 'SR',
         'postal_format' => 
        array (
        ),
      ),
      207 => 
      (object) array(
         'name' => 'Svalbard and Jan Mayen',
         'dial_code' => '+47',
         'code' => 'SJ',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      208 => 
      (object) array(
         'name' => 'Swaziland',
         'dial_code' => '+268',
         'code' => 'SZ',
         'postal_format' => 
        array (
          0 => '@###',
        ),
      ),
      209 => 
      (object) array(
         'name' => 'Sweden',
         'dial_code' => '+46',
         'code' => 'SE',
         'postal_format' => 
        array (
          0 => '### ##',
        ),
      ),
      210 => 
      (object) array(
         'name' => 'Switzerland',
         'dial_code' => '+41',
         'code' => 'CH',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      211 => 
      (object) array(
         'name' => 'Syrian Arab Republic',
         'dial_code' => '+963',
         'code' => 'SY',
         'postal_format' => 
        array (
        ),
      ),
      212 => 
      (object) array(
         'name' => 'Taiwan, Province of China',
         'dial_code' => '+886',
         'code' => 'TW',
         'postal_format' => 
        array (
          0 => '###',
          1 => '###-##',
        ),
      ),
      213 => 
      (object) array(
         'name' => 'Tanzania, United Republic of',
         'dial_code' => '+255',
         'code' => 'TZ',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      214 => 
      (object) array(
         'name' => 'Tajikistan',
         'dial_code' => '+992',
         'code' => 'TJ',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      215 => 
      (object) array(
         'name' => 'Thailand',
         'dial_code' => '+66',
         'code' => 'TH',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      216 => 
      (object) array(
         'name' => 'Timor-Leste',
         'dial_code' => '+670',
         'code' => 'TL',
         'postal_format' => 
        array (
        ),
      ),
      217 => 
      (object) array(
         'name' => 'Togo',
         'dial_code' => '+228',
         'code' => 'TG',
         'postal_format' => 
        array (
        ),
      ),
      218 => 
      (object) array(
         'name' => 'Tokelau',
         'dial_code' => '+690',
         'code' => 'TK',
         'postal_format' => 
        array (
        ),
      ),
      219 => 
      (object) array(
         'name' => 'Tonga',
         'dial_code' => '+676',
         'code' => 'TO',
         'postal_format' => 
        array (
        ),
      ),
      220 => 
      (object) array(
         'name' => 'Trinidad and Tobago',
         'dial_code' => '+1 868',
         'code' => 'TT',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      221 => 
      (object) array(
         'name' => 'Tunisia',
         'dial_code' => '+216',
         'code' => 'TN',
         'postal_format' => 
        array (
          0 => '####',
        ),
      ),
      222 => 
      (object) array(
         'name' => 'Turkey',
         'dial_code' => '+90',
         'code' => 'TR',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      223 => 
      (object) array(
         'name' => 'Turkmenistan',
         'dial_code' => '+993',
         'code' => 'TM',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      224 => 
      (object) array(
         'name' => 'Turks and Caicos Islands',
         'dial_code' => '+1 649',
         'code' => 'TC',
         'postal_format' => 
        array (
          0 => 'TKCA 1ZZ',
        ),
      ),
      225 => 
      (object) array(
         'name' => 'Tuvalu',
         'dial_code' => '+688',
         'code' => 'TV',
         'postal_format' => 
        array (
        ),
      ),
      226 => 
      (object) array(
         'name' => 'Uganda',
         'dial_code' => '+256',
         'code' => 'UG',
         'postal_format' => 
        array (
        ),
      ),
      227 => 
      (object) array(
         'name' => 'Ukraine',
         'dial_code' => '+380',
         'code' => 'UA',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      228 => 
      (object) array(
         'name' => 'United Arab Emirates',
         'dial_code' => '+971',
         'code' => 'AE',
         'postal_format' => 
        array (
        ),
      ),
      229 => 
      (object) array(
         'name' => 'United Kingdom',
         'dial_code' => '+44',
         'code' => 'GB',
         'postal_format' => 
        array (
          0 => '@@## #@@',
          1 => '@#@ #@@',
          2 => '@@# #@@',
          3 => '@@#@ #@@',
          4 => '@## #@@',
          5 => '@# #@@',
        ),
      ),
      230 => 
      (object) array(
         'name' => 'United States',
         'dial_code' => '+1',
         'code' => 'US',
         'postal_format' => 
        array (
          0 => '#####-####',
          1 => '#####',
        ),
      ),
      231 => 
      (object) array(
         'name' => 'Uruguay',
         'dial_code' => '+598',
         'code' => 'UY',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      232 => 
      (object) array(
         'name' => 'Uzbekistan',
         'dial_code' => '+998',
         'code' => 'UZ',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      233 => 
      (object) array(
         'name' => 'Vanuatu',
         'dial_code' => '+678',
         'code' => 'VU',
         'postal_format' => 
        array (
        ),
      ),
      234 => 
      (object) array(
         'name' => 'Venezuela, Bolivarian Republic of',
         'dial_code' => '+58',
         'code' => 'VE',
         'postal_format' => 
        array (
          0 => '####',
          1 => '####-@',
        ),
      ),
      235 => 
      (object) array(
         'name' => 'Viet Nam',
         'dial_code' => '+84',
         'code' => 'VN',
         'postal_format' => 
        array (
          0 => '######',
        ),
      ),
      236 => 
      (object) array(
         'name' => 'Virgin Islands, British',
         'dial_code' => '+1 284',
         'code' => 'VG',
         'postal_format' => 
        array (
          0 => 'VG####',
        ),
      ),
      237 => 
      (object) array(
         'name' => 'Virgin Islands, U.S.',
         'dial_code' => '+1 340',
         'code' => 'VI',
         'postal_format' => 
        array (
          0 => '#####',
          1 => '#####-####',
        ),
      ),
      238 => 
      (object) array(
         'name' => 'Wallis and Futuna',
         'dial_code' => '+681',
         'code' => 'WF',
         'postal_format' => 
        array (
          0 => '986##',
        ),
      ),
      239 => 
      (object) array(
         'name' => 'Yemen',
         'dial_code' => '+967',
         'code' => 'YE',
         'postal_format' => 
        array (
        ),
      ),
      240 => 
      (object) array(
         'name' => 'Zambia',
         'dial_code' => '+260',
         'code' => 'ZM',
         'postal_format' => 
        array (
          0 => '#####',
        ),
      ),
      241 => 
      (object) array(
         'name' => 'Zimbabwe',
         'dial_code' => '+263',
         'code' => 'ZW',
         'postal_format' => 
        array (
        ),
      ),
    ),
  ),
  'googlmapper' => 
  array (
    'enabled' => true,
    'key' => 'AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw',
    'version' => 'quarterly',
    'region' => 'GB',
    'language' => 'en-gb',
    'async' => false,
    'marker' => true,
    'center' => true,
    'locate' => false,
    'zoom' => 8,
    'scrollWheelZoom' => true,
    'zoomControl' => true,
    'mapTypeControl' => true,
    'scaleControl' => false,
    'streetViewControl' => true,
    'rotateControl' => false,
    'fullscreenControl' => true,
    'gestureHandling' => 'auto',
    'type' => 'ROADMAP',
    'ui' => true,
    'markers' => 
    array (
      'icon' => '',
      'animation' => 'NONE',
    ),
    'cluster' => true,
    'clusters' => 
    array (
      'icon' => '//googlearchive.github.io/js-marker-clusterer/images/m',
      'grid' => 60,
      'zoom' => NULL,
      'center' => false,
      'size' => 2,
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\GitHub\\ticketslaravel\\ticketUI\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\GitHub\\ticketslaravel\\ticketUI\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'C:\\GitHub\\ticketslaravel\\ticketUI\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'mailhog',
        'port' => '1025',
        'encryption' => NULL,
        'username' => NULL,
        'password' => NULL,
        'timeout' => NULL,
        'auth_mode' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
    ),
    'from' => 
    array (
      'address' => NULL,
      'name' => 'Laravel',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\GitHub\\ticketslaravel\\ticketUI\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\GitHub\\ticketslaravel\\ticketUI\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\GitHub\\ticketslaravel\\ticketUI\\resources\\views',
    ),
    'compiled' => 'C:\\GitHub\\ticketslaravel\\ticketUI\\storage\\framework\\views',
  ),
  'flare' => 
  array (
    'key' => NULL,
    'reporting' => 
    array (
      'anonymize_ips' => true,
      'collect_git_information' => false,
      'report_queries' => true,
      'maximum_number_of_collected_queries' => 200,
      'report_query_bindings' => true,
      'report_view_data' => true,
      'grouping_type' => NULL,
      'report_logs' => true,
      'maximum_number_of_collected_logs' => 200,
      'censor_request_body_fields' => 
      array (
        0 => 'password',
      ),
    ),
    'send_logs_as_events' => true,
    'censor_request_body_fields' => 
    array (
      0 => 'password',
    ),
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'light',
    'enable_share_button' => true,
    'register_commands' => false,
    'ignored_solution_providers' => 
    array (
      0 => 'Facade\\Ignition\\SolutionProviders\\MissingPackageSolutionProvider',
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => '',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 94,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
