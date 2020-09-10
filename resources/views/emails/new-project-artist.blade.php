@component('mail::message')
# {{ __("¡Nuevo proyecto ha sido registrado!") }}

{{ __("El artista :artist ha enviado un nuevo proyecto: ", ['artist' => $artist]) }}
## {{ __(":project ", ['artist' => $artist, 'project' => $project->title]) }}
<img class="img-responsive" src="{{ url($project->project_picture) }}" alt="{{ $project->title }}">

@component('mail::button', ['url' => route('show.backend.project', $project->slug)])
 {{ __('Ir al proyecto') }}
@endcomponent

{{ __('Gracias') }},<br>
{{ config('app.name') }}
@endcomponent