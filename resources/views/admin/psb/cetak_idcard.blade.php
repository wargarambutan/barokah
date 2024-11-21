<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak ID Card</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon" />
    <style>
        #idcard-preview {
            width: 100%;
            height: 500px;
        }
    </style>
</head>

<body>

    <iframe src="" frameborder="0" id="idcard-preview" title="Id Card Preview"></iframe>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"
        integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin/js/base64-uris.js') }}"></script>
    <script src="{{ asset('admin/js/idcard_pelanggan.js') }}"></script>
    <script>
        generateIdCard();
    </script>
    <script>
        const pelangganData = @json($pelanggan);
    </script>

</body>

</html>
