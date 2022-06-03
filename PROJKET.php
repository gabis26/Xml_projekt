<?php

$KorisnickoIme="";
$Lozinka="";
$Kod="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$ans=$_POST;

	if (empty($ans["KorisnickoIme"]))  {
        	echo "Niste unijeli korisničko ime!";
		
    		}
	else if (empty($ans["Lozinka"]))  {
        	echo "Niste unijeli lozinku!";
		
    		}
	else {
		$KorisnickoIme= $ans["KorisnickoIme"];
		$Lozinka= $ans["Lozinka"];
	
		provjera($KorisnickoIme,$Lozinka);
	}
}


function provjera($KorisnickoIme, $Lozinka) {
	

	$xml=simplexml_load_file("projekt1.xml");
	

	foreach ($xml->Korisnik as $kor) {
  	 	$usrko = $kor->KorisnickoIme;
		$usrl = $kor->Lozinka;
		$usrime=$kor->Ime;
		$usrprezime=$kor->Prezime;
        $narud= $kor->Narudzba;
        $narkod= $kor->Narudzba['Sifra'];
        $slika=$kor->img['src'];
        $slikan=$kor->imge['src'];
        $narcij= $kor->cijena;
        
        
            


		if($usrko==$KorisnickoIme){
			if($usrl == $Lozinka){
                    
				echo "Dobro došli  $usrime $usrprezime!";
                echo "<br>"; 
                echo "<br>";  
                echo '<img src="'.$slika.'" height="100"; "width="100" ;>';
                echo "<br>";   
                echo"Profilna slika";
                echo "<br> <br> <br> <br>"; 
                echo"Informacije o Vašoj narudžbi: ";
                echo"<br> <br>";
                echo "Kod Vaše narudžbe je:  $narkod";
                    echo "<br>";
                    echo "Narucili ste:  $narud";
                    echo "<br>";
                    echo '<img src="'.$slikan.'" height="100"; "width="100" ;>';
                    echo "<br>";
                    echo "Cijena:  $narcij";
                return;
        }
        else{
            echo "Netočna lozinka";
            return;
            }
        }
    }
    
echo "Korisnik ne postoji.";
return;
}
?>

<html>
<head>
<title>Narudzba</title>

</head>
<body> 
<h1>Provjera narudžbe</h1>
<style>
body {background-color: lightgray;}
h1{text-align: center}
table{margin-left:auto;margin-right:600px;} 



</style>

<form action="" method="post">

<table>

<tr>
<td>
<label>Korisnicki racun :</label>
</td>
<td>
<input id="name" name="KorisnickoIme" type="text">
<td>
</tr>




<tr>
<td>
<label>Lozinka :</label>
</td>
<td>
<input id="password" name="Lozinka" placeholder="**********" type="password">
<td>
</tr>

<tr>
<td>
    <br>
<input style="text-align: center ;" name="submit" type="submit" value=" Login ">
</td>
<td>

</table>
</form>

</body>
</html>
