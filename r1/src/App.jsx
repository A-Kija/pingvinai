import './App.scss';
// import Bala from './Components/008/Bala';
import Tvenkinys from './Components/008/Tvenkinys';


const seaPlaners = [
    {id: 1, type: 'man', name: 'Lina', color: 'blue'},
    {id: 2, type: 'car', name: 'Opel', color: 'red'},
    {id: 3, type: 'animal', name: 'Vilkas', color: 'green'},
    {id: 4, type: 'fish', name: 'Ungurys', color: 'yellow'},
    {id: 5, type: 'man', name: 'Tomas', color: 'green'},
    {id: 6, type: 'animal', name: 'Bebras', color: 'red'},
    {id: 7, type: 'animal', name: 'Barsukas', color: 'green'},
    {id: 8, type: 'car', name: 'MB', color: 'blue'},
    {id: 9, type: 'car', name: 'ZIL', color: 'red'},
    {id: 10, type: 'man', name: 'Teta Toma', color: 'yellow'},
  ];
  

function App() {
    


    return (
        <div className="App">
            <div className="App-header">
                {/* <ul>
                    {
                        seaPlaners.map(p => <Bala key={p.id} p={p} />)
                    }
                </ul> */}
                <Tvenkinys seaPlaners={seaPlaners} />
            </div>
        </div>
    );
}

export default App;