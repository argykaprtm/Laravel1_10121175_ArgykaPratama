@if ($errors->any())
    <script>
        window.onload = function() {
            alert("@foreach ($errors->all() as $item){{ $item }}@endforeach");
        };
    </script>
@endif

@if (Session::has('success'))
    <script>
        window.onload = function() {
            var successMessage = "{{ Session::get('success') }}";
            alert(successMessage);
        };
    </script>
@endif