<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f4f4f4; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .content { margin-bottom: 20px; }
        .section { margin: 20px 0; padding: 15px; background-color: #f9f9f9; border-left: 4px solid #007bff; }
        .section h3 { margin-top: 0; color: #007bff; }
        .button { display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; }
        .footer { margin-top: 30px; padding-top: 15px; border-top: 1px solid #ddd; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Balasan Terhadap Pesan Anda</h2>
            <p>Terima kasih telah menghubungi kami. Berikut adalah balasan kami terhadap pesan Anda:</p>
        </div>

        <div class="content">
            <div class="section">
                <h3>📨 Pesan Awal Anda</h3>
                <p><strong>Subjek:</strong> {{ $contactMessage->subjek ?? 'Tanpa Subjek' }}</p>
                <p><strong>Pesan:</strong></p>
                <blockquote style="border-left: 3px solid #ccc; padding-left: 15px; margin-left: 0; color: #666;">
                    {{ $contactMessage->pesan ?? $contactMessage->message }}
                </blockquote>
            </div>

            <div class="section">
                <h3>✉️ Balasan Kami</h3>
                <p>{{ nl2br($replyText) }}</p>
            </div>

            <div class="section">
                <p style="margin: 0;">Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami kembali.</p>
            </div>
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ config('app.url') }}" class="button">Kunjungi Website Kami</a>
        </div>

        <div class="footer">
            <p>Terima kasih,<br>
            <strong>{{ config('app.name') }}</strong></p>
            <p style="margin: 5px 0; font-size: 11px;">Email ini dikirim otomatis. Jangan reply langsung ke email ini.</p>
        </div>
    </div>
</body>
</html>
