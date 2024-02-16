<style>
    #h4{
      color: #007bff;
      text-align:center;
    }
    .info{
      background-color: lightgray;
      padding: 10px;
    }
    .info p{
      padding-bottom: 10px;
    }
    </style>
    
    <div class="container">
      <div class="row mt-5">
    <h4 id="h4">  Les Informations De Controle</h4>
    <br>
              <p><strong> Motif De Controle:</strong> <span>{{$controle->motif_controle}} </span></p> 
              <p><strong> Diagnostic De Controle: </strong><span>{{$controle->diagnostic_controle}} </span></p> 
              @if(!empty($controle->commentaire_controle))
              <p> <strong>Commentaire De Controle:</strong> <span>{{$controle->commentaire_controle}} </span></p> 
              @endif  
              <br>
                @if(count($ordonnance)>0) 
                <h4 id="h4">L'ordonnance</h4>
                <div class="table-responsive">
                <table class="table">
                  <head>
                    <tr>
                    <th scope="col">Nom Medicament</th>
                    <th scope="col">Psologie Medicament</th>
                    <th scope="col">Quantite Medicament</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($ordonnance as $ordonnance)
                <tr>
             <td> {{$ordonnance->nom_medicament}} </td>
                <td>{{$ordonnance->posologie_medicament}}</td>
                  <td>{{$ordonnance->quantite_medicament}}</td>
    
                </tr>
              </tbody>
                   
              @empty   
              @endforelse
            </table>
                </div>
    
                @endif 
                <br>
                @if(count($analyses)>0) 
                <h4 id="h4">Les Analyses</h4>
                <div class="table-responsive">
                <table class="table">
                  <head>
                    <tr>
                    <th scope="col">Type Analyse</th>
                    <th scope="col">Resultat Analyse</th>
                    <th scope="col">Operations</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($analyses as $analyse)
                                <tr>
                                    <td>{{$analyse->type_analyse}} </td>
                  <td>{{$analyse->resultat_analyse}}</td>
                  <td><a class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#editanalyseModal{{$analyse->num_analyse }}"> modifier</a>
                  </td>
                                </tr>
                </tbody>
                   
                @empty   
                @endforelse
              </table>
                </div>
                @endif 
    
                <br>
                @if(count($radiologies)>0) 
                <h4 id="h4">Les Radiologies</h4>
                 <div class="table-responsive">
                <table class="table">
                  <head>
                    <tr>
                    <th scope="col">Type Radiologie</th>
                    <th scope="col">Resultat Radiologie</th>
                    <th scope="col">Operations</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($radiologies as $radiologie)
                                <tr>
                                    <td>{{$radiologie->type_radiologie}} </td>
                  <td>{{$radiologie->resultat_radiologie}}</td>
                  <td><a class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#editradiologieModal{{$radiologie->num_radiologie }}"> modifier</a>
                  </td>
                                </tr>
                </tbody>
                   
                @empty   
                @endforelse
              </table>
                 </div>
                @endif 
                @if(!empty($certificatinit))
                <h4 id="h4">  Les Informations De Certificat Initiale </h4>
                <br>
                          <p><strong> Date Debut:</strong> <span>{{Carbon\Carbon::parse($certificatinit->date_debut)->format('d-m-Y')}} </span></p> 
                          <p><strong> Date Fin: </strong><span>{{Carbon\Carbon::parse($certificatinit->date_fin)->format('d-m-Y')}} </span></p> 
                          <p><strong> Nbr Jour: </strong><span>{{$certificatinit->nbrjour_certificat}} </span></p> 
                                <br>
                      @endif 
                      
                      @if(!empty($certificatpro))
                <h4 id="h4">  Les Informations De Certificat Prolongation</h4>
                <br>
                          <p><strong>Date Debut:</strong> <span>{{Carbon\Carbon::parse($certificatpro->date_debut)->format('d-m-Y')}}</span></p> 
                          <p><strong>Date Fin: </strong><span>{{Carbon\Carbon::parse($certificatpro->date_fin)->format('d-m-Y')}}</span></p> 
                          <p><strong>Nbr Jour: </strong><span>{{$certificatpro->nbrjour_certificat}}</span></p> 
                            <br>
                      @endif  
              </div>
      </div></div>
              <!--modifier analyse-->
@foreach($analyses as $analyse)
<!-- Boîte de dialogue de modification -->
<div class="modal fade" id="editanalyseModal{{$analyse->num_analyse }}" tabindex="-1" aria-labelledby="editModalLabel{{ $analyse->num_analyse }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire de modification -->
                <form action="{{ route('analyse.update', $analyse) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nom">Type Analyse :</label>
                        <input type="text" name="type_analyse" id="type_analyse" value="{{ $analyse->type_analyse }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="adresse">Resultat :</label>
                    <textarea  name="resultat_analyse" id="resultat_analyse" class="form-control" rows="3">{{ $analyse->resultat_analyse}}</textarea>
                      </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- modifier radiologie-->
@foreach($radiologies as $radiologie)
<!-- Boîte de dialogue de modification -->
<div class="modal fade" id="editradiologieModal{{$radiologie->num_radiologie }}" tabindex="-1" aria-labelledby="editModalLabel{{ $radiologie->num_radiologie }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire de modification -->
                <form action="{{ route('radiologie.update', $radiologie) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nom">Type Radiologie :</label>
                        <input type="text" name="type_radiologie" id="type_radiologie" value="{{ $radiologie->type_radiologie }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="adresse">Resultat :</label>
                    <textarea name="resultat_radiologie" id="resultat_radiologie" rows="3" class="form-control">{{ $radiologie->resultat_radiologie}}</textarea>
                      </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach