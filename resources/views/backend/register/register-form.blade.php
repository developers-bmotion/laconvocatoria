@extends('backend.layout')

@section('header')
    
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h1 class="m-subheader__title--separator">Proceso de registro del aspirante</h1>            
        </div>
    </div>

@stop
@section('content')
    <div class="m-content">
        <!--=====================================
            MOSTAR ALERTA PARA CREAR PROYECTO
        ======================================-->
        @if(session()->has('profile_update'))
            <div class="m-alert m-alert--icon m-alert--outline alert alert-success" role="alert">
                <div class="m-alert__icon">
                    <i class="la la-check"></i>
                </div>
                <div class="m-alert__text">
                    <strong>{{ __('bien_hecho') }}!</strong> {{session('profile_update')}}
                    <i class="la la-hand-o-right pull-right" style="font-size: 25px"></i>
                </div>
                <div class="m-alert__actions" style="width: 30px;">
                    <a href="{{ route('add.project') }}" class="btn m-btn--pill btn-success">{{ __('nuevo_proyecto') }}
                    </a>
                </div>
            </div>
        @endif

        <!--=====================================
            ALERTA LUEGO CREAR LA CUENTA
        ======================================-->
        @if(session()->has('welcome_register'))
            <div class="m-alert m-alert--icon m-alert--outline alert alert-success" role="alert">
                <div class="m-alert__icon">
                    <i class="la la-check"></i>
                </div>
                <div class="m-alert__text">
                    <strong>{{ __('bien_hecho') }}!</strong> {{session('welcome_register')}}
                </div>
            </div>
        @endif

        <form method="post" action="{{ route('update.profile.artist',auth()->user()->id) }}"
            class="m-form m-form--label-align-left- m-form--state-" id="m_form_new_register">
            @csrf {{method_field('PUT')}}

            <!--=====================================
                CONTENIDO PARA SELECCIONAR LA INFORMACIÓN LEGAL
            ======================================-->
            <div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Información
                            </h3>
                        </div>
                    </div>

                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#" data-toggle="m-tooltip"
                                   class="m-portlet__nav-link m-portlet__nav-link--icon"
                                   data-direction="left" data-width="auto" title="Get help with filling up this form">
                                    <i class="flaticon-info m--icon-font-size-lg3"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <div class="row">
                        <!--=====================================
		                    LINEA DE LA CONVOCATORIA
                        ======================================-->
                        <div class="col-lg-6 m-form__group-sub">
                            <label class="form-control-label">Linea de la convocatoria:</label>
                            <select id="select-linea-convocatoria" name="linea_convocatoria" class="form-control m-input m-input--square">
                                <option value="-1">Selecciona una opción</option>
                                    @foreach($artisttypes as $artisttype)
                                        <option value="{{$artisttype->id}}">{{ $artisttype->name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <!--=====================================
		                    ACTUARÁ COMO
                        ======================================-->
                        <div id="content-select-form-actuara-como" class="col-lg-6 m-form__group-sub" style="display: none">
                            <label class="form-control-label">Actuará como:</label>
                            <select id="select-actuara-como" name="actuara_como" class="form-control m-input m-input--square">
                                <option value="-1">Selecciona una opción</option>
                                @foreach($persontypes as $persontype)
                                    <option value="{{$persontype->id}}"> {{ $persontype->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!--=====================================
                INFORMACIÓN DEL ASPIRATEN
            ======================================-->
            <div id="content-informacion-aspirante" style="display: none" class="m-portlet m-portlet--mobile m-portlet--body-progress-">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 id="title-info-aspirante" class="m-portlet__head-text">Información personal del aspirante</h3>
                        </div>
                    </div>

                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#" data-toggle="m-tooltip" class="m-portlet__nav-link m-portlet__nav-link--icon"
                                   data-direction="left" data-width="auto" title="Get help with filling up this form">
                                    <i class="flaticon-info m--icon-font-size-lg3"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="m-form__section m-form__section--first">
                                <div class="m-form__heading">
                                    <h3 class="m-form__heading-title">Información personal</h3>
                                </div>

                                <!--=====================================
                                    NOMBRES Y APELLIDOS
                                ======================================-->
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('name')? 'has-danger':''}}">Nombre *</label>
                                        <input type="text" name="aspirante['name']"class="form-control m-input" 
                                            placeholder=""value="{{ old('name', $artist->users->name)}}">
                                        {!! $errors->first('name','<div class="form-control-feedback">*:message</div>')!!}
                                        <span class="m-form__help">Por favor ingrese su nombre completo</span>
                                    </div>

                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('lastname')? 'has-danger':''}}">Primer apellido *</label>
                                        <input type="text" name="aspirante['lastname']" class="form-control m-input"
                                            placeholder="" value="{{ old('last_name', $artist->users->last_name ) }}">
                                        {!! $errors->first('last_name','<div class="form-control-feedback">*:message</div>')!!}
                                        <span class="m-form__help">Por favor ingrese su primer apellido</span>
                                    </div>
                                </div>

                                <!--=====================================
                                    SEGUNDO APELLIDO Y TÉLEFONO
                                ======================================-->
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('second_last_name')? 'has-danger':''}}">Segundo apellido *</label>
                                        <input type="text" name="aspirante['second_last_name']" class="form-control m-input"
                                            placeholder="" value="{{ old('second_last_name', $artist->users->second_last_name) }}">
                                        {!! $errors->first('second_last_name','<div class="form-control-feedback">*:message</div>')!!}
                                        <span class="m-form__help">Por favor ingrese su segundo apellido</span>
                                    </div>

                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('phone_1')? 'has-danger':''}}">Teléfono celular *</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="la la-phone"></i></span>
                                            </div>
                                            <input type="text" name="aspirante['phone_1']" class="form-control m-input"
                                                placeholder="" value="{{ old('phone_1', $artist->users->phone_1) }}">
                                            {!! $errors->first('phone_1','<div class="form-control-feedback">*:message</div>')!!}
                                        </div>
                                        <span class="m-form__help">Por favor ingrese su número de teléfono valido</span>
                                    </div>
                                </div> 

                                <!--=====================================
                                    TIPO DE DOCUMENTO Y Nº IDENTIFICACIÓN
                                ======================================-->
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('document_type')? 'has-danger':''}}">Tipo de documento *</label>                                        
                                        <select name="aspirante['document_type']" class="form-control m-bootstrap-select m_selectpicker">
                                            @foreach($documenttype as $document_type)
                                                <option value="{{$document_type->id}}" {{ old('document_type',$artist->document_type) == $document_type->id ? 'selected':''}}>
                                                {{ $document_type->document }}</option>
                                            @endforeach
                                            {!! $errors->first('document_type','<div class="form-control-feedback">*:message</div>')!!}
                                        </select>
                                    </div>

                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('identificacion')? 'has-danger':''}}">Nº de indentificación *</label>
                                        <input type="num" name="aspirante['identificacion']" class="form-control m-input"
                                            placeholder="" value="{{ old('identificacion', $artist->identification) }}">
                                        {!! $errors->first('identificacion','<div class="form-control-feedback">*:message</div>')!!}                                        
                                        <span class="m-form__help">Por favor ingrese el número de indentificación</span>
                                    </div>
                                </div>

                                <!--=====================================
                                    DEPARTAMENTO EXPED Y MUNICIPIO DE EXPEDI
                                ======================================-->
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label">Departamento de expedición *</label>
                                        <select name="aspirante['departamento_expedida']" class="form-control m-select2 expedi_departamentos" id="m_select2_1">                 
                                            <option value="-1" >Seleccione departamento</option>
                                            @foreach($departamentos as $departamento)
                                                <option value="{{$departamento->id}}">{{ $departamento->descripcion }}</option>
                                            @endforeach
                                            {!! $errors->first('departamento_expedida','<div class="form-control-feedback">*:message</div>')!!}
                                        </select>
                                    </div>

                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label">Municipio de expedición *</label>
                                        <select name="aspirante['municipio_expedida']" class="form-control m-select2 expid_municipios" id="m_select2_2"></select> 
                                    </div>
                                </div> 

                                <!--=====================================
                                    CARGAR DOCUMENTO
                                ======================================-->
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label for="">Pdf Cédula</label>
                                        <div class="m-dropzone pdf_cedula_dropzone m-dropzone--success"
                                             action="inc/api/dropzone/upload.php" id="m-dropzone-three">
                                            <div class="m-dropzone__msg dz-message needsclick">
                                                <h3 class="m-dropzone__msg-title">Subir documento de identificación</h3>
                                                <span class="m-dropzone__msg-desc">{{ __('arrastra_click_subir') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="m-separator m-separator--dashed m-separator--lg"></div>

                            <!--=====================================
                                DIRECCIÓN Y CIUDAD DE RESIDENCIA
                            ======================================-->
                            <div class="m-form__section">
                                <div class="m-form__heading">
                                    <h3 class="m-form__heading-title">Información de nacimiento y residencia
                                        <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info"
                                           title="Some help text goes here"></i>
                                    </h3>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label">Departamento de nacimiento *</label>
                                        <select  id="m_select2_3" name="aspirante['departamento_nacimiento']" class="form-control m-select2 nacimiento_departamentos">  {{-- m_select2_1_4 --}}                                                 
                                            <option>Seleccione departamento</option>
                                            @foreach($departamentos as $departamento)
                                                <option value="{{$departamento->id}}">
                                                {{ $departamento->descripcion }}</option>
                                            @endforeach
                                            {!! $errors->first('departamento_expedida','<div class="form-control-feedback"> *:message</div>')!!}
                                        </select>
                                    </div>

                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label">Municipio de nacimiento *</label>
                                        <select name="aspirante['municipio_nacimiento']" class="form-control m-select2 nacimiento_municipios" id="m_select2_4"></select> {{-- m_select2_1_5 --}}
                                    </div>
                                </div> 

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('adress')? 'has-danger':''}}">Dirección de residencia *</label>
                                        <input type="text" name="aspirante['address']" class="form-control m-input"
                                            placeholder="" value="{{ old('adress', $artist->adress) }}">
                                        {!! $errors->first('adress','<div class="form-control-feedback">*:message</div>')!!}
                                        <span class="m-form__help">Por favor ingrese dirección de residencia</span>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--=====================================
                INFORMACIÓN DEL MENOR DE EDAD BENEFICIARIO
            ======================================-->
            <div id="content-informacion-menor-edad" class="m-portlet m-portlet--mobile m-portlet--body-progress-" style="display: none">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text"> Información del menor de edad beneficiario</h3>
                        </div>
                    </div>

                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#" data-toggle="m-tooltip" class="m-portlet__nav-link m-portlet__nav-link--icon"
                                   data-direction="left" data-width="auto" title="Get help with filling up this form">
                                    <i class="flaticon-info m--icon-font-size-lg3"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="m-portlet__body">  {{-- toca poner display none para que no se envien los datos --}}
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="m-form__section m-form__section--first">
                                <div class="m-form__heading">
                                    <h3 class="m-form__heading-title">Información del menor de edad</h3>
                                </div>
                               
                                <!--=====================================
                                    NOMBRES Y APELLIDOS MENOR DE EDAD
                                ======================================-->
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('name_menor')? 'has-danger':''}}">Nombre *</label>
                                        <input type="text" name="beneficiario['name']" class="form-control m-input" 
                                            placeholder="" value="{{ old('name_menor', $artist->users->name_menor)}}">
                                        {!! $errors->first('name_menor','<div class="form-control-feedback">*:message</div>')!!}
                                        <span class="m-form__help">Por favor ingrese su nombre completo</span>
                                    </div>

                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('last_name_menor')? 'has-danger':''}}">Primer apellido *</label>
                                        <input type="text" name="beneficiario['lastname']" class="form-control m-input"
                                            placeholder="" value="{{ old('last_name_menor', $artist->users->last_name_menor ) }}">
                                        {!! $errors->first('last_name_menor','<div class="form-control-feedback">*:message</div>')!!}
                                        <span class="m-form__help">Por favor ingrese su primer apellido</span>
                                    </div>
                                </div>

                                <!--=====================================
                                    SEGUNDO APELLIDO Y TÉLEFONO MENOR DE EDAD
                                ======================================-->
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('second_last_name_menor')? 'has-danger':''}}">Segundo apellido *</label>
                                        <input type="text" name="beneficiario['second_lastname']" class="form-control m-input"
                                            placeholder="" value="{{ old('second_last_name', $artist->users->second_last_name_menor) }}">
                                        {!! $errors->first('second_last_name_menor','<div class="form-control-feedback">*:message</div>')!!}
                                        <span class="m-form__help">Por favor ingrese su segundo apellido</span>
                                    </div>

                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('phone_1_menor')? 'has-danger':''}}">Teléfono celular *</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="la la-phone"></i></span>
                                            </div>
                                            <input type="text" name="beneficiario['phone']" class="form-control m-input"
                                                placeholder="" value="{{ old('phone_1', $artist->users->phone_1_menor) }}">
                                            {!! $errors->first('phone_1_menor','<div class="form-control-feedback">*:message</div>')!!}
                                        </div>
                                        <span class="m-form__help">Por favor ingrese su número de teléfono valido</span>
                                    </div>
                                </div> 

                                <!--=====================================
                                    TIPO DE DOCUMENTO Y Nº IDENTIFICACIÓN MENOR
                                ======================================-->
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('document_type_menor')? 'has-danger':''}}">Tipo de documento *</label>                                        
                                        <select name="beneficiario['document_type']" class="form-control m-bootstrap-select m_selectpicker">
                                            <option value="2">Tarjeta de identidad</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label {{$errors->has('identificacion_menor')? 'has-danger':''}}">Nº de indentificación *</label>
                                        <input type="num" name="beneficiario['identificacion']" class="form-control m-input"
                                            placeholder="" value="{{ old('identificacion_menor', $artist->identification_menor) }}">
                                        {!! $errors->first('identificacion_menor','<div class="form-control-feedback">*:message</div>')!!}
                                        <span class="m-form__help">Por favor ingrese el número de indentificación</span>
                                    </div>
                                </div> 

                                <!--=====================================
                                    DEPARTAMENTO EXPED Y MUNICIPIO DE EXPEDI MENOR
                                ======================================-->
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label">Departamento de expedición *</label>
                                        <select name="beneficiario['departamento_expedida']" class="form-control m-select2 expedi_departamentos_menor" id="m_select2_5"> {{-- m_select2_1_6 --}}
                                            <option>Seleccione departamento</option>
                                            @foreach($departamentos as $departamento)
                                                <option value="{{$departamento->id}}">
                                                {{ $departamento->descripcion }}</option>
                                            @endforeach
                                            {!! $errors->first('departamento_expedida_menor','<div class="form-control-feedback"> *:message</div>')!!}
                                        </select>
                                    </div>

                                    <div class="col-lg-6 m-form__group-sub">
                                        <label class="form-control-label">Municipio de expedición *</label>
                                        <select name="beneficiario['municipio_expedida']" class="form-control m-select2 expid_municipios_menor" id="m_select2_6"></select> {{-- m_select2_1_7 --}}
                                    </div>
                                </div> 

                                <!--=====================================
                                    CARGAR DOCUMENTO Y FECHA DE NACIMIENTO MENOR
                                ======================================-->
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label for="">PDF documento de identidad</label>
                                        <div class="m-dropzone pdf_cedula_dropzone m-dropzone--success"
                                            action="inc/api/dropzone/upload.php" id="m-dropzone-three">
                                            <div class="m-dropzone__msg dz-message needsclick">
                                                <h3 class="m-dropzone__msg-title">Subir documento de identificación</h3>
                                                <span class="m-dropzone__msg-desc">{{ __('arrastra_click_subir') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 m-form__group-sub">
                                        <label for="example-text-input" class="form-control-label">Fecha de nacimiento</label>                                        
                                        <input type="text" name="beneficiario['birthdate']" class="form-control" value="" 
                                            id="datepicker_fecha_nacimiento" readonly placeholder="{{ __('fecha_nacimiento') }}" />
                                    </div>
                                </div>
                                
                                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                
                                <!--=====================================
                                    DIRECCIÓN Y CIUDAD DE RESIDENCIA MENOR
                                ======================================-->
                                <div class="m-form__section">
                                    <div class="m-form__heading">
                                        <h3 class="m-form__heading-title">Información de nacimiento y residencia
                                            <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info"
                                                title="Some help text goes here"></i>
                                        </h3>
                                    </div>

                                   <div class="form-group m-form__group row">
                                        <div class="col-lg-6 m-form__group-sub">
                                            <label class="form-control-label">Departamento de nacimiento *</label>
                                            <select id="m_select2_7" name="beneficiario['departamento_nacimiento']" class="form-control m-select2 nacimiento_departamentos_menor"> {{-- m_select2_1_8 --}}
                                                <option>Seleccione departamento</option>
                                                @foreach($departamentos as $departamento)
                                                    <option value="{{$departamento->id}}">{{ $departamento->descripcion }}</option>
                                                @endforeach
                                                {!! $errors->first('departamento_expedida','<div class="form-control-feedback">*:message</div>')!!}
                                            </select>
                                        </div>

                                        <div class="col-lg-6 m-form__group-sub">
                                            <label class="form-control-label">Municipio de nacimiento *</label>
                                            <select name="beneficiario['municipio_nacimiento']" class="form-control m-select2 nacimiento_municipios_menor" id="m_select2_8"></select> 
                                        </div>
                                    </div> 

                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-6 m-form__group-sub">
                                            <label class="form-control-label {{$errors->has('adress')? 'has-danger':''}}">Dirección de residencia *</label>
                                            <input type="text" name="beneficiario['address']" class="form-control m-input"
                                                placeholder="" value="">
                                            {!! $errors->first('adress','<div class="form-control-feedback">*:message</div>')!!}
                                            <span class="m-form__help">Por favor ingrese dirección de residencia</span>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--=====================================
                INFORMACIÓN DEL GRUPO
            ======================================-->
            <div id="content-informacion-grupo-musical" style="display: none" class="m-portlet m-portlet--mobile m-portlet--body-progress-">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">Datos del Grupo Musical</h3>
                        </div>
                    </div>

                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#" data-toggle="m-tooltip" class="m-portlet__nav-link m-portlet__nav-link--icon"
                                   data-direction="left" data-width="auto" title="Get help with filling up this form">
                                    <i class="flaticon-info m--icon-font-size-lg3"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col col-lg-12" style="padding-bottom: 1.5rem;">
                            <div class="row" style="padding-left: 1rem;">
                                <div class="col-3 form-group m-form__group row">
                                    <label for="example-number-input">Ingrese el número de integrantes</label>
                                    <input id="input-max-members" class="form-control m-input" type="number" value="">
                                </div>
                                <div class="col-lg-4">
                                    <div id="event-add-max-members" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide" style="margin: 2rem 2rem 0; padding: 0.8rem 2rem;">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>Agregar Integrantes</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <span id="help-max-members" class="m-form__help" style="display:none; margin-top: -1rem; color: #f4516c; font-size: 1rem;">Recuerde que el número máximo de integrantes para el grupo es 12 personas</span>
                        </div>

                        <div class="col col-lg-12">
                            <div class="m-tabs-content" id="m_sections">
                                <!-- add members group -->
                                <div class="m-tabs-content__item m-tabs-content__item--active" id="m_section_1">
                                    {{-- <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">General Instruction</h4> --}}
                                    <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_1_content">

                                        <!--begin::Item-->
                                        {{-- <div id="member-uno" class="m-accordion__item">
                                            <div class="m-accordion__item-head collapsed-" role="tab" id="section_members_head_1" data-toggle="collapse" href="#section_members_body_1">
                                                <span class="m-accordion__item-title">Datos de la Persona</span>                                                
                                                <span class="m-accordion__item-mode"></span>                                                
                                            </div>
                                            <div class="m-accordion__item-body collapse show" id="section_members_body_1" role="tabpanel" aria-labelledby="section_members_head_1" data-parent="#m_section_1_content">
                                                <div class="m-accordion__item-content">          
                                                    <p>
                                                        parte uno
                                                    </p>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!--end::Item-->                                
                                    </div>
                                </div>
                                <!-- add members group -->
                                
                                {{-- Boton para agregar nuevos integrantes --}}
                                {{-- <div class="col-lg-4 mt-3">
                                    <div id="add-new-member" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>Agregar Nuevo Integrante</span>
                                        </span>
                                    </div>
                                </div> --}}

                                {{-- <div id="limit-members" class="mt-3" style="display: none; color: #f4516c; ">Lo sentimos solo se admite un maximo de 12 integrantes por grupo</div> --}}
                            </div>                            
                        </div>                        
                    </div>
                </div>
            </div>

            <!--=====================================
                BOTON ENVIAR DATOS
            ======================================-->
            <div id="btn-enviar-datos" style="display: none" class="m-portlet m-portlet--mobile m-portlet--body-progress-">
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group m-form__group--sm row">
                                <div class="col-xl-12">
                                    <div class="m-checkbox-inline">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                            <input type="checkbox" name="accept" value="1">Haga clic aquí para indicar que ha leído y acepta el
                                            acuerdo de Términos y Condiciones.
                                            <span></span>
                                        </label>
                                    </div>

                                    <button class=" pull-right btn btn-primary m-btn m-btn--custom m-btn--icon" data-wizard-action="submit">
                                        <span>
                                            <i class="la la-check"></i>&nbsp;&nbsp;
                                            <span>Enviar registro</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('js.form-register')
    <script src="/backend/assets/js/form-register.js" type="text/javascript"></script>
@endsection
@section('dropzonePhotoArtist')
    <script>
        /* variables que se emplean en form-register */
        var typeDocument = @json($documenttype);
        var departamentos = @json($departamentos);

        var BootstrapDatepicker = function () {
            var arrows;

            if (mUtil.isRTL()) {
                arrows = {
                    leftArrow: '<i class="la la-angle-right"></i>',
                    rightArrow: '<i class="la la-angle-left"></i>'
                }
            } else {
                arrows = {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            }
            //== Private functions
            var demos = function () {
                // minimum setup
                $('#datepicker_fecha_nacimiento #m_datepicker_1_validate').datepicker({
                    rtl: mUtil.isRTL(),
                    todayHighlight: true,
                    orientation: "bottom left",
                    language: 'es',
                    startDate: '-18y',
                    templates: arrows
                });

                $('#datepicker_fecha_nacimiento').datepicker({
                    rtl: mUtil.isRTL(),
                    language: 'es',
                    startDate: '-18y',
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows
                });
            }

            return {
                // public functions
                init: function () {
                    demos();
                }
            };
        }();

        jQuery(document).ready(function () {
            BootstrapDatepicker.init();
        });

        new Dropzone('.dropzone', {
            url: '{{ route('profile.photo.artist') }}',
            acceptedFiles: 'image/*',
            maxFiles: 1,
            paramName: 'photo',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (file, response) {
                $('#inputImagenesPostPlan').val(response);
                location.reload();
            }
        });

        /* Dropzone.autoDiscover = false; */
        /* {{-- new Dropzone('.front_dropzone', {
            url: '{{ route('front.photo.artist') }}',
            acceptedFiles: 'image/*',
            maxFiles: 1,
            paramName: 'front_photo',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (file, response) {

                $('#inputImagenesPostPlan').val(response);
                location.reload();
            }

        }); --}} */

        new Dropzone('.pdf_cedula_dropzone', {
            url: '{{ route('cedula.pdf.aspirante') }}',
            acceptedFiles: '.pdf',
            maxFiles: 1,
            paramName: 'pdf_cedula_name',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (file, response) {
                $('#inputImagenesPostPlan').val(response);
                /* {{-- location.reload(); --}} */
            }
        });


        Dropzone.autoDiscover = false;

        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            // allowDropdown: false,
            // autoHideDialCode: false,
            // autoPlaceholder: "off",
            // dropdownContainer: document.body,
            // excludeCountries: ["us"],
            // formatOnDisplay: false,
            // geoIpLookup: function(callback) {
            //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            //     var countryCode = (resp && resp.country) ? resp.country : "";
            //     callback(countryCode);
            //   });
            // },
            // hiddenInput: "full_number",
            // initialCountry: "auto",
            // localizedCountries: { 'de': 'Deutschland' },
            // nationalMode: false,
            // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            // placeholderNumberType: "MOBILE",
            // preferredCountries: ['cn', 'jp'],
            // separateDialCode: true,
            utilsScript: "/backend/build/js/utils.js",
        });
    </script>
@endsection
