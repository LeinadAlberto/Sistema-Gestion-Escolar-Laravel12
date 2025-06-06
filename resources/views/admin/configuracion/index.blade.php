@extends('adminlte::page')

@section('title', 'Configuración')

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
                    <form action="{{ '/admin/configuracion/create' }}" method="post" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="row">
                            <!-- Logo de la Institución -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="logo">Logo de la Institución</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-info">
                                                    <i class="fas fa-image"></i>
                                                </span>
                                            </div>
                                            <input type="file" id="file" accept=".jpg,.jpeg,.png" class="form-control" 
                                                value="{{ old('logo', $configuracion->logo ?? '') }}" name="logo">
                                        </div><!-- /.input-group-->
                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <br>
                                        <center>
                                            <output id="list">
                                                @if (isset($configuracion->logo))
                                                    <img class="thumb thumbnail" src="{{ url($configuracion->logo) }}" width="70%" alt="logo" title="logo">
                                                @endif
                                            </output>
                                        </center>
                                        <script>
                                            function archivo(evt) {
                                                var files = evt.target.files; //FileList object
                                                // Obtenemos la imagen del campo "file".
                                                for (var i = 0, f; f = files[i]; i++) {
                                                    // Solo admitimos imágenes.
                                                    if (!f.type.match('image.*')) {
                                                        continue;
                                                    }
                                                    var reader = new FileReader();
                                                    reader.onload = (function (theFile) {
                                                        return function (e) {
                                                            // Insertamos la imagen
                                                            document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="70%" title="', escape(theFile.name), '"/>'].join('');
                                                        };
                                                    }) (f);
                                                    reader.readAsDataURL(f);
                                                }
                                            }
                                            document.getElementById('file').addEventListener('change', archivo, false);
                                        </script>
                                </div><!-- /.form-group -->
                            </div><!-- /.col-md-2 -->

                            <!-- Nombre, Descripción, Dirección, Teléfono, Divisa, Correo Electrónico, Web -->
                            <div class="col-md-8">
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

                                <!-- Dirección, Teléfono -->
                                <div class="row">
                                    <!-- Dirección -->
                                    <div class="col-md-8">
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
                                    </div><!-- /.col-md-8 -->

                                    <!-- Teléfono -->
                                    <div class="col-md-4">
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
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.row -->

                                <!-- Correo Electrónico, Divisa -->
                                <div class="row">
                                    <!-- Correo Electrónico -->
                                    <div class="col-md-8">
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
                                    </div><!-- /.col-md-8 -->

                                    <!-- Divisa -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Divisa <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-info">
                                                            <i class="fas fa-money-bill-wave"></i>
                                                        </span>
                                                    </div>
                                                    <select name="divisa" id="" class="form-control">
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
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.row -->

                                <!-- Web -->
                                <div class="row">
                                    <!-- Web -->
                                    <div class="col-md-8">
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
                                    </div><!-- /.col-md-8 -->
                                </div><!-- /.row -->
                            </div><!-- /.col-md-10 -->
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
