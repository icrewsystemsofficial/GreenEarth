@php
    use App\Helpers\VersionHelper;
@endphp
<h2 class="text-success h1">
    GreenEarth v<strong>{{ VersionHelper::short() }}</strong> - Changelog
</h2>
<span class="text-center">
    {{ VersionHelper::full() }}
</span>

<h3 class="h3 text-success">Release Notes</h1>

{{ $content }}

<hr class="mb-2 mt-4">
Visit our live site at: **[GreenEarth](https://greenearth.icrewsystems.com)**
