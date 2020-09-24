@component('mail::message')
# {{ __("¡Saludos! :artist", ['artist' => $artist]) }}

{{ __("Informamos que tu canción **:project** ha pasado al siguiente nivel. Ha sido ¡Pre Aprobada!. Nuestros curadores evaluaran tu canción y muy pronto te enviaran su respuesta.
 ", ['artist' => $artist, 'project' => $project->title]) }}
@component('mail::button', ['url' => route('show.backend.project', $project->slug)])
        {{ __('Ir a la canción') }}
@endcomponent

{{ __('Gracias') }},<br>
{{ config('app.name') }}
@endcomponent
