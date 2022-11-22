console.log('start');
console.log('kelmas');

// deklaravimas
// function portal(n, hi) {
//     return hi + ', ' + n;
// }

// const portal = function(n, hi) {
//     return hi + ', ' + n;
// }

// const portal = (n, hi) => {
//     return hi + ', ' + n;
// }


// const portal = (n, hi) =>  hi + ', ' + n;

const portal = n => 'Sveikutis, ' + n;



console.log('kelmas II');
// iskvietimas

const m = ['Jonai', 'Labas'];

// let a = portal(m[0], m[1]);

let a = portal(...m);

console.log(a);

// a = portal('Bebrai');

// console.log(a);

console.log('kelmas nr 3');

// a();



console.log('the end');