<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Perfect Contact Form</title>
	<link rel="stylesheet" href="./style.css">
	<style>
		
	</style>
</head>
<body>

    <h1>Contact Us</h1>

    <form action="process.php" method="post">
        <input type="text" id="name" name="name" placeholder="name" required>

        <input type="number" id="M_num" name="M_num" placeholder="mobile number" required>
        
        <input type="email" id="email" name="email" placeholder="email" required>
        
        <input type="text" id="subject" name="subject"placeholder="subject" required>

        <textarea id="message" name="message" placeholder="message" rows="4" required></textarea>
        
        <button type="submit" value="Submit">Submit</button>
    </form>


</body>
</html>