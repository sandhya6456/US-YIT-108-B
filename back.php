<?php
if (isset($_GET['error'])) {
    $error_message = urldecode($_GET['error']);
    echo '<p class="error-message">' . $error_message . '</p>';
}
?>

<!-- Your existing HTML content -->

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    // Use JavaScript to go back to the previous page (refreshes the page)
    window.history.back();
}
</script>
