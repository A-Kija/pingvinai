import { useState } from 'react';
import './App.scss';
import randColor from './Functions/randColor';
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

    const [sq, setSq] = useState([]);

    const add = () => {
        setSq(s => [...s, 1]);
    }


    return (
        <div className="App">
            <div className="App-header">
                {/* {m.map((a, i) => a.type === 'cat' ?
            <Cat key={i} cat={a}/> :
            <Dog key={i} dog={a}/>
            )} */}
            <div class="bin">
                {
                    sq.map((_, i) => <div className="sq" style={{
                        backgroundColor: randColor()
                    }} key={i}></div>)
                }
            </div>
                <button onClick={add}>ADD</button>
            </div>
        </div>
    );
}

export default App;