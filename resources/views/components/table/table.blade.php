<div class="table-responsive">
    <table class="table table-dark table-striped table-hover table-borderless align-middle">
        @isset($caption)<caption>{{ $caption }}</caption>@endisset
        {{ $slot }}
    </table>
</div>
