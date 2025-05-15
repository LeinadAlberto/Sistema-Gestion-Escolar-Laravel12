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
                                                            <input type="text" id="nombre" class="form-control" name="nombre_create" value="{{ old('nombre_create') }}" placeholder="Escriba aquí..." required>
                                                        </div><!-- /.input-group -->
                                                        @error('nombre_create')
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
                    <table id="example" class="table table-bordered table-striped table-hover collapsed dtr-inline">
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
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $nivel->nombre }}</td>
                                    
                                    
                                    <td class="text-center d-flex justify-content-center" 
                                        style="padding-top: 11px; padding-bottom: 11px; border-top: 0px; border-bottom: 0px;">
                                        <!-- Boton del Modal para Editar Nivel -->
                                        <button type="button" class="btn btn-success btn-sm rounded-0 rounded-start border-end-0" 
                                                title="Editar Nivel" data-toggle="modal" data-target="#modalUpdate{{ $nivel->id }}"
                                                style="width: 100px; height: 31px; line-height: 1; padding: 0;">
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
                                    
                                        <!-- Boton y formulario para Eliminar Nivel -->
                                        <form action="{{ url('/admin/niveles/' . $nivel->id) }}" method="post" id="miFormulario{{ $nivel->id }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-0 rounded-end border-start-0" 
                                                    title="Eliminar Nivel" 
                                                    style="width: 100px; height: 31px; line-height: 1; padding: 0;" 
                                                    onclick="preguntar{{ $nivel->id }}(event)">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>

                                        <script>
                                            function preguntar{{ $nivel->id }}(event) {
                                                event.preventDefault();

                                                Swal.fire({
                                                    title: '¿Desea eliminar este registro?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // JavaScript puro para enviar el formulario
                                                        document.getElementById('miFormulario{{ $nivel->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>

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
                @if (session('modal_id')) 
                    $('#modalUpdate{{ session('modal_id') }}').modal('show');
                @else 
                    $('#modalCreate').modal('show');
                @endif
            });
        </script>
    @endif
@stop
