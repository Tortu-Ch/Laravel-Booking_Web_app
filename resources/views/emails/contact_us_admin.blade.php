<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Us</title>
  <style>
    *{ margin: 0; padding: 0;}
    table, th, td {
      border: 0px;
    }
  </style>
</head>

<body>
<table cellpadding="0" cellspacing="0" style="width:600px; margin:auto; background:#edf0f3;">

  <tr>
    <td>
      <table style="width:95%; margin:auto; background:#ffffff; padding:35px 0; text-align: center; font-family: 'arial';">
        <tr>
          <td>
            <h1 style="font-size: 30px; font-family:'Arial'; color: rgb(0, 0, 0); line-height: 1.2;">Hi</h1>
          </td>
        </tr>
         <tr>
          <td>
            <h5 style="font-size: 30px; font-family:'Arial'; color: rgb(0, 0, 0); line-height: 1.2;">New Message from your website.</h5>
          </td>
        </tr>
        <tr>
          <td>
            <table style="width:80%; margin:auto; padding-top:25px; padding-bottom:25px;">
              <tr>
                <td style="font-size: 16px; font-family: 'arial'; color: rgb(60, 60, 60); line-height: 1.5; text-align: center;">
                  <p>
                    Name
                  </p>
                </td>
                <td style="font-size: 16px; font-family: 'arial'; color: rgb(60, 60, 60); line-height: 1.5; text-align: center;">
                  <p>
                    {{ isset($data->name)?$data->name:'' }}
                  </p>
                </td>
              </tr>

              <tr>
                <td style="font-size: 16px; font-family: 'arial'; color: rgb(60, 60, 60); line-height: 1.5; text-align: center;">
                  <p>
                    Email
                  </p>
                </td>
                <td style="font-size: 16px; font-family: 'arial'; color: rgb(60, 60, 60); line-height: 1.5; text-align: center;">
                  <p>
                    {{ isset($data->email)?$data->email:'' }}
                  </p>
                </td>
              </tr>

              <tr>
                <td style="font-size: 16px; font-family: 'arial'; color: rgb(60, 60, 60); line-height: 1.5; text-align: center;">
                  <p>
                    Contact No
                  </p>
                </td>
                <td style="font-size: 16px; font-family: 'arial'; color: rgb(60, 60, 60); line-height: 1.5; text-align: center;">
                  <p>
                    {{ isset($data->contactno)?$data->contactno:'' }}
                  </p>
                </td>
              </tr>

              <tr>
                <td style="font-size: 16px; font-family: 'arial'; color: rgb(60, 60, 60); line-height: 1.5; text-align: center;">
                  <p>
                    Subject
                  </p>
                </td>
                <td style="font-size: 16px; font-family: 'arial'; color: rgb(60, 60, 60); line-height: 1.5; text-align: center;">
                  <p>
                    {{ isset($data->subject)?$data->subject:'' }}
                  </p>
                </td>
              </tr>

              <tr>
                <td style="font-size: 16px; font-family: 'arial'; color: rgb(60, 60, 60); line-height: 1.5; text-align: center;">
                  <p>
                    Message
                  </p>
                </td>
                <td style="font-size: 16px; font-family: 'arial'; color: rgb(60, 60, 60); line-height: 1.5; text-align: center;">
                  <p>
                    {{ isset($data->message)?$data->message:'' }}
                  </p>
                </td>
              </tr>

            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="font-size: 12px; font-family: 'arial'; color: rgb(255, 255, 255); line-height: 1.2; text-align: center; background:#262626; padding:20px 25px;">
      <table style="width: 100%;">
        <tr>
          <td style="text-align: left;">© 2017 Heypayless. All Rights Reserved</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>