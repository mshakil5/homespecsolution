<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://www.falconconstruct.co.uk/images/company/1653154154412912.png" height='100%'; width="100%" class="logo" alt="Falcon Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
