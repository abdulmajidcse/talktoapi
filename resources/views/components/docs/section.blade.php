<div  {{ $attributes->class(['row']) }}>
    <div class="col-md-1 col-12 border_right">
        <b>{{ $number }}</b>
    </div>
    <div class="col-12 col-md-6 border_right">
        <p>URI: <code>{{ $url }}</code></p>
        <span class="badge bg-primary" style="border-radius: 0">{{ $title ?? 'Example of JS Fetch' }}:</span>
<pre class="bg-dark text-light p-2">
{{ $request }}
</pre>
    </div>
    <div class="col-md-1 col-12 text-center border_right">
        <span class="badge bg-success">{{ $method }}</span>
    </div>
    <div class="col-md-4 col-12">
        <pre>
{{ $response }}
        </pre>
    </div>
</div>
