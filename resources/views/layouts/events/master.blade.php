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

        <!-- Fontawesome -->
        <script src="https://kit.fontawesome.com/2cbebecffd.js" crossorigin="anonymous"></script>

        <!-- Toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('assets/js/toastr.js') }}"></script>


        <style>
            .circlespinner {
                animation: rotate 2s linear infinite;
                z-index: 2;
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -25px 0 0 -25px;
                width: 50px;
                height: 50px;
                stroke: #fff
            }
            .path {
                stroke: hsl(210, 70, 75);
                stroke-linecap: round;
                animation: dash 1.5s ease-in-out infinite
            }

            @keyframes rotate {
                100% {
                    transform: rotate(360deg)
                }
            }

            @keyframes dash {
                0% {
                    stroke-dasharray: 1, 150;
                    stroke-dashoffset: 0
                }

                50% {
                    stroke-dasharray: 90, 150;
                    stroke-dashoffset: -35
                }

                100% {
                    stroke-dasharray: 90, 150;
                    stroke-dashoffset: -124
                }
            }
        </style>

    </head>
    <body>

        <div class="preloader-wrapper d-none">
            <svg class="circlespinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>

        @include('layouts.home.nav')

        <div class="w-100 h-100 p-5">
            @yield('content')
        </div>

        <x-messages.toast />

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



