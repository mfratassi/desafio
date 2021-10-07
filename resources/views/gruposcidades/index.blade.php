@extends('adminlte::page')
@section("title", "Grupos de Cidades")
@section("content_header", "Grupos de Cidades")

@section("content")
    <div class="container">
        <div class="row">
            @include('gruposcidades.table', $grupos)
        </div>
    </div>
    <a class="btn btn-primary" href="{{route('grupos.create')}}">Criar Novo</a>
    <div class="mt-5"></div>
@endsection

@section("footer")
  Footer
@endsection