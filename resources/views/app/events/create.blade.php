@extends('layouts.home')

@section('title', 'Criar Evento')

@section('content')

<div class="w-50 mx-auto">
    <h2 class="mb-3">Criar Evento</h2>

    <form class="event-form" action="">

        @include('app.events.form-inputs')

    </form>
</div>

<script>
    const cepInput = document.querySelector('#event_cep');
    const stateInput = document.querySelector('#event_state');
    const cityInput  = document.querySelector('#event_city');
    const formInputs = document.querySelector('[data-input]');

    let cont = 0;
    cepInput.addEventListener("keyup", (e) => {
        const inputValue = e.target.value;

        cont = e.keyCode !== 8 ? (cont + 1) : (cont - 1);

        console.log(cont);
        if (cont === 8) {
            getAddress(inputValue);
        }

    })


    const getAddress = async (cep) => {
        cepInput.blur();
        const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;
        const response = await fetch(apiUrl);
        const data = await response.json();
        console.log(data);
        cityInput.value = data.localidade;
        stateInput.value = data.uf;
    }
</script>

@endsection
