<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Policial Ocoyoacac</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

       <style>

    body{
        background:
        linear-gradient(
            rgba(0,0,0,.65),
            rgba(0,0,0,.65)
        ),
        url('/img/fondo-policial1.jpg');

        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        min-height: 100vh;
    }

    .overlay{
        min-height:100vh;
    }

    .hero{
        padding-top:120px;
        color:white;
    }

    .card-info{
        backdrop-filter:blur(8px);
        background:rgba(255,255,255,.10);
        border:1px solid rgba(255,255,255,.20);
        color:white;
    }

</style>

</head>
<body>

<div class="overlay">

    <div class="container">

        <div class="hero text-center">

            <img src="/img/logo.png"
                 width="240"
                 class="mb-4">

            <h1 class="display-4 fw-bold">  SIGEPOL-CENTINELA 360   </h1>

            <h3>

                Dirección de Seguridad Pública y Tránsito Municipal de Ocoyoacac

            </h3>

            <p class="lead mt-4">

                Plataforma para la gestión de reportes policiales,
                detenidos, estadísticas delictivas, análisis operativo
                e inteligencia policial.

            </p>

            <div class="mt-4">

                <a href="/dashboard"
                   class="btn btn-primary btn-lg">

                    🚔 Ingresar al Sistema

                </a>

            </div>

        </div>

        <div class="row mt-5 pb-5">

            <div class="col-md-4">

                <div class="card card-info">

                    <div class="card-body text-center">

                        <h3>📋</h3>

                        <h5>Reportes Policiales</h5>

                        <p>
                            Registro y consulta de IPH.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card card-info">

                    <div class="card-body text-center">

                        <h3>🚔</h3>

                        <h5>Detenidos</h5>

                        <p>
                            Control y seguimiento de puestas.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card card-info">

                    <div class="card-body text-center">

                        <h3>📊</h3>

                        <h5>Estadísticas</h5>

                        <p>
                            Indicadores y análisis delictivo.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>