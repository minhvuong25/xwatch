<div class="container">
    <h1>Daily Log Viewer</h1>
    @if (!empty($logContent))
        <pre>{{ $logContent }}</pre>
    @else
        <p>Không có log hàng ngày cho ngày hôm nay.</p>
    @endif
</div>
