# ReadMe 

## Home page URL
Link : http://localhost/?c=home&a=load<br>
Link : http://aztecgamestudios.localhost/?c=home&a=load

This project is developed in PHP, bootstrap, twig templating without using any external MVC framework. The framework code has been written as a part of this project.


#  Notes / Learning 
- implementation of PHP MVC without using any outside framework

- Note 1:<br>
DTO = Domain = Model = Bean   -> all with getter and setters
DAO    -> with all SQL queries
But in php might be Model class have sql queries



- Note 2:<br>
https://stackoverflow.com/questions/13154603/how-to-resolve-favicon-ico-not-found-error-on-apache
Favicon.ico is an icon file that is displayed next to the URL in the browser bar. (See the StackExchange icon next to the URL).
There is no way to stop browsers requesting it. You can either create a favicon, or create a zero byte file called favicon.ico and place in the web root.


- Note 3:<br>
Class - FrontController.php or Framework.php
Imp - Class naming convention for loading and instantiatng the object.

For loading the class we need directory path whereas for creating the instance we need Namesapce path

// full directroy path for laoding the class
require_once CONTROLLER_PATH . ucfirst(CONTROLLER) . "Controller.php";   

// Namespace for instantiatng the class
$controller_name = 'AztecGameStudios\\application\\controller\\' . ucfirst(CONTROLLER) . 'Controller';
$controller = new $controller_name;
// https://blog.lysender.com/2015/07/php-instantiate-a-class-from-a-string-with-namespace/


- Note 4<br>
creating of Singleton class in php is little different than Java
https://stackoverflow.com/questions/203336/creating-the-singleton-design-pattern-in-php5


- Note 5<br>
REST endpoint
https://restfulapi.net/resource-naming/
https://aztecgamestudios.localhost/dashboard/

curl -X GET https://AztecGameStudios.localhost/
curl -X GET https://localhost/

curl -X GET https://AztecGameStudios.localhost/games
curl -X GET https://AztecGameStudios.localhost/games/{id}

curl -X POST https://AztecGameStudios.localhost/games/
curl -X POST https://AztecGameStudios.localhost/games/{id}

curl -X PUT https://AztecGameStudios.localhost/games/{id}

curl -X DELETE https://AztecGameStudios.localhost/games/{id}

Follow Same convention for person entity also



#  Questions To Ask 

1. Can we avoid writing line "require once" in each class? Might be using Autoloading in a right way.
Already Done.


2. Why whether run works or debug. Why not both together
Class : GameModel.php
// Works in run but giving error in debug
// require_once("src/application/domain/Game.php");

// Works in debug but giving error in run
// require_once("../domain/Game.php");

// Works in run and debug both
require_once __DIR__ . '/../domain/Game.php';

<br>
<br>

3. Should have a service layer talking to DAO or Model layer instead of direct interaction.


4. I have merged the GameRievw table with the joining table itself. Is it a good approuch. 

5. Can we implment this website using only REST entPoint style? Notes below


6. Below fucntion giving Error, so invoked method directly without using this method. Error: call_user_func_array() expects exactly 2 parameters, 3 given
    // call_user_func_array($controller, $action_name, PARAM);
    $action_name = strtolower(ACTION);
    $controller->$action_name();

7. Discussion on note 3 regarding loading vs instantiatng the class

8. Instead of writing the configration file Route.json, I have extracted out the action name and method name from the URL itsefl.
Any feedback or concern?


9. I have moved loading constants from Frontcontroller to a singleton class called Initialization.
So that it won't be called for each request but only onces when server startsup. Is this right? Also, why the first way of creating the singleton class (in comments) didn't work.
Loading constants in singelton class ratther then executing it for each request.

10. Is it better to move the constants (CONTROLLER, ACTION, PARAM) to Request class parameters?
What is th scope of constarnts which we difine. Per request, per sessoin, global ?

11. is it better to move the constants (CONTROLLER, ACTION, PARAM) to Request class parameters?
What is th scope of constarnts which we difine. Per request, per sessoin, global ?



# TODO

###  Last hour todo 
- remove all comemnted code
- remove all todo
- refactor any file if required
- format any files if required
- Write Documentation or ReadMe



### Later / Nice to do in future
- Make the viewData variable as Map and then return from controller to base controller to view. This will make it more extendable in future for any modification.

- include a good image for home page and game release page
- player doamin - password, plain password, encrypted passowd - use hash algorithm
- player model - role to enum

- provide DB scripts to load data in DB, if asked for
- Pagination on Game page, if required

