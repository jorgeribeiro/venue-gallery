# Venue Gallery
Venue gallery that consumes filterable (name and discount percentage) data from an API. It also features a CLI to generate json and xml (data can be filtered on both file types) files from the csv source.

## Technologies
- Lumen (Backend)
- laravel-cors
- Vue.js (Frontend)
- axios

## How to install
1. `git clone https://github.com/jorgimello/venue-gallery.git`
2. `cd backend/`
3. `composer install` (make sure you have composer installed and working)
5. `cp .env.example .env`
6. `cd frontend/`
7. `yarn` (make sure you have yarn installed and working. I think npm install also will do)

## How to run
1. To run the API:
`cd backend/ && php -S localhost:8000 -t public`: API will be running on localhost:8000
2. To run the Vue.js app:
`cd frontend/ && yarn serve`: Frontend will be running on localhost:8080
3. Place venue data on the `backend/` folder in a file named `venues.csv` (do not leave more than one blank line at the end of the file)

If the steps above worked, then the app should look like the following:
![alt text](https://raw.githubusercontent.com/jorgimello/venue-gallery/master/images/example.png)

## How to use the CLI command
Type `php generate-files -help` inside `backend/` to understand how to use it and apply filters.

## Important scripts to check
1. Backend
- [File.php](https://github.com/jorgimello/venue-gallery/blob/master/backend/app/File.php): Class to be extended by JsonFile and XmlFile
- [JsonFile.php](https://github.com/jorgimello/venue-gallery/blob/master/backend/app/JsonFile.php)
- [XmlFile.php](https://github.com/jorgimello/venue-gallery/blob/master/backend/app/XmlFile.php)
- [web.php](https://github.com/jorgimello/venue-gallery/blob/master/backend/routes/web.php): Defines API route
- [ApiController.php](https://github.com/jorgimello/venue-gallery/blob/master/backend/app/Http/Controllers/ApiController.php): Controller for the API. Generates files and return requests
- [generate-files](https://github.com/jorgimello/venue-gallery/blob/master/backend/generate-files): CLI Command

2. Frontend
- [Home.vue](https://github.com/jorgimello/venue-gallery/blob/master/frontend/src/views/Home.vue): Homepage of the app. Includes axios calls to the API
- [ImageCard.vue](https://github.com/jorgimello/venue-gallery/blob/master/frontend/src/components/ImageCard.vue): Card component that displays the image, name and discount of a venue

## Improvements
- Improve UI to a more elegant design
- Display a carousel of images to display the venues images (did not have time to do it)
- Write tests for the API and CLI command
- Use random hotel images from Unsplash to improve the frontend images
- Containerize both API and frontend to have it up easier and faster
