<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        @if(!Session::has('username'))
            <script>
                window.location.href = '{{url("/")}}';
            </script>
        @endif
    </body>
</html>