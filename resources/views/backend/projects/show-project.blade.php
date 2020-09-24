@extends('backend.layout')

@section('content')
    <div class="m-content">
        {{-- <div class="row"> --}}
            {{-- <div class="col-xl-5 col-lg-6">
                @if(Storage::disk('public')->exists('projects/'.$project->project_picture))
                    <img width="100%" height="80%" src="{{ $project->pathAttachment() }}" alt=""/>
                @else
                    <img class="" width="100%" src="{{ $project->project_picture }}"
                         alt="">
                @endif
            </div> --}}
            {{-- <div class="col-xs-7 col-lg-6">
                <h3 style="font-weight: bold;">{{ $project->title }}</h3>
                <a data-toggle="modal" data-target="#m_modal_1" class="m-link m--font-success m--font-bolder"
                   style="padding-bottom: 5px;cursor: pointer">by {{ $artist->artists[0]->nickname }} [{{__('ver_mas')}}
                    ]</a>
                <div class="m-scrollable" data-scrollable="true" style="height: 170px">
                    <p style="text-align: justify">{{ $project->short_description }}</p>
                </div>
            </div>
        </div> --}}
        <br>
        <br>
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{ __('informacion_artista') }}
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__body ">
                        <div class="row">

                        <div class="col-md-4">

                        <div class="m-portlet m-portlet--full-height  ">
                            <div class="m-portlet__body ">
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
                                        {{-- <div class="form-group m-form__group row" style="margin-left: 5.79rem;">
                                            <label for="example-text-input"
                                                   class="col-3 col-form-label mt-1">{{ __('Origen') }}:</label>
                                            <div class="col-4 pull-right mt-3">
                                                <span>{{$country->descripcion}}</span>

                                            </div>
                                        </div> --}}


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="biografia col-md-7">
                    <div class="row">

                        <div class="col-md-6 mt-2">

                            <label style="font-weight: bold">{{ __('biografia') }}:</label>
                            <div class="m-scrollable" data-scrollable="true" style="">
                                <p style="text-align: justify">{{ $artist->artists[0]->biography }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                        <label style="font-weight: bold">Identificación:</label>
                        <div class="m-scrollable" data-scrollable="true" style="">
                            <p>{{ $artist->artists[0]->identification }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label style="font-weight: bold">Direccion:</label>
                        <div class="m-scrollable" data-scrollable="true" style="">
                            <p>{{ $artist->artists[0]->adress }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label style="font-weight: bold">Fecha de nacimiento:</label>
                        <div class="m-scrollable" data-scrollable="true" style="">
                            <p>{{ Carbon\Carbon::parse($artist->artists[0]->byrthdate)->formatLocalized('%d de %B de %Y') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label style="font-weight: bold">Ciudad:</label>
                        <div class="m-scrollable" data-scrollable="true" style="">
                 <p>{{$country->descripcion}}</p>
                        </div>

             </div>


                        @if($artist->artists[0]->township)
                        <div class="col-md-6 mt-2">
                        <label style="font-weight: bold">Vereda/Corregimiento:</label>
                        <div class="m-scrollable" data-scrollable="true" style="">
                            <p>{{$artist->artists[0]->township }}</p>
                        </div>
                        </div>
                        @endif
                        <div class="col-md-6 mt-2">
                        <label style="font-weight: bold">Teléfono:</label>
                        <div class="m-scrollable" data-scrollable="true" style="">
                            <p>{{ $artist->artists[0]->users->phone_1}}</p>
                        </div>
                        </div>
                        <div class="col-md-6 mt-2">
                        <label style="font-weight: bold">Linea de convocatoria:</label>
                        <div class="m-scrollable" data-scrollable="true" style="">
                            <p>{{ $artist->artists[0]->personType->name}}</p>
                        </div>
                        </div>
                        <div class="col-md-6 mt-2">
                        <label style="font-weight: bold">Actuara como:</label>
                        <div class="m-scrollable" data-scrollable="true" style="">
                            <p>{{ $artist->artists[0]->artistType->name}}</p>
                        </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label style="font-weight: bold">Documento de identificación:</label>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verpdfidentificacion">
                                Ver documento de identidad
                              </button>
                        </div>
                        @if($artist->artists[0]->users->phone_2)
                        <div class="col-md-6 mt-2">
                        <label style="font-weight: bold">Otro teléfono:</label>
                        <div class="m-scrollable" data-scrollable="true" style="">
                            <p>{{$artist->artists[0]->users->phone_2 }}</p>
                        </div>
                        </div>
                        @endif




                    </div>
                </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
                {{-- informacion de beneficiario --}}
                @if(count($artist->artists[0]->beneficiary) != 0)
                <div class="row">
                    <div class="col-xl-12 col-lg-8">
                        <div class="m-portlet m-portlet--full-height ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Información del beneficiario
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="m-portlet__body ml-5">
                                <div class="row">


                            <div class="biografia col-md-12">
                            <div class="row">


                                <div class="col-md-4 mt-2">
                                <label style="font-weight: bold">Tipo identificación:</label>
                                <div class="m-scrollable" data-scrollable="true" style="">
                                    <p>{{ $artist->artists[0]->beneficiary[0]->documentType->document}}</p>
                                </div>
                            </div>
                                <div class="col-md-4 mt-2">
                                <label style="font-weight: bold">Identificación:</label>
                                <div class="m-scrollable" data-scrollable="true" style="">
                                    <p>{{ $artist->artists[0]->beneficiary[0]->identification}}</p>
                                </div>
                            </div>
                                <div class="col-md-4 mt-2">
                                <label style="font-weight: bold">Nombre:</label>
                                <div class="m-scrollable" data-scrollable="true" style="">
                                    <p>{{ $artist->artists[0]->beneficiary[0]->name}}</p>
                                </div>
                            </div>
                                <div class="col-md-4 mt-2">
                                <label style="font-weight: bold">Apellidos:</label>
                                <div class="m-scrollable" data-scrollable="true" style="">
                                    <p>{{ $artist->artists[0]->beneficiary[0]->last_name}} {{ $artist->artists[0]->beneficiary[0]->second_last_name}}</p>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label style="font-weight: bold">Direccion:</label>
                                <div class="m-scrollable" data-scrollable="true" style="">
                                    <p>{{ $artist->artists[0]->beneficiary[0]->adress}}</p>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label style="font-weight: bold">Fecha de nacimiento:</label>
                                <div class="m-scrollable" data-scrollable="true" style="">
                                    <p>{{  Carbon\Carbon::parse($artist->artists[0]->beneficiary[0]->birthday)->formatLocalized('%d de %B de %Y') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label style="font-weight: bold">Ciudad:</label>
                                <div class="m-scrollable" data-scrollable="true" style="">
                         <p>{{ $artist->artists[0]->beneficiary[0]->city->descripcion}}</p>
                                </div>

                     </div>


                                @if($artist->artists[0]->township)
                                <div class="col-md-4 mt-2">
                                <label style="font-weight: bold">Vereda/Corregimiento:</label>
                                <div class="m-scrollable" data-scrollable="true" style="">
                                    <p>{{ $artist->artists[0]->beneficiary[0]->township}}</p>
                                </div>
                                </div>
                                @endif
                                <div class="col-md-4 mt-2">
                                <label style="font-weight: bold">Teléfono:</label>
                                <div class="m-scrollable" data-scrollable="true" style="">
                                    <p>{{ $artist->artists[0]->beneficiary[0]->phone}}</p>
                                </div>
                                </div>
                                <div class="col-md-4 mt-2">

                                    <label style="font-weight: bold">{{ __('biografia') }}:</label>
                                    <div class="m-scrollable" data-scrollable="true" style="">
                                        <p style="text-align: justify">{{ $artist->artists[0]->beneficiary[0]->biography}}</p>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label style="font-weight: bold">Documento de identificación:</label>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pdfidentificacionBeneficiario">
                                        Ver documento de identidad
                                      </button>
                                </div>



                            </div>
                        </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- modal documento benefifciario --}}

                <div class="modal fade" id="pdfidentificacionBeneficiario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">
                                Documento de {{ $artist->artists[0]->beneficiary[0]->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if(!$artist->artists[0]->beneficiary[0]->pdf_documento)
                            <p>No se cargo el documento correctamente</p>
                        @else
                            <div>
                                <embed src="{{ $artist->artists[0]->beneficiary[0]->pdf_documento}}" frameborder="0" width="100%" height="400px">
                                </div>
                        @endif
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
                @endif
                {{-- mostrar integrantes de grupo --}}
                @if( count($artist->artists[0]->teams) != 0)

           <!--begin::Portlet-->
               <div class="m-portlet m-portlet--full-height">
                   <div class="m-portlet__head">
                       <div class="m-portlet__head-caption">
                           <div class="m-portlet__head-title">
                               <h3 class="m-portlet__head-text">
                                   Información de los integrantes
                               </h3>
                           </div>
                       </div>
                   </div>
                   <div class="m-portlet__body">

                       <!--begin::Section-->
                       <div class="m-accordion m-accordion--bordered m-accordion--solid" id="m_accordion_4" role="tablist">

                           <!--begin::Item-->
                           @foreach ($artist->artists[0]->teams as $team)
                           <div class="m-accordion__item">
                               <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_4_item_1_head" data-toggle="collapse" href="#m_accordion_4_item_{{ $loop->iteration }}" aria-expanded="    false">
                                   <span class="m-accordion__item-icon">{{ $loop->iteration }}</span>
                                   <span class="m-accordion__item-title">{{ $team->name }}</span>
                                   <span class="m-accordion__item-mode"></span>
                               </div>
                               <div class="m-accordion__item-body collapse" id="m_accordion_4_item_{{ $loop->iteration }}" class=" " role="tabpanel" aria-labelledby="m_accordion_4_item_1_head" data-parent="#m_accordion_4">
                                   <div class="m-accordion__item-content">
                                    <div class="m-portlet__body ml-5">
                                        <div class="row">


                                    <div class="biografia col-md-12">
                                    <div class="row">


                                        <div class="col-md-4 mt-2">
                                        <label style="font-weight: bold">Tipo identificación:</label>
                                        <div class="m-scrollable" data-scrollable="true" style="">
                                            <p>{{ $team->document_type}}</p>
                                        </div>
                                    </div>
                                        <div class="col-md-4 mt-2">
                                        <label style="font-weight: bold">Identificación:</label>
                                        <div class="m-scrollable" data-scrollable="true" style="">
                                            <p>{{ $team->identification}}</p>
                                        </div>
                                    </div>
                                        <div class="col-md-4 mt-2">
                                        <label style="font-weight: bold">Nombre:</label>
                                        <div class="m-scrollable" data-scrollable="true" style="">
                                            <p>{{ $team->name}}</p>
                                        </div>
                                    </div>
                                        <div class="col-md-4 mt-2">
                                        <label style="font-weight: bold">Apellidos:</label>
                                        <div class="m-scrollable" data-scrollable="true" style="">
                                            <p>{{ $team->last_name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label style="font-weight: bold">Direccion:</label>
                                        <div class="m-scrollable" data-scrollable="true" style="">
                                            <p>{{ $team->addres}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label style="font-weight: bold">Fecha de nacimiento:</label>
                                        <div class="m-scrollable" data-scrollable="true" style="">
                                            <p>{{  Carbon\Carbon::parse($team->birthday)->formatLocalized('%d de %B de %Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label style="font-weight: bold">Lugar de expedición:</label>
                                        <div class="m-scrollable" data-scrollable="true" style="">
                                          <p>{{ $team->expeditionPlace->descripcion}}</p>
                                        </div>

                             </div>


                                        {{-- @if($artist->artists[0]->township)
                                        <div class="col-md-4 mt-2">
                                        <label style="font-weight: bold">Vereda/Corregimiento:</label>
                                        <div class="m-scrollable" data-scrollable="true" style="">
                                            <p>{{ $artist->artists[0]->beneficiary[0]->township}}</p>
                                        </div>
                                        </div>
                                        @endif --}}
                                        <div class="col-md-4 mt-2">
                                        <label style="font-weight: bold">Teléfono:</label>
                                        <div class="m-scrollable" data-scrollable="true" style="">
                                            <p>{{ $team->phone1}}</p>
                                        </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                        <label style="font-weight: bold">Teléfono:</label>
                                        <div class="m-scrollable" data-scrollable="true" style="">
                                            <p>{{ $team->phone2}}</p>
                                        </div>
                                        </div>
                                        <div class="col-md-4 mt-2">

                                            <label style="font-weight: bold">Rol:</label>
                                            <div class="m-scrollable" data-scrollable="true" style="">
                                                <p style="text-align: justify">{{ $team->role}}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <label style="font-weight: bold">Documento de identificación:</label>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pdfidentificacion{{$loop->iteration}}">
                                                Ver documento de identidad
                                              </button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                    </div>
                                   </div>
                               </div>
                           </div>
                           <div class="modal fade" id="pdfidentificacion{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        Documento de {{ $team->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if(!$team->pdf_identificacion)
                                        <p>No se cargo el documento correctamente</p>
                                    @else
                                    <div>
                                        <embed src="{{ $team->pdf_identificacion }}" frameborder="0" width="100%" height="400px">
                                        </div>
                                     @endif
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                           @endforeach

                       </div>

                       <!--end::Section-->
                   </div>
               </div>


               <!--end::Portlet-->
           @endif
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Información del proyecto
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-section">
                            <div class="row">
                                <div class="col-xs-5 col-lg-3 ml-5">
                                     <!-- prettier-ignore -->
                                       <!-- jquery_jplayer_1 is the id here -->
                                        <div id="jquery_jplayer_1" class="cp-jplayer"></div>
                                        <!-- paste the lines below as it is, it will be required by the circle player -->
                                        <div id="cp_container_1" class="cp-container">
                                                    <div class="cp-buffer-holder">
                                                        <div class="cp-buffer-1"></div>
                                                        <div class="cp-buffer-2"></div>
                                                    </div>
                                                    <div class="cp-progress-holder">
                                                        <div class="cp-progress-1"></div>
                                                        <div class="cp-progress-2"></div>
                                                    </div>
                                                    <div class="cp-circle-control"></div>
                                                    <ul class="cp-controls">
                                                        <li><a class="cp-play" tabindex="1">play</a></li>
                                                        <li><a class="cp-pause" style="display:none;" tabindex="1">pause</a></li>
                                                    </ul>
                                        </div>

                                </div>
                                <div class="col-xs-4 col-lg-6">
                                    <div class="row mt-2">

                                    <div class="col-md-6">
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
                                        {{-- @elseif($project->status == 3)
                                            <span
                                                class="m-badge m-badge--success m-badge--wide m-badge--rounded">{{ __('aprobado') }}</span> --}}
                                        @elseif($project->status == 4)
                                            <span
                                                class="m-badge m-badge--warning m-badge--wide m-badge--rounded">Pendiente</span>
                                        @elseif($project->status == 5)
                                            <span
                                                class="m-badge m-badge--danger m-badge--wide m-badge--rounded">{{ __('rechazado') }}</span>
                                        @elseif($project->status == 6)
                                        <span
                                            class="m-badge m-badge--brand m-badge--wide m-badge--rounded">Nueva revision</span>
                                       @elseif($project->status == 7)
                                        <span
                                            class="m-badge m-badge--success m-badge--wide m-badge--rounded">Aceptado</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5 style="font-weight: bold">Autor:</h5>
                                    </div>
                                    <div class="form-group">

                                            {{ $project->author }}
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="form-group">
                                        <h5 style="font-weight: bold">{{ __('genero') }}:</h5>
                                    </div>
                                    <div class="form-group">
                                        <button
                                            class="btn btn-secondary btn-md">{{ $project->category->category }}</button>
                                    </div>
                                </div>


                                <div class="col-md-12 mt-5">

                                    <div class="form-group">
                                        <h5 style="font-weight: bold">Descripción:</h5>
                                    </div>
                                    <div class="form-group" style="text-align: justify">

                                            {{ $project->description }}
                                    </div>
                                </div>


                                <!-- ------------------------- ACCIONES SEGUN LOS ROLES----------------------------- -->

                                    @include('backend.partials.rating.' .\App\User::rating_proyect())

                                <!-- ------------------------- CALIFICACION DEL PROYECTO CUANDO ESTA PUBLICADO Y APROBADO----------------------------- -->
                                    {{-- @if($project->status == 3 || $project->status == 4 || $project->status == 5)
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
                                    @endif --}}
                                </div>

                            </div>
                            </div>
                        </div>
                        @if(\App\User::rating_proyect())
                            {{-- <div id="show_assign_list_management" style="display: none">
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
                                                        <th>Curador</th>
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
                            </div> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>






</div>
    <!--=====================================
        MODAL INFORMACION DEL ARTISTA
    ======================================-->




    {{-- modal mostrar documento pdf padre --}}
    <div class="modal fade" id="verpdfidentificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Documento de {{ $artist->artists[0]->nickname }}</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

            @if(!$artist->artists[0]->users->pdf_cedula )
                <p>No se cargo el documento correctamente</p>
            @else
                <div>
                    <embed src="{{ $artist->artists[0]->users->pdf_cedula }}" frameborder="0" width="100%" height="400px">
                    </div>
            @endif
            </div>
            <div class="modal-footer">

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
            var myCirclePlayer = new CirclePlayer("#jquery_jplayer_1",
              {

                mp3:@json($project->audio),
              }, {
        cssSelectorAncestor: "#cp_container_1",
        swfPath: "js",
        wmode: "window",
        supplied: "mp3",
        keyEnabled: true
      });
      console.log('boject',myCirclePlayer);

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
{{-- <script type="text/javascript">
    $(document).ready(function() {
        console.log('llego');
      var myCirclePlayer = new CirclePlayer("#jquery_jplayer_1",
              {

                mp3: "/storage/projects/audio.mp3",
              }, {
        cssSelectorAncestor: "#cp_container_1",
        swfPath: "js",
        wmode: "window",
        supplied: "mp3",
        keyEnabled: true
      });
    });
</script> --}}
@endsection
