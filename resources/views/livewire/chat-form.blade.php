@extends('layouts.app')

    
<div class="text-success">
    <div class="form-group col-md-3">
        <div class="font-weight-bolder">
            <label for="usuario" class="p-1" >Usuario</label>
        </div>
        <input type="text" class="form-control bg-dark text-success" id="usuario" wire:model='usuario'>
        @error("usuario")
            <small class="text-danger">{{$message}}</small>
        @else
            <small class="text-muted">Tu nombre: {{$usuario}}</small>
        @enderror
    </div>

     <div class="form-group col-md-3" >
        <div class="font-weight-bolder">
            <label for="mensaje" class="p-1" >Message</label>
        </div>
        <input type="text" class="form-control bg-dark text-success" id="mensaje" wire:model='mensaje'>
        @error("mensaje")
            <small class="text-danger">{{$message}}</small>
        @else
                <small class="text-muted">Escribe tu mensaje y teclea<code>ENTER</code>para enviarlo</small>    
        @enderror

    </div>

    <div wire:offline class="alert alert-danger text-center">
        <strong>Se ha perdido la conexion de Internet</strong>
    </div>
   
    <div class="row">
        <div class="col-6">
                
            <div style="position: absolute;"
            class="alert alert-success collapse"
            role="alert"
            id="avisosSuccess"
            >Se ha enviado
            </div>
        </div> 

        <div class="col-6 pt-2 text-right">
            <button
            class="btn btn-primary"
            wire:click="enviarMensaje"
            wire:loading.attr="disabled"
            wire:offline.attr="disabled"
            >Enviar Mensaje
            </button>
        </div>
    </div> 

    <script>
        
        $(document).ready(function() {
            window.livewire.on('enviadoOK', function(){
                $('#avisoSuccess').fadeIn('slow');
                setTimeout(function(){ $("#avisoSuccess").fadeOut('slow'); }, 3000);
            });
        });
        
    </script>
</div>

