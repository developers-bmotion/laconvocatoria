@component('mail::message')
# {{ __("¡Saludos! :artist", ['artist' => $artist]) }}

{{ __("Informamos que tu proyecto :project  Se ha puesto en revisión. Actualiza tu información lo mas pronto posible para seguir concursando.

",['artist' => $artist, 'project' => $project->title], )


}}
{{ __("**Estas son tus observaciones:** ") }}<br>
{{ __(":mesage", ['mesage' => $mesage]) }}
@component('mail::button', ['url' => route('show.backend.project', $project->slug)])
{{ __('Ir al proyecto') }}
@endcomponent

{{ __('Gracias') }},<br>
{{ config('app.name') }}
@endcomponent
