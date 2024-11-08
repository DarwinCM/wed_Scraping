<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class TableSettingForm extends Form
{
    public $id;
    public $nombre;
    public $descrip;
    public $body;
    public $fecha;
    public $image;

    protected function rules()
    {
        return [

            'nombre' => 'required|min:2',
            'descrip' => 'required|min:2',
            'body' => 'required|min:5',
            'fecha' => 'required',
            'image' => 'required',
        ];
    }

    public function resetFields()
    {
        $this->id = null;
        $this->nombre = null;
        $this->descrip = null;
        $this->body = null;
        $this->fecha = null;
        $this->image = null;

    }
}
