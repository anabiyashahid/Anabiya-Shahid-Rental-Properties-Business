// Display PHP Response Messages
window.addEventListener('DOMContentLoaded', function() {
  // Get URL parameters
  const urlParams = new URLSearchParams(window.location.search);
  const status = urlParams.get('status');
  const name = urlParams.get('name');
  const message = urlParams.get('message');
  
  const messageBox = document.getElementById('messageBox');
  
  if (messageBox && status) {
    if (status === 'success') {
      messageBox.innerHTML = '<div class="success-message">✓ Success! Thank you, ' + 
                             (name ? decodeURIComponent(name) : '') + 
                             '. Your submission has been received.</div>';
      messageBox.style.display = 'block';
      
      // Clear the URL parameters after 3 seconds
      setTimeout(function() {
        window.history.replaceState({}, document.title, window.location.pathname);
        messageBox.style.display = 'none';
      }, 5000);
    } else if (status === 'error') {
      messageBox.innerHTML = '<div class="error-message">✗ Error: ' + 
                             (message ? decodeURIComponent(message) : 'Please check your input.') + 
                             '</div>';
      messageBox.style.display = 'block';
    }
  }
});

// Utility function for testing
function showMsg() {
  alert("Portfolio website is working perfectly!");
}
