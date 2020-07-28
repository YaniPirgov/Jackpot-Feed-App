<?php
    require_once "manager.php";

    $manager = new funtionHandler();

    $database = $manager->getBCWaarde();

    $bcDatabase = $database->bc;

    $message= "De pot ligt nu op&nbsp;" . $bcDatabase . "BC!";

    if ($_POST) {
        $checkAnswer= $manager->getAntwoordByInput($_POST["antwoord"]);

        $correctAnswer= isset($checkAnswer);

        if ($correctAnswer) {
            $message= "Het antwoord is goed!&nbsp; Jij wint&nbsp;" . $bcDatabase . "BC!";

            $bcCount = 0;

            $manager->updateBCWaarde($bcCount);
        }else{
            $bcCount = $bcDatabase += 5;

            $message= "Het antwoord is fout!&nbsp; De pot ligt nu op&nbsp;" . $bcCount . "BC!";

            $manager->updateBCWaarde($bcCount);
        }
    }
?>
