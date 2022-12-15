@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

<div class = "conteudo-pagina-2">
    <div class = "titulo-pagina">
        <p>Listagem de Clientes</p>
    </div>

    <div class="menu">
    <li><a href= " {{ route('cliente.create') }}">Novo</a></li>
    <li><a href= ""> Consulta</a></li>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table border= '1' width = "100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome}}</td>
                            <td><a href= "{{ route('cliente.show',['cliente' => $cliente->id])}}">Vizualizar</a></td>
                            <td>
                                <form id="form_{{$cliente->id}}" method ="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href= "#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                        
                        </tr>
                    @endforeach
                </tbody> 
            </table>
            {{ $clientes->appends($request)->links()}}
            <!--
            <br>
            {{ $clientes->count() }} - Total de registros por página
            <br>
            {{ $clientes->total() }} - Total de registros da consulta
            <br>
            {{ $clientes->firstItem() }} - Número do primeiro registro da página
            <br>
            {{ $clientes->lastItem() }} - Número do último registro da página
            -->
            <br>
            Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
        </div>
    </div>
</div>
@endsection