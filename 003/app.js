const obj = {};

const arr = [];

arr.push('Labas', 'Ate', 'Hello');

obj.color = 'crimson';

obj.animal = 'racoon';

obj.makeFun = () => console.log('Hello!');

// obj.makeFun();

// console.log(obj);


const fun = (a, b) => {
    return a(b);
}

// const giveSome = (x) => {
//     return x + 4;
// }

// const giveSome = x => x + 4;

// const result = fun(giveSome, 10);


const result = fun(x => x + 7, 10);

// console.log(result);

// const printIt = (what, where) => console.log('** ' + what + ' ** ' + where);

// printIt('bla bla');


// arr.forEach(printIt);


// arr.forEach((what, where) => console.log('** ' + what + ' ** ' + where));

// const fe = arr.forEach(what => console.log(what));

// const map = arr.map(what => console.log(what));


// const fe = arr.forEach(what => what + '---');

const map = arr.map(what => '<i style="color:crimson;">' + what + '</i>');

// for (let i = 0; i < arr.length; i++) {
//     console.log(arr[i]);
// }

// console.log(fe);

// console.log(map);


// Tipo REACT

let html = '';

map.forEach(what => html += what);

console.log(html);

document.querySelector('h1').innerHTML = html;

//