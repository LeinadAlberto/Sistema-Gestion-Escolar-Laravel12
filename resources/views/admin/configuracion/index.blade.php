@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos del Sistema</h1>
    <hr>
@stop

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Bienvenido a la sección de configuración del sistema</h3>
                </div><!-- /.card-header -->

                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Logo de la Institución</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-info">
                                                    <i class="fas fa-globe"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" 
                                                value="{{ old('web', $configuracion->web ?? '') }}" name="web"
                                                placeholder="Escriba aquí...">
                                        </div><!-- /.input-group-->
                                        @error('web')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div><!-- /.form-group -->
                            </div><!-- /.col-md-2 -->

                            <div class="col-md-10">
                                <!-- Nombre, Descripción -->
                                <div class="row">
                                    <!-- Nombre -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-info">
                                                            <i class="fas fa-university"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" 
                                                        value="{{ old('nombre', $configuracion->nombre ?? '') }}" name="nombre"
                                                        placeholder="Escriba aquí..." required>
                                                </div><!-- /.input-group-->
                                                @error('nombre')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-4 -->

                                    <!-- Descripción -->
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Descripción <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-info">
                                                            <i class="fas fa-align-left"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" 
                                                        value="{{ old('descripcion', $configuracion->descripcion ?? '') }}" name="descripcion"
                                                        placeholder="Escriba aquí..." required>
                                                </div><!-- /.input-group-->
                                                @error('descripcion')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-8 -->
                                </div><!-- /.row -->

                                <!-- Dirección, Teléfono, Divisa -->
                                <div class="row">
                                    <!-- Dirección -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Dirección <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-info">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" 
                                                        value="{{ old('direccion', $configuracion->direccion ?? '') }}" name="direccion"
                                                        placeholder="Escriba aquí..." required>
                                                </div><!-- /.input-group-->
                                                @error('direccion')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->

                                    <!-- Teléfono -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Teléfono <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-info">
                                                            <i class="fas fa-phone"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" 
                                                        value="{{ old('telefono', $configuracion->telefono ?? '') }}" name="telefono"
                                                        placeholder="Escriba aquí..." required>
                                                </div><!-- /.input-group-->
                                                @error('telefono')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-3 -->

                                    <!-- Divisa -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Divisa <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-info">
                                                            <i class="fas fa-money-bill-wave"></i>
                                                        </span>
                                                    </div>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Seleccione una opción</option>
                                                        @foreach ($divisas as $divisa)
                                                            <option value="{{ $divisa['symbol'] }}" 
                                                                {{ old('divisa', $configuracion->divisa ?? '') == $divisa['symbol'] ? 'selected' : '' }}>
                                                                {{ $divisa['name'] . "(" . $divisa['symbol'] . ")" }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div><!-- /.input-group-->
                                                @error('divisa')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-3 -->
                                </div><!-- /.row -->

                                <!-- Correo Electrónico, Web -->
                                <div class="row">
                                    <!-- Correo Electrónico -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Correo Electrónico <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-info">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" 
                                                        value="{{ old('correo_electronico', $configuracion->correo_electronico ?? '') }}" name="correo_electronico"
                                                        placeholder="Escriba aquí..." required>
                                                </div><!-- /.input-group-->
                                                @error('correo_electronico')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->

                                    <!-- Web -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Sitio Web</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-info">
                                                            <i class="fas fa-globe"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" 
                                                        value="{{ old('web', $configuracion->web ?? '') }}" name="web"
                                                        placeholder="Escriba aquí...">
                                                </div><!-- /.input-group-->
                                                @error('web')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                            </div><!-- /.col-md-10 -->
                        </div><!-- /.row -->
                    </form>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
