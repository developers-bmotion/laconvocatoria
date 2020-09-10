@component('mail::message')
# {{ __("¡Saludos! :artist", ['artist' => $artist]) }}

{{ __("Informamos que tu proyecto :project ha pasado al siguiente nivel. Ha sido ¡Pre Aprobado!. Nuestros managements evaluaran tu proyecto y muy pronto te enviaran su respuesta.
 ", ['artist' => $artist, 'project' => $project->title]) }}
@component('mail::button', ['url' => route('show.backend.project', $project->slug)])
        {{ __('Ir al proyecto') }}
@endcomponent

{{ __('Gracias') }},<br>
{{ config('app.name') }}
@endcomponent