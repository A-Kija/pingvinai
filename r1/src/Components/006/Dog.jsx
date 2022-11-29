function Dog({dog}) {
    return (
        <div className="dog" style={{
            borderColor: dog.color
        }}>
            <h3 style={{
                color: dog.color
            }}>{dog.name}</h3>
        </div>
    );
}

export default Dog;