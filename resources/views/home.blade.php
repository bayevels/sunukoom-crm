@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <br>
                    @can('edit articles')
                    <h1>Peut modifier l'article</h1>                 
                    @endcan

                    @can('delete articles')
                    <h1>Peut supprimer l'article</h1>
                    @endcan

                    @role('admin')
                    <h1>Je suis un administrateur</h1>                 
                    @endrole
                    @role('writer')
                    <h1>Je suis un writer</h1>                 
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
