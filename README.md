## Docker image
This version contain dockerfile to build it's own images

1. build image 
	docker build -t balin/web .
2. run container 
	docker run -d balin/web 
3. .env file 
	To change copy .env file into system, please enable and modify Dockerfile line 127

## .ENV SETTING

setting for .env balin

APP_ENV=
APP_DEBUG=
APP_KEY=

DB_HOST=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

CACHE_DRIVER=
SESSION_DRIVER=
QUEUE_DRIVER=

MAIL_DRIVER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_PRETEND=

FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
FACEBOOK_REDIRECT=

ROUTE_BALIN_ATTRIBUTE=
ROUTE_BALIN_VALUE=
ROUTE_CAMPAIGN_ATTRIBUTE=
ROUTE_CAMPAIGN_VALUE=
ROUTE_BALIN_CLAIM_VOUCHER=
ROUTE_BALIN_RESET_PASSWORD=

API_DOMAIN=
API_PORT=

CLIENT_ID=
CLIENT_SECRET=


##Slider Req:

####Spec

1. dimensi gambar 3279x1752
2. ukuran gambar (200~300kb)

####Komposisi gambar

1. headroom (15% dari tinggi)
2. content (75% dari tinggi)
3. scale area (dipotong 10% dari tinggi pada bagian bawah)
