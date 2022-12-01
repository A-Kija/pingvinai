function Bala({p}) {

    return (
        <li>
            <h2 style={{color: p.color}}>{p.name}</h2>
            <h3>{p.type}</h3>
            <div className="id">{p.id}</div>
        </li>
    )
}

export default Bala;