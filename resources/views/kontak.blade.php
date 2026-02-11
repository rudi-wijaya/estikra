@extends('layouts.public')

@section('title', 'Hubungi Kami - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- Contact Section -->
    <section class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Hubungi Kami</h2>
                <p>Silakan hubungi kami untuk informasi lebih lanjut</p>
            </div>
            <div class="contact-content">
                <div class="contact-info-box">
                    <h3>Informasi Kontak</h3>
                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <div class="info-text">
                            <h4>Alamat</h4>
                            <p>Jl. Raya Krasak No. 45<br>Desa Krasak, Kec. Bangsri<br>Kabupaten Jepara, Jawa Tengah 59453</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">📞</div>
                        <div class="info-text">
                            <h4>Telepon</h4>
                            <p>(0295) 123-4567<br>0812-3456-7890 (WhatsApp)</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">📧</div>
                        <div class="info-text">
                            <h4>Email</h4>
                            <p>sdn3krasak@email.com<br>info.sdn3krasak@gmail.com</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">🕐</div>
                        <div class="info-text">
                            <h4>Jam Operasional</h4>
                            <p>Senin - Jumat: 07.00 - 14.00 WIB<br>Sabtu: 07.00 - 11.00 WIB</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <h3>Kirim Pesan</h3>
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subjek">Subjek</label>
                            <input type="text" id="subjek" name="subjek" required>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea id="pesan" name="pesan" required></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
