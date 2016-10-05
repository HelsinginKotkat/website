<?php

//funktio joka järjestää filu listan uusiks ja järkevämmin
//Lista -> [0] -> [name][type][tmp_name][erro][size] 
//	-> [1] -> ja samat kuin yllä
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}


$aihe = $_POST["form1"];
$viesti = $_POST["form2"];
$nimi = $_POST["nimi"];
$IBAN = $_POST["IBAN"];
$PVM = $_POST["pvm"];
$summa = $_POST["summa"]."€";
$tapahtuma = $_POST["tapahtuma"];
// kommentoitu testi tarkoituksessa, mutta luultavasti tämä koodin pätkä tulee muutenkin siirtymään tuonne alemmas tuon filulistan takia.
//$target_dir = "uploads/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filetype =
$aika = date("YmdHis");

$salasana = $_POST["passu"];
$oikea_salasana = "laskuja";
$uploadOk = 1;
//$email = $_POST["email"];
$kokeilua_oikein = md5($oikea_salasana);
$kokeilua = md5($salasana);

//filu listan käsittely, ottaa files listan html formista ja käy for:lla sen läpi
$filu_lista = reArrayFiles($_FILES['files']);
foreach ($filu_lista as $file) {
	echo 'File Name: ' . $file['name'];
	echo '<br>';
	echo ' File Type: ' . $file['type'];
	echo '<br><br>';
}

// yllä oleva filulista pitää implementoida tohon alle olevaan koodiin niin että kaikki lisätyt kuvat käsitellään.

if ($kokeilua_oikein == $kokeilua){
        echo "{$aihe}\n \n";
        echo "<br>";
        echo "{$viesti}\n";
        echo "<br>";
        // file_put_contents("{$aihe}{$aika}", "{$nimi}\n{$IBAN}\n{$viesti}\n");

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            $container = "{$nimi}\n{$IBAN}\n\n{$aihe}\n{$tapahtuma}\n{$viesti}\n{$PVM}\n{$summa}\n";
	    $asdeemi = "{$nimi}\n{$IBAN}\n\n{$aihe}\n{$viesti}\n{$PVM}\n{$summa}\n";
	    echo "{$asdeemi}\n";
            $command = 'echo "'.$container.'" | mutt -F /home/onni/.muttrc -s "'.$aihe.'" hallitus@heko.org ';  
            foreach ($filu_lista as $file){
		if(move_uploaded_file($file["tmp_name"], "uploads/" . basename($file['name']))) {
                    echo "The file ". basename( $file['name']). " has been uploaded.<br>";
                    $command .= '-a /var/www/html/laskut/uploads/' . basename($file['name']) . ' ';
             
/*                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    	    $container = "{$nimi}\n{$IBAN}\n{$viesti}\n";
		    $command = 'echo "'.$container.'" | mutt -F /home/onni/.muttrc  -s "'.$aihe.'" pyry.aaltonen@gmail.com -a /var/www/html/laskut/'.$target_file;
		    #echo "$command";
		    $uloste = shell_exec($command);
		    #echo "$uloste";	
		    //mailaus tahan
*/
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            
            }
            //echo "$command";
            $uloste = shell_exec($command);
            //echo "$uloste";
        }

} else{
        echo $salasana;
        echo $oikea_salasana;

        echo "salasana oikein ensin";
}

//echo "Mailia matkalla"
?>

