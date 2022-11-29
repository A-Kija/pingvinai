import { useState } from 'react';
import './App.scss';

function App() {

  const [color, setColor] = useState(true);

  const [count, setCount] = useState(1);


  // const now777 = (a) => {
  //   console.log(a);
  //   console.log('NOW is '+ a);
  // }

  const change = () => {
    setColor(!color); // NETEISINGA!!!
  }

  const add = () => {
    setCount(c => c + 1); // REDAGAVIMUI
  }

  const set42 = () => {
    const meaningOfLife = 42;
    setCount(meaningOfLife); // PRISKYRIMAS
    // kopijavimas
    // const z = {};
    // const x = {...z};
    // const b = JSON.parse(JSON.stringify(z));
  }


  return (
    <div className="App">
      <div className="App-header">
        <h1 style={{color: color ? 'crimson' : 'skyblue'}}>BEBRAS {count}</h1>
        <button onClick={change}>Do Color</button>
        <button onClick={add}>Add</button>
        <button onClick={set42}>42</button>
        {/* <button onClick={() => now777('9:00')}>Press on 9:00 PM</button>
        <button onClick={() => now777('10:00')}>Press on 10:00 PM</button>
        <button onClick={now777}>Press on 11:00 PM</button>
        <button onClick={() => console.log('NOW!!!!!!')}>Press on 07:00 PM</button> */}
      </div>
    </div>
  );
}

export default App;