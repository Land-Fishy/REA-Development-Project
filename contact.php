<?php
include 'include/db.php';
include 'include/functies/functies.php';
include 'include/bookid.php';
?>
<!doctype html>
<html>
  <head>
	<?php require_once 'include/meta.php';?>
  </head>
  <body>
    <div class="container">
    <?php require_once 'include/header.php';?>
    <main>
      <div class="contact">
        <h1>Contact</h1>
        <p>Do you have something you want to share with me? A question you want to ask? Did you love my book? Hate it? Don't be shy. I want to hear from you! Use the contact form below to send me a message. I read all messages personally and try to respond to all of them.</p>
        <form method="post">
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" placeholder="Enter name" required>

          <label for="mail">Email:</label>
          <input type="email" name="mail" id="mail" placeholder="Enter email" required>
		  <input type="hidden" name="email" id="email">
          <label for="message">Comment:</label>
          <textarea rows="5" placeholder="Enter comment" name="message" id="message"></textarea>
		  <input type="submit" id="send" name="send" value="Send">
        </form>
      </div>
    </div>
    </main>
      <?php require_once 'include/footer.php';?>
  </body>
</html>
