<style>
    .wrapper {
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
    background-color: #004aad;
    margin: 0;
    padding: 0;
    width: 100%;
}
.body {
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
    background-color: #004aad;
    margin: 0;
    padding: 0;
    width: 100%;
    border-bottom: 1px solid #edf2f7;
border-top: 1px solid #edf2f7;
}
</style>
@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<h1>Hummacook</h1>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
