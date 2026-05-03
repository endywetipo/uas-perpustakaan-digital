// Contoh interaksi JavaScript sederhana
document.addEventListener('DOMContentLoaded', function() {
    console.log('Perpustakaan Digital Loaded');
    
    // Efek sederhana pada kartu buku saat hover ditangani oleh CSS, 
    // di sini kita bisa menambahkan logika validasi form jika diperlukan.
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const inputs = form.querySelectorAll('input[required]');
            let valid = true;
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    valid = false;
                    input.style.borderColor = 'red';
                } else {
                    input.style.borderColor = '#ddd';
                }
            });
            
            if (!valid) {
                e.preventDefault();
                alert('Harap isi semua bidang yang wajib diisi!');
            }
        });
    });
});
