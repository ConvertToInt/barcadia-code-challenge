# Barcadia Media Code Challenge 2024 - Tom Dalgleish

Task: Craft a small PHP application which takes a date and returns its value in roman
numerals. The application must also take a roman numeral string and return its equivalent
value as a date.

The application should:

• Be a web application.
• Be built using Laravel, Vue and Tailwind.
• Accept any date in DD-MM-YYYY format or the corresponding roman numerals and display the input accordingly.
• Include documentation on how to use
• Be compatible with PHP 8+


## Getting started

<ol>
    <li>Clone the project</li>
    <li>Go to the folder application in termial</li>
    <li>Run 'php -S 127.0.0.1:8000' to start a local PHP server</li>
    <li>Finally, visit http://127.0.0.1:8000/ in your browser</li>
</ol>

## Justification

### Sans Laravel

I have chosen to modify the requirements of this task slightly to not be dependant on the Laravel framework. This is because
Laravel, while incredibly powerful, comes with a lot of features, most of which will not be used in this application.

Also, one of the benefits of Laravel is the MVC setup, which I found to be slightly incompatible with this task.

The result is a lighter and more efficient application.

### Tailwind and Vue CDN

As this application uses very little features of Tailwind and Vue, I did not see it necessary to install the whole setup for each.
Instead, I chose to import the technologies through CDN, to be required when needed. This puts more pressure on bandwith, but it will
be negligible in this size of application. 















