<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Events\NuevoMensaje;

class ChatForm extends Component
{

    public $usuario;
    public $mensaje;


    private $faker;

    protected $updateQueryString = ['usuario'];

    protected $listeners = ['solicitaUsuario'];

    

    public function mount()
    {
        
        $this->faker = \Faker\Factory::create();
        
        $this->usuario = request()->query('usuario',$this->usuario) ?? $this->faker->name;

        $this->mensaje = $this->faker->realtext(20);

    }
    

    public function solicitaUsuario()
    {
        $this->emit('cambioUsuario', $this->usuario);
    }

    public function updateUsuario()
    {
        $this->emit('cambioUsuario', $this->usuario);
    }


    public function updated($field)
    {
        $validatedData = $this->validateOnly($field, [
            'usuario' => 'required',
            'mensaje' => 'required',
        ]);
    }
    



    public function enviarMensaje()
    {    

        $validateData = $this->validate([
            'usuario' => 'required',
            'mensaje' => 'required',
        ]);

        \App\Chat::create([
            "usuario" => $this->usuario,
            "mensaje" => $this->mensaje
        ]);
        //$this->emit("mensajeRecibido", $datos);

        event(new \App\Events\NuevoMensaje($this->usuario, $this->mensaje));

        $this->emit('enviadoOK', $this->mensaje);

        $this->faker = \Faker\Factory::create();
        $this->mensaje = $this->faker->realtext(20);

    }
    public function render()
    {
        return view('livewire.chat-form');
    }
}
