<!DOCTYPE html>
<html>
<head>
    <title>Verification Code</title>
</head>
<body style="background-color: #fff; height: 500px; width: 500px;">
    <h1 style="text-align: center">{{ $details['title'] }}</h1>
    <div>
        <center>
            <p>
                <h2>{{ $details['body'] }}</h2> 
                <h2>
                    <span style="color: #28a745">
                        {{$details['verification_code']}}
                    </span>
                </h2>
            </p>
        </center>
    </div>
    <p>Thank you</p>
</body>
</html>