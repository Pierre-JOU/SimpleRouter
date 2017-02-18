<?php


    require 'class/Router.php';

    /*
     * Man :
     *
     * Router::get(...) allows you to record a route
     * '/' must add before path
     * {param} is a param which send to controller@method
     *
     * Example : Router::get('/posts/{id}', 'post@listByID')
     * When visitor access to http://domain.com/posts/42, postController will instantiate and his method
     * listByID($id) call with $id = 42.
     *
     * If Router don't find a corresponding route, a header 404 is throw
     */

    //Few route example :
    Router::get('/', 'index@index');

    Router::get('/posts/', 'post@listAll');

    Router::get('/posts/view/{id}', 'post@listById');

    //Launch the Router !
    Router::run();
?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1 style="text-align : center;">Simple router application</h1>

        <p>Try to access :</p>

        <table style="width: 100%; text-align: center">
            <tr>
                <th>Url :</th>
                <th>Loaded controller :</th>
                <th>Loaded method</th>
                <th>Send arg :</th>
            </tr>
            <tr>
                <td>/</td>
                <td>indexController</td>
                <td>index</td>
                <td>#</td>
            </tr>
            <tr>
                <td>/posts/</td>
                <td>postController</td>
                <td>listAll</td>
                <td>#</td>
            </tr>
            <tr>
                <td>/posts/view/42</td>
                <td>postController</td>
                <td>listById</td>
                <td>42</td>
            </tr>
        </table>

        <p style="font-size: smaller">This is sooo easy :D</p>
    </body>
</html>


