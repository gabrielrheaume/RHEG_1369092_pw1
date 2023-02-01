# Web Project

## Context
As part of my web development training, a *fake* client approached me to create a site for his restaurant PUBG4

He wanted:
1. A homepage that makes you want to try their cookery
2. A dynamic menu
3. An "About" page
4. A contact page
5. A way to subscribe to their newsletter
6. An admin area to modify the menu as well as create users

Because time was limited and it was a student project, some more or less important elements are missing.
Among these, the responsive aspect of the site is for me the most important missing element, but was not requested (although it would be ridiculous for a restaurant to make the site desktop-first as it was requested)

## FrontEnd
For the frontend part, in my training, we saw HTML, CSS (SCSS) and JavaScript
Nevertheless we had not seen any way to manage the different files
For my part, I put everything that refers to the frontend in the "public" folder. There is a JS folder and a CSS for files of the same type
Then I split the files by item. For example, there is a "Header" CSS file, for the header

## BackEnd
For the backend we saw PHP with SQL for database queries
And we saw the MVC method, so that's the one I used
Separation of models, controllers and views

## Project description
### Header
The header contains:
- The logo of the restaurant
- Navigation links
- Social media icons

Navigation links have a small effect on hover
It would be interesting to add one for social media icons
The header is made in HTML/CSS

### Footer
The footer contains:
- A copyright logo
- Two important elements: address and phone number
- A text and a button to encourage subscription to the newsletter

The newsletter part is not present on the newsletter registration page, nor on the page reserved for the manager and employees
The footer is made in HTML/CSS

### Homepage
The homepage is divided into three sections and one feature:
- Heading image
- Food style information
- Incentive to try the PUBG4 experience
- Pop-up comments

The three sections are static and made in HTML/CSS
The comments are drawn randomly from a list contained in the database.
Then, the resulting comment is displayed in a SMS style
Comments are retrieved from the database via PHP/SQL and are sent in json to be processed and displayed in JavaScript/CSS

### "About" page
This page contains an image and descriptive text of the restaurant
It's just HTML/CSS

### Contact Page
Just like the "About" page, this page is mostly static HTML/CSS
There is a visual element, managed in PHP, to indicate if the restaurant is currently open or closed
However, it would be very interesting to allow the owner to modify the opening hours and exceptional closings

### Newsletter (and more)
This page contains a newsletter subscription form
There is also a small back arrow for returning to the previous page and an image to fill in the blank space

What is very interesting with this page is that the form section is also used to accommodate all the other forms on the site
Indeed, the creation of an account as well as all the functions relating to the modification of the menu are found there, but are only accessible to the owner and his employees. Special note for creating an account that is only accessible to the owner, as he requested

To see another example form, you can find the login page using the URL with "/connexion"

Obviously, the display is done in HTML/CSS, but all the form management is done in PHP/SQL

### Dynamic menu
This page was the hardest to do
The menu is stored in a database and retrieved with PHP/SQL
It is encoded in JSON so that it can be processed in JavaScript using VueJS in SPA (Single Page Application)
It allows you to choose different criteria to sort the menu

Here is the structure of the database:
There are tables "dishes", "categories" and "type of dish"
Since the dishes had to be categorized by their type of dish (entree, meal, dessert),
it was necessary to separate these from the categories (meat, salad, etc.)
The table type of dish is connected to the dishes in "one for one". The customer mentioned that a dish should not have multiple dish types
On the other hand, a dish can belong to several categories, so it was necessary to create a many to many table to connect these two tables

The big challenge here was, at first, to make an SQL query to retrieve all the dishes and for each of its dishes, to
