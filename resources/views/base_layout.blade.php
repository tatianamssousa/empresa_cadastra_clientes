<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/propper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>

    </style>
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
</head>
<body>
@yield('body')
@yield('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $("#empresa_cnpj").mask("99.999.999/9999-99");
        $("#empresa_ie").mask("999.999.999.999");
        $(".cep").mask("99999-999");
        $(".telefone").mask("(99) 9999-9999");
        $("#cpf").mask("999.999.999-99");
        $("#nascimento").mask("99/99/9999");
        $(".celular").mask("(99) 99999-9999");
        $("#vencimento").mask("99/99/9999");
    });
</script>
@yield('rodape')
</body>
</html>