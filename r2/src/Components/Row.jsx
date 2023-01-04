function Row({mushroom}) {

    return (
        <li style={{
            color:mushroom.color,
            }}>
            {mushroom.title} <i style={{display: 'inline-block',transform: 'rotate(5deg)'}}>{mushroom.weight} g.</i>
        </li>
    );
}

export default Row;