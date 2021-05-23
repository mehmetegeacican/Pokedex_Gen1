<?php


    //INCLUDE DB
    include('../config/db_connec.php');

    $types = $name = $desc = $pic = '';
    $level = 0;
    $errors = array('pokemon_name' => '', 'pokemon_type' => '','pokemon_desc' => '','pokemon_pic' => '','pokemon_level' => '');


    if(isset($_POST['submit'])){
        //htmlspecialchars is used for xss attacks
        //echo htmlspecialchars($_POST['pokemon_name'] . " ");
        //echo htmlspecialchars($_POST['pokemon_type'] . " ");
        //check
        if(empty($_POST['pokemon_name'])){
            $errors['pokemon_name'] =  'pokemon name is required <br/>';
        }
        else{
            //echo htmlspecialchars($_POST['pokemon_name'] . '');
            $name = $_POST['pokemon_name'];
        }

        if(empty($_POST['pokemon_type'])){
            $errors['pokemon_type'] = 'pokemon type is required <br/>';
        }
        else{
            $types = $_POST['pokemon_type'];
            //echo htmlspecialchars($_POST['pokemon_type'] . "");
        }

        if(empty($_POST['pokemon_level'])){
            //$errors['pokemon_level'] = "Please Enter A valid level(if it is a starter form, please let it stay at zero)";
        }
        else{
            $level =  $_POST['pokemon_level'];
        }

        if(empty($_POST['pokemon_desc'])){
            $errors['pokemon_desc'] = "Please Enter A valid Description";
        }
        else{
            $desc = $_POST['pokemon_desc'];
        }

        if(empty($_POST['pokemon_pic'])){
            $errors['pokemon_pic'] = "Please Enter A valid Picture";
        }
        else{
            $pic = $_POST['pokemon_pic'];
            $pic_name = substr($pic,0,-4);
            $pic_tmp = substr($pic,-4);
            echo 'NAME '.$pic_name;
            echo 'TMP '.$pic_tmp;


            if(isset($pic_name)){
                if(!empty($pic_name)){
                    $location = "assets/";
                    move_uploaded_file($pic_name,$location.$pic);
                }
            }
        }


        //Check
        if(array_filter($errors)){
            //echo 'There are errors in the form';
        }
        else{
            //echo 'form is valid';
            //echo $name . " ";
            //echo $types. " ";
            //echo $desc . "-";
            //echo $pic . "-";
            //******SAVING TO DATABASE*******
            //PROTECTION FOR SQL INJECTION
            $name = mysqli_real_escape_string($connect, $_POST['pokemon_name']);
            $types = mysqli_real_escape_string($connect, $_POST['pokemon_type']);
            $level = mysqli_real_escape_string($connect, $_POST['pokemon_level']);
            $desc = mysqli_real_escape_string($connect, $_POST['pokemon_desc']);
            $pic = mysqli_real_escape_string($connect, "assets/" . $_POST['pokemon_pic']);

            //INSERT
            $sql = "INSERT INTO pokemons(name,level,types,description,picture) VALUES
            (
                '$name',
                '$level',
                '$types',
                '$desc',
                '$pic'
            )";
           

            //SAVE TO DB AND CHECK
            if(mysqli_query($connect,$sql)){
                //success
                header('Location: /pokedex_gen1/');
                exit();
            }
            else{
                echo 'QUERY ERROR::::::' .mysqli_error($connect); 
            }



            
        }
        //REDIRECT
        //header('Location: '.$uri.'/pokedex_gen1/');
        //
    }
    

?>



<!DOCTYPE html>

    <head>
        <title>Add New Pokemon</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       

    </head>

<html>
        
        <?php include('../components/navbar.php'); ?> 

        <section class = "container">
            <h4 class="center blue-text">Add a new Pokemon</h4>
            <form action="add_pokemon.php" class = "white" method = "POST">
                <label>Pokemon Name:</label>
                <input type="text" name = "pokemon_name" value = "<?php echo $name ?>" >
                <div class="red-text"><?php echo $errors['pokemon_name'] ?></div>

                <label>Pokemon Evolution Level:</label>
                <input type="text" name = "pokemon_level" value = "<?php echo $level ?>" >
                <div class="red-text"><?php echo $errors['pokemon_level'] ?></div>

                <label>Pokemon types:</label>
                <input type="text" name = "pokemon_type" value = "<?php echo $types ?>">
                <div class="red-text"><?php echo $errors['pokemon_type'] ?></div>

                <label>Pokemon description:</label>
                <input type="text" name = "pokemon_desc" value = "<?php echo $desc ?>" >
                <div class="red-text"><?php echo $errors['pokemon_desc'] ?></div>

                <div class="file-field input-field">
                    <div class="btn red">
                        <span>Picture</span>
                        <input type="file" value = "<?php echo $pic; ?>">
                    </div>
                    <div class="file-path-wrapper">
                        <input name = "pokemon_pic" class="file-path validate" type="text">
                        <div class="red-text"><?php echo $errors['pokemon_pic'] ?></div>
                    </div>
                </div>

                <div class="center">
                <input type="submit" name = "submit" value = "submit" class = "btn red z-depth-0" >
                </div>
            </form>
        </section>

</html>