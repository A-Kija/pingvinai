import Row from "./Row";

function List({mushrooms}) {

    return (
        <ul>
        {
            mushrooms.map(m => <Row mushroom={m} key={m.id}/>)
        }
        </ul>
    );
}

export default List;