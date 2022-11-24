import './App.css';
import Valio from './Components/004/Valio';
import rand from './Functions/rand';

function App() {
  return (
    <div className="App">
      <header className="App-header" style={{
         color: 'crimson',
         letterSpacing: '18px'
      }}>
        <Valio/>
        <div>{  rand(1, 7)  }</div> 
        <div>{  8 * 5  }</div> 
      </header>
    </div>
  );
}

export default App;
