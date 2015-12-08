NOTE:
This project was made and tested with a machine running Linux Mint. Running other 
operating systems may result in unexpected warnings/errors.

IMPORTANT(E-MAIL ACTIVATION):

The current e-mail activation script relies on the database being hosted on Port 8000. 
Since the database website does not have a domain name, the activation link received 
in an activation email has been hard coded in the following format: 

http://localhost:8000/activation.php?code=ad55a5946577e818c02ccc71f5b8eeb0

where the last 32 character string is a unique MD5 hash sum.

On Linux and Mac machines, this can be done by typing the following command in a 
terminal open in the project directory:

php -S localhost:8000
