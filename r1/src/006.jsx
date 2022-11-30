import { useState } from 'react';
import './App.scss';
import randColor from './Functions/randColor';
import rand from './Functions/rand';
import Sq from './Components/006/Sq';
import { useEffect } from 'react';
// import Cat from './Components/006/Cat';
// import Dog from './Components/006/Dog';

// const m = [
//     {name:'Pilkis', color: 'pink', type: 'cat'},
//     {name:'Pūkis', color: 'crimson', type: 'cat'},
//     {name:'Šarikas', color: 'gray', type: 'dog'},
//     {name:'Rainis', color: 'skyblue', type: 'cat'},
//     {name:'Bobikas', color: 'yellow', type: 'dog'}
// ];

function App() {

    const [sq, setSq] = useState(null);
    // const [cat, setCat] = useState({});

    useEffect(() => {
        if (null === sq) {
            const kv = localStorage.getItem('kv');
            if (null === kv) {
                setSq([]);
            } else {
                setSq(JSON.parse(kv));
            }
        } else {
            localStorage.setItem('kv', JSON.stringify(sq));
        }
    }, [sq]);



    const add = () => {
        setSq(s => [...s, 
            {
            id: rand(100000, 999999),
            color: randColor()
            }
        ]);
    }

    // const write = () => {
    //     localStorage.setItem('myCat', JSON.stringify({cat: 'Big and Black', color: 'crimson'}));
    // }
    // const read = () => {
    //     setCat(JSON.parse(localStorage.getItem('myCat')));
    // }
    // const remove = () => {
    //     localStorage.removeItem('myCat');
    // }


    return (
        <div className="App">
            <div className="App-header">
                {/* {m.map((a, i) => a.type === 'cat' ?
            <Cat key={i} cat={a}/> :
            <Dog key={i} dog={a}/>
            )} */}
            <div className="bin">
                {
                    sq?.map(square => <Sq key={square.id} square={square} setSq={setSq} />)
                }
            </div>
                {/* <h2 style={{color: cat?.color}}>{cat?.cat}</h2> */}
                <button onClick={add}>ADD</button>
                {/* <button onClick={write}>WRITE</button>
                <button onClick={read}>READ</button>
                <button onClick={remove}>REMOVE</button> */}
            </div>
        </div>
    );
}

export default App;