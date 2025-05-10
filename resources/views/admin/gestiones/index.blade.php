@extends('adminlte::page')

@section('title', 'Gestiones')

@section('content_header')
    <h1><b>Listado de Gestiones Educativas</b></h1>
    <hr>
    <a href="{{ url('/admin/gestiones/create') }}" class="btn btn-info">Crear nueva gestión</a>
@stop

@section('content')
    
    <div class="row">

        @foreach ($gestiones as $gestion)
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <span class="info-box-icon">
                        <img src="{{ url("/img/calendario.gif") }}" width="100%" alt="imagen">
                    </span>
                    
                    <div class="info-box-content">
                        <span class="info-box-text text-info" style="font-weight: bold">Gestión Educativa</span>
                        <span class="info-box-number" style="color: rgb(11, 53, 102); font-size: 25pt;">
                            {{ $gestion->nombre;}}
                        </span>
                        <div class="row mt-3 d-flex align-items-center">
                            <!-- Boton de Editar -->
                            <a href="{{ url('/admin/gestiones/' . $gestion->id . '/edit') }}" class="btn btn-success btn-sm mr-1" style="height: 31px;"><i class="fas fa-pencil-alt"></i> Editar</a>
                            <!-- Boton de Eliminar -->
                            <form action="{{ url('/admin/gestiones/' . $gestion->id) }}" method="post" id="miFormulario{{ $gestion->id }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="height: 31px; line-height: 1;" onclick="preguntar{{ $gestion->id }}(event)">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>

                            <script>
                                function preguntar{{ $gestion->id }}(event) {
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
                                            document.getElementById('miFormulario{{ $gestion->id }}').submit();
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col-md-3 -->
        @endforeach
    </div><!-- /.row -->


@stop

@section('css')
    
@stop

@section('js')
    
@stop
