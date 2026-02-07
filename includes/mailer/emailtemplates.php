<?php

class MailTemplate{

    public function userTemplate($data){
        return '<!DOCTYPE html>
            <html>
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Easy2Effective – Form Submission</title>
            <link rel="stylesheet" href="https://lh3.googleusercontent.com/a/ACg8ocLMgAnso9O51x3HrZs3sZqmLy9F5Bx_l7DEg_EUZUBu0uSx_kDJ=s40-p"/>
            </head>

            <body style="margin:0; padding:0; background-color:#f2f6fa; font-family:Arial, Helvetica, sans-serif;">

            <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f2f6fa">
                <tr>
                <td align="center" style="padding:40px 10px;">

                    <!-- Main Container -->
                    <table width="650" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-radius:10px; box-shadow:0 4px 20px rgba(0,0,0,0.1);">

                    <!-- Header -->
                    <tr>
                        <td style="padding:20px 30px;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="50" valign="middle">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAQlBMVEVHcEz/////////////////////////////////////+ff/9/XyaUzuJADvMgD3q575wLb0hHD2m4v71s/wSh7xWTaqeWMaAAAAC3RSTlMAMYbB6v9gGN4/7IyUt2gAAACzSURBVHgBfZMFEoAwDARTOdxq//8qFVyyWIZFI3QgpNKAVlLQk0rjQFc3VTe40dSna/GiZdxha3xSntzgkya5Cj9UUXZ9Af0j6IhEP4zTNI0z5nhM0QKTz1hBEphtxAFLOppp2aJFksIdl2RBkcYdc0pN8VKfmHcX+j4MkWAR5ZApcogOp7w9djamx4EmhV/U5VfK8YwWeUmCfSXhSB/e6eMTz5eMLzbfJnyDsa3JNDUzDivMCBNlEXCAcAAAAABJRU5ErkJggg=="
                                    width="32" height="32"
                                    style="margin-top:6px; border-radius:50px;">
                                </td>
                                <td>
                                    <h1 style="margin:0; font-size:28px; color:#000000;">
                                    Easy2Effective
                                    </h1>
                                </td>
                            </tr>
                        </table>
                        <hr style="border:none; border-top:1px solid #dddddd; margin-top:15px;">
                        </td>
                    </tr>

                    <!-- Body Content -->
                    <tr>
                        <td style="padding:10px 60px; color:#333333; font-size:15px; line-height:1.6;">

                        <p style="margin:0 0 15px 0;">
                            Dear <strong style="text-transform: capitalize;">'.$data['name'].'</strong>,
                        </p>

                        <p style="margin:0 0 15px 0;">
                            Thank you for submitting the form on our website, <strong>Easy2Effective (E2E)</strong>.
                            We are pleased to confirm that we have successfully received the information you provided.
                        </p>

                        <p style="margin:0 0 10px 0; font-weight:bold;">
                            Summary of your submitted information:
                        </p>

                        <ul style="margin:0 0 15px 0; color:#555555;">
                            <li>Email :'.$data['email'].'</li>
                            <li>Contact :'.$data['number'].'</li>
                        </ul>

                        <p style="margin:0 0 15px 0;">
                            Our team is currently reviewing your submission and will contact you at the earliest convenience.
                        </p>

                        <p style="margin:0 0 15px 0;">
                            Should you require any additional information or wish to correct any details submitted in error,
                            please reply to this email.
                        </p>

                        <p style="margin:0 0 20px 0; font-weight:bold;">
                            Thank you for your interest in Easy2Effective (E2E).
                        </p>

                        <p style="margin:0;">
                            Sincerely,<br>
                            <strong>Easy2Effective (E2E)</strong><br>
                            Team
                        </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:20px 30px;">
                        <hr style="border:none; border-top:1px solid #dddddd;">
                        <p style="font-size:11px; color:#777777; text-align:center; margin:10px 0 0 0;">
                            © 2025 Easy2Effective. | All rights reserved.
                        </p>
                        </td>
                    </tr>

                    </table>
                    <!-- End Container -->

                </td>
                </tr>
            </table>

            </body>
            </html>';
    }
}