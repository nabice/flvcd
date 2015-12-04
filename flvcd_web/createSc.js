#!/usr/bin/env nodejs
function createSc(a, t, b) {
    t = Math.floor(t / (600 * 1000));
    ret = "";
    for (var i = 0; i < a.length; i++) {
        var j = a.charCodeAt(i) ^ b.charCodeAt(i) ^ t;
        j = j % 'z'.charCodeAt(0);
        var c;
        if (j < '0'.charCodeAt(0)) {
            c = String.fromCharCode('0'.charCodeAt(0) + j % 9)
        } else if (j >= '0'.charCodeAt(0) && j <= '9'.charCodeAt(0)) {
            c = String.fromCharCode(j)
        } else if (j > '9'.charCodeAt(0) && j < 'A'.charCodeAt(0)) {
            c = '9'
        } else if (j >= 'A'.charCodeAt(0) && j <= 'Z'.charCodeAt(0)) {
            c = String.fromCharCode(j)
        } else if (j > 'Z'.charCodeAt(0) && j < 'a'.charCodeAt(0)) {
            c = 'Z'
        } else if (j >= 'z'.charCodeAt(0) && j <= 'z'.charCodeAt(0)) {
            c = String.fromCharCode(j)
        } else {
            c = 'z'
        }
        ret += c
    }
    return ret
}
var argv = process.argv.splice(2);
console.log(createSc(argv[0], argv[1], argv[2]));

