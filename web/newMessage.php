<?php
include('scripts/library.php');
session_start();
include('head.php');
include('navigation.php');

$messageTo = $_GET['id'];
?>

<pre class='send-message'>
        <textarea id='message-area'></textarea>
</pre>
<button class="btn btn-primary send-msg-btn" onclick="sendMessage(<?php echo $messageTo; ?>)">Send Message</button>
