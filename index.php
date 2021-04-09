<?php
    include('./config.php');
if (empty($config['DB_DATABASE']) || 
    empty($config['DB_USERNAME']) || 
    empty($config['DB_PASSWORD'])){
      header("Location: ./database-error.php");
}else{

    include('./mysql.php');

    $db  = new SqlDB('127.0.0.1', $config['DB_DATABASE'], $config['DB_USERNAME'], $config['DB_PASSWORD']);
       
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sage</title>
        <link type="text/css" rel="stylesheet" href="./index.css" />
    
    </head>
    <body>
    <div id="container">
        <header>
            <nav>
                <a class="logo" href="#"><img src="./logo.png"></a>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Blog</a ></li>
                </ul>
            </nav>
        </header>
        <main>
            <aside>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Blog</a ></li>
                </ul>
            </aside>
            <section>
            <?php
                    $get_query = "SELECT name FROM persons";
                    $get_data = $db->query( $get_query )->fetchAll();

                 if ( empty($_POST) && count($get_data) == 0){
            ?>
                 <form method="POST">
                  <label for="name">Name:</label><br>
                  <input type="text" id="name" name="name" value=""><br/><br/>
                  <input type="submit" value="Submit">
                </form> 

            <?php
                }else if( !empty($_POST) && count($get_data) == 0){
                    $query = "INSERT INTO persons (name) VALUES ('" . $_POST['name'] . "')";
                    $db->query( $query );

                    echo '<h1>' . $_POST['name'] . ', you are amazin!' . '</h1>';

                }else{

                    $get_query = "SELECT name FROM persons";
                    $get_data = $db->query( $get_query )->fetchAll();
                    $get_data = end($get_data);
                    echo '<h1>' . $get_data['name']  . ', you are amazin!' . '</h1>';
                }
            ?>


                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in gravida magna, id mollis felis. Ut varius, diam a bibendum sagittis, est felis pulvinar nunc, 
                    sodales rhoncus lorem neque id velit. Vivamus posuere, enim at elementum pellentesque, nisl arcu placerat risus, at vestibulum neque purus eu justo. Vivamus elementum 
                    nisi sed nulla vulputate, ut ullamcorper magna egestas. Aenean iaculis ligula odio, vitae dictum velit commodo ut. Pellentesque quam elit, condimentum tempus justo ac, 
                    bibendum maximus sapien. Donec maximus non velit sed imperdiet.
                </p>

                <p>
                    Vivamus feugiat pulvinar gravida. Duis ut diam nec sapien eleifend eleifend. Maecenas id ligula eget erat gravida porttitor ac sed tellus. Sed scelerisque in orci eu vehicula.
                    Fusce feugiat hendrerit lorem, at maximus libero pharetra sodales. Aenean ut justo porta, viverra quam nec, lacinia mi. Donec fringilla scelerisque risus, id volutpat libero 
                    tincidunt quis. Pellentesque cursus molestie ex consectetur dignissim.
                </p>

                <p>
                    Morbi non erat sapien. Curabitur id auctor enim, ut bibendum dui. Phasellus eu auctor lorem. Suspendisse non sem eu est commodo posuere. Sed id lacinia dui, consectetur sodales 
                    justo. Ut rhoncus eros viverra tellus condimentum, in luctus ante ornare. Vivamus sed congue nunc. Quisque sed enim feugiat, feugiat mi non, cursus eros.
                </p>

                <p>
                    Integer eleifend eros at mattis cursus. Suspendisse elementum mi metus, sed posuere ante consectetur ac. Nulla posuere vel odio non scelerisque. Nulla quis luctus ligula. Morbi non 
                    felis fermentum, gravida nunc ut, gravida augue. Nunc in lorem nulla. In turpis ligula, laoreet vel ipsum non, gravida venenatis justo. Ut pellentesque sit amet elit id mollis. 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur commodo, tortor sit amet aliquam finibus, ante velit feugiat odio, vel porttitor nisi neque eu est. Aenean at 
                    accumsan tortor. Phasellus viverra arcu vel sem facilisis aliquet. Pellentesque sit amet varius ex. Etiam vitae mollis orci. Integer feugiat volutpat enim quis porta. Aliquam vel 
                    felis vitae orci tempor lobortis.
                </p>

                <p>
                    Curabitur in lacus faucibus, faucibus sapien a, dignissim risus. In tempus est ac aliquam maximus. Mauris volutpat, massa blandit maximus commodo, turpis velit iaculis erat, vel scelerisque 
                    velit mauris non neque. Nunc semper volutpat nisi. Morbi rutrum urna vel scelerisque pellentesque. Nunc mattis ante nec ligula volutpat interdum. Nam feugiat nulla a consectetur gravida.
                </p>
            </section>

        </main>
        <footer>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">Sage Intacct © 2021</p>
        </footer>
    </div>
    </body>
</html>

