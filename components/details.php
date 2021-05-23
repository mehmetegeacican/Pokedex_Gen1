<?php
    //check GET request id
    include('../config/db_connec.php');
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($connect,$_GET['id']);

        $sql = "SELECT * FROM pokemons WHERE id = $id";

        //get the query results
        $results = mysqli_query($connect,$sql);

        //fetch the results in array form
        $pokemon = mysqli_fetch_assoc($results);
        //free the result and free the close the connection
        mysqli_free_result($results);
        mysqli_close($connect);

        //print_r($pokemon);
    }
    if(isset($_POST['delete'])){
        //echo "Clicked delete";
        $id_del = mysqli_real_escape_string($connect,$_POST['id_to_delete']);

        //sql
        $sqlx = "DELETE FROM pokemons WHERE id = $id_del";

        if(mysqli_query($connect,$sqlx)){
            //succeess
            header('Location: /pokedex_gen1/');
        }
        else{
            echo "QUERY ERROR ". mysqli_error($connect); 
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Card Details</title>
</head>
<body>
    <?php include("../components/navbar.php") ?>
    <div class="row center">
        <div class="col s12 l4"></div>
        <div class="col s12 l4">
            <div class="container center">
            <?php if($pokemon) : ?>
                <div class="card">
                
                    <h6 class = "red-text"><?php echo htmlspecialchars($pokemon['Name']);?></h6>
                    <div class="card-image">
                    <img src= <?php echo htmlspecialchars("../" . $pokemon['Picture']);?> >
                    </div>
                    <div class="card-content">
                        <p><?php echo htmlspecialchars($pokemon['description']);?></p>
                        <p class = "blue-text"> <?php echo htmlspecialchars($pokemon['types']);?></p>
                        <?php if ($pokemon['level'] < 100){?>
                            <a class="red-text">
                                <?php echo htmlspecialchars("evolves at level " . $pokemon['level']);?>
                            </a>
                        <?php }?>
                        <?php if ($pokemon['level'] == 100){?>
                            <a class="red-text">
                                <?php echo htmlspecialchars("evolves by electric stone");?>
                            </a>
                        <?php }?>
                        <?php if ($pokemon['level'] == 200){?>
                            <a class="red-text">
                                <?php echo htmlspecialchars("evolves by moon stone");?>
                            </a>
                        <?php }?>
                        <?php if ($pokemon['level'] == 300){?>
                            <a class="red-text">
                                <?php echo htmlspecialchars("evolves by fire stone");?>
                            </a>
                        <?php }?>
                        <?php if ($pokemon['level'] == 400){?>
                            <a class="red-text">
                                <?php echo htmlspecialchars("evolves by leaf stone");?>
                            </a>
                        <?php }?>
                        <?php if ($pokemon['level'] == 500){?>
                            <a class="red-text">
                                <?php echo htmlspecialchars("evolves by water stone");?>
                            </a>
                        <?php }?>
                        
                        <p>Additional info here</p>
                        <!--Delete Form-->
                        <form action = "details.php" method = "POST">
                            <input type="hidden" name = "id_to_delete" value = "<?php echo $pokemon['id'] ?>">
                            <input type="submit" name = "delete" value = "delete" class = "btn red z-depth-0">
                        </form>
                    </div>
                </div>
        </div>
    </div>
   
        <?php else: ?>
            <h5>There is no such pokemon</h5>
        <?php endif ?>

    </div>
</body>
</html>