@extends('layouts.app')

@section('content')

<style>
body {
    background: #eef3f8;
}

/*=============================
HEADER
=============================*/
.header-dashboard {
    background: linear-gradient(135deg, #0b3d91, #0d6efd);
    color: white;
    border-radius: 20px;
    padding: 35px;
    box-shadow: 0 12px 25px rgba(0,0,0,.15);
}

.header-dashboard h1 {
    font-weight: 700;
    font-size: 40px;
}

.header-dashboard h4 {
    opacity: .9;
}

.estado {
    font-size: 15px;
    margin-top: 8px;
}

/*=============================
TARJETAS
=============================*/
.kpi-card {
    border: none;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0,0,0,.08);
    transition: .25s;
}

.kpi-card:hover {
    transform: translateY(-6px);
}

.kpi-icon {
    font-size: 55px;
    opacity: .12;
    position: absolute;
    right: 18px;
    top: 15px;
}

.kpi-title {
    font-size: 15px;
    color: #6c757d;
    font-weight: 600;
}

.kpi-value {
    font-size: 38px;
    font-weight: bold;
}
</style>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="header-dashboard mb-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1>🚔 SIGEPOL</h1>
                <h4>Sistema Integral de Gestión Policial</h4>
                <p>Centro de Inteligencia Operativa</p>
                <div class="estado">📍 Dirección de Seguridad Pública Municipal</div>
                <div class="estado">Ocoyoacac, Estado de México</div>
            </div>
            <div class="col-lg-4 text-end">
                <h3>👮 {{ Auth::user()->name }}</h3>
                <h5>{{ ucfirst(Auth::user()->role) }}</h5>
                <div>📅 {{ now()->format('d/m/Y') }}</div>
                <div>🟢 Sistema Operativo</div>
            </div>
        </div>
    </div>

    <!-- BOTONES DE ACCIÓN -->
    <div class="row mb-4">
        <div class="col text-end">
            <a href="/reportes/crear" class="btn btn-primary btn-lg shadow">➕ Nuevo Reporte</a>
            <a href="/detenidos/crear" class="btn btn-danger btn-lg shadow">👮 Nuevo Detenido</a>
        </div>
    </div>

    <!-- INDICADORES OPERATIVOS (KPIS) -->
    <h3 class="mb-4">📊 Indicadores Operativos</h3>
    <div class="row g-4">
        <div class="col-lg-2 col-md-4">
            <div class="card kpi-card">
                <div class="card-body position-relative">
                    <div class="kpi-icon">📄</div>
                    <div class="kpi-title">REPORTES</div>
                    <div class="kpi-value text-primary">{{ $total }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="card kpi-card">
                <div class="card-body position-relative">
                    <div class="kpi-icon">📅</div>
                    <div class="kpi-title">HOY</div>
                    <div class="kpi-value text-success">{{ $hoy }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="card kpi-card">
                <div class="card-body position-relative">
                    <div class="kpi-icon">📈</div>
                    <div class="kpi-title">MES</div>
                    <div class="kpi-value text-warning">{{ $mensual }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="card kpi-card">
                <div class="card-body position-relative">
                    <div class="kpi-icon">✅</div>
                    <div class="kpi-title">POSITIVOS</div>
                    <div class="kpi-value text-success">{{ $serviciosPositivos }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="card kpi-card">
                <div class="card-body position-relative">
                    <div class="kpi-icon">👮</div>
                    <div class="kpi-title">DETENIDOS</div>
                    <div class="kpi-value text-danger">{{ $totalDetenidos }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="card kpi-card">
                <div class="card-body position-relative">
                    <div class="kpi-icon">📋</div>
                    <div class="kpi-title">RND</div>
                    <div class="kpi-value text-dark">{{ $puestasDisposicion }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- PANEL EJECUTIVO -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="fw-bold mb-4">📊 Centro de Inteligencia Operativa</h3>
        </div>
    </div>

    <div class="row g-4">
        <!-- AUXILIOS -->
        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">🚔 Incidencias por Auxilio</div>
                <div class="card-body">
                    <canvas id="graficaAuxilios" height="300"></canvas>
                </div>
            </div>
        </div>
        <!-- SECTORES -->
        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white">📍 Ranking de Sectores</div>
                <div class="card-body">
                    <canvas id="graficaSectores" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row g-4">
        <!-- HORARIOS -->
        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-warning">🕒 Horarios con mayor incidencia</div>
                <div class="card-body">
                    <canvas id="graficaHoras" height="300"></canvas>
                </div>
            </div>
        </div>
        
        <!-- MEDIOS -->
        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-danger text-white">☎ Medio del Reporte</div>
                <div class="card-body">
                    <canvas id="graficaMedios" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- CENTRO DE MONITOREO -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between">
                    <h4 class="mb-0">🗺 Centro de Monitoreo Operativo</h4>
                    <div>
                        <span class="badge bg-success">{{ $reportesMapa->count() }} Incidencias</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <select class="form-select">
                                <option>Todos los Sectores</option>
                                @foreach($labelsRankingSectores as $sector)
                                    <option>{{ $sector }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option>Todos los Auxilios</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary w-100">🔍 Filtrar</button>
                        </div>
                    </div>
                    <div id="mapa"
                    style="
                    height:700px;
                    border-radius:15px;
                    overflow:hidden;
                    border:4px solid #175508;
                    box-shadow:0 10px 25px rgba(0,0,0,.20);
                    ">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- INICIO APARTADO DETENIDOS -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-danger text-white">
                    <h3 class="mb-0">👮 Centro de Control de Detenidos</h3>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="card border-0 shadow">
                                <div class="card-body text-center">
                                    <h6>Total de Detenidos</h6>
                                    <h1 class="text-danger">{{ $totalDetenidos }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card border-0 shadow">
                                <div class="card-body text-center">
                                    <h6>Detenidos Hoy</h6>
                                    <h1 class="text-primary">{{ $detenidosHoy }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card border-0 shadow">
                                <div class="card-body text-center">
                                    <h6>Detenidos del Mes</h6>
                                    <h1 class="text-success">{{ $detenidosMes }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card border-0 shadow">
                                <div class="card-body text-center">
                                    <h6>RND Generados</h6>
                                    <h1 class="text-warning">{{ $puestasDisposicion }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 g-4">
        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    👤 Detenidos por Sexo
                </div>
                <div class="card-body">
                    <canvas id="sexoDetenidos" height="280"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white">
                    📍 Lugar de Detención
                </div>
                <div class="card-body">
                    <canvas id="lugarDetencion" height="280"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 g-4">
        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-warning">
                    👮 Primer Respondiente
                </div>
                <div class="card-body">
                    <canvas id="respondienteDetenidos" height="280"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-danger text-white">
                    ⚖ Tipo de Sanción
                </div>
                <div class="card-body">
                    <canvas id="sancionDetenidos" height="280"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    new Chart(document.getElementById('graficaAuxilios'), {
        type: 'doughnut',
        data: {
            labels: @json($estadisticas->pluck('auxilio')),
            datasets: [{
                data: @json($estadisticas->pluck('total'))
            }]
        }
    });

    new Chart(document.getElementById('graficaSectores'), {
        type: 'bar',
        data: {
            labels: @json($labelsRankingSectores),
            datasets: [{
                label: 'Reportes',
                data: @json($dataRankingSectores)
            }]
        }
    });

    new Chart(document.getElementById('graficaMedios'), {
        type: 'polarArea',
        data: {
            labels: @json($mediosReporte->pluck('medio_reporte')),
            datasets: [{
                data: @json($mediosReporte->pluck('total'))
            }]
        }
    });

    new Chart(document.getElementById('graficaHoras'), {
        type: 'line',
        data: {
            labels: @json($labelsHoras),
            datasets: [{
                label: 'Incidencias',
                data: @json($dataHoras),
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13,110,253,.15)',
                borderWidth: 3,
                fill: true,
                tension: .4,
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Sexo
    new Chart(document.getElementById('sexoDetenidos'), {
        type: 'doughnut',
        data: {
            labels: @json($graficaSexo->pluck('sexo')),
            datasets: [{
                data: @json($graficaSexo->pluck('total'))
            }]
        }
    });

    // Lugar
    new Chart(document.getElementById('lugarDetencion'), {
        type: 'bar',
        data: {
            labels: @json($graficaLugarDetencion->pluck('lugar_detencion')),
            datasets: [{
                label: 'Detenciones',
                data: @json($graficaLugarDetencion->pluck('total'))
            }]
        }
    });

    // Respondiente
    new Chart(document.getElementById('respondienteDetenidos'), {
        type: 'bar',
        data: {
            labels: @json($graficaRespondiente->pluck('primer_respondiente')),
            datasets: [{
                label: 'Detenciones',
                data: @json($graficaRespondiente->pluck('total'))
            }]
        },
        options: {
            indexAxis: 'y'
        }
    });

    // Sanción
    new Chart(document.getElementById('sancionDetenidos'), {
        type: 'pie',
        data: {
            labels: @json($graficaSancion->pluck('sancion')),
            datasets: [{
                data: @json($graficaSancion->pluck('total'))
            }]
        }
    });
});

function initMap() {
    console.log("MAPA CARGADO");

    const mapa = new google.maps.Map(
        document.getElementById("mapa"),
        {
            zoom: 13,
            center: {
                lat: 19.2720,
                lng: -99.4900
            },
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: true,
            zoomControl: true,
            styles: [
                {
                    "featureType": "poi",
                    "stylers": [{"visibility": "off"}]
                },
                {
                    "featureType": "transit",
                    "stylers": [{"visibility": "off"}]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels",
                    "stylers": [{"visibility": "off"}]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [{"visibility": "off"}]
                }
            ]
        }
    );

    const reportes = @json($reportesMapa);
    const bounds = new google.maps.LatLngBounds();

    reportes.forEach(function(r) {
        if (!r.coordenadas) return;

        const partes = r.coordenadas.split(",");
        if (partes.length < 2) return;

        const lat = parseFloat(partes[0].trim());
        const lng = parseFloat(partes[1].trim());

        if (isNaN(lat) || isNaN(lng)) return;

        let color = "red";
        if (r.positivo == "POSITIVO") color = "green";

        const marcador = new google.maps.Marker({
            position: { lat: lat, lng: lng },
            map: mapa,
            animation: google.maps.Animation.DROP,
            icon: {
                url: "https://maps.google.com/mapfiles/ms/icons/" + color + "-dot.png"
            }
        });

        bounds.extend(marcador.getPosition());

        const ventana = new google.maps.InfoWindow({
            content: `
            <div style="width:280px">
                <div style="
                    background:#0d6efd;
                    color:white;
                    padding:10px;
                    border-radius:8px;
                    margin-bottom:10px;
                ">
                    <h5 style="margin:0;">
                        🚔 ${r.auxilio}
                    </h5>
                </div>
                <table class="table table-sm table-bordered mb-0">
                    <tr>
                        <th>Sector</th>
                        <td>${r.sector}</td>
                    </tr>
                    <tr>
                        <th>Fecha</th>
                        <td>${r.fecha}</td>
                    </tr>
                    <tr>
                        <th>Hora</th>
                        <td>${r.hora_reporte}</td>
                    </tr>
                    <tr>
                        <th>Unidad</th>
                        <td>${r.responsable}</td>
                    </tr>
                    <tr>
                        <th>Resultado</th>
                        <td>
                        ${
                            r.positivo == "POSITIVO"
                            ? "<span class='badge bg-success'>POSITIVO</span>"
                            : "<span class='badge bg-danger'>NEGATIVO</span>"
                        }
                        </td>
                    </tr>
                </table>
            </div>
            `
        });

        marcador.addListener("click", function() {
            ventana.open(mapa, marcador);
        });
    });

    if (reportes.length > 0) {
        mapa.fitBounds(bounds);
    }
}
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABQF0upCbWKZRZIpfy9oHUcHa8DfqNHI4&callback=initMap">
</script>

@endsection