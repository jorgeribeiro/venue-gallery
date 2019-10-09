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
1. To run the API:
`cd backend/ && php -S localhost:8000 -t public`: API will be running on localhost:8000
2. To run the Vue.js app:
`cd ../frontend/ && yarn serve`: Frontend will be running on localhost:8080
3. Place venue data on the root folder in a file named `venues.csv` (do not leave more than one blank line on the end of the file)

After all this, just open the Vue.js app on your browser and the gallery should display the venues. If the page is empty, please check the browser console for a `Cross-Origin Request Blocked` warning. To fix it, install an extension to your browse to bypass it. I use [Allow Cors](https://mybrowseraddon.com/access-control-allow-origin.html) and it works just fine.

## How to use the CLI command
Type `php generate-files -help` to understand how to use it and apply filters.

## Important scripts
1. Backend
- web.php

## Improvements
- Use SimpleXML to generate the XML file, because ArrayToXml does not prettify the content saved
- Improve UI to a more elegant design
- Display a carousel of images to display the venues images (did not have time to do it)
