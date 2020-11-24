# PHP Piscine
<img src="/rsc/grade.png" alt="grade" width="200">

![lang](https://img.shields.io/github/languages/count/kipVk/php-piscine)
![lang-list](https://badgen.net/badge/Tech%20used/PHP%20%7C%20html%20%7C%20CCSS%20%7C%20MySql%20%7C%20JavaScript%20%7C%20JQuery%20%7C%20AJAX/blue?icon=jsdelivr)
![top-lang](https://img.shields.io/github/languages/top/kipVk/php-piscine)
![lines](https://img.shields.io/tokei/lines/github.com/kipVk/php-piscine)
![commits](https://img.shields.io/github/commit-activity/m/kipVk/php-piscine)
![last-commit](https://img.shields.io/github/last-commit/kipVk/php-piscine)

Hive PHP 2 weeks bootcamp.
Languages and libraries used:
- PHP
- HTML
- CSS
- MySql
- JavaScript
- JQuery
- AJAX

#### Grades ####
* **Day 01** 67/100
* **Day 02** 60/100
* **Day 03** 100/100
* **Day 04** 100/100
* **Day 05** 110/100
* **Day 06** 68/100
* **Day 07** 100/100
* **Day 09** 100/100


**Table of Contents**
<!--ts-->
* [Day 00](#day-00)
* [Day 01](#day-01)
* [Day 02](#day-02)
* [Day 03](#day-03)
* [Day 04](#day-04)
* [Day 05](#day-05)
* [Day 06](#day-06)
* [Day 07](#day-07)
* [Day 09](#day-09)
<!--te-->

# Day 00
### ex00
basics.html page with pink background and links to 2 online shops.
<img src="/rsc/d00_ex00.png" alt="d00_ex00" width="350">

### ex01
Mendeleyév periodic table page
<img src="/rsc/d00_ex01.png" alt="d00_ex01" width="350">

### ex02
Day of 42 game page (copying exactly the image given using photoshop to measure). The assignment asks to use all the images, which includes the reference one. Now, I am assuming what was asked is to use the reference as a background and position all the elements on top of it. Since I am not evaluating this day00 and I believe this instruction is pure torture, I won´t redo the exercise just for that. I´d rather move on with the learning.

<img src="/rsc/d00_ex02.png" alt="d00_ex02" width="350">

### ex03
Responsive Mendeléyev periodic table

### ex04
Dropdowns menu exercise

<img src="/rsc/d00_ex04.png" alt="d00_ex04" width="350">

# Day 01
### ex00
hellow world

### ex01
paint 1000 X

### ex02
Is odd or even

### ex03
ft_split function

### ex04
Print parameters

### ex05
Removes spaces at begining, end and extra in the middle

### ex06
Prints all words in all arguments sorted

### ex07
Place the first word at the end. Only first argument.

### ex08
Check if array is sorted

### ex09
Prints all words in all arguments but sorted in a different way

### ex10
Does operations. It specifically says do not check for errors. I acknowledge that the program doesn't work with any other arguments than int operand int.

### ex11
Same as 10 but it all goes in one argument. Syntax error is thrown if the string is not the expected number operand number.

### ex12
Search a key on a parsed string and show the value

# Day 02
### ex00
Remove spaces and tabs

### ex01
Translating months and weekdays to get the timestamp since epoc (0)

### ex02
Read html page line by line, match the ```<a....>``` and the tags that identify the text to capitalize, and it does so.

### ex03
Mimic the command who on php. This was a lot harder than I thought. I had to get the right size for the header of the file utmp in mac because parsing the file size or file stat didn´t unpack the right bytes so the lines were not correct. On https://github.com/libyal/dtformats/blob/master/documentation/Utmp%20login%20records%20format.asciidoc I found how the utmpx file is structure, the byte size of each chunk and the header. The header in mac is 628 bytes, and I found the different sizes for each element to unpack, like user name is 256 bytes, the identifier is 4 bytes and so on. With that and googling more I managed to get the unpack string to show what who shows and then format it with spaces and such. Also, after noticing all my diffs failed after saving the results onto files I noticed with cat | -e that there´s a space after the time. After that, it is good to go.

**a256u/a4tid/a32tname/ilog/iunk/itstamp/**
- a256u => a: NUL-padded string
	- 256: Size of Username Contains an encoded string
	- u: name I gave to the array key, u for user
- a4tid => 4: size of Terminal Identifier
	- tid: name I gave to the array key, tid terminal identifier
- a32tname => 32: Size of Terminal (tty name or line) Contains an encoded string
	- tname: tty name
- ilog => i: signed integer
	- log: for type of login
- iunk => unk: for Unknown. 
- itstamp => tstamp: well, timestamp for short

unpacks this array:
- [u] => kip
- [tid] => s003
- [tname] => ttys003
- [log] => 28323
- [unk] => 7
- [tstamp] => 1605171453

`if ($unpack['unk'] == 7)`
I had to add this because there was 2 extra entries captured at the begining which unk value was 10 and nothing, that were not shown by who, so this was a way to filter those

### ex04
Get all photos under the tag IMG from a parsed web.
This was a total pain since it has to be done with curl instead of other parser that are a lot better.

# Day 03
### ex00
Just installing a software.

### ex01
phpinfo

### ex02
Print all variables parsed on an url

### ex03
Create, get and delete cookies

### ex04 
Show plain text

### ex05 
Read image with right Content-Type

### ex06
Show an image if the right user and password is introduced, and show error if not.
I decided to add users in a dictionary, as some webs would have them on data bases. Then I initially had array_key_exists to check if the parsed name exists as a key in the dictionary, but:
`isset()` is faster, but it´s not the same as `array_key_exists()`.

`array_key_exists()` purely checks if the key exists, even if the value is NULL.

Whereas `isset()` will return false if the key exist and value is NULL.

So, if the name would be empty and there would be an empty key, it would enter. Decided to use isset. Also I print first `<html><body>` and then again in the end, so the connection is open until the printing is done, as it shows in the pdf.

# Day 04
### ex00
Create a page with a form to create username and password.

### ex01
Create an account
I wanted to use Argon2id as the hashing algorithm but it´s not available on the function `hash()`, only on `password_has() `which WE CANNOT USE ON THE ASSIGNMENT...
So I will go with whirlpool as it was suggested and this is just educational.

### ex02
Modify the previous one, basically, so the user can change the password.

### ex03
Authentication various scripts

### ex04
42 chat room with multiusers.

<img src="/rsc/d04_ex04.png" alt="d04_ex04" width="250">
<img src="/rsc/d04_ex04c.png" alt="d04_ex04c" width="250">
<img src="/rsc/d04_ex04p.png" alt="d04_ex04p" width="250">

# Day 05
All MySQL queries

To import the base_student.sql to our database:

`mysql -u username -p database_name < file.sql`

# Day 06
OOP with PHP

### ex00
Get colors and operate on them
https://stackoverflow.com/questions/4801366/convert-rgb-values-to-integer
Made it match the result obtained by the main file on the resources

### ex01
Ceate a vertex with coordinates

### ex02
Create a vector with 2 vertex orig and dest. The vector needs to access
the coordinates of the vertex which are private, so we need to modify
ex01 Vertex.class to add getters and setters.

### ex03
Matrixes everywhere. Passing a "preset" in the array to create the matrix
we define in the construct the function that will be used to operate
or build the matrix. Depending on the preset selected, we are expecting some
or another keys in the array to be able to perform the operations.

Example of array:

        Array(
                [preset] => TRANSLATION
                [vtc] => Vector Object(
                        [_x:Vector:private] => 20
                        [_y:Vector:private] => 20
                        [_z:Vector:private] => 0
                        [_w:Vector:private] => 0))
					
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

	Matrix Object(
		[_array:Matrix:private] => Array(
			[preset] => IDENTITY
			[noPrint] => 1)
		[_matrix:Matrix:private] => Array(
			[0] => Array(
				[0] => 1
				[1] => 0
				[2] => 0
				[3] => 20)
			[1] => Array(
				[0] => 0
				[1] => 0.70710678118655
				[2] => -0.70710678118655
				[3] => 20)
			[2] => Array(
				[0] => 0
				[1] => 0.70710678118655
				[2] => 0.70710678118655
				[3] => 0)
			[3] => Array(
				[0] => 0
				[1] => 0
				[2] => 0
				[3] => 1))
		[_crds:Matrix:private] => Array(
			[0] => x
			[1] => y
			[2] => z
			[3] => w)
	)

### ex04 
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

### ex05
Generating images finally.

Render and Triangle classes

https://www.php.net/manual/en/function.imagecolorallocate.php
https://www.php.net/manual/en/function.imagecreate.php
https://www.geeksforgeeks.org/php-imagefilledpolygon-function/

Specially this one was useful:
http://programmerblog.net/manipulate-images-work-gd-library-in-php/

Quit ex05 half way done. Not enough time for me to understand this and do it to the end well enough to match the given image. To get 0 points I´d rather move onto day07

# Day 07
### ex00
Tyrion.class.php inheriting from Lannister class in test.php file

### ex01
Make the Greyjoy function so that test1 prints and test2 gives fatal error. Test2 is accessing straight to an attribute of the class Euron, which extends Greyjoy, so making that attribute protected gets it not accessible out of Greyjoy.
Euron has a proper function to get that value out, so test1 should work.

### ex02
Daenerys class is modyfying the value of the function resistsFire from the Targaryen class.

### ex03
An abstract class cannot be instantiated. Abstract methods on a class must be declared on the child. DrHouse class is not declaring al the abstract methods from House, so it will fail.

### ex04 
Who sleeps with who?

### ex05
Object interfaces allow you to create code which specifies which methods a class must implement, without having to define how these methods are implemented.

Interfaces are defined in the same way as a class, but with the interface keyword replacing the class keyword and without any of the methods having their contents defined.

So only people with the interface fight will print... Varys doesn´t have fight, so it fails.

### ex06
A fighter has a type and the function fight. Creeples dont have fitht so it will fail.
The factory checks if the type of soldier has been absorbed (only one time can be absorbed) and then starts fabricating.

# Day 08
I didn´t do this day because there was no time in one working day to do this huge project, but I did start taking notes about it:

Warhammer 4000 kind of game.

Rules:
- Dice: Using ordinary 6 face dice.
- Game Zone: - grid 150 by 100
	- Both fleets start from opposite corners and the ships are stationary.
	- there has to be obstacles blocking movements to encourage maneuvers. 5 or 6 obstacles of 10 cells each will do.
	- No need for them to be random.
	- Ship that leaves the area or hits an obstacle is eliminated.
- Turns: - Players use their ships one after the other untill all have played.
	- when one plays with a ship it "activates it"
	- One ship can be activated just once per turn
	- Cannot be deactivated once activated.
	- Active ship must do in this order:
		- Instruction phase
		- movement phase
		- Shoot phase
	- When all ships of all players hve been activated, next turn starts.
- Spaceships: It has different features
	- Name: should be baddass. 
	- Size: 3x10 is a big admiral ship. 1x2 is a small scout. average is 1x4 cells.
	- Sprite or equivalent: Representation on the grid.
	- Hull points: Life points. if they are 0 the ship is destroyed. 5 points is a good average for a mid size ship.
	- Engine power: Points that will be possible to assign to each ship activation to adapt to a situation. Power points. PP. Can be used to move faster, to boost shields, or power the weapons. It's done during the order phase. 10 pps is an average for a base ship. bigger ships can go up to 15pps.
	- Speed: Max cells it can move per turn. It can be increased using PP. A scout is faster can move 20 cells. Big ship only 10.
	- Handling: number of cells that a spaceship that has moved in the previous round must travel straight during the current round if it wants to stay still during the next round. Inertia. Minimum number of cells a spacecraft must travel straight before it can make a right or left turn AND between turns. A stationary ship can make one free turn before starting to move again at the begining of the movement phase. Scout has handling of 2 or 3. A big ship would have 5.
	- Shield: Damage points it can endure before losing hull points. It's 0 upon activation and it can receive some pp.
	- Weapons: List of weapons, one or two, sometimes more for really big ships. Needs pp to work. Each pp will allow to raise efficiency factor for the round.

Phases:
Orders phase:
At the begining all the pp spent on the previous round are back to 0.
The player spends the spaceship PP on any of the systems. All, some or none.
- 1pp spent on speed allows to move 1d6 extra cell.
- 1pp on shields give 1 shield point.
- 1pp spent on weapons gives one more 1D6 to shoot.
It can also go to repair the ships. It has to be stationary. Each pp spent in repairs is 1d6 6 will get the hull points to the max.

Movement phase:
- Ship moves. A turn can be rotating the ship 90 degrees to right or left.
- Turns around the most central cell that compose it.
- Stationary ship can do a free turn before moving again.
- Ship can only move cerain number of cells depending on speed and pp added to it.
- Must move to equal or superior amount of cells matching the handling characteristics.
- If during the previous round it has already moved those, it can stay still for this round.
- It can stay still indefinitely.
- It can move less than the handling if it was stationary, but then it wont be for the next turn.
- It can turn again if it has moved a bigger or equal number of cells than the handling.
- If a ship hits another, it will stop and cannot move or shoot for that round. It is stationary for the next round. If it moved more than the handling it will receive damage points equal to the number of hull points that the other ship had before the impact. It can be absorbed by shield points. (buccaneering).
- A ship that goes out of the grid or hits an obstacle is eliminated.

Shooting phase: Every werapon has a profile:
- Charge: Initially 0 upon activation. Each pp spent adds one charge point. Each charge gives 1d6 for teh shooting. some weapons have a number of charge points already.
- Short Range: Number of cells the weapon can reach at short range.
- Middle Range: Number of cells the weapon can reach middle range.
- Long range: number of cells the weapon can reach at long range. Max range.
- Effect zone: description of cells on wich the weapon can shoot.

To shoot the ship has to have a clear view of the target. We need to trace a line between the shooter and the target without any obstacle. If the shoot is aquired, the ship throws a number of dice equal to the number of charge points. The target must be within the effect zone and range. Dice with a certain value are success. Values are:
- Short Range 4+
- Middle range 5+
- Long range 6

Read more on the pdf because I refuse to transcribe more.

# Day 09
### ex00
Inflate and deflate a balloon with javascript

<img src="/rsc/d09_ex00.png" alt="d09_ex00" width="250">

### ex01
Calculator
Decided to use eval because the operands are not user introduced but selected so there´s no risk to get malicious code.

<img src="/rsc/d09_ex01.png" alt="d09_ex01" width="250">

### ex02
To do list.
You can´t create dialog box with yes or no buttons https://www.google.com/search?ei=4sK3X4HTAcSSwPAPt_e2sAk&q=javascript+dialog+box+with+yes+no+buttons&oq=javascript+dialog+box+with+yes+no&gs_lcp=CgZwc3ktYWIQAxgAMgUIABDJAzIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeOgQIABBHOggIABDJAxCRAjoFCAAQkQI6BAgAEEM6AggAOgcIABDJAxBDUK34BVickgZglJkGaABwAngAgAGdAYgBhBCSAQQxNy41mAEAoAEBqgEHZ3dzLXdpesgBCMABAQ&sclient=psy-ab

so it will have to do with confirm.

How to make cookies: https://www.w3schools.com/js/js_cookies.asp

<img src="/rsc/d09_ex02.png" alt="d09_ex02" width="250">

### ex03
Repeat ex00, ex01 and ex02 but with jquery
https://developer.yahoo.com/performance/rules.html?guccounter=1
I put the code at the end

### ex04
Modify previous exercise so that the backup system works with an online csv backup and not through cookies. CSV format: id;content of the todo

Has to be done with AJAX, html shouldn´t be refreshed.
- select.php file gets the TODO list from the csv
- insert.php file adds a TODO element to the csv
- delete.php file removes a TODO element from the csv

All the actions to the list will be transferred to the csv file using AJAX.
