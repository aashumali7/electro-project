<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <!-- Title -->
        <title>Home-v1 | Electro - Responsive Website Template</title>

        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
        <!-- Favicon -->
        <link rel="shortcut icon" href="/favicon.png">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;display=swap"
            rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="/assets/css/font-electro.css">

        <link rel="stylesheet" href="/assets/vendor/animate.css/animate.min.css">
        <link rel="stylesheet" href="/assets/vendor/hs-megamenu/src/hs.megamenu.css">
        <link rel="stylesheet" href="/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="/assets/vendor/fancybox/jquery.fancybox.css">
        <link rel="stylesheet" href="/assets/vendor/slick-carousel/slick/slick.css">

        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="/assets/css/theme.css">
        <style>
            /* css code */ 
            </style>
    </head>
    <body>

        <!-- ========== HEADER ========== -->
        @include('layouts.header')
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        @yield('main')
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
        @include('layouts.footer')
        <!-- ========== END FOOTER ========== -->

        <!-- ========== SECONDARY CONTENTS ========== -->

        @include('layouts.aside_right')

        <!-- ========== END SECONDARY CONTENTS ========== -->

        <!-- Go to Top -->
        <a class="js-go-to u-go-to" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed"
            data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
            <span class="fas fa-arrow-up u-go-to__inner"></span>
        </a>
        <!-- End Go to Top -->

        <!-- JS Global Compulsory -->
        <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
        <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="/assets/vendor/appear.js"></script>
        <script src="/assets/vendor/jquery.countdown.min.js"></script>
        <script src="/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
        <script src="/assets/vendor/svg-injector/dist/svg-injector.min.js"></script>
        <script src="/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="/assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
        <script src="/assets/vendor/typed.js/lib/typed.min.js"></script>
        <script src="/assets/vendor/slick-carousel/slick/slick.js"></script>
        <script src="/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

        <!-- JS Electro -->
        <script src="/assets/js/hs.core.js"></script>
        <script src="/assets/js/components/hs.countdown.js"></script>
        <script src="/assets/js/components/hs.header.js"></script>
        <script src="/assets/js/components/hs.hamburgers.js"></script>
        <script src="/assets/js/components/hs.unfold.js"></script>
        <script src="/assets/js/components/hs.focus-state.js"></script>
        <script src="/assets/js/components/hs.malihu-scrollbar.js"></script>
        <script src="/assets/js/components/hs.validation.js"></script>
        <script src="/assets/js/components/hs.fancybox.js"></script>
        <script src="/assets/js/components/hs.onscroll-animation.js"></script>
        <script src="/assets/js/components/hs.slick-carousel.js"></script>
        <script src="/assets/js/components/hs.show-animation.js"></script>
        <script src="/assets/js/components/hs.svg-injector.js"></script>
        <script src="/assets/js/components/hs.go-to.js"></script>
        <script src="/assets/js/components/hs.selectpicker.js"></script>

        <!-- JS Plugins Init. -->
        <script>
        $(window).on('load', function() {
            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                direction: 'horizontal',
                pageContainer: $('.container'),
                breakpoint: 767.98,
                hideTimeOut: 0
            });

            // initialization of svg injector module
            $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
        });

        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));

            // initialization of animation
            $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                afterOpen: function() {
                    $(this).find('input[type="search"]').focus();
                }
            });

            // initialization of popups
            $.HSCore.components.HSFancyBox.init('.js-fancybox');

            // initialization of countdowns
            var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
                yearsElSelector: '.js-cd-years',
                monthsElSelector: '.js-cd-months',
                daysElSelector: '.js-cd-days',
                hoursElSelector: '.js-cd-hours',
                minutesElSelector: '.js-cd-minutes',
                secondsElSelector: '.js-cd-seconds'
            });

            // initialization of malihu scrollbar
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

            // initialization of forms
            $.HSCore.components.HSFocusState.init();

            // initialization of form validation
            $.HSCore.components.HSValidation.init('.js-validate', {
                rules: {
                    confirmPassword: {
                        equalTo: '#signupPassword'
                    }
                }
            });

            // initialization of show animations
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');

            // initialization of fancybox
            $.HSCore.components.HSFancyBox.init('.js-fancybox');

            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            // initialization of hamburgers
            $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                beforeClose: function() {
                    $('#hamburgerTrigger').removeClass('is-active');
                },
                afterClose: function() {
                    $('#headerSidebarList .collapse.show').collapse('hide');
                }
            });

            $('#headerSidebarList [data-toggle="collapse"]').on('click', function(e) {
                e.preventDefault();

                var target = $(this).data('target');

                if ($(this).attr('aria-expanded') === "true") {
                    $(target).collapse('hide');
                } else {
                    $(target).collapse('show');
                }
            });

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

            // initialization of select picker
            $.HSCore.components.HSSelectPicker.init('.js-select');
        });
        </script>
        <script>
            // everything which i write inside script tag will JavaScript code
            console.log(document.querySelector('button.a_loginsubmit'));
            document.querySelector('button.a_loginsubmit').addEventListener('click',function(e){ //e means event 
                e.preventDefault(); //dont reload the page //e means event

                document.querySelector("i.ec.ec-close-remove").click()
                //becaues we want to implement AJAX
                var email = document.querySelector('input#signinEmail').value;
                console.log('email >',email);
                let password = document.querySelector('input#signinPassword').value;
                console.log('password>', password);
            
              //const classObject new ClassName();  //PascalCase 
                const xhro = new XMLHttpRequest();
                //co.method()
                xhro.open('POST',"http://localhost:8000/customer/login"),true; //Asyncronus request
                xhro.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                // JS object -> JSON string
                var data = JSON.stringify({ // {key:value} = JS object
                    'email':email,
                    'password':password,
                })
            //object.method()
                xhro.send(data);
                xhro.onreadystatechange=function(){
                    if(xhro.readyState === 4 && xhro.status === 200){
                             //object.property   
                    console.log(xhro.responseText);
                            //JSON striing -> JS object
                    console.log(JSON.parse(xhro.responseText));
                    var parsedData = JSON.parse(xhro.responseText);
                    console.log(parsedData.data.firstname);
                    console.log(parsedData.data.lastname);
                    document.querySelector('a#sidebarNavToggler').closest('li').innerHTML = 'Welcome '+parsedData.data.firstname+''+parsedData.data.lastname+'<a href="#">Logout</a>';
                    document.querySelector('a#sidebarNavToggler').innerHTML = 'Welcome '+parsedData.data.firstname+''+parsedData.data.lastname+'<a href="#">Logout</a>';
                    }
                }

            })
            //javascript code
            //AJAX JS code 
            //var/let/const classObject = new ClassName()
            //xhro = xml http request object

            
        </script>
    </body>
</html>