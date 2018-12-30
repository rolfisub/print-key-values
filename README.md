Key Value Print Class
=========================

To install run:
<code>composer require rolfisub/print-key-value </code>

To use in your php file
<pre>

use Rolfisub/PrintKeyValue/PrintKeyValue;

$pkv = new PrintKeyValue();

echo $pkv->printKeyValues([
    1,
    2,
    3,
    4,
    "some"=>"array",
    [
        1,
        [
            "yey"=>"value"
        ]
    ]
]);

/*this will output:

0:1
1:2
2:3
3:4
some:array
{
 0:1
 {
  yey:value
 }
}

</pre>

Output can be customized using the constructor parameters. Please check the class constructor as a reference.

Additionally you can call the clear() method to reset the output to "".
