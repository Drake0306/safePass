<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body onload="done()">
    {{-- <h6>{{$no_of_visit['id']}}</h6>
    <h6>{{$visitor['id']}}</h6> --}}
    <input type="hidden" value="{{$no_of_visit['id']}}" name="" id="id">
    <table style="width:100%">
        <tr>
            <th colspan="4"
                style="text-align:center;font-size:30px;text-transform:capitalize;font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
                Entry pass
                <hr>
            </th>

        </tr>

        <tr>
            <th colspan="4"
                style="text-align:center;font-size:18px;text-transform:capitalize;font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
                {{date('M d , Y @ h:m a ')}}</th>
        </tr>
        <tr>
            <th>&nbsp;</th>
        </tr>
        <tr>
            <td style="text-align:center;padding:10px;font-size:12px;"><span style=""><small>Name - </small></span>
                {{$visitor['name']}}
                <br></span> <br>
                <small>Number - </small>
                {{$visitor['mobile_no']}}
            </td>
        <td style="text-align:center;padding:10px;"><img src="{{url('public/scan/'.@$fileName)}}" alt="" style="width:200px;"></td>
            {{-- <td style="text-align:center;padding:10px;"><span style="color:gray">#Number</span> <br> Mobile :
                {{$visitor['mobile_no']}}</td> --}}
            {{-- <td style="text-align:center;padding:10px;"><span style="color:gray">#Picture</span> <br> <img
                    src="{{url('public/scan/'.$no_of_visit['image'])}}" alt="" style="width:120px;"></td> --}}
            <td>
                &nbsp;
            </td>
            <td style="text-align:center;padding:2px;border:1px solid black;"><span style="color:gray">#QRcode</span>
                <br>
                <span style="color:gray;font-size:12px;">#Scan this To register out time</span> <br>
                {{-- {!! QrCode::size(250)->generate('ItSolutionStuff.com'); !!} --}}
                <img
                    src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate($no_of_visit['id'])) !!} ">

            </td>


        </tr>
    </table>
    <hr>
    {{-- <script type="text/javascript" src="{{url('public/js.js')}}"></script> --}}
    <script type="text/javascript" src="{{url('public/qrcode.js')}}"></script>
    <script>
        // document.getElementById("full").addEventListener("load", createQrCode);



        function done() {
            var userInput = document.getElementById('id').value;
            console.log(userInput);
            var qrcode = new QRCode("qrcode", {
                text: userInput,
                width: 256,
                height: 256,
                colorDark: "black",
                colorLight: "white",
                correctLevel: QRCode.CorrectLevel.H
            });
        }
    </script>
</body>

</html>