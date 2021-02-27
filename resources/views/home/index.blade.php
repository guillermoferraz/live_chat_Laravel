@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Live Chat</h3>

    @livewire('chat-form')
    @livewire('chat-list')

</div>
@endsection('content')


