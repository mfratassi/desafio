@extends('adminlte::page')
@section("title", "Cidades")
@section("content_header", "Cidades")

@section("content")
    <!-- Masthead-->
    {{-- <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Cidades</h1>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0"></p>
        </div>
    </header> --}}
    <div class="container">
        <div class="row">
            @includeIf('cidades.table', $cidades)
        </div>
    </div>
    <a class="btn btn-primary" href="{{route('cidades.create')}}">Criar Novo</a>
    <div class="mt-5"></div>
@endsection

@section("footer")
  Footer
@endsection