# Venue Gallery
Venue gallery that consumes data from an API. It also features a CLI to generate json and xml files from the csv source.

## Technologies
- Lumen
- ArrayToXml
- Vue.js
- Axios

## How to install
1. `git clone https://github.com/jorgimello/venue-gallery.git`
2. `cd backend/`
3. `composer install` (make sure you have composer installed and working)
4. `cd ../frontend`
5. `yarn` (make sure you have yarn installed and working)

## How to run
To run the API:
`cd backend/ && php -S localhost:8000 -t public`: API will be running on localhost:8000
To run the Vue.js app:
`cd frontend/ && yarn serve`: Frontend will be running on localhost:8080
