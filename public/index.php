<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gerador OCR</title>

    <!-- Bootstrap core CSS -->
    <link href="/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="/public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="/public/assets/css/coming-soon.min.css" rel="stylesheet">

    <style>
        #ex3 {
            z-index: 1 !important;
            width: 700px !important;
            height: 600px;
            overflow-y: auto;
        }
        .modal a.close-modal {
            top:5px !important;
            right: 4px !important;
        }
    </style>

</head>

<body>

<!-- Modal HTML embedded directly into document -->
<div id="ex3" class="modal">
</div>

<div class="overlay"></div>
<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="/public/assets/mp4/bg.mp4" type="video/mp4">
</video>

<div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 my-auto">
                <div class="masthead-content text-white py-5 py-md-0">
                    <h1 class="mb-3">Gerador OCR</h1>
                    <p class="mb-5">OCR é o Reconhecimento Óptico de Caracteres. Possibilita a conversão de imagens e papéis escaneados.
                        <br><br>Ele transforma a imagem obtida em um conteúdo legível de texto <strong>similar ao que estava</strong> no documento original.</p>
                    <div class="input-group input-group-newsletter">

                        <input type="file" name="image" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" id="btn" type="button">Gerar!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
            <a href="https://github.com/bruceskills" target="_blank">
                <i class="fab fa-github"></i>
            </a>
        </li>
    </ul>
</div>



<!-- Bootstrap core JavaScript -->
<script src="/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="/public/assets/js/coming-soon.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<script src="https://cdn.jsdelivr.net/npm/jquery-easy-loading@1.3.0/dist/jquery.loading.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-easy-loading@1.3.0/dist/jquery.loading.min.css">

<script>
    $(function(){

        $('#ex3').on('shown.bs.modal', function () {
            $('ex3').animate({ scrollTop: 0 }, 'slow');
        });

        $("#btn").on('click', function(e){
            e.preventDefault();
            var data = new FormData();
            data.append('image', $("[name='image']")[0].files[0]);

            $('body').loading({
                message: 'Aguarde ...'
            });

            $.ajax({
                url: '/public/test/generate.php',
                data: data,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType : "json",
                success: function(data)
                {
                    $('body').loading('stop');
                    let modal = $("#ex3");
                    modal.text('').text(data.document).modal('show');

                }
            });


        });
    });
</script>
</body>

</html>
