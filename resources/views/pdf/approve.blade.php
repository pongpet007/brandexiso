<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ใบร้องขอดำเนินการเรื่องเอกสาร </title>
</head>
<style type="text/css">
    body {
        font-family: 'thsarabunnew', sans-serif;
    }
</style>

<body>
    <div
        style="width: 8cm;
    height: 2.5cm;
    border-radius: 15px; 
    border: 1px solid 000; 
    overflow: hidden; position: absolute;left:1.8cm;top:5.9cm;">

    </div>
    <div
        style="width: 8cm;
    height: 2.5cm;
    border-radius: 15px; 
    border: 1px solid 000; 
    overflow: hidden; position: absolute;left:11cm;top:5.9cm;">

    </div>
    <table>
        <tr>
            <td style="border: 1px solid #000;padding:30px;">
                <table width="100%" cellpadding="0" cellspacing="5">
                    <tr>
                        <td align="center">
                            <h3 style="font-size: 34px;">Brandex Directory Co.,Ltd.</h3>
                            <h3 style="font-size: 34px;">DAR</h3> 
                            <h3 style="font-size: 34px;">ใบร้องขอดำเนินการเรื่องเอกสาร</h3>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px; text-align: center;padding-bottom:15px; ">
                           
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0;">
                            <table width="100%" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td width="50%" valign="top" style="padding: 15px;">                                      
                                            <table width="100%">
                                                <tr>
                                                    <td width="15%">To : </td>
                                                    <td width="35%"><b>DCO / QMR</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="18%">ชื่อเอกสาร :</td>
                                                    <td width="32%"><b>{{ $formrequest->doc_name }}</b></td>
                                                </tr>
                                            </table>
                                       
                                    </td>
                                    <td width="50%" valign="top" style="padding: 15px; padding-left: 50px;">
                                        <table width="100%">
                                            <tr>
                                                <td>เรื่อง : </td>
                                                <td><b> {{ $formrequest->subject }}</b></td>
                                            </tr>
                                            <tr>
                                                <td>หมายเลขเอกสาร :</td>
                                                <td><b>{{ $formrequest->doc_no }}</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">แก้ไขครั้งที่ :
                                                    <b>{{ $formrequest->modify_from }}</b> เป็น :
                                                    <b>{{ $formrequest->modify_to }}</b>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <?/*
                            <table width="100%">
                                <tr>
                                    <td width="15%">To : </td>
                                    <td width="35%"><b>DCO / QMR</b></td>
                                    <td width="18%">ชื่อเอกสาร :</td>
                                    <td width="32%"><b>{{ $formrequest->doc_name }}</b></td>
                                </tr>
                                <tr>
                                    <td>เรื่อง : </td>
                                    <td><b> {{ $formrequest->subject }}</b></td>
                                    <td>หมายเลขเอกสาร :</td>
                                    <td><b>{{ $formrequest->doc_no }}</b></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>แก้ไขครั้งที่ : <b>{{ $formrequest->modify_from }}</b></td>
                                    <td>เป็น : <b>{{ $formrequest->modify_to }}</b> </td>
                                </tr>
                            </table>
                            */ ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 0.7cm;"></td>
                    </tr>
                    <tr style="margin-bottom:15px;">
                        <td style="border: 1px solid #000;padding:10px;">
                            รายละเอียดในการขอดำเนินการ :
                        </td>
                    </tr>

                    <tr>
                        <td style="border: 1px solid #000;padding:10px;height: 5cm; vertical-align: top; ">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>{{ $formrequest->detail }} </b>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table width="100%" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td
                                        style="width:33%; border-buttom:0;border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;  text-align:center;">
                                        ผู้ขอดำเนินการ
                                    </td>
                                    <td
                                        style="width:33%; border-buttom:0;border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;  text-align:center;">
                                        การพิจารณาผลกระทบกับเอกสารอื่น
                                    </td>
                                    <td
                                        style="width:33%; border-buttom:0;border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;  text-align:center;">
                                        กรณีขอสำเนาให้บุคคลภายนอก
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #000; text-align:center;">
                                        <img src="{{ storage_path('app/' . $formrequest->signature) }}"
                                            width="120" /><br><br>
                                        <h3> {{ $formrequest->name }}</h3>
                                        <h3> {{ $formrequest->position }}</h3>
                                    </td>
                                    <td style="border: 1px solid #000; text-align:center;">
                                        @if ($formrequest->is_approve == 1)
                                            <h1 style="color:green;">อนุมัติ</h1><br>
                                        @else
                                            <h1>ไม่อนุมัติ</h1><br>
                                        @endif
                                        <h3> {{ $formrequest->date_approve ? 'วันที่เริ่มใช้ : ' . $formrequest->date_approve : '' }}
                                        </h3>
                                        </h3>
                                        <img src="{{ storage_path('app/' . $qmr->signature) }}" width="120" /><br>
                                        <h3>{{ $qmr->name }}</h3>
                                        <h3>{{ $qmr->position }}</h3>
                                    </td>
                                    <td style="border: 1px solid #000; text-align:center;">
                                        @if ($formrequest->is_allow_to_external == 1)
                                            <h1 style="color:green;">อนุมัติ</h1><br>
                                        @else
                                            <h1 style="color:red;">ไม่อนุมัติ</h1><br><br>
                                        @endif
                                        <h3>{{ $formrequest->date_allow_to_external ? 'วันที่เริ่มใช้ : ' . $formrequest->date_allow_to_external : '' }}
                                        </h3>
                                        <img src="{{ storage_path('app/' . $qmr->signature) }}" width="120" /><br>
                                        <h3>{{ $qmr->name }}</h3>
                                        <h3>{{ $qmr->position }}</h3>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;padding:10px;">
                <b>FM-QMR-03/01 แก้ไขครั้งที่ 00 วันที่ 01-11-2021</b>
            </td>
        </tr>
    </table>

</body>

</html>
