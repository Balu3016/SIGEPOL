@extends('layouts.app')

@section('content')

    @include('dashboard.home')


<script>
    const reportesMapa = @json($reportesMapa);

    console.log(reportesMapa);
</script>

@endsection
