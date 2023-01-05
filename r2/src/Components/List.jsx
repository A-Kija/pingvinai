import Row from "./Row";

function List({mushrooms, setLastUpdate, setEditMushroom}) {

    console.log(mushrooms)
    return (
        <ul>
        {
            mushrooms.map(m => <Row mushroom={m} key={m.id} setLastUpdate={setLastUpdate} setEditMushroom={setEditMushroom}/>)
        }
        </ul>
    );
}

export default List;