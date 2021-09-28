var iframe = document.createElement('iframe');
iframe.src = "{{ route('test') }}";
iframe.loading = 'lazy';
document.body.appendChild(iframe);