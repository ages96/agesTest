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
                        Thank you for applying to our job as . One of our recruiters will contact you soon if your profile meets with our requirements.
                    </td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="padding: 10px 60px 10px 60px;"> 
                        Kindly check regularly your application progress in our career site.
                    </td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="padding: 10px 60px 10px 60px;"> 
                        You can use this link <a href="{{ $url }}">{{ $url }}</a> to check the application progress through our career site
                    </td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="padding: 0 60px 40px 60px;">
                        Best Regards,<br>
                        Talent Acquisition Team <br>
                        Indosat Ooredoo
                    </td>
                </tr>
            </tbody>
        </table>
@include('emails.footer')