<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Patient::select("nom_patient","prenom_patient","cin","age_patient","sexe_patient","mutuelle_patient","tel_patient","adresse_patient","taille_patient","poids_patient","groupesanguin")->orderBy('nom_patient','asc')->get();
      
    }
    public function headings():array
    {
        return ["Nom","Prenom","Cin","Age","Sexe","Mutuelle","Tel","Adresse","Taille","Poids","Groupe Sanguin"];
    }
}
