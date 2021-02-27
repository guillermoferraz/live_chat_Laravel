<div>
    <h5 class="mt-3"><strong>Message list</strong></h5>
    @foreach($mensajes as $mensaje)
        
        
            <div>
                
                @if($mensaje["recibido"])
                    <div class="alert alert-warning" style="margin-right:50px;">
                        <strong>{{$mensaje["usuario"]}}</strong><small class="float-right">{{$mensaje["fecha"]}}</small>
                        <br><span class="text-muted">{{$mensaje["mensaje"]}}</span>
                    </div>
                @else
                    <div class="alert alert-success" style="margin-left: 50px;">
                        <strong>{{$mensaje["usuario"]}}</strong><small class="float-right">{{$mensaje["fecha"]}}</small>
                        <br><span class="text-muted">{{$mensaje["mensaje"]}}</span>
                    </div>
                @endif

            </div>
        @endforeach
        <script>

        // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('d2d6a4b2176f12c95dfd', {
                cluster: 'eu'
            });

            var channel = pusher.subscribe('chat-channel');
            channel.bind('chat-event', function(data) {
                //   alert(JSON.stringify(data));
                window.livewire.emit('mensajeRecibido', data);
            });
  </script>


</div>
