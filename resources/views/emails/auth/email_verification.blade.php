<html>
    <head></head>
    <body style="margin-left:auto; margin-right:auto;">
        <p>Hello , <span class="font-weight-bold">{{$name}}</span></p>
        <a class="btn btn-link p-0 m-0 align-baseline button"
            href="{{ route('verify_email',$verification_code) }}">Click Here Form mail Verification</a>
    </body>
</html>
