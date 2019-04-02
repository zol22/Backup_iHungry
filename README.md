# iHungry Website

It help individuals prepare meals according to their diet, budget and nutritional requirements using the Spoonacular API.


## Getting Started

### Prerequisites

This project was made with 4 computers connected to the same network by a router.

This project was made in LAMP : Linux(ubuntu), Apache, Mysql, PHP.


  
### Installing
 
- Install PHP
- Install Apache
- Install Mysql
- Install Rabbitmq
- Install PHPMyadmin

## Running the test

1. Open Backend/loginServer.php so the DB starts listening. 
    - IMPORTANT: Change the broker_host in file Backend/testRabbitMQ.ini to the IP 
address of the rabbitmq server/computer.

2. Open login.php and enter credentials to start authentication.
    - Our database example-> username = jefri , password = 1
    - If credentials are right, it will redirect you to Website/bootstrap/website.php, otherwise, It will give you
    an error.
  
3. Open DMZ/ApiServer/API_Server.php so the DMZ start listening.
    - IMPORTANT: Change the broker_host in file DMZ/testRabbitMQ.ini to the IP 
address of the DMZ server/computer.
      
3. Once you are in the website.php, there are 8 features you can look for.
    - Search recipes based on calories
    - Search recipes based on Ingredients you have in your bridge
    - Convert amounts
    - Search for Food videos
    - Track macro nutrients
    - Search for ingredients substitutes
    - Autocomplete menu search
    - Search for random recipes

## Build with

  * Bootstrap -  web framework used 
  
## License

This project is licensed under the MIT License - see the LICENSE.md file for details  
  
## Acknowledgments

`You can do it!`
