@extends('backend.layout') @push('css')
<style>
	.m-wizard.m-wizard--4 .m-wizard__head .m-wizard__nav .m-wizard__steps .m-wizard__step .m-wizard__step-info .m-wizard__step-label {
		padding-left: 1rem;
	}
</style>

@endpush
@section('header') @if($errors->any())

<ul class="list-group">

	@foreach($errors->all() as $error)
	<div class="alert alert-danger" role="alert">
		<strong>Error!</strong> {{$error}}
	</div>
	@endforeach

</ul>

@endif

<div class="d-flex align-items-center">
	<div class="mr-auto">
		<h3 class="m-subheader__title m-subheader__title--separator">{{ __('nuevo_proyecto') }}</h3>
		<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
			<li class="m-nav__item m-nav__item--home">
				<a href="#" class="m-nav__link m-nav__link--icon">
					<i class="m-nav__link-icon la la-plus-circle"></i>
				</a>
			</li>
			<li class="m-nav__separator">-</li>
			<li class="m-nav__item">
				<a href="" class="m-nav__link">
					<span class="m-nav__link-text">{{ __('nuevo_proyecto') }}</span>
				</a>
			</li>
			<li class="m-nav__separator">-</li>
			<li class="m-nav__item">
				<a href="" class="m-nav__link">
					<span class="m-nav__link-text"></span>
				</a>
			</li>
		</ul>
	</div>
	<div>
	</div>
</div>


