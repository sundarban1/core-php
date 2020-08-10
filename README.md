# ROBOT TOY

This project is written in core PHP and is about Toy Robot Automation done through the command line. The size of the board is 5x5.A input from the txt file can be given to move the robot. One sample file is provided inside the src/file/data.txt

## Project Setup

1. Your system must have PHP anc Composer install in your system. 
2. Clone the project
2. Put your project inside your respsective apache2 folder
3. Go the directory to the file name through the terminal.
4. Install the pacakage dependency using the composer command.
4. Enter the following command
  php index.php data.txt
5. It should give the output


## Project Testing
  PHPunit is used for the testing purpose. A test can be executed from the following 
  
  ./vendor/bin/phpunit tests
  
  To run the following particular class
  ./vendor/bin/phpunit --filter Classname
