@extends('backend.layout')

@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                @if(Storage::disk('public')->exists('projects/'.$project->project_picture))
                    <img width="100%" height="80%" src="{{ $project->pathAttachment() }}" alt=""/>
                @else
                    <img class="" width="100%" src="{{ $project->project_picture }}"
                         alt="">
                @endif
            </div>
            <div class="col-xs-7 col-lg-6">
                <h3 style="font-weight: bold;">{{ $project->title }}</h3>
                <a data-toggle="modal" data-target="#m_modal_1" class="m-link m--font-success m--font-bolder"
                   style="padding-bottom: 5px;cursor: pointer">by {{ $artist->artists[0]->nickname }} [{{__('ver_mas')}}
                    ]</a>
                <div class="m-scrollable" data-scrollable="true" style="height: 170px">
                    <p style="text-align: justify">{{ $project->short_description }}</p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{ __('mas_informacion') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-section">
                            <div class="row">
                                <div class="col-xs-5 col-lg-7">
                                    <iframe width="560" height="315"
                                            id="videoYoutube"
                                            src="https://www.youtube.com/embed/{{$project->iframe_video}}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="col-xs-4 col-lg-5">
                                    <div class="form-group">
                                        <h5 style="font-weight: bold">{{ __('estado') }}:</h5>
                                    </div>
                                    <div class="form-group">
                                        @if($project->status == 1)
                                            <span
                                                class="m-badge m-badge--metal m-badge--wide m-badge--rounded">{{ __('revision') }}</span>
                                        @elseif($project->status == 2)
                                            <span class="m-badge m-badge--brand m-badge--wide m-badge--rounded"
                                                  style="background-color: #9816f4 !important;">{{ __('pre_aprobado') }}</span>
                                        @elseif($project->status == 3)
                                            <span
                                                class="m-badge m-badge--success m-badge--wide m-badge--rounded">{{ __('aprobado') }}</span>
                                        @elseif($project->status == 4)
                                            <span
                                                class="m-badge m-badge--info m-badge--wide m-badge--rounded">{{ __('publicado') }}</span>
                                        @else
                                            <span
                                                class="m-badge m-badge--danger m-badge--wide m-badge--rounded">{{ __('rechazado') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <h5 style="font-weight: bold">{{ __('genero') }}:</h5>
                                    </div>
                                    <div class="form-group">
                                        <button
                                            class="btn btn-secondary btn-md">{{ $project->category->category }}</button>
                                    </div>
                                    <div class="form-group">
                                        <h5 style="font-weight: bold">{{ __('costo_proyecto') }}:</h5>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="m--font-success" style="font-weight: bold">
                                            ${{ $project->price }}</h4>
                                    </div>
                                    @if( count($team->teams) != 0)
                                        <div class="form-group">
                                            <h5 style="font-weight: bold">{{ __('integrantes_del_grupo_o_orquesta') }}
                                                :</h5>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" data-toggle="modal" data-target="#list_modal_team"
                                                    class="btn btn-brand m-btn m-btn--icon">
                                                <span>
                                                    <i class="la la-users"></i>
                                                    <span>{{ __('mostrar') }}</span>
                                                </span>
                                            </button>
                                        </div>
                                    @endif

                                <!-- ------------------------- ACCIONES SEGUN LOS ROLES----------------------------- -->

                                    @include('backend.partials.rating.' .\App\User::rating_proyect())

                                <!-- ------------------------- CALIFICACION DEL PROYECTO CUANDO ESTA PUBLICADO Y APROBADO----------------------------- -->
                                    @if($project->status == 3 || $project->status == 4 || $project->status == 5)
                                        <div class="form-group">
                                            <h5 style="font-weight: bold">{{ __('valoracion') }}:</h5>
                                        </div>

                                        <div class="form-group">
                                            <ul id="list_rating_project" class="list-inline" style="font-size: 20px">
                                                <li class="list-inline-item star"><i
                                                        class="fa fa-star fa-1x{{ $project->rating >= 1 ? ' yellow-rating' : '' }}"></i>
                                                </li>
                                                <li class="list-inline-item star"><i
                                                        class="fa fa-star fa-1x{{ $project->rating >= 2 ? ' yellow-rating' : '' }}"></i>
                                                </li>
                                                <li class="list-inline-item star"><i
                                                        class="fa fa-star fa-1x{{ $project->rating >= 3 ? ' yellow-rating' : '' }}"></i>
                                                </li>
                                                <li class="list-inline-item star"><i
                                                        class="fa fa-star fa-1x{{ $project->rating >= 4 ? ' yellow-rating' : '' }}"></i>
                                                </li>
                                                <li class="list-inline-item star"><i
                                                        class="fa fa-star fa-1x{{ $project->rating >= 5 ? ' yellow-rating' : '' }}"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(\App\User::rating_proyect())
                            <div id="show_assign_list_management" style="display: none">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                                {{ __('lista_managements') }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-section">
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-4 col-lg-12">
                                            <div class="box-body table-responsive text-center">
                                                <table class="table table-striped- table-bordered table-hover"
                                                       id="table_assign_management">
                                                    <thead>
                                                    <tr>
                                                        <th>Management</th>
                                                        <th>{{ __('nombre') }}</th>
                                                        <th>{{ __('compañia') }}</th>
                                                        <th>{{ __('email') }}</th>
                                                        <th>{{ __('calificacion') }}</th>
                                                        <th>{{ __('comentario') }}</th>
                                                        <th>{{ __('acciones') }}</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====================================
        MODAL INFORMACION DEL ARTISTA
    ======================================-->
    <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('informacion_artista') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="m-portlet m-portlet--full-height  ">
                                <div class="m-portlet__body">
                                    <div class="m-card-profile">
                                        <div class="m-card-profile__title m--hide">
                                            Your Profile
                                        </div>
                                        <div class="m-card-profile__pic">
                                            <div class="m-card-profile__pic-wrapper">
                                                @if(Storage::disk('public')->exists('users/'.$artist->artists[0]->users->picture))
                                                    <img src="{{ $artist->artists[0]->users->pathAttachment()}}"
                                                         alt=""/>
                                                @else
                                                    <img src="{{ $artist->artists[0]->users->picture }}" alt="">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="m-card-profile__details">
                                            <span
                                                class="m-card-profile__name">{{ $artist->artists[0]->nickname }}</span>

                                            <a href="" class="m-card-profile__email m-link"
                                               style="margin-left: -15px; width: 80%; word-wrap: break-word;">{{ $artist->artists[0]->users->email }}</a>

                                        </div>
                                        @if($country->flag !== null)
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input"
                                                       class="col-2 col-form-label">{{ __('Origen') }}:</label>
                                                <div class="col-10 pull-right">
                                                    <img data-toggle="tooltip" title="{{ $country->country }}"
                                                         src="{{ $country->flag }}" width="21" alt=""
                                                         style="margin-left: 80px;margin-top: 7px">
                                                </div>
                                            </div>
                                        @endif
                                        @if($location->flag !== null)
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input"
                                                       class="col-2 col-form-label">{{ __('localizacion') }}:</label>
                                                <div class="col-10 pull-right">
                                                    <img data-toggle="tooltip" title="{{ $location->country }}"
                                                         src="{{ $location->flag }}" width="21" alt=""
                                                         style="margin-left: 80px;margin-top: 7px">
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-5">
                            <div class="m-portlet">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                                {{ __('biografia') }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <div class="m-scrollable" data-scrollable="true" style="height: 200px">
                                        <p>{{ $artist->artists[0]->biography }}</p>
                                    </div>
                                </div>
                                <div class="m-portlet__foot">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12">
                                            <a target="_blank"
                                               {!! $artist->artists[0]->google ? "href=".$artist->artists[0]->google :'data-toggle="tooltip" title="'.__('no_registrado').'!"'!!}class="p-2 pull-right"
                                               style="color: #dd4b39">
                                                <i class="fab fa-google-plus-g fa-2x"></i>
                                            </a>
                                            <a target="_blank"
                                               {!! $artist->artists[0]->youtube ? "href=".$artist->artists[0]->youtube :'data-toggle="tooltip" title="'.__('no_registrado').'!"'!!} class="p-2 pull-right"
                                               style="color: #bb0000">
                                                <i class="fab fa-youtube fa-2x"></i>
                                            </a>
                                            <a target="_blank"
                                               {!! $artist->artists[0]->instagram ? "href=".$artist->artists[0]->instagram :'data-toggle="tooltip" title="'.__('no_registrado').'!"'!!} class="p-2 pull-right">
                                                <i class="fab fa-instagram fa-2x" style="color: #c13584"></i>
                                            </a>
                                            <a target="_blank"
                                               {!! $artist->artists[0]->facebook ? "href=".$artist->artists[0]->facebook :'data-toggle="tooltip" title="'.__('no_registrado').'!"'!!} class="p-2 pull-right"
                                               style="color: #3b5998">
                                                <i class="fab fa-facebook-square fa-2x"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL, MOSTRAR EL EQUIPO DE ARTISTAS-->
    <div class="modal fade" id="list_modal_team" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('management') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="table_teams">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Rol</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary" id="btnSendMessage">{{ __('enviar') }}</button> --}}
                </div>
            </div>
        </div>
    </div>

@stop

@section('rating.projects')
    <style>
        .swal2-popup .swal2-file:focus,
        .swal2-popup .swal2-input:focus,
        .swal2-popup .swal2-textarea:focus {
            border-color: #716aca;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        function mostrarComentario(texto) {
            swal({
                title: "{{__('mensaje')}}",
                text: texto,
                icon: "success",
            })
        }

        function getRating(rating, star) {
            if (rating == null) {
                return "";
            } else if (star <= rating) {
                return "yellow-rating"
            }
            return "";
        }

        $('#table_assign_management').DataTable({
            "processing": true,
            "serverSide": true,
            "data": null,
            "ajax": {
                url: "{{ route('assign.managements') }}",
                data: {
                    id_project: {{ $project->id }}
                }
            },
            "columns": [
                {
                    render: function (data, type, JsonResultRow, meta) {
                        return '<img src="' + JsonResultRow.users.picture + '" width="60px" style="border-radius: 100%;margin-right: auto;margin-left: auto;display: block"/>';
                    }
                },
                {
                    data: 'users.name',
                    render: function (data, type, JsonResultRow, meta) {
                        return JsonResultRow.users.name + ' ' + JsonResultRow.users.last_name;
                    },
                    defaultContent: '<span class="label label-danger text-center" style="color:red !important">{{ __('nigun_valor_defecto') }}</span>'
                },
                {
                    data: 'company',
                    defaultContent: '<span class="label label-danger text-center" style="color:red !important">{{ __('nigun_valor_defecto') }}</span>'
                },
                {
                    data: 'users.email',
                    defaultContent: '<span class="label label-danger text-center" style="color:red !important">{{ __('nigun_valor_defecto') }}</span>'
                },
                {
                    render: function (data, type, JsonResultRow, meta) {
                        return `
                            <div class="form-group">
                                   <ul id="list_rating" class="list-inline" style="font-size: 20px">
                                        <li class="list-inline-item star"><i
                                                    class="fa fa-star fa-1x ${getRating(JsonResultRow.rating, 1)}"></i></li>
                                        <li class="list-inline-item star"><i
                                                   class="fa fa-star fa-1x ${getRating(JsonResultRow.rating, 2)}"></i></li>
                                        <li class="list-inline-item star"><i
                                                   class="fa fa-star fa-1x ${getRating(JsonResultRow.rating, 3)}"></i></li>
                                        <li class="list-inline-item star"><i
                                                    class="fa fa-star fa-1x ${getRating(JsonResultRow.rating, 4)}"></i></li>
                                        <li class="list-inline-item star"><i
                                                    class="fa fa-star fa-1x ${getRating(JsonResultRow.rating, 5)}"></i></li>
                                     </ul>
                            </div>
                        `;
                    }
                },
                {
                    render: function (data, type, JsonResultRow, meta) {
                        if (JsonResultRow.comment === null) {
                            return "{{ __('nigun_valor_defecto') }}";
                        }
                        return `<div class="text-center"><a onclick='mostrarComentario("${JsonResultRow.comment}")' class="btn m-btn--pill btn-secondary"><i class="fa fa-envelope"></i></a></div>`;
                    }
                },
                {
                    render: function (data, type, JsonResultRow, meta) {
                        return '<div class="text-center"><a href="/dashboard/profile-managament/' + JsonResultRow.users.slug + '" class="btn m-btn--pill btn-secondary"><i class="fa fa-eye"></i></a></div>'
                    }
                },
            ],
            "language": {
                "sProcessing": "{{__('procesando')}}",
                "sLengthMenu": "{{__('mostrar')}} _MENU_ {{__('registros')}}",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "{{__('nigun_dato_tabla')}}",
                "sInfo": "{{__('mostrando_registros') }} _START_ {{__('from')}} _END_ {{__('total_de')}} _TOTAL_ {{__('registros')}}",
                "sInfoEmpty": "{{ __('mostrando_registros_del_cero') }}",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "{{__('buscar')}}:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "{{__('cargando')}}",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "{{__('siguiente')}}",
                    "sPrevious": "{{__('anterior')}}"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });


        $('#table_teams').DataTable({
            "processing": true,
            "serverSide": true,
            "data": null,
            "ajax": "{{ route('team-artist',$project->id) }}",
            "columns": [
                {
                    data: 'name',
                    defaultContent: '<span class="label label-danger text-center">{{ __('nigun_valor_defecto') }}</span>'
                },
                {
                    data: 'role',
                    defaultContent: '<span class="label label-danger text-center">{{ __('nigun_valor_defecto') }}</span>'
                },
            ],
            "language": {
                "sProcessing": "{{__('procesando')}}",
                "sLengthMenu": "{{__('mostrar')}} _MENU_ {{__('registros')}}",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "{{__('nigun_dato_tabla')}}",
                "sInfo": "{{__('mostrando_registros') }} _START_ {{__('from')}} _END_ {{__('total_de')}} _TOTAL_ {{__('registros')}}",
                "sInfoEmpty": "{{ __('mostrando_registros_del_cero') }}",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "{{__('buscar')}}:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "{{__('cargando')}}",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "{{__('siguiente')}}",
                    "sPrevious": "{{__('anterior')}}"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    </script>
@endsection
