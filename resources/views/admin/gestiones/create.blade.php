@extends('adminlte::page')

@section('title', 'Crear Gestión')

@section('content_header')
    <h1>Creación de una nueva gestión educativa</h1>
    <hr>
@stop

@section('content')
    
    <div class="row">
        <div class="col-md-4">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos del formulario</h3>
                </div><!-- /.card-header -->

                <div class="card-body">
                    <form action="{{ '/admin/gestiones/create' }}" method="post">
                        
                        @csrf

                        <div class="row">
                            <!-- Nombre -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre de la Gestión<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-info">
                                                    <i class="fas fa-university"></i>
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" id="nombre"
                                                value="{{ old('nombre') }}" name="nombre"
                                                placeholder="Escriba aquí..." required>
                                        </div><!-- /.input-group-->
                                        @error('nombre')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div><!-- /.form-group -->
                            </div><!-- /.col-md-4 -->
                        </div><!-- /.row -->

                        <hr>

                        <!-- Botones de Guardar y Cancelar -->
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-info">Guardar</button>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </form>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->


@stop

@section('css')
   
@stop

@section('js')
    
@stop
