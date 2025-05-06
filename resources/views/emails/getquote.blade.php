@component('mail::message')
# Introduction

The body of your message.

@component('mail::table')
|          |           |
|:------:  |:---------:|
|Name|{{$array['fname']}} {{$array['lname']}}|
|Email |{{$array['email']}}|
|Phone |{{$array['phone']}}|
|Property Located |{{$array['plocated']}}|
|Message  |{{$array['message']}}|
@endcomponent

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
Home Spaces Solution
@endcomponent
