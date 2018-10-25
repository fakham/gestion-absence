@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste Filieres</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="form-group row">
                        <div class='col-md-6'>
                            <button type="submit" class='btn btn-success form-group'>Ajouter</button>
                        </div>
                    </div>

                    <table class='table table-stripped'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Departement</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filieres as $filiere)
                                <tr>
                                    <td>{{$filiere->id}}</td>
                                    <td>{{$filiere->nom}}</td>
                                    <td>{{$filiere->description}}</td>
                                    <td>{{$filiere->departement}}</td>
                                    <td>
                                        <form method="GET" action="/filieres/{{$filiere->id}}">
                                            @csrf
                                            <button type="submit" class='btn btn-primary form-group'>Modifier</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="/filieres/{{$filiere->id}}/delete">
                                            @csrf
                                            <button type="submit" class='btn btn-danger form-group' onclick="return confirm('Voulez-vous supprimer la filiere?');">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection