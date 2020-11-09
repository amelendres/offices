# APPTO OFFICES API

### Requirements
- Docker

### Install

1. Download repository
```
git clone https://github.com/amelendres/offices.git
```

2. Build

The first installation
```
make build
```

### Docker Utils

Enter into your container
```
make sh
```

Restart your container
```
make restart
```

### How to run tests
pre: enter into your container
```
composer test
```

### How to load fixtures
pre: enter into your container
```
bin/console d:f:l -n
```

### Requests

Create Office:

```
curl --location --request POST 'http://localhost:8090/api/v1/offices' \
--header 'Content-Type: application/json' \
--data-raw '{
    "id": "72c79f59-1569-4121-ba26-a964e6ae5c09",
    "name": "Koss - Schneider 133",
    "address": {
        "street": "461 Bayer Walks",
        "city": "North Santinafurt",
        "state": "undefined",
        "country": "SS",
        "postalCode": "08020"
    }
}'
```

Update Office:
```
curl --location --request PUT 'http://localhost:8090/api/v1/offices/72c79f59-1569-4121-ba26-a964e6ae5c09' \
--header 'Content-Type: application/json' \
--data-raw '{
    "id": "72c79f59-1569-4121-ba26-a964e6ae5c09",
    "name": "Smitham Group 264",
    "address": {
        "street": "5518 Mark Mill",
        "city": "South Trystanton",
        "state": "undefined",
        "country": "RS",
        "postalCode": "09030"
    }

}'
```

Get Office:
```
curl --location --request GET 'http://localhost:8090/api/v1/offices/72c79f59-1569-4121-ba26-a964e6ae5c09' \
--data-raw ''
```

Delete Office:
```
curl --location --request DELETE 'http://localhost:8090/api/v1/offices/72c79f59-1569-4121-ba26-a964e6ae5c09' \
--data-raw ''
```

List Offices
```
curl --location --request GET 'http://localhost:8090/api/v1/offices' \
--data-raw ''
```
