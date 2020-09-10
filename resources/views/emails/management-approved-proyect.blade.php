@component('mail::message')
# {{ __("¡Saludos! :management", ['management' => $management]) }}

{{ __("Informamos que el proyecto :project del artista :artist ha sido **Aprovado**.
", ['artist' => $artist, 'project' => $project->title]) }}
@component('mail::button', ['url' => route('show.backend.project', $project->slug)])
{{ __('Ir al proyecto') }}
@endcomponent

{{ __('Gracias') }},<br>
{{ config('app.name') }}
@endcomponent
