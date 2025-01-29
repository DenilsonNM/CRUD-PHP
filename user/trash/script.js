document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let nombre = document.getElementById('nombre').value.trim().toLowerCase();
    let apellido = document.getElementById('apellido').value.trim().toLowerCase();
    let fecha = document.getElementById('fecha_nacimiento').value.replace(/-/g, '');
    let email = document.getElementById('email').value.trim();

    if (!nombre || !apellido || !fecha || !email) {
        alert("Por favor completa todos los campos.");
        return;
    }

    let usuario = nombre.charAt(0) + apellido + fecha.slice(-4); // Ej: jlopez2000
    let contraseña = nombre.slice(0, 3) + apellido.slice(0, 3) + fecha.slice(-4); // Ej: joslop2000

    fetch('register.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `nombre=${nombre}&apellido=${apellido}&fecha=${fecha}&email=${email}&usuario=${usuario}&contraseña=${contraseña}`
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('resultado').textContent = data;
        });
});