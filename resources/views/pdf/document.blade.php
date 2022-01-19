<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style type="text/css">
    body {
        font-family: 'thsarabunnew', sans-serif;
    }

</style>


<body>

    <div>
        <h1>Hello World</h1>
        <h2>Hello World</h2>
        <h3>Hello World</h3>
        <table>
            <tr>
                <td>{{ $foo }}</td>
            </tr>
            <tr>
                <td>
                    {{ base_path('resources/fonts/') }}
                </td>
            </tr>
        </table>
        <html-separator />
        <table>
            <tr>
                <td>{{ $bar }}</td>
            </tr>
        </table>
        <html-separator />
    </div>

</body>

</html>
