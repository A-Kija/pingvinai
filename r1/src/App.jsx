import './App.scss';

function App() {


  const now777 = (a) => {
    console.log(a);
    console.log('NOW is '+ a);
  }


  return (
    <div className="App">
      <div className="App-header">
        <button onClick={() => now777('9:00')}>Press on 9:00 PM</button>
        <button onClick={() => now777('10:00')}>Press on 10:00 PM</button>
        <button onClick={now777}>Press on 11:00 PM</button>
        <button onClick={() => console.log('NOW!!!!!!')}>Press on 07:00 PM</button>
      </div>
    </div>
  );
}

export default App;