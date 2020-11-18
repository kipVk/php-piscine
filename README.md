# php-piscine
Hive PHP Piscine 14 days

# php-d00
PHP piscine day 00

# ex00
basics.html page

# ex01
Mendeleyév periodic table page

# ex02
Day of 42 game page (copying exactly the image given using photoshop to measure). The assignment asks to use all the images, which includes the reference one. Now, I am assuming what was asked is to use the reference as a background and position all the elements on top of it. Since I am not evaluating this day00 and I believe this instruction is pure torture, I won't redo the exercise just for that. I'd rather move on with the learning.

# ex03
Responsive Mendeléyev periodic table

# ex04
Dropdowns menu exercise

# php-d01
PHP piscine day 00

# ex00
hellow world

# ex01
paint 1000 X

# ex02
Is odd or even

# ex03
ft_split function

# ex04
Print parameters

# ex05
Removes spaces at begining, end and extra in the middle

# ex06
Prints all words in all arguments sorted

# ex07
Place the first word at the end. Only first argument.

# ex08
Check if array is sorted

# ex09
Prints all words in all arguments but sorted in a different way

# ex10
Does operations. It specifically says do not check for errors. I acknowledge that the program doesn't work with any other arguments than int operand int.

# ex11
Same as 10 but it all goes in one argument. Syntax error is thrown if the string is not the expected number operand number.

# ex12
Search a key on a parsed string and show the value

# php-d02

# ex00
Remove spaces and tabs

# ex01
Translating months and weekdays to get the timestamp since epoc (0)

# ex02
Read html page line by line, match the <a....> and the tags that identify the text to capitalize, and it does so.

# ex03
Mimic the command who on php. This was a lot harder than I thought. I had to get the right size for the header of the file utmp in mac because parsing the file size or file stat didn't unpack the right bytes so the lines were not correct. On https://github.com/libyal/dtformats/blob/master/documentation/Utmp%20login%20records%20format.asciidoc I found how the utmpx file is structure, the byte size of each chunk and the header. The header in mac is 628 bytes, and I found the different sizes for each element to unpack, like user name is 256 bytes, the identifier is 4 bytes and so on. With that and googling more I managed to get the unpack string to show what who shows and then format it with spaces and such. Also, after noticing all my diffs failed after saving the results onto files I noticed with cat | -e that there's a space after the time. After that, it is good to go.

a256u/a4tid/a32tname/ilog/iunk/itstamp/
a256u => a: NUL-padded string
        256: Size of Username Contains an encoded string
        u: name I gave to the array key, u for user
a4tid => 4: size of Terminal Identifier
        tid: name I gave to the array key, tid terminal identifier
a32tname => 32: Size of Terminal (tty name or line) Contains an encoded string
            tname: tty name
ilog => i: signed integer
        log: for type of login
iunk => unk: for Unknown. 
itstamp => tstamp: well, timestamp for short

unpacks this array:
    [u] => kip
    [tid] => s003
    [tname] => ttys003
    [log] => 28323
    [unk] => 7
    [tstamp] => 1605171453

    if ($unpack['unk'] == 7)
    I had to add this because there was 2 extra entries captured at the begining which unk value was 10 and nothing, that were not shown by who, so this was a way to filter those

# ex04
Get all photos under the tag IMG from a parsed web.
This was a total pain since it has to be done with curl instead of other parser that are a lot better.

# php-d03

# ex00
Just installing a software.

# ex01
phpinfo

# ex02
Print all variables parsed on an url

# ex03
Create, get and delete cookies

# ex04 
Show plain text

# ex05 
Read image with right Content-Type

# ex06
Show an image if the right user and password is introduced, and show error if not.
I decided to add users in a dictionary, as some webs would have them on data bases. Then I initially had array_key_exists to check if the parsed name exists as a key in the dictionary, but:
isset() is faster, but it's not the same as array_key_exists().

array_key_exists() purely checks if the key exists, even if the value is NULL.

Whereas isset() will return false if the key exist and value is NULL.

So, if the name would be empty and there would be an empty key, it would enter. Decided to use isset. Also I print first <html><body> and then again in the end, so the connection is open until the printing is done, as it shows in the pdf.

# php-d04

# ex00
Create a page with a form to create username and password.

# ex01
Create an account
I wanted to use Argon2id as the hashing algorithm but it's not available on the function hash(), only on password_has() which WE CANNOT USE ON THE ASSIGNMENT...
So I will go with whirlpool as it was suggested and this is just educational.

# ex02
Modify the previous one, basically, so the user can change the password.

# ex03
Authentication various scripts

# ex04
42 chat room with multiusers.

# php-d05

All MySQL queries

To import the base_student.sql to our database:
        mysql -u username -p database_name < file.sql

# php-d06
OOP with PHP

# ex00
Get colors and operate on them
https://stackoverflow.com/questions/4801366/convert-rgb-values-to-integer
Made it match the result obtained by the main file on the resources

# ex01
Ceate a vertex with coordinates

