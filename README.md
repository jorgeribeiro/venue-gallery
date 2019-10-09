# Venue Gallery
Venue gallery that consumes filterable (name and discount percentage) data from an API. It also features a CLI to generate json and xml (data can be filtered on both file types) files from the csv source.

## Technologies
- Lumen (API)
- ArrayToXml
- Vue.js (Frontend)
- Axios

## How to install
1. `git clone https://github.com/jorgimello/venue-gallery.git`
2. `cd backend/`
3. `composer install` (make sure you have composer installed and working)
5. `cp .env-example .env`
6. `cd ../frontend`
7. `yarn` (make sure you have yarn installed and working. I think npm install also will do)

## How to run
1. To run the API:
`cd backend/ && php -S localhost:8000 -t public`: API will be running on localhost:8000
2. To run the Vue.js app:
`cd ../frontend/ && yarn serve`: Frontend will be running on localhost:8080
3. Place venue data on the `backend/` folder in a file named `venues.csv` (do not leave more than one blank line at the end of the file)

After all this, just open the Vue.js app on your browser and the gallery should display the venues. If the page is empty, please check the browser console for a `Cross-Origin Request Blocked` warning. To fix it, install an extension to your browser to bypass it. I use [Allow Cors](https://mybrowseraddon.com/access-control-allow-origin.html) and it works just fine.

If the steps above worked, then the app should like like the following:
![alt text](https://raw.githubusercontent.com/jorgimello/venue-gallery/master/images/example.png)

## How to use the CLI command
Type `php generate-files -help` inside `backend/` to understand how to use it and apply filters.

## Important scripts to check
1. Backend
- [File.php](https://github.com/jorgimello/venue-gallery/blob/master/backend/app/File.php): Class to be extended by JsonFile and XmlFile
- [JsonFile.php](https://github.com/jorgimello/venue-gallery/blob/master/backend/app/JsonFile.php)
- [XmlFile.php](https://github.com/jorgimello/venue-gallery/blob/master/backend/app/XmlFile.php)
- [web.php](https://github.com/jorgimello/venue-gallery/blob/master/backend/routes/web.php): API route
- [ApiController.php](https://github.com/jorgimello/venue-gallery/blob/master/backend/app/Http/Controllers/ApiController.php): Controller for the API. Generates files and return requests'

2. Frontend
- [Home.vue](https://github.com/jorgimello/venue-gallery/blob/master/frontend/src/views/Home.vue): Homepage of the app. Includes axios calls to the API
- [ImageCard.vue](https://github.com/jorgimello/venue-gallery/blob/master/frontend/src/components/ImageCard.vue): Card component that displays the image, name and discount of a venue.

## Improvements
- Use SimpleXML to generate the XML file, because ArrayToXml does not prettify the xml content (all placed in one line)
- Improve UI to a more elegant design
- Display a carousel of images to display the venues images (did not have time to do it)
- Write tests for the API and CLI command
- Use random hotel images from Unsplash to improve the frontend images
