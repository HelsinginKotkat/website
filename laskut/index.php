<!DOCTYPE html>
<html>
  	<head>
        	<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Tilitys</title>
		<link rel="stylesheet" href="mobile.css" type="text/css" />
  	</head>
  	<body>
        	<p><h2>Helsingin Kotkien sähköinen tilitysjärjestelmä</h2><p>
    		<form action="submit.php" method="post" enctype="multipart/form-data" accept-charset="utf-8"> 
		<label for="nimi">Tilittäjän nimi:</label>
		<input type="text" name="nimi" required="required"> <br>
		<label for="tapahtuma">Tapahtuman nimi:</label>
                <input type="text" name="tapahtuma" required="required"> <br>
		<label for="pvm">Tapahtuman päivämäärä:</label>
		<input type="date" name="pvm"><br>
      		<!--
		<label for="form2">Lisätietoja:</label> 
		<input type="text" name="form2" required="required"> <br>
		-->
		<label for="form1">Aihe:</label> 
		<!--
		<input type="text" name="form1" required="required"> <br>
		-->
		<select name="form1">
		<option value="error" selected> Valitse yksi
		<option value="Harrastus- ja ohjelmatoiminta - Partiomerkit"> Partiomerkit
		<option value="Harrastus- ja ohjelmatoiminta - Kurssi- tai osallistumismaksu"> Kurssi- tai osallistumismaksu
		<option value="Harrastus- ja ohjelmatoiminta - Johtajahuolto"> Johtajahuolto
		<option value="Harrastus- ja ohjelmatoiminta - Askartelu- tai muu kokousmateriaali"> Askartelu- tai muu kokousmateriaali
		<option value="Harrastus- ja ohjelmatoiminta - Muu harrastus- tai ohjelmatoimintakulu"> Muu harrastus- tai ohjelmatoimintakulu
		<option value="Leiri- ja retkitoiminta - Retken muonituskulu"> Retken muonituskulu
		<option value="Leiri- ja retkitoiminta - Retken matka- tai kuljetuskulu"> Retken matka- tai kuljetuskulu
		<option value="Leiri- ja retkitoiminta - Retken majoituskulu"> Retken majoituskulu
		<option value="Leiri- ja retkitoiminta - Leirin muonituskulu"> Leirin muonituskulu
		<option value="Leiri- ja retkitoiminta - Leirin matka- tai kuljetuskulu"> Leirin matka- tai kuljetuskulu
		<option value="Leiri- ja retkitoiminta - Leirin majoituskulu"> Leirin majoituskulu
		<option value="Leiri- ja retkitoiminta - Muu retki- tai leirikulu"> Muu retki- tai leirikulu
		<option value="Muut kulut - Toimisto- tai kokouskulu"> Toimisto- tai kokouskulu
		<option value="Muut kulut - Postitus- tai monistuskulu"> Postitus- tai monistuskulu
		<option value="Muut kulut - Internet- tai ATK-kulu"> Internet- tai ATK-kulu
		<option value="Muut kulut - Varainhankintakulu"> Varainhankintakulu
		<option value="Muut kulut - Willan kunnossapito"> Willan kunnossapito
		<option value="Muut kulut - Kyöpelin kunnossapito"> Kyöpelin kunnossapito
		<option value="Muut kulut - Muu"> Muu. Täsmennä alla!
		</select><br>
		
                <label for="form2">Lisätietoja:</label>             
                <input type="text" name="form2" required="required"> <br>


		<label for="summa">Summa:</label>
		<input type="number" name="summa" step="any" /><br>
      		<div id="uploadField">
      		<label for="files[]">Kuva 1. laskusta (jpg tai pdf):</label>
		<input type="file" multiple="multiple" name="files[]"> <br>
      		</div>
		<input type="button" value="Lisää toinen kuitti" onClick="addField('uploadField');"><!--Lisää toinen kuitti</button>--><br />
		<label for="IBAN">IBAN:</label>
                <input type="text" name="IBAN" required="required"> <br>
      		<label for="passu">Salasana:</label> 
		<input type="password" name="passu" required="required"> <br>
      		<input type="submit" value="Lähetä"><!--Lähetä</button>-->
    		</form>
  	</body>
</html>
<script>
var laskuri = 1;
var limit = 5;
function addField(divName) {
		if(laskuri == limit){
			<!--dont do anything-->
		} else {
			var newdiv = document.createElement('div');
			newdiv.innerHTML = "Kuva " + (laskuri + 1) + ". laskusta (jpg tai pdf): <input type='file'i multiple='multiple' name='files[]'> <br />";
			document.getElementById(divName).appendChild(newdiv);
			laskuri++; 
		}
}
</script>

