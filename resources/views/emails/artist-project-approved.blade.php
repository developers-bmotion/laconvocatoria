@component('mail::message')
# {{ __("¡Saludos! :artist", ['artist' => $artist]) }}

{{ __("Informamos que tu proyecto :project  Ha sido **¡Aprovado!**. Pronto espera información Felicitaciones!!
", ['artist' => $artist, 'project' => $project->title]) }}
@component('mail::button', ['url' => route('show.backend.project', $project->slug)])
{{ __('Ir al proyecto') }}
@endcomponent

{{ __('Gracias') }},<br>
{{ config('app.name') }}
@endcomponent
