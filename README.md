## Wally's Widgets 

Wally’s Widget Company is a widget wholesaler. They currently sell widgets in a variety of pack sizes:
* 250 widgets
* 500 widgets
* 1,000 widgets
* 2,000 widgets
* 5,000 widgets

Their customers can order any number of widgets, but they will always be given complete packs.
The company wants to be able to fulfil all orders according to the following rules:
1. Only whole packs can be sent. Packs cannot be broken open.
2. Within the constraints of Rule 1 above, send out no more widgets than necessary to fulfil
the order.
3. Within the constraints of Rules 1 & 2 above, send out as few packs as possible to fulfil each
order.

So, for example:

|Number of Widgets Ordered      |Correct Packs to Send            |Incorrect Solutions          |
--------------------------------|---------------------------------|-----------------------------|
|1                              | 250x1                           | 500 x 1 (too many widgets)  |
|250                            | 250x1                           | 500 x 1 (too many widgets)  |
|251                            | 500x1                           | 250 x 2 (too many packs)<br />Pay attention to this one - many people get this wrong!|
|501                            | 500x1<br />250x1                | 1000 x 1 (too many widgets) <br /> 250x3 (too many packs)|
|12,001                         | 5000x2<br />2000x1<br />250x1   | 5000 x 3 (too many packs)   |

### Your Task

Write a program that will tell Wally's Widgets what packs to send out, for any given order size.

Keep your program flexible, so that new pack sizes may be added, or existing pack sizes changed or discarded at a later date with minimal adjustments to your program.

A basic structure is included in this repository and PHPUnit tests have been included to help you check your solution before submitting it. You should run the tests with `./vendor/bin/phpunit`. Some of these tests are quite difficult and we do not expect that all of them will pass, however, you should aim to make as many of the tests as possible run successfully. 

Please send us your code (either on GitHub/GitLab etc., or as a zip) and also deploy your solution to an online environment we can access via the web.
