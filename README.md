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
