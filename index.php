
<?php
    //MySQL
    include('config/db_connec.php');
    //write query 
    $sql = 'SELECT * FROM pokemons ORDER BY id';
    //make query & get result
    $res = mysqli_query($connect,$sql);
    //fetch resulting rows as an array
    $pokemons = mysqli_fetch_all($res,MYSQLI_ASSOC);

    //free the result from memory
    mysqli_free_result($res);
    //close connection to database
    mysqli_close($connect);

    //print_r($pokemons);
    //print_r(explode(',', $pokemons[2]['types']));


?>


<html>
    <head>
        <title>Pokedex</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>

    <body>
        <?php include('components/navbar.php') ?>
        <br>
        <br>

        <div class="container center">
            <?php include("components/cards.php") ?>
        </div>

        <!--REMAINING CARDS---->
        <div class="container center">
            <div class="row">
                <div class="container">
                    <?php foreach($pokemons as $pokemon) {?>
                        <div class="col s6 m4">
                            <div class="card">

                                <div class="card-image">
                                    <img src= <?php echo htmlspecialchars($pokemon['Picture']);?>>
                                    <?php if ($pokemon['level'] < 100){?>
                                        <a class="btn-floating halfway-fab waves-effect waves-light red pulse"><?php echo htmlspecialchars($pokemon['level']);?></i></a>
                                    <?php } elseif($pokemon['level'] == 100){?>
                                        <a class="btn-floating halfway-fab waves-effect waves-light yellow darken-1 pulse"><?php echo htmlspecialchars("E.Stone");?></i></a>
                                    <?php }?>
                                    <?php if ($pokemon['level'] == 200){?>
                                        <a class="btn-floating halfway-fab waves-effect waves-light grey darken-1 pulse"><?php echo htmlspecialchars("M.Stone");?></i></a>
                                    <?php }?>
                                    <?php if ($pokemon['level'] == 300){?>
                                        <a class="btn-floating halfway-fab waves-effect waves-light orange darken-1 pulse"><?php echo htmlspecialchars("F.Stone");?></i></a>
                                    <?php }?>
                                    <?php if ($pokemon['level'] == 400){?>
                                        <a class="btn-floating halfway-fab waves-effect waves-light green darken-2 pulse"><?php echo htmlspecialchars("L.Stone");?></i></a>
                                    <?php }?>
                                    <?php if ($pokemon['level'] == 500){?>
                                        <a class="btn-floating halfway-fab waves-effect waves-light blue darken-2 pulse"><?php echo htmlspecialchars("W.Stone");?></i></a>
                                    <?php }?>
                                    <?php if ($pokemon['level'] == 600){?>
                                        <a class="btn-floating halfway-fab waves-effect waves-light grey lighten-2 pulse"><?php echo htmlspecialchars("Trade");?></i></a>
                                    <?php }?>

                                         
                                    
                                </div>

                                <div class="card-content">
                                    <h6 class = "red-text">
                                        <?php echo htmlspecialchars($pokemon['id'] . ". " . $pokemon['Name']); ?>
                                    </h6>
                                    <p><?php echo htmlspecialchars($pokemon['description']) ?> </p>

                                    <?php if ($pokemon['types'] == "Grass"){?>
                                        <div class="chip green white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Fire"){?>
                                        <div class="chip orange white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Water"){ ?>
                                        <div class="chip blue white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Flying"){ ?>
                                        <div class="chip blue lighten-2 white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Normal"){ ?>
                                        <div class="chip deep-orange lighten-4 white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Electric"){ ?>
                                        <div class="chip yellow darken-1 white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Poison"){ ?>
                                        <div class="chip purple white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Bug"){ ?>
                                        <div class="chip green darken-3 white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Ground"){ ?>
                                        <div class="chip lime darken-3 white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Psychic"){ ?>
                                        <div class="chip pink white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Fighting"){ ?>
                                        <div class="chip red darken-3 white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Rock"){ ?>
                                        <div class="chip lime darken-4 white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Ghost"){ ?>
                                        <div class="chip purple darken-3 white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Ice"){ ?>
                                        <div class="chip blue lighten-4 white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Dragon"){ ?>
                                        <div class="chip indigo white-text"> <?php echo htmlspecialchars($pokemon['types']) ?> </div>
                                        </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Fire,Flying"){ ?>
                                        <?php $arr_type = explode(',', $pokemon['types']);?>
                                        <a class="chip orange white-text"> <?php echo htmlspecialchars($arr_type[0]) ?> </a>
                                        <a class = "chip blue lighten-2 white-text"> <?php echo htmlspecialchars($arr_type[1]) ?></a>
                                    </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Grass,Poison"){ ?>
                                        <?php $arr_type = explode(',', $pokemon['types']);?>
                                        <a class="chip green white-text"> <?php echo htmlspecialchars($arr_type[0]) ?> </a>
                                        <a class = "chip purple white-text"> <?php echo htmlspecialchars($arr_type[1]) ?></a>
                                    </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Normal,Flying"){ ?>
                                        <?php $arr_type = explode(',', $pokemon['types']);?>
                                        <a class="chip deep-orange lighten-4 white-text"> <?php echo htmlspecialchars($arr_type[0]) ?> </a>
                                        <a class = "chip blue lighten-2 white-text"> <?php echo htmlspecialchars($arr_type[1]) ?></a>
                                    </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Bug,Flying" && $pokemon['types'] != "Bug"){ ?>
                                        <?php $arr_type = explode(',', $pokemon['types']);?>
                                        <a class="chip green darken-3 white-text"> <?php echo htmlspecialchars($arr_type[0]) ?> </a>
                                        <a class = "chip blue lighten-2 white-text"> <?php echo htmlspecialchars($arr_type[1]) ?></a>
                                    </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Bug,Poison" && $pokemon['types'] != "Bug"){ ?>
                                        <?php $arr_type = explode(',', $pokemon['types']);?>
                                        <a class="chip green darken-3 white-text"> <?php echo htmlspecialchars($arr_type[0]) ?> </a>
                                        <a class = "chip purple white-text"> <?php echo htmlspecialchars($arr_type[1]) ?></a>
                                    </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Bug,Grass" && $pokemon['types'] != "Bug"){ ?>
                                        <?php $arr_type = explode(',', $pokemon['types']);?>
                                        <a class="chip green darken-3 white-text"> <?php echo htmlspecialchars($arr_type[0]) ?> </a>
                                        <a class = "chip green white-text"> <?php echo htmlspecialchars($arr_type[1]) ?></a>
                                    </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Poison,Ground" && $pokemon['types'] != "Poison"){ ?>
                                        <?php $arr_type = explode(',', $pokemon['types']);?>
                                        <a class="chip purple white-text"> <?php echo htmlspecialchars($arr_type[0]) ?> </a>
                                        <a class = "chip lime darken-3 white-text"> <?php echo htmlspecialchars($arr_type[1]) ?></a>
                                    </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Poison,Flying" && $pokemon['types'] != "Poison"){ ?>
                                        <?php $arr_type = explode(',', $pokemon['types']);?>
                                        <a class="chip purple white-text"> <?php echo htmlspecialchars($arr_type[0]) ?> </a>
                                        <a class = "chip blue lighten-2 white-text"> <?php echo htmlspecialchars($arr_type[1]) ?></a>
                                    </div>
                                    <?php }?>
                                    <?php if ($pokemon['types'] == "Water,Fighting" && $pokemon['types'] != "Water"){ ?>
                                        <?php $arr_type = explode(',', $pokemon['types']);?>
                                        <a class="chip blue white-text"> <?php echo htmlspecialchars($arr_type[0]) ?> </a>
                                        <a class = "chip red darken-3 white-text"> <?php echo htmlspecialchars($arr_type[1]) ?></a>
                                    </div>
                                    <?php }?>

                                    <div class="card-action ">
                                        <a href="components/details.php?id=<?php echo $pokemon['id']?>" class = "blue-text">Info</a>
                               
                                    </div>

                                </div>
                               
                            </div>
                    <?php }?> 
                </div>
            </div>
        </div>


        
    </body>

</html>