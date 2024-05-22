<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form id="loginForm">
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="password" id="senha" name="senha" placeholder="Senha" required>
        <button type="submit">Login</button>
    </form>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            let formData = new FormData(this);
            formData.append('action', 'login');

            fetch('../api.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message);
                    window.location.href = 'home.php';
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
