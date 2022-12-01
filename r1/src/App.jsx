import { useEffect } from 'react';
import { useState } from 'react';
import './App.scss';
import axios from 'axios';
import Book from './Components/jb/Book';


function App() {

    // const [ro, setRo] = useState(true);

    const [books, setBooks] = useState(null);

    useEffect(() => {
        axios.get('https://in3.dev/knygos/')
        .then(res => setBooks(res.data))


        // fetch('https://in3.dev/knygos/')
        // .then((res) => res.json())
        // .then((data) => setBooks(data));

    }, []);

    const sort09 = () => {
        setBooks(b => [...b].sort((a, b) => a.price - b.price));
    }

    const sort90 = () => {
        setBooks(b => [...b].sort((a, b) => b.price - a.price));
    }

    return (
        <div className="App">
            <div className="App-header">
                {/* <div className="kv" style={{
                    transform: ro ? null : 'rotate(90deg)'
                }}></div>
                <div>
                <button onClick={() => setRo(true)}>GO</button>
                <button onClick={() => setRo(false)} style={{transform: 'rotate(90deg)'}}>GO</button>
                </div> */}
                <div class="bin">
                    <button onClick={sort09}>Sort price 0-9</button>
                    <button onClick={sort90}>Sort price 9-0</button>
                </div>
                <ul>
                    {
                        books?.map(b => <Book key={b.id} book={b} />)
                    }
                </ul>
            </div>
            
        </div>
    );
}

export default App;