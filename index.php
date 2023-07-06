<!-- Esercizio di oggi: :php: PHP Strong Password Generator :chiave:
Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure. L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.


Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente. Scriviamo tutto (logica e layout) in un unico file index.php


Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale

BONUS 1 : Milestone 3
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.

BONUS 2: Milestone 4
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme). Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali. -->
<?php
    if ( isset($_GET['pswLenght'])){

    }
    function getRandomPassword ($passwordLenght){
        $caracters = 'qwertyuiopasdfghjklzxcvbnm';
        $numbers = '1234567890';
        $symbols = '!£$%&/@#*<>-_()[]{}:;"';
        
        $actualCharaters = strtoupper($caracters). $caracters. $numbers. $symbols;
        $newPassword = '';
        if($passwordLenght >= 6 && $passwordLenght <= 30 ){

            while(strlen($newPassword)< $passwordLenght){
                $randomIndex = rand(0, strlen($actualCharaters) - 1);
                $newPassword .= $actualCharaters[$randomIndex];
            }
            return $newPassword;
        } else {
            return false;
        }


        return $actualCharaters;
    }
    // var_dump (getRandomPassword($_GET['pswLenght']));
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <title>Stong PSW</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">
                        Password Generetor
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form class="row" action="" method="GET">
                        <div class="col-6 text-center">
                            <label class="form-label" for="pswLen">Lunghezza password:</label>
                        </div>
                        <div class="col-6">
                            <input class="form-control" type="number" name="pswLenght" id="pswLenght">                            
                        </div>
                    </form>
                </div>
                <div class="col-12 text-center">
                    <button class='btn btn-primary' type="submit">Invia</button>
                    <button class='btn btn-secondary' type="submit">Reset</button>
                </div>
                <div class="col-12 text-center">
                    <?php
                        echo getRandomPassword($_GET['pswLenght']);
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>