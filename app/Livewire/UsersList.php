<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UsersList extends Component
{


    public $search = '';

    public $users = [];

    public function mount()
    {

        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.users-list');
    }

    public function updatedSearch()
    {

        /*
        SELECT * FROM users WHERE name LIKE CONCAT(SUBSTRING_INDEX('Jose Ramon Palacios', ' ', 1), '%') OR lastname LIKE CONCAT(SUBSTRING_INDEX('Jose Ramon Palacios', ' ', -1), '%'); 
        */

        if($this->search == '')
        {
            $this->users = User::all();
            return;
        }


        //Si la busqueda tiene un espacio en blanco al final, entonces no se hace la busqueda

        if(substr($this->search, -1) == ' ')
        {
            return;
        }

        $sql = "SELECT * FROM users WHERE name LIKE CONCAT(SUBSTRING_INDEX('{$this->search}', ' ', 1), '%') OR lastname LIKE CONCAT(SUBSTRING_INDEX('{$this->search}', ' ', -1), '%');";

        $this->users = DB::select($sql);

    }
}
