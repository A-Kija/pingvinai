function Cat({cat}) {
    return (
        <div className="cat" style={{
            borderColor: cat.color
        }}>
            <h2 style={{
                color: cat.color
            }}>{cat.name}</h2>
        </div>
    );
}

export default Cat;