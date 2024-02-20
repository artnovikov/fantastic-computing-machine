## Installation
All you need to do is run command in ```proxy-checker``` directory
```
docker compose up --build
```
Then you need to generate laravel key. In PHP container, run this command
```
php artisan key:generate
```

Also create ```.env``` file in ```www``` directory. Here some environments you need to change.

```
DB_HOST=YOUR_MYSQL_CONTAINERS_IP
--------------------------------
# ip2location.io
IP2LOCATION_EMAIL='binec57023@minhlun.com'
IP2LOCATION_PASSWORD='8X98jY~.Py;qW3U'
IP2LOCATION_API_URL='api.ip2location.io'
IP2LOCATION_API_KEY='D02A28D307A0B7B93407892BA8A8AA07'

# proxycheck.io
PROXYCHECK_EMAIL='codox47335@lendfash.com'
PROXYCHECK_API_URL='proxycheck.io/v2'
PROXYCHECK_API_KEY='3121c4-080557-1185s3-1n2m5e'
```

Have fun, sir!