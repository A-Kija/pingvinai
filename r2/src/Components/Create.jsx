import axios from "axios";
import { useState } from "react";

function Create({setLastUpdate}) {

    const [title, setTitle] = useState('');
    const [color, setColor] = useState('#00FF00');
    const [weight, setWeight] = useState('0');

    const add = () => {
        const mushroom = {
            title,
            color,
            weight: parseInt(weight)
        }
        axios.post('http://front.lt/api/grybai/save', mushroom)
        .then(() => {
            setLastUpdate(Date.now());
            setTitle('');
            setColor('#00FF00');
            setWeight('0');
        })
    }

    return (
        <>
        <h2>Naujas Grybas</h2>
        <div>Pavadinimas <input type="text" value={title} onChange={e => setTitle(e.target.value)}></input></div>
        <div>Spalva <input type="color" value={color} onChange={e => setColor(e.target.value)}></input></div>
        <div>Svoris gramais <input type="number" value={weight} onChange={e => setWeight(e.target.value)}></input></div>
        <div><button onClick={add}>OK</button></div>
        </>
    )

}
export default Create;