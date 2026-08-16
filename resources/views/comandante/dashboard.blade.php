@extends('layouts.app')

@section('content')

    @php
        // 🛠️ DATOS "HECHIZO" STATICOS PARA SIMULAR BASE DE DATOS
        $totalReportes = 1248;
        $reportesHoy = 18;
        $totalDetenidosMes = 42;
        $detenidosRND = 38;
        $topSector = "Sector 1 - Centro";
        $topSectorCount = 412;
        $efectividad = "87%";

        // Datos para Gráfica 1: Auxilios
        $auxiliosLabels = ['Robo a Transeúnte', 'Violencia Intrafamiliar', 'Accidente Vial', 'Alteración al Orden', 'Robo a Comercio'];
        $auxiliosData = [345, 280, 210, 185, 128];

        // Datos para Gráfica 2: Sectores
        $sectoresLabels = ['Sector 1 (Centro)', 'Sector 2 (Norte)', 'Sector 3 (Sur)', 'Sector 4 (Oriente)'];
        $sectoresData = [412, 310, 245, 181];

        // Datos para Gráfica 3: Horarios (24 hrs)
        $horariosLabels = ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00'];
        $horariosData = [12, 5, 18, 45, 62, 85, 110, 74];
    @endphp

    <!-- 🔥 BIENVENIDA Y CABECERA -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">
                👮 Bienvenido, {{ Auth::user()->name ?? 'Oficial en Turno' }}
            </h3>
            <small class="text-muted">
                Perfil: <span class="badge bg-primary">{{ ucfirst(Auth::user()->role ?? 'Comandante') }}</span> | Centro de Inteligencia y Gestión Operativa
            </small>
        </div>
        <div>
            <span class="badge bg-dark px-3 py-2 fs-6">
                📅 {{ date('d/m/Y') }}
            </span>
        </div>
    </div>

    <!-- 📊 TARJETAS DE KPIs RÁPIDOS -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm border-start border-primary border-4">
                <div class="card-body">
                    <div class="text-muted small fw-bold text-uppercase">Reportes Totales</div>
                    <div class="fs-2 fw-bold text-dark">{{ number_format($totalReportes) }}</div>
                    <div class="text-success small fw-semibold">↑ Hoy: +{{ $reportesHoy }} registros</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm border-start border-danger border-4">
                <div class="card-body">
                    <div class="text-muted small fw-bold text-uppercase">Detenidos (Mes)</div>
                    <div class="fs-2 fw-bold text-dark">{{ $totalDetenidosMes }}</div>
                    <div class="text-muted small">Registros RND: <span class="fw-bold text-dark">{{ $detenidosRND }}</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm border-start border-warning border-4">
                <div class="card-body">
                    <div class="text-muted small fw-bold text-uppercase">Sector Mayor Incidencia</div>
                    <div class="fs-4 fw-bold text-dark text-truncate">{{ $topSector }}</div>
                    <div class="text-warning small fw-bold">{{ $topSectorCount }} eventos registrados</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm border-start border-success border-4">
                <div class="card-body">
                    <div class="text-muted small fw-bold text-uppercase">Servicios Positivos</div>
                    <div class="fs-2 fw-bold text-dark">{{ $efectividad }}</div>
                    <div class="text-success small">Efectividad en atención</div>
                </div>
            </div>
        </div>
    </div>

    <!-- 📈 GRÁFICAS DEL DASHBOARD -->
    <div class="row g-3 mb-4">
        <!-- Gráfica 1: Tipos de Auxilio -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-0">
                    <h6 class="m-0 fw-bold text-primary">📊 Tipos de Auxilio / Incidencias Frecuentes</h6>
                </div>
                <div class="card-body">
                    <canvas id="chartAuxilios" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfica 2: Ranking de Sectores -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-0">
                    <h6 class="m-0 fw-bold text-primary">🏛️ Incidencias por Sector Operativo</h6>
                </div>
                <div class="card-body">
                    <canvas id="chartSectores" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <!-- Gráfica 3: Concentración Horaria -->
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-0">
                    <h6 class="m-0 fw-bold text-primary">⏰ Concentración Horaria de Incidencias</h6>
                    <small class="text-muted">Análisis temporal de 00:00 a 23:00 hrs</small>
                </div>
                <div class="card-body">
                    <canvas id="chartHorarios" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- CDN DE CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- SCRIPTS PARA RENDERIZAR LAS GRÁFICAS CON DATOS "HECHIZO" -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            
            // 1. Gráfica de Auxilios (Dona)
            new Chart(document.getElementById('chartAuxilios').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: @json($auxiliosLabels),
                    datasets: [{
                        data: @json($auxiliosData),
                        backgroundColor: ['#0d6efd', '#dc3545', '#ffc107', '#0dcaf0', '#6c757d']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { position: 'bottom' } }
                }
            });

            // 2. Gráfica de Sectores (Barras Horizontales)
            new Chart(document.getElementById('chartSectores').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: @json($sectoresLabels),
                    datasets: [{
                        label: 'N° de Reportes',
                        data: @json($sectoresData),
                        backgroundColor: '#0d6efd',
                        borderRadius: 5
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    plugins: { legend: { display: false } }
                }
            });

            // 3. Gráfica Horaria (Línea)
            new Chart(document.getElementById('chartHorarios').getContext('2d'), {
                type: 'line',
                data: {
                    labels: @json($horariosLabels),
                    datasets: [{
                        label: 'Incidencias Registradas',
                        data: @json($horariosData),
                        borderColor: '#dc3545',
                        backgroundColor: 'rgba(220, 53, 69, 0.15)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } }
                }
            });

        });
    </script>

@endsection