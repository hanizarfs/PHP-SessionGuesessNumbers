<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Guset Number PHP</title>

    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header p-5">
                <h1 class="text-center">Guesess The Number</h1>
                <form action="index.php" method="POST">
                    <label for="numInput" class="form-label">Angka tebakanmu</label><br>
                    <input type="num" name="numInput" class="form-control"><br>
                    <input type="submit" value="Submit" class="btn btn-primary float-end" name="submit">
                    <input type="submit" value="Clue" class="btn btn-warning float-end text-light px-4 mx-3" name="clue">
                </form>
            </div>
            <div class="card-body p-5">
                <?php
                    if(isset($_POST["submit"])) {
                        if(!isset($_SESSION["rand"])) $_SESSION["rand"] = rand(1,100);
                        if($_POST['numInput'] == $_SESSION["rand"]){
                            echo "Hooray, you guessed right";
                            $_SESSION["rand"];
                            session_destroy();
                            exit();
                        }
                        else if($_POST['numInput'] > $_SESSION["rand"]) {
                            echo "Your guess is too big";
                        }
                        else {
                            echo "Your guess is too small";
                        }
                    }

                    if(isset($_POST['clue'])) {
                        if($_SESSION['rand'] % 2 == 0) {
                            echo "I am an even number";
                        } else {
                            echo "I am an odd number";
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP BUNDLE JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>