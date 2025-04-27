document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            if (!confirm('Are you sure you want to register this client?')) {
                event.preventDefault();
            }
        });
    }

    const searchInput = document.getElementById('search_query');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                document.querySelector('form').submit();
            }
        });
    }

    const clientForm = document.querySelector('form[action="php/register_client.php"]');
    if (clientForm) {
        clientForm.addEventListener('submit', function(event) {
            const client_id = document.getElementById('client_id').value;
            const name = document.getElementById('name').value;
            const age = document.getElementById('age').value;
            const phone = document.getElementById('phone').value;

            if (!client_id || !name || !age || !phone) {
                alert('Please fill in all required fields.');
                event.preventDefault();
                return;
            }

            const phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(phone)) {
                alert('Please enter a valid 10-digit phone number.');
                event.preventDefault();
                return;
            }

            fetch('php/check_client_id.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ client_id: client_id }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    alert('Error: Client ID already exists. Please choose a different Client ID.');
                    event.preventDefault();
                } else {
                    const loadingIndicator = document.createElement('div');
                    loadingIndicator.innerHTML = 'Submitting...';
                    document.body.appendChild(loadingIndicator);

                    const formData = new FormData(clientForm);
                    fetch(clientForm.action, {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.text())
                    .then(data => {
                        loadingIndicator.remove();
                        alert('Client registered successfully!');
                        window.location.href = 'index.html';
                    })
                    .catch(error => {
                        loadingIndicator.remove();
                        alert('Error during registration. Please try again later.');
                    });
                }
            })
            .catch(error => {
                alert('Error checking Client ID. Please try again later.');
                event.preventDefault();
            });
        });
    }

    const enrollForm = document.querySelector('form[action="php/enroll_client.php"]');
    if (enrollForm) {
        enrollForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(enrollForm);
            const loadingIndicator = document.createElement('div');
            loadingIndicator.innerHTML = 'Enrolling client...';
            document.body.appendChild(loadingIndicator);
            fetch(enrollForm.action, {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                loadingIndicator.remove();
                alert('Client enrolled successfully!');
                window.location.href = 'index.html';
            })
            .catch(error => {
                loadingIndicator.remove();
                alert('Error during enrollment. Please try again.');
            });
        });
    }
});
