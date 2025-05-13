@extends('adminlte::page')

@section('title', 'Niveles')

@section('content_header')
    <h1 class="text-center">Listado de Niveles</h1>
    <hr>
@stop

@section('content')
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-outline card-info">

                <div class="card-header">
                    <h3 class="card-title">Niveles registrados</h3>

                    <div class="card-tools">
                        <!-- Boton para el modal -->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalCreate">
                            Crear nuevo nivel
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ url('/admin/niveles/create') }}" method="post">
                                        @csrf
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title" id="exampleModalLabel">Registro de un nuevo nivel</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
    
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre del nivel <span class="text-danger">*</span></label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text text-info">
                                                                    <i class="fas fa-layer-group"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" id="nombre" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Escriba aquí..." required>
                                                        </div><!-- /.input-group -->
                                                        @error('nombre')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.col-md-12 -->
                                            </div><!-- /.row -->
                                        </div>
    
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-info">Guardar</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </div><!-- /.card-tools -->
                </div><!-- /.card-header -->

                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Nro</th>
                                <th>Nombre del nivel</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($niveles as $nivel)
                                <tr>
                                    <td class="text-center">{{ $nivel->id }}</td>
                                    <td class="text-center">{{ $nivel->nombre }}</td>
                                    
                                    <!-- Boton del Modal para Editar Nivel -->
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalUpdate{{ $nivel->id }}">
                                            <i class="fas fa-pencil-alt"></i> Editar
                                        </button>

                                        <!-- Modal para Editar Nivel -->
                                        <div class="modal fade" id="modalUpdate{{ $nivel->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ url('/admin/niveles/' . $nivel->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title" id="exampleModalLabel">Editar nivel</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                    
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group text-left">
                                                                        <label for="nombre">Nombre del nivel <span class="text-danger">*</span></label>
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text text-info">
                                                                                    <i class="fas fa-layer-group"></i>
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" id="nombre" class="form-control" name="nombre" value="{{ old('nombre', $nivel->nombre) }}" placeholder="Escriba aquí..." required>
                                                                        </div><!-- /.input-group -->
                                                                        @error('nombre')
                                                                            <small class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div><!-- /.form-group -->
                                                                </div><!-- /.col-md-12 -->
                                                            </div><!-- /.row -->
                                                        </div>
                    
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-success">Modificar</button>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.Modal para Editar Nivel -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.card-body -->

            </div><!-- /.card -->
        </div><!-- /.col -->
        <div class="col-md-3"></div>
    </div>


@stop

@section('css')
   
@stop

@section('js')
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#modalCreate').modal('show')
            })
        </script>
    @endif
@stop
