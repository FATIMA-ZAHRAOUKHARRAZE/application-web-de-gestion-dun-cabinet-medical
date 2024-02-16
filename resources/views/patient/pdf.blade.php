<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
         hr{
        color: #0069d9;
    }
h2{
        text-align: center;
        text-decoration: underline;
    }
        table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        }
        th, td {
        padding: 5px;
        text-align: center;
        }
        th {
        background-color: #f2f2f2;
        font-weight: bold;
        }
        tr:hover {
        background-color: #ddd;
        }

        td {
        border: 1px solid #ddd;
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
            <table>
            <head>
          <tr>
         
            <th scope="col">Nom </th>
            <th scope="col">Prenom </th>
            <th scope="col">Cin</th>
            <th scope="col">Age </th>
            <th scope="col">Sexe </th>
            <th scope="col">Mutuelle</th>
            <th scope="col">Tel</th>
            <th scope="col">Adresse</th>
            <th scope="col">Taille</th>
            <th scope="col">Poids</th>
            <th scope="col">Groupe Sanguin</th>
          </tr>  
        </thead>
        <tbody>
            @forelse ($patient as $patient)
                        <tr>
                            
                            <td>
                                {{$patient->nom_patient}}
                            </td>
                            
                            <td>
                                {{$patient->prenom_patient}}
                            </td>
                            <td>{{$patient->cin}}
                            </td>
                            <td>
                                {{$patient->age_patient}}
                            </td>
                            <td>
                                {{$patient->sexe_patient}}
                            </td>
                            
                            <td>
                                {{$patient->mutuelle_patient}}
                            </td>
                            
                            <td>
                                {{$patient->tel_patient}}
                            </td>
                            
                            <td>
                                {{$patient->adresse_patient}}
                            </td>
                            
                            <td>
                                {{$patient->taille_patient}}
                            </td>
                            
                            <td>
                                {{$patient->poids_patient}}
                            </td>
                            <td>
                                {{$patient->groupesanguin}}
                            </td>     
                            @empty   
                            @endforelse 
                        </tr>
                    </tbody>
                  </table>
             </div>     
</body>
</html>
