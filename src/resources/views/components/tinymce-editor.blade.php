@props(['name', 'class'])
<textarea name="{{ $name }}" class="{{ $class ?? '' }}" id="tinyeditorinstance">{!! $slot !!}</textarea>
