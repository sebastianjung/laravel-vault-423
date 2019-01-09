<!doctype html>
<html lang="{{ app()->getLocale() }}" style="background-color: {{ config('vault-423.customization.background_color') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('vault-423.customization.meta_title') }}</title>
    @if(config('vault-423.customization.font_family.link'))
        <link href="{{ config('vault-423.customization.font_family.link') }}" rel="stylesheet">
    @endif
    @if(config('vault-423.customization.font_family_bottom_left.link'))
        <link href="{{ config('vault-423.customization.font_family_bottom_left.link') }}" rel="stylesheet">
    @endif
    <link rel="stylesheet" href="/vault-423/css">

    <style>
        {{ config('vault-423.customization.custom_css') }}
    </style>
  
</head>

<body style="background-color: {{ config('vault-423.customization.background_color') }}">

    <div id="vault-423">
        <div class="centered-content">
        <h1 
            style="color: {{ config('vault-423.customization.font_color') }}; font-family: {{ config('vault-423.customization.font_family.name') }}, monospace;" 
            data-typewriter-part-one="{{ json_encode(config('vault-423.customization.text_typewriter_part_one')) }}"
            data-typewriter-part-two="{{ json_encode(config('vault-423.customization.text_typewriter_part_two')) }}"
        >
            <span class="typewriter-part-one">{{ config('vault-423.customization.text_fixed')}}</span>
            <span class="typewriter-part-two"></span>
            </h1>

            <div class="lock-wrapper">
                    <div class="lock">
                    <input @keyup.enter="submit('{{ request()->url() }}')" @input="removePasswordIncorrectWarning" v-model="password" type="password" name="vault-423-password" placeholder="" tabindex="1" style="color: {{ config('vault-423.customization.font_color') }}; border: 3px solid {{ config('vault-423.customization.font_color') }}; text-shadow: 0 0 0 {{ config('vault-423.customization.font_color') }};"/> 
                        <svg @click="submit('{{ request()->url() }}', true)" id="lock-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 624.24 624.21"><title>lock_final</title><path id="lock-bg" d="M478.15,60.25,448,42.84c-2.84-1.43-5.74-2.71-8.64-4.05q-8.21-3.87-16.68-7.21L421.28,31c-1.45-.57-2.9-1.11-4.36-1.65-2.51-1-5-1.85-7.55-2.72L407.43,26c-2.44-.83-4.84-1.65-7.33-2.43l-2.52-.77c-6.59-1.93-13.26-3.63-20-5.15-2.9-.65-5.8-1.28-8.79-1.84Q356.95,13.47,345,12.11c-1.8-.19-3.62-.31-5.43-.47-6.77-.63-13.54-1.09-20.41-1.29h-.12q-3.43-.1-6.88-.1h0q-3.44,0-6.88.1h-.11c-6.83.19-13.64.66-20.43,1.29-1.81.16-3.63.28-5.43.47q-12,1.34-23.83,3.66c-2.9.56-5.87,1.19-8.79,1.84-6.71,1.52-13.39,3.18-20,5.15l-2.52.77c-2.46.77-4.89,1.6-7.33,2.43l-1.93.67c-2.52.87-5,1.79-7.55,2.72-1.46.54-2.9,1.08-4.36,1.65l-1.36.54q-8.48,3.35-16.68,7.21c-2.9,1.34-5.8,2.62-8.64,4.05L146.16,60.2C64.34,114.33,10.24,207,10.24,312.15A300.85,300.85,0,0,0,79.26,504q4.61,5.59,9.5,11,7.31,8,15.18,15.55A300.8,300.8,0,0,0,312.12,614h0a300.87,300.87,0,0,0,89.67-13.61q7.09-2.21,14-4.75a300.33,300.33,0,0,0,33.66-14.71q3.25-1.67,6.46-3.41,12.83-7,24.9-15.14a304.08,304.08,0,0,0,39.51-31.83q10.49-10,20-21A300.57,300.57,0,0,0,614,312.15C614,207,559.9,114.33,478.15,60.25Z" transform="translate(0 -0.01)" fill="{{ config('vault-423.customization.background_color') }}"/><path d="M312.78,593h-1.32C156.89,592.65,31.23,466.78,31.23,312.15c0-102,54.85-191.25,136.44-240.46a284,284,0,0,1,44.84-21.86c2.74-1,5.51-2.07,8.28-3,4.26-1.48,8.54-2.9,12.86-4.17,5.29-1.55,10.67-2.92,16.08-4.15h.11c4-.89,7.9-1.69,11.88-2.42,5.76-1,11.57-2,17.44-2.67,2.51-.29,5-.56,7.52-.79h.48c8.23-.72,16.51-1.26,24.92-1.26h.12c8.4,0,16.69.54,24.92,1.26h.48c2.51.24,5,.51,7.52.79,5.87.7,11.68,1.62,17.44,2.67,4,.74,8,1.54,11.94,2.44,5.38,1.22,10.73,2.59,16,4.13h.12c4.32,1.28,8.59,2.7,12.86,4.17l8.28,3A284,284,0,0,1,456.6,71.69C538.12,120.87,593,210.09,593,312.15,593,466.78,467.35,592.65,312.78,593Zm171-541.29-31.21-18c-2.94-1.48-5.93-2.8-8.93-4.19q-8.49-4-17.25-7.45L425,21.51c-1.5-.59-3-1.15-4.51-1.71-2.59-1-5.2-1.91-7.81-2.81l-2-.69c-2.52-.86-5-1.71-7.58-2.51l-2.61-.8c-6.81-2-13.71-3.75-20.66-5.32-3-.67-6-1.32-9.09-1.9q-12.25-2.43-24.6-3.84c-1.86-.2-3.74-.32-5.61-.49-7-.65-14-1.13-21.1-1.33h-.12q-3.55-.1-7.11-.1h0q-3.56,0-7.11.1H305c-7.06.2-14.1.68-21.12,1.33-1.87.17-3.75.29-5.61.49q-12.42,1.39-24.64,3.78c-3,.58-6.07,1.23-9.09,1.9-6.94,1.57-13.84,3.29-20.66,5.32l-2.61.8c-2.54.8-5.06,1.65-7.58,2.51l-2,.69c-2.61.9-5.22,1.85-7.81,2.81-1.51.56-3,1.12-4.51,1.71l-1.41.56q-8.77,3.46-17.25,7.45c-3,1.39-6,2.71-8.93,4.19l-31.21,18C55.93,107.62,0,203.4,0,312.15A311.06,311.06,0,0,0,71.36,510.53q4.77,5.78,9.82,11.33,7.56,8.32,15.7,16.08a311,311,0,0,0,215.24,86.28h0a311.08,311.08,0,0,0,92.71-14.07q7.33-2.28,14.49-4.91A310.52,310.52,0,0,0,454.12,590q3.36-1.73,6.68-3.53,13.27-7.22,25.74-15.65a314.4,314.4,0,0,0,40.85-32.91q10.85-10.34,20.68-21.69a310.77,310.77,0,0,0,76.17-204.1C624.24,203.4,568.31,107.62,483.78,51.71Z" transform="translate(0 -0.01)" fill="{{ config('vault-423.customization.font_color') }}"/><path id="inner-lock" d="M499.39,296.51H451.65a139.7,139.7,0,0,0-29.91-72l33.82-33.82a15.6,15.6,0,1,0-22.07-22.06h0l-33.82,33.82a139.82,139.82,0,0,0-72-29.9V124.84a15.58,15.58,0,0,0-15.56-15.6h0a15.58,15.58,0,0,0-15.6,15.56s0,0,0,0v47.74a139.82,139.82,0,0,0-72,29.9l-33.82-33.82a15.6,15.6,0,1,0-22.07,22.06h0l33.82,33.82a139.7,139.7,0,0,0-29.91,72H124.85a15.61,15.61,0,1,0-.79,31.21h48.53a139.7,139.7,0,0,0,29.91,72l-33.82,33.82a15.6,15.6,0,0,0,11,26.63h0a15.54,15.54,0,0,0,11-4.57l33.82-33.82a139.7,139.7,0,0,0,72,29.9v47.74A15.6,15.6,0,0,0,312.12,515h0a15.6,15.6,0,0,0,15.6-15.6h0V451.64a139.7,139.7,0,0,0,72-29.9l33.82,33.82a15.54,15.54,0,0,0,11,4.57h0a15.6,15.6,0,0,0,11-26.63l-33.82-33.82a139.7,139.7,0,0,0,29.91-72h47.74a15.61,15.61,0,0,0,.79-31.21h-.79Zm-296.5,15.64a109.23,109.23,0,1,1,109.26,109.2h0A109.37,109.37,0,0,1,202.89,312.15Z" transform="translate(0 -0.01)" fill="{{ config('vault-423.customization.font_color') }}"/></svg>
                        <span class="password-incorrect-icon" style="color: {{ config('vault-423.customization.font_color') }}">!</span>
                        <span class="password-correct-icon" style="color: {{ config('vault-423.customization.font_color') }}"></span>
                    </div>

                    <div class="password-incorrect-text" style="color: {{ config('vault-423.customization.font_color') }}">
                        {{ config('vault-423.customization.incorrect_password') }}
                    </div>
            </div>
        </div>

        <div class="url">
            <a href="{{ config('vault-423.customization.bottom_left_link') }}" target="_blank" style="color: {{ config('vault-423.customization.font_color') }}; font-family: {{ config('vault-423.customization.font_family_bottom_left.name') ? config('vault-423.customization.font_family_bottom_left.name') : config('vault-423.customization.font_family.name') }}, monospace;">
                {{ config('vault-423.customization.bottom_left_text') }}
            </a>
        </div>

    <div class="logo" style="max-height: {{ config('vault-423.customization.logo_size') }}px; max-width: {{ config('vault-423.customization.logo_size') }}px">
        @if (config('vault-423.customization.logo_path'))
            <img src="/img/{{ config('vault-423.customization.logo_path') }}" alt="Logo">
        @else
            <img src="/vault-423/logo" alt="Ultrabold Logo">
        @endif
        </div>
    </div>


    
    <script src="/vault-423/js"></script>

</body>

</html>