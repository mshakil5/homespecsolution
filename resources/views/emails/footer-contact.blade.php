@component('mail::message')
# Introduction

The body of your message.

@component('mail::table')
|          |           |
|:------:  |:---------:|
|Name|{{$array['name']}}|
|Email |{{$array['email']}}|
|Message  |{{$array['message']}}|
@endcomponent

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
Home Spaces Solution
@endcomponent
