<?php

namespace App\Livewire;

use App\Models\TableSetting;
use Livewire\Component;

class SetingPag extends Component
{
    public function render()
    {
         // Cambia 10 por el número de registros que deseas mostrar por página
         $tableSettings = TableSetting::paginate(10);
        return view('livewire.seting-pag',compact('tableSettings'));
    }
}
