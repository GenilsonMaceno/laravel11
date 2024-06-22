@extends('admin.layouts.appTeste')

@section('title, Criar Novo Usuários')

@section('content')

<h1>Edição de usuário: {{ $user->name }}</h1>

{{-- forma de incluir o componetes --}}
{{-- @include('admin.includes.errors') --}} 

{{-- Esse é outro jeito  --}}
<x-alertTeste/>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf()
    {{-- <input type="text" name="_method" value="PUT" hidden> --}}
    {{-- Com essa diretiva eu consigo passar o verbo do metodo --}}
    @method('PUT') 
    <input type="text" name="name" placeholder="Nome" value="{{ $user->name }}">
    <input type="email" name="email" placeholder="E-mail" value="{{ $user->email }}">
    <input type="password" name="password" placeholder="Senha">
    <button type="submit">Atualizar</button>
</form>


@endsection