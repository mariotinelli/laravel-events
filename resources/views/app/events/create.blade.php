@extends('layouts.events.master')

@section('title', 'Criar Evento')

@section('content')

<div class="w-50 mx-auto">
    <h2 class="mb-3">Criar Evento</h2>

    <form class="event-form" id="event-form" action={{route('events.store')}} enctype="multipart/form-data">
        @csrf
        @include('app.events.form-inputs')

    </form>
</div>

<script>

    $(document).ready(function(e) {
        const cepInput = document.querySelector('#event_cep');
        const stateInput = document.querySelector('#event_state');
        const cityInput  = document.querySelector('#event_city');
        const stateTemp = document.querySelector('#temp-event-state');
        const cityTemp  = document.querySelector('#temp-event-city');

        let cont = 0;
        cepInput.addEventListener("keyup", (e) => {
            let inputValue = e.target.value;

            if (inputValue.length === 5 && e.keyCode !== 8) {
                e.target.value = inputValue.toString() + '-';
            }

            if (inputValue.length === 9) {
                $('.preloader-wrapper').removeClass('d-none');
                getAddress(inputValue);
                $('.preloader-wrapper').addClass('d-none');
            }
        });


        const getAddress = async (cep) => {
            cepInput.blur();
            const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;
            const response = await fetch(apiUrl);
            const data = await response.json();

            cityInput.value = data.localidade;
            stateInput.value = data.uf;
            cityTemp.value = data.localidade;
            stateTemp.value = data.uf;
        }

        $('#saveEvent').click(function(e) {
                $('.preloader-wrapper').removeClass('d-none');
                e.preventDefault();
                e.stopPropagation();

                const form = $('#event-form')[0];

                if (isFormValid(form)) {

                    const formData = new FormData(form);

                    $.ajax({
                        type: 'POST',
                        enctype: 'multipart/form-data',
                        url: '{{ route('events.store') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: (response) => {
                            window.location.href = response.route;
                        },
                        error: (error) => {
                            let response = error.responseJSON;

                            if (response.errors) {
                                const errors = response.errors;
                                const messages = Object.values(errors);
                                const idInputs = Object.keys(errors);
                                response = messages[0];
                                var formEventInputs = ['image'];
                                if (formEventInputs.includes(idInputs[0])) {
                                    switch (idInputs[0]) {
                                        case 'image':
                                            window.scrollTo(0, 0);
                                            $(`.event-image`).addClass('border-error');
                                            break;
                                        default:
                                            console.log("teste");
                                            $(`#${idInputs[0]}`).focus();
                                            $(`#${idInputs[0]}`).addClass('border-error');
                                            break;
                                    }
                                }
                            }

                            $('.ibi-preloader-wrapper').addClass('d-none');
                            // toastr.error(response);
                        },
                    });
                }
            });


        $('#image').change(function(e) {
            const input = e.currentTarget;
            const file = input.files[0];

            if (file && file.type.includes('image')) {
                console.log('if')
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.object-cover').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);

                $('.event-image').removeClass('ibi-border-error');
                $('.image-preview').removeClass('d-none');
                $('.gray-box').addClass('d-none');
            } else {
                console.log('else')
                $('.image-preview').addClass('d-none');
                $('.gray-box').removeClass('d-none');
            }
        });

        handleInputBorderError('event-form');
    });

</script>

@endsection
