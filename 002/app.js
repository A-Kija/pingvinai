let a = 5;
let b = 'Jonas';
let c = true;

console.log(typeof a, typeof b, typeof c);

let d = a;

a++;

console.log(a, d);

const namas = ['Jonas', 'Zita', 'Bebras'];
// console.log([...namas]);

// console.log(typeof namas[2]);

const namas2 = [...namas];

namas2.push('Valatka', 'Vilkas');
namas2.unshift('Pingvinas', 'Liūtas');

console.log(namas2.shift());

console.log(namas2.pop());

namas2[2] = 'Briedis';

namas2[15] = 'Ona';

console.table(namas2.length);

for (let i = 0; i < namas2.length; ++i) {
    console.log(namas2[i]);
}