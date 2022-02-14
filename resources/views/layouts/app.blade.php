<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- icons browser -->
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="./assets/img/favicon.png">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

        <!-- Nucleo Icons -->
        <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/css/nucleo-svg.css') }}" />

        <!-- Font Awesome Icons -->
        <script async src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/material-dashboard.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/aditional.css') }}">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>
    <body class="g-sidenav-show  bg-gray-200">

        @include('navigation-dropdown')

        <!-- Page Content -->
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">
            @include('nav')
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </main>

        <!--   Core JS Files   -->
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>

        <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/dragula/dragula.min.js"></script>
        <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jkanban/jkanban.js"></script>

        <script>
            if (document.getElementById('choices-gender')) {
              var gender = document.getElementById('choices-gender');
              const example = new Choices(gender);
            }

            if (document.getElementById('choices-language')) {
              var language = document.getElementById('choices-language');
              const example = new Choices(language);
            }

            if (document.getElementById('choices-skills')) {
              var skills = document.getElementById('choices-skills');
              const example = new Choices(skills, {
                delimiter: ',',
                editItems: true,
                maxItemCount: 5,
                removeItemButton: true,
                addItems: true
              });
            }

            if (document.getElementById('choices-year')) {
              var year = document.getElementById('choices-year');
              setTimeout(function() {
                const example = new Choices(year);
              }, 1);

              for (y = 1900; y <= 2020; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 2020) {
                  optn.selected = true;
                }

                year.options.add(optn);
              }
            }

            if (document.getElementById('choices-day')) {
              var day = document.getElementById('choices-day');
              setTimeout(function() {
                const example = new Choices(day);
              }, 1);


              for (y = 1; y <= 31; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 1) {
                  optn.selected = true;
                }

                day.options.add(optn);
              }

            }

            if (document.getElementById('choices-month')) {
              var month = document.getElementById('choices-month');
              setTimeout(function() {
                const example = new Choices(month);
              }, 1);

              var d = new Date();
              var monthArray = new Array();
              monthArray[0] = "January";
              monthArray[1] = "February";
              monthArray[2] = "March";
              monthArray[3] = "April";
              monthArray[4] = "May";
              monthArray[5] = "June";
              monthArray[6] = "July";
              monthArray[7] = "August";
              monthArray[8] = "September";
              monthArray[9] = "October";
              monthArray[10] = "November";
              monthArray[11] = "December";
              for (m = 0; m <= 11; m++) {
                var optn = document.createElement("OPTION");
                optn.text = monthArray[m];
                // server side month start from one
                optn.value = (m + 1);
                // if june selected
                if (m == 1) {
                  optn.selected = true;
                }
                month.options.add(optn);
              }
            }

            function visible() {
              var elem = document.getElementById('profileVisibility');
              if (elem) {
                if (elem.innerHTML == "Switch to visible") {
                  elem.innerHTML = "Switch to invisible"
                } else {
                  elem.innerHTML = "Switch to visible"
                }
              }
            }

            var openFile = function(event) {
              var input = event.target;

              // Instantiate FileReader
              var reader = new FileReader();
              reader.onload = function() {
                imageFile = reader.result;

                document.getElementById("imageChange").innerHTML = '<img width="200" src="' + imageFile + '" class="rounded-circle w-100 shadow" />';
              };
              reader.readAsDataURL(input.files[0]);
            };
        </script>

        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
              var options = {
                damping: '0.5'
              }
              Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
        
        <!-- Scripts -->
        <script src="{{ asset('assets/js/material-dashboard.min.js') }}" defer></script>
    </body>
</html>
