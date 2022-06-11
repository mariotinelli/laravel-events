<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }} - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="/css/styles.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"
            integrity="sha512-jTgBq4+dMYh73dquskmUFEgMY5mptcbqSw2rmhOZZSJjZbD2wMt0H5nhqWtleVkyBEjmzid5nyERPSNBafG4GQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="/js/form-mask.js"></script>

    </head>
    <body class="">

        <nav class="px-5 py-2 bg-dark position-sticky w-100" style="top: 0; z-index: 1">
            <div class="row justify-content-between align-items-center">
                <a href="#" class="col-2 logo">
                    <img src="/assets/logo.png" alt="logo">
                </a>
                <div class="col-5 search">
                    <input type="text" placeholder="Busque um evento">
                </div>
                <ul class="col-3 links">
                    <a href="#">Eventos</a>
                    <a href="#">Meus Eventos</a>
                    <a href="{{route('events.create')}}">Criar Evento</a>
                    <a href="#">Logout</a>
                </ul>
            </div>
        </nav>

        <div class="w-100 h-100 p-5">
            @yield('content')
        </div>

        <script>
            function isFormValid(form) {
                let isValid = true;
                for (let index = 0; index < form.length; index++) {
                    let input = form[index];

                    if (input.name != '_token' && input.id != 'saveComapny') {
                        if (!input.validity.valid) {
                            const inputName = input.placeholder;
                            // const message = `{{ __('validation.custom.field_required', ['field_name' => '${inputName}']) }}`;
                            // toastr.error(message);
                            // $('.ibi-preloader-wrapper').addClass('d-none');
                            $(`#${input.id}`).get(0).focus();
                            $(`#${input.id}`).css('border', '2px solid #1dd39d');
                            isValid = false;
                            return;
                        }
                    }
                }
                return isValid;
            }

            function handleInputBorderError(idForm) {
                const formInputs = document.querySelectorAll(`#${idForm} input`);
                const formTextareas = document.querySelectorAll(`#${idForm} textarea`);
                const formSelects = document.querySelectorAll(`#${idForm} select`);

                if (formSelects) {
                    formSelects.forEach(textarea => {
                        textarea.addEventListener('blur', (e) => {
                            const select = e.target;
                            const idSelect = e.target.id;
                            const isValid = select.validity.valid;

                            if (isValid && idSelect) {
                                $(`#${idSelect}`).removeClass('ibi-border-error');
                            }
                        })
                    });
                }

                if (formTextareas) {
                    formTextareas.forEach(textarea => {
                        textarea.addEventListener('blur', (e) => {
                            const textarea = e.target;
                            const idTexarea = e.target.id;
                            const isValid = textarea.validity.valid;

                            if (isValid && idTexarea) {
                                $(`#${idTexarea}`).css('border', '1px solid #ced4da');
                            }
                        })
                    });
                }

                if (formInputs) {
                    formInputs.forEach(input => {
                        input.addEventListener('blur', (e) => {
                            const input = e.target;
                            const idInput = e.target.id;
                            const isValid = input.validity.valid;

                            if (isValid && idInput) {
                                $(`#${idInput}`).css('border', '1px solid #ced4da');
                            }
                        })
                    });
                }
            }
        </script>
    </body>


</html>



