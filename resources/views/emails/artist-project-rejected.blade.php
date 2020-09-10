@component('mail::message')
# {{ __("¡Saludos! :artist", ['artist' => $artist]) }}

{{ __("Informamos que tu proyecto :project  Ha sido **¡Rechazado!**. No te desanimes empienza ahora mismo a crear tu proximo proyecto).
", ['artist' => $artist, 'project' => $project->title]) }}
@component('mail::button', ['url' => route('show.backend.project', $project->slug)])
{{ __('Ir al proyecto') }}
@endcomponent

{{ __('Gracias') }},<br>
{{ config('app.name') }}
@endcomponent