# ex02
Create a vector with 2 vertex orig and dest. The vector needs to access
the coordinates of the vertex which are private, so we need to modify
ex01 Vertex.class to add getters and setters.

# ex03
Matrixes everywhere. Passing a "preset" in the array to create the matrix
we define in the construct the function that will be used to operate
or build the matrix. Depending on the preset selected, we are expecting some
or another keys in the array to be able to perform the operations.
        Example of array:
                Array
                (
                [preset] => TRANSLATION
                [vtc] => Vector Object
                        (
                        [_x:Vector:private] => 20
                        [_y:Vector:private] => 20
                        [_z:Vector:private] => 0
                        [_w:Vector:private] => 0
                        )

                )
https://www.scratchapixel.com/lessons/3d-basic-rendering/perspective-and-orthographic-projection-matrix/opengl-perspective-projection-matrix/

https://en.wikipedia.org/wiki/Rotation_matrix#:~:text=Basic%20rotations,-A%20basic%20rotation&text=The%20following%20three%20basic%20rotation,clockwise%20rotation%20of%20the%20axes.)

https://www.scratchapixel.com/lessons/3d-basic-rendering/perspective-and-orthographic-projection-matrix/building-basic-perspective-projection-matrix

For the projection I used formulas on page 52 of:
https://www.cs.umd.edu/~zwicker/courses/computergraphics/03_Projection.pdf

Had to convert this to radians, since it was give in degrees. For that has to be multiplied by pi/180
1 / tan($info['fov'] / 2); => 1 / tan(($info['fov'] / 2 * M_PI / 180));

OR, using deg2rad function actually does this.

With this I obtained the right results!!

On mult I get this matrix array:
Matrix Object
(
    [_array:Matrix:private] => Array
        (
            [preset] => IDENTITY
            [noPrint] => 1
        )

    [_matrix:Matrix:private] => Array
        (
            [0] => Array
                (
                    [0] => 1
                    [1] => 0
                    [2] => 0
                    [3] => 20
                )

            [1] => Array
                (
                    [0] => 0
                    [1] => 0.70710678118655
                    [2] => -0.70710678118655
                    [3] => 20
                )

            [2] => Array
                (
                    [0] => 0
                    [1] => 0.70710678118655
                    [2] => 0.70710678118655
                    [3] => 0
                )

            [3] => Array
                (
                    [0] => 0
                    [1] => 0
                    [2] => 0
                    [3] => 1
                )

        )

    [_crds:Matrix:private] => Array
        (
            [0] => x
            [1] => y
            [2] => z
            [3] => w
        )

)

# ex04 
Making the camera. Transform the 3D view into a 2D plane
On the main file provided they construct the camera class like this:
        $vtxO = new Vertex( array( 'x' => 20.0, 'y' => 20.0, 'z' => 80.0 ) );
        $R    = new Matrix( array( 'preset' => Matrix::RY, 'angle' => M_PI ) );
        $cam  = new Camera( array( 'origin' => $vtxO,
                'orientation' => $R,
                'width' => 640,
                'height' => 480,
                'fov' => 60,
                'near' => 1.0,
                'far' => 100.0) );
On the assignment it says that $R is a rotation matrix and that $tR is
calculated basically by transposing the matrix "by doing a
diagonal symmetry (x become y in the array and vice versa).)"

So we will need to add a transpose function to the Matrix Class.

# ex05
Generating images finally.

Render and Triangle classes

https://www.php.net/manual/en/function.imagecolorallocate.php
https://www.php.net/manual/en/function.imagecreate.php
https://www.geeksforgeeks.org/php-imagefilledpolygon-function/

Specially this one was useful:
http://programmerblog.net/manipulate-images-work-gd-library-in-php/

Quit ex05 half way done. Not enough time for me to understand this and do it to the end well enough to match the given image. To get 0 points I'd rather move onto day07

# php-d07

# ex00
Tyrion.class.php inheriting from Lannister class in test.php file

# ex01
Make the Greyjoy function so that test1 prints and test2 gives fatal error. Test2 is accessing straight to an attribute of the class Euron, which extends Greyjoy, so making that attribute protected gets it not accessible out of Greyjoy.
Euron has a proper function to get that value out, so test1 should work.

# ex02
Daenerys class is modyfying the value of the function resistsFire from the Targaryen class.

# ex03
An abstract class cannot be instantiated. Abstract methods on a class must be declared on the child. DrHouse class is not declaring al the abstract methods from House, so it will fail.

# ex04 
Who sleeps with who?

# ex05
Object interfaces allow you to create code which specifies which methods a class must implement, without having to define how these methods are implemented.

Interfaces are defined in the same way as a class, but with the interface keyword replacing the class keyword and without any of the methods having their contents defined.

So only people with the interface fight will print... Varys doesn't have fight, so it fails.

# ex06
A fighter has a type and the function fight. Creeples dont have fitht so it will fail.
The factory checks if the type of soldier has been absorbed (only one time can be absorbed) and then starts fabricating.

