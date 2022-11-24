import './App.css';
import Valio from './Components/004/Valio';
import rand from './Functions/rand';

function App() {
  return (
    <div className="App">
      <header className="App-header" style={{
         color: rand(0, 1) ? 'crimson' : 'skyblue',
         letterSpacing: '18px'
      }}>
        <Valio spalva="gray" padingas="20px" bg="pink" cross="yellow"/>
        <Valio spalva="white" padingas="30px" bg="white" cross="orange"/>
        <div>{  rand(1, 7)  }</div> 
        <div>{  8 * 5  }</div> 
      </header>
    </div>
  );
}

export default App;
