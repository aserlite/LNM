<style>

*{
    background: #0D0F2C;
    margin:-1px;
    color:#fefadd;
    font-family: "Helvetica Neue",Helvetica,Arial;
}
body{
    padding:50px;
    text-align:center;
}
.infos{
    margin-bottom:150px;
    font-size:3em;
}
img{
   width:70%; 

}

.billetfooter{
    margin-top:150px;
    font-size:1.25em;
    text-align:center;
}

.billetwarn{
    font-size:.5em;
    font-style: italic;
}
</style>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>test</title>
        
    </head>
    <body>
    <div class="infos"> 
            
            <span class="prenom"> {{$prenom}}</span>
            <span class="nom"> {{$nom}}</span><br/>
            <p class="billetwarn"> Billet Nominatif </p>
        </div>
    <img src="data:image/svg+xml;base64,{{$qrcode}}"/>
        
        <div class="billetfooter">
           <p> 5 Janvier 2023 - 18h/23h</p><br/>
           IUT de Lens <br/>- <br/>Universite d'Artois, l'université SP, 16 Rue de l'Université, 62307 Lens
        </div>
    </body>
</html>