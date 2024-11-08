<?php

namespace App\Livewire;

use App\Livewire\Forms\TableSettingForm;
use App\Models\TableSetting;
use Livewire\Component;
use Livewire\WithPagination;


class Seting extends Component
{

    use WithPagination;

    public $isOpen = false;
    public $showTableSetting = false;
    public $isOpenDelete = false;
    public $search, $tableSetting;
    public $itemId, $tableSettingId;
    public $tableSettingState;
    public TableSettingForm $form;
    protected $listeners = ['render', 'delete'];

    public function render()
    {
        // Cambia 10 por el número de registros que deseas mostrar por página
        $tableSettings = TableSetting::paginate(10);
        return view('livewire.seting', compact('tableSettings'));
    }

    public function create()
    {
        $this->closeModals();
        $this->resetForm();
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate();

        $tableSettingData = $this->form->toArray();

        if ($this->tableSettingId) {
            $tableSetting = TableSetting::find($this->tableSettingId);
            $tableSetting->update($tableSettingData);
            // toastr()->success('Configuración actualizada correctamente', 'Mensaje de éxito')->push();
        } else {
            TableSetting::create($tableSettingData);
            // toastr()->success('Configuración creada correctamente', 'Mensaje de éxito')->push();
        }

        $this->form->resetFields();
        $this->reset('isOpen', 'tableSettingId');
    }

    public function edit(TableSetting $tableSetting)
    {
        $this->closeModals(); // Cierra cualquier modal abierto previamente
        $this->form->fill($tableSetting->toArray()); // Llena el formulario con los datos del registro existente
        $this->tableSettingId = $tableSetting->id; // Establece el ID del registro que se está editando
        $this->isOpen = true; // Abre el modal de edición
    }



    public function deleteItem($id)
    {
        $this->itemId = $id;
        $this->isOpenDelete = true;
    }

    public function delete()
    {
        if ($this->itemId) {
            TableSetting::find($this->itemId)?->delete();
            // toast()->success('Eliminado correctamente', 'Mensaje de éxito')->push();
        }
        $this->reset('isOpenDelete', 'itemId');
    }

    private function resetForm()
    {
        $this->form->resetFields();
        $this->reset('tableSettingId');
        $this->resetValidation();
    }

    public function closeModals()
    {
        $this->isOpen = false;
        $this->showTableSetting = false;
        $this->isOpenDelete = false;
    }

}
