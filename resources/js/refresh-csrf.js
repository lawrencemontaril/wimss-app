function refreshCsrfToken() {
  fetch('/refresh-csrf')
    .then((response) => response.json())
    .then((data) => {
      // Update all CSRF tokens in forms
      document.querySelectorAll('input[name="_token"]').forEach((el) => {
        el.value = data.csrf_token;
      });
    });
}

// Refresh the CSRF token every 5 minutes (300,000 milliseconds)
setInterval(refreshCsrfToken, 300000);
