<!DOCTYPE html>
<html lang="ar">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        
        hr{
            color: blue;
        }
        h2{
        text-align: center;
        text-decoration: underline;
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
    </style>
</head>
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
           <h5>Nom Patient:{{$patient->nom_patient}}</h5>
           <h5>Prenom Patient:{{$patient->prenom_patient}}</h5>
           <h5>Cin Patient:{{$patient->cin}}</h5>
           <h5>Age Patient:{{$patient->age_patient}}</h5>
           <h5>Sexe Patient:{{$patient->sexe_patient}}</h5>
           <h5>Mutuelle Patient:{{$patient->mutuelle_patient}}</h5>
           <h5>Tel Patient:{{$patient->tel_patient}}</h5>
           <h5>Adresse Patient:{{$patient->adresse_patient}}</h5>
           <h5>Taille Patient:{{$patient->taille_patient}}cm</h5>
           <h5>Poids Patient:{{$patient->poids_patient}}kg</h5>
           <h5>Groupe Sanguin:{{$patient->groupesanguin}}</h5>
</body>
</html>
