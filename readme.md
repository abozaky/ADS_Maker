

<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Installation](#installation)
* [Contact](#contact)




<!-- ABOUT THE PROJECT -->
## About The Project

![MedicineProject](https://user-images.githubusercontent.com/41168441/60390565-bebaba80-9ad9-11e9-9699-d72aa862e022.jpg)

## Online Medicine Order System And Medical Information Blog

* allow any Pharmacy to subscribe and add pharmacy with Authintication ID for Your Pharmacy
* allow allows any customer to book medication for a certain time or order Canceled 
* allow pharmacy owner add Articles Specialized medical information
* allow Customer ask owner article and write any comment 


### Built With

* [Bootstrap 4](https://getbootstrap.com)
* [JQuery](https://jquery.com)
* [Laravel](https://laravel.com)



<!-- GETTING STARTED -->
## Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.


### Installation


Clone the repository

    git clone git@github.com:https://github.com/abozaky/MedicinesShop.git

Switch to the repo folder

    cd MedicineShop

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:generate

Run the database migrations (**Set the database connection in .env before migrating (pharmacy)**)

    php artisan migrate
Set Your Mailtrap 

<!-- CONTACT -->
## Contact

Abdel-Rahmman Mohammed Zaky - [abdo.zaky0@gmail.co]
Project Link: [https://github.com/abozaky/MedicinesShop]


