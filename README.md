#README

This Code Questionnaire was completed using PHP 7.0.

##General Comments
I read the requirement to "write a function" literally rather than simply entering
the required PHP expression.

I added a ```docker-compose.yml``` file for using xdebug on Question 11. 
To utilise it please copy ```copy_me.env``` to ```.env``` and edit the settings 
as appropriate.

##Question 11
Question 11 in particular was a bit of fun for me. I used a Gradient Descent 
Function to calculate a Linear Regression on the Open vs Close price for the 
Telstra Stock. PHP is definitely not the best at this but since the question 
allowed for some creativity I thought it would be fun. Hope you enjoy it.
 
I saved the model to ```./data/model.csv``` as the training took a minute or two.
I also have not had an opportunity to tune the algorithm as instantiation and 
the learning rate can still be tweaked, therefore I set a maximum number of 
iterations.

Finally, I did not break out any data for validation as the data-set was not large 
enough.

