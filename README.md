# SubPreOrder

This is a simple ordering site done without any framework.

Set up

1. download file
2. run xampp 
3. set up "spo_db" database in phpMyAdmin and import files found in spo_db folder
4. access the page with "localhost/SubPreOrder/view/index.php"

Ordering

1. fill out name and email
2. choose desired items (for panels allowing multiple choices, you may click an item again to remove it.)
3. click submit button once done to review your order
4. click proceed to post order

Cancel order

1. Click find my order button
2. Paste given order code
3. Click Find
4. Click Cancel order
5. Click Yes

- used phpMailer for mails sent after order confirmation. Downloaded repository from https://github.com/PHPMailer/PHPMailer
