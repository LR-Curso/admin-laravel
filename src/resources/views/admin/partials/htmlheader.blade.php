<head>
    <meta charset="UTF-8">
    <title> {{ env('ADMIN_TITLE', 'Admin Laravel') }} - @yield('htmlheader_title', 'Home') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{--<!-- Bootstrap 3.3.4 -->--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    {{--<!-- Font Awesome Icons -->--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    {{--<!-- Ionicons -->--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" integrity="sha384-gOaRlqAhqPUMlR/5HfjaLm+COAJ+Ka0Am9GCueJAWwFluNWKDUZJ8GUGhBJ1r+J/" crossorigin="anonymous">
    {{--<!-- Theme style -->--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.6/css/AdminLTE.min.css" integrity="sha384-7y3zMCDqFPOqyDZ2eRFDTInBOm5WRi8d0kFT+cYY1WkPy6pUm3+eYwI6HDR1eGS3" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.6/css/skins/skin-blue.min.css" integrity="sha384-HpPw4BJmJc5KUoRUqCQwYKo0Kk94VbzanZQdGrG0m5h2dnUTxN0FHRDmKNyv5ymR" crossorigin="anonymous">
    {{--<!-- iCheck -->--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css" integrity="sha384-v2DUpb8hl1uP6WHaYSiVLa9BFPVF/4RkEdsPPiR+s0loEIB9Z35g1EWuifatrxRg" crossorigin="anonymous">

    {{--<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->--}}
    {{--<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->--}}
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js" integrity="sha384-RPXhaTf22QktT8KTwZ6bUz/C+7CnccaIw5W/y/t0FW5WSDGj3wc3YtRIJC0w47in" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js" integrity="sha384-HwX0n9BiVutdIP0m3jKYarATBrBQMARe4JqN2bNN+eqbEirLWcklhaZgkovSBfc+" crossorigin="anonymous"></script>
    <![endif]-->
    @yield('css')
</head>
