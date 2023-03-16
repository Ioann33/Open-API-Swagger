1. Implement simple REST API server as defined in the API documentation (OpenAPI)
2. Data generation / seeders
a. Implement a data generator and seeders for the initial filling of the database with data (45
users).
b. The data should be as close as possible similar to the data which a real user would fill.
3. POST request handling requirements:
a. The image needs to be cropped (center/center) and saved as jpg 70x70px.
b. The image should be optimized using the tinypng.com API. You can use any other API service
for image optimization (we use kraken.io, but it's paid only), just make sure to indicate in the
description of the test task which service was used and why.
c. An authorization token is needed only to demonstrate the ability to generate and use it.
4. Implement frontend part, just to demonstrate how your server works. Without beautiful design and
formatting, you can use any ready-made UI components that you feel comfortable working with. We
will only be paying attention to the output of the data and verifying if form works.
a. Display a list of users with a “Show more” button, output 6 users per page.
b. Create an add new user form. No validation is needed on the front-end part, all validations
should be done only on the server side.

