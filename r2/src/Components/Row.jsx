import axios from 'axios';
function Row({mushroom, setLastUpdate, setEditMushroom}) {

    const destroy = () => {
        axios.delete('http://front.lt/api/grybai/delete/' + mushroom.id)
        .then(() => {
            setLastUpdate(Date.now());
        })
    }

    const edit = () => {
        setEditMushroom(mushroom);
    }

    return (
        <li style={{
            color:mushroom.color,
            }}>
            {mushroom.title} <i style={{display: 'inline-block',transform: 'rotate(5deg)'}}>{mushroom.weight} g.</i>
            <button onClick={destroy}>Delete</button>
            <button onClick={edit}>Edit</button>
        </li>
    );
}

export default Row;