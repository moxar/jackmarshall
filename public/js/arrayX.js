/**
 * Array::lastIndexOf()
 * Returns the last index at which a given element can be found in the array, or -1 if it is not present.
 *
 * The array is searched backwards, starting at fromIndex.
 * from Mozilla Developer Network
 * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/lastIndexOf
 */
if(!Array.prototype.lastIndexOf)
{
    Array.prototype.lastIndexOf = function(searchElement /*, fromIndex*/)
    {
        "use strict";

        if (this == null)
            throw new TypeError();

        var t = Object(this);
        var len = t.length >>> 0;
        if (len === 0)
            return -1;

        var n = len;
        if (arguments.length > 1)
        {
            n = Number(arguments[1]);
            if (n != n)
                n = 0;
            else if (n != 0 && n != (1 / 0) && n != -(1 / 0))
                n = (n > 0 || -1) * Math.floor(Math.abs(n));
        }

        var k = n >= 0
            ? Math.min(n, len - 1)
            : len - Math.abs(n);

        for (; k >= 0; k--)
        {
            if (k in t && t[k] === searchElement)
            return k;
        }
        return -1;
    };
};

/**
 * Array::last()
 * retuns the last element of the array
 */
 if(!Array.prototype.last)
 {
    Array.prototype.last = function()
    {
        if(!this.isEmpty())
            return this[this.length -1];
        else
            return -1;
    }
 }

/**
 * Array::map()
 * Creates a new array with the results of calling a provided function on every element in this array.
 *
 * callback: Function that produces an element of the new Array from an element of the current one.
 * thisArg: Object to use as this when executing callback.
 * from Mozilla Developer Network
 * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/map
 */
if(!Array.prototype.map) 
{
    Array.prototype.map = function(callback, thisArg)     
    {
        var T, A, k;

        if (this == null) {
          throw new TypeError(" this is null or not defined");
        }

        var O = Object(this);
        var len = O.length >>> 0;
        if (typeof callback !== "function") {
            throw new TypeError(callback + " is not a function");
        }

        if (thisArg) {
            T = thisArg;
        }
        A = new Array(len);

        k = 0;

        while(k < len) {

            var kValue, mappedValue;

            if (k in O) {

                kValue = O[ k ];
                mappedValue = callback.call(T, kValue, k, O);
                A[ k ] = mappedValue;
            }
            k++;
        }

        return A;
    };      
}

/**
 * Array::forEach()
 * Executes a provided function once per array element.
 *
 * callback: Function to execute for each element.
 * thisArg: Object to use as this when executing callback.
 * from Mozilla Developer Network
 * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/foreach
 */
if(!Array.prototype.forEach)
{
    Array.prototype.forEach = function forEach( callback, thisArg )
    {

        var T, k;

        if ( this == null ) {
            throw new TypeError( "this is null or not defined" );
        }

        var O = Object(this);

        var len = O.length >>> 0; // Hack to convert O.length to a UInt32

        if ( {}.toString.call(callback) !== "[object Function]" ) {
            throw new TypeError( callback + " is not a function" );
        }

        if ( thisArg ) {
            T = thisArg;
        }

        k = 0;

        while( k < len ) {

            var kValue;
            if ( Object.prototype.hasOwnProperty.call(O, k) ) {

                kValue = O[ k ];

                callback.call( T, kValue, k, O );
            }
            k++;
        }
    };
}

/**
 * Array::shuffle()
 * randomizes the array.
 *
 * from hardcode
 * http://www.hardcode.nl/subcategory_1/article_317-array-shuffle-function
 */
if(!Array.prototype.shuffle)
{
    Array.prototype.shuffle = function() 
    {
        var len = this.length;
        var i = len;
        while (i--)
        {
            var p = parseInt(Math.random()*len);
            var t = this[i];
            this[i] = this[p];
            this[p] = t;
        }
    };
};

/**
 * Array::remove(from, to)
 * removes the given value from the array
 * from: the first index to be removed
 * to: the last index to be removed
 * from and last can be negative. This removes backward then
 *
 * from John Resig
 * http://stackoverflow.com/questions/500606/javascript-array-delete-elements
 */
Array.prototype.remove = function(from, to) {
    var rest = this.slice((to || from) + 1 || this.length);
    this.length = from < 0 ? this.length + from : from;
    return this.push.apply(this, rest);
};

/**
 * Array:swap(a, b)
 * swaps index a with index b
 */
if(!Array.prototype.swap)
{
    Array.prototype.swap = function(a, b)
    {
        this[a] = this.splice(b, 1, this[a])[0];
        return this;
    };
};

/**
 * Array::contains(val)
 * returns whether the array contains the given value
 *
 * val: the value to be tested
 */
if(!Array.prototype.contains)
{
    Array.prototype.contains = function(val)
    {
        return (this.indexOf(val) != -1);
    };
};

/**
 * Array::isEmpty()
 * returns wheter the array is empty or not
 */
if(!Array.prototype.isEmpty)
{
    Array.prototype.isEmpty = function()
    {
        return this.length == 0;
    };
}