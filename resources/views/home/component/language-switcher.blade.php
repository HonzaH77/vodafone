<?php $availableLocales = array('cs' => __('messages.lang.cs'), 'en' => __('messages.lang.en')) ?>
<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    @foreach($availableLocales as $availableLocale => $localeName)
        @if($availableLocale === app()->getLocale())
            <span class="ml-2 mr-2 text-gray-700">{{ $localeName }}</span>
        @else
            <a class="ml-1 underline ml-2 mr-2" style="color: black" href="lang/{{ $availableLocale }}">
                <span>{{ $localeName }}</span>
            </a>
        @endif
    @endforeach
</div>
