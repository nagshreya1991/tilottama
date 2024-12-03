<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @font-face {
      font-family: 'Inter';
      src: url('{{ public_path('fonts/inter-semibold-webfont.ttf') }}') format('truetype');
      font-weight: 600;
      font-style: normal;
    }

    @font-face {
      font-family: 'Inter';
      src: url('{{ public_path('fonts/inter-regular-webfont.ttf') }}') format('truetype');
      font-weight: 400;
      font-style: normal;
    }

    body {
      font-family: 'Inter';
    }

    .pdf-table {
      width: 638px;
      border-collapse: collapse;
      margin: 0 auto;
      border: none;
      padding: 0;
    }

    .pdf-table td {
      background-color: #203a6e;
      border: none;
      margin: 0;
      padding: 0;
    }

    .pdf-table td img {
      border: none;
    }

    .pdf-table td h3 {
      color: #fff;
      font-family: 'Inter';
      font-size: 38px;
      font-weight: 600;
      line-height: 38px;
      margin: 0;
      padding: 0;
      text-align: center;
    }

    .pdf-table td h4 {
      color: #fff;
      font-family: 'Inter';
      font-size: 28px;
      font-weight: 400;
      line-height: 28px;
      margin: 0;
      padding: 0;
      text-align: center;
    }
  </style>

</head>

<body>
  @if (isset($attendee))
    <table class="pdf-table">
    <tbody>
      <tr>
      <td style="padding: 0;">
        <table class="pdf-table">
        <tbody>
          <tr>
          <td>
            <img
            src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('images/banner1.jpg'))) }}"
            alt="" border="0" style="display: inline-block;" />
          </td>
          </tr>
          <tr>
          <td>
            <img
            src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('images/body-img1.jpg'))) }}"
            alt="" border="0" style="display: inline-block;" />
          </td>
          </tr>
          <tr>
          <td>
            <table class="pdf-table">
            <tbody>
              <tr>
              <td valign="middle">
                <img
                src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('images/text-bg.jpg'))) }}"
                alt="" border="0" width="24" />
              </td>
              <td valign="middle">
                <div style="background-color: #203a6e;">
                <h3>{{ $attendee->name }}</h3>
                <h4>Club Name: {{ $attendee->club_name }}</h4>
                </div>
              </td>
              <td valign="middle" style="text-align: right;">
                <img
                src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('images/text-bg.jpg'))) }}"
                alt="Right Body Image" border="0" width="24" />
              </td>
              </tr>
            </tbody>
            </table>
          </td>
          </tr>
          <tr>
          <td>
            <table class="pdf-table">
            <tbody>
              <tr>
              <td valign="middle">
                <img
                src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('images/left-body-img.jpg'))) }}"
                alt="" border="0" width="204" height="290" />
              </td>
              <td valign="middle">
                <div
                style="background-color: #fff; border-radius: 10px; height: 200px; overflow: hidden; padding: 13px 13px; width: width: 200px;">
                <img
                  src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($attendee->qr_code))) }}"
                  alt="QR Code for {{ $attendee->name }}" border="0" style="height: 200px; width: 200px;">
                </div>
              </td>
              <td valign="middle" style="text-align: right;">
                <img
                src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('images/right-body-img.jpg'))) }}"
                alt="Right Body Image" border="0" width="204" height="290" />
              </td>
              </tr>
            </tbody>
            </table>
          </td>
          </tr>
          <tr>
          <td style="padding: 0">
            <img
            src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('images/footer-img.jpg'))) }}"
            alt="" border="0" />
          </td>
          </tr>
      </td>
      </tr>
    <tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
  @endif
</body>

</html>