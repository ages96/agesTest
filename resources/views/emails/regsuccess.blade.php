@include('emails.header')
        <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="padding: 10px 60px 10px 60px;"> 
                        Dear {{ $name }},
                    </td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="padding: 10px 60px 10px 60px;"> 
                        Greetings from Admin
                    </td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="padding: 10px 60px 10px 60px;"> 
                        Thank you for.
                    </td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="padding: 10px 60px 10px 60px;"> 
                        You can use this pin : {{ $pin }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="padding: 0 60px 40px 60px;">
                        Best Regards,<br>
                        Talent Acquisition Team
                    </td>
                </tr>
            </tbody>
        </table>
@include('emails.footer')