@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
        @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" class="form-control" name="description" value="{{ old('description') }}">
            </div>
            <div class="form-group">
                <label for="start">Fecha inicio</label>
                <input type="date" class="form-control" name="start" value="{{ old('start', date('Y-m-d')) }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Registrar proyecto</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de inicio</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->start }}</td>
                    <td>
                        @if($project->trashed())
                            <a href="/proyecto/{{ $project->id }}/restaurar" class="btn btn-success btn-sm" title="Restaurar">
                                <span class="glyphicon glyphicon-repeat"></span>
                            </a>
                        @else
                            <a href="/proyecto/{{ $project->id }}" class="btn btn-primary btn-sm" title="Editar">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="/proyecto/{{ $project->id }}/eliminar" class="btn btn-danger btn-sm" title="Dar de baja">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>  
@endsection