@extends('backend.layout')

@section('header')
{{--@if($errors->any())

        <ul class="list-group">

            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> {{$error}}
</div>
@endforeach

</ul>

@endif--}}
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="m-subheader__title--separator">Perfil del Aspirante</h1>
        {{-- <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
            <li class="m-nav__item m-nav__item--home">
                <a href="#" class="m-nav__link m-nav__link--icon">
                    <i class="m-nav__link-icon la la-user"></i>
                </a>
            </li>
            <li class="m-nav__separator">-</li>
            <li class="m-nav__item">
                <a href="" class="m-nav__link">
                    <span class="m-nav__link-text">{{__('perfil')}} {{ __('artista') }}</span>
        </a>
        </li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item">
            <a href="" class="m-nav__link">
                <span class="m-nav__link-text"></span>
            </a>
        </li>
        </ul> --}}
    </div>
    <div>
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
    <div class="m-portlet m-portlet--full-height">

        <!--begin: Portlet Head-->
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Proceso de registro del aspirante
                        {{-- <small>form wizard example</small> --}}
                    </h3>
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

        <!--end: Portlet Head-->

        <!--begin: Form Wizard-->
        <div class="m-wizard m-wizard--2 m-wizard--success" id="m_wizard">

            <!--begin: Message container -->
            <div class="m-portlet__padding-x">

                <!-- Here you can put a message or alert -->
            </div>

            <!--end: Message container -->

            <!--begin: Form Wizard Head -->
            <div class="m-wizard__head m-portlet__padding-x">

                <!--begin: Form Wizard Progress -->
                <div class="m-wizard__progress">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>

                <!--end: Form Wizard Progress -->

                <!--begin: Form Wizard Nav -->
                <div class="m-wizard__nav">
                    <div class="m-wizard__steps">
                        <div class="m-wizard__step m-wizard__step--current" m-wizard-target="m_wizard_form_step_1">
                            <a href="#" class="m-wizard__step-number">
                                <span><i class="fa  flaticon-placeholder"></i></span>
                            </a>
                            <div class="m-wizard__step-info">
                                <div class="m-wizard__step-title">
                                    1. Información del aspirante
                                </div>
                                <div class="m-wizard__step-desc">
                                    Lorem ipsum doler amet elit<br>
                                    sed eiusmod tempors
                                </div>
                            </div>
                        </div>
                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                            <a href="#" class="m-wizard__step-number">
                                <span><i class="fa  flaticon-layers"></i></span>
                            </a>
                            <div class="m-wizard__step-info">
                                <div class="m-wizard__step-title">
                                    2. Información para la convocatoria
                                </div>
                                <div class="m-wizard__step-desc">
                                    Lorem ipsum doler amet elit<br>
                                    sed eiusmod tempors
                                </div>
                            </div>
                        </div>
                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
                            <a href="#" class="m-wizard__step-number">
                                <span><i class="fa  flaticon-layers"></i></span>
                            </a>
                            <div class="m-wizard__step-info">
                                <div class="m-wizard__step-title">
                                    3. Confirmation
                                </div>
                                <div class="m-wizard__step-desc">
                                    Lorem ipsum doler amet elit<br>
                                    sed eiusmod tempors
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end: Form Wizard Nav -->
            </div>

            <!--end: Form Wizard Head -->

            <!--begin: Form Wizard Form-->
            <div class="m-wizard__form">

                <form method="post" action="{{ route('update.profile.artist',auth()->user()->id) }}" class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                    @csrf {{method_field('PUT')}}
                    <!--begin: Form Body -->
                    <div class="m-portlet__body">

                        <!--=====================================
                          1.  INFORMACIÓN PERSONAL
                        ======================================-->
                        <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">
                                    <div class="m-form__section m-form__section--first">
                                        <div class="m-form__heading">
                                            <h3 class="m-form__heading-title">Información personal</h3>
                                        </div>


                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">

                                                <label class="form-control-label {{$errors->has('name')? 'has-danger':''}}">* Nombre:</label>

                                                <input type="text" name="name" class="form-control m-input"
                                                    placeholder="" value="{{ old('name', $artist->name) }}">
                                                    {!! $errors->first('name','<div class="form-control-feedback">*:message
                                                    </div>')!!}

                                                <span class="m-form__help">Por favor ingrese su nombre completo</span>


                                            </div>
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label {{$errors->has('last_name')? 'has-danger':''}}">* Primer
                                                    apellido:</label>

                                                <input type="text" name="lastname" class="form-control m-input"
                                                    placeholder="" value="{{ old('last_name', $artist->last_name) }}">
                                                    {!! $errors->first('last_name','<div class="form-control-feedback">*:message
                                                    </div>')!!}
                                                <span class="m-form__help">Por favor ingrese su primer
                                                    apellido</span>

                                            </div>
                                        </div>


                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">

                                                <label class="form-control-label {{$errors->has('second_last_name')? 'has-danger':''}}">* Segundo apellido:</label>

                                                <input type="text" name="second_last_name" class="form-control m-input"
                                                    placeholder="" value="{{ old('second_last_name', $artist->second_last_name) }}">
                                                    {!! $errors->first('second_last_name','<div class="form-control-feedback">*:message
                                                    </div>')!!}
                                                <span class="m-form__help">Por favor ingrese su segundo apellido</span>
                                            </div>
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label {{$errors->has('phone_1')? 'has-danger':''}}">* Teléfono celular:</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-phone"></i></span></div>
                                                    <input type="text" name="phone_1" class="form-control m-input"
                                                        placeholder="" value="{{ old('phone_1', $artist->phone_1) }}">
                                                        {!! $errors->first('phone_1','<div class="form-control-feedback">*:message
                                                        </div>')!!}
                                                </div>
                                                <span class="m-form__help">Por favor ingrese su número de teléfono
                                                    valido</span>
                                            </div>
                                        </div>




                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">

                                                <label class="form-control-label {{$errors->has('document_type')? 'has-danger':''}}">* Tipo de documento:</label>

                                                {{-- <select name="country" class="form-control m-input">
                                                    <option value="">Selecciona una opción</option>
                                                    <option value="CC" {{ old('document_type',$artist->document_type) == $documenttype->id ? 'selected':''}}>Cédula de Ciudadania</option>
                                                    <option value="TI" {{ old('document_type',$artist->document_type) == $documenttype->id ? 'selected':''}}>Tarjeta de Identidad</option>
                                                </select> --}}

                                                <select name="document_type" class="form-control m-bootstrap-select m_selectpicker">
                                                    @foreach($documenttype as $document_type)
                                                    <option value="{{$document_type->id}}"
                                                        {{ old('document_type',$artist->document_type) == $document_type->id ? 'selected':''}}>
                                                        {{ $document_type->document }}</option>
                                                    @endforeach
                                                    {!! $errors->first('document_type','<div class="form-control-feedback">*:message
                                                    </div>')!!}
                                                </select>

                                            </div>
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label">* Nº de
                                                    indentificación:</label>

                                                <input type="num" name="identificacion" class="form-control m-input"
                                                    placeholder="" value="121312312121">
                                                <span class="m-form__help">Por favor ingrese el número de
                                                    indentificación</span>


                                            </div>
                                        </div>


                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">

                                                <label class="form-control-label">* Departamento de expedición:</label>

                                                <select class="form-control m-select2 expedi_departamentos" id="m_select2_1_3">
                                                    <option>Seleccione departamento</option>
                                                    @foreach($departamentos as $departamento)
                                                    <option value="{{$departamento->id}}"
                                                        {{ old('departamento_expedida',$artist->expedition_place) == $departamento->id ? 'selected':''}}>
                                                        {{ $departamento->descripcion }}</option>
                                                    @endforeach
                                                    {!! $errors->first('departamento_expedida','<div class="form-control-feedback">*:message
                                                    </div>')!!}
                                                </select>


                                            </div>
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label">* Municipio de expedición:</label>

                                                <select name="municipio_expedida" class="expid_municipios form-control m-select2" id="m_select2_1">
                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                    <div class="m-form__section">
                                        <div class="m-form__heading">
                                            <h3 class="m-form__heading-title">
                                                Información de nacimiento y residencia
                                                <i data-toggle="m-tooltip" data-width="auto"
                                                    class="m-form__heading-help-icon flaticon-info"
                                                    title="Some help text goes here"></i>
                                            </h3>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">

                                                <label class="form-control-label">* Departamento de nacimiento:</label>

                                                <select class="form-control m-select2 expedi_departamentos" id="m_select2_1_4">
                                                    <option>Seleccione departamento</option>
                                                    @foreach($departamentos as $departamento)
                                                    <option value="{{$departamento->id}}"
                                                        {{ old('departamento_expedida',$artist->expedition_place) == $departamento->id ? 'selected':''}}>
                                                        {{ $departamento->descripcion }}</option>
                                                    @endforeach
                                                    {!! $errors->first('departamento_expedida','<div class="form-control-feedback">*:message
                                                    </div>')!!}
                                                </select>


                                            </div>
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label">* Municipio de nacimiento:</label>

                                                <select name="municipio_expedida" class="expid_municipios form-control m-select2" id="m_select2_1_5">
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">

                                                <label class="form-control-label {{$errors->has('name')? 'has-danger':''}}">* Dirección de residencia:</label>

                                                <input type="text" name="name" class="form-control m-input"
                                                    placeholder="" value="{{ old('name', $artist->name) }}">
                                                    {!! $errors->first('name','<div class="form-control-feedback">*:message
                                                    </div>')!!}

                                                <span class="m-form__help">Por favor ingrese dirección de residencia</span>


                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--=====================================
                          2.  INFORMACIÓN PARA EL CONCURSO
                        ======================================-->

                        <div class="m-wizard__form-step" id="m_wizard_form_step_2">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">
                                    <div class="m-form__section m-form__section--first">
                                        <div class="m-form__heading">
                                            <h3 class="m-form__heading-title">Información para convocatoria </h3>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">

                                                <label class="form-control-label">* Actuará como:</label>

                                                <select name="country" class="form-control m-input">
                                                    <option value="">Selecciona una opción</option>
                                                    <option value="CC">Personal natural</option>
                                                    <option value="TI">Grupo constituido</option>
                                                </select>

                                            </div>
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label">* Linea de la convocatoria:</label>

                                                <select name="country" class="form-control m-input">
                                                    <option value="">Selecciona una opción</option>
                                                    <option value="CC">Solista</option>
                                                    <option value="TI">Agrupación musical</option>
                                                </select>
                                                <span class="m-form__help">Si es agrupación, máximo 12
                                                    integrantes</span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">

                                                <label class="form-control-label">* Modalidad en la que
                                                    participa:</label>

                                                <select name="country" class="form-control m-input">
                                                    <option value="">Selecciona una opción</option>
                                                    <option value="CC">Personal natural</option>
                                                    <option value="TI">Grupo constituido</option>
                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--=====================================
                          3.  CONFIRMACIÓN PARA ENVIAR DATOS
                        ======================================-->

                        <div class="m-wizard__form-step" id="m_wizard_form_step_3">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">

                                    <!--begin::Section-->
                                    <ul class="nav nav-tabs m-tabs-line--2x m-tabs-line m-tabs-line--danger"
                                        role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab"
                                                href="#m_form_confirm_1" role="tab">1. Client Information</a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_form_confirm_2"
                                                role="tab">2. Account Setup</a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_form_confirm_3"
                                                role="tab">3. Billing Setup</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content m--margin-top-40">
                                        <div class="tab-pane active" id="m_form_confirm_1" role="tabpanel">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h4 class="m-form__heading-title">Client Details</h4>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Name:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">Nick Stone</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">nick.stone@gmail.com</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">+206-78-55034890</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h4 class="m-form__heading-title">Corresponding Address <i
                                                            data-toggle="m-tooltip" data-width="auto"
                                                            class="m-form__heading-help-icon flaticon-info"
                                                            title="Some help text goes here"></i></h4>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Address Line
                                                        1:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">Headquarters 1120 N Street
                                                            Sacramento 916-654-5266</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Address Line
                                                        2:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">P.O. Box 942873 Sacramento,
                                                            CA 94273-0001</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">City:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">Polo Alto</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">State:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">California</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Country:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">USA</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="m_form_confirm_2" role="tabpanel">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h4 class="m-form__heading-title">Account Details</h4>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">URL:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span
                                                            class="m-form__control-static">sinortech.vertoffice.com</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Username:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">sinortech.admin</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Password:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">*********</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h4 class="m-form__heading-title">Account Details</h4>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">URL:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span
                                                            class="m-form__control-static">sinortech.vertoffice.com</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Username:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">sinortech.admin</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Password:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">*********</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="m_form_confirm_3" role="tabpanel">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__section">
                                                    <div class="m-form__heading">
                                                        <h4 class="m-form__heading-title">Client Settings</h4>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">User
                                                            Group:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static">Customer</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label">Communications:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static">Phone, Email</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end::Section-->

                                    <!--end::Section-->
                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                    <div class="form-group m-form__group m-form__group--sm row">
                                        <div class="col-xl-12">
                                            <div class="m-checkbox-inline">
                                                <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                                    <input type="checkbox" name="accept" value="1">
                                                    Click here to indicate that you have read and agree to the terms
                                                    presented in the Terms and Conditions agreement
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 3-->
                    </div>

                    <!--end: Form Body -->
                    <!--=====================================
                        BOTONES DE ACCIONES
                    ======================================-->
                    <!--begin: Form Actions -->
                    <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                        <div class="m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4 m--align-left">
                                    <a href="#" class="btn btn-secondary m-btn m-btn--custom m-btn--icon"
                                        data-wizard-action="prev">
                                        <span>
                                            <i class="la la-arrow-left"></i>&nbsp;&nbsp;
                                            <span>Volver</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-lg-4 m--align-right">
                                    <button type="submit" class="btn btn-primary m-btn m-btn--custom m-btn--icon"
                                        data-wizard-action="submit">
                                        <span>
                                            <i class="la la-check"></i>&nbsp;&nbsp;
                                            <span>Enviar registro</span>
                                        </span>
                                    </button>
                                    <a href="#" class="btn btn-warning m-btn m-btn--custom m-btn--icon"
                                        data-wizard-action="next">
                                        <span>
                                            <span>Continuar</span>&nbsp;&nbsp;
                                            <i class="la la-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </div>
                    </div>

                    <!--end: Form Actions -->
                </form>
            </div>

            <!--end: Form Wizard Form-->
        </div>

        <!--end: Form Wizard-->
    </div>


</div>
@stop
@section('dropzonePhotoArtist')
<script>
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
                    templates: arrows
                });
                $('#datepicker_fecha_nacimiento').datepicker({
                    rtl: mUtil.isRTL(),
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

           /* $("#expedi_departamentos").change(function(){

                var departament_id = $(this).val();
                if($.trim(departament_id) != '' ){

                    $.get('get-municipios', {departament_id: departament_id}, function(municipios){
                        alert('hola');
                        console.log(municipios);
                        $('.expid_municipios').empty();
                        $('.expid_municipios').append('<option value= "">Selecciona ciuidad o municipio</option>');
                        {{-- $.each(municipios, function(index, value){
                            $('.expid_municipios').append("<option value= '"+index+"'>"+value+"</option> ");
                        }); --}}
                    });
                }
            });
            */



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

        new Dropzone('.front_dropzone', {
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
