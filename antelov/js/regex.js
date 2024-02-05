/* 
    Quantifiers
    Groups
    Capture information
*/
var w1 = 'abc'; var w2 = 'abc';
var w3 = '.'; var w4 = "www.nasa.com/tv";
var w5 = '1'; var w6 = '1ddd';
var w7 = 'abc cab'; var w8 = '123 986';
var w9 = 'Ha HaHa'; w10 = 'abc obc';
console.log(w1.match(/abc/)); // matches 'abc' string only
console.log(w1.match(/./)); // matches everything except newline character

// To search for . we have to escape it
console.log(w4.match(/\//)); // we use \ to escape characters
console.log(w5.match(/\d/)); // matches digits
console.log(w6.match(/\D/)); // matches everything except digits
console.log(w7.match(/\w/)); // matches words
console.log(w7.match(/\W/)); // matches everything except words
console.log(w8.match(/\W/));

// (/\s/), whitespace, space, tab, newline
// (/\S/), everything except whitespace, space, tab, newline

console.log(w9.match(/\bHa/)); // word boundary, returns 1st 'Ha'
console.log(w9.match(/\bHa\b/)); // word boundary, returns 1st 'Ha' since it has boundary at the beginning and end
console.log(w9.match(/\BHa/)); // not a word boundary, returns last 'Ha'
console.log(w9.match(/^Ha/)); // Characters at the beginning of line
console.log(w9.match(/Ha$/)); // Characters at the end of line

// Matching a phone number
var a1 = '321-555-4321';
var a2 = '123.555.1234';
var a3 = '123*555*1234';

console.log(a1.match(/\d\d\d/)); // 3 digits in a row
console.log(a2.match(/\d\d\d/)); // 3 digits in a row
console.log(a1.match(/\d\d\d.\d\d\d.\d\d\d\d/)); // \d for each digit, dot (.) matches any character

/* 
    1. Maching only phone numbers with - or .
    2. For this we'll need to use a character set
    3. A charater set uses [] with the characters that we want to match
    4. We don't need to escape character sets
    5. [-.] will only match - or . not -- or ..
*/
console.log(a1.match(/\d\d\d[-.]\d\d\d[-.]\d\d\d\d/));
console.log(a2.match(/\d\d\d[-.]\d\d\d[-.]\d\d\d\d/));
console.log(a3.match(/\d\d\d[-.]\d\d\d[-.]\d\d\d\d/)); // returns null

// Mactch numbers that begin with 800 or 900
var a4 = '800-555-1234';
var a5 = '900-555-1234';
var a6 = '700-555-1234';
console.log(a4.match(/[89]00[-.]\d\d\d[-.]\d\d\d\d/));
console.log(a5.match(/[89]00[-.]\d\d\d[-.]\d\d\d\d/));
console.log(a6.match(/[89]00[-.]\d\d\d[-.]\d\d\d\d/)); // returns null


// Match a range of characters
console.log(a6.match(/[1-7]00[-.]\d\d\d[-.]\d\d\d\d/)); // matches characters 1-7
var a7 = 'abcdefgh';
console.log(a7.match(/[a-z]/)); // range of lowercase a-z
console.log(a7.match(/[a-zA-Z]/)); // lowercase and uppercase a-z

// Within the character set ^ matches everything that is not in the set
// [^a-z], matches characters that is not a lowercase letter
var a8 = 'cat';
var a9 = 'bat';
console.log(a8.match(/[^b]at/)); // characters that down't start with 'b'
console.log(a9.match(/[^b]at/)); // characters that down't start with 'b'



/* 
    Quantifiers
    1. We can use 'quantifiers' to match more than 
    one characters at a time
    2. *, 0 or more
    3. +, 1 or more
    4. ?, 0 or 1
    5. {3}, exact number. matches 3 of hat we're lokking for
    6. {3,6}, range of numbers {min, max}, matches 3-6 of 
    the pattern we're looking for
*/
var a4 = '800-555-1234';
var a5 = '900-555-1234';
var a6 = '700-555-1234';
console.log(a4.match(/\d{3}.\d{3}.\d{4}/)); // Here we're looking for a ptter of 3 digits, then 1 character, then 3 digits and so on

/*
    \s, space
    [A-Z], any uppercase letter
    \w. matches any word
    *, matches 0 or more \w characters
    |, or
*/
/*
    Groups
    1. Groups allow us to match several different paterns
    2. To create a group we use parentheses ()
*/
var b1 = 'Mr. Schafer';
var b2 = 'Mr Smith';
var b3 = 'Ms Davis';
var b4 = 'Mrs Robinson';
var b5 = 'Mr T';
console.log(b1.match(/M(r|s|rs)\.?\s[A-Z]\w*/)); // The question mark means there can be 0 . or 1 . so this will math both Mr. Schafer and Mr Smith
console.log(b2.match(/M(r|s|rs)\.?\s[A-Z]\w*/));
console.log(b3.match(/M(r|s|rs)\.?\s[A-Z]\w*/));
console.log(b4.match(/M(r|s|rs)\.?\s[A-Z]\w*/));
console.log(b5.match(/M(r|s|rs)\.?\s[A-Z]\w*/));



var email = 'CoreyMSchafer@gmail.com';
var email2 = 'corey.schafer@university.edu';
var email3 = 'corey-321-schafer@my-work.net';
/*
    +, 1 or more of the lower/uppercase letters
*/
console.log(email.match(/[a-zA-Z0-9.-]+@[a-zA-Z-]+\.(com|edu|net)/));
console.log(email2.match(/[a-zA-Z0-9.-]+@[a-zA-Z-]+\.(com|edu|net)/));
console.log(email3.match(/[a-zA-Z0-9.-]+@[a-zA-Z-]+\.(com|edu|net)/));

// Working email pattern match
console.log(email.match(/[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+/)); 

/*
    Capture information from groups
    ?, 0 or 1 of the previous character, s
    (www\.)?, this means the www. group is optional
    \w, any word character
    +, 1 or more of those characters
*/
var url1 = 'https://www.google.com';
var url2 = 'http://coreyms.com';
var url3 = 'https://youtube.com';
var url4 = 'https://www.nasa.gov';

console.log(url1.match(/https?:\/\/(www\.)?(\w+)(\.\w+)/));
console.log(url2.match(/https?:\/\/(www\.)?(\w+)(\.\w+)/));
console.log(url3.match(/https?:\/\/(www\.)?(\w+)(\.\w+)/));
console.log(url4.match(/https?:\/\/(www\.)?(\w+)(\.\w+)/));
