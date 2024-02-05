var view = document.getElementById('view');

// var arr = ['a','b','c'];
// arr.forEach(element => {
//     view.innerHTML += element;
// });
// view.innerHTML += '<br>';

// Split Strings
var str = "How are you doing today?";
var res = str.split(" ");


// Array.prototype.push()
var arr = ['a','b','c'];
total = arr.push(1,2);
console.log(arr); // ["a", "b", "c", 1, 2]
console.log(total); // 5


// Array.prototype.indexOf()
var arr = ['a','b','c'];
i = arr.indexOf('a');
console.log(i); // 0


// Array.prototype.slice()
var arr = ['a','b','c'];
arr = arr.slice(1,2); // selects starting from index 1 and ending before index 2
console.log(arr); // returns a new array of selected portion: ['b']


// Array.prototype.toString()
var arr = ['a','b','c'];
var arrStr = arr.toString();
console.log(arrStr); // a,b,c


// Array.prototype.filter()
var arr = [1, 2, 3, 4, 5];
var ltr = arr.filter(function(num) {
    return num >= 3;
});
console.log(ltr); // [3, 4, 5]


// Array.prototype.join()
var arr = ['hi', 'there'];
var str = arr.join(' ');
console.log(str); // hi there


// Array.prototype.splice()
var arr = ['a','b','c','d','e'];
arr.splice(3,1,'z');
console.log(arr); 
// ["a", "b", "c", "z", "e"]



// Array.prototype.forEach()
var arr = ['a','b','c','d','e'];
var newArr = [];
arr.forEach(function(item) {
    altItem = item + arr.indexOf(item);
    newArr.push(altItem);
});
console.log(newArr); 
// ["a0", "b1", "c2", "d3", "e4"]
 


// Array.prototype.concat()
var arr1 = ['a','b','c','d','e'];
var arr2 = ['f','g','h','i','j'];
var newArr = arr1.concat(arr2);
console.log(newArr); 
// ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j"]



// Array.prototype.shift()
var arr = ['a','b','c','d','e'];
arr.shift();
console.log(arr); 
// ["b", "c", "d", "e"]



// Array.prototype.unshift()
var arr = ['a','b','c','d','e'];
arr.unshift('s');
console.log(arr);
// ["s", "a", "b", "c", "d", "e"]



// Array.prototype.map()
var arr = ['a','b','c','d','e'];
var modArr = arr.map(function(item){
    return item + 's';
});
console.log(modArr);
// ["as", "bs", "cs", "ds", "es"]



// Array.prototype.sort()
var arr = ['e','a','c','b','d'];
arr.sort();
console.log(arr);
// ["a", "b", "c", "d", "e"]


var nums = [1, 10, 2, 21, 33, 04, 12, 09, 300];
nums.sort(); 
console.log(nums); // [1, 10, 2, 21]


var nums = [1, 10, 2, 21, 33, 04, 12, 09, 300];
nums.sort(function(one, two) {
    return one - two;
});
console.log(nums);
// [1, 2, 4, 9, 10, 12, 21, 33, 300]

// SELECT FIRST ELEMENT WITH CLASS "a"
var a = document.querySelectorAll('.a')[0];

// https://vegibit.com/most-useful-javascript-array-functions/