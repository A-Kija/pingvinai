import { useEffect } from 'react';
import { useState } from 'react';
import './App.scss';
import axios from 'axios';
import Book from './Components/jb/Book';


function App() {

    // const [ro, setRo] = useState(true);

    const [books, setBooks] = useState(null);

    const [filter13, setFilter13] = useState(false);

    useEffect(() => {
        axios.get('https://in3.dev/knygos/')
        .then(res => setBooks(res.data.map(b => ({...b, show: true}))));


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

    const less13 = () => {

        // if (filter13 === false) {
        //     setBooks(b => b.map(book => (book.price < 13) ? {...book, show: true} : {...book, show: false}));
        //     setFilter13(true);
        // } else {
        //     setBooks(b => b.map(book => ({...book, show: true})));
        //     setFilter13(false);
        // }

        if (!filter13) {
            setBooks(b => b.map(book => (book.price < 13) ? {...book, show: true} : {...book, show: false}));
        } else {
            setBooks(b => b.map(book => ({...book, show: true})));
        }
        setFilter13(s => !s);
        
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
                <div class="bin top">
                    <button onClick={sort09}>Sort price 0-9</button>
                    <button onClick={sort90}>Sort price 9-0</button>
                    <button onClick={less13}>{filter13 ? 'Show All' : 'Filter less 13'}</button>
                </div>
                <ul>
                    {
                        books?.map(b => (b.show === true) ? <Book key={b.id} book={b} /> : null)
                    }
                </ul>
            </div>
            
        </div>
    );
}

export default App;