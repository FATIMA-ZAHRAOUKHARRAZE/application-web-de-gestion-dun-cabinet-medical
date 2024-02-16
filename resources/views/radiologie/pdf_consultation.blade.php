<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
  hr{
        color: #0069d9;
    }
h2{
        text-align: center;
        text-decoration: underline;
    }
body{
        margin: 0;
        padding: 0;
        height: 100%;
    }
#div1{
    display: flex;
      align-items: center;
    color:#0069d9;
    position: relative;
}
#div1 h3{
    color:#0069d9;
    text-align: center;
    margin: 0;
}
#div1 p{
    text-align: center;
    margin: 0;
}
#div1 img{
    width: 100px;
    position: absolute;
      top: 0;
      left: 0;
      height: auto;
}
.img{
    position: absolute;
      top: 0;
      left: 0;
      height: auto;
    width: 100px;
    margin-left: 600px;
}
#contenu{
    margin-top: 25%;
}
.cachet
{
    text-align: right;
    margin-top: 100px;
}
footer{
    color: #0069d9;
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
}  
</style>

<body>
    <div id="div1">
        <h3>DOCTEUR CHATTI KAWTAR </h3>
        <p>  Médecine Généraliste</p>
        <p>  Diplomée de la faculté de Médecine de Rabat </p>
        <p>Diplomée Universitaire en gynecologie Médicale</p>
        <p> Infertilité  du couple et suivi de grossesse </p>
        <p>Université de bordeux-France </p>
        <p>  Diplomée en Diabétologie de l'université Paris 13-France </p>
        <img src="img/master.png"  class="img-fluid">
        <img src="img/master.png"  class="img-fluid" class="img">  
    </div>
    <hr>
<br>
            <h2>{{$titre}}</h2>
            <br>
            <p style="text-align:right">Fait à :SIDI ALLAL BAHRAOUI Le: {{Carbon\Carbon::parse($consultation->date_consultation)->format('d-m-Y')}}</p>
          <br>
            <h4 style="text-align: center">Nom&Prénom:<span>
                {{$consultation->nom_patient}}</span><span> {{$consultation->prenom_patient}} </span></h4>
<div id="contenu">
            @forelse ($radiologie as $radiologie)
           <h4>{{$radiologie->type_radiologie}}</h4> 
                  
                            @empty   
                            @endforelse 
</div>     
<p class="cachet"> Cachet du médecin</p>
<footer >Hay Nahda N114,SIDI ALLAL ALBAHRAOUI -Tel:05 37 52 08 67 Email:dr.chattikawtar@gmail.com</footer>
</body>
</html>