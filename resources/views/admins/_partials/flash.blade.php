@if ($notif_success = '')
<div class="alert alert-success">
    <a class="close" data-close="alert"></a>
    <span> {{ $notif_success }}</span>
</div>
@endif

@if ($notif_info = '')
<div class="alert alert-info">
    <a class="close" data-close="alert"></a>
    <span> {{ $notif_info }}</span>
</div>
@endif

@if ($notif_warning = '')
<div class="alert alert-warning">
    <a class="close" data-close="alert"></a>
    <span> {{ $notif_warning }}</span>
</div>
@endif

@if ($notif_danger = '')
<div class="alert alert-danger">
    <a class="close" data-close="alert"></a>
    <span> {{ $notif_danger}}</span>
</div>
@endif
