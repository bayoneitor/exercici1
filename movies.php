<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if (isset($_GET['movieName']) && !empty($_GET['movieName'])) {
            // ["title" => "", "year" => "", "description" => ""]
            $movies = [
                ["title" => "IronMan", "movieStar" => "Ironmansin" , "year" => "2008", "description" => "Iron Man es un superhéroe ficticio que aparece en los cómics estadounidenses publicados por Marvel Comics. El personaje fue cocreado por el escritor y editor Stan Lee, desarrollado por el guionista Larry Lieber y diseñado por los artistas Don Heck y Jack Kirby."],
                ["title" => "Superman", "movieStar" => "Clark Joseph Kent", "year" => "2002", "description" => "Superman es un superhéroe ficticio, que apareció por primera vez en los cómics estadounidenses publicados por DC Comics.​​​​"],
                ["title" => "Hulk", "movieStar" => "Mark Ruffalo", "year" => "2005", "description" => "Hulk es un personaje ficticio, un superhéroe que aparece en los cómics estadounidenses publicados por la editorial Marvel Comics. El personaje fue creado por los escritores Stan Lee y Jack Kirby siendo su primera aparición en The Incredible Hulk #1 publicado en mayo de 1962."]
            ];
            $title = $_GET['movieName'];

            $num = 0;
            $found = false;
            foreach ($movies as $movie) {
                foreach ($movie as $key => $value) {
                    if ($key == 'title') {
                        if ($value == $title) {
                            $found=$num;
                        }
                    }
                }
                $num++;
            }

            if ($found === false) {
                echo "No s'ha trobat.";
            } else{
                echo'<h1>Informació sobre la pel·licula '.$movies[$found]['title'].'</h1><br>
                        <p>Basat en la teva entrada, aquí tens la informació:</p>
                        <p>'.$movies[$found]['movieStar'].' protagonitza la pel·licula '.$movies[$found]['title'].'
                        que es va produir al '.$movies[$found]['year'].', petita descripcio:
                        <br><br>'.$movies[$found]['description'].'
                        </p>';
            }
        } else {
            echo '<form action="'. htmlentities($_SERVER['PHP_SELF']) .'" method="get">
                    <label for="movieName">Nombre Pelicula: </label>
                    <input type="text" name="movieName" id="movieName" required>
                    <input type="submit" value="Buscar">
                </form>';
    }
    ?>
    
</body>
</html>