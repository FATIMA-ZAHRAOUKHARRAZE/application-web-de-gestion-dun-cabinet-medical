<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Rendezvou;
use Maatwebsite\Excel\Concerns\FromCollection;

class RendezvousExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rendezvou::join('patients','rendezvous.num_patient','=','patients.num_patient')->orderBy('date_rendezvous','desc')->get(['patients.nom_patient','patients.prenom_patient','rendezvous.date_rendezvous','rendezvous.type_rendezvous','rendezvous.commentaire_rendezvous']);
    }
    public function headings():array
    {
        return ["Nom","Prenom","Date","Type","Commentaire"];
    }
}