@stop
@section('content')
<!-- END: Subheader -->
<div class="m-content">

	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--full-height">

		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						{{ __('formulario') }}
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

		<!--begin: Portlet Body-->
		<div class="m-portlet__body m-portlet__body--no-padding">

			<!--begin: Form Wizard-->
			<div class="m-wizard m-wizard--4 m-wizard--brand" id="wizard_project_add">
				<div class="row m-row--no-padding">
					<div class="col-xl-3 col-lg-12 m--padding-top-20 m--padding-bottom-15">

						<!--begin: Form Wizard Head -->
						<div class="m-wizard__head">

							<!--begin: Form Wizard Nav -->
							<div class="m-wizard__nav">
								<div class="m-wizard__steps">
									<div class="m-wizard__step m-wizard__step--done"
										m-wizard-target="m_wizard_form_step_1">
										<div class="m-wizard__step-info">
											<a href="#" class="m-wizard__step-number">
												<span><span>1</span></span>
											</a>
											<div class="m-wizard__step-label">
												{{ __('audio_visual') }}
											</div>
											<div class="m-wizard__step-icon"><i class="la la-check"></i></div>
										</div>
									</div>
									<div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
										<div class="m-wizard__step-info">
											<a href="#" class="m-wizard__step-number">
												<span><span>2</span></span>
											</a>
											<div class="m-wizard__step-label">
												{{ __('informacion_general') }}
											</div>
											<div class="m-wizard__step-icon"><i class="la la-check"></i></div>
										</div>
									</div>
									<div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
										<div class="m-wizard__step-info">
											<a href="#" class="m-wizard__step-number">
												<span><span>3</span></span>
											</a>
											<div class="m-wizard__step-label">
												{{ __('encuesta') }}
											</div>
											<div class="m-wizard__step-icon"><i class="la la-check"></i></div>
										</div>
									</div>
									<div class="m-wizard__step" m-wizard-target="m_wizard_form_step_4">
										<div class="m-wizard__step-info">
											<a href="#" class="m-wizard__step-number">
												<span><span>4</span></span>
											</a>
											<div class="m-wizard__step-label">
												{{ __('confirmacion') }}
											</div>
											<div class="m-wizard__step-icon"><i class="la la-check"></i></div>
										</div>
									</div>
								</div>
							</div>

							<!--end: Form Wizard Nav -->
						</div>

						<!--end: Form Wizard Head -->
					</div>
					<div class="col-xl-9 col-lg-12">

						<!--begin: Form Wizard Form-->
						<div class="m-wizard__form">
							<form method="post" action="{{ route('add.store.project') }}"
								class="m-form m-form--label-align-left- m-form--state-" id="form_add_project">
								@csrf
								<input type="hidden" name="artist_id" value="{{ $artist_id->id }}">
								<input type="hidden" name="status" value="1">
								<div class="m-portlet__body m-portlet__body--no-padding">

									<!--=====================================
										         AUDIO VISUAL
									======================================-->
									<div class="m-wizard__form-step m-wizard__form-step--current"
										id="m_wizard_form_step_1">
										<img src="/backend/assets/app/media/img/projects/logo_youtube.png" width="15%"
											alt="Logo youtube">
										<div class="m-form__section">
											<div class="m-form__heading">
												<h3 class="m-form__heading-title">
													{{ __('agregar_video_youtube') }}
													<button type="button" data-toggle="modal" id="btn_help_youtube"
														data-target="#open_help_youtube"
														class="m-portlet__nav-link btn btn-lg btn-secondary m-btn m-btn--icon m-btn--icon-only m-btn--pill m-dropdown__toggle"
														style="background-color: #ffffff !important;border-color: #ffffff !important;">
														<i
															class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
													</button>
												</h3>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-xl-2 col-lg-2 col-form-label" form="txtFrame">*
													Link:</label>
												<div class="col-xl-9 col-lg-9">
													<input type="text" name="url_video"
														class="form-control m-input iframe_add_proyecto required"
														placeholder="link video" value="" id="txtFrame"
														pattern=".+(youtube.com\/watch).+v=.+">
													<input type="hidden" name="iframe_video" id="txtIdVideo">
													<span
														class="m-form__help">{{ __('video_youtube_add_project') }}</span>
												</div>
											</div>
											<div class="m-separator m-separator--dashed m-separator--lg"></div>
											<div class="m-form__heading">
												<h3 class="m-form__heading-title">
													{{ __('imagen_proyecto') }}
													<i data-toggle="m-tooltip" data-width="auto"
														class="m-form__heading-help-icon flaticon-info"
														title="Some help text goes here"></i>
												</h3>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-xl-2 col-lg-2 col-form-label">*
													{{ __('imagen') }}:</label>
												<div class="col-xl-9 col-lg-9">
													<div class="m-dropzone dropzone m-dropzone--success" action=""
														id="m-dropzone-three">
														<div class="m-dropzone__msg dz-message needsclick">
															<h3 class="m-dropzone__msg-title">
																{{ __('agrega_imagen_proyecto') }}</h3>
															<span
																class="m-dropzone__msg-desc">{{ __('arrastra_click_subir') }}</span>
														</div>
													</div>
													<span class="m-form__help">{{ __('info_add_project_image') }}</span>
													<input type="hidden" id="inputDBImageAddProject"
														name="project_picture" value="">
                                                    <div id="erroresImagen" style="color: var(--danger)" class="form-control-feedback"></div>
												</div>
											</div>
										</div>
									</div>

									<!--=====================================
									GENERAL
									======================================-->
									<div class="m-wizard__form-step" id="m_wizard_form_step_2">
										<div class="m-form__section m-form__section--first">
											<div class="m-form__heading">
												<h3 class="m-form__heading-title">{{ __('informacion_general_2') }}</h3>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-12">
													<label class="form-control-label" form="nombreProyecto">*
														{{ __('nombre_proyecto') }}:</label>
													<input type="text" name="title"
														class="form-control m-input title_add_proyecto required"
														id="nombreProyecto" placeholder="" value="">
													<span class="m-form__help">{{ __('help_nombre_proyecto') }}</span>
												</div>
											</div>	
										{{-- seleccionar categoria --}}
											<div class="col-lg-6 m-form__group-sub">
												<label class="form-control-label" form="category_add_proyecto">*
													{{ __('select_categoria') }}:</label>
												<select name="tCategory_id"
													class="form-control m-bootstrap-select m_selectpicker required"
													id="category_add_proyecto">
													<option value="">{{ __('seleccione_genero') }}</option>
													@foreach($tipoCategorias as $tCategorie)
													<option value="{{ $tCategorie->id }}">{{__($tCategorie->name) }}
													</option>
													@endforeach
													{!! $errors->first('category_id','<div
														class="form-control-feedback">*:message</div>')!!}
												</select>
												<span class="m-form__help">{{ __('categoria_de_proyecto') }}</span>
											</div>


											{{-- select solista o grupo --}}
											<div class="col-lg-6 m-form__group-sub cont_solista" style="display:none">
												<label class="form-control-label" form="select_solista">*
													{{ __('select_solista') }}:</label>
												<select name="select_solista"
													class="form-control m-bootstrap-select m_selectpicker required"
													id="select_solista">
													<option value="">{{ __('seleccione_genero') }}</option>
													<option value="1">{{__('solista') }}</option>
													<option value="2">{{__('grupo') }}</option>
													{!! $errors->first('category_id','<div
														class="form-control-feedback">*:message</div>')!!}
												</select>
												<span class="m-form__help">{{ __('solista_o') }}</span>
											</div>

											<div class="col-lg-6 m-form__group-sub registro" style="display:none">

												<button type="button" class="btn btn-brand" data-toggle="modal"
													data-target="#m_modal_2">
													<span>
														<span>{{ __('registrar') }}</span>
														<i class="la la-plus"></i>
													</span>
												</button>
											</div>
											<div class="col-lg-6 m-form__group-sub">
												<label class="form-control-label" form="category_id">*
													{{ __('select_genero') }}:</label>
													{{-- m-bootstrap-select m_selectpicker --}}
												<select name="category_id"
													class="form-control  required"
													id="genero_add_proyecto">
													
													<option value="">{{ __('seleccione_genero') }}</option>

													
													 {{-- @foreach($categories as $categorie)
													<option value="{{ $categorie->id }}">{{ $categorie->category }}
													</option>
													@endforeach  --}}
													{!! $errors->first('category_id','<div
														class="form-control-feedback">*:message</div>')!!}
												</select>
													
												<span class="m-form__help">{{ __('o_categoria') }}</span>
											</div>

											{{-- ----------------------- --}}

											{{-- modal agreagar participantes --}}
											<div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog"
												aria-labelledby="exampleModalLongTitle" style="display: none;"
												aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle">
																{{ __('integrantes_grupo') }}</h5>
															<button type="button" class="close" data-dismiss="modal"
																aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="m-form__section m-form__section--first"
																id="integrantes">

																<div class="form-group m-form__group row">
																	<div class="col-lg-12">
																		<label class="form-control-label"
																			form="nombreIntegrante">*
																			{{ __('nombre') }}:</label>
																		<input type="text" name="nombres[]"
																			class="form-control m-input title_add_proyecto required"
																			id="nombreIntegrante" placeholder=""
																			value="">
																		<span
																			class="m-form__help">{{ __('help_nombre_integrante') }}</span>
																	</div>
																</div>

																<div class="form-group m-form__group row">
																	<div class="col-lg-12">
																		<label class="form-control-label"
																			form="rolIntegrante">*
																			{{ __('rol') }}:</label>
																		<input type="text" name="rol[]"
																			class="form-control m-input title_add_proyecto required"
																			id="rolIntegrante" placeholder="" value="">
																		<span
																			class="m-form__help">{{ __('help_rol_integrante') }}</span>
																	</div>
																</div>
															</div>
															<span
																class="btn btn-brand m-btn m-btn--icon m-btn--icon-only"
																id="masInte">
																<i class="fa flaticon-plus"></i>
															</span>

														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-success"
																data-dismiss="modal">
																<span>
																	<span>{{ __('guardar') }} &amp;
																		{{ __('continuar') }}</span>
																</span>
															</button>
														</div>
													</div>
												</div>
											</div>
											{{-- fin de la modal agreagr participantes --}}

											<div class="form-group m-form__group row">
												<div class="col-lg-12 m-form__group-sub">
													<label class="form-control-label" form="descripcionProyecto">*
														{{ __('corta_descripcion') }}:</label>
													<textarea
														class="form-control m-input m-input--solid corta_descr_add_proyecto required"
														id="descripcionProyecto" name="short_description"
														rows="8">{{ old('biography') }}</textarea> {!!
													$errors->first('biography','
													<div class="form-control-feedback">*:message</div>')!!}
													<span
														class="m-form__help">{{ __('help_shorDescription_proyecto') }}</span>
												</div>
											</div>
										</div>
										<div class="m-separator m-separator--dashed m-separator--lg"></div>
										<div class="m-form__section">
											<div class="m-form__heading">
												<h3 class="m-form__heading-title">{{ __('acerca_proyecto') }}</h3>
											</div>
											<div class="form-group m-form__group row">
												{{-- <div class="col-lg-6 m-form__group-sub">
                                                 <label class="form-control-label" form="category_id">* {{ __('select_genero') }}:</label>
												<select name="category_id"
													class="form-control m-bootstrap-select m_selectpicker required"
													id="genero_add_proyecto">
													<option value="">{{ __('seleccione_genero') }}</option>
													@foreach($categories as $categorie)
													<option value="{{ $categorie->id }}">{{ $categorie->category }}
													</option>
													@endforeach
													{!! $errors->first('category_id','<div
														class="form-control-feedback">*:message</div>')!!}
												</select>
												<span class="m-form__help">{{ __('o_categoria') }}</span>
											</div> --}}
											<div class="col-lg-6 m-form__group-sub">
												<label class="form-control-label" form="costo_proyecto">*
													{{ __('costo_proyecto') }}:</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">$</span>
														<span class="input-group-text">USD</span>
													</div>
													<input type="text"
														class="form-control m-input valor_add_proyecto required"
														id="costo_proyecto" aria-label="">
													<input type="hidden" name="price" class="valorDBProject" value="">
												</div>
												<span class="m-form__help">{{ __('help_valor_dolares') }}</span>
											</div>
										</div>
									</div>
								</div>

								<!--=====================================
								ENCUESTA
								======================================-->
								<div class="m-wizard__form-step" id="m_wizard_form_step_3">
									<div class="m-form__section m-form__section--first">
										<div class="m-form__heading">
											<h3 class="m-form__heading-title">{{ __('encuesta') }}</h3>
										</div>
										{{-- donde debe empezar la encuesta --}}

									</div>
									<div class="m-separator m-separator--dashed m-separator--lg"></div>

									{{-- {{dd($contProject)}} --}} {{-- {{dd($question)}} --}} @php $datos=null;
									if(isset($question[0])){ $datos=json_decode($question[0]->question);
									}
									@endphp @if($contProject == 0 & $datos != null) @forelse ($datos as $quest)

									<div class="m-form__section">
										<div class="m-form__heading">
											<h3 class="m-form__heading-title">{{$quest->quest}}</h3>
										</div>
										<div class="form-group m-form__group">
											<div class="row">
												@forelse ($quest->answer as $ans)

												<div class="col-lg-6">
													<label class="m-option">
														<span class="m-option__control">
															<span class="m-radio m-radio--state-brand">
																<input type="radio"
																	name="questionGroup[{{$ans->question_id}}]"
																	value="{{$ans->id}}">
																<span></span>
															</span>
														</span>
														<span class="m-option__label">
															<span class="m-option__head">
																<span class="m-option__title">
																	{{$ans->option}}
																</span>
															</span>
														</span>
													</label>
												</div>

												@empty {{__('no_hay_opciones')}} @endforelse


											</div>
											<div class="m-form__help">

												<!--must use this helper element to display error message for the options-->
											</div>
										</div>
									</div>
									@empty {{__('no_hay_preguntas') }} @endforelse @else {{__('no_hay_preguntas') }}
									@endIf

								</div>

								<!--=====================================
									CONFIRMACIÓN
									======================================-->
								<div class="m-wizard__form-step" id="m_wizard_form_step_4">

									<div class="m-accordion m-accordion--default" id="m_accordion_1" role="tablist">

										<!--begin::Item-->
										<div class="m-accordion__item active">
											<div class="m-accordion__item-head" role="tab"
												id="m_accordion_1_item_1_head" data-toggle="collapse"
												href="#m_accordion_1_item_1_body" aria-expanded=" false">
												<span class="m-accordion__item-icon"><i
														class="fa flaticon-imac"></i></span>
												<span class="m-accordion__item-title">1. {{ __('audio_visual') }}</span>
												<span class="m-accordion__item-mode"></span>
											</div>
											<div class="m-accordion__item-body collapse show"
												id="m_accordion_1_item_1_body" class=" " role="tabpanel"
												aria-labelledby="m_accordion_1_item_1_head"
												data-parent="#m_accordion_1">

												<!--begin::Content-->
												<div class="tab-content active m--padding-30">
													<div class="m-form__section m-form__section--first">
														<div class="m-form__heading">
															<h3 class="m-form__heading-title">
																{{ __('tu_video') }}
															</h3>
														</div>
														<div class="form-group m-form__group row">
															<div
																class="col-xl-9 col-lg-12 caja_video_youtube_add_proyect">
																<!--Mostra video de youtube -->
																<iframe width="560" height="315" id="videoYoutube"
																	data-url="https://www.youtube.com/embed/"
																	frameborder="0"
																	allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
																	allowfullscreen>
																</iframe>
															</div>
														</div>
													</div>
													<div class="m-separator m-separator--dashed m-separator--lg"></div>
													<div class="m-form__section">
														<div class="m-form__heading">
															<h3 class="m-form__heading-title">
																{{ __('tu_imagen') }}
															</h3>
														</div>
														<div class="form-group m-form__group row text-center">
															<div
																class="col-xl-9 col-lg-12 text-center caja_image_add_proyect">
																<img id="img_add_proyect" class="text-center"
																	width="100%" src="" alt="">
															</div>
														</div>
													</div>
												</div>

												<!--end::Section-->
											</div>
										</div>

										<!--end::Item-->

										<!--begin::Item-->
										<div class="m-accordion__item">
											<div class="m-accordion__item-head collapsed" role="tab"
												id="m_accordion_1_item_2_head" data-toggle="collapse"
												href="#m_accordion_1_item_2_body" aria-expanded=" false">
												<span class="m-accordion__item-icon"><i
														class="fa flaticon-exclamation-2"></i></span>
												<span class="m-accordion__item-title">2.
													{{ __('informacion_general') }}</span>
												<span class="m-accordion__item-mode"></span>
											</div>
											<div class="m-accordion__item-body collapse" id="m_accordion_1_item_2_body"
												class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_2_head"
												data-parent="#m_accordion_1">

												<!--begin::Content-->
												<div class="tab-content m--padding-30">
													<div class="m-form__section m-form__section--first">
														<div class="m-form__heading">
															<h4 class="m-form__heading-title">
																{{ __('informacion_general_2') }}</h4>
														</div>
														<div class="form-group m-form__group m-form__group--sm row">
															<label
																class="col-xl-4 col-lg-4 col-form-label">{{ __('nombre_proyecto') }}:</label>
															<div class="col-xl-8 col-lg-8">
																<span
																	class="m-form__control-static nombre_project_confirmacion"></span>
															</div>
														</div>
														<div class="form-group m-form__group m-form__group--sm row">
															<label
																class="col-xl-4 col-lg-4 col-form-label">{{ __('corta_descripcion') }}:</label>
															<div class="col-xl-8 col-lg-8">
																<span
																	class="m-form__control-static descripcion_corta_confirmacion"></span>
															</div>
														</div>
													</div>
													<div class="m-separator m-separator--dashed m-separator--lg"></div>
													<div class="m-form__section">
														<div class="m-form__heading">
															<h4 class="m-form__heading-title">
																{{ __('acerca_proyecto') }}</h4>
														</div>
														<div class="form-group m-form__group m-form__group--sm row">
															<label
																class="col-xl-4 col-lg-4 col-form-label">{{ __('genero') }}:</label>
															<div class="col-xl-8 col-lg-8">
																<span
																	class="m-form__control-static genero_musical_confirmacion"></span>
															</div>
														</div>
														<div class="form-group m-form__group m-form__group--sm row">
															<label
																class="col-xl-4 col-lg-4 col-form-label">{{ __('costo_proyecto') }}:</label>
															<div class="col-xl-8 col-lg-8">
																$ <input disabled type="text"
																	class="m-form__control-static costo_proyecto_confirmacion"
																	id="" value=""
																	style="width: 125px; border: 0; background: border-box; color: #0e0e0e">
															</div>
														</div>
													</div>
												</div>

												<!--end::Content-->
											</div>
										</div>
									</div>

									<!--end::Section-->
									<div class="m-separator m-separator--dashed m-separator--lg"></div>
									<div class="form-group m-form__group m-form__group--sm row">
										<div class="col-xl-12">
											<div class="m-checkbox-inline">
												<label class="m-checkbox m-checkbox--solid m-checkbox--brand">
													<input type="checkbox" name="accept" value="1">
													{{ __('terminos_add_proyecto') }}
													<span></span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<!--end: Form Wizard Step 4-->
						</div>

						<!--end: Form Body -->

						<!--begin: Form Actions -->
						<div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
							<div class="m-form__actions">
								<div class="row">
									<div class="col-lg-6 m--align-left">
										<a href="#" class="btn btn-secondary m-btn m-btn--custom m-btn--icon"
											data-wizard-action="prev">
											<span>
												<i class="la la-arrow-left"></i>&nbsp;&nbsp;
												<span>{{ __('btn_atras') }}</span>
											</span>
										</a>
									</div>
									<div class="col-lg-6 m--align-right">
										<a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon"
											data-wizard-action="submit">
											<span>
												<i class="la la-check"></i>&nbsp;&nbsp;
												<span>{{ __('enviar') }}</span>
											</span>
										</a>
										<button href=""
											class="btn btn-success m-btn m-btn--custom m-btn--icon btn_siguiente_proyecto"
											data-wizard-action="next">
											<span>
												<span>{{ __('guardar') }} &amp; {{ __('continuar') }}</span>&nbsp;&nbsp;
												<i class="la la-arrow-right"></i>
											</span>
										</button>
									</div>
								</div>
							</div>
						</div>

						<!--end: Form Actions -->
						</form>
					</div>

					<!--end: Form Wizard Form-->
				</div>
			</div>
		</div>

		<!--end: Form Wizard-->
	</div>

	<!--end: Portlet Body-->
</div>

<!--End::Main Portlet-->
</div>

<!--=====================================
	MODAL AYUDA YOUTUBE
 ======================================-->
<div class="modal fade" id="open_help_youtube" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<video width="100%" class="video_help_add_project_youtube" loop="true" autoplay="true">
				<source src="/backend/assets/app/media/video/project/video_youtube_add_project.mov" type="video/mp4">
			</video>
		</div>
	</div>
</div>

@stop
@section('js.add-project')
    <script>
        const txtInvalidAlert = "{{ __('txtInvalidAlertAddProject') }}";
    </script>
    <script src="/backend/assets/js/add-project.js" type="text/javascript"></script>
    <script>
        const nombre = "{{ __('nombre') }}";
        const help = "{{ __('help_nombre_integrante') }}";
        const rol = "{{ __('rol') }}";
        const helpRol = "{{ __('help_rol_integrante') }}";
    </script>
    <script>
        var dropzone = new Dropzone('.dropzone', {
            url: '{{route('add.project.image')}}',
            acceptedFiles: 'image/*',
            maxFiles: 1,
            paramName: 'image',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (file, response) {
                $("#erroresImagen").text('');
                $('#inputDBImageAddProject').val(response);
                $('#img_add_proyect').attr('src', response);
            },
            error: function (file, e, i, o, u) {
                $("#erroresImagen").text('');
                if (file.xhr.status === 413) {
                    $("#erroresImagen").text('{{__("imagen_grande")}}');
                    $(file.previewElement).addClass("dz-error").find('.dz-error-message').text('{{__("imagen_grande")}}');
                    setTimeout(() => {
                        dropzone.removeFile(file)
                    }, 1000)
                }
            }
        });
        dropzone.on("addedfile", function (file) {
            file.previewElement.addEventListener("click", function () {
                dropzone.removeFile(file);
            });
        });
        Dropzone.autoDiscover = false;


    </script>
@endsection
