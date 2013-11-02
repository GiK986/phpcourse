<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $data['title']; ?></title>
        <link type="text/css" rel="stylesheet" href="styles/semantic-tags.css" /> 
        <link href="./Images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    </head>
    <body>
        <header>
            <h3>
               <?= $data['title']; ?>
            </h3>
        </header>
        
        <nav>
            <ul>
                <?php
                                foreach ($data['list'] as $k=>$li){
                                    echo '<li><a href="'.$k.'.php">'.$li.'</a></li>';
                                }
                ?>
            </ul>
        </nav>
        
        <section>
              <?php
                include $data['content'];
              ?>
        </section>
     
    </body>
</html>
