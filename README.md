# Simple Router, declare routes and start your application !
## Installation
Just download and put Router.php in your /class folder !
Include the file !
## Declaring routes
### Without URL parameter
Use 'get' static method like this : 
`Router::get($route, 'controller@action')`

Parameters definition : 
`$route` : which URL you want to bind ? Example : `/posts/view/`  or `/` (for index). Don't forget to add a '/' at first
`controller@action` : which method (action) you want to call in which controller ? Example : `post@listAll` will call listAll() method in post controller. 

### With URL parameter
Example : `Router::get('/posts/view/{id}', 'post@listById')`. URL = 'http://localhost/posts/view/42' will call listById method like this : `postController->listById(42)`.
In other words, {param} in route definition is send to controller method with URL value.

## Found a bug ? Open an issue !
Have fun !
