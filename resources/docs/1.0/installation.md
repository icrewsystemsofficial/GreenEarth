# Installation & Set Up

---

-   [1. Install Laravel](#section-1)
-   [2. Install Git](#section-2)
-   [3. Clone the Repository](#section-3)
-   [4. Configure the Database](#section-4)


<a name="section-1"></a>

## 1. Install Laravel

Given that this open-source project uses the Laravel PHP framework, please install and configure it as per the instructions listed 
<a href="https://www.positronx.io/install-laravel-with-composer-on-macos-ubuntu-and-windows/">here</a>.

<br>

Alternatively, you can refer to the introductory <a href="https://laracasts.com/series/laravel-8-from-scratch">
'Laravel 8 from Scratch'</a> course (you need not venture further than Section 1) taught by the brilliant Jeffrey Way on Laracasts! 

<br>

*Please note that you need to be proficient in your working knowledge of PHP and mySQL in order to make the most of the productivity gains afforded by Laravel.*

<a name="section-2"></a>

## 2. Install Git

Next, you will need to have Git installed so that you can manage version control with aplomb! Git is a tool which allows collaborative development between many colleagues. You can download it 
<a href="https://git-scm.com/downloads">here</a>.

<br>

While Git is not mandatory for running this project on your local machine, it is generally good practice to have a traceable means of logging the work done throughout the life of a project.

<a name="section-3"></a>

## 3. Clone the Repository

The hard yards have now been done - and this is where the fun begins!

<br>

You can access the online GitHub repository for this project <a href="https://github.com/icrewsystemsofficial/GreenEarth">here</a>.

<br>

In your coding terminal of choice (we will be illustrating this for Windows users), please follow these steps to ensure that you have successfully cloned the project and that you have all of the requisite dependencies:

1. Open your terminal (we are using Command Prompt on Windows) and navigate, using the <em>cd</em> command, 
to the location where you want the local project files to be at. 
This could be any location as per your convenience. 
    
2. Use the following command to clone the repository:

    ` 
    git clone https://github.com/icrewsystemsofficial/GreenEarth.git
    `

3. You need to ensure that your machine has all of the requisite dependencies. Run the following commands to do so:

    ` 
    composer install
    `

    `
    npm install
    `

    `
    npm run dev
    `

<a name="section-4"></a>

## 4. Configure the Database

Now that you have successfully installed Laravel and have cloned the repository, it is now time to get your local database set up!

1. You will need to create a *.env* file, which allows you to modify your current project environment. Simply run the code in the following line:

    ` 
    cp .env.example .env
    `

2. With the *.env* file created, you will now need to create a new database on your local machine. Give the database any name you prefer, though we recommend *GreenEarth* as the name. You do not need to add any tables at this time. 

3. Modify the *.env* file by adding the name of your database alongside your database credentials (username and password) as pictured below: 
    
    ![Adding database details to the file.](/screenshots/env_file.jpg "Find this code chunk and update your details!").

4. Almost done! Go back to the terminal and run the following lines of code one-by-one:
    
    ` 
    php artisan key:generate
    `
    
    `
    php artisan migrate
    `
    
    `
    php artisan db:seed
    `

Congratulations! You have successfully set up the app on your local machine! Now run `php artisan serve` and dive right into the world of GreenEarth! 



